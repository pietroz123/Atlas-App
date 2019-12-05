$(document).ready(function() {

    // =======================================================
    // SELECTS
    // =======================================================

    $('select#specialties').select2({
        placeholder: 'Selecione sua(s) especialidade(s)',
    });
    $('select#clinic').select2({
        placeholder: 'Selecione sua clínica',
    });

});