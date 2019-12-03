$(document).ready(function() {

    /**
     * Show ratings modal
     */
    $('.js-btn-rate').click(function() {

        // Get appointment ID
        const apId = $(this).attr('data-ap-id');

        // Fill input
        $('#ap-id').val(apId);

        $stars = $('input[name="rating"]');
        $.each($stars, function(i, item) {
            item.checked = false;
        });
        $('.rating-feedback').hide();
        // Show modal
        $('#modal-rating').modal('show');

    });

    /**
     * Star rating validation
     */
    $(document).on('click', '.js-btn-add-rating', function(e) {
        if (!$("input[name='rating']:checked").val()) {
            e.preventDefault();
            $('.rating-feedback').show();
        }
    });
    $(document).on('click', 'input[name="rating"]', function() {
        $('.rating-feedback').hide();
    });

});