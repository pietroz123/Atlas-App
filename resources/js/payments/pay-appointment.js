$(document).ready(function() {


    /**
     * CARD
     */
    var card = new Card({
        form: '#form-card',
        container: '.card-wrapper',

        formSelectors: {
            numberInput: 'input#card-number',
            expiryInput: 'input#card-expiry',
            cvcInput: 'input#card-cvc',
            nameInput: 'input#name',
        },
     
        placeholders: {
            number: '**** **** **** ****',
            name: 'SEU NOME',
            expiry: '**/****',
            cvc: '***'
        },

    });



});