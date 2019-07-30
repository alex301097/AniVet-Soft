@extends('layouts.master')
@section('css')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ URL::to('plugins/timepicker/bootstrap-timepicker.min.css') }}">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
            <div class="box box-warning">
              <div class="box-header">
                <i class="fa fa-calendar-plus-o"></i>

                <h3 class="box-title title-cita">Registrar Cita</h3>
                <!-- tools box -->
                <div class="box-tools pull-right">
                    <button type="button" id="btn-eliminar" class="btn btn-danger btn-sm hidden" data-toggle="tooltip" title="Eliminar cita">
                     &nbsp;<i class="fa fa-trash-o"></i>&nbsp;
                    </button>
                    <button type="button" id="btnLimpiar" style="margin-right: 5px;" class="btn btn-default btn-sm hidden" data-toggle="tooltip" title="Limpiar formulario">
                     &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </button>
                </div>
                <!-- /. tools -->
              </div>
              <div class="box-body">
                <form id="form-cita" name="form-cita">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fecha"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Fecha</h5></label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control form-control-sm pull-right" id="fecha" name="fecha" placeholder="Fecha">
                        </div>
                        <p class="error-fecha text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="paciente"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Paciente</h5></label>
                        <input type="hidden" name="idPaciente" id="idPaciente" value="">
                        <input type="text" class="form-control form-control-sm form-control-alternative" name="paciente" id="paciente" value="" placeholder="Ingrese el nombre, especie o raza del paciente" >
                        <p class="error-paciente text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        <small for="paciente" id="passwordHelpBlock" class="form-text text-muted">
                          <label for=""><i style="color:gray;" class="fas fa-asterisk"></i>&nbsp;</label>
                          Puedes buscar por especie, raza y nombre del animal en cuestión.
                        </small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label for="horaInicio"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Hora Inicial</h5></label>

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="horaInicio" name="horaInicio" placeholder="Hora Inicial">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <p class="error-horaInicio text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="bootstrap-timepicker">
                          <div class="form-group">
                            <label for="horaFinal"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Hora Final</h5></label>

                            <div class="input-group">
                              <input type="text" class="form-control timepicker" id="horaFinal" name="horaFinal" placeholder="Hora Final">

                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                            </div>
                            <p class="error-horaFinal text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="motivo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Motivo</h5></label>
                        <input type="text" class="form-control" id="motivo" name="motivo" rows="3" placeholder="Motivo">
                        <p class="error-motivo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tipo_animal"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Tipo de servicio</h5></label>
                        <select class="form-control form-control-sm" id="servicio" name="servicio">
                          <option value="">Seleccione una opción</option>
                          @foreach ($servicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->descripcion}}</option>
                          @endforeach
                        </select>
                        <p class="error-servicio text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="observaciones"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Observaciones</h5></label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Observaciones"></textarea>
                        <p class="error-observaciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <input type="hidden" name="idCita" id="idCita" value="">
                    @csrf
                    <button type="submit" class="btn btn-success pull-right" id="btnSubmit" name="btnSubmit">Registrar cita</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendario</h3>
            </div>
            <div class="box-body">
              {!! $calendar->calendar() !!}
            </div>
            <div class="box-footer clearfix pull-right">
                <button class="btn btn-sm" style="color: #fff; background-color: #0f9f97; cursor: default;" type="button" onclick="return false;">
                  Pendientes ✔
                </button>
                <button class="btn btn-sm" style="color: #fff; background-color: rgb(220, 53, 69); cursor: default;" type="button" onclick="return false;">
                  Inactivas X
                </button>
            </div>
          </div>

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

  <!-- Modal Eliminar -->
  <div class="modal fade" id="eliminarModal" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Eliminar cita</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="hidden" id="deshablitarCitaId" name="deshablitarCitaId" value="">
                <h4 class="text-center">Está seguro(a) de eliminar la cita registrada?</h4>
                <br />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-danger deshabilitar-cita" id="deshabilitar-cita" data-dismiss="modal">Eliminar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
