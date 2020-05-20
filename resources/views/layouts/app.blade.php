<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shopping') }}</title>
    @yield('extra-script')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
	<link href="{{asset('css/rating.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('tpauthad/vendor/fontawesome-free/css/all.min.css')}}">
</head>
<body>
    <div id="app">
        @include('message.alert')
        @include('layouts.nav')
        <main>
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{asset('js/rating.js')}}" type="text/javascript"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
    @yield('extra-js')
</body>

</html>
