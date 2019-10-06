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

    <div class="doctors-found">
        <div class="p-3">

            <div class="row doctor-found">
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

                    {{-- CALENDAR --}}
                    <div class="doctor-calendar">
                        <button class="calendar-nav calendar-nav-prev">
                            <i class="fas fa-chevron-left"></i>
                        </button>

                        <div class="calendar locked">
                            <div class="lock-area">
                                
                                {{-- Essa é a div do SLICK --}}
                                <div class="calendar-schedule">
    
                                    {{-- Essa div repete --}}
                                    <div class="calendar-day">
                                        <div class="calendar-day-date">
                                            <span class="day-name">Hoje</span>
                                            <span class="day-date">13 Set</span>
                                        </div>
                                        <div class="calendar-day-slots d-flex flex-column">
                                            <a href="#!" class="calendar-slot available">13:00</a>
                                            <a href="#!" class="calendar-slot available">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">15:30</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot available">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot available">15:30</a>
                                        </div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-date">
                                            <span class="day-name">Hoje</span>
                                            <span class="day-date">13 Set</span>
                                        </div>
                                        <div class="calendar-day-slots d-flex flex-column">
                                            <a href="#!" class="calendar-slot available">13:00</a>
                                            <a href="#!" class="calendar-slot available">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">15:30</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot available">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot available">15:30</a>
                                        </div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-date">
                                            <span class="day-name">Hoje</span>
                                            <span class="day-date">13 Set</span>
                                        </div>
                                        <div class="calendar-day-slots d-flex flex-column">
                                            <a href="#!" class="calendar-slot available">13:00</a>
                                            <a href="#!" class="calendar-slot available">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">15:30</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot available">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot available">15:30</a>
                                        </div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-date">
                                            <span class="day-name">Hoje</span>
                                            <span class="day-date">13 Set</span>
                                        </div>
                                        <div class="calendar-day-slots d-flex flex-column">
                                            <a href="#!" class="calendar-slot available">13:00</a>
                                            <a href="#!" class="calendar-slot available">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">15:30</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot available">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot available">15:30</a>
                                        </div>
                                    </div>
                                    <div class="calendar-day">
                                        <div class="calendar-day-date">
                                            <span class="day-name">Hoje</span>
                                            <span class="day-date">13 Set</span>
                                        </div>
                                        <div class="calendar-day-slots d-flex flex-column">
                                            <a href="#!" class="calendar-slot available">13:00</a>
                                            <a href="#!" class="calendar-slot available">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">15:30</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:00</a>
                                            <a href="#!" class="calendar-slot not-available" title="Horário indisponível">13:30</a>
                                            <a href="#!" class="calendar-slot available">14:00</a>
                                            <a href="#!" class="calendar-slot available">14:30</a>
                                            <a href="#!" class="calendar-slot available">15:00</a>
                                            <a href="#!" class="calendar-slot available">15:30</a>
                                        </div>
                                    </div>
                                    {{-- Essa div repete --}}
    
                                </div>
                                {{-- Essa é a div do SLICK --}}

                            </div>
                            
                            <button class="btn-view-more closed">Ver mais horários</button>
                            

                        </div>

                        <button class="calendar-nav calendar-nav-next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    {{-- END CALENDAR --}}

                </div>
                <div class="col-4">
                    {{-- <img border="0" src="https://maps.googleapis.com/maps/api/staticmap?center=Brooklyn+Bridge,New+York,NY&zoom=13&size=600x300&maptype=roadmap&markers=color:blue%7Clabel:S%7C40.702147,-74.015794&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284&key={{ env('GOOGLE_MAPS_API') }}" alt="Points of Interest in Lower Manhattan"> --}}
                </div>
            </div>

        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/appointments/search-result.js') }}"></script>
@endsection