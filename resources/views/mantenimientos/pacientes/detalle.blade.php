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
      Pacientes
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li><a href="#">Pacientes</a></li>
      <li class="active">Detalle</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Detalle del paciente</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Nombre:</b><span style="color:gray;">&nbsp;{{$paciente->nombre}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Edad:</b><span style="color:gray;">&nbsp;{{$paciente->edad}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Peso:</b><span style="color:gray;">&nbsp;{{$paciente->peso}}</span></label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Fecha de nacimiento:</b><span style="color:gray;">&nbsp;{{$paciente->fecha_nacimiento}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Sexo:</b><span style="color:gray;">&nbsp;{{$paciente->sexo}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Especie:</b><span style="color:gray;">&nbsp;{{$paciente->tipo_animal->descripcion}}</span></label>
          </div>
          <div class="col-md-4">
            <label><b><i class="ni ni-bold-right"></i>Raza:</b><span style="color:gray;">&nbsp;{{$paciente->raza}}</span></label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label><b><i class="ni ni-bold-right"></i>Observaciones:</b><span style="color:gray;">&nbsp;{{$paciente->observaciones}}</span></label>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->

        </div>
        <!-- /.box -->

        <!-- Paciente imagen box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Imagenes</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Colapsar">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            @if (count($paciente->imagenes))
              <div class="demo-gallery">
                <ul id="lightgallery">
                  @foreach ($paciente->imagenes as $imagen)
                    <li  data-src="{{ url('imgPacientes/'.$imagen->imagen) }}"
                    data-sub-html="<h4>Nombre: {{$paciente->nombre}}</h4>
                    <p>
                      Especie: {{$paciente->tipo_animal->descripcion}} - Raza: {{$paciente->raza}} - Edad: {{$paciente->edad}} años
                      <br>
                      Observaciones: {{$paciente->observaciones}}
                    </p>">
                      <a href="">
                        <img class="img-responsive" src="{{ url('imgPacientes/'.$imagen->imagen) }}" alt="{{$paciente->nombre}}">
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
                  <div class="callout callout-warning text-center" style="width:70%;">
                    <h4>¡No hay imagenes agregadas al paaciente!</h4>

                    <p>Por favor agrega algunas.</p>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            Footer
          </div>
          <!-- /.box-footer-->
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
        $('#side_bar_option-pacientes').addClass('active');
      });
  </script>
@endsection
