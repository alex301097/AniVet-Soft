@extends('layouts.master')
@section('css')
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Calendarización
      <small>Proceso</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Procesos</a></li>
      <li class="active">Calendarización</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Calendarización de citas</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-lg-5">
            <form class="" action="{{ route('enfermeria.registrar-cita') }}" method="post">
                        <hr id="div-acc" class="hidden">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="paciente" class="col-form-label">Paciente: </label>
                            {{-- <select class="form-control" name="">
                              <option value="0">Seleccione un paciente</option>
                            </select> --}}
                            <input type="text" class="form-control" name="paciente" id="paciente" value="" placeholder="Ingrese el nombre o cédula">
                            @if ($errors->has('paciente'))
                              <p class="alert alert-danger " style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                                {{ $errors->first('paciente') }}
                              </p>
                            @endif
                          </div>
                          <div class="form-group col-md-6">
                            <label for="cedula" class="col-form-label">Cédula: </label>
                            <input type="text" readonly class="form-control" name="cedula" id="cedula" value="">
                          </div>

                        </div>

                        <div class="form-group">
                          <label for="descripcion" class="col-form-label">Descripción: </label>
                          <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                          @if ($errors->has('descripcion'))
                            <p class="alert alert-danger" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('descripcion') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="fecha" class="col-form-label">Fecha de la cita: </label>
                          <input type="date" class="form-control" name="fecha" id="fecha">
                          @if ($errors->has('fecha'))
                            <p class="alert alert-danger" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('fecha') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="fecha" class="col-form-label">Hora de la cita: </label>
                          <input type="time" class="form-control textHora" id="hora" name="hora" value="">
                          @if ($errors->has('hora'))
                            <p class="alert alert-danger" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('hora') }}
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="coordinado" class="col-form-label">Coordinación: </label>
                          <select class="form-control" id="coordinado" name="coordinado">
                            <option value="0">Sin coordinar</option>
                            <option value="1">Coordinado</option>
                          </select>
                          @if ($errors->has('coordinado'))
                            <p class="alert alert-danger" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('coordinado') }}
                            </p>
                          @endif
                        </div>
                        <hr>
                        <input type="hidden" name="idCita" id="idCita" value="">
                        @can('mod-enfermeria')
                          @csrf
                          <button type="submit" class="btn btn-success" id="btnSubmit">Registrar cita</button>
                        @endcan
                        </form>
          </div>
          <div class="col-md-7">
            {!! $calendar->calendar() !!}
            <hr>
            <button class="btn btn-sm" style="color: #fff; background-color: #0f9f97; cursor: default;" type="button" onclick="return false;">
              Coordinado <span class="badge">✔</span>
            </button>
            <button class="btn btn-sm" style="color: #fff; background-color: rgb(220, 53, 69); cursor: default;" type="button" onclick="return false;">
              Sin coordinar <span class="badge">X</span>
            </button>
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

  </section>
  <!-- /.content -->
@endsection
@section('scripts')
@endsection
