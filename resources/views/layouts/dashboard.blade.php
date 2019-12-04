<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Ícones -->
        <link rel="shortcut icon" href="{{ asset('img/icons/atlas-heart.png') }}" type="image/x-icon">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') • Atlas</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        
        <!-- Styles -->
        <link href="{{ asset('css/mdbootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
        
    </head>
    
    <body>
        <div id="app">
            <main class="@yield('main-class')">
                <div class="dashboard-wrapper">
                    <aside class="dashboard-sidebar {{ getActiveGuard() }}">
                        @yield('dashboard-sidebar')
                    </aside>
                    <section class="dashboard-content">
                        @include('includes.alerts')
                        @yield('dashboard-content')
                    </section>
                </div>
            </main>
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/mdbootstrap.js') }}"></script>            {{-- MDBootsrap --}}
        @yield('scripts')
    </body>

</html>
