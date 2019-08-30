@extends('layouts.master')
@section('css')
  <!-- lightgallery css links -->
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/css/lightgallery.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/css/lg-transitions.min.css" />
  <link type="text/css" href="{{ URL::to('css/lightgallery.css') }}" rel="stylesheet">

@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Animales en venta
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li><a href="{{route('animales_venta')}}">Animales en venta</a></li>
      <li class="active">Detalle</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Detalle de animal en venta - Existencias: {{$animal->cantidad}}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Nombre:</b><span style="color:gray;">&nbsp;{{$animal->nombre}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Edad:</b><span style="color:gray;">&nbsp;{{$animal->edad}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Peso:</b><span style="color:gray;">&nbsp;{{$animal->peso}}</span></label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Especie:</b><span style="color:gray;">&nbsp;{{$animal->tipo_animal->descripcion}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Raza:</b><span style="color:gray;">&nbsp;{{$animal->raza}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Sexo:</b><span style="color:gray;">&nbsp;{{$animal->sexo}}</span></label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label><b><i class="ni ni-bold-right"></i>Condiciones:</b><span style="color:gray;">&nbsp;{{$animal->condiciones}}</span></label>
          </div>
          <div class="col-md-6">
            <label><b><i class="ni ni-bold-right"></i>Observaciones:</b><span style="color:gray;">&nbsp;{{$animal->observaciones}}</span></label>
          </div>
        </div>
      </div>
      <!-- /.box-body -->

      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    <!-- Paciente imagen box -->
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Imágenes</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @if (count($animal->imagenes))
          <div class="demo-gallery">
            <ul id="lightgallery">
              @foreach ($animal->imagenes as $imagen)
                <li style="width:150px;height:150px;" data-src="{{ url('imgPerfiles/'.$imagen->imagen) }}"
                data-sub-html="<h4>Nombre: {{$animal->nombre}}</h4>
                <p>
                  Especie: {{$animal->tipo_animal->descripcion}} - Raza: {{$animal->raza}} - Edad: {{$animal->edad}} años
                  <br>
                  Condiciones: {{$animal->condiciones}}
                  <br>
                  Observaciones: {{$animal->observaciones}}
                </p>">
                  <a href="">
                    <img class="img-responsive" style="width:150px;height:150px;" src="{{ url('imgPerfiles/'.$imagen->imagen) }}" alt="{{$animal->nombre}}">
                    <div class="demo-gallery-poster">
                      <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                    </div>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        @else
          <div class="row">
            <div class="col-md-12">
              <div class="callout callout-warning" style="width:100%;">
                <h4>¡No hay imágenes agregadas al paciente!</h4>

                <p>Por favor agrega algunas.</p>
              </div>
            </div>
          </div>
        @endif

      </div>

      <!-- /.box-body -->

      <!-- /.box-footer-->
      </div>
      <div class="row">
        <div class="col-md-6">
        <a class="btn bg-orange btn-sm pull-left" style="width:100px;" href="{{ URL::previous() }}">
          <span><i class="fas fa-arrow-left"></i></span>&nbsp;&nbsp;&nbsp;Regresar</a>
        </div>
        </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection
@section('scripts')
  <!-- lightgallery js links -->
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-fullscreen.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-hash.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-pager.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-autoplay.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-zoom.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-share.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/lib/jquery.mousewheel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/modules/lg-thumbnail.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/lib/picturefill.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function() {
          $("#lightgallery").lightGallery();
      });

      $(document).ready(function(){
        $('#side_bar-mantenimientos').addClass('active');
        $('#side_bar_option-animales_venta').addClass('active');
      });
  </script>
@endsection
