var target = [];

$('.control a').click(function (e) {
    e.preventDefault();

    if ($(this).hasClass('checked')) {
        $(this).removeClass('checked');
        var currentIndex = target.indexOf($(this).attr('data-target'));
        target.splice(currentIndex, 1);
        $('.category').find('.block').removeClass('cableItem-hide');

    } else {
        $(this).addClass('checked');
        target.push($(this).attr('data-target'));
    }

    $.each(target, function (index, value) {
        $('.category').find('.block:not([data-target*="' + value + '"])').addClass('cableItem-hide');
    });
});

$(document).ready(function(){
    $("#menu").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 500);
    });
});

$(document).ready(function(){
    /**
     * При прокрутке страницы, показываем или срываем кнопку
     */
    $(window).scroll(function () {
        // Если отступ сверху больше 50px то показываем кнопку "Наверх"
        if ($(this).scrollTop() > 50) {
            $('#button-up').fadeIn();
        } else {
            $('#button-up').fadeOut();
        }
    });
    
    /** При нажатии на кнопку мы перемещаемся к началу страницы */
    $('#button-up').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
});