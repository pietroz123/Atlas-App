
// Inicia a sessão do PagSeguro
function startSession() {
    const sessionId = $('#pagseguro-session-id').val();
    PagSeguroDirectPayment.setSessionId(sessionId);
}

// Lista os Meios de Pagamento do PagSeguro
function listPaymentMethods() {
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 60.00,
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

// Exibe a quantidade e valores das parcelas
function getInstallments(cardFlag) {
    PagSeguroDirectPayment.getInstallments({
        amount: 60.00,
        maxInstallmentNoInterest: 2,
        brand: cardFlag,
        success: function(response) {

            // Retorna as opções de parcelamento disponíveis
            const installments = response.installments;
            console.log(installments);
            
            // Loop through card flags
            $.each(installments, function(i, flag) {

                var options = [];
                // Loop through installment options
                $.each(flag, function(i, ins) {
                    const amount = ins.installmentAmount;
                    const qty = ins.quantity;
                    options.push(
                        '<option value="'+ amount +'">' +
                            '<span>'+ qty +'</span> parcela(s) de R$ ' + amount.toFixed(2).replace('.', ',') +
                        '</option>'
                    );
                });

                $selectIns = $('select#installment');
                $selectIns.empty();
                $selectIns.append(options);
                $('.installments-container').show();

            });

        },
        error: function(response) {
            // Callback para chamadas que falharam.
        },
        complete: function(response){
            // Callback para todas chamadas.
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

                    // Recupera as parcelas
                    getInstallments(flag);
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

    /**
     * Payment Button Click
     */
    $('#js-btn-pay').click(function(e) {

        e.preventDefault();

        PagSeguroDirectPayment.onSenderHashReady(function(response){
            if(response.status == 'error') {
                console.log(response.message);
                return false;
            }
            var hash = response.senderHash;     // Hash estará disponível nesta variável.
            $('#sender-hash').val(hash);
            getCardToken();
        });
        
        loop();

        function loop() {
            if ($('#card-token').val().length == 0 || $('#sender-hash').val().length == 0) {
                setTimeout(loop, 0);
            }
            else {
                submitForm();
            }
        }

        function submitForm() {
            // Submit form
            var form = $('#form-card');
            form.submit();
        }
        
    });

});