@section('scripts')

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/es.js"></script>
  {!! $calendar->script() !!}

  <!-- bootstrap datepicker -->
  <script src="{{ URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- bootstrap time picker -->
  <script src="{{ URL::to('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

  <script type="text/javascript">
  //Date picker
  $('#fecha').datepicker({
    autoclose: true,
    startDate: 'today'
  });

  //Timepicker
  $('#horaInicio').timepicker({
    showInputs: false
  })

  $('#horaFinal').timepicker({
    showInputs: false
  })

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

  $(document).ready(function(){
    $('#side_bar-procesos').addClass('active');
    $('#side_bar_option-calendarizacion').addClass('active');
  });

  $(function(){
   $( "#paciente" ).autocomplete({
    source: "{{ route('autocompletePacienteCita') }}",
    minLength: 1,
    autofocus: true,
    select: function(event, ui) {
      $('#paciente').val(ui.item.value);
      $('#idPaciente').val(ui.item.id);
    }
    });
  });

  //Añadir
  $('#btnSubmit').click(function(){
    $.ajax({
      type: 'post',
      url: '{{route('calendarizacion.registrar-cita')}}',
      data: {

        '_token': $('input[name=_token]').val(),
        'id_cita': $('#id_cita').val(),
        'fecha': $('#fecha').val(),
        'horaInicio': $('#horaInicio').val(),
        'horaFinal': $('#horaFinal').val(),
        'motivo': $('#motivo').val(),
        'observaciones': $('#observaciones').val(),
        'estado': $('#estado').val(),
        'servicio': $('#servicio').val(),
        'paciente': $('#idPaciente').val(),
      },
      success: function(data){
        if((data.errors)){
          Toast.fire({
            type: 'warning',
            title: 'Errores de validación!'
          })

          if(data.errors.fecha){
            $('.error-fecha').removeClass('hidden');
            $('.error-fecha').text(data.errors.fecha);
          }

          if(data.errors.horaInicio){
            $('.error-horaInicio').removeClass('hidden');
            $('.error-horaInicio').text(data.errors.horaInicio);
          }

          if(data.errors.horaFinal){
            $('.error-horaFinal').removeClass('hidden');
            $('.error-horaFinal').text(data.errors.horaFinal);
          }

          if(data.errors.motivo){
            $('.error-motivo').removeClass('hidden');
            $('.error-motivo').text(data.errors.motivo);
          }

          if(data.errors.observaciones){
            $('.error-observaciones').removeClass('hidden');
            $('.error-observaciones').text(data.errors.observaciones);
          }

          if(data.errors.estado){
            $('.error-estado').removeClass('hidden');
            $('.error-estado').text(data.errors.estado);
          }

          if(data.errors.servicio){
            $('.error-servicio').removeClass('hidden');
            $('.error-servicio').text(data.errors.servicio);
          }

          if(data.errors.paciente){
            $('.error-paciente').removeClass('hidden');
            $('.error-paciente').text(data.errors.paciente);
          }

        }else{
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'La cita se ha registrado correctamente!',
            showConfirmButton: false,
            timer: 1500
          })

          setTimeout(function(){
            var url = "{{route('calendarizacion')}}";
                document.location.href=url;
          }, 2000);
      }
      },
    });

  });

  function editarCita(event){
    $('#title-cita').text('Detalle de la Cita')
    $('#idCita').val(event.cita.id);
    $('#paciente').val(event.cita.paciente.nombre + ' - ' + event.cita.paciente.tipo_animal.descripcion + ' ~ ' + event.cita.paciente.raza +' - ' + event.cita.paciente.sexo);
    $('#idPaciente').val(event.cita.paciente.id);
    $('#fecha').val(event.cita.fecha);
    $('#horaInicio').val(event.cita.horaInicio);
    $('#horaFinal').val(event.cita.horaFinal);
    $('#motivo').val(event.cita.motivo);
    $('#servicio').val(event.cita.servicio.id);
    $('#observaciones').val(event.cita.observaciones);
    $('#btnSubmit').text('Actualizar cita');
    $('#btn-eliminar').removeClass('hidden');
    $('#btnLimpiar').removeClass('hidden');
    $('#deshablitarCitaId').val(event.cita.id);
  }


  $('#btnLimpiar').click(function(){
    $('#btnSubmit').text('Registrar cita');
    $('#form-cita').trigger("reset");
    $('#btnSubmit').removeClass('hidden');
    $('#btn-eliminar').addClass('hidden');
    $('#btnLimpiar').addClass('hidden');
  });

  //Deshabilitar
  $(document).on('click', '#btn-eliminar', function(e) {
    var id = $(this).data('id');
    e.preventDefault();
    swal_confirm.fire({
      title: '¿Estas seguro de deshabilitar esto?',
      text: "¡Podras habilitar esto después!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: '¡Si, deshabilitalo!',
      cancelButtonText: '¡No, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
            type: "POST",
            url: '{{route("calendarizacion.deshabilitar-cita")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'id':$('#idCita').val(),
            },
            success: function (data) {
              swal_confirm.fire(
                '¡Deshabilitado!',
                'Los datos han sido deshabilitados.',
                'success'
              ).then(function() {
                  location.reload();
                  $('#calendar-citas').fullCalendar('removeEvents', data.id);
                  $('#btnSubmit').text('Registrar cita');

                  $('#form-cita').trigger("reset");
                  $('#btn-eliminar').addClass('hidden');
                  $('#btnLimpiar').addClass('hidden');
              });
            }
        });
      } else if (
        // Read more about handling dismissals
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swal_confirm.fire(
          'Cancelado',
          'Los datos del usuario estan seguros.',
          'error'
        )
      }
    });
  });
</script>
@endsection
