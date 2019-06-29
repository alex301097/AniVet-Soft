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
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-gradient-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">ERROR</h6>
                  <h2 class="text-white mb-0">Pagina no encontrada</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
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
          </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
