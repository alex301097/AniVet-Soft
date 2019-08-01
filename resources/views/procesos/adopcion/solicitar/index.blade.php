@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/cards_image_expander.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ URL::to('css/accordeon_head.css') }}" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
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
      <li class="active">Solicitud</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Solicitud de adopción de animales</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        @if (empty($detalles))
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-info alert-dismissible error_vacio_div">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info"></i> Información!</h4>
                  <span class="error_vacio">Debes agregar animales a adoptar a la lista</span>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div id="accordeon_img">
                <ul  id="accordion" name="accordion"></ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 pull-right">
              <button type="button" id="limpiar_lista_detalles" class="btn btn-sm bg-navy disabled hidden" data-toggle="tooltip" title="Limpiar lista de animales a adoptar">
               &nbsp;<i class="fa fa-eraser"></i>&nbsp;
              </button>
              @csrf
              <a type="button" class="btn btn-sm bg-orange disabled hidden" data-toggle="tooltip"
              title="Click para registrar los datos personales y de contacto para finalizar la solicitud de adopción" id="finalizar_adopcion">
                Finalizar solicitud ✔
              </a>
            </div>
          </div>
        @else
          <div class="row">
            <div class="col-md-12">
              <div id="accordeon_img">
                 <ul  id="accordion" name="accordion">
                  @foreach ($detalles as $arreglo_detalles)
                    @foreach ($arreglo_detalles as $id => $detalle)
                      <li id="info_animal_{{$id}}">
                        <a class="hor_accordion" id="{{($id == 1)?"a1":""}}" data-id="{{$id}}">
                          <span id="info_animal_close_{{$id}}" data-id="{{$id}}" class="close hidden btn-eliminar-detalle"><i class="fa fa-close" style="color:white;"></i></span>
                          <img src="{{ url('imgPerfiles/'.$detalle->imagen) }}" style="width:74px; height:72px;"/>
                          <p>
                            <strong>{{(!empty($detalle->nombre))?$detalle->nombre:"Sin nombre"}}</strong><br/>
                            {{$detalle->tipo_animal." - ".$detalle->raza}}
                            <br>
                            {{$detalle->observaciones}}
                          </p>
                        </a>
                      </li>
                    @endforeach
                  @endforeach
                </ul>
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12 pull-right">
              <a type="button" class="btn btn-sm bg-orange pull-right" data-toggle="tooltip"
              title="Click para registrar los datos personales y de contacto para finalizar la solicitud de adopción" id="finalizar_adopcion">
              Finalizar solicitud ✔
              </a>
              @csrf
              <button type="button" id="limpiar_lista_detalles" class="btn btn-sm bg-navy pull-right" style="margin-right:5px;" data-toggle="tooltip" title="Limpiar lista de animales a adoptar">
               &nbsp;<i class="fa fa-eraser"></i>&nbsp;
              </button>
            </div>
          </div>
        @endif

            <div class="cards">
              @foreach ($adopciones as $detalle)
                <div class=" card [ is-collapsed ] " >
                  <div class="card__inner [ js-expander ]">
                    <span>
                      @if (!empty($detalle->nombre))
                      {{$detalle->nombre}}
                      <br>
                      @endif
                     {{$detalle->tipo_animal." - ".$detalle->raza}}
                    </span>
                    <i class="fa fa-folder-o"></i>
                  </div>
                  <div class="card__expander">
                    <i class="fa fa-close [ js-collapser ]"></i>
                    <div class="row" style="margin-right:5px;margin-left:5px;">
                      <div class="col-md-3 text-center">
                        <br>
                        <img src="{{ url('imgPerfiles/'.$detalle->imagen) }}" alt="Animal Image" style="width:150px; height:150px; top:150px; left:150px;">
                      </div>
                      <div class="col-md-9">
                        <br>
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
                        <br>
                        <div class="row">
                          <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-sm bg-orange info_registro_animal_{{$detalle->id}}" id="añadir_solicitud" name="añadir_solicitud" title="Click para añadir la solicitud de este animal a la lista de animales a adoptar"
                            data-id="{{$detalle->id}}">
                              Añadir animal
                            </button>
                          </div>
                        </div>
                        <br>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
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
                  <label for="cedula"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Cedula</h5></label>
                  <input type="text" class="form-control form-control-sm" id="cedula" name="cedula" placeholder="Cedula"></input>
                  <p class="error-cedula text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="sexo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                  <br>
                  <div class="row">
                    <div class="col-md-6">
                      <input name="sexo" class="minimal" id="masculino" value="Masculino" checked type="radio">
                      <label class="custom-control-label" for="masculino">Masculino</label>
                    </div>
                    <div class="col-md-6">
                      <input name="sexo" class="minimal" id="femenino" value="Femenino" type="radio">
                      <label class="custom-control-label" for="femenino">Femenino</label>
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
                  <label for="nombre"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Nombre</h5></label>
                  <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Nombre"></input>
                  <p class="error-nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="apellidos"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Apellidos</h5></label>
                  <input type="text" class="form-control form-control-sm" id="apellidos" name="apellidos" placeholder="Apellidos"></input>
                  <p class="error-apellidos text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="telefono"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Telefono</h5></label>
                  <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" placeholder="Telefono"></input>
                  <p class="error-telefono text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="correo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Correo</h5></label>
                  <input type="email" class="form-control form-control-sm" id="correo" name="correo" placeholder="Correo"></input>
                  <p class="error-correo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="direccion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Dirección</h5></label>
                  <textarea class="form-control form-control-sm" id="direccion" name="direccion" rows="3" placeholder="Dirección"></textarea>
                  <p class="error-direccion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="observaciones"><h5>&nbsp;Observaciones</h5></label>
                  <textarea class="form-control form-control-sm" id="observaciones" name="observaciones" rows="3" placeholder="Observaciones"></textarea>
                  <p class="error-observaciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" id="limpiar_formulario_dueño" class="btn bg-navy btn-sm pull-left" data-toggle="tooltip" title="Limpiar formulario de datos del adoptante de los animales.">
           &nbsp;<i class="fa fa-eraser"></i>&nbsp;
          </button>
          <button type="button" class="btn btn-sm btn-primary" id="efectuar_adopcion" name="efectuar_adopcion" data-toggle="tooltip" title="Click para finalizar el proceso de adopción.">Efectuar solicitud</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection
