@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- datepicker -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ URL::to('plugins/timepicker/bootstrap-timepicker.min.css') }}">
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
      <li><a href="#">Citas</a></li>
      <li class="active">Edición</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edición de citas</h3>

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
              <label for="fecha"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Fecha</h5></label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control form-control-sm pull-right" id="fecha" name="fecha" placeholder="Fecha" value="{{date('d/m/Y', strtotime($cita->fecha))}}">
                <input type="hidden" id="fecha_formato" value="">
              </div>
              <p class="error-fecha text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="paciente"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Paciente</h5></label>
              <input type="hidden" name="idPaciente" id="idPaciente" value="{{$cita->paciente->id}}">
              <input type="text" class="form-control form-control-sm form-control-alternative" name="paciente" id="paciente" value="{{$cita->paciente->nombre.' - '.$cita->paciente->tipo_animal->descripcion.' ~ '.$cita->paciente->raza.' - '.$cita->paciente->sexo}}" placeholder="Ingrese el nombre, especie o raza del paciente" >
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
                    <input type="text" class="form-control timepicker" id="horaInicio" name="horaInicio" placeholder="Hora Inicial" value="{{$cita->horaInicio}}">

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
                    <input type="text" class="form-control timepicker" id="horaFinal" name="horaFinal" placeholder="Hora Final" value="{{$cita->horaFinal}}">

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
              <input type="text" class="form-control" id="motivo" name="motivo" rows="3" placeholder="Motivo" value="{{$cita->motivo}}">
              <p class="error-motivo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="tipo_animal"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Tipo de servicio</h5></label>
              <select class="form-control form-control-sm" id="servicio" name="servicio">
                <option value="">Seleccione una opción</option>
                @foreach ($servicios as $servicio)
                  <option value="{{$servicio->id}}" {{($servicio->id == $cita->servicio->id)?"selected":""}}>{{$servicio->descripcion}}</option>
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
              <textarea class="form-control" id="observaciones" name="observaciones" rows="3" placeholder="Observaciones">{{$cita->observaciones}}</textarea>
              <p class="error-observaciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-right">
            <input type="hidden" name="id_edicion" id="id_edicion" value="{{$cita->id}}">
            @csrf
            <a class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:100px;" type="button" id="editar" name="editar">
              <span><i class="fas fa-plus"></i></span>&nbsp;&nbsp;Editar cita
            </a>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>

  <!-- bootstrap time picker -->
  <script src="{{ URL::to('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script type="text/javascript">
  //Date picker
  $(document).ready(function () {
    $(function() {

        $('input[name="fecha"]').daterangepicker({
          "singleDatePicker": true,
            opens: 'center',
            autoUpdateInput: false,
            minDate: moment(),
           "locale": {
               "format": "DD/MM/YYYY",
               "separator": " - ",
               "applyLabel": "Aplicar",
               "cancelLabel": "Cancelar/Limpiar",
               "fromLabel": "De",
               "toLabel": "hasta",
               "customRangeLabel": "Custom",
               "daysOfWeek": [
                   "Dom",
                   "Lun",
                   "Mar",
                   "Mie",
                   "Jue",
                   "Vie",
                   "Sáb"
               ],
               "monthNames": [
                   "Enero",
                   "Febrero",
                   "Marzo",
                   "Abril",
                   "Mayo",
                   "Junio",
                   "Julio",
                   "Agosto",
                   "Septiembre",
                   "Octubre",
                   "Noviembre",
                   "Diciembre"
               ],
               "firstDay": 1
           }
        });

        $('input[name="fecha"]').on('apply.daterangepicker', function(ev, picker) {

            $("#fecha").val(picker.startDate.format('DD/MM/YYYY'));

            $("#fecha_formato").val(picker.startDate.format('YYYY-MM-DD'));

        });

        $('input[name="fecha"]').on('cancel.daterangepicker', function(ev, picker) {
          $("#fecha").val("");

          $("#fecha_formato").val("");
        });

      });
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

    $(document).ready(function(){
      $('#side_bar-mantenimientos').addClass('active');
      $('#side_bar_option-citas').addClass('active');
    });

    //Editar
    $('#editar').click(function(){
      $(this).html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
      $(this).addClass('disabled');

      $.ajax({
        type: 'post',
        url: '{{route('citas.editar')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_edicion': $('#id_edicion').val(),
          'fecha': $('#fecha_formato').val(),
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
            $('#editar').html('<i class="fa fa-plus"></i>&nbsp;&nbsp;Editar cita');
            $('#editar').removeClass('disabled');
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
              title: 'La cita se ha editado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              var url = "{{route('citas')}}";
									document.location.href=url;
            }, 2000);
        }
        },
      });

    });
  </script>

@endsection
