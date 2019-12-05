@extends('layouts.app')

@section('title', 'Cadastro de Médico')

@section('content')
<div class="container">

    <h4 class="mt-4">Se cadastrar gratuitamente como médico.</h4>

    <form class="mt-5 form-register" method="POST" action="{{ route('register.doctor') }}" aria-label="Cadastrar">
        @csrf

        <div class="row">
            <div class="col pr-5">
                <h5 class="mb-4">Informações Básicas</h5>

                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="crm">CRM</label>
                            <input id="crm" type="text" class="form-control" required autofocus>
                            <span class="invalid-feedback" role="alert">
                                <strong>CRM inválido</strong>
                            </span>
                            <span class="valid-feedback" role="alert">
                                <strong>CRM válido</strong>
                            </span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="full_name">Nome Completo</label>
                            <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" required autocomplete="full_name" autofocus>
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
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

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="cell_phone_number">Celular</label>
                
                            <input type="text" name="cell_phone_number" id="cell_phone_number" class="form-control" required autofocus>
                
                            {{-- @error('cell_phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="phone_number">Telefone</label>
                
                            <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="password">Senha</label>
                
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="password-confirm">Confirmar senha</label>
                
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                </div>

                
            </div>
            <div class="col pl-5">
                <h5 class="mb-4">Informações da Profissão</h5>

                <div class="form-group mt-3">
                    <label for="practicing_from">Praticante desde</label>
        
                    <input type="date" name="practicing_from" id="practicing_from" class="form-control @error('practicing_from') is-invalid @enderror" value="{{ old('practicing_from') }}" required autocomplete="practicing_from" autofocus>
        
                    @error('practicing_from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="specialties">Especialidades</label>
                    <select class="browser-default custom-select" id="specialties" name="specialties[]" multiple="multiple" required>
                        <option></option>
                        @foreach ($specialties as $specialty)
                            <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="clinic">Clínica</label>
                    <select class="browser-default custom-select" id="clinic" name="clinic" required>
                        <option></option>
                        @foreach ($clinics as $clinic)
                            <option value="{{ $clinic->id }}">{{ $clinic->address }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="professional_statement">Declaração Profissional</label>
        
                    <textarea id="professional_statement" type="text" class="form-control @error('professional_statement') is-invalid @enderror" name="professional_statement" required autocomplete="professional_statement">{{ old('professional_statement') }}</textarea>
        
                    @error('professional_statement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                

            </div>
        </div>
   
        <div class="d-flex justify-content-end">
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary" id="btn-register-doctor">
                    Registrar
                </button>
            </div>
        </div>
    </form>

</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/auth/register-doctor.js') }}"></script>
@endsection