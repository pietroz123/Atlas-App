@extends('layouts.app')

@section('title', 'Cadastro de Paciente')

@section('content')
<div class="container">

    <h4 class="mt-4">Se cadastrar gratuitamente como paciente.</h4>

    <div class="row mt-5">
        <div class="col col-register-form">

            <form method="POST" class="form-register" action="{{ route('register.patient') }}" aria-label="{{ __('Register') }}">
                @csrf
                <div class="form-group">
                    <label for="full_name">Nome Completo</label>

                    <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>

                    @error('full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="username">Nome de Usuário</label>

                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>

                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Telefone</label>

                    <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirmar senha</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Registrar
                    </button>
                </div>
            </form>

        </div>
        <div class="col col-register-social">
            
            <p class="mb-4">Ou faça o cadastro com sua rede social preferida:</p>
            
            <div class="mt-4 mb-4">
                <a href="#!">
                    <img src="{{ asset('img/icons/social/facebook.png') }}" class="social-icon" alt="Ícone Facebook">
                </a>
                <a href="#!">
                    <img src="{{ asset('img/icons/social/google.png') }}" class="social-icon" alt="Ícone Google">
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
