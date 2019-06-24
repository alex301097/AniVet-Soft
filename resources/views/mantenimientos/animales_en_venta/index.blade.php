@extends('layouts.master')
@section('css')
  <!-- Dropzone.js css links -->
  <link rel="stylesheet" rel="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"></script>
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
                        <table class="table align-items-center table-dark" id="animales" name="animales">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Animal</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Peso</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="lista-animales" name="lista-animales">
                            @foreach ($animales as $animal)
                              <tr id="animal_{{$animal->id}}" name="animal_{{$animal->id}}">
                                  <th scope="row">
                                      #{{$animal->id}} {{$animal->nombre}} / {{$animal->estado}}
                                  </th>
                                  <td>
                                      {{$animal->edad}}
                                  </td>
                                  <td>
                                      {{$animal->peso}}
                                  </td>
                                  <td>
                                      {{$animal->tipo_animal->descripcion}}
                                  </td>
                                  <td>
                                      {{$animal->raza}}
                                  </td>
                                  <td>
                                      {{$animal->sexo}}
                                  </td>
                                  <td>
                                      {{$animal->cantidad}}
                                  </td>
                                  <td>
                                      <span class="badge badge-dot mr-4">
                                        @if ($animal->deleted_at != null)
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
                                              <a class="dropdown-item" href="#" id="añadir_imagenes" name="añadir_imagenes"
                                              data-toggle="modal" data-target="#modal-añadir" data-id="{{$animal->id}}">
                                                <span><i class="ni ni-image"></i></span>
                                                &nbsp;&nbsp;Imagenes
                                              </a>
                                              <a class="dropdown-item" href="{{route('animales_venta.get_detalle', $animal->id)}}" id="detalle_animal" name="detalle_animal">
                                                <span><i class="ni ni-glasses-2"></i></span>
                                                &nbsp;&nbsp;Detalle
                                              </a>
                                              <a class="dropdown-item" href="{{route('animales_venta.get_editar', $animal->id)}}" id="editar_animal" name="editar_animal">
                                                <span><i class="ni ni-ruler-pencil"></i></span>
                                                &nbsp;&nbsp;Editar
                                              </a>
                                              <a class="dropdown-item" href="#" id="deshabilitar_animal" name="deshabilitar_animal"
                                              data-id="{{$animal->id}}">
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
        									{{$animales->links()}}
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

      previewThumbailFromUrl({
          selector: '1559902529_mascotas-en-el-trabajo',
          fileName: '1559902529_mascotas-en-el-trabajo',
          imageURL: 'imgPerfiles/1559902529_mascotas-en-el-trabajo.jpg'
      });

      function previewThumbailFromUrl(opts) {
          var imgDropzone = Dropzone.forElement("#" + opts.selector);
          var mockFile = {
              name: opts.fileName,
              size: 12345,
              accepted: true,
              kind: 'image'
          };
          imgDropzone.emit("addedfile", mockFile);
          imgDropzone.files.push(mockFile);
          imgDropzone.createThumbnailFromUrl(mockFile, opts.imageURL, function() {
              imgDropzone.emit("complete", mockFile);
          });
      }

      //Imagen
      $(document).on('click', '#añadir_imagenes', function() {
        $('#id_animal').val($(this).data('id'));
      });

      //filtro
      $('#filtro').change(function(){
        var urlFiltro = "{{route('filtro.animales_venta', ['filtro'=>':estado'])}}";
        urlFiltro = urlFiltro.replace(':estado', this.value);
        $.ajax({
        type: 'post',
        url: urlFiltro,
        data: {
          '_token': $('input[name=_token]').val(),
          'filtro': this.value
        },
        success: function(data) {
          $('#lista-animales').empty();
          $.each(data['data'], function(index, value){
            var ruta_detalle = "{{route('animales_venta.get_detalle', ['id'=>':id'])}}";
            ruta_detalle = ruta_detalle.replace(':id', value.id);
            var ruta_editar = "{{route('animales_venta.get_editar', ['id'=>':id'])}}";
            ruta_editar = ruta_editar.replace(':id', value.id);

            if(value.deleted_at != null){
    					icono = "<i class='bg-danger'></i> Inactivo";
              acciones = "<div class='dropdown'>" +
                  "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                    "<i class='fas fa-ellipsis-v'></i>" +
                  "</a>" +
                  "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>" +
                      "<a class='dropdown-item' href='#' id='añadir_imagenes' name='añadir_imagenes'" +
                      "data-toggle='modal' data-target='#modal-añadir' data-id='" + value.id + "'>" +
                        "<span><i class='ni ni-image'></i></span>" +
                        "&nbsp;&nbsp;Imagenes" +
                      "</a>" +
                      "<a class='dropdown-item' href='" + ruta_detalle + "' id='detalle_animal' name='detalle_animal'>" +
                        "<span><i class='ni ni-glasses-2'></i></span>" +
                        "&nbsp;&nbsp;Detalle" +
                      "</a>" +
                      "<a class='dropdown-item' href='#' id='editar_animal' name='editar_animal'>" +
                        "<span><i class='ni ni-ruler-pencil'></i></span>" +
                        "&nbsp;&nbsp;Editar" +
                      "</a>" +
                      "<a class='dropdown-item' href='#' id='habilitar_animal' name='habilitar_animal'" +
                      "data-id='" + value.id + "'>" +
                        "<span><i class='ni ni-fat-remove'></i></span>" +
                        "&nbsp;&nbsp;Habilitar" +
                      "</a>" +
                  "</div>" +
              "</div>";
    				}else{
              icono = "<i class='bg-success'></i> Activo";
              acciones = "<div class='dropdown'>" +
                  "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                    "<i class='fas fa-ellipsis-v'></i>" +
                  "</a>" +
                  "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>" +
                      "<a class='dropdown-item' href='#' id='añadir_imagenes' name='añadir_imagenes'" +
                      "data-toggle='modal' data-target='#modal-añadir' data-id='" + value.id + "'>" +
                        "<span><i class='ni ni-image'></i></span>" +
                        "&nbsp;&nbsp;Imagenes" +
                      "</a>" +
                      "<a class='dropdown-item' href='" + ruta_detalle + "' id='detalle_animal' name='detalle_animal'>" +
                        "<span><i class='ni ni-glasses-2'></i></span>" +
                        "&nbsp;&nbsp;Detalle" +
                      "</a>" +
                      "<a class='dropdown-item' href='" + ruta_editar + "' id='editar_animal' name='editar_animal'>" +
                        "<span><i class='ni ni-ruler-pencil'></i></span>" +
                        "&nbsp;&nbsp;Editar" +
                      "</a>" +
                      "<a class='dropdown-item' href='#' id='deshabilitar_animal' name='deshabilitar_animal'" +
                      "data-id='" + value.id + "'>" +
                        "<span><i class='ni ni-fat-remove'></i></span>" +
                        "&nbsp;&nbsp;Deshabilitar" +
                      "</a>" +
                  "</div>" +
              "</div>";
    				}

            $('#lista-animales').append("<tr id='animal_" + value.id + "' name='animal_" + value.id + "'>" +
                "<th scope='row'>" +
                    "#" + value.id + " " + value.nombre +
                "</th>" +
                "<td>" +
                    value.edad +
                "</td>" +
                "<td>" +
                    value.peso +
                "</td>" +
                "<td>" +
                    value.tipo_animal.descripcion +
                "</td>" +
                "<td>" +
                    value.raza +
                "</td>" +
                "<td>" +
                    value.sexo +
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
