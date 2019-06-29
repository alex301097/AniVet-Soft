@extends('layouts.master')
@section('css')
  <!-- datatable and dropzone css links -->
  <link rel="stylesheet" rel="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"></script>
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-gradient-default">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-light ls-1 mb-1">Mantenimiento</h6>
                  <h2 class="text-white mb-0">Tipos de servicios</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    <h6 class="heading-small text-muted mb-4">Lista de Tipos de servicios</h6>
                  </div>
                  <div class="col-md-3 text-right">
                    {{-- <div class="form-group">
                      <select class="form-control form-control-sm" id="filtro" name="filtro">
      									<option value="0">Tipos de servicios habilitados</option>
      									<option value="1">Tipos de servicios deshabilitados</option>
                      </select>
                    </div> --}}
                  </div>
                  <div class="col-md-2 text-left">
                    @can('mant_tipos_animales-crear')
                    <button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-añadir">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir</span>
                    </button>
                    @endcan
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark" id="tipos_servicios" name="tipos_servicios">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="color:black;">

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-añadir" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title-default">Añadir tipo de servicio</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="descripcion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Descripción</h5></label>
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
                  <h2 class="modal-title" id="modal-title-default">Editar tipo de servicio</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>

              <div class="modal-body">
                <form>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="descripcion_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Descripción</h5></label>
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

    <!-- Dropzone.js links -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>


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

        $(document).ready(function() {
          $('#tipos_servicios').DataTable({
            "processing":true,
            "serverSide":true,
              // "responsive": true,
            "ajax":"{{ url('api/tipos_servicios') }}",
            "columns":
            [
              {data: 'id'},
              {data: 'descripcion'},
              {data: 'estado'},
              {data: 'btn', orderable: false, searchable: false}
            ],
            "language":{
              "info": "<span style='color:white;'>Mostrando total registros</span>",
              "search": "<span style='color:white;'>Buscar</span>",
              "paginate": {
                  "next": "<span style='color:white;'>Siguiente</span>",
                "previous": "<span style='color:white;'>Anterior</span>",
              },
              "lengthMenu":
              '<span style="color:white;">Mostrar&nbsp;</span><select>' +
              '<option value="10">10</option>' +
              '<option value="30">30</option>' +
              '<option value="-1">Todos</option>' +
              '</select> <span style="color:white;">&nbsp;registros</span>' ,
              "loadingRecords": "<span style='color:black;'>Cargando..</span>",
              "processing": "<span style='color:black;'>Procesando..</span>",
              "emptyTable": "<span style='color:black;'>No hay datos</span>",
              "zeroRecords": "<span style='color:black;'>No hay coincidencias</span>",
              "infoEmpty": "",
              "infoFiltered": "",
            }
          });

        } );

/**
        //filtro
        $('#filtro').change(function(){
          var urlFiltro = "{{route('filtro.tipos_servicios', ['filtro'=>':estado'])}}";
          urlFiltro = urlFiltro.replace(':estado', this.value);
          $.ajax({
          type: 'post',
          url: urlFiltro,
          data: {
            '_token': $('input[name=_token]').val(),
            'filtro': this.value
          },
          success: function(data) {
            $('#lista-tipos_servicios').empty();
            $.each(data['data'], function(index, value){

              if(value.deleted_at != null){
                icono = "<i class='bg-danger'></i> Inactivo";
                acciones = "<div class='dropdown'>"+
                "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"+
                  "<i class='fas fa-ellipsis-v'></i>"+
                "</a>"+
                "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>"+
                    "<a class='dropdown-item' href='#' id='editar_tipo_servicio' name='editar_tipo_servicio'"+
                    "data-id='" + value.id + "' data-descripcion='" + value.descripcion + "'>"+
                      "<span><i class='ni ni-ruler-pencil'></i></span>"+
                      "&nbsp;&nbsp;Editar"+
                    "</a>"+
                    "<a class='dropdown-item' href='#' id='habilitar_tipo_servicio' name='habilitar_tipo_servicio'"+
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
                      "<a class='dropdown-item' href='#' id='editar_tipo_servicio' name='editar_tipo_servicio'"+
                      "data-toggle='modal' data-target='#modal-editar'"+
                      "data-id='" + value.id + "' data-descripcion='" + value.descripcion + "'>"+
                        "<span><i class='ni ni-ruler-pencil'></i></span>"+
                        "&nbsp;&nbsp;Editar"+
                      "</a>"+
                      "<a class='dropdown-item' href='#' id='deshabilitar_tipo_servicio' name='deshabilitar_tipo_servicio'"+
                      "data-id='" + value.id + "'>"+
                        "<span><i class='ni ni-fat-remove'></i></span>"+
                        "&nbsp;&nbsp;Deshabilitar"+
                      "</a>"+
                  "</div>"+
              "</div>";
              }

              $('#lista-tipos_servicios').append("<tr id='tipo_servicio_" + value.id + " name='tipo_servicio_" + value.id + ">" +
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
*/
        //Añadir
        $('#registrar').click(function(){

          $.ajax({
            type: 'post',
            url: '{{route('tipos_servicios.añadir')}}',
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
                  title: 'El tipo de servicio se ha registrado correctamente!',
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
        $(document).on('click', '#editar_tipo_servicio', function() {
          $('#id_edicion').val($(this).data('id'));
          $('#descripcion_edicion').val($(this).data('descripcion'));
        });

        $('#editar').click(function(){

          $.ajax({
            type: 'post',
            url: '{{route('tipos_servicios.editar')}}',
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
                  title: 'El tipo de servicio se ha editado correctamente!',
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
        $(document).on('click', '#habilitar_tipo_servicio', function() {
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
    							url: "{{route('tipos_servicios.eliminar')}}",
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
        $(document).on('click', '#deshabilitar_tipo_servicio', function() {
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
    							url: "{{route('tipos_servicios.eliminar')}}",
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
