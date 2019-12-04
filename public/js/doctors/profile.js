/**
 * Abre a fecha a seção de descrição das experiências
 */
$(document).on('click', '.btn-view-more', function() {

    var btn = $(this);
    var parent = btn.parent();
    parent.toggleClass('locked');
    parent.children('.lock-area').toggleClass('unlocked');
    btn.toggleClass('closed');
    btn.toggleClass('opened');

    // Altera o texto
    if (btn.hasClass('closed'))
        btn.text('Ver mais');
    else
        btn.text('Ver menos');

});

$(document).ready(function() {

    /**
     * Init Slick
     */
    $calendar = $('.calendar-schedule');
    // $calendar.slick({
    //     infinite: true,
    //     slidesToShow: 7,
    //     slidesToScroll: 7,
    //     prevArrow: $('.calendar-nav-prev'),
    //     nextArrow: $('.calendar-nav-next'),
    // });

});