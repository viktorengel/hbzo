<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="n">
  <title>HBZO | @yield('title')</title>
  <!-- Favicon -->
  <link href="{{ asset('img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

  <link href="{{ asset('plugin/sweetalert/sweetalert.css') }}" rel="stylesheet">

  <!-- Argon CSS -->
  <link href="{{ asset('css/argon.css?v=1.0.0') }}" rel="stylesheet">
  <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('plugin/sweetalert/sweetalert2.all.js') }}"></script>
  <script src="{{ asset('js/angel.js') }}"></script>

  @yield('styles')
</head>

<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ url('/') }}">
        <img src="{{ asset('img/brand/logo.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
          @include('includes.user')
      </ul>
      

      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ url('/') }}">
                <img src="{{ asset('img/brand/logo.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Navigation -->
        @include('includes.menu')
      </div>
    </div>
  </nav>

   
  <!-- Main content -->

  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="javascript:void(0)">@yield('subtitle') </a>
        
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
        @include('includes.user')
        </ul>
      </div>
    </nav>
    <!-- Header -->
    
    <!-- Page content -->
  @yield('content')
  
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  
  <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
  @yield('scripts')
  <!-- Argon JS -->
  <script src="{{ asset('js/argon.js?v=1.0.0') }}"></script>
</body>

</html>