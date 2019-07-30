@extends('layouts.master')
@section('css')
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Roles
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li class="active">Roles</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de roles</h3>

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
                <option value="0">Roles habilitados</option>
                <option value="1">Roles deshabilitados</option>
              </select>
            </div> --}}
          </div>
          <div class="col-md-3">
            @can('mant_roles-crear')
            <button class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:75px;" type="button" data-toggle="modal" data-target="#modal-añadir">
              <span><i class="fas fa-plus"></i></span>&nbsp;&nbsp;Añadir
            </button>
            @endcan
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="roles" name="roles">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                </tbody>
              </table>
            </div>
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
          <h4 class="modal-title">Añadir rol</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="descripcion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Descripción</h5></label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción"></textarea>
                <p class="error-descripcion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
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

      $(document).ready(function(){
        $('#side_bar-seguridad').addClass('active');
        $('#side_bar_option-roles').addClass('active');
      });

      $(document).ready(function() {
        $('#roles').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":"{{ url('api/roles') }}",
          "columns":
          [
            {data: 'id'},
            {data: 'descripcion'},
            {data: 'estado', orderable: false, searchable: false},
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

    //Añadir
    $('#registrar').click(function(){
      $.ajax({
        type: 'post',
        url: '{{route('roles.añadir')}}',
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
              title: 'El rol se ha registrado correctamente!',
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
    $(document).on('click', '#habilitar_rol', function() {
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
							url: "{{route('roles.eliminar')}}",
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
    $(document).on('click', '#deshabilitar_rol', function() {
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
							url: "{{route('roles.eliminar')}}",
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
