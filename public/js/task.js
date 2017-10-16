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
        //if ($.trim($(this).html()) == "Создать")

        $id = $.trim($('#id_task')[0].value);

        $name = $.trim($('#inputTaskName')[0].value);
        $status = $.trim($('#select_text_status')[0].textContent);
        $deadline = $.trim($('#inputTaskDateline')[0].value);
        $description = $.trim($('#inputTaskDescription')[0].value);
        $type = $.trim($('#select_text_type')[0].textContent);
        $id_project = $.trim($('#id_project')[0].value);
        $result = $.trim($('#inputResult')[0].value);

        $(location).attr('href', '/task0/add?id='+$id+'&name='+$name+'&deadline='+$deadline+'&status='+$status+'&description='+$description+'&type='+$type+'&id_project='+$id_project+'&result='+$result);
        /*$.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/task0/add',
            type: 'POST',
            data: {
                'id': $id,
                'name': $name,
                'deadline': $deadline,
                'status': $status,
                'description': $description,
                'type': $type,
                'id_project': $id_project
            },
            contentType: false,
            processData: false,
            success:function(response) {
                if (response > 0) {
                    $(location).attr('href', '/task'+response);
                }
                else
                    console.log(response);
            }
        });*/

        return true;
    });

    $('.menu_item_dropdown_status').on('click', selectItemStatus);
    $('.menu_item_dropdown_type').on('click', selectItemType);
    $('.menu_item_dropdown').hover(lightItem);

})