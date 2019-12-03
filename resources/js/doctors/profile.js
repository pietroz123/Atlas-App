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
    $('.calendar-schedule').each(function(i, item) {
        console.log(item);
        
        // $(this).slick({
        //     infinite: true,
        //     slidesToShow: 5,
        //     slidesToScroll: 5,
        //     prevArrow: $(this).parents('.doctor-calendar').find('.calendar-nav-prev'),
        //     nextArrow: $(this).parents('.doctor-calendar').find('.calendar-nav-next'),
        // });
    });

});