@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ URL::to('plugins/iCheck/all.css') }}">
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
      <li class="active">Registro</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Registro de pacientes</h3>

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
              <label for="nombre"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Nombre</h5></label>
              <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre" name="nombre" placeholder="Nombre">
              <p class="error-nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="duenno"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Dueño</h5></label>
              <input type="hidden" name="idUser" id="idUser" value="">
              <input type="text" class="form-control form-control-sm form-control-alternative" name="duenno" id="duenno" value="" placeholder="Ingrese el nombre o cedula del dueño" >
              <p class="error-duenno text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="tipo_animal"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Tipo de animal</h5></label>
              <select class="form-control form-control-sm" id="tipo_animal" name="tipo_animal">
                <option value="">Seleccione una opción</option>
                @foreach ($tipos_animales as $tipo_animal)
                  <option value="{{$tipo_animal->id}}">{{$tipo_animal->descripcion}}</option>
                @endforeach
              </select>
              <p class="error-tipo_animal text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="raza"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Raza</h5></label>
              <input type="text" class="form-control form-control-sm form-control-alternative" id="raza" name="raza" placeholder="Raza">
              <p class="error-raza text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="fecha_nacimiento"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Fecha de nacimiento</h5></label>
                <div class="input-group">
                    <input type="text" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                </div>
                <p class="error-fecha_nacimiento text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
          <div class="col-md-6">

                <div class="form-group">
                  <label for="nacionalidad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                  <div class="row">
                    <div class="col-md-6 text-center">
                      <div class="custom-control custom-radio mb-3">
                        <input name="sexo" class="minimal" id="macho" value="Macho" checked type="radio">
                        <label class="custom-control-label" for="macho">Macho</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="custom-control custom-radio mb-3">
                        <input name="sexo" class="minimal" id="hembra" value="Hembra" type="radio">
                        <label class="custom-control-label" for="hembra">Hembra</label>
                      </div>
                    </div>
                  </div>
                </div>

            <div class="row">
              <div class="col-md-12">
                <p class="error-sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="edad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Edad</h5></label>
              <input type="number" class="form-control form-control-sm form-control-alternative" id="edad" name="edad" placeholder="Edad">
              <p class="error-edad text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="peso"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Peso</h5></label>
              <input type="text" class="form-control form-control-sm form-control-alternative" id="peso" name="peso" placeholder="Peso">
              <p class="error-peso text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
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
        <div class="row">
          <div class="col-md-12 text-right">
            @csrf
            <a class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:175px;" type="button" id="registrar" name="registrar">
              <span><i class="fas fa-plus"></i></span>&nbsp;Registrar paciente
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
  <!-- bootstrap datepicker -->
  <script src="{{ URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.es.min.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="{{ URL::to('plugins/iCheck/icheck.min.js') }}"></script>
  <script type="text/javascript">

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })

  //Date picker
  $('#fecha_nacimiento').datepicker({
    endDate: 'days',
    language: 'es',
    todayHighlight: true,
    autoclose: true,
    orientation: 'bottom'
  })

  $(function(){
   $( "#duenno" ).autocomplete({
    source: "{{ route('autocompleteDuenno') }}",
    minLength: 1,
    autofocus: true,
    select: function(event, ui) {
      $('#duenno').val(ui.item.value);
      $('#idUser').val(ui.item.id);
    }
    });
   });

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
      $('#side_bar-mantenimientos').addClass('active');
      $('#side_bar_option-pacientes').addClass('active');
    });

    //Añadir
    $('#registrar').click(function(){
      $(this).html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
      $(this).addClass('disabled');

      $.ajax({
        type: 'post',
        url: '{{route('pacientes.añadir')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'dueño': $('#idUser').val(),
          'tipo_animal': $('#tipo_animal').val(),
          'nombre': $('#nombre').val(),
          'edad': $('#edad').val(),
          'peso': $('#peso').val(),
          'raza': $('#raza').val(),
          'fecha_nacimiento': moment($('#fecha_nacimiento').val()).format('YYYY-MM-DD'),
          'sexo': $('input[name="sexo"]:checked').val(),
          'observaciones': $('#observaciones').val(),
        },
        success: function(data){
          if((data.errors)){
            $('#registrar').html('<i class="fa fa-plus"></i>&nbsp;&nbsp;Registrar paciente');
            $('#registrar').removeClass('disabled');
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.tipo_animal){
              $('.error-tipo_animal').removeClass('hidden');
              $('.error-tipo_animal').text(data.errors.tipo_animal);
            }

            if(data.errors.nombre){
              $('.error-nombre').removeClass('hidden');
              $('.error-nombre').text(data.errors.nombre);
            }

            if(data.errors.edad){
              $('.error-edad').removeClass('hidden');
              $('.error-edad').text(data.errors.edad);
            }

            if(data.errors.peso){
              $('.error-peso').removeClass('hidden');
              $('.error-peso').text(data.errors.peso);
            }

            if(data.errors.raza){
              $('.error-raza').removeClass('hidden');
              $('.error-raza').text(data.errors.raza);
            }

            if(data.errors.fecha_nacimiento){
              $('.error-fecha_nacimiento').removeClass('hidden');
              $('.error-fecha_nacimiento').text(data.errors.fecha_nacimiento);
            }

            if(data.errors.sexo){
              $('.error-sexo').removeClass('hidden');
              $('.error-sexo').text(data.errors.sexo);
            }

            if(data.errors.observaciones){
              $('.error-observaciones').removeClass('hidden');
              $('.error-observaciones').text(data.errors.observaciones);
            }

            if(data.errors.dueño){
              $('.error-duenno').removeClass('hidden');
              $('.error-duenno').text(data.errors.dueño);
            }
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'El paciente se ha registrado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              var url = "{{route('pacientes')}}";
									document.location.href=url;
            }, 2000);
        }
        },
      });

    });
  </script>

@endsection
