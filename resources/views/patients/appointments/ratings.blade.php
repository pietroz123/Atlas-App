@extends('layouts.dashboard')

@section('title', 'Avaliações')

@section('dashboard-sidebar')
    
    @include('dashboard.patients.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2 class="mb-4">Avaliações</h2>

    {{-- @if (count($appointments) > 0)
        <table class="table table-list">

            <thead>
                <tr>
                    <th>Doutor</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($appointments as $ap)
                    <tr>
                        <td>
                            <a href="{{ route('doctors.show', $ap->doctor->id) }}" class="text-info">
                                {{ $ap->doctor->full_name }}
                            </a>
                        </td>
                        <td>{{ date('d/m/Y', strtotime($ap->appointment_date)) }}</td>
                        <td>{{ date('H:i', strtotime($ap->probable_start_time)) }}</td>
                        <td>
                            @switch($ap->status)
                                @case('active')
                                    <span class="badge badge-default">Ativo</span>
                                    @break
                                @case('canceled')
                                    <span class="badge badge-danger">Cancelado</span>
                                    @break
                                @case('complete')
                                    <span class="badge badge-info">Completo</span>
                                    @break
                                @default
                                    
                            @endswitch
                        </td>
                        <td class="td-actions">
                            <a href="{{ route('appointments.edit', $ap->id) }}" class="btn-action"><i class="fas fa-pencil-alt"></i></a>
                            <form method="POST" action="{{ route('appointments.cancel', $ap->id) }}" class="remove-form" onsubmit="return confirm('Você realmente quer cancelar este agendamento?');">
                                @method('DELETE')
                                @csrf
                                <button class="btn-action"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            Não encontramos nenhuma consulta.
        </div>
    @endif --}}

@endsection
