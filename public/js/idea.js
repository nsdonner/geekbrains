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
});