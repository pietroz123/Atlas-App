@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')

    <section id="user-selection">
        <div class="container">

            <div class="row">
                <div class="col-7">
                    <h2 class="mt-2rem mb-3">A plataforma perfeita para as suas necessidades. Seja você um paciente, ou médico.</h2>
                    <p class="f-18">Com a nossa plataforma, marcar uma consulta vai ser mais fácil do que nunca.</p>
                </div>
            </div>
    
            <div class="choices">
                <a href="/clientes/pacientes" class="choice">
                    <div class="circle patients"></div>
                    <p>Sou um paciente</p>
                </a>
                <a href="#!" class="choice">
                    <div class="circle doctors"></div>
                    <p>Sou um médico</p>
                </a>
            </div>

        </div>
    </section>
    
@endsection