@extends('layouts.master')
@section('css')
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
                  <h2 class="text-white mb-0">Citas</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-10">
                    <h6 class="heading-small text-muted mb-4">Lista de citas</h6>
                  </div>
                  <div class="col-md-2">
                    @can('mant_citas-crear')
                    <a class="btn btn-icon btn-primary btn-sm" type="button" href="{{route('citas.get_añadir')}}">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir</span>
                    </a>
                    @endcan
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark" id="citas" name="citas">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Encargado</th>
                                <th scope="col">Paciente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Final</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Motivo</th>
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
