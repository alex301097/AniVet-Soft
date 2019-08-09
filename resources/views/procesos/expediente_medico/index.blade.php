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

            <form id="form-todos">
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
                      <option></option>
                    </select>
                    <p class="error-cita text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-md-12">
                <a style="width:100%;" id="limpiar_todos_formularios" class="btn bg-navy btn-sm pull-right" data-toggle="tooltip" title="Limpiar todos los formularios.">
                 <i class="fa fa-eraser"></i>&nbsp;&nbsp;Limpiar
                </a>
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
              <li><b>Sexo: </b><span id="info_paciente_sexo">No cargado.</span></li>
              <li><b>Color: </b><span id="info_paciente_color">No cargado.</span></li>
            </ul>
            <hr>

            <strong><i class="fa fa-book margin-r-5"></i> Datos de la cita</strong>

            <p class="text-muted">
            <ul>
              <li><b>Fecha: </b><span id="info_cita_fecha">No cargada.</span></li>
              <li><b>Hora de inicio: </b><span id="info_cita_horaInicio">No cargada.</span></li>
              <li><b>Hora final: </b><span id="info_cita_horaFinal">No cargada.</span></li>
              <li><b>Servicio: </b><span id="info_cita_servicio">No cargada.</span></li>
              <li><b>Motivo: </b><span id="info_cita_motivo">No cargado.</span></li>
              <li><b>Observaciones: </b><span id="info_cita_observaciones">No cargadas.</span></li>
            </ul>
            </p>
            <hr>
            <strong><i class="fa fa-book margin-r-5"></i> Información del encargado</strong>

            <p class="text-muted">
            <ul>
              <li><b>Nombre: </b><span id="info_encargado_nombre">No cargado.</span></li>
              <li><b>Cedula: </b><span id="info_encargado_cedula">No cargada.</span></li>
              <li><b>Sexo: </b><span id="info_encargado_sexo">No cargado.</span></li>
              <li><b>Nacionalidad: </b><span id="info_encargado_nacionalidad">No cargada.</span></li>
              <li><b>Telefono: </b><span id="info_encargado_telefono">No cargado.</span></li>
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
                <form id="form-chequeo" >
                  <div class="row checkbox">
                    @foreach ($chequeos as $chequeo)
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <p style="margin-top:15px;"><input type="checkbox" id="{{ $chequeo->descripcion }}" name="chequeos" value="{{ $chequeo->id }}"
                                onclick="document.getElementById('descripcion-{{$chequeo->id}}').disabled = !this.checked; setValorDescripcion(this,document.getElementById('descripcion-{{$chequeo->id}}'))"/>
                                <label for="{{ $chequeo->descripcion }}"><span class="ui"></span>
                                  {{ $chequeo->descripcion }}
                                </label>
                              </p>
                              <input type="text" class="form-control form-control-sm col-md-8 descripcion" id="descripcion-{{$chequeo->id}}" name="descripciones" value="" disabled
                              {{-- value="{{ $paciente->hallazgos->contains($tipoHallazgo->id) ? $paciente->hallazgos->find($tipoHallazgo->id)->pivot->intervencion : '' }}" --}}
                              {{-- {{ $paciente->hallazgos->contains($tipoHallazgo->id) ? '' : 'disabled' }} --}} style="margin-top:5px;">
                            </div>
                          </div>
                        </div>
                    @endforeach
                  </div>
                </form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible alert_chequeo">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info icono_alert_chequeo"></i> Información!</h4>
                      <span class="texto_alert_chequeo"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pull-right">
                    <a class="btn btn-sm btn-warning pull-right" id="guardar_chequeo" name="guardar_chequeo" data-toggle="tooltip" title="Click para guardar los datos del chequeo medico.">
                      <span><i class="fas fa-save"></i></span>&nbsp;&nbsp;Guardar chequeo</a>
                    <a style="margin-right:5px;" id="limpiar_formulario_chequeo" class="btn bg-navy btn-sm pull-right" data-toggle="tooltip" title="Limpiar formulario de datos del chequeo medico.">
                     &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
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
                <form id="form-finalizar">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="analisis"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Análisis recomendados</h5></label>
                        <input type="text" class="form-control" id="analisis" name="analisis">
                        <p class="error-analisis text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="diagnostico"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Diagnóstico</h5></label>
                        <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3"></textarea>
                        <p class="error-diagnostico text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="tratamiento"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Tratamiento</h5></label>
                        <textarea class="form-control" id="tratamiento" name="tratamiento" rows="3"></textarea>
                        <p class="error-tratamiento text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="recomendaciones"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Recomendaciones</h5></label>
                        <textarea class="form-control" id="recomendaciones" name="recomendaciones" rows="3"></textarea>
                        <p class="error-recomendaciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible alert_finalizar">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info icono_alert_finalizar"></i> Información!</h4>
                      <span class="texto_alert_finalizar"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 pull-right">
                    <a class="btn btn-sm btn-danger pull-right" id="finalizar_cita" name="finalizar_cita" data-toggle="tooltip" title="Click para guardar los datos de la cita y finalizarla.">
                      <span><i class="fa fa-check"></i></span>&nbsp;&nbsp;Finalizar cita</a>
                    <a style="margin-right:5px;" id="limpiar_formulario_finalizar" class="btn bg-navy btn-sm pull-right" data-toggle="tooltip" title="Limpiar formulario de datos finales de la cita.">
                     &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </a>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
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
    $('#cita').select2({
      placeholder: "Por favor selecciona un paciente."
    });

    $('#limpiar_formulario_finalizar').click(function(){
      $('#form-finalizar').trigger("reset");
    });

    $('#limpiar_formulario_chequeo').click(function(){
      $('#form-chequeo').trigger("reset");
      $("#form-chequeo :input[type=text]").attr('disabled',true);
    });

    $('#limpiar_todos_formularios').click(function(){
      $('#form-todos').trigger("reset");
      $('#form-finalizar').trigger("reset");
      $('#form-chequeo').trigger("reset");
      $("#form-chequeo :input[type=text]").attr('disabled',true);

      var citaSelect = $('#cita');
      $('#cita').select2('data', null);
      var option = new Option("", 0, true, true);
      citaSelect.append(option);
      citaSelect.trigger('change');

    });

    $(document).ready(function() {
      $("#idPaciente").on('change', function(){
          $.ajax({
            type: 'post',
            url: "{{route('autocompleteCitasPaciente')}}",
            data: {
              '_token': $('input[name=_token]').val(),
              'paciente': $(this).val(),
            },
            success: function(data){
              if((data.errors)){
                if(data.errors.paciente){
                  Toast.fire({
                    type: 'warning',
                    title: '!Necesitas ingresar un paciente valido!'
                  });
                }
              }else{
                var citaSelect = $('#cita');
                $('#cita').select2('data', null);
                var option = new Option("", 0, true, true);

                $.each(data, function(index, value) {
                  var option = new Option(value.fecha + " - " + value.horaInicio + " / " + value.horaFinal, value.id, true, true);
                  citaSelect.append(option);
                  // $('#cita').append("<option value='" + value.id + "'>" +  + "</option>");
                });
                citaSelect.trigger('change');

              }
            },
          });
      });

      $("#cita").on('change', function(){
          $.ajax({
            type: 'post',
            url: "{{route('autocompleteExpediente')}}",
            data: {
              '_token': $('input[name=_token]').val(),
              'cita': $(this).val(),
            },
            success: function(value){
              if((value.errors)){
                if(value.errors.cita){
                  Toast.fire({
                    type: 'warning',
                    title: '!Necesitas seleccionar una cita valida!'
                  });
                }
              }else{
                $.each(value.checkeos, function(index, valor) {
                  document.getElementById(valor.id).prop( "checked", true );
                  $("#descripcion-"+valor.id).val(valor.pivot.descripcion);
                  $("#descripcion-"+valor.id).removeAttr('disabled');
                });
                  $('#nombre_paciente').text((value.paciente.nombre)?value.paciente.nombre:"Sin nombre");

                  //Perfil
                  if(Array.isArray(value.paciente.user.imagenes) && value.paciente.user.imagenes.length){
                    var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
                    imagen = imagen.replace(':ruta_imagen', value.paciente.user.imagenes[0].imagen);
                    $('#avatar_paciente').html("<img class='profile-user-img img-responsive img-circle' src='" + imagen + "' alt='User profile picture'>");
                  }else{
                    $('#avatar_paciente').html("<img class='profile-user-img img-responsive img-circle' src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' alt='User profile picture'>");
                  }

                  //Info del paciente
                  $('#info_paciente_especie').text(value.paciente.tipo_animal.descripcion);
                  $('#info_paciente_raza').text(value.paciente.raza);
                  $('#info_paciente_edad').text(value.paciente.edad);
                  $('#info_paciente_sexo').text(value.paciente.sexo);
                  $('#info_paciente_color').text('No cargado.');

                  //Info del paciente
                  $('#info_cita_fecha').text(value.fecha);
                  $('#info_cita_horaInicio').text(value.horaInicio);
                  $('#info_cita_horaFinal').text(value.horaFinal);
                  $('#info_cita_servicio').text(value.descripcionServicio);
                  $('#info_cita_motivo').text(value.motivo);
                  $('#info_cita_observaciones').text(value.observaciones);

                  //Info del encargado
                  $('#info_encargado_nombre').text(value.paciente.user.nombre);
                  $('#info_encargado_cedula').text(value.paciente.user.cedula);
                  $('#info_encargado_sexo').text(value.paciente.user.sexo);
                  $('#info_encargado_nacionalidad').text(value.paciente.user.nacionalidad);
                  $('#info_encargado_telefono').text(value.paciente.user.telefono);
                  $('#info_encargado_direccion').text(value.paciente.user.direccion);

                  // //Info de los resultados
                  // $('#tratamiento').text(value.resultados.tratamiento);
                  // $('#diagnostico').text(value.resultados.diagnostico);
                  // $('#analisis').text(value.resultados.analisis);
                  // $('#recomendaciones').text(value.resultados.recomendaciones);
                // });
              }
            },
          });
      });
    });

    $(function(){
     $( "#paciente" ).autocomplete({
      source: "{{ route('autocompletePaciente') }}",
      minLength: 1,
      autofocus: true,
      select: function(event, ui) {
        $('#paciente').val(ui.item.value);
        $('#idPaciente').val(ui.item.id);
        $("#idPaciente").trigger('change');
      }
      });
    });

    $(document).ready(function(){
      $('#side_bar-procesos').addClass('active');
      $('#side_bar_option-expediente_medico').addClass('active');
      $('.alert_chequeo').hide();
      $('.alert_finalizar').hide();

    });

    function setValorDescripcion(chequeo,descripcion){
      if(!chequeo.checked){
        descripcion.value = "";
      }
    }

    $('#guardar_chequeo').click(function(){
      $(this).html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
      $(this).addClass('disabled');
      var chequeos = [];
      $("input[name='chequeos']:checked").each ( function () {
        chequeos.push($(this).val());
      });
      // alert(chequeos);

      var descripciones = [];
      $("input[name='descripciones']:enabled").each ( function () {
        var descripcion = $.trim($(this).val());

        if (descripcion =! "") {
          descripciones.push(descripcion);
        }
      });

      var arreglo = [];
      if(Array.isArray(chequeos) && chequeos.length && Array.isArray(descripciones) && descripciones.length){
        $.each(chequeos, function(index, value) {
          var descripcion = $.trim($("#descripcion-" + value).val());
          if(descripcion =! ""){
            var data = {};
            data.chequeo = value;
            data.descripcion = $("#descripcion-" + value).val();

            arreglo.push(data);
          }
        });
      }
      $.ajax({
        type: 'post',
        url: '{{route('expediente_medico.guardar.chequeos')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'cita': $('#cita').val(),
          'chequeos': chequeos,
          'descripciones': descripciones,
          'arreglo': arreglo,
        },
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: '!Errores de validación!'
            })

            $('#guardar_chequeo').html('<span><i class="fas fa-save"></i></span>&nbsp;&nbsp;Guardar chequeo');
            $('#guardar_chequeo').removeClass('disabled');

            var texto_error = "<ul>";
            if(data.errors.cita){
              texto_error += "<li>" + data.errors.cita + "</li>";
            }

            if(data.errors.chequeos){
              texto_error += "<li>" + data.errors.chequeos + "</li>";
            }

            if(data.errors.descripciones){
              texto_error += "<li>" + data.errors.descripciones + "</li>";
            }

            if(data.errors.arreglo){
              texto_error += "<li>No se pudieron registrar los chequeos.</li>";
            }
            texto_error +=  "</ul>"

            $('.texto_alert_chequeo').append("Hay errores encontrados! <br>" + texto_error);
            // $('.alert_chequeo').removeClass('hidden');
            $('.alert_chequeo').show();


          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: '!Los detalles de chequeos medicos se han editado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            $('#guardar_chequeo').html('<span><i class="fas fa-save"></i></span>&nbsp;&nbsp;Guardar chequeo');
            $('#guardar_chequeo').removeClass('disabled');

            // setTimeout(function(){
            //   location.reload();
            // }, 2000);
        }
        },
      });
    });


  </script>
@endsection
