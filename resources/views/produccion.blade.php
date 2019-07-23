@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/slider_swiper.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">
  <style>
  h1 { font-size: 50px; }
  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
  a { color: white; text-decoration: none; }
  a:hover { color: white; text-decoration: none; }
</style>
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ERROR
      <small>Pagina no encontrada</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Pagina en construcción</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="container">
            <article>
                <h1 style="color: white;">Actualmente la pagina se encuentra en desarrollo!</h1>
                <div style="color: white;">
                    <p style="color: white;">Perdón por el inconveniente pero la pagina se encuentra realizando un mantenimiento. Si lo necesitas siempre puedes <u><a href="mailto:alexandervillalobos50@gmail.com">contactarnos</a></u>, además nosotros esperamos finalizar pronto!</p>
                    <p style="color: white;">&mdash; El equipo</p>
                </div>
            </article>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
@section('scripts')
@endsection
