@extends('layouts.app')

@section('title', 'Pagamento de Agendamento')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('appointments.payment.checkout') }}" id="form-card">
        @csrf
        
        <div class="row">
            {{-- CARD INFORMATION --}}
            <div class="col mt-5">
        
                <h5 class="mb-5">Dados do Titular do Cartão</h5>
        
                <form id="form-card">
                    <div class="form-group position-relative">
                        <label for="card-number">Número do Cartão</label>
                        <input type="text" name="card-number" id="card-number" class="form-control">
                        <input type="hidden" name="card-token" id="card-token">
                        <input type="hidden" name="sender-hash" id="sender-hash">
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
        
                <input type="hidden" name="pagseguro-session-id" id="pagseguro-session-id" value="{{ $session_id }}">

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
                        <div class="installments-container" style="display: none">
                            <div class="installments">
                                <input type="hidden" name="installment-value" id="installment-value">
                                <label for="installment-qty" class="font-weight-bold">Parcelas</label>
                                <select name="installment-qty" id="installment-qty" class="browser-default custom-select" required></select>
                            </div>
                            <hr>
                        </div>
                        <p>Total a Pagar: <span class="price">R$60,00</span></p>
                    </div>
                </div>
        
                <button class="btn btn-block bg-main-color-dark white-text mt-4" id="js-btn-pay">Pagar</button>
        
            </div>
        </div>

    </form>
    
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="{{ asset('js/payments/pay-appointment.js') }}"></script>
@endsection
