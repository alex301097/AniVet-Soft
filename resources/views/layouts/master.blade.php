<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AniVet-Soft | Veterinaria Yugo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::to('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::to('bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::to('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::to('dist/css/skins/_all-skins.min.css') }}">
    <!-- Pace style -->
    <link rel="stylesheet" href="{{ URL::to('plugins/pace/pace.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Font Awesome -->

    <meta name="_token" content="{{ csrf_token() }}">
    <style>.hidden { display: none; visibility: hidden; } </style>

    <script src="https://kit.fontawesome.com/1364e00aa3.js"></script>
    @yield('css')
  </head>
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      @include('partials.topbar')

      <!-- =============================================== -->

      @include('partials.sidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('contenido')
      </div>
      <!-- /.content-wrapper -->

      @include('partials.footer')

      {{-- @include('partials.control-sidebar') --}}
    </div>
    <!-- ./wrapper -->

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- jQuery 3 -->
    <script src="{{ URL::to('bower_components/jquery/dist/jquery.min.js') }}"></script>
    {{-- <!-- AJAX and Jquery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> --}}
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ URL::to('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- PACE -->
    <script src="{{ URL::to('bower_components/PACE/pace.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ URL::to('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::to('bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::to('dist/js/demo.js') }}"></script>
    <!-- page script -->
    <script type="text/javascript">
      // To make Pace works on Ajax calls
      $(document).ajaxStart(function () {
        Pace.restart()
      });
    </script>
    @yield('scripts')
  </body>
</html>
