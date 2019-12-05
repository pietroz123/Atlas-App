$(document).ready(function() {

    /**
     * Initialize specialty SELECT
     */
    $('select#specialty').select2();

    /**
     * Get Location Resuts
     */
    $("select#location").select2({
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/ajax/getLocations",
            type: "POST",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                };
            },
            processResults: function (data, params) {
                return {
                    results: data,
                };
            },
            cache: true
        },
        placeholder: 'Buscar uma localidade',
        minimumInputLength: 2,
        templateResult: formatLocation,
        language: {
            inputTooShort: function(args) {
                // args.minimum is the minimum required length
                // args.input is the user-typed text
                return "Por favor entre com " + args.minimum + " ou mais caracteres";
            },
            searching: function() {
                return "Buscando...";
            },
            noResults: function() {
                return "Nenhum resultado encontrado";
            },
        }
    });

    /**
     * Format Location
     */
    function formatLocation(location) {
        if (!location.id) {
            return location.text;
        }

        if (location.id.toString().length == 7)
            $icon = '<i class="far fa-building mr-3"></i>';
        else
            $icon = '<i class="far fa-flag mr-3"></i>';

        var $container = $(
            '<div>' +
                $icon +
                location.text +
            '</div>'
        );

        return $container;
    }

});