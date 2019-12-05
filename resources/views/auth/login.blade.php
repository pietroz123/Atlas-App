@extends('layouts.app')

@section('title', 'Login de '. ucwords($url))

@section('content')
<div class="container">

    <h4 class="mt-4">Bem Vindo de Volta! ({{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }})</h4>

    <div class="row mt-5">
        <div class="col col-register-form">
            @isset($url)
            <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
            @else
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @endisset
                @csrf
        
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Lembrar de mim
                        </label>
                    </div>
                </div>
        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Realizar Login
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="col col-register-social">
            
            @if (isset($url) && $url == 'patient')
                <p>Realizar login com:</p>
                <div class="mt-4 mb-4">
                    <a href="{{ url('/redirect/facebook') }}">
                        <img src="{{ asset('img/icons/social/facebook.png') }}" class="social-icon" alt="Ícone Facebook">
                    </a>
                    <a href="{{ url('/redirect/google') }}">
                        <img src="{{ asset('img/icons/social/google.png') }}" class="social-icon" alt="Ícone Google">
                    </a>
                </div>
            @endif

            <span>Não possui uma conta?</span>
            @if (isset($url) && $url == 'doctor')
                <span class="d-block">
                    <a href="{{ url('/cadastro/medico') }}">
                        Se registrar como médico.
                    </a>
                </span>
            @endif
            @if (isset($url) && $url == 'patient')
                <span class="d-block">
                    <a href="{{ url('/cadastro/paciente') }}">
                        Se registrar como paciente.
                    </a>
                </span>
            @endif
        </div>
    </div>
</div>

@endsection