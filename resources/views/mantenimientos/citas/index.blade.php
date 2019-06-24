@extends('layouts.master')
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
                    <a class="btn btn-icon btn-primary btn-sm" type="button" href="{{route('citas.get_añadir')}}">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir</span>
                    </a>
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
                                <th scope="col">Hora Inicio</th>
                                <th scope="col">Hora Final</th>
                                <th scope="col">Motivo</th>
                                <th scope="col">Servicio</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="lista-citas" name="lista-citas">
                            @foreach ($citas as $cita)
                              <tr id="cita_{{$cita->id}}" name="cita_{{$cita->id}}">
                                  <th scope="row">
                                      #{{$cita->id}} {{$cita->paciente->user}}
                                  </th>
                                  <td>
                                      {{-- {{$cita->paciente->nombre}} / {{$cita->paciente->tipo_animal->descripcion}} --}}
                                  </td>
                                  <td>
                                      {{$cita->horaInicio}}
                                  </td>
                                  <td>
                                      {{$cita->horaFinal}}
                                  </td>
                                  <td>
                                      {{$cita->motivo}}
                                  </td>
                                  <td>
                                      {{$cita->servicio->descripcion}}
                                  </td>
                                  <td>
                                      <span class="badge badge-dot mr-4">
                                        @if ($cita->deleted_at != null)
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
                                              <a class="dropdown-item" href="{{route('citas.get_detalle', $cita->id)}}" id="detalle_cita" name="detalle_cita">
                                                <span><i class="ni ni-glasses-2"></i></span>
                                                &nbsp;&nbsp;Detalle
                                              </a>
                                              <a class="dropdown-item" href="{{route('citas.get_editar', $cita->id)}}" id="editar_cita" name="editar_cita">
                                                <span><i class="ni ni-ruler-pencil"></i></span>
                                                &nbsp;&nbsp;Editar
                                              </a>
                                              <a class="dropdown-item" href="#" id="deshabilitar_cita" name="deshabilitar_cita"
                                              data-id="{{$cita->id}}">
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
        									{{$citas->links()}}
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
@endsection
@section('scripts')

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
