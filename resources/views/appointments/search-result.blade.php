@extends('layouts.search')

@section('title', 'Resultado da Busca')

@section('header-bar')
    <header id="header-search">
        <div class="header-logo">
            <img src="{{ asset('img/icons/atlas-heart.png') }}" alt="Logo do Atlas" style="width: 49px">
        </div>
        <div class="input-wrapper">
            <div class="input-icon">
                <i class="fas fa-search"></i>
            </div>
            <input type="text" value="Sorocaba - SP" class="input-search">
        </div>
        <div>
            <a href=""></a>
        </div>
    </header>
@endsection

@section('content')

    
@endsection