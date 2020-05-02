<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Active js -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}" defer></script>
    <script src="{{ asset('js/active.js') }}" defer></script>
    <script src="{{ asset('js/bootsrap.min.js') }}" defer></script>
    <script src="{{ asset('js/classy-nav.min.js') }}" defer></script>
    <script src="{{ asset('js/map-active.js') }}" defer></script>
    <script src="{{ asset('js/plugins.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('font/fontawesome-webfont.eot') }}" rel="stylesheet">
    <link href="{{ asset('font/fontawesome-webfont.svg') }}" rel="stylesheet">
    <link href="{{ asset('font/fontawesome-webfont.ttf') }}" rel="stylesheet">
    <link href="{{ asset('font/fontawesome-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('font/fontawesome-webfont.woff2') }}" rel="stylesheet">
    <link href="{{ asset('font/fontAwesome.otf') }}" rel="stylesheet">
    <link href="{{ asset('font/helvetica_neu_bold-webfont.ttf') }}" rel="stylesheet">
    <link href="{{ asset('font/helvetica_neu_bold-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('font/helvetica_neu_bold-webfont.woff2') }}" rel="stylesheet">
    <link href="{{ asset('font/helvetica_meduim-webfont.ttf') }}" rel="stylesheet">
    <link href="{{ asset('font/helvetica_meduim-webfont.woff') }}" rel="stylesheet">
    <link href="{{ asset('font/helvetica_meduim-webfont.woff2') }}" rel="stylesheet">
    
    <link href="{{ asset('font/fontAwesome.otf') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/classy-nav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core-style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/core-style.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link href="{{ asset('scss/_mixin.scss') }}" rel="stylesheet">
    <link href="{{ asset('scss/_responsive.scss') }}" rel="stylesheet">
    <link href="{{ asset('scss/_theme_color.scss') }}" rel="stylesheet">
    <link href="{{ asset('scss/_variables.scss') }}" rel="stylesheet">
    <link href="{{ asset('scss/style.scss') }}" rel="stylesheet">
    
    
</head>
<body style="background-image: url({{ asset('img/bg-img/bgf.jpg') }});background-repeat: no-repeat;size:100% 100%;background-size: 100% 100%;">
    <div id="form"  >
        @include('layouts.nav')

        <main class="py-4" >
            @yield('content')
        </main>


    </div>
</body>
</html>
