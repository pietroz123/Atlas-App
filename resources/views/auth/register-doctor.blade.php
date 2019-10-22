@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="{{ route('register.doctor') }}" aria-label="{{ __('Register') }}">
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
            <label for="professional_statement">Declaração Profissional</label>

            <textarea id="professional_statement" type="text" class="form-control @error('professional_statement') is-invalid @enderror" name="professional_statement" required autocomplete="professional_statement" autofocus>{{ old('professional_statement') }}</textarea>

            @error('professional_statement')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="practicing_from">Praticando desde</label>

            <input type="date" name="practicing_from" id="practicing_from" class="form-control @error('practicing_from') is-invalid @enderror" value="{{ old('practicing_from') }}" required autocomplete="practicing_from" autofocus>

            @error('practicing_from')
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
            <label for="address">Endereço</label>

            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required autocomplete="address" autofocus>

            @error('address')
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
@endsection
