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
      <small>Proceso</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
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
          <div class="col-lg-7">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list-ol"></i>

                <h3 class="box-title">Lista de animales en venta</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card_image">
                      @if (empty($animales) || count($animales) == 0)
                        <h3 class="text-center">No hay animales en venta disponibles.</h3>
                      @else
                        <ul class="cards">
                          @foreach ($animales as $animal)
                            <li class="cards__item">
                              <div class="card">
                                @if (count($animal->imagenes) > 0)
                                  <div class="card__image" style="background-image: url({{url('imgPerfiles/'.$animal->imagenes->first()->imagen)}})"></div>
                                @else
                                  <div class="card__image" style="background-image: url({{url('img/brand/dog.png')}})"></div>
                                @endif
                                <div class="card__content text-center">
                                  <div class="card__title"><h4>{{$animal->tipo_animal->descripcion." - ".$animal->raza." - ".$animal->sexo}}</h3></div>
                                    <p class="card__text">
                                      <h5>
                                        <b>Peso: </b> {{$animal->peso}} - <b>Edad: </b> {{$animal->edad}} <br>
                                        <b>Fecha de nacimiento: </b> {{date('d/m/Y', strtotime($animal->fecha_nacimiento))}} <br>
                                        <b>Cantidad: </b> {{$animal->cantidad}} - <b>Precio: </b> ₡{{$animal->precio}}<br>
                                        <b>Observaciones: </b> {{$animal->observaciones}}<br>
                                        <b>Condiciones: </b> {{$animal->condiciones}}
                                      </h5>
                                    </p>
                                    <a type="button" class="btn btn-sm btn-primary añadir_animales_venta {{(collect($detalles)->pluck('animal_venta_id')->contains($animal->id))?"disabled":""}}" data-toggle="tooltip"
                                      title="Click para agregar el animal a la lista de animales a comprar."
                                      id="añadir_animales_venta_{{$animal->id}}" data-id="{{$animal->id}}">
                                        Añadir animal
                                    </a>
                                  </<div>
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
          <div class="col-lg-5">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-list-ol"></i>

                <h3 class="box-title">Lista de animales a comprar.</h3>
              </div>
              <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group text-center" id="accordion" role="tablist" aria-multiselectable="true">
                          @if (empty($detalles))
                            <h3>No hay animales a comprar agregados</h3>
                          @else
                            @foreach ($detalles as $index => $detalle)
                                <div class="panel panel-default" id="venta_{{$detalle->animal_venta->id}}" name="venta_{{$detalle->animal_venta->id}}">
                                  <div class="panel-heading" role="tab" id="heading_{{$detalle->animal_venta->id}}">
                                      <h4 class="panel-title">
                                          <a class="{{($index + 1 == 1)?"":"collapsed"}}" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$detalle->animal_venta->id}}" aria-expanded="{{($index + 1 == 1)?"true":"false"}}" aria-controls="collapse_{{$detalle->animal_venta->id}}">
                                              <span>{{$index + 1}}</span>
                                              {{$detalle->animal_venta->tipo_animal->descripcion." - ".$detalle->animal_venta->raza." - ".$detalle->animal_venta->sexo}}
                                          </a>
                                      </h4>
                                  </div>
                                  <div id="collapse_{{$detalle->animal_venta->id}}" class="panel-collapse collapse {{($index + 1 == 1)?"in":""}}" role="tabpanel" aria-labelledby="heading_{{$detalle->animal_venta->id}}">
                                      <div class="panel-body">
                                          <p>
                                            <div class="row">
                                              <div class="col-md-4 text-center">
                                                @if (count($detalle->animal_venta->imagenes) > 0)
                                                  <img src='{{url('imgPerfiles/'.$detalle->animal_venta->imagenes->first()->imagen)}}' class='img-circle' alt='Animal Image' style='width:100px; height:100px; top:100px; left:100px;'>
                                                @else
                                                  <img src='{{url('img/brand/dog.png')}}' class='img-circle' alt='Animal Image' style='width:100px; height:100px; top:100px; left:100px;'>
                                                @endif
                                                <div class="row">
                                                  <div class="col-md-12">
                                                      <a type="button" class="btn btn-sm btn-danger text-center btn-eliminar-detalle" data-toggle="tooltip"
                                                        title="Click para eliminar la solicitud de compra" id="btn-eliminar-detalle_{{$detalle->animal_venta->id}}" data-id="{{$detalle->animal_venta->id}}">
                                                        Eliminar
                                                      </a>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-8">
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <b>Edad: </b> {{$detalle->animal_venta->edad}} <br>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <b>Peso: </b> {{$detalle->animal_venta->peso}} <br>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <b>Fecha de nacimiento: </b> {{$detalle->animal_venta->fecha_nacimiento}} <br>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <b>Precio: </b> ₡{{$detalle->animal_venta->precio}} <br>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <b>Cantidad: </b> {{$detalle->animal_venta->cantidad}} <br>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <b>Condiciones: </b> {{$detalle->animal_venta->condiciones}} <br>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <b>Observaciones: </b> {{$detalle->animal_venta->observaciones}} <br>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </p>
                                      </div>
                                  </div>
                              </div>
                            @endforeach
                          @endif
                        </div>
                    </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <a type="button" class="btn btn-sm bg-navy pull-navy {{(empty($detalles)?"disabled":"")}}" data-toggle="tooltip"
                    title="Limpiar lista de animales a comprar" id="limpiar_lista_detalles">
                    &nbsp;<i class="fa fa-eraser"></i>&nbsp;
                    </a>
                    @csrf
                    <a type="button" class="btn btn-sm bg-orange pull-right {{(empty($detalles)?"disabled":"")}}" data-toggle="tooltip"
                    title="Click para registrar los datos personales y de contacto para finalizar la solicitud de compra"
                    id="finalizar_venta">
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
          <a type="button" id="limpiar_formulario_dueño" class="btn bg-navy btn-sm pull-left" data-toggle="tooltip" title="Limpiar formulario de datos del adoptante de los animales.">
           &nbsp;<i class="fa fa-eraser"></i>&nbsp;
         </a>
          <a type="button" class="btn btn-sm btn-primary" id="efectuar_adopcion" name="efectuar_adopcion"
          data-toggle="tooltip" title="Click para finalizar el proceso de adopción.">Efectuar solicitud</a>
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

  $(document).on("click", ".btn-eliminar-detalle", function(e) {
    $('.btn-eliminar-detalle').html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
    $('.btn-eliminar-detalle').addClass('disabled');
      $.ajax({
        type: 'post',
        url: '{{route('venta_animales.solicitar.limpiar_individual')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'animal_id': $(this).data('id')
        },
        success: function(data){
          if((data.length == 0)){
            $('.btn-eliminar-detalle').html('Eliminar');
            $('.btn-eliminar-detalle').removeClass('disabled');
            Toast.fire({
              type: 'success',
              title: '¡Solicitud de compra correctamente eliminada!'
            });

            $('#accordion').empty();
            $('.añadir_animales_venta').removeClass('disabled');
            $('#limpiar_lista_detalles').addClass('disabled');
            $('#efectuar_adopcion').addClass('disabled');
            $('#limpiar_formulario_dueño').addClass('disabled');
            $('#finalizar_venta').addClass('disabled');
            $('#accordion').append("<h3>No hay animales a comprar agregados</h3>");

          }else{
            e.preventDefault()
            $('.btn-eliminar-detalle').html('Eliminar');
            $('.btn-eliminar-detalle').removeClass('disabled');
            $('#accordion').empty();
            $('.añadir_animales_venta').removeClass('disabled');

            $.each(data, function(index, value) {
                var index = index + 1;
                $('#añadir_animales_venta_' + value.animal_venta.id).addClass('disabled');
                var titulo = value.animal_venta.tipo_animal.descripcion + " - " + value.animal_venta.raza + " - " + value.animal_venta.sexo;
                var collapsed = (index == 1)?"":"collapsed";
                var collapse_in = (index == 1)?"in":"";
                var aria_expanded = (index == 1)?"true":"false";
                if(Array.isArray(value.animal_venta.imagenes) && value.animal_venta.imagenes.length){
                  var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
                  imagen = imagen.replace(':ruta_imagen', value.animal_venta.imagenes[0].imagen);
                }else{
                  var imagen = "{{ url('img/brand/dog.png') }}";
                }

        				$('#accordion').append("<div class='panel panel-default' id='venta_" + value.animal_venta.id + "' name='venta_" + value.animal_venta.id + "'>" +
                    "<div class='panel-heading' role='tab' id='heading_" + value.animal_venta.id + "'>" +
                        "<h4 class='panel-title'>" +
                            "<a class='"+ collapsed +"' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse_" + value.animal_venta.id + "' aria-expanded='" + aria_expanded + "' aria-controls='collapse_" + value.animal_venta.id + "'>" +
                                "<span>" + index1 + "</span>" +
                                  titulo +
                            "</a>" +
                        "</h4>" +
                    "</div>" +
                    "<div id='collapse_" + value.animal_venta.id + "' class='panel-collapse collapse " + collapse_in + "' role='tabpanel' aria-labelledby='heading_" + value.animal_venta.id + "'>" +
                        "<div class='panel-body'>" +
                            "<div class='row'>" +
                              "<div class='col-md-4 text-center'>" +
                              "<img src='" + imagen + "' class='img-circle' alt='Animal Image' style='width:100px; height:100px; top:100px; left:100px;'>" +
                              "<div class='row'>" +
                                "<div class='col-md-12'>" +
                                    "<a type='button' class='btn btn-sm btn-danger text-center btn-eliminar-detalle' data-toggle='tooltip'" +
                                      "title='Click para eliminar la solicitud de compra' id='btn-eliminar-detalle_" + value.animal_venta.id + "' data-id='" + value.animal_venta.id + "'>" +
                                      "Eliminar" +
                                    "</a>" +
                                "</div>" +
                              "</div>" +
                              "</div>" +
                              "<div class='col-md-8'>" +
                                "<div class='row'>" +
                                  "<div class='col-md-6'>" +
                                    "<b>Edad: </b>" + value.animal_venta.edad + "<br>" +
                                  "</div>" +
                                  "<div class='col-md-6'>" +
                                    "<b>Peso: </b>" + value.animal_venta.peso + "<br>" +
                                  "</div>" +
                                "</div>" +
                                "<div class='row'>" +
                                "<div class='col-md-12'>" +
                                  "<b>Fecha de nacimiento: </b>" + value.animal_venta.fecha_nacimiento +"<br>" +
                                "</div>" +
                                "</div>" +
                                "<div class='row'>" +
                                  "<div class='col-md-6'>" +
                                    "<b>Precio: </b> ₡" + value.animal_venta.precio + "<br>" +
                                  "</div>" +
                                  "<div class='col-md-6'>" +
                                    "<b>Cantidad: </b>" + value.animal_venta.cantidad + "<br>" +
                                  "</div>" +
                                "</div>" +
                                "<div class='row'>" +
                                  "<div class='col-md-6'>" +
                                    "<b>Condiciones: </b>" + value.animal_venta.condiciones + "<br>" +
                                  "</div>" +
                                  "<div class='col-md-6'>" +
                                    "<b>Observaciones: </b>" + value.animal_venta.observaciones + "<br>" +
                                  "</div>" +
                                "</div>" +
                              "</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                "</div>");
            });
          }
        },
      });
  });

  $('#limpiar_lista_detalles').click(function(){
    $('#limpiar_lista_detalles').html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
    $('#limpiar_lista_detalles').addClass('disabled');
    $.ajax({
      type: 'post',
      url: '{{route('venta_animales.solicitar.limpiar_todo')}}',
      data: {
        '_token': $('input[name=_token]').val(),
      },
      success: function(data){
          if(data == true || data.length == 0){
            alert('asjhask');
            $('#limpiar_lista_detalles').html('&nbsp;<i class="fa fa-eraser"></i>&nbsp;');
            $('#limpiar_lista_detalles').removeClass('disabled');
            $('#accordion').empty();
            $('.añadir_animales_venta').removeClass('disabled');
            $('#limpiar_lista_detalles').addClass('disabled');
            $('#efectuar_adopcion').addClass('disabled');
            $('#limpiar_formulario_dueño').addClass('disabled');
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
  $('.añadir_animales_venta').click(function(e){
    $('.añadir_animales_venta').html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
    $('.añadir_animales_venta').addClass('disabled');
    $.ajax({
      type: 'post',
      url: '{{route('venta_animales.solicitar')}}',
      data: {
        '_token': $('input[name=_token]').val(),
        'animal_venta_id': $(this).data('id')
      },
      success: function(data){
        if((data.errors)){
          $('.añadir_animales_venta').html('Añadir animal');
          $('.añadir_animales_venta').removeClass('disabled');

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
          $('.añadir_animales_venta').html('Añadir animal');
          $('.añadir_animales_venta').removeClass('disabled');
          e.preventDefault()
          $('#accordion').empty();
          $.each(data, function(index, value) {
              var index1 = index + 1;
              $('#añadir_animales_venta_' + value.animal_venta.id).addClass('disabled');

              var titulo = value.animal_venta.tipo_animal.descripcion + " - " + value.animal_venta.raza + " - " + value.animal_venta.sexo;
              var collapsed = (index1 == 1)?"":"collapsed";
              var collapse_in = (index1 == 1)?"in":"";
              var aria_expanded = (index1 == 1)?"true":"false";
              if(Array.isArray(value.animal_venta.imagenes) && value.animal_venta.imagenes.length){
                var imagen = "{{ url('imgPerfiles/:ruta_imagen') }}";
                imagen = imagen.replace(':ruta_imagen', value.animal_venta.imagenes[0].imagen);
              }else{
                var imagen = "{{ url('img/brand/dog.png') }}";
              }

      				$('#accordion').append("<div class='panel panel-default' id='venta_" + value.animal_venta.id + "' name='venta_" + value.animal_venta.id + "'>" +
                  "<div class='panel-heading' role='tab' id='heading_" + value.animal_venta.id + "'>" +
                      "<h4 class='panel-title'>" +
                          "<a class='"+ collapsed +"' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse_" + value.animal_venta.id + "' aria-expanded='" + aria_expanded + "' aria-controls='collapse_" + value.animal_venta.id + "'>" +
                              "<span>" + index1 + "</span>" +
                                titulo +
                          "</a>" +
                      "</h4>" +
                  "</div>" +
                  "<div id='collapse_" + value.animal_venta.id + "' class='panel-collapse collapse " + collapse_in + "' role='tabpanel' aria-labelledby='heading_" + value.animal_venta.id + "'>" +
                      "<div class='panel-body'>" +
                          "<div class='row'>" +
                            "<div class='col-md-4 text-center'>" +
                            "<img src='" + imagen + "' class='img-circle' alt='Animal Image' style='width:100px; height:100px; top:100px; left:100px;'>" +
                            "<div class='row'>" +
                              "<div class='col-md-12'>" +
                                  "<a type='button' class='btn btn-sm btn-danger text-center btn-eliminar-detalle' data-toggle='tooltip'" +
                                    "title='Click para eliminar la solicitud de compra' id='btn-eliminar-detalle_" + value.animal_venta.id + "' data-id='" + value.animal_venta.id + "'>" +
                                    "Eliminar" +
                                  "</a>" +
                              "</div>" +
                            "</div>" +
                            "</div>" +
                            "<div class='col-md-8'>" +
                              "<div class='row'>" +
                                "<div class='col-md-6'>" +
                                  "<b>Edad: </b>" + value.animal_venta.edad + "<br>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                  "<b>Peso: </b>" + value.animal_venta.peso + "<br>" +
                                "</div>" +
                              "</div>" +
                              "<div class='row'>" +
                              "<div class='col-md-12'>" +
                                "<b>Fecha de nacimiento: </b>" + value.animal_venta.fecha_nacimiento +"<br>" +
                              "</div>" +
                              "</div>" +
                              "<div class='row'>" +
                                "<div class='col-md-6'>" +
                                  "<b>Precio: </b> ₡" + value.animal_venta.precio + "<br>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                  "<b>Cantidad: </b>" + value.animal_venta.cantidad + "<br>" +
                                "</div>" +
                              "</div>" +
                              "<div class='row'>" +
                                "<div class='col-md-6'>" +
                                  "<b>Condiciones: </b>" + value.animal_venta.condiciones + "<br>" +
                                "</div>" +
                                "<div class='col-md-6'>" +
                                  "<b>Observaciones: </b>" + value.animal_venta.observaciones + "<br>" +
                                "</div>" +
                              "</div>" +
                            "</div>" +
                          "</div>" +
                      "</div>" +
                  "</div>" +
              "</div>");
          });
            Toast.fire({
              type: 'success',
              title: '!Venta añadida!'
            });

            $('#limpiar_lista_detalles').removeClass('disabled');
            $('#efectuar_adopcion').removeClass('disabled');
            $('#limpiar_formulario_dueño').removeClass('disabled');
            $('#finalizar_venta').removeClass('disabled');
        }
      },
    });
  });

  //Finalizar
  $('#efectuar_adopcion').click(function(){
    $('#efectuar_adopcion').html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
    $('#efectuar_adopcion').addClass('disabled');
    $.ajax({
      type: 'post',
      url: '{{route('venta_animales.solicitar.finalizar')}}',
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
          $('#efectuar_adopcion').html('Efectuar solicitud');
          $('#efectuar_adopcion').removeClass('disabled');
          Toast.fire({
            type: 'warning',
            title: '¡Errores de validación!'
          })

          $.each(data.errors, function( index, value ) {
            var clase = ".error-" + index;
            $(clase).removeClass('hidden');
            $(clase).text(value);
          });

        }else{
          $('#efectuar_adopcion').html('Efectuar solicitud');
          $('#efectuar_adopcion').removeClass('disabled');

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
