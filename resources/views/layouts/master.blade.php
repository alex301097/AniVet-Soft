<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Creative Tim">
    <title>AniVet-Soft</title>
    <!-- Favicon -->
    <link href="{{ URL::to('img/brand/favicon.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ URL::to('vendor/nucleo/css/nucleo.css') }}"  rel="stylesheet">
    <link href="{{ URL::to('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ URL::to('css/argon.css?v=1.0.0') }}" rel="stylesheet">

    <meta name="_token" content="{{ csrf_token() }}">
    <style>.hidden { display: none; visibility: hidden; } </style>
    @yield('css')
  </head>
  <body>
    @include('partials.nav_left')
    <div class="main-content">
        @include('partials.nav_top')
        @include('partials.header_body')

      <div class="container-fluid mt--7">
        @yield('contenido')

        @include('partials.footer')
      </div>
    </div>
      <!-- SweetAlert2 -->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <!-- AJAX and Jquery -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
      <!-- Argon Scripts -->
      <!-- Core -->
      <script src="{{ URL::to('vendor/jquery/dist/jquery.min.js') }}"></script>
      <script src="{{ URL::to('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
      <!-- Optional JS -->
      {{-- <script src="{{ URL::to('vendor/chart.js/dist/Chart.min.js') }}"></script>
      <script src="{{ URL::to('vendor/chart.js/dist/Chart.extension.js') }}"></script> --}}
      <!-- Argon JS -->
      <script src="{{ URL::to('js/argon.js?v=1.0.0') }}"></script>
      {{--@include('partials.errors')
      @include('sweet::alert')--}}
      @yield('scripts')

  </body>
</html>
