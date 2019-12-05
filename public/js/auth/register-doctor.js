$(document).ready(function() {

    // =======================================================
    // MASKS
    // =======================================================

    $('#phone_number').mask('(00) 00000-0000', {
        placeholder: "(__) _____-____"
    });

    // =======================================================
    // SELECTS
    // =======================================================

    $('select#specialties').select2({
        placeholder: 'Selecione sua(s) especialidade(s)',
    });
    $('select#clinic').select2({
        placeholder: 'Selecione sua clínica',
    });

    // =======================================================
    // Crm Validation
    // =======================================================

    $('#crm').keyup(function() {

        const crm = $(this).val();

        // Reset
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
        
        if (crm.length >= 4) {
            $.ajax({
                url: 'https://www.consultacrm.com.br/api/index.php',
                // method: '',
                data: {
                    destino: 'json',
                    chave: '2883748713',
                    uf: '',
                    tipo: 'crm',
                    q: crm,
                },
                success: function(retorno) {
                    
                    // Get doctors
                    const data = JSON.parse(retorno);
                    var doctors = data.item;

                    /**
                     * Filter available doctors
                     */
                    doctors = doctors.filter( (doctor) => {
                        return doctor.situacao != 'Cancelado'
                    });
                    const qty = doctors.length;

                    // Validation message
                    if (qty == 0)
                        $('#crm').addClass('is-invalid');
                    else
                        $('#crm').addClass('is-valid');

                },
                error: function(retorno) {
                    console.log('Error');
                    console.log(retorno);
                }
            });
        }
    });

});