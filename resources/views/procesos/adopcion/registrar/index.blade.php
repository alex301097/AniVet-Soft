@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/accordeon.css') }}" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link type="text/css" href="{{ URL::to('css/input_file.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::to('plugins/iCheck/all.css') }}">

@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Adopción de animales
      <small>Proceso</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Procesos</a></li>
      <li><a href="#">Adopción de animales</a></li>
      <li class="active">Registro</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Registro de animales en adopción</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-info alert-dismissible error_vacio_div hidden">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Información!</h4>
                <span class="error_vacio hidden"></span>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-7">
            <div class="box box-warning">
              <div class="box-header">
                <i class="fa fa-newspaper-o"></i>

                <h3 class="box-title">Añadir adopción</h3>
              </div>
              <div class="box-body">
                <form id="form-cita" name="form-cita">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre"><h5>Nombre</h5></label>
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Nombre">
                        <p class="error-nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="edad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Edad</h5></label>
                        <input type="text" class="form-control form-control-sm" id="edad" name="edad" placeholder="Edad">
                        <p class="error-edad text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="peso"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Peso</h5></label>
                        <input type="text" class="form-control form-control-sm" id="peso" name="peso" placeholder="Peso">
                        <p class="error-peso text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="tipo_animal"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Tipo de animal</h5></label>
                        <input type="text" class="form-control form-control-sm" id="tipo_animal" name="tipo_animal" placeholder="Tipo de animal">
                        <p class="error-tipo_animal text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="raza"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Raza</h5></label>
                        <input type="text" class="form-control form-control-sm" id="raza" name="raza" placeholder="Raza">
                        <p class="error-raza text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="sexo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                        <br>
                        <div class="row">
                          <div class="col-md-6">
                            <input name="sexo" class="minimal" id="macho" value="Macho" checked type="radio">
                            <label class="custom-control-label" for="macho">Macho</label>
                          </div>
                          <div class="col-md-6">
                            <input name="sexo" class="minimal" id="hembra" value="Hembra" type="radio">
                            <label class="custom-control-label" for="hembra">Hembra</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <p class="error-sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="color"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Color</h5></label>
                        <input type="text" class="form-control form-control-sm" id="color" name="color" placeholder="Color">
                        <p class="error-color text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label for="imagen"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Imagen</h5></label>
                      <div class="input-group image-preview">
                          <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                          <span class="input-group-btn">
                              <!-- image-preview-clear button -->
                              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                  <span class="glyphicon glyphicon-remove"></span> Limpiar
                              </button>
                              <!-- image-preview-input -->
                              <div class="btn btn-default image-preview-input">
                                  <span class="glyphicon glyphicon-folder-open"></span>
                                  <span class="image-preview-input-title">Buscar</span>
                                  <input type="file" accept="image/png, image/jpeg, image/gif" id="imagen" name="imagen"/> <!-- rename it -->
                              </div>
                          </span>
                      </div><!-- /input-group image-preview [TO HERE]-->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="condiciones"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Condiciones</h5></label>
                        <textarea class="form-control form-control-sm" id="condiciones" name="condiciones" rows="3" placeholder="Condiciones"></textarea>
                        <p class="error-condiciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="observaciones"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Observaciones</h5></label>
                        <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="3" placeholder="Observaciones"></textarea>
                        <p class="error-observaciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" id="limpiar_formulario_cita" class="btn bg-navy btn-sm pull-left" data-toggle="tooltip" title="Limpiar formulario">
                     &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </button>
                    @csrf
                    <button type="submit" class="btn btn-sm btn-success pull-right" id="añadir_adopcion" name="añadir_adopcion" data-toggle="tooltip" title="Click para añadir el animal a la lista de animales a adoptar">
                      &nbsp;<i class="fa fa-plus-square"></i>&nbsp;&nbsp;Añadir animal
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list-ol"></i>

                <h3 class="box-title">Lista de animales en adopción</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group text-center" id="accordion" role="tablist" aria-multiselectable="true">
                          @if (empty($detalles))
                            <h3>No hay animales en adopción agregados</h3>
                          @else
                            @foreach ($detalles as $arreglo_detalles)
                              @foreach ($arreglo_detalles as $index => $detalle)
                                <div class="panel panel-default" id="adopcion_{{$index}}" name="adopcion_{{$index}}">
                                  <div class="panel-heading" role="tab" id="heading_{{$index}}">
                                      <h4 class="panel-title">
                                          <a class="{{($index == 1)?"":"collapsed"}}" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$index}}" aria-expanded="{{($index == 1)?"true":"false"}}" aria-controls="collapse_{{$index}}">
                                              <span>{{$index}}</span>
                                              {{(!empty($detalle->nombre))?$detalle->nombre." - ".$detalle->tipo_animal." - ".$detalle->raza." - ".$detalle->sexo:$detalle->tipo_animal." - ".$detalle->raza." - ".$detalle->sexo}}
                                          </a>
                                      </h4>
                                  </div>
                                  <div id="collapse_{{$index}}" class="panel-collapse collapse {{($index == 1)?"in":""}}" role="tabpanel" aria-labelledby="heading_{{$index}}">
                                      <div class="panel-body">
                                          <p>
                                            <div class="row">
                                              <div class="col-md-4 text-center" id="avatar_animal_{{$index}}">
                                                <img src="{{ url('imgPerfiles/'.$detalle->imagen) }}" class="img-circle" alt="Animal Image" style="width:100px; height:100px; top:100px; left:100px;">
                                              </div>
                                              <div class="col-md-8">
                                                <div class="row">
                                                  <div class="col-md-4">
                                                    <b>Edad: </b> {{$detalle->edad}} <br>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <b>Peso: </b> {{$detalle->peso}} <br>
                                                  </div>
                                                  <div class="col-md-4">
                                                    <b>Color: </b> {{$detalle->color}} <br>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <b>Condiciones: </b> {{$detalle->condiciones}} <br>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <b>Observaciones: </b> {{$detalle->observaciones}} <br>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                              @endforeach
                            @endforeach
                          @endif
                        </div>
                    </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <button type="button" id="limpiar_lista_detalles" class="btn btn-sm bg-navy pull-left" data-toggle="tooltip" title="Limpiar lista de animales para adopción">
                     &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </button>
                    @csrf
                      <a type="button" class="btn btn-sm bg-orange pull-right disabled" data-toggle="tooltip"
                      title="Click para registrar los datos personales y de contacto para finalizar el registro de adopción" id="finalizar_adopcion">
                        Finalizar adopción ✔
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->

      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->



  <div class="modal fade" id="modal-finalizar" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Información personal y de contacto</h4>
        </div>
        <div class="modal-body">
          <form id="form-dueño" name="form-dueño">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="cedula_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Cedula</h5></label>
                  <input type="text" class="form-control form-control-sm" id="cedula_dueño" name="cedula_dueño" placeholder="Cedula"></input>
                  <p class="error-cedula_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="sexo_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <input name="sexo_dueño" class="minimal" id="masculino" value="Masculino" checked type="radio">
                      <label class="custom-control-label" for="masculino">Masculino</label>
                    </div>
                    <div class="col-md-6">
                      <input name="sexo_dueño" class="minimal" id="femenino" value="Femenino" type="radio">
                      <label class="custom-control-label" for="femenino">Femenino</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <p class="error-sexo_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nombre_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Nombre</h5></label>
                  <input type="text" class="form-control form-control-sm" id="nombre_dueño" name="nombre_dueño" placeholder="Nombre"></input>
                  <p class="error-nombre_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="apellidos_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Apellidos</h5></label>
                  <input type="text" class="form-control form-control-sm" id="apellidos_dueño" name="apellidos_dueño" placeholder="Apellidos"></input>
                  <p class="error-apellidos_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="telefono_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Telefono</h5></label>
                  <input type="text" class="form-control form-control-sm" id="telefono_dueño" name="telefono_dueño" placeholder="Telefono"></input>
                  <p class="error-telefono_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="correo_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Correo</h5></label>
                  <input type="email" class="form-control form-control-sm" id="correo_dueño" name="correo_dueño" placeholder="Correo"></input>
                  <p class="error-correo_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="direccion_dueño"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Dirección</h5></label>
                  <textarea class="form-control form-control-sm" id="direccion_dueño" name="direccion_dueño" rows="3" placeholder="Dirección"></textarea>
                  <p class="error-direccion_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="observaciones_dueño"><h5>&nbsp;Observaciones</h5></label>
                  <textarea class="form-control form-control-sm" id="observaciones_dueño" name="observaciones_dueño" rows="3" placeholder="Observaciones"></textarea>
                  <p class="error-observaciones_dueño text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="limpiar_formulario_dueño" class="btn bg-navy btn-sm pull-left" data-toggle="tooltip" title="Limpiar formulario de datos del dueño del animal">
           &nbsp;<i class="fa fa-eraser"></i>&nbsp;
          </button>
          <button type="button" class="btn btn-sm btn-primary disabled" id="efectuar_adopcion" name="efectuar_adopcion">Efectuar registro</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@endsection
