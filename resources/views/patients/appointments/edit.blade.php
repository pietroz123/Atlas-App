@extends('layouts.app')

@section('title', 'Agendamento')

@section('content')
<div class="container">

    <h5 class="mt-4">Alterar Agendamento</h5>
    <hr>

    <form method="POST" action="">
        @csrf

        <div class="row mt-4">
            <div class="col-5">
                <div class="form-group">
                    <label for="ap-date">Data</label>
                    <input type="date" class="form-control" name="ap-date" id="ap-date" value="{{ $ap->appointment_date }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ap-time">Horário</label>
                    <input type="time" class="form-control" name="ap-time" id="ap-time" value="{{ $ap->probable_start_time }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ap-add-info">Informações adicionais</label>
                    <textarea type="text" class="form-control" name="ap-add-info" id="ap-add-info" rows="4"></textarea>
                </div>
            </div>
            <div class="col-5 pl-5">
                <div class="form-group">
                    <label for="ap-doctor-name">Médico</label>
                    <input type="text" class="form-control" name="ap-doctor-name" id="ap-doctor-name" value="{{ $ap->doctor->full_name }}" readonly>
                    <input type="hidden" name="ap-doctor-id" id="ap-doctor-id" value="{{ $ap->doctor->id }}" readonly>
                </div>
                <p class="font-weight-bold mt-4 mb-3">Informações sobre a clínica</p>
                <table class="clinic-info">
                    <input type="hidden" name="clinic-id" value="{{ $ap->doctor->clinic->id }}">
                    <tbody>
                        <tr>
                            <td>Endereço</td>
                            <td>{{ $ap->doctor->clinic->address }}</td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td>{{ $ap->doctor->clinic->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td>{{ $ap->doctor->clinic->city->city_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mt-4">
            <button class="btn btn-light mr-1">Cancelar</button>
            <button class="btn bg-main-color-dark white-text">Pagamento</button>
        </div>
    </form>
        
</div>
@endsection