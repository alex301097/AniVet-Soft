@extends('layouts.master')
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-mute ls-1 mb-1">Mantenimiento</h6>
                  <h2 class="text-black mb-0">Tipos de animales</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                {{-- <div class="row">
                  <div class="col-md-12">
                  </div>
                </div> --}}
                <div class="row">
                  <div class="col-md-7">
                    <h6 class="heading-small text-muted mb-4">Lista de Tipos de animales</h6>
                  </div>
                  <div class="col-md-3 text-right">
                    <div class="form-group">
                      <select class="form-control form-control-sm" id="filtro" name="filtro">
      									<option value="0">Tipos de animales habilitados</option>
      									<option value="1">Tipos de animales deshabilitados</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 text-left">
                    <button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-añadir">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir</span>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark" id="tipos_animales" name="tipos_animales">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="lista-tipos_animales" name="lista-tipos_animales">
                            @foreach ($tipos_animales as $tipo_animal)
                              <tr id="tipo_animal_{{$tipo_animal->id}}" name="tipo_animal_{{$tipo_animal->id}}">
                                  <th scope="row">
                                      # {{$tipo_animal->id}}
                                  </th>
                                  <td>
                                      {{$tipo_animal->descripcion}}
                                  </td>
                                  <td>
                                      <span class="badge badge-dot mr-4">
                                        @if ($tipo_animal->deleted_at != null)
                                          <i class="bg-danger"></i> Inactivo
                                        @else
                                          <i class="bg-success"></i> Activo
                                        @endif
                                      </span>
                                  </td>
                                  <td class="text-right">
                                      <div class="dropdown">
                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <a class="dropdown-item" href="#" id="editar_tipo_animal" name="editar_tipo_animal"
                                              data-toggle="modal" data-target="#modal-editar"
                                              data-id="{{$tipo_animal->id}}" data-descripcion="{{$tipo_animal->descripcion}}">
                                                <span><i class="ni ni-ruler-pencil"></i></span>
                                                &nbsp;&nbsp;Editar
                                              </a>
                                              <a class="dropdown-item" href="#" id="deshabilitar_tipo_animal" name="deshabilitar_tipo_animal"
                                              data-id="{{$tipo_animal->id}}">
                                                <span><i class="ni ni-fat-remove"></i></span>
                                                &nbsp;&nbsp;Deshabilitar
                                              </a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class='row'>
        								<div class="col-md-12">
        									{{$tipos_animales->links()}}
        								</div>
        								<hr>
        							</div>

                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-añadir" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title-default">Añadir tipo de animal</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="descripcion"><h5>Descripción</h5></label>
                          <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción"></textarea>
                          <p class="error-descripcion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="registrar" name="registrar">Añadir</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">

              <div class="modal-header">
                  <h2 class="modal-title" id="modal-title-default">Editar tipo de animal</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>

              <div class="modal-body">
                <form>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="descripcion_edicion"><h5>Descripción</h5></label>
                        <textarea class="form-control" id="descripcion_edicion" name="descripcion_edicion" rows="3" placeholder="Descripción"></textarea>
                        <p class="error-descripcion_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                      </div>
                    </div>
                  </div>
                </form>
                <input type="hidden" name="id_edicion" id="id_edicion" value="">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="editar" name="editar">Editar</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </div>
    </div>

