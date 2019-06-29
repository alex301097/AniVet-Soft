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
                  <h2 class="text-white mb-0">Roles</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <h6 class="heading-small text-muted mb-4">Lista de Roles</h6>
                  </div>
                  <div class="col-md-5 text-right" style="float:right">
                    {{-- <div class="form-group">
                      <select class="form-control form-control-sm" id="filtro" name="filtro">
      									<option value="0">Roles habilitados</option>
      									<option value="1">Roles deshabilitados</option>
                      </select>
                    </div> --}}
                  </div>
                  <div class="col-md-4 text-right" style="float:right">
                    @can('mant_roles-crear')
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
                        <table class="table align-items-center table-dark" id="roles" name="roles">
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
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title-default">Añadir roles</h2>
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
                    <button type="button" class="btn btn-primary" id="registrar" name="registrar">Registrar</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cerrar</button>
                </div>
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
