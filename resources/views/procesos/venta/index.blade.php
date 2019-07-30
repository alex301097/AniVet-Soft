@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/cards_image.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ URL::to('css/accordeon.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::to('plugins/iCheck/all.css') }}">

@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Veterinaria El Yugo
      <small>Información</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Inicio</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-lg-8">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list-ol"></i>

                <h3 class="box-title">Lista de animales en venta</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card_image">
                      @if (empty($animales))
                        <h3>No hay animales en venta disponibles</h3>
                      @else
                        <ul class="cards">
                          @foreach ($animales as $animal)
                            <li class="cards__item">
                              <div class="card">
                                <div class="card__image" style="background-image: url({{url('imgPerfiles/'.$animal->imagenes->first()->imagen)}})"></div>
                                <div class="card__content text-center">
                                  <div class="card__title"><h4>{{$animal->tipo_animal->descripcion." - ".$animal->raza." - ".$animal->sexo}}</h3></div>
                                    <p class="card__text">
                                      <h5>
                                        <b>Peso: </b> {{$animal->peso}} - <b>Edad: </b> {{$animal->edad}} <br>
                                        <b>Fecha de nacimiento: </b> {{$animal->fecha_nacimiento}} <br>
                                        <b>Cantidad: </b> {{$animal->cantidad}} - <b>Precio: </b> {{$animal->precio}}<br>
                                        <b>Observaciones: </b> {{$animal->observaciones}}<br>
                                        <b>Condiciones: </b> {{$animal->condiciones}}
                                      </h5>
                                    </p>
                                    <button class="btn btn-block btn-primary btn-sm" id="agregar_animales" data-id="{{$animal->id}}">Agregar</button>
                                  </div>
                                </div>
                              </li>
                            @endforeach
                          </ul>
                      @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list-ol"></i>

                <h3 class="box-title">Lista de animales a comprar</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group text-center" id="accordion" role="tablist" aria-multiselectable="true">
                          @if (empty($detalles))
                            <h3>No hay animales a comprar agregados</h3>
                          @else
                            @foreach ($detalles as $arreglo_detalles)
                              @foreach ($arreglo_detalles as $index => $detalle)
                                <div class="panel panel-default" id="venta_{{$index}}" name="venta_{{$index}}">
                                  <div class="panel-heading" role="tab" id="heading_{{$index}}">
                                      <h4 class="panel-title">
                                          <a class="{{($index == 1)?"":"collapsed"}}" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$index}}" aria-expanded="{{($index == 1)?"true":"false"}}" aria-controls="collapse_{{$index}}">
                                              <span>{{$index}}</span>
                                              {{$detalle->tipo_animal->descripcion." - ".$detalle->raza." - ".$detalle->sexo}}
                                          </a>
                                      </h4>
                                  </div>
                                  <div id="collapse_{{$index}}" class="panel-collapse collapse {{($index == 1)?"in":""}}" role="tabpanel" aria-labelledby="heading_{{$index}}">
                                      <div class="panel-body">
                                          <p>
                                            <div class="row">
                                              <div class="col-md-4 text-center" id="avatar_animal_{{$index}}">
                                                <img src="{{ url('imgPerfiles/'.$detalle->imagenes->first()) }}" class="img-circle" alt="Animal Image" style="width:100px; height:100px; top:100px; left:100px;">
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
                                                    <b>Fecha de nacimiento: </b> {{$detalle->fecha_nacimiento}} <br>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <b>Precio: </b> {{$detalle->precio}} <br>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <b>Cantidad: </b> {{$detalle->cantidad}} <br>
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
                    <button type="button" id="limpiar_lista_detalles" class="btn btn-sm bg-navy pull-left disabled" data-toggle="tooltip" title="Limpiar lista de animales a comprar">
                     &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </button>
                    @csrf
                      <a type="button" class="btn btn-sm bg-orange pull-right disabled" data-toggle="tooltip"
                      title="Click para registrar los datos personales y de contacto para finalizar la solicitud de compra" id="finalizar_venta">
                        Finalizar compra ✔
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
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
  {{-- <script src="{{ URL::to('js/accordeon_with_sub_menu.js') }}"></script> --}}
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
    $('#side_bar_option-venta_animales').addClass('active');
  });

  $('#limpiar_lista_detalles').click(function(){
    $.ajax({
      type: 'post',
      url: '{{route('venta_animales.solicitar.limpiar_todo')}}',
      data: {
        '_token': $('input[name=_token]').val(),
      },
      success: function(data){
          if(data == true){
            $('#accordion').empty();
            $('#limpiar_lista_detalles').addClass('disabled');
            $('#finalizar_venta').addClass('disabled');

            $('#accordion').append("<h3>No hay animales a comprar agregados</h3>");
          }
      },
    });
  });

  $('#limpiar_formulario_dueño').click(function(){
    $('#form-dueño').trigger("reset");
  });

  $('#finalizar_venta').click(function(){
    $('#modal-finalizar').modal('show');
  });

  //Añadir
  $('#agregar_animales').click(function(e){
    $.ajax({
      type: 'post',
      url: '{{route('venta_animales.solicitar')}}',
      data: {
        '_token': $('input[name=_token]').val(),
        'animal_venta_id': $(this).data('id')
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

              var titulo = value.tipo_animal.descripcion + " - " + value.raza + " - " + value.sexo;
              var collapsed = (index == 1)?"":"collapsed";
              var collapse_in = (index == 1)?"in":"";
              var aria_expanded = (index == 1)?"true":"false";
              var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
              imagen = imagen.replace(':ruta_imagen', value.imagenes.imagen[0]);

      				$('#accordion').append("<div class='panel panel-default' id='venta_" + index + "' name='venta_" + index + "'>" +
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
                              "<div class='row'>" +
                                "<div class='col-md-4'>" +
                                  "<b>Edad: </b>" + value.edad + "<br>" +
                                "</div>" +
                                "<div class='col-md-4'>" +
                                  "<b>Peso: </b>" + value.peso + "<br>" +
                                "</div>" +
                                "<div class='col-md-4'>" +
                                  "<b>Fecha de nacimiento: </b>" + value.fecha_nacimiento +"<br>" +
                                "</div>" +
                              "</div>" +
                              "<div class='row'>" +
                                "<div class='col-md-6'>" +
                                  "<b>Precio: </b>" + value.precio + "<br>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                  "<b>Cantidad: </b>" + value.cantidad + "<br>" +
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
            title: '¡Has solicitado la compra de estos animales correctamente! Se te enviaran al correo electronico todos los datos pertinentes.',
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

  </script>
@endsection
