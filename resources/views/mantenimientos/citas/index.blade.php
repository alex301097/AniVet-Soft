@extends('layouts.master')
@section('css')
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Citas
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li class="active">Citas</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de citas</h3>

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
            <div class="col-md-6">
              @can('mant_citas-crear')
              <a class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:75px;" type="button" href="{{route('citas.get_añadir')}}">
                <span><i class="fas fa-plus"></i></span>&nbsp;&nbsp;Añadir
              </a>
              @endcan
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
                  <table class="table table-bordered table-striped text-center" id="citas" name="citas">
                  <thead>
                      <tr>
                          <th scope="col">Encargado</th>
                          <th scope="col">Paciente</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Hora Inicio</th>
                          <th scope="col">Hora Final</th>
                          <th scope="col">Servicio</th>
                          <th scope="col">Motivo</th>
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
        $('#side_bar-mantenimientos').addClass('active');
        $('#side_bar_option-citas').addClass('active');
      });

      $(document).ready(function() {
        $('#citas').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":"{{ url('api/citas') }}",
          "columns":
          [
            {data: 'nombreDueño', orderable: false, searchable: false},
            {data: 'nombrePaciente', orderable: false, searchable: false},
            {data: 'fecha'},
            {data: 'horaInicio'},
            {data: 'horaFinal'},
            {data: 'descripcionServicio', orderable: false, searchable: false},
            {data: 'motivo'},
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

      //Habilitar
      $(document).on('click', '#habilitar_cita', function() {
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
  							url: "{{route('citas.eliminar')}}",
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
      $(document).on('click', '#deshabilitar_cita', function() {
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
  							url: "{{route('citas.eliminar')}}",
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
