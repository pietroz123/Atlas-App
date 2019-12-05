@extends('layouts.app')

@section('title', 'Médico • '.$doctor->full_name)

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
@endsection

@section('content')

    <div class="container">

        {{-- BEGIN DOCTOR PROFILE --}}
        <article class="doctor-profile">
    
            {{-- BEGIN DOCTOR ASIDE --}}
            <aside class="doctor-aside d-flex flex-column align-items-center p-3">
    
                <div class="doctor-img-container">
                    <img src="{{ asset('img/doctorr.jpg') }}" class="doctor-img" alt="Humberto Cenci Guimarães">
                </div>
                <div class="doctor-info text-center mt-3">
                    <h4 class="doctor-info-header">
                        <span>Especialidade</span>
                    </h4>
                    <p>{{ $doctor->specialties()->get()->pluck('name')->first() }}</p>
                    <h4 class="doctor-info-header">
                        <span>Formação</span>
                    </h4>
                    <p>Graduado em Medicina pela Pontifícia Universidade Católica de São Paulo (1998)</p>
                </div>
    
            </aside>
            {{-- END DOCTOR ASIDE --}}
        
            {{-- BEGIN DOCTOR INFORMATION --}}
            <section class="doctor-information p-3">

                <h4 class="doctor-name">{{ $doctor->full_name }}</h4>
                <p class="doctor-crm">CRM SP95874</p>
                <p class="doctor-type">Médico</p>
                <div class="star-rating">
                    @for ($i = 0; $i < $avgRating; $i++)
                        <i class="fas fa-star"></i>
                    @endfor
                    @for ($i = 0; $i < 5 - $avgRating; $i++)
                        <i class="far fa-star"></i>
                    @endfor
                    <span>({{ $countRatings }} avaliações)</span>
                </div>

                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link about active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                            aria-selected="true">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link agenda" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda"
                            aria-selected="false">Agenda</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link avaliacoes" id="avaliacoes-tab" data-toggle="tab" href="#avaliacoes" role="tab" aria-controls="avaliacoes"
                            aria-selected="false">Avaliações</a>
                    </li> --}}
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <div class="d-flex">
                            <div class="doctor-about-address">
                                <h4 class="doctor-about-header mb-3">Endereço</h4>
                                <p>{{ $doctor->clinic->address }}</p>
                                <p>{{ $doctor->clinic->city->city_name }} - {{ $doctor->clinic->city->state->state_abbrev }}</p>
                            </div>
                            <div class="doctor-about-contact ml-5">
                                <h4 class="doctor-about-header mb-3">Informações de Contato</h4>
                                <div class="row">
                                    <div class="col-4">Médico:</div>
                                    <div class="col mb-3">{{ $doctor->phone_number }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-4">Clínica:</div>
                                    <div class="col">{{ $doctor->clinic->phone_number }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                        <div class="doctor-found profile">
                            <div class="doctor-calendar">
                                <button class="calendar-nav calendar-nav-prev">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                            
                                <div class="calendar profile locked">
                                    <div class="lock-area profile">
                                        
                                        {{-- Essa é a div do SLICK --}}
                                        <div class="calendar-schedule">
                            
                                            {{-- Essa div repete --}}
                                            @php
                                                $date = date('Y-m-d');
                                            @endphp
                                            @while (strtotime($date) <= strtotime('+1 week'))
                                                <div class="calendar-day">
                                                    <div class="calendar-day-date">
                                                        <span class="day-name">{{ date('D', strtotime($date)) . '.' }}</span>
                                                        <span class="day-date">{{ date('d M', strtotime($date)) }}</span>
                                                    </div>
                                                    <div class="calendar-day-slots d-flex flex-column">
                                                        @php
                                                            $availabilities = $doctor->availabilities;
                                                            $morning = $availabilities->where('period', 'morning')->first();
                                                            $afternoon = $availabilities->where('period', 'afternoon')->first();
                                                            $morningStart = date('H:i', strtotime($morning->start_time));
                                                        @endphp
                                                        @while (strtotime($morningStart) < strtotime($morning->end_time))
                                                            @if (!App\Appointment::where('probable_start_time', $morningStart)->where('appointment_date', $date)->where('doctor_id', $doctor->id)->get()->first())
                                                                <a href="{{ route('appointments.bookpage',  [
                                                                    'doctor_id' => $doctor->id,
                                                                    'ap_date' => $date,
                                                                    'ap_time' => $morningStart
                                                                ]) }}" class="calendar-slot available">{{ $morningStart }}</a>
                                                            @else
                                                                <a class="calendar-slot not-available" title="Horário não disponível" href="#!">-</a>
                                                            @endif
                                                            @php
                                                                $morningStart = date('H:i', strtotime("+15 minutes", strtotime($morningStart)) );
                                                            @endphp
                                                        @endwhile
                                                        @for ($i = 0; $i < 3; $i++)
                                                            <a class="calendar-slot not-available" title="Horário não disponível" href="#!">-</a>
                                                        @endfor
                                                        @php
                                                            $afternoonStart = date('H:i', strtotime($afternoon->start_time));
                                                        @endphp
                                                        @while (strtotime($afternoonStart) < strtotime($afternoon->end_time))
                                                            @if (!App\Appointment::where('probable_start_time', $afternoonStart)->where('appointment_date', $date)->where('doctor_id', $doctor->id)->get()->first())
                                                                <a href="{{ route('appointments.bookpage',  [
                                                                    'doctor_id' => $doctor->id,
                                                                    'ap_date' => $date,
                                                                    'ap_time' => $afternoonStart
                                                                ]) }}" class="calendar-slot available">{{ $afternoonStart }}</a>
                                                            @else
                                                                <a class="calendar-slot not-available" title="Horário não disponível" href="#!">-</a>
                                                            @endif
                                                            @php
                                                                $afternoonStart = date('H:i', strtotime("+15 minutes", strtotime($afternoonStart)) );
                                                            @endphp
                                                        @endwhile
                                                    </div>
                                                </div>
                                                @php
                                                    $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                                                @endphp
                                            @endwhile
                                            {{-- Essa div repete --}}
                            
                                        </div>
                                        {{-- Essa é a div do SLICK --}}
                            
                                    </div>
                                    
                                    <button class="btn-view-more closed">Ver mais horários</button>
                                    
                            
                                </div>
                            
                                <button class="calendar-nav calendar-nav-next">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            {{-- END CALENDAR --}}
                        </div>
                    </div>
                    {{-- <div class="tab-pane fade" id="avaliacoes" role="tabpanel" aria-labelledby="avaliacoes-tab">
                        <div class="comment-wrapper">
                            <p class="author">
                                <span class="name">Bianca</span>
                                •
                                <span class="time">Há 3 meses</span>
                            </p>
                            <p class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </p>
                            <p class="comment">
                                Médico muito atencioso. Recomendo!
                            </p>
                        </div>
                    </div> --}}
                </div>

            </section>
            {{-- END DOCTOR INFORMATION --}}
    
        </article>
        {{-- END DOCTOR PROFILE --}}

    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/doctors/profile.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
@endsection