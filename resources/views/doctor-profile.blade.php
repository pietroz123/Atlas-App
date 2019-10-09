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
                
            </section>
            {{-- END DOCTOR INFORMATION --}}
    
        </article>
        {{-- END DOCTOR PROFILE --}}

    </div>
    
@endsection