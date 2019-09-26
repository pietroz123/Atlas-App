@extends('layouts.app')

@section('title', 'Médicos')

@section('content')

    <section id="customers-hero">
        <div class="container">

            <div class="row">
                <div class="col-5">
                    <h2 class="mt-7rem">Disponibilize suas consultas</h2>
                    <p class="f-18 mt-3">Com a nossa plataforma, você pode disponibilizar suas consultas com facilidade e sem custo de adesão</p>
                    <a class="cta-home mt-3">
                        <span class="content">Começar agora</span>
                        <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                    </a>
                    <span class="d-block mt-2 f-13">Não existem taxas de adesão à plataforma.</span>
                </div>
                <div class="col">
                    <img src="{{ asset('img/back/medicos.svg') }}" class="medics-background" alt="Grupo de médicos">
                </div>
            </div>

        </div>
    </section>

    <section id="patients-features">
        <div class="container">

            <h2>O que você irá encontrar na nossa plataforma?</h2>
            <div class="features p-5">
                <div class="feature">
                    <img src="{{ asset('img/icons/eye.png') }}" class="icon" alt="">
                    <span class="feature-header">Tenha visibilidade</span>
                    <span class="feature-description">Com nossa a plataforma ficará muito fácil seus clientes te encontrarem</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/agenda.png') }}" class="icon" alt="">
                    <span class="feature-header">Gerencie sua agenda</span>
                    <span class="feature-description">Temos uma página exclusiva para sua agenda, para que você não se perca nunca</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/cash-back.png') }}" class="icon" alt="">
                    <span class="feature-header">Facilidade de recebimento</span>
                    <span class="feature-description">Garantimos que o dinheiro de cada consulta realizada cairá diretamente em sua conta</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/coin.png') }}" class="icon" alt="">
                    <span class="feature-header">Preço justo</span>
                    <span class="feature-description">Garantimos zero taxas de adesão, e possibilidade de anunciar suas consultas por um preço justo</span>
                </div>
                <div class="feature">
                    <img src="{{ asset('img/icons/chatting.png') }}" class="icon" alt="">
                    <span class="feature-header">Receba avaliações</span>
                    <span class="feature-description">Ao final de cada consulta, seus clientes poderão deixar uma avaliação do seu atendimento</span>
                </div>
            </div>

        </div>
    </section>

    <section id="start">
        <div class="container">

            <div class="row">
                <div class="col-6">
                    <h2 class="mb-4">Começe organizar seus compromissos e agenda <span class="underlined">hoje</span></h2>
                </div>
            </div>
            <a class="cta-home mt-3 mb-2">
                <span class="content">Começar agora</span>
                <span class="icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
            </a>
            <span class="d-block mt-2 f-13">Não existem taxas de adesão à plataforma.</span>

        </div>
    </section>
    
@endsection