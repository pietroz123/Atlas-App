@extends('layouts.app')

@section('title', 'Pagamento de Agendamento')

@section('content')
<div class="container">

    <div class="row">
        {{-- CARD INFORMATION --}}
        <div class="col">

            <h5 class="mt-5 mb-5">Dados do titular do cartão</h5>

            <div class="form-group">
                <label for="card-number">Número do cartão</label>
                <input type="text" name="card-number" id="card-number" class="form-control">
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="card-valid">Validade</label>
                        <input type="text" name="card-valid" id="card-valid" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="card-code">Código de segurança</label>
                        <input type="text" name="card-code" id="card-code" class="form-control">
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

        </div>
        {{-- CARD PICTURE --}}
        <div class="col">
            
            

        </div>
        {{-- APPOINTMENT REVIEW --}}
        <div class="col">

        </div>
    </div>
    
</div>
@endsection
