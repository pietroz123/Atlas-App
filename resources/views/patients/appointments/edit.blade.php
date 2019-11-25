@extends('layouts.app')

@section('title', 'Agendamento')

@section('content')
<div class="container">

    <h5 class="mt-4">Alterar Agendamento</h5>
    <hr>

    <form method="POST" action="{{ route('appointments.update', $ap->id) }}">
        @method('PUT')
        @csrf

        <div class="row mt-4">
            <div class="col-5">
                <div class="form-group">
                    <label for="ap-date">Data</label>
                    <input type="date" class="form-control" name="ap-date" id="ap-date" value="{{ $ap->appointment_date }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ap-time">Horário</label>
                    <select class="browser-default custom-select" name="ap-time" id="ap-time">
                        @foreach ($available_times as $time => $available)
                            @if ($available)
                                <option value="{{ $time }}" {{ $time == date('H:i', strtotime($ap->probable_start_time)) ? 'selected' : '' }}>{{ $time }}</option>
                            @endif
                        @endforeach
                    </select>
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
                </div>
                <p class="font-weight-bold mt-4 mb-3">Informações sobre a clínica</p>
                <table class="clinic-info">
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
            <a class="btn btn-light mr-1" href="{{ url()->previous() }}">Cancelar</a>
            <button class="btn bg-main-color-dark white-text" type="submit">Atualizar</button>
        </div>
    </form>
        
</div>
@endsection