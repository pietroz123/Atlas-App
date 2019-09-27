$(document).ready(function() {

    /**
     * Carousel
     */
    $('.doctor-features li').click(function() {

        var liIndex = $(this).index();

        /**
         * Goes to respective carousel slide
         */
        $('#carousel-skeleton').carousel(liIndex);

    });

});