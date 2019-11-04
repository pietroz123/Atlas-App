@extends('layouts.app')

@section('title', 'Agendamento')

@section('content')
<div class="container">

    <h5 class="mt-4">Efetuar um agendamento</h5>
    <hr>

    <div class="row mt-4">
        <div class="col-5">
            <div class="form-group">
                <label for="ap-date">Data</label>
                <input type="date" class="form-control" name="ap-date" id="ap-date" readonly>
            </div>
            <div class="form-group">
                <label for="ap-time">Horário</label>
                <input type="time" class="form-control" name="ap-time" id="ap-time" readonly>
            </div>
            <div class="form-group">
                <label for="ap-add-info">Informações adicionais</label>
                <textarea type="text" class="form-control" name="ap-add-info" id="ap-add-info" rows="4"></textarea>
            </div>
        </div>
        <div class="col-5 pl-5">
            <div class="form-group">
                <label for="ap-doctor">Médico</label>
                <input type="text" class="form-control" name="ap-doctor" id="ap-doctor" readonly>
            </div>
            <div>
                <p class="font-weight-bold mb-3">Informações sobre a clínica</p>
                <p>Endereço:</p>
                <p>Telefone:</p>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button class="btn btn-light">Cancelar</button>
        <button class="btn bg-main-color-dark white-text">Pagamento</button>
    </div>
        
</div>
@endsection