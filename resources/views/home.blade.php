@extends('layouts.master')
{{-- @section('css')
  <style type="text/css">

  .inicio1 {
  background-color: #252830;
  color: white;
  font-family: "Lato";
  }

  .container-fluid {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translateY(-50%) translateX(-50%);
          transform: translateY(-50%) translateX(-50%);
  width: 100%;
  }
  .media {
  background-position: center;
  background-size: cover;
  height: 100%;
  position: ;
  transition: all 0.3s ease;
  width: 100%;
  }
  figure {
  height: 370px;
  overflow: hidden;
  position: relative;
  }
  figure a {
  height: 100%;
  left: 0;
  position: absolute;
  top: 150px;
  width: 100%;
  z-index: 3;
  }
  figure:hover .media {
  -webkit-transform: scale(1.25);
          transform: scale(1.25);
  }
  figcaption {
  color: #252830;
  height: calc(100% - 30px);
  margin: 15px;
  left: 0;
  position: absolute;
  top: 0;
  width: 250px;
  }
  .body {
  background-color: white;
  bottom: 0;
  padding: 15px;
  position: absolute;
  width: 100%;
  }
  svg {
  height: inherit;
  width: 100%;
  }
  svg text {
  text-anchor: middle;
  }
  svg #alpha {
  fill: white;
  }
  svg .title {
  font-size: 28px;
  font-family: "Montserrat";
  letter-spacing: 5px;
  }
  svg #base {
  fill: white;
  -webkit-mask: url(#mask);
  mask: url(#mask);
  }
  </style>
@endsection --}}
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Veterinaria El Yugo
      <small>Información</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Inicio</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        {{-- <div class="container inicio1">
          <div class="container-fluid">
            <div class="col-lg-6 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12">
              <figure>
                <div class="media" style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/bg_15.png);"></div>
                <figcaption>
                  <svg viewBox="0 0 200 200" version="1.1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <mask id="mask" x="0" y="0" width="100%" height="100%">
                        <rect id="alpha" x="0" y="0" width="100%" height="100%"></rect>
                        <text class="title" dx="50%" dy="2.5em">ENJOY</text>
                        <text class="title" dx="50%" dy="3.5em">EVERY</text>
                        <text class="title" dx="50%" dy="4.5em">MOMENT</text>
                      </mask>
                    </defs>
                    <rect id="base" x="0" y="0" width="100%" height="100%"></rect>
                  </svg>
                  <div class="body">
                    <p>Enamel pin selvage health goth edison bulb, venmo glossier tattooed hella butcher cred iPhone.</p>
                  </div>
                </figcaption><a href="#"></a>
              </figure>
            </div>
            <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
              <figure>
                <div class="media" style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/584938/bg_5.png);"></div>
                <figcaption>
                  <svg viewBox="0 0 200 200" version="1.1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                      <mask id="mask" x="0" y="0" width="100%" height="100%">
                        <rect id="alpha" x="0" y="0" width="100%" height="100%"></rect>
                        <text class="title" dx="50%" dy="2.5em">ENJOY</text>
                        <text class="title" dx="50%" dy="3.5em">EVERY</text>
                        <text class="title" dx="50%" dy="4.5em">MOMENT</text>
                      </mask>
                    </defs>
                    <rect id="base" x="0" y="0" width="100%" height="100%"></rect>
                  </svg>
                  <div class="body">
                    <p>Enamel pin selvage health goth edison bulb, venmo glossier tattooed hella butcher cred iPhone. Plaid skateboard man braid wayfarers.</p>
                  </div>
                </figcaption><a href="#"></a>
              </figure>
            </div>
          </div>
        </div> --}}
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
