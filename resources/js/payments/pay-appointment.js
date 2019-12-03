
// Inicia a sessão do PagSeguro
function startSession() {
    const sessionId = $('#pagseguro-session-id').val();
    PagSeguroDirectPayment.setSessionId(sessionId);
}

// Lista os Meios de Pagamento do PagSeguro
function listPaymentMethods() {
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(response) {

            // Retorna os meios de pagamento disponíveis.
            const pm = response.paymentMethods;

            $.each(pm.CREDIT_CARD.options, function(i, item) {
                $('.payment-methods .credit-card').append('<div class="method"><img src="https://stc.pagseguro.uol.com.br/'+ item.images.SMALL.path +'"><span>'+ item.name +'</span></div>')
            });
            
            $('.payment-methods .boleto').append('<div class="method"><img src="https://stc.pagseguro.uol.com.br/'+ pm.BOLETO.options.BOLETO.images.SMALL.path +'"><span>'+ pm.BOLETO.name +'</span></div>')
            
            $.each(pm.ONLINE_DEBIT.options, function(i, item) {
                $('.payment-methods .online-debit').append('<div class="method"><img src="https://stc.pagseguro.uol.com.br/'+ item.images.SMALL.path +'"><span>'+ item.name +'</span></div>')
            });

            console.log(response);
        },
        error: function(response) {
            // Callback para chamadas que falharam.
            console.log(response);
        },
        complete: function(response) {
            // Callback para todas chamadas.
            console.log(response);
        }
    });
}

// Recupera o token do cartão de crédito
function getCardToken() {
    PagSeguroDirectPayment.createCardToken({
        cardNumber: '4111111111111111',     // Número do cartão de crédito
        brand: 'visa',                      // Bandeira do cartão
        cvv: '013',                         // CVV do cartão
        expirationMonth: '12',              // Mês da expiração do cartão
        expirationYear: '2026',             // Ano da expiração do cartão, é necessário os 4 dígitos.
        success: function(response) {
            // Retorna o cartão tokenizado.
            const token = response.card.token;
            console.log('token: ', token);
            $('#card-token').val(token);
        },
        error: function(response) {
            // Callback para chamadas que falharam.
        },
        complete: function(response) {
            // Callback para todas chamadas.
        }
    });
}


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

    startSession();
    // listPaymentMethods();

    /**
     * Get card flag
     */
    $('#card-number').keyup(function() {

        const cardNumber = $(this).val().replace(/ /g,'');
        const qtyChars = cardNumber.length;

        if (qtyChars == 6) {
            // Send request
            PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber,
                success: function(response) {
                    //Bandeira encontrada
                    const brand = response.brand;
                    const flag = brand.name;
                    const img = '<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/'+ flag +'.png">';
                    
                    $('.card-flag').html(img);
                },
                error: function(response) {
                    //tratamento do erro
                },
                complete: function(response) {
                    //tratamento comum para todas chamadas
                }
            });
        }
        else if (qtyChars < 6) {
            $('.card-flag').empty();
        }

    });

});