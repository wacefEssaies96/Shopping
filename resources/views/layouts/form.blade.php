<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    @yield('extra-script')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
    
    
</head>

<!-- <body  style="background-image: url({{ asset('img/bg-img/bgnav.jpg') }});background-repeat: no-repeat;size:100% 100%;background-size: 100% 100%;"> -->
<body  >
    <div id="form"  >
        @include('layouts.navformulaire')

        <main class="py-4" >
            @yield('content')
        </main>


    </div>
</body>
</html>
