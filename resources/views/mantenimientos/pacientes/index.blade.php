@extends('layouts.master')
@section('css')
  <!-- datatable and dropzone css links -->
  <link rel="stylesheet" rel="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"></script>
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Pacientes
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li class="active">Pacientes</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de pacientes</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
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
                <option value="0">Pacientes habilitados</option>
                <option value="1">Pacientes deshabilitados</option>
              </select>
            </div> --}}
          </div>
          <div class="col-md-3">
            @can('mant_pacientes-crear')
            <a class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:75px;" type="button" href="{{route('pacientes.get_añadir')}}">
              <span><i class="fas fa-plus"></i></span>&nbsp;&nbsp;Añadir
            </a>
            @endcan
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
                <table class="table table-bordered table-striped"  id="pacientes" name="pacientes">
                <thead>
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
          <h4 class="modal-title">Añadir imagenes al paciente</h4>
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
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="registrar" name="registrar">Añadir</button>
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
            {data: 'descripcionAnimal', orderable: false, searchable: false},
            {data: 'sexo'},
            {data: 'raza'},
            {data: 'estado'},
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
        $('#id_paciente').val($(this).data('id'));
      });

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
