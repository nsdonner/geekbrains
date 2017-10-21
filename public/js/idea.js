$(document).ready(function () {
    $('#tabs').children().on('click', function () {
        var target = $(event.target);
        var targetIndex = $('#tabs').children().index(target);

        if (!(target.hasClass('active'))) {
            $('.active').removeClass('active');
            target.addClass('active');
            $('.tab_content').eq(targetIndex).addClass('active');
        }
    });

    var btnWrite = $('#btnWrite');

    btnWrite.on('click', function () {

        id = $.trim($('#id_idea')[0].value);

        name = $.trim($('#inputIdeaName')[0].value);
        description = $.trim($('#inputIdeaDescription')[0].value);
        technologies = $.trim($('#inputIdeaTechnologies')[0].value);
        competitors = $.trim($('#inputIdeaCompetitors')[0].value);
        id_task = $.trim($('#id_task')[0].value);

        data = {
            'id': id,
            'name': name,
            'description': description,
            'technologies': technologies,
            'competitors': competitors,
            'id_task': id_task,
            '_token': $('meta[name="csrf-token"]').attr('content')
        };


        $.post('/note0/add', data, function(response){
            if (response > 0)
                $(location).attr('href', '/note'+response);
            else
                console.log(response);
        });
        //$(location).attr('href', '/note0/add?id='+$id+'&name='+$name+'&description='+$description+'&technologies='+$technologies+'&competitors='+$competitors+'&id_task='+$id_task);
        return true;
    });

    var btnMsgAdd = $('#msg_add');

    btnMsgAdd.on('click', function () {

        id = $.trim($('#id_idea')[0].value);

        text = $.trim($('#inputCommentNew')[0].value);

        data = {
            'id': id,
            'text': text,
            '_token': $('meta[name="csrf-token"]').attr('content')
        };

        NewCommentId = 0;
        $.ajax({
            type: 'POST',
            url: '/note'+id+'/addComment',
            data: data,
            success: function(response){
                if (response > 0){
                    NewCommentId = response;
                }
                else {

                }},
            async:false // будем выполнять синхронно
        });


        if (NewCommentId > 0) {
            elem_line = $('#first_comment_place');
            elem_row = $("<div/>", {
                "class": "comment_row"
            }).insertAfter(elem_line);

            elem_idcomment = $("<input/>", {
                "type": "hidden",
                "name": "comment_id",
                "value": NewCommentId,
                "class": "comment_id"
            }).appendTo(elem_row);

            elem_divimg = $("<div/>", {
                "class": "comment_avatar"
            }).insertAfter(elem_idcomment);

            elem_idcomment = $("<img/>", {
                "src": $('#own_pic').attr("src"),
                "class": "avatar_pic"
            }).appendTo(elem_divimg);

            elem_content = $("<div/>", {
                "class": "comment_content"
            }).insertAfter(elem_divimg);

            elem_message = $("<div/>", {
                "class": "comment__message"
            }).appendTo(elem_content);

            Data = new Date();
            Year = Data.getFullYear();
            Month = Data.getMonth();
            Day = Data.getDate();
            Hour = Data.getHours();
            Minutes = Data.getMinutes();
            Seconds = Data.getSeconds();
            elem_author = $("<div/>", {
                "class": "comment_author",
                "text": "["+Year+"-"+Month+"-"+Day+" "+Hour+":"+Minutes+":"+Seconds+"] "+$('#own_author').text()
            }).appendTo(elem_message);

            elem_delete = $("<div/>", {
                "class": "comment_delete"
            }).insertAfter(elem_author);

            elem_msg_delete = $("<i/>", {
                "class": "fa fa-times-circle msg_delete"
            }).appendTo(elem_delete);

            elem_message2 = $("<div/>", {
                "class": "comment__message"
            }).insertAfter(elem_message);

            elem_text = $("<div/>", {
                "class": "comment_text",
                "text": $('#inputCommentNew')[0].value
            }).appendTo(elem_message2);

            elem_linesep = $("<div/>", {
                "class": "line_separate"
            }).insertAfter(elem_row);

            $('#inputCommentNew')[0].value = "";
        }
        else
            console.log("Значение " + NewCommentId + " .");

        return true;
    });

    $('.msg_delete').on('click', deleteComment);

    function deleteComment() {
        if (confirm("Вы подтверждаете удаление?")) {
            id = $.trim($('#id_idea')[0].value);
            id_comment = $(this).parent().parent().parent().parent().find(".comment_id")[0].value;

            data = {
            "id_comment": id_comment,
                '_token': $('meta[name="csrf-token"]').attr('content')
            };

            DelCommentId = 0;
            $.ajax({
                type: 'POST',
                url: '/note'+id+'/dropComment',
                data: data,
                success: function(response){
                    if (response > 0){
                        DelCommentId = response;
                    }
                    else {

                    }},
                async:false // будем выполнять синхронно
            });

            /*$.post('/note'+id+'/dropComment', data, function(response){
                if (response > 0)
                    $(this).parent().parent().parent().parent().remove();
                else
                    console.log(response);
            });*/

            if (DelCommentId > 0) {
                $(this).parent().parent().parent().parent().next().remove();
                $(this).parent().parent().parent().parent().remove();
            }

            return true;
        } else {
            return false;
        }
    }
});