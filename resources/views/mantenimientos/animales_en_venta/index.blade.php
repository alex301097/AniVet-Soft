@extends('layouts.master')
@section('css')
  <!-- Dropzone.js css links -->
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
                  <h2 class="text-white mb-0">Animales</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-7">
                    <h6 class="heading-small text-muted mb-4">Lista de animales en venta/adopción</h6>
                  </div>
                  <div class="col-md-3 text-right">
                    <div class="form-group">
                      <select class="form-control form-control-sm" id="filtro" name="filtro">
      									<option value="0">Animales habilitados</option>
      									<option value="1">Animales deshabilitados</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 text-left">
                    <a class="btn btn-icon btn-primary btn-sm" type="button" href="{{route('animales_venta.get_añadir')}}">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir</span>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark" id="animales_en_venta" name="animales_en_venta">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Animal</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Cantidad</th>
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
              </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-añadir" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title-default">Añadir Imagenes para el animal</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" id="div_imagen" name="div_imagen">
                            <form action="{{route('file-upload.animales_venta')}}" method="post"
                            class="dropzone" enctype="multipart/form-data"
                            id="my-awesome-dropzone">
                              {{csrf_field()}}
                              <input type="hidden" name="id_animal" id="id_animal" value="">
                              {{-- <div class="fallback">
                                <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
                              </div> --}}
                            </form>
                          <p class="error-imagen text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          {{-- <div class="demo-gallery">
                            <ul id="lightgallery">
                              @foreach ($animal->imagenes as $imagen)
                                <li  data-src="{{ url('imgPerfiles/'.$imagen->imagen) }}"
                                data-sub-html="<h4>Nombre: {{$animal->nombre}}</h4>
                                <p>
                                  Especie: {{$animal->tipo_animal->descripcion}} - Raza: {{$animal->raza}} - Edad: {{$animal->edad}} años
                                  <br>
                                  Condiciones: {{$animal->condiciones}}
                                  <br>
                                  Observaciones: {{$animal->observaciones}}
                                </p>">
                                  <a href="">
                                    <img class="img-responsive" src="{{ url('imgPerfiles/'.$imagen->imagen) }}" alt="{{$animal->nombre}}">
                                    <div class="demo-gallery-poster">
                                      <img src="https://sachinchoolur.github.io/lightgallery.js/static/img/zoom.png">
                                    </div>
                                  </a>
                                </li>
                              @endforeach
                            </ul>
                          </div> --}}
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

      // previewThumbailFromUrl({
      //     selector: '1559902529_mascotas-en-el-trabajo',
      //     fileName: '1559902529_mascotas-en-el-trabajo',
      //     imageURL: 'imgPerfiles/1559902529_mascotas-en-el-trabajo.jpg'
      // });
      //
      // function previewThumbailFromUrl(opts) {
      //     var imgDropzone = Dropzone.forElement("#" + opts.selector);
      //     var mockFile = {
      //         name: opts.fileName,
      //         size: 12345,
      //         accepted: true,
      //         kind: 'image'
      //     };
      //     imgDropzone.emit("addedfile", mockFile);
      //     imgDropzone.files.push(mockFile);
      //     imgDropzone.createThumbnailFromUrl(mockFile, opts.imageURL, function() {
      //         imgDropzone.emit("complete", mockFile);
      //     });
      // }
      $(document).ready(function() {
        $('#animales_en_venta').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":"{{ url('api/animales_en_venta') }}",
          "columns":
          [
            {data: 'nombre'},
            {data: 'edad'},
            {data: 'descripcionAnimal', orderable: false, searchable: false},
            {data: 'raza'},
            {data: 'sexo'},
            {data: 'cantidad'},
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

      //Imagen
      $(document).on('click', '#añadir_imagenes', function() {
        $('#id_animal').val($(this).data('id'));
      });

      //Habilitar
      $(document).on('click', '#habilitar_animal', function() {
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
  							url: "{{route('animales_venta.eliminar')}}",
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
      $(document).on('click', '#deshabilitar_animal', function() {
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
  							url: "{{route('animales_venta.eliminar')}}",
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
