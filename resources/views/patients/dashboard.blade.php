@extends('layouts.dashboard')

@section('title', 'Dashboard Paciente')

@section('dashboard-sidebar')
    
    @include('dashboard.patients.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2>Seja bem-vindo {{ explode(' ', Auth::guard('patient')->user()->full_name)[0] }}</h2>

@endsection
