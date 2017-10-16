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
        console.log('testing...');
    });

    $('.menu_item_dropdown_status').on('click', selectItemStatus);
    $('.menu_item_dropdown_type').on('click', selectItemType);
    $('.menu_item_dropdown').hover(lightItem);

})