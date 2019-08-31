<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Ícones -->
        <link rel="shortcut icon" href="{{ asset('img/icons/logo.png') }}" type="image/x-icon">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') • Name</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        
        <!-- Styles -->
        <link href="{{ asset('css/mdbootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">      {{-- Font Awesome --}}
        @yield('styles')
        
    </head>
    
    <body>
        <div id="app">
            @include('includes.navbar')
            @yield('header-bar')
            <main class="container py-2 @yield('main-class')">
                @include('includes.alerts')
                @yield('content')
            </main>
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/mdbootstrap.js') }}"></script>            {{-- MDBootsrap --}}
        <script src="https://kit.fontawesome.com/5736e54317.js"></script>   {{-- Font Awesome --}}
        @yield('scripts')

    </body>

</html>
