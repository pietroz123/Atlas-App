@extends('layouts.dashboard')

@section('title', 'Agenda')

@section('dashboard-sidebar')
    
    @include('dashboard.doctors.components.sidebar')

@endsection

@section('dashboard-content')

    <div id='calendar'></div>

    <div class="modal-agendamento" style="display: none">
        {{-- AJAX --}}
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.js"></script>
    <script src="{{ asset('js/doctors/calendar.js') }}"></script>
@endsection