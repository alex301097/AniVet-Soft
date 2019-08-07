@extends('layouts.master')
@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::to('bower_components/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{URL::to('css/checkbox_animated.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Expediente medico
      <small>Proceso</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <div class="avatar_paciente">
              <img class="profile-user-img img-responsive img-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="User profile picture">
            </div>

              {{-- <img class="profile-user-img img-responsive img-circle" src="{{ url('imgPerfiles/'.$paciente->imagenes->imagen->first()) }}" alt="User profile picture"> --}}

            <h3 class="profile-username text-center" id="nombre_paciente">Sin seleccionar</h3>

            <p class="text-muted text-center">Paciente</p>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="paciente"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Paciente</h5></label>
                  <input type="hidden" name="idPaciente" id="idPaciente" value="">
                  <input type="text" class="form-control form-control-sm" name="paciente" id="paciente" value="" placeholder="Ingrese el nombre, especie o raza del paciente" >
                  <p class="error-paciente text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                  <small for="paciente" id="passwordHelpBlock" class="form-text text-muted">
                    <label for=""><i style="color:gray;" class="fas fa-asterisk"></i>&nbsp;</label>
                    Puedes buscar por especie, raza y nombre del animal en cuestión.
                  </small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="cita"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Cita</h5></label>
                  <select class="form-control form-control-sm" id="cita" name="cita" style="width: 100%;">
                    <option value="">Seleccione una opción</option>
                    @foreach ($citas as $cita)
                      <option value="{{$cita->id}}">{{$cita->fecha." - ".$cita->horaInicio."/".$cita->horaFinal}}</option>
                    @endforeach
                  </select>
                  <p class="error-cita text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Ficha clinica</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Colapsar">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-file-text-o margin-r-5"></i> Información general</strong>

            <ul>
              <li><b>Especie: </b><span id="info_paciente_especie">No cargada.</span></li>
              <li><b>Raza: </b><span id="info_paciente_raza">No cargada.</span></li>
              <li><b>Edad: </b><span id="info_paciente_edad">No cargada.</span></li>
              <li><b>Sexo: </b><span id="info_paciente_sexo">No cargada.</span></li>
              <li><b>Color: </b><span id="info_paciente_color">No cargada.</span></li>
            </ul>
            <hr>

            <strong><i class="fa fa-book margin-r-5"></i> Datos de la cita</strong>

            <p class="text-muted">
            <ul>
              <li><b>Fecha: </b><span id="info_cita_fecha">No cargada.</span></li>
              <li><b>Hora de inicio: </b><span id="info_cita_horaInicio">No cargada.</span></li>
              <li><b>Hora final: </b><span id="info_cita_horaFinal">No cargada.</span></li>
              <li><b>Servicio: </b><span id="info_cita_servicio">No cargada.</span></li>
              <li><b>Motivo: </b><span id="info_cita_motivo">No cargada.</span></li>
              <li><b>Observaciones: </b><span id="info_cita_observaciones">No cargada.</span></li>
            </ul>
            </p>
            <hr>
            <strong><i class="fa fa-book margin-r-5"></i> Información del encargado</strong>

            <p class="text-muted">
            <ul>
              <li><b>Nombre: </b><span id="info_encargado_nombre">No cargada.</span></li>
              <li><b>Cedula: </b><span id="info_encargado_cedula">No cargada.</span></li>
              <li><b>Sexo: </b><span id="info_encargado_sexo">No cargada.</span></li>
              <li><b>Nacionalidad: </b><span id="info_encargado_nacionalidad">No cargada.</span></li>
              <li><b>Telefono: </b><span id="info_encargado_telefono">No cargada.</span></li>
              <li><b>Dirección: </b><span id="info_encargado_direccion">No cargada.</span></li>
            </ul>
            </p>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Chequeo Medico</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Colapsar">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                <div class="col-md-5">
                  <strong>Chequeos</strong>
                </div>
                <div class="col-md-7">
                  <strong>Descripciones</strong>
                </div>
              </div>
              <br />
              @foreach ($chequeos as $chequeo)
                <div class="row checkbox">
                  <div class="col-md-5">
                    <p class="col-md-12"><input type="checkbox" id="{{ $chequeo->descripcion }}" name="chequeos[]" value="{{ $chequeo->id }}"
                      onclick="document.getElementById('descripcion-{{$chequeo->id}}').disabled = !this.checked; setValorDescripcion(this,document.getElementById('descripcion-{{$chequeo->id}}'))"
                      {{-- {{ $paciente->hallazgos->contains($tipoHallazgo->id) ? 'checked' : '' }} --}}/>
                      <label for="{{ $chequeo->descripcion }}"><span class="ui"></span>
                        {{ $chequeo->descripcion }}
                      </label>
                    </p>
                  </div>
                  <div class="col-md-7">
                    <input type="text" class="form-control form-control-sm col-md-8 descripcion" id="descripcion-{{$chequeo->id}}" name="descripciones[]" value="" disabled
                    {{-- value="{{ $paciente->hallazgos->contains($tipoHallazgo->id) ? $paciente->hallazgos->find($tipoHallazgo->id)->pivot->intervencion : '' }}" --}}
                    {{-- {{ $paciente->hallazgos->contains($tipoHallazgo->id) ? '' : 'disabled' }} --}} style="margin-bottom:10px;">
                  </div>
                </div>
              @endforeach
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                Footer
              </div>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Default box -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Resultados finales</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Colapsar">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">

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
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
@endsection
@section('scripts')
  <!-- Select2 -->
  <script src="{{URL::to('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>

  <script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2500
    });

    const swal_confirm = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    });

    //Initialize Select2 Elements
    $('#cita').select2()

    $(function(){
     $( "#paciente" ).autocomplete({
      source: "{{ route('autocompletePaciente') }}",
      minLength: 1,
      autofocus: true,
      select: function(event, ui) {
        $('#paciente').val(ui.item.value);
        $('#idPaciente').val(ui.item.id);

        //Info del paciente
        $('#info_paciente_especie').text(ui.item.datos.tipo_animal.descripcion);
        $('#info_paciente_raza').text(ui.item.datos.raza);
        $('#info_paciente_edad').text(ui.item.datos.edad);
        $('#info_paciente_sexo').text(ui.item.datos.sexo);
        $('#info_paciente_color').text('No cargado.');

        //Info del encargado
        $('#info_encargado_nombre').text(ui.item.datos.user.nombre);
        $('#info_encargado_cedula').text(ui.item.datos.user.cedula);
        $('#info_encargado_sexo').text(ui.item.datos.user.sexo);
        $('#info_encargado_nacionalidad').text(ui.item.datos.user.nacionalidad);
        $('#info_encargado_telefono').text(ui.item.datos.user.telefono);
        $('#info_encargado_direccion').text(ui.item.datos.user.direccion);

        //Perfil
        if(ui.item.datos.user.imagenes.imagen){
          var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
          imagen = imagen.replace(':ruta_imagen', ui.item.datos.user.imagenes[0].imagen);
          $('#avatar_paciente').html("<img class='profile-user-img img-responsive img-circle' src='" + imagen + "' alt='User profile picture'>");
        }else{
          $('#avatar_paciente').html("<img class='profile-user-img img-responsive img-circle' src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' alt='User profile picture'>");
        }


          $('#nombre_paciente').text((ui.item.nombre)?ui.item.nombre:"Sin nombre");

      }
      });
    });

    $(document).ready(function(){
      $('#side_bar-procesos').addClass('active');
      $('#side_bar_option-expediente_medico').addClass('active');
  });

  function setValorDescripcion(chequeo,descripcion){
    if(!chequeo.checked){
      descripcion.value = "";
    }
  }
  </script>
@endsection
