@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')

    <section id="user-selection">

        <div class="row">
            <div class="col-7">
                <h2 class="mt-7rem">A plataforma perfeita para as suas necessidades. Seja você um paciente, ou médico.</h2>
                <p>Com a nossa plataforma, marcar uma consulta vai ser mais fácil do que nunca.</p>
            </div>
        </div>

        <div class="choices">
            <div class="choice">
                <div class="circle patients"></div>
                <p>Sou um paciente</p>
            </div>
            <div class="choice">
                <div class="circle doctors"></div>
                <p>Sou um médico</p>
            </div>
        </div>

    </section>
    
@endsection