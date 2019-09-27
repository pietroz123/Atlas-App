$(document).ready(function() {

    var click = 0;

    /**
     * Carousel
     */
    $('.doctor-features li').click(function() {

        var prevLiActive = $('.doctor-features li.active');
        var liIndex = $(this).index();
        var nextLiActive = $(this);

        prevLiActive.toggleClass('active');
        nextLiActive.toggleClass('active');

        click = 1;

        /**
         * Goes to respective carousel slide
         */
        $('#carousel-skeleton').carousel(liIndex);

    });

    $('#carousel-skeleton').on('slide.bs.carousel', function (e) {

        if (!click) {
            var liPrevIndex = e.from;
            var liNextIndex = e.to;
    
            var prevLiActive = $('.doctor-features li:eq('+liPrevIndex+')');
            var nextLiActive = $('.doctor-features li:eq('+liNextIndex+')');
    
            prevLiActive.toggleClass('active');
            nextLiActive.toggleClass('active');
        }
        else {
            click = 0;
        }
        
    });

});