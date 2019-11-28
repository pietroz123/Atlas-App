@extends('layouts.app')

@section('title', 'Pagamento de Agendamento')

@section('content')
<div class="container">

    <div class="row">
        {{-- CARD INFORMATION --}}
        <div class="col mt-5">

            <h5 class="mb-5">Dados do titular do cartão</h5>

            <form id="form-card">
                <div class="form-group">
                    <label for="card-number">Número do cartão</label>
                    <input type="text" name="card-number" id="card-number" class="form-control">
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
                            <label for="card-cvc">Código de segurança</label>
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
                            <label for="birth-day">Data de nascimento</label>
                            <input type="text" name="birth-day" id="birth-day" class="form-control">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tel">Telefone</label>
                            <input type="text" name="tel" id="tel" class="form-control">
                        </div>
                    </div>
                </div>
            </form>

        </div>
        {{-- CARD PICTURE --}}
        <div class="col px-5">

            <div class="card-wrapper"></div>

        </div>
        {{-- APPOINTMENT REVIEW --}}
        <div class="col mt-5">

            <div class="card-review">
                <div class="card-review-header">
                    <h5>Resumo do pedido</h5>
                </div>
                <div class="card-review-info">

                    <span class="header">Pedido</span>
                    <p>Doutor: Sra. Maitê Ferminiano Sandoval Sobrinho</p>
                    <p>Data: 24/08/2020</p>
                    <p>Horário: 15:30</p>
                    
                    <span class="header">Forma de pagamento</span>
                    Cartão de Crédito

                    <span class="header">Tempo de processamento</span>
                    Até um dia útil

                </div>
                <div class="card-review-payment">
                    <p>1x de R$60,00 sem juros</p>
                    <p>Total a pagar: <span class="price">R$60,00</span></p>
                </div>
            </div>

            <button class="btn btn-block bg-main-color-dark white-text mt-4">Pagar</button>

        </div>
    </div>
    
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/payments/pay-appointment.js') }}"></script>
@endsection
