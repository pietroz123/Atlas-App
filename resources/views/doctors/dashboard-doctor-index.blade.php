@extends('layouts.dashboard')

@section('title', 'Dashboard Médico')

@section('dashboard-sidebar')
    
    @include('dashboard.doctors.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2>Seja bem-vindo {{ explode(' ', Auth::guard('doctor')->user()->full_name)[0] }}</h2>

@endsection
