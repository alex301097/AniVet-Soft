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
                  <h2 class="text-white mb-0">Pacientes</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-7">
                    <h6 class="heading-small text-muted mb-4">Lista de pacientes</h6>
                  </div>
                  <div class="col-md-3 text-right">
                    <div class="form-group">
                      <select class="form-control form-control-sm" id="filtro" name="filtro">
      									<option value="0">Pacientes habilitados</option>
      									<option value="1">Pacientes deshabilitados</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 text-left">
                    <a class="btn btn-primary btn-sm" type="button" href="{{route('pacientes.get_añadir')}}">
                    	<i class="fas fa-plus"></i>&nbsp;&nbsp;Añadir
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark" id="pacientes" name="pacientes" style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Paciente</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Estado</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody style="color:black;">

                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </form>
          </div>
        </div>
    </div>


    <div class="modal fade" id="modal-añadir" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title-default">Añadir Imagenes para el paciente</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" id="div_imagen" name="div_imagen">
                            <form action="{{route('file-upload.pacientes')}}" method="post"
                            class="dropzone" enctype="multipart/form-data"
                            id="my-awesome-dropzone">
                              {{csrf_field()}}
                              <input type="hidden" name="id_paciente" id="id_paciente" value="">
                            </form>
                          <p class="error-imagen text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-primary" id="registrar" name="registrar">Añadir</button> --}}
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

      Dropzone.options.myAwesomeDropzone = {
        paramName: "Imagen",
        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
        addRemoveLinks: true,
        dictCancelUpload: "Cancelar",
        dictCancelUploadConfirmation: "Cancelado.",
        dictRemoveFile: "Eliminar",
        maxFilesize: 8
      };

      $(document).ready(function() {
        $('#pacientes').DataTable({
          "processing":true,
          "serverSide":true,
            // "responsive": true,
          "ajax":"{{ url('api/pacientes') }}",
          "columns":
          [
            {data: 'nombre'},
            {data: 'edad'},
            {data: 'peso'},
            {data: 'descripcionAnimal'},
            {data: 'sexo'},
            {data: 'raza'},
            {data: 'estado'},
            {data: 'btn', orderable: false, searchable: false}
          ],
          "language":{
            "info": "<span style='color:white;'>Mostrando TOTAL registros</span>",
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

      //Imagen
      $(document).on('click', '#añadir_imagenes', function() {
        $('#id_paciente').val($(this).data('id'));
      });

      // //filtro
      // $('#filtro').change(function(){
      //   var urlFiltro = "{{route('filtro.pacientes', ['filtro'=>':estado'])}}";
      //   urlFiltro = urlFiltro.replace(':estado', this.value);
      //   $.ajax({
      //   type: 'post',
      //   url: urlFiltro,
      //   data: {
      //     '_token': $('input[name=_token]').val(),
      //     'filtro': this.value
      //   },
      //   success: function(data) {
      //     $('#lista-pacientes').empty();
      //     $.each(data['data'], function(index, value){
      //       var ruta_detalle = "{{route('pacientes.get_detalle', ['id'=>':id'])}}";
      //       ruta_detalle = ruta_detalle.replace(':id', value.id);
      //       var ruta_editar = "{{route('pacientes.get_editar', ['id'=>':id'])}}";
      //       ruta_editar = ruta_editar.replace(':id', value.id);
      //
      //       if(value.deleted_at != null){
    	// 				icono = "<i class='bg-danger'></i> Inactivo";
      //         acciones = "<div class='dropdown'>" +
      //             "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
      //               "<i class='fas fa-ellipsis-v'></i>" +
      //             "</a>" +
      //             "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>" +
      //                 "<a class='dropdown-item' href='#' id='añadir_imagenes' name='añadir_imagenes'" +
      //                 "data-toggle='modal' data-target='#modal-añadir' data-id='" + value.id + "'>" +
      //                   "<span><i class='ni ni-image'></i></span>" +
      //                   "&nbsp;&nbsp;Imagenes" +
      //                 "</a>" +
      //                 "<a class='dropdown-item' href='" + ruta_detalle + "' id='detalle_paciente' name='detalle_paciente'>" +
      //                   "<span><i class='ni ni-glasses-2'></i></span>" +
      //                   "&nbsp;&nbsp;Detalle" +
      //                 "</a>" +
      //                 "<a class='dropdown-item' href='#' id='editar_paciente' name='editar_paciente'>" +
      //                   "<span><i class='ni ni-ruler-pencil'></i></span>" +
      //                   "&nbsp;&nbsp;Editar" +
      //                 "</a>" +
      //                 "<a class='dropdown-item' href='#' id='habilitar_paciente' name='habilitar_paciente'" +
      //                 "data-id='" + value.id + "'>" +
      //                   "<span><i class='ni ni-fat-remove'></i></span>" +
      //                   "&nbsp;&nbsp;Habilitar" +
      //                 "</a>" +
      //             "</div>" +
      //         "</div>";
    	// 			}else{
      //         icono = "<i class='bg-success'></i> Activo";
      //         acciones = "<div class='dropdown'>" +
      //             "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
      //               "<i class='fas fa-ellipsis-v'></i>" +
      //             "</a>" +
      //             "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>" +
      //                 "<a class='dropdown-item' href='#' id='añadir_imagenes' name='añadir_imagenes'" +
      //                 "data-toggle='modal' data-target='#modal-añadir' data-id='" + value.id + "'>" +
      //                   "<span><i class='ni ni-image'></i></span>" +
      //                   "&nbsp;&nbsp;Imagenes" +
      //                 "</a>" +
      //                 "<a class='dropdown-item' href='" + ruta_detalle + "' id='detalle_paciente' name='detalle_paciente'>" +
      //                   "<span><i class='ni ni-glasses-2'></i></span>" +
      //                   "&nbsp;&nbsp;Detalle" +
      //                 "</a>" +
      //                 "<a class='dropdown-item' href='" + ruta_editar + "' id='editar_paciente' name='editar_paciente'>" +
      //                   "<span><i class='ni ni-ruler-pencil'></i></span>" +
      //                   "&nbsp;&nbsp;Editar" +
      //                 "</a>" +
      //                 "<a class='dropdown-item' href='#' id='deshabilitar_paciente' name='deshabilitar_paciente'" +
      //                 "data-id='" + value.id + "'>" +
      //                   "<span><i class='ni ni-fat-remove'></i></span>" +
      //                   "&nbsp;&nbsp;Deshabilitar" +
      //                 "</a>" +
      //             "</div>" +
      //         "</div>";
    	// 			}
      //
      //       $('#lista-pacientes').append("<tr style='color:gray;' id='paciente_" + value.id + "' name='paciente_" + value.id + "'>" +
      //           "<th scope='row'>" +
      //               "#" + value.id + " " + value.nombre +
      //           "</th>" +
      //           "<td>" +
      //               value.edad +
      //           "</td>" +
      //           "<td>" +
      //               value.peso +
      //           "</td>" +
      //           "<td>" +
      //               value.tipo_animal.descripcion +
      //           "</td>" +
      //           "<td>" +
      //               value.fecha_nacimiento +
      //           "</td>" +
      //           "<td>" +
      //               value.sexo +
      //           "</td>" +
      //           "<td>" +
      //               value.raza +
      //           "</td>" +
      //           "<td>" +
      //               "<span class='badge badge-dot mr-4'>" +
      //                 icono +
      //               "</span>" +
      //           "</td>" +
      //           "<td class='text-right'>" +
      //             acciones +
      //           "</td>" +
      //           "</tr>");
      //       });
      //     }
      //   });
      // });

      //Habilitar
      $(document).on('click', '#habilitar_paciente', function() {
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
  							url: "{{route('pacientes.eliminar')}}",
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
      $(document).on('click', '#deshabilitar_paciente', function() {
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
  							url: "{{route('pacientes.eliminar')}}",
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
