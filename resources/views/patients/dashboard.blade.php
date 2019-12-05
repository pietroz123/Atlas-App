@extends('layouts.dashboard')

@section('title', 'Dashboard Paciente')

@section('dashboard-sidebar')
    
    @include('dashboard.patients.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2>Seja bem-vindo {{ explode(' ', Auth::guard('patient')->user()->full_name)[0] }}</h2>

    <p class="mt-5 mb-2 dashboard-principal">Busque pela localidade, especialidade e médico desejado.</p>
    <p class="dashboard-principal">Selecione agora o melhor horário disponível!</p>
    <a href="{{ route('appointments.search') }}" class="btn btn-info mt-3 btn-buscar">Buscar Agendamento</a>

@endsection
