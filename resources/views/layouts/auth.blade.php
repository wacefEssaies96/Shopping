<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('tpauthad/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('tpauthad/css/sb-admin-2.min.css') }}" rel="stylesheet"> 
  <link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
	<link href="{{asset('css/rating.css')}}" rel="stylesheet" type="text/css">
</head>
@auth

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
  
    @admin
      @include('layouts.admin.sidebaradmin')
    @endadmin
     
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        @admin
          @include('layouts.admin.topbaradmin')
        @endadmin
          @yield('content')
      </div>
       <!-- End Content  -->
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
  </div>
  <!-- End Page Wrapper -->


@else
<body >
  <div class="container">
    @yield('content')
  </div>
@endauth


    
<script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/plugins2.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('tpauthad/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('tpauthad/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('tpauthad/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('tpauthad/js/sb-admin-2.min.js') }}"></script>


  <!-- Page level plugins -->
  <script src="{{ asset('tpauthad/vendor/chart.js/Chart.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <!-- <script src="{{ asset('tpauthad/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('tpauthad/js/demo/chart-pie-demo.js') }}"></script> -->
  <script src="{{asset('js/rating.js')}}" type="text/javascript"></script>
  
</body>

</html>
