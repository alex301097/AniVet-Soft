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
      Citas
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li><a href="{{route('citas')}}">Citas</a></li>
      <li class="active">Detalle</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Detalle de la cita</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="fecha"><h5>Fecha</h5></label>
              <input type="text" class="form-control form-control-sm disabled" id="fecha" name="fecha" placeholder="Fecha" readonly value="{{date("d/m/Y", strtotime($cita->fecha))}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="paciente"><h5>Paciente</h5></label>
              <input type="text" class="form-control form-control-sm" disabled name="paciente" id="paciente" value="{{$cita->paciente->nombre.' - '.$cita->paciente->tipo_animal->descripcion.' ~ '.$cita->paciente->raza.' - '.$cita->paciente->sexo}}" placeholder="Ingrese el nombre, especie o raza del paciente" >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="horaInicio"><h5>Hora Inicial</h5></label>
              <input type="text" class="form-control form-control-sm disabled" id="horaInicio" readonly name="horaInicio" placeholder="Hora Inicial" value="{{$cita->horaInicio}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="horaFinal"><h5>Hora final</h5></label>
              <input type="text" class="form-control form-control-sm disabled" id="horaFinal" readonly name="horaFinal" placeholder="Hora final" value="{{$cita->horaFinal}}">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="motivo"><h5>Motivo</h5></label>
              <input type="text" class="form-control form-control-sm" disabled id="motivo" name="motivo" rows="3" placeholder="Motivo" value="{{$cita->motivo}}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tipo_animal"><h5>Tipo de servicio</h5></label>
              <select class="form-control form-control-sm disabled" disabled id="servicio" name="servicio">
                <option value="" disabled>Seleccione una opción</option>
                @foreach ($servicios as $servicio)
                  <option value="{{$servicio->id}}" {{($servicio->id == $cita->servicio->id)?"selected":"disabled"}}>{{$servicio->descripcion}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="observaciones"><h5>Observaciones</h5></label>
              <textarea class="form-control form-control-sm" disabled id="observaciones" name="observaciones" rows="3" placeholder="Observaciones" style="resize:none">{{$cita->observaciones}}</textarea>
            </div>
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
        <h3 class="box-title">Imágenes del paciente</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @if (count($cita->paciente->imagenes))
          <div class="row">
            <div class="col-md-12">
                <div class="demo-gallery">
                  <ul id="lightgallery">
                    @foreach ($cita->paciente->imagenes as $imagen)
                      <li  data-src="{{ url('imgPacientes/'.$imagen->imagen) }}"
                      data-sub-html="<h4>Nombre: {{$cita->paciente->nombre}}</h4>
                      <p>
                        Especie: {{$cita->paciente->tipo_animal->descripcion}} - Raza: {{$cita->paciente->raza}} - Edad: {{$cita->paciente->edad}} años
                        <br>
                        Observaciones: {{$cita->paciente->observaciones}}
                      </p>">
                        <a href="">
                          <img class="img-responsive" src="{{ url('imgPacientes/'.$imagen->imagen) }}" alt="{{$cita->paciente->nombre}}">
                          <div class="demo-gallery-poster">
                            <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                          </div>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
            </div>
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
      <div class="col-md-12">
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
        $('#side_bar_option-citas').addClass('active');
      });
  </script>
@endsection
