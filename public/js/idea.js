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

    var $btnWrite = $('#btnWrite');

    $btnWrite.on('click', function () {

        $id = $.trim($('#id_idea')[0].value);

        $name = $.trim($('#inputIdeaName')[0].value);
        $description = $.trim($('#inputIdeaDescription')[0].value);
        $technologies = $.trim($('#inputIdeaTechnologies')[0].value);
        $competitors = $.trim($('#inputIdeaCompetitors')[0].value);
        $id_task = $.trim($('#id_task')[0].value);


        $(location).attr('href', '/note0/add?id='+$id+'&name='+$name+'&description='+$description+'&technologies='+$technologies+'&competitors='+$competitors+'&id_task='+$id_task);
        return true;
    });

    var $btnMsgAdd = $('#msg_add');

    $btnMsgAdd.on('click', function () {

        $id = $.trim($('#id_idea')[0].value);

        $text = $.trim($('#inputCommentNew')[0].value);

        console.log($text);

        $.get("/note"+$id+"/addComment?text="+$text+"&id="+$id);

        $('#inputCommentNew')[0].value = "";
        return true;
    });
});