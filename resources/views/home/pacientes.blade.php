@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')

    <section id="customers-hero">
        <div class="container">

            <div class="row">
                <div class="col-5">
                    <h2 class="mt-7rem">Todas as suas consultas na palma da sua mão.</h2>
                    <p class="f-18 mt-3">Com a nossa plataforma, marcar uma consulta vai ser ainda mais fácil.</p>
                    <a class="cta-home mt-3" href="{{ route('appointments.search') }}">
                        <span class="content">Começar agora</span>
                        <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                    <span class="d-block mt-2 f-13">Não existem taxas de adesão à plataforma.</span>
                </div>
                <div class="col">
                    <img src="{{ asset('img/back/happy-family.svg') }}" class="patients-background" alt="Família feliz">
                </div>
            </div>

        </div>
    </section>

    <section id="client-features" class="mt-3">
        <div class="container">

            <h2>O que você irá encontrar na nossa plataforma?</h2>
            <div class="features p-5">
                <div class="feature">
                    <img src="{{ asset('img/icons/mag.png') }}" class="icon" alt="">
                    <span class="feature-header">Encontre seu médico</span>
                    <span class="feature-description">Pesquise por todos os médicos disponíveis em nossa plataforma</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/calendar.png') }}" class="icon" alt="">
                    <span class="feature-header">Marque sua consulta</span>
                    <span class="feature-description">Você pode agendar sua consulta diretamente pela nossa plataforma</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/cards.png') }}" class="icon" alt="">
                    <span class="feature-header">Pagamento online</span>
                    <span class="feature-description">Realize o pagamento da sua consulta diretamente pela nossa plataforma, sem preocupações</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/coin.png') }}" class="icon" alt="">
                    <span class="feature-header">Preço justo</span>
                    <span class="feature-description">Garantimos o melhor preço pela sua consulta, sem a necessidade de pagar nenhuma mensalidade</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/feedback.png') }}" class="icon" alt="">
                    <span class="feature-header">Avalie sua consulta</span>
                    <span class="feature-description">Ao final da sua consulta, você poderá avaliar sua experiência e o médico que te atendeu</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/bell.png') }}" class="icon" alt="">
                    <span class="feature-header">Notificações</span>
                    <span class="feature-description">Nós sabemos como é ter uma rotina corrida e te avisamos sobre suas consultas</span>
                </div>
            </div>

        </div>
    </section>

    <section id="start">
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <h2 class="mb-4">Começe a agendar suas consultas online <span class="underlined">hoje</span></h2>
                </div>
            </div>
            <a class="cta-home mt-3 mb-2" href="/buscar">
                <span class="content">Começar agora</span>
                <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
            </a>
            <span class="d-block mt-2 f-13">Não existem taxas de adesão à plataforma.</span>

        </div>
    </section>
    
@endsection