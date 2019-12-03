@extends('layouts.app')

@section('title', 'Pagamento de Agendamento')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('appointments.book') }}" id="form-card">
        @csrf
        
        <div class="row">
            {{-- CARD INFORMATION --}}
            <div class="col mt-5">
        
                <h5 class="mb-5">Dados do Titular do Cartão</h5>
        
                <form id="form-card">
                    <div class="form-group position-relative">
                        <label for="card-number">Número do Cartão</label>
                        <input type="text" name="card-number" id="card-number" class="form-control">
                        <div class="card-flag"></div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="card-expiry">Validade</label>
                                <input type="text" name="card-expiry" id="card-expiry" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="card-cvc">Código de Segurança</label>
                                <input type="text" name="card-cvc" id="card-cvc" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Nome completo</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="birth-day">Data de Nascimento</label>
                                <input type="text" name="birth-day" id="birth-day" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tel">Celular</label>
                                <input type="text" name="tel" id="tel" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
        
            </div>
            {{-- CARD PICTURE --}}
            <div class="col px-5">
        
                <div class="card-wrapper"></div>

                <div class="payment-methods">
                    <div class="credit-card"></div>
                    <div class="boleto"></div>
                    <div class="online-debit"></div>
                </div>
        
            </div>
            {{-- APPOINTMENT REVIEW --}}
            <div class="col mt-5">
        
                <div class="card-review">
                    <div class="card-review-header">
                        <h5>Resumo do Pedido</h5>
                    </div>
                    <div class="card-review-info">
        
                        <span class="header">Pedido</span>
                        <p>Doutor: {{ $doctor->full_name }}</p>
                        <input type="hidden" name="ap-doctor-id" id="ap-doctor-id" value="{{ $doctor->id }}">
                        <p>Data: {{ date('d/m/Y', strtotime($ap_date)) }}</p>
                        <input type="hidden" name="ap-date" id="ap-date" value="{{ $ap_date }}">
                        <p>Horário: {{ $ap_time }}</p>
                        <input type="hidden" name="ap-time" id="ap-time" value="{{ $ap_time }}">
                        
                        <span class="header">Forma de Pagamento</span>
                        Cartão de Crédito
        
                        <span class="header">Tempo de Processamento</span>
                        Até um dia útil
        
                    </div>
                    <div class="card-review-payment">
                        <p>1x de R$60,00 sem juros</p>
                        <p>Total a Pagar: <span class="price">R$60,00</span></p>
                    </div>
                </div>
        
                <button class="btn btn-block bg-main-color-dark white-text mt-4">Pagar</button>
        
            </div>
        </div>

    </form>
    
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="{{ asset('js/payments/pay-appointment.js') }}"></script>
    <script>

        // Inicia a sessão do PagSeguro
        function startSession() {
            PagSeguroDirectPayment.setSessionId('{{ $session_id }}');
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
        
        $(document).ready(function() {

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

    </script>
@endsection
