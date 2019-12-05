@extends('layouts.app')

@section('title', 'Agendamento')

@section('content')
<div class="container">

    <h5 class="mt-4">Efetuar um Agendamento</h5>
    <hr>

    <form method="POST" action="{{ route('appointments.payment') }}">
        @csrf

        <div class="row mt-4">
            <div class="col-5">
                <div class="form-group">
                    <label for="ap-date">Data</label>
                    <input type="date" class="form-control" name="ap-date" id="ap-date" value="{{ $ap_date }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ap-time">Horário</label>
                    <input type="time" class="form-control" name="ap-time" id="ap-time" value="{{ $ap_time }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ap-add-info">Informações Adicionais</label>
                    <textarea type="text" class="form-control" name="ap-add-info" id="ap-add-info" rows="4"></textarea>
                </div>
            </div>
            <div class="col-5 pl-5">
                <div class="form-group">
                    <label for="ap-doctor-name">Médico</label>
                    <input type="text" class="form-control" name="ap-doctor-name" id="ap-doctor-name" value="{{ $doctor->full_name }}" readonly>
                    <input type="hidden" name="ap-doctor-id" id="ap-doctor-id" value="{{ $doctor->id }}" readonly>
                </div>
                <p class="font-weight-bold mt-4 mb-3">Informações sobre a Clínica</p>
                <table class="clinic-info">
                    <input type="hidden" name="clinic-id" value="{{ $clinic->id }}">
                    <tbody>
                        <tr>
                            <td>Endereço</td>
                            <td>{{ $clinic->address }}</td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td>{{ $clinic->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td>{{ $city->city_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-light mr-1">Cancelar</a>
            <button class="btn bg-main-color-dark white-text">Pagamento</button>
        </div>
    </form>
        
</div>
@endsection