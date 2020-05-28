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
    <!--Image-->
<link rel="stylesheet" type="text/css" href="{{asset('aStar/styles/bootstrap-4.1.3/bootstrap.css') }}">
<link href="{{asset('aStar/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('aStar/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('aStar/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('aStar/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('aStar/styles/categories.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('aStar/styles/categories_responsive.css') }}">
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
    <!--Image-->
    <script src="{{asset('aStar/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{asset('aStar/styles/bootstrap-4.1.3/popper.js') }}"></script>
    <!-- <script src="{{asset('aStar/styles/bootstrap-4.1.3/bootstrap.min.js') }}"></script> -->
    <script src="{{asset('aStar/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{asset('aStar/plugins/easing/easing.js') }}"></script>
    <script src="{{asset('aStar/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{asset('aStar/plugins/Isotope/fitcolumns.js') }}"></script>
    <script src="{{asset('aStar/js/categories.js') }}"></script>
    
    <script>

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
    @yield('extra-js')
</body>

</html>
