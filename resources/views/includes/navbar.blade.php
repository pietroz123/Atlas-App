<nav class="navbar navbar-expand-md navbar-light" id="main-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/icons/atlas-heart.svg') }}" class="main-icon" alt="Ícone principal da página">
            <span class="brand">atlas</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

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