@section('scripts')
  <script src="{{ URL::to('js/cards_image_expander.js') }}"></script>
  <script src="{{ URL::to('js/accordeon_head.js') }}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{ URL::to('plugins/iCheck/icheck.min.js') }}"></script>

  <script type="text/javascript">
  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
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

  $('#finalizar_adopcion').click(function(){
    $('#modal-finalizar').modal('show');
  });

  $(document).ready(function(){
    lastBlock = $("#a1");
    $(document).on("mouseenter", "a.hor_accordion" , function() {
        $(this).animate({width: "210px"}, { queue:false, duration:400});
        lastBlock = this;

        $('#info_animal_close_'+$(this).data('id')).removeClass('hidden');
    });

    $(document).on("mouseleave", "a.hor_accordion" , function() {
        $(lastBlock).animate({width: "75px"}, { queue:false, duration:400 });

        $('#info_animal_close_'+$(this).data('id')).addClass('hidden');
    });

    $(document).on("click", ".btn-eliminar-detalle", function(e) {
      $.ajax({
        type: 'post',
        url: '{{route('adopciones.solicitar.limpiar_individual')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'detalle_solicitud_id': $(this).data('id')
        },
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            });

            $.each(data.errors, function( index, value ) {
              var clase = ".error-" + index;
              $(clase).removeClass('hidden');
              $(clase).text(value);
            });

          }else{
            e.preventDefault();
            $('#accordion').empty();
            if(data != []){
              $.each(data, function(index, value) {
                $.each(value, function(index, value){

                  var nombre = (value.nombre)?value.nombre:"Sin nombre";
                  var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
                  imagen = imagen.replace(':ruta_imagen', value.imagen);
                  var id = (index == 1)?"id='a1'":"";
                  let lst = document.querySelector('#accordion');
                  lst.appendChild(document.createElement('li'));
                  let lstChild = lst.lastChild;
                  lstChild.innerHTML = "<a " + id + " class='hor_accordion' data-id='"+ index +"'><span id='info_animal_close_"+ index +"' data-id='"+index+"' class='close hidden btn-eliminar-detalle'><i class='fa fa-close' style='color:white;'></i></span><img src='" + imagen + "' style='width:72px; height:72px;'/><p><strong>" + nombre + "</strong><br/>" + value.tipo_animal + " - " + value.raza + "<br/>" + value.observaciones + "</p></a>";
                  lstChild.className = 'info_animal_' + index;
                });
              });
            }else{
              $('.alert').show();
            }

              Toast.fire({
                type: 'success',
                title: '¡Solicitud de adopción correctamente eliminada!'
              });

          }
        },
      });
    });
  });

  $(document).ready(function(){
    $('#side_bar-procesos').addClass('active');
    $('#side_bar_option-adopcion_mascotas').addClass('active');
    $('#side_bar_option-adopcion_mascotas-solicitud').addClass('active');
  });

  //Añadir
  $('#añadir_solicitud').click(function(e){
    $.ajax({
      type: 'post',
      url: '{{route('adopciones.solicitar')}}',
      data: {
        '_token': $('input[name=_token]').val(),
        'adopcion_id': $(this).data('id')
      },
      success: function(data){
        if((data.errors)){
          Toast.fire({
            type: 'warning',
            title: 'Errores de validación!'
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

              var nombre = (value.nombre)?value.nombre:"Sin nombre";
              var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
              imagen = imagen.replace(':ruta_imagen', value.imagen);
              var id = (index == 1)?"id='a1'":"";
              let lst = document.querySelector('#accordion');
              lst.appendChild(document.createElement('li'));
              let lstChild = lst.lastChild;
              lstChild.innerHTML = "<a " + id + " class='hor_accordion' data-id='"+ index +"'><span id='info_animal_close_"+ index +"' data-id='"+index+"' class='close hidden btn-eliminar-detalle'><i class='fa fa-close' style='color:white;'></i></span><img src='" + imagen + "' style='width:72px; height:72px;'/><p><strong>" + nombre + "</strong><br/>" + value.tipo_animal + " - " + value.raza + "<br/>" + value.observaciones + "</p></a>";
              lstChild.className = 'info_animal_' + index;
             });
          });

            Toast.fire({
              type: 'success',
              title: '¡Solicitud de adopción correctamente añadida!'
            });

            $('.alert').hide();

            $('#limpiar_lista_detalles').removeClass('disabled');
            $('#limpiar_lista_detalles').removeClass('hidden');

            $('#finalizar_adopcion').removeClass('disabled');
            $('#finalizar_adopcion').removeClass('hidden');

            $('#limpiar_formulario_dueño').removeClass('hidden');
            $('#limpiar_formulario_dueño').removeClass('disabled');

            $('#efectuar_adopcion').removeClass('disabled');
            $('#efectuar_adopcion').removeClass('hidden');

        }
      },
    });
  });

  //Finalizar
  $('#efectuar_adopcion').click(function(){
    $.ajax({
      type: 'post',
      url: '{{route('adopciones.solicitar.finalizar')}}',
      data: {
        '_token': $('input[name=_token]').val(),
        'cedula': $('#cedula').val(),
        'nombre': $('#nombre').val(),
        'apellidos': $('#apellidos').val(),
        'sexo': $('input[name="sexo"]:checked').val(),
        'telefono': $('#telefono').val(),
        'correo': $('#correo').val(),
        'direccion': $('#direccion').val(),
        'observaciones': $('#observaciones').val(),
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
            title: '¡Has adoptado los animales correctamente! Se te enviaran al correo electronico todos los datos pertinentes.',
            showConfirmButton: false,
            timer: 1500
          })

          setTimeout(function(){
            var url = "{{route('home')}}";
                document.location.href=url;
          }, 2000);
      }
      },
    });
  });

  $('#limpiar_lista_detalles').click(function(){
    $.ajax({
      type: 'post',
      url: '{{route('adopciones.solicitar.limpiar_todo')}}',
      data: {
        '_token': $('input[name=_token]').val(),
      },
      success: function(data){
          if(data == true){
            $('#accordion').empty();

            $('.alert').show();

            $('#limpiar_lista_detalles').addClass('disabled');
            $('#limpiar_lista_detalles').addClass('hidden');

            $('#finalizar_adopcion').addClass('disabled');
            $('#finalizar_adopcion').addClass('hidden');

            $('#limpiar_formulario_dueño').addClass('hidden');
            $('#limpiar_formulario_dueño').addClass('disabled');

            $('#efectuar_adopcion').addClass('disabled');
            $('#efectuar_adopcion').addClass('hidden');
          }
      },
    });
  });


  // $('.btn-eliminar-detalle').click(function(e){
  //   $.ajax({
  //     type: 'post',
  //     url: '{{route('adopciones.solicitar.limpiar_individual')}}',
  //     data: {
  //       '_token': $('input[name=_token]').val(),
  //       'detalle_solicitud_id': $(this).data('id')
  //     },
  //     success: function(data){
  //       if((data.errors)){
  //         Toast.fire({
  //           type: 'warning',
  //           title: 'Errores de validación!'
  //         });
  //
  //         $.each(data.errors, function( index, value ) {
  //           var clase = ".error-" + index;
  //           $(clase).removeClass('hidden');
  //           $(clase).text(value);
  //         });
  //
  //       }else{
  //         e.preventDefault();
  //         $('#accordion').empty();
  //         $.each(data, function(index, value) {
  //           $.each(value, function(index, value){
  //
  //             var nombre = (value.nombre)?value.nombre:"Sin nombre";
  //             var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
  //             imagen = imagen.replace(':ruta_imagen', value.imagen);
  //             var id = (index == 1)?"id='a1'":"";
  //             let lst = document.querySelector('#accordion');
  //             lst.appendChild(document.createElement('li'));
  //             let lstChild = lst.lastChild;
  //             lstChild.innerHTML = "<a " + id + " class='hor_accordion' data-id='"+ index +"'><span id='info_animal_close_"+ index +"' data-id='"+index+"' class='close hidden'><i class='fa fa-close' style='color:white;'></i></span><img src='" + imagen + "' style='width:72px; height:72px;'/><p><strong>" + nombre + "</strong><br/>" + value.tipo_animal + " - " + value.raza + "<br/>" + value.observaciones + "</p></a>";
  //             lstChild.className = 'info_animal_' + index;
  //            });
  //         });
  //
  //           Toast.fire({
  //             type: 'success',
  //             title: '¡Solicitud de adopción correctamente eliminada!'
  //           });
  //
  //       }
  //     },
  //   });
  // });

  $('#limpiar_formulario_dueño').click(function(){
    $('#form-dueño').trigger("reset");
  });
  </script>
@endsection