@endsection
@section('scripts')
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

    //filtro
    $('#filtro').change(function(){
      var urlFiltro = "{{route('filtro.tipos_animales', ['filtro'=>':estado'])}}";
      urlFiltro = urlFiltro.replace(':estado', this.value);
      $.ajax({
      type: 'post',
      url: urlFiltro,
      data: {
        '_token': $('input[name=_token]').val(),
        'filtro': this.value
      },
      success: function(data) {
        $('#lista-tipos_animales').empty();
        $.each(data['data'], function(index, value){

          if(value.deleted_at != null){
  					icono = "<i class='bg-danger'></i> Inactivo";
            acciones = "<div class='dropdown'>"+
                "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
                  "<i class='fas fa-ellipsis-v'></i>"+
                "</a>"+
                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>"+
                    "<a class='dropdown-item' href='#' id='editar_tipo_animal' name='editar_tipo_animal'"+
                    "data-id='" + value.id + "' data-descripcion='" + value.descripcion + "'>"+
                      "<span><i class='ni ni-ruler-pencil'></i></span>"+
                      "&nbsp;&nbsp;Editar"+
                    "</a>"+
                    "<a class='dropdown-item' href='#' id='habilitar_tipo_animal' name='habilitar_tipo_animal'"+
                    "data-id='" + value.id + "'>"+
                      "<span><i class='ni ni-fat-remove'></i></span>"+
                      "&nbsp;&nbsp;Habilitar"+
                    "</a>"+
                "</div>"+
            "</div>";
  				}else{
            icono = "<i class='bg-success'></i> Activo";
  					acciones = "<div class='dropdown'>"+
                "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
                  "<i class='fas fa-ellipsis-v'></i>"+
                "</a>"+
                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>"+
                    "<a class='dropdown-item' href='#' id='editar_tipo_animal' name='editar_tipo_animal'"+
                    "data-toggle='modal' data-target='#modal-editar'"+
                    "data-id='" + value.id + "' data-descripcion='" + value.descripcion + "'>"+
                      "<span><i class='ni ni-ruler-pencil'></i></span>"+
                      "&nbsp;&nbsp;Editar"+
                    "</a>"+
                    "<a class='dropdown-item' href='#' id='deshabilitar_tipo_animal' name='deshabilitar_tipo_animal'"+
                    "data-id='" + value.id + "'>"+
                      "<span><i class='ni ni-fat-remove'></i></span>"+
                      "&nbsp;&nbsp;Deshabilitar"+
                    "</a>"+
                "</div>"+
            "</div>";
  				}

          $('#lista-tipos_animales').append("<tr id='tipo_animal_" + value.id + " name='tipo_animal_" + value.id + ">" +
              "<th scope='row'>" +
                "  # " + value.id +
              "</th>" +
              "<td>" +
                  value.descripcion +
              "</td>" +
              "<td>" +
                  "<span class='badge badge-dot mr-4'>" +
                    icono +
                  "</span>" +
              "</td>" +
              "<td class='text-right'>" +
                  acciones +
              "</td>" +
          "</tr>");
          });
        }
      });
    });

    //Añadir
    $('#registrar').click(function(){

      $.ajax({
        type: 'post',
        url: '{{route('tipos_animales.añadir')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'descripcion': $('#descripcion').val()
        },
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.descripcion){
              $('.error-descripcion').removeClass('hidden');
              $('.error-descripcion').text(data.errors.descripcion);
            }
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'El tipo de animal se ha registrado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              location.reload();
            }, 2000);
        }
        },
      });

    });

    //Editar
    $(document).on('click', '#editar_tipo_animal', function() {
      $('#id_edicion').val($(this).data('id'));
      $('#descripcion_edicion').val($(this).data('descripcion'));
    });

    $('#editar').click(function(){

      $.ajax({
        type: 'post',
        url: '{{route('tipos_animales.editar')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_edicion': $('#id_edicion').val(),
          'descripcion_edicion': $('#descripcion_edicion').val(),
        },
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.descripcion_edicion){
              $('.error-descripcion_edicion').removeClass('hidden');
              $('.error-descripcion_edicion').text(data.errors.descripcion_edicion);
            }

          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'El tipo de animal se ha editado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              location.reload();
            }, 2000);
        }
        },
      });

    });

    //Habilitar
    $(document).on('click', '#habilitar_tipo_animal', function() {
      var id = $(this).data('id');

      swal_confirm.fire({
        title: 'Estas seguro de habilitar esto?',
        text: "Podras deshabilitar esto después!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, habilitalo!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
							type: "POST",
							url: "{{route('tipos_animales.eliminar')}}",
							data: {
								'_token': $('input[name=_token]').val(),
								'id':id,
							},
							success: function (data) {
                swal_confirm.fire(
                  'Habilitado!',
                  'Los datos han sido habilitados.',
                  'success'
                ).then(function() {
                    location.reload();
                });
							}
					});
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swal_confirm.fire(
            'Cancelado',
            'El dato esta seguro :)',
            'error'
          )
        }
      });
    });

    //Deshabilitar
    $(document).on('click', '#deshabilitar_tipo_animal', function() {
      var id = $(this).data('id');

      swal_confirm.fire({
        title: 'Estas seguro de deshabilitar esto?',
        text: "Podras habilitar esto después!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, deshabilitalo!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
							type: "POST",
							url: "{{route('tipos_animales.eliminar')}}",
							data: {
								'_token': $('input[name=_token]').val(),
								'id':id,
							},
							success: function (data) {
                swal_confirm.fire(
                  'Deshabilitado!',
                  'El dato ha sido deshabilitado.',
                  'success'
                ).then(function() {
                    location.reload();
                });
							}
					});
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swal_confirm.fire(
            'Cancelado',
            'El dato esta seguro :)',
            'error'
          )
        }
      });
    });

  </script>
@endsection