@section('scripts')
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

  <script src="{{ URL::to('js/input_file.js') }}"></script>

  <!-- iCheck 1.0.1 -->
  <script src="{{ URL::to('plugins/iCheck/icheck.min.js') }}"></script>

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

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })

  $(document).ready(function(){
    $('#side_bar-procesos').addClass('active');
    $('#side_bar_option-adopcion_mascotas').addClass('active');
    $('#side_bar_option-adopcion_mascotas-registro').addClass('active');
  });

  $('#limpiar_formulario_cita').click(function(){
    $('#form-cita').trigger("reset");
    $('.image-preview-clear').trigger('click');
  });

  $('#limpiar_lista_detalles').click(function(){
    $.ajax({
      type: 'post',
      url: '{{route('adopciones.registrar.limpiar_todo')}}',
      data: {
        '_token': $('input[name=_token]').val(),
      },
      success: function(data){
          if(data == true){
            $('#accordion').empty();
            $('#finalizar_adopcion').addClass('disabled');
            $('#efectuar_adopcion').addClass('disabled');

            $('#accordion').append("<h3>No hay animales en adopción agregados</h3>");
          }
      },
    });
  });

  $('#limpiar_formulario_dueño').click(function(){
    $('#form-dueño').trigger("reset");
  });

  $('#finalizar_adopcion').click(function(){
    $('#modal-finalizar').modal('show');
  });

  //Añadir
  $('#añadir_adopcion').click(function(e){
    var form_data = new FormData();
    form_data.append('_token', $('input[name=_token]').val());
    if($('#imagen')[0].files[0]){
      form_data.append('imagen', $('#imagen')[0].files[0]);
    }

    form_data.append('nombre', $('#nombre').val());
    form_data.append('edad', $('#edad').val());
    form_data.append('peso', $('#peso').val());
    form_data.append('tipo_animal', $('#tipo_animal').val());
    form_data.append('sexo', $('input[name="sexo"]:checked').val());
    form_data.append('raza', $('#raza').val());
    form_data.append('color', $('#color').val());
    form_data.append('condiciones', $('#condiciones').val());
    form_data.append('observaciones', $('#observaciones').val());

    $.ajax({
      type: 'post',
      url: '{{route('adopciones.registrar')}}',
      data: form_data,
      processData: false,
      contentType: false,
      success: function(data){
        if((data.errors)){
          Toast.fire({
            type: 'warning',
            title: '!Errores de validación!'
          });

          $.each(data.errors, function( index, value ) {
            var clase = ".error-" + index;
            $(clase).removeClass('hidden');
            $(clase).text(value);
          });

        }else{
          e.preventDefault()
          $('#accordion').empty();
          $.each(data, function(index, value) {
            $.each(value, function(index, value){
              if(value.nombre){
                var titulo = value.nombre + " - " + value.tipo_animal + " - " + value.raza  + " - " + value.sexo;
              }else{
                var titulo = value.tipo_animal + " - " + value.raza + " - " + value.sexo;
              }
              var collapsed = (index == 1)?"":"collapsed";
              var collapse_in = (index == 1)?"in":"";
              var aria_expanded = (index == 1)?"true":"false";
              var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
              imagen = imagen.replace(':ruta_imagen', value.imagen);

      				$('#accordion').append("<div class='panel panel-default' id='adopcion_" + index + "' name='adopcion_" + index + "'>" +
                  "<div class='panel-heading' role='tab' id='heading_" + index + "'>" +
                      "<h4 class='panel-title'>" +
                          "<a class='"+ collapsed +"' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse_" + index + "' aria-expanded='" + aria_expanded + "' aria-controls='collapse_" + index + "'>" +
                              "<span>" + index + "</span>" +
                                titulo +
                          "</a>" +
                      "</h4>" +
                  "</div>" +
                  "<div id='collapse_" + index + "' class='panel-collapse collapse " + collapse_in + "' role='tabpanel' aria-labelledby='heading_" + index + "'>" +
                      "<div class='panel-body'>" +
                          "<div class='row'>" +
                            "<div class='col-md-4 text-center' id='avatar_animal_" + index + "'>" +
                            "</div>" +
                            "<div class='col-md-8'>" +
                              "<p>" +
                              "<div class='row'>" +
                                "<div class='col-md-4'>" +
                                  "<b>Edad: </b>" + value.edad + "<br>" +
                                "</div>" +
                                "<div class='col-md-4'>" +
                                    "<b>Peso: </b>" + value.peso + "<br>" +
                                "</div>" +
                                "<div class='col-md-4'>" +
                                  "<b>Color: </b>" + value.color + "<br>" +
                                "</div>" +
                              "</div>" +
                              "<div class='row'>" +
                                "<div class='col-md-6'>" +
                                  "<b>Condiciones: </b>" + value.condiciones + "<br>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                  "<b>Observaciones: </b>" + value.observaciones + "<br>" +
                                "</div>" +
                              "</div>" +
                              "</p>" +
                            "</div>" +
                          "</div>" +
                      "</div>" +
                  "</div>" +
              "</div>");

              $('#avatar_animal_' + index).html("<img src='" + imagen + "' class='img-circle' alt='Animal Image' style='width:100px; height:100px; top:100px; left:100px;'>");
      			 });
					});

            Toast.fire({
              type: 'success',
              title: 'Adopción añadida!'
            });

            $('#form-cita').trigger("reset");
            $('.image-preview-clear').trigger('click');
            $('#finalizar_adopcion').removeClass('disabled');
            $('#efectuar_adopcion').removeClass('disabled');
        }
      },
    });
  });

  //Finalizar
  $('#efectuar_adopcion').click(function(){
    $.ajax({
      type: 'post',
      url: '{{route('adopciones.registrar.finalizar')}}',
      data: {
        '_token': $('input[name=_token]').val(),
        'cedula_dueño': $('#cedula_dueño').val(),
        'nombre_dueño': $('#nombre_dueño').val(),
        'apellidos_dueño': $('#apellidos_dueño').val(),
        'sexo_dueño': $('input[name="sexo_dueño"]:checked').val(),
        'telefono_dueño': $('#telefono_dueño').val(),
        'correo_dueño': $('#correo_dueño').val(),
        'direccion_dueño': $('#direccion_dueño').val(),
        'observaciones_dueño': $('#observaciones_dueño').val(),
      },
      success: function(data){
        if((data.errors)){
          Toast.fire({
            type: 'warning',
            title: '¡Errores de validación!'
          })

          if(data.errors.error_vacio){
            $('.error_vacio_div').removeClass('hidden');
            $('.error_vacio').removeClass('hidden');
            $('.error_vacio').text(data.errors.error_vacio);
          }

          $.each(data.errors, function( index, value ) {
            var clase = ".error-" + index;
            $(clase).removeClass('hidden');
            $(clase).text(value);
          });

        }else{
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: '¡Los animales se han puesto en adopción correctamente!',
            showConfirmButton: false,
            timer: 1500
          })

          setTimeout(function(){
            var url = "{{route('adopciones.get_solicitar')}}";
                document.location.href=url;
          }, 2000);
      }
      },
    });
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
