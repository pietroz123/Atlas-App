@extends('layouts.app')

@section('title', 'Médico • '.$doctor->full_name)

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
                        Food truck fixie
                        locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit,
                        blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                        Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum
                        PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS
                        salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                        sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                        stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.
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