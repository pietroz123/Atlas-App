@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')

    <section id="patients-hero">

        <div class="row">
            <div class="col-7">
                <h2 class="mt-7rem">Todas as suas consultas na palma da sua mão.</h2>
                <p class="f-18 mt-3">Com a nossa plataforma, marcar uma consulta vai ser ainda mais fácil.</p>
                <a class="cta-home mt-3">
                    <span class="content">Começar agora</span>
                    <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                </a>
                <span class="d-block mt-2 f-13">Não existem taxas de adesão à plataforma.</span>
            </div>
        </div>

    </section>

    <section id="patients-features">

        <h2>O que você irá encontrar na nossa plataforma?</h2>
        <div class="features">
            <div class="feature">
                <div class="icon"></div>
                <span>Encontre seu médico</span>
                <span>Pesquise por todos os médicos disponíveis em nossa plataforma</span>
            </div>
        </div>

    </section>
    
@endsection