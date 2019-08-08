@extends('layouts.master')
@section('css')
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <!-- daterange picker -->
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Reportes</h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Reportes</a></li>
      <li class="active">Usuarios</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte de usuarios</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
            <div class="col-md-4">
              <h4>Exportar formato</h4>
              <button type="submit" class="btn btn-sm btn-success pull-left" style="max-width:300px;"
                id="generar_reporte" name="generar_reporte" data-toggle="tooltip"
                title="Click para generar el reporte en PDF de los usuarios.">
                &nbsp;<i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF
              </button>
            </div>
            <div class="col-md-4">
              <h4>Filtro por fechas</h4>
              <input type="text" class="form-control form-control-sm" name="datefilter" id="rango_fechas" value="" style="max-width:250px;"/>
              <input type="hidden" id="min" value="">
              <input type="hidden" id="max" value="">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <h4>Filtro por estado</h4>
                <select class="form-control form-control-sm" id="estado" name="estado" style="max-width:250px;">
                  <option value="habilitados">Usuarios habilitadas</option>
                  <option value="deshabilitados">Usuarios deshabilitadas</option>
                </select>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped text-center" id="usuarios" name="usuarios">
                  <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Dirección</th>
                    </tr>
                  </thead>
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
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="{{ URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ URL::to('butons/dataTables.buttons.min.js') }}" ></script>
  <script src="{{ URL::to('butons/jszip.min.js') }}" ></script>
  <script src="{{ URL::to('butons/pdfmake.min.js') }}" ></script>
  <script src="{{ URL::to('butons/vfs_fonts.js') }}" ></script>
  <script src="{{ URL::to('butons/buttons.html5.min.js') }}" ></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <script type="text/javascript">
      //Date range picker

      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500
      });

      $('#min').datepicker({
        autoclose: true
      })

      $('#max').datepicker({
        autoclose: true
      })

      const swal_confirm = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
      });

      $(document).ready(function() {

          var ruta = "{{ url('api/reporte_usuarios/0/0/:estado') }}";
          ruta = ruta.replace(':estado', $('#estado').val());
        $('#usuarios').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":ruta,
          "columns":
          [
            {data: 'nombre', orderable: false, searchable: false},
            {data: 'apellidos', orderable: false, searchable: false},
            {data: 'cedula'},
            {data: 'telefono'},
            {data: 'rol.descripcion'},
            {data: 'direccion', orderable: false, searchable: false},
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

       $(document).ready(function () {
         $(function() {

             $('input[name="datefilter"]').daterangepicker({
                 opens: 'center',
                 autoUpdateInput: false,
                 format: "DD/MM/YYYY",
                 maxDate: moment(),
                "locale": {

                    "separator": " - ",
                    "applyLabel": "Aplicar",
                    "cancelLabel": "Cancelar/Limpiar",
                    "fromLabel": "De",
                    "toLabel": "hasta",
                    "customRangeLabel": "Custom",
                    "daysOfWeek": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sáb"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1
                }
             });

             $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
               var table = $('#usuarios').DataTable();

                 var ruta = "{{ url('api/reporte_usuarios/:min/:max/:estado') }}";
                 ruta = ruta.replace(':min', picker.startDate.format('YYYY-MM-DD'));
                 ruta = ruta.replace(':max', picker.endDate.format('YYYY-MM-DD'));
                 ruta = ruta.replace(':estado', $('#estado').val());
                 $("#min").val(picker.startDate.format('YYYY-MM-DD'));
                 $("#max").val(picker.endDate.format('YYYY-MM-DD'));
                 table.ajax.url(ruta);
                 table.draw();

                 $(this).val("Del " + picker.startDate.format('MM/DD/YYYY') + ' al ' + picker.endDate.format('MM/DD/YYYY') + ".");
             });

             $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                var table = $('#usuarios').DataTable();
                var ruta = "{{ url('api/reporte_usuarios/0/0/:estado') }}";
                ruta = ruta.replace(':estado', $('#estado').val());
                $("#min").val("");
                $("#max").val("");
                table.ajax.url(ruta);
                table.draw();

                $(this).val('');
             });

           });

           $('#generar_reporte').click(function () {
             if(!$('#rango_fechas').val()){
                 var ruta = "{{ route('usuarios-pdf',['0','0',':estado']) }}";
                 ruta = ruta.replace(':estado', $("#estado").val());

                 window.open(ruta, '_blank');
             }else {
               var ruta = "{{ route('usuarios-pdf',[':min',':max',':estado']) }}";
                 ruta = ruta.replace(':min', $("#min").val());
                 ruta = ruta.replace(':max', $("#max").val());
                 ruta = ruta.replace(':estado', $("#estado").val());

                 window.open(ruta, '_blank');
             }
           });

           $('#estado').change(function () {
             var table = $('#usuarios').DataTable();
             if(!$('#rango_fechas').val()){
                 var ruta = "{{ url('api/reporte_usuarios/0/0/:estado') }}";
                 ruta = ruta.replace(':estado', $(this).val());
                 table.ajax.url(ruta);
                 table.draw();
             }else {
                 var ruta = "{{ url('api/reporte_usuarios/:min/:max/:estado') }}";
                 ruta = ruta.replace(':min', $("#min").val());
                 ruta = ruta.replace(':max', $("#max").val());
                 ruta = ruta.replace(':estado', $(this).val());

                 table.ajax.url(ruta);
                 table.draw();
             }
           });
       });

  </script>
@endsection
