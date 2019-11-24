@extends('layouts.dashboard')

@section('title', 'Minhas Consultas')

@section('dashboard-sidebar')
    
    @include('dashboard.patients.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2>Minhas Consultas</h2>

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
                    <td>{{ $ap->doctor->full_name }}</td>
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
                        <button class="btn-action view"><i class="fas fa-eye"></i></button>
                        <a href="#!" class="btn-action"><i class="fas fa-pencil-alt"></i></a>
                        <button class="btn-action"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

@endsection
