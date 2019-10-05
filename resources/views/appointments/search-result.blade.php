@extends('layouts.search')

@section('title', 'Resultado da Busca')

@section('header-bar')
    <header id="header-search">
        <nav class="navbar navbar-expand-md navbar-light w-100" id="search-navbar">
            <div class="container">
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
                            <!-- Search Input Box -->
                            <div class="input-wrapper">
                                <div class="input-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <input type="text" value="Sorocaba - SP" class="input-search">
                            </div>
                        </li>
                    </ul>
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @yield('right-links')
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@endsection

@section('content')

    <div class="doctor-found">

        <div class="container">
            <div class="row">
                <div class="col doctor-details">
                    <div class="doctor-img-container">
                        <img src="{{ asset('img/doctorr.jpg') }}" class="doctor-img" alt="Humberto Cenci Guimarães">
                    </div>
                    <div class="doctor-info">
                        <p class="doctor-specialty">Oftalmologista</p>
                        <p class="doctor-name">Dr. Humberto Cenci Guimarães</p>
                        <div class="star-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(18 avaliações)</span>
                        </div>
                        <p class="doctor-phone">
                            <i class="fas fa-phone-alt"></i>
                            (15) 3217-7283
                        </p>
                        <p class="doctor-address">
                            <i class="fas fa-map-marker-alt"></i>
                            Avenida Barão de Tatuí
                        </p>
                    </div>
                </div>
                <div class="col">
                    {{-- <img border="0" src="https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284&key={{ env('GOOGLE_MAPS_API') }}" alt="Points of Interest in Lower Manhattan"> --}}
                </div>
            </div>
        </div>

    </div>
    
@endsection