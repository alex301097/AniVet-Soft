@extends('layouts.master')
@section('css')
  <!-- Dropzone.js css links -->
  <link rel="stylesheet" rel="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"></script>
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Animales en venta
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li class="active">Animales en venta</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de animales en venta</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row" style="padding-bottom:25px;">
          <div class="col-md-6">
          </div>
          <div class="col-md-3">
            {{-- <div class="form-group">
              <select class="form-control form-control-sm" id="filtro" name="filtro">
                <option value="0">Animales habilitados</option>
                <option value="1">Animales deshabilitados</option>
              </select>
            </div> --}}
          </div>
          <div class="col-md-3">
            @can('mant_animales_en_venta-crear')
            <a class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:75px;" type="button" href="{{route('animales_venta.get_añadir')}}">
              <span><i class="fas fa-plus"></i></span>&nbsp;&nbsp;Añadir
            </a>
            @endcan
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
                <table class="table table-bordered table-striped text-center" id="animales_en_venta" name="animales_en_venta">
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
              </table>
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
  <div class="modal fade" id="modal-añadir" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Añadir imagenes al animal en venta</h4>
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
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          {{-- <button type="button" class="btn btn-primary" id="registrar" name="registrar">Añadir</button> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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

      $(document).ready(function(){
        $('#side_bar-mantenimientos').addClass('active');
        $('#side_bar_option-animales_venta').addClass('active');
      });

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
            {data: 'descripcionAnimal', orderable: false, searchable: false},
            {data: 'raza'},
            {data: 'sexo'},
            {data: 'edad'},
            {data: 'cantidad'},
            {data: 'precio'},
            {data: 'btn', orderable: false, searchable: false}
          ],
          "language":{
            "info": "Mostrando total registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
              "previous": "Anterior",
            },
            "lengthMenu":
            'Mostrar <select>' +
            '<option value="10">10</option>' +
            '<option value="30">30</option>' +
            '<option value="-1">Todos</option>' +
            '</select> registros' ,
            "loadingRecords": "Cargando...",
            "processing": "Procesando..",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
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
          title: '¿Estas seguro de habilitar esto?',
          text: "¡Podras deshabilitar esto después!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: '¡Si, habilitalo!',
          cancelButtonText: '¡No, cancelar!',
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
                    '¡Habilitado!',
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
              'El dato esta seguro.',
              'error'
            )
          }
        });
      });

      //Deshabilitar
      $(document).on('click', '#deshabilitar_animal', function() {
        var id = $(this).data('id');

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
  							url: "{{route('animales_venta.eliminar')}}",
  							data: {
  								'_token': $('input[name=_token]').val(),
  								'id':id,
  							},
  							success: function (data) {
                  swal_confirm.fire(
                    '¡Deshabilitado!',
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
              'El dato esta seguro.',
              'error'
            )
          }
        });
      });

  </script>
@endsection
