@extends('layouts.master')
@section('css')
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Reportes</h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Reportes</a></li>
      <li class="active">Citas</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte de citas</h3>
      </br>
      </br>

      <!--<div class="login100-pic js-tilt" data-tilt>
        <img src="{{ URL::to('img/brand/yugo.png') }}" width="10%" height="10%" alt="IMG">
        <h5>Veterinaria El Yugo</h5>
        <h5>2487-6064</h5>
      </div>
      </br>
    </br>-->

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
          <div class="row" style="padding-bottom:25px;">
            <div class="col-md-6">
              <a target="_blank" href="{{route('citas-pdf')}}">Generar pto reporte</a>
            </div>

            <div class="col-md-6">

                <td>Fecha Mínima:</td>
                <td><input name="min" id="min" type="text"></td>

                <td>Fecha Máxima:</td>
                <td><input name="max" id="max" type="text"></td>

            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h3>Tipos de descarga</h3>
                  <table class="table table-bordered table-striped" id="citas" name="citas">
                  <thead>
                      <tr>
                          <th scope="col">Encargado</th>
                          <th scope="col">Paciente</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Hora Inicio</th>
                          <th scope="col">Hora Final</th>
                          <th scope="col">Servicio</th>
                          <th scope="col">Motivo</th>
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

@endsection
@section('scripts')
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="{{ URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

  <script src="{{ URL::to('butons/dataTables.buttons.min.js') }}" ></script>
  <script src="{{ URL::to('butons/jszip.min.js') }}" ></script>
  <script src="{{ URL::to('butons/pdfmake.min.js') }}" ></script>
  <script src="{{ URL::to('butons/vfs_fonts.js') }}" ></script>
  <script src="{{ URL::to('butons/buttons.html5.min.js') }}" ></script>


  <script type="text/javascript">
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
        $('#citas').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ],
          "processing":true,
          "serverSide":true,
          "ajax":"{{ url('api/reporte_citas') }}",
          "columns":
          [
            {data: 'nombreDueño', orderable: false, searchable: false},
            {data: 'nombrePaciente', orderable: false, searchable: false},
            {data: 'fecha'},
            {data: 'horaInicio'},
            {data: 'horaFinal'},
            {data: 'descripcionServicio', orderable: false, searchable: false},
            {data: 'motivo'},
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

      /* Custom filtering function which will search data in column four between two values */
             $(document).ready(function () {

                 $.fn.dataTable.ext.search.push(
                     function (settings, data, dataIndex) {
                         var min = $('#min').datepicker("getDate");
                         var max = $('#max').datepicker("getDate");
                         // need to change str order before making  date obect since it uses a new Date("mm/dd/yyyy") format for short date.
                         var d = data[4].split("/");
                         var startDate = new Date(d[1]+ "/" +  d[0] +"/" + d[2]);

                         if (min == null && max == null) { return true; }
                         if (min == null && startDate <= max) { return true;}
                         if(max == null && startDate >= min) {return true;}
                         if (startDate <= max && startDate >= min) { return true; }
                         return false;
                     }
                 );


                 $("#min").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true , dateFormat:"dd/mm/yy"});
                 $("#max").datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy" });
                 var table = $('#citas').DataTable();

                 // Event listener to the two range filtering inputs to redraw on input
                 $('#min, #max').change(function () {
                     table.draw();
                 });
             });



  </script>
@endsection
