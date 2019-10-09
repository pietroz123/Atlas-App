@extends('layouts.app')

@section('title', 'Médico • Dr. Humberto Cenci Guimarães')

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
                    <p>Oftalmologia</p>
                    <h4 class="doctor-info-header">
                        <span>Formação</span>
                    </h4>
                    <p>Graduado em Medicina pela Pontifícia Universidade Católica de São Paulo (1998)</p>
                </div>
    
            </aside>
            {{-- END DOCTOR ASIDE --}}
        
            {{-- BEGIN DOCTOR INFORMATION --}}
            <section class="doctor-information p-3">

                <h4 class="doctor-name">Humberto Cenci Guimarães</h4>
                <p class="doctor-crm">CRM SP95874</p>
                <p class="doctor-type">Médico</p>
                <div class="star-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>(18 avaliações)</span>
                </div>

                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link sobre active" id="sobre-tab" data-toggle="tab" href="#sobre" role="tab" aria-controls="sobre"
                            aria-selected="true">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link agenda" id="agenda-tab" data-toggle="tab" href="#agenda" role="tab" aria-controls="agenda"
                            aria-selected="false">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link avaliacoes" id="avaliacoes-tab" data-toggle="tab" href="#avaliacoes" role="tab" aria-controls="avaliacoes"
                            aria-selected="false">Avaliações</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="sobre" role="tabpanel" aria-labelledby="sobre-tab">
                        Raw denim you
                        probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master
                        cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                        keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                        placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi
                        qui.
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
                    <div class="tab-pane fade" id="avaliacoes" role="tabpanel" aria-labelledby="avaliacoes-tab">
                        Etsy mixtape
                        wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack
                        lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard
                        locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                        squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                        etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog
                        stumptown. Pitchfork sustainable tofu synth chambray yr.
                    </div>
                </div>

            </section>
            {{-- END DOCTOR INFORMATION --}}
    
        </article>
        {{-- END DOCTOR PROFILE --}}

    </div>
    
@endsection