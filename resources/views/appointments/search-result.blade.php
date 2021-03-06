@extends('layouts.search')

@section('title', 'Resultado da Busca')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
@endsection

@section('header-bar')
    <header id="header-search">
        <nav class="navbar navbar-expand-md navbar-light w-100" id="search-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/icons/atlas-heart.svg') }}" class="main-icon" alt="Ícone principal da página">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>
                            <div class="pt-3">
                                <a href="{{ url()->previous() }}" class="rounded-pill btn-info py-2 px-3">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Voltar
                                </a>
                            </div>
                        </li>
                        <li>
                            {{-- <!-- Search Input Box -->
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="text" value="Sorocaba - SP" class="input-search">
                            </div> --}}
                        </li>
                    </ul>
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        @yield('right-links')

                        <!-- Authentication Links -->

                        {{--
                        =======================================================
                        DROPDOWN MEDICO
                        =======================================================
                        --}}
                        @if (Auth::guard('doctor')->check())

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('doctor')->user()->full_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        {{--
                        =======================================================
                        DROPDOWN PACIENTE
                        =======================================================
                        --}}
                        @elseif (Auth::guard('patient')->check())

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::guard('patient')->user()->full_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-navbar dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        @else

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.doctor') }}">Entrar como Médico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.patient') }}">Entrar como Paciente</a>
                            </li>
                        
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')

    @if (count($doctors) > 0)

        <div class="doctors-found">
            <div class="p-3">

                @foreach ($doctors as $doctor)
                    @include('doctors._result-card', ['doctor' => $doctor])
                @endforeach

                {{-- Pagination --}}
                {{ $doctors->links() }}

            </div>
        </div>
    
    @else

        <div class="no-doctors-found">

            <div>
                <h2 class="text-center">Ops!</h2>
                <h3 class="text-center">Não encontramos nenhum médico.</h3>
                <div class="d-flex justify-content-center mt-5">
                    <a href="{{ route('appointments.search') }}" class="btn btn-primary go-back">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Tente realizar a busca novamente.
                    </a>
                </div>
            </div>

        </div>
        
    @endif
    
@endsection

@section('scripts')
    <script src="{{ asset('js/appointments/search-result.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
@endsection