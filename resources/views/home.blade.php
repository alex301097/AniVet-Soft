@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/slider_swiper.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700">
@endsection
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-gradient-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Inicio</h6>
                  <h2 class="text-white mb-0">Información</h2>
                </div>

              </div>
            </div>
            <div class="card-body">
              <div class="container">


              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
