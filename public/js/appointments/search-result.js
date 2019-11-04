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
        $(this).slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            prevArrow: $(this).parents('.doctor-calendar').find('.calendar-nav-prev'),
            nextArrow: $(this).parents('.doctor-calendar').find('.calendar-nav-next'),
        });
    });

});

/**
 * Display success message on appointment
 */
$(document).on('click', '.calendar-slot.available', function() {

    const apTime = $(this).text();
    const doctorId = $(this).parents('.doctor-found').attr('data-doctor-id');
    console.log($(this).text());
    console.log(doctorId);

    $.ajax({
        url: '/agendamentos/criar',
        method: 'GET',
        data: {
            
        },
        datatype: '',
        success: function(retorno) {
            console.log('Success');
            console.log(retorno);
        },
        error: function(retorno) {
            console.log('Error');
            console.log(retorno);
        }
    });

    // swal("Sucesso!", "Seu agendamento foi realizado com sucesso!", "success");
    // $(this).removeClass('available');
    // $(this).addClass('not-available');
});