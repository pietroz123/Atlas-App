@extends('layouts.dashboard')

@section('title', 'Dashboard Médico')

@section('dashboard-sidebar')
    
    @include('dashboard.doctors.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2 class="mb-5">Seja bem-vindo {{ explode(' ', Auth::guard('doctor')->user()->full_name)[0] }}</h2>

    <p>Você tem {{ $count_appointments }} agendamento(s) até a próxima semana.</p>
    <a href="{{ route('doctors.dashboard.calendar') }}" class="btn bg-main-color white-text mt-3">Visualizar agenda</a>

@endsection
