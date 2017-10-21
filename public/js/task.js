function selectItemStatus() {
    $('#select_text_status').html($(this, '.option_text').html());
}

function selectItemType() {
    $('#select_text_type').html($(this, '.option_text').html());
}

function lightItem() {
    $('.menu_item_dropdown').css({
        color: 'black',
        backgroundColor: 'white'
    });
    $(this).css({
        color: 'black',
        backgroundColor: '#EEEEEE'
    });
}

//При загрузке страницы
$(document).ready(function () {


    var $btnWrite = $('#btnWrite');

    $btnWrite.on('click', function () {
        //console.log();
        id = $.trim($('#id_task')[0].value);

        name = $.trim($('#inputTaskName')[0].value);
        status = $.trim($('#select_text_status')[0].textContent);
        deadline = $.trim($('#inputTaskDateline')[0].value);
        description = $.trim($('#inputTaskDescription')[0].value);
        type = $.trim($('#select_text_type')[0].textContent);
        id_project = $.trim($('#id_project')[0].value);

        isNew = $.trim($('#isNew')[0].value);
        if (isNew == 1) {
            data = {
                'id': id,
                'name': name,
                'deadline': deadline,
                'status': status,
                'description': description,
                'type': type,
                'id_project': id_project,
                '_token': $('meta[name="csrf-token"]').attr('content')
            };
        }
        else {

            result = $.trim($('#inputResult')[0].value);
            data = {
                'id': id,
                'name': name,
                'deadline': deadline,
                'status': status,
                'description': description,
                'type': type,
                'id_project': id_project,
                'result': result,
                '_token': $('meta[name="csrf-token"]').attr('content')
            };
        }

        /*$(location).attr('href', '/task0/add?id='+$id+'&name='+$name+'&deadline='+$deadline+'&status='+$status+'&description='+$description+'&type='+$type+'&id_project='+$id_project+'&result='+$result);
            */

        /*$.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/task0/add',
            type: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success:function(response) {
                if (response > 0) {
                    $(location).attr('href', '/task'+response);
                }
                else
                    console.log(response);
            },
            failure: function() {alert("Error!");}
        });*/

        $.post('/task0/add', data, function(response){
            if (response > 0)
                $(location).attr('href', '/task'+response);
            else
                console.log(response);
        })


    });

    var $btnAddIdea = $('#idea_add');

    $btnAddIdea.on('click', function () {
        $id = $.trim($('#id_task')[0].value);
        console.log($id);
        $(location).attr('href', '/note0?id_task='+$id);

        return true
    });

    var btnMsgAdd = $('#msg_add');

    btnMsgAdd.on('click', function () {

        id = $.trim($('#id_task')[0].value);

        text = $.trim($('#inputCommentNew')[0].value);

        data = {
            'id': id,
            'text': text,
            '_token': $('meta[name="csrf-token"]').attr('content')
        };

        NewCommentId = 0;
        $.ajax({
            type: 'POST',
            url: '/task'+id+'/addComment',
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

    $('.menu_item_dropdown_status').on('click', selectItemStatus);
    $('.menu_item_dropdown_type').on('click', selectItemType);
    $('.menu_item_dropdown').hover(lightItem);

    $('.msg_delete').on('click', deleteComment);

    function deleteComment() {
        if (confirm("Вы подтверждаете удаление?")) {
            id = $.trim($('#id_task')[0].value);
            id_comment = $(this).parent().parent().parent().parent().find(".comment_id")[0].value;

            data = {
                "id_comment": id_comment,
                '_token': $('meta[name="csrf-token"]').attr('content')
            };

            DelCommentId = 0;
            $.ajax({
                type: 'POST',
                url: '/task'+id+'/dropComment',
                data: data,
                success: function(response){
                    if (response > 0){
                        DelCommentId = response;
                    }
                    else {

                    }},
                async:false // будем выполнять синхронно
            });

            if (DelCommentId > 0) {
                $(this).parent().parent().parent().parent().next().remove();
                $(this).parent().parent().parent().parent().remove();
            }

            return true;
        } else {
            return false;
        }
    }

    $('.idea_delete').on('click', deleteIdea);

    function deleteIdea() {
        if (confirm("Вы подтверждаете удаление идеи?")) {
            id = $.trim($('#id_task')[0].value);
            id_idea = $(this).parent().parent().find(".idea_id")[0].value;

            data = {
                "id_idea": id_idea,
                '_token': $('meta[name="csrf-token"]').attr('content')
            };

            DelIdeaId = 0;
            $.ajax({
                type: 'POST',
                url: '/task'+id+'/dropIdea',
                data: data,
                success: function(response){
                    if (response > 0){
                        DelIdeaId = response;
                    }
                    else {

                    }},
                async:false // будем выполнять синхронно
            });

            if (DelIdeaId > 0) {
                $(this).parent().parent().next().remove();
                $(this).parent().parent().remove();
            }

            return true;
        } else {
            return false;
        }
    }

})