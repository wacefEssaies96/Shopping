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
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @endguest
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
