@extends('layouts.master')
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Seguridad
      <small>Respaldos de Información</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Inicio</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                @csrf
                <a class="btn btn-primary pull-right" href="#" id="añadir_respaldo">
                    <i class="fa fa-plus"></i>&nbsp;
                    Nuevo respaldo
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped text-center" id="materiales">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre del archivo</th>
                            <th>Tamaño</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($backups as $key => $backup)
                        <tr class="backup-{{ $backup['file_name'] }}">
                            <td> {{ ++$key }} </td>
                            <td> {{ $backup['file_name'] }} </td>
                            <td> {{ $backup['file_size'] }} </td>
                            <td> {{ $backup['last_modified'] }} </td>
                            <td>
                                <a  type="button" class="btn btn-primary btn-sm"
                                    title="Descargar"
                                    href="{{ route('respaldos.descargar', $backup['file_name']) }}"
                                    data-nombre="{{ $backup['file_name'] }}"
                                    id="descargar_respaldo">
                                    &nbsp;<i class="fa fa-download"></i>&nbsp;
                                </a>
                                <a  type="button" class="btn btn-info btn-sm"
                                    title="Restaurar" data-nombre="{{ $backup['file_name'] }}"
                                    id="restaurar_respaldo"
                                    href="#">
                                    &nbsp;<i class="fa fa-upload"></i>&nbsp;
                                </a>
                                <a  type="button" class="btn btn-danger btn-sm"
                                    title="Eliminar"
                                    data-nombre="{{ $backup['file_name'] }}"
                                    href="#"
                                    id="eliminar_respaldo">
                                    &nbsp;<i class="fa fa-trash"></i>&nbsp;
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
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
  //Añadir
  $('#añadir_respaldo').click(function(){
    $('#añadir_respaldo').html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
    $('#añadir_respaldo').addClass('disabled');

    $.ajax({
      type: 'get',
      url: '{{route('respaldos.añadir')}}',
      success: function(data){
        if((data.errors)){
          Toast.fire({
            type: 'warning',
            title: 'Errores encontrados!'
          })
        }else{
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'El respaldo se ha añadido correctamente!',
            showConfirmButton: false,
            timer: 1500
          })

          $('#añadir_respaldo').html('<i class="fa fa-plus"></i>&nbsp;&nbsp;Nuevo respaldo');

          setTimeout(function(){
            location.reload();
          }, 2500);
      }
      },
    });
  });

  // //Descargar
  // $('#descargar_respaldo').click(function(){
  //   var ruta = "{{ route('respaldos.descargar',':file_name') }}";
  //   ruta = ruta.replace(':file_name', $(this).data('nombre'));
  //   $.ajax({
  //     type: 'get',
  //     url: ruta,
  //     success: function(data){
  //       if((data.errors)){
  //         Toast.fire({
  //           type: 'warning',
  //           title: 'Errores de validación!'
  //         })
  //
  //       }else{
  //         Swal.fire({
  //           position: 'top-end',
  //           type: 'success',
  //           title: 'El respaldo se ha descargado correctamente!',
  //           showConfirmButton: false,
  //           timer: 1500
  //         })
  //
  //
  //         // setTimeout(function(){
  //         //   location.reload();
  //         // }, 2000);
  //     }
  //     },
  //   });
  //
  // });

  //Restaurar
  $('#restaurar_respaldo').click(function(){
    var ruta = "{{ route('respaldos.restaurar',':file_name') }}";
    ruta = ruta.replace(':file_name', $(this).data('nombre'));
    $.ajax({
      type: 'get',
      url: ruta,
      success: function(data){
        if((data.errors)){
          Toast.fire({
            type: 'warning',
            title: 'Errores de validación!'
          })
        }else{
          Swal.fire({
            position: 'top-end',
            type: 'success',
            title: 'El respaldo se ha restaurado correctamente!',
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

  //Eliminar
  $(document).on('click', '#eliminar_respaldo', function(e) {
    e.preventDefault();
    swal_confirm.fire({
      title: '¿Estas seguro de eliminar esto?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminalo.',
      cancelButtonText: 'No, cancelar.',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        $.ajax({
            type: "post",
            url: '{{route("respaldos.eliminar")}}',
            data: {
              '_token': $('input[name=_token]').val(),
              'file_name': $(this).data('nombre'),
            },
            success: function (data) {
              swal_confirm.fire(
                '¡Eliminado!',
                'El respaldo ha sido eliminado.',
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
          'Los respaldo esta seguro.',
          'error'
        )
      }
    });
  });

  $(document).ready(function(){
    $('#side_bar-seguridad').addClass('active');
    $('#side_bar_option-respaldos').addClass('active');
  });
  </script>
@endsection
