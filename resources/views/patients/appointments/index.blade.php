@extends('layouts.dashboard')

@section('title', 'Minhas Consultas')

@section('dashboard-sidebar')
    
    @include('dashboard.patients.components.sidebar')

@endsection

@section('dashboard-content')
    
    <h2 class="mb-4">Minhas Consultas</h2>

    @if (count($appointments) > 0)
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
                            @if ($ap->status == 'complete')
                                <button class="btn-action js-btn-rate" data-ap-id="{{ $ap->id }}"><i class="far fa-star"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            Não encontramos nenhuma consulta.
        </div>
    @endif

    <!-- Central Modal Small -->
    <div class="modal fade" id="modal-rating" tabindex="-1" role="dialog" aria-labelledby="modal-rating-label"
    aria-hidden="true">
        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-sm" role="document">
            <form id="rate-appointment-form" method="POST" action="{{ route('patients.dashboard.ratings.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100" id="modal-rating-label">Avaliar Agendamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="rating">
                            <input type="radio" required id="star5" name="rating" value="5"><label class = "full" for="star5" title="Excelente - 5"></label>
                            <input type="radio" required id="star4" name="rating" value="4"><label class = "full" for="star4" title="Bom - 4"></label>
                            <input type="radio" required id="star3" name="rating" value="3"><label class = "full" for="star3" title="Mediano - 3"></label>
                            <input type="radio" required id="star2" name="rating" value="2"><label class = "full" for="star2" title="Ruim - 2"></label>
                            <input type="radio" required id="star1" name="rating" value="1"><label class = "full" for="star1" title="Péssimo - 1 star"></label>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Avaliar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Central Modal Small -->

@endsection

@section('scripts')
    <script src="{{ asset('js/appointments/dashboard-ap-index.js') }}"></script>
@endsection