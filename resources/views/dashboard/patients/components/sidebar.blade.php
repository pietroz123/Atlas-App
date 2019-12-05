<div class="dashboard-logo">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/icons/atlas-heart.svg') }}" class="main-icon" alt="Ícone principal da página">
        <span class="brand">atlas</span>
    </a>
</div>

<hr>

<div class="d-flex flex-column justify-content-center align-items-center">
    <img src="https://image.flaticon.com/icons/svg/149/149071.svg" class="rounded-circle user-image mb-2" alt="">
    <p>{{ Auth::guard('patient')->user()->full_name }}</p>
</div>

<hr>

<div>

    <span class="dashboard-sidebar-divider">Navegação</span>
    <ul class="dashboard-sidebar-items">
        <li class="dashboard-sidebar-item">
            <a href="/">
                <i class="fas fa-home"></i>
                Página Principal
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="{{ route('patients.dashboard.appointments.index') }}">
                <i class="far fa-calendar-alt"></i>
                Consultas
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="{{ route('appointments.search') }}">
                <i class="far fa-calendar-check"></i>
                Buscar Agendamentos
            </a>
        </li>
    </ul>

    <span class="dashboard-sidebar-divider">Dados Gerais</span>
    <ul class="dashboard-sidebar-items">
        {{-- <li class="dashboard-sidebar-item">
            <a href="#!">
                <i class="far fa-address-card"></i>
                Dados Cadastrais
            </a>
        </li>
        <li class="dashboard-sidebar-item">
            <a href="#!">
                <i class="fas fa-cog"></i>
                Configurações
            </a>
        </li> --}}
        <li class="dashboard-sidebar-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>


</div>