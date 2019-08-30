@extends('layouts.master')
@section('css')
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::to('bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Reportes</h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Reportes</a></li>
      <li class="active">Expediente Medico</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Reporte de Expedientes Medicos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-4">

          </div>
            <div class="col-md-4 pull-right">
              <h4>Filtro por rango de fechas</h4>
              <input type="text" class="form-control form-control-sm" name="datefilter" id="rango_fechas" value="" style="max-width:250px;"/>
              <input type="hidden" id="min" value="">
              <input type="hidden" id="max" value="">
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <h4>Filtro por pacientes</h4>
                <select class="form-control form-control-sm" id="paciente" name="paciente" style="max-width:250px;">
                  <option value="0">Seleccione una opción</option>
                  @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}">{{($paciente->nombre)?$paciente->nombre." - ".$paciente->tipo_animal->descripcion." - ".$paciente->user->nombre." ".$paciente->user->apellidos:"Sin nombre - ".$paciente->tipo_animal->descripcion." - ".$paciente->user->nombre." ".$paciente->user->apellidos}}</option>
                  @endforeach
                </select>
              </div>
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
                          <th scope="col">Acción</th>
                      </tr>
                  </thead>
                  <tbody class="text-center">

                  </tbody>
                </table>
            </div>
          </div>
      </div>
      <!-- /.box-body -->

      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

@endsection
@section('scripts')
<script
src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
crossorigin="anonymous"></script>
  <!-- Select2 -->
  <script src="{{URL::to('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

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

      $('#paciente').select2();

      $(document).ready(function(){
        $('#side_bar-reportes').addClass('active');
        $('#side_bar_option-reportes-expediente_medico').addClass('active');
      });

      $(document).ready(function () {
         $(function() {
             $('input[name="datefilter"]').daterangepicker({
                 opens: 'center',
                 autoUpdateInput: false,
                 format: "DD/MM/YYYY",

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
               var table = $('#citas').DataTable();
                 var ruta = "{{ url('api/reporte_expediente_medico/:min/:max/:paciente') }}";
                 ruta = ruta.replace(':min', picker.startDate.format('YYYY-MM-DD'));
                 ruta = ruta.replace(':max', picker.endDate.format('YYYY-MM-DD'));
                 ruta = ruta.replace(':paciente', $('#paciente').val());
                 $("#min").val(picker.startDate.format('YYYY-MM-DD'));
                 $("#max").val(picker.endDate.format('YYYY-MM-DD'));
                 table.ajax.url(ruta);
                 table.draw();
                 $(this).val("Del " + picker.startDate.format('MM/DD/YYYY') + ' al ' + picker.endDate.format('MM/DD/YYYY') + ".");
             });
             $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                var table = $('#citas').DataTable();
                var ruta = "{{ url('api/reporte_expediente_medico/0/0/:paciente') }}";
                ruta = ruta.replace(':paciente', $('#paciente').val());
                $("#min").val("");
                $("#max").val("");
                table.ajax.url(ruta);
                table.draw();
                $(this).val('');
             });
           });

           $('#paciente').change(function () {
             var table = $('#citas').DataTable();
             if(!$('#rango_fechas').val()){
                 var ruta = "{{ url('api/reporte_expediente_medico/0/0/:paciente') }}";
                 ruta = ruta.replace(':paciente', $(this).val());
                 table.ajax.url(ruta);
                 table.draw();
             }else {
                 var ruta = "{{ url('api/reporte_expediente_medico/:min/:max/:paciente') }}";
                 ruta = ruta.replace(':min', $("#min").val());
                 ruta = ruta.replace(':max', $("#max").val());
                 ruta = ruta.replace(':paciente', $(this).val());

                 table.ajax.url(ruta);
                 table.draw();
             }
           });
       });

      $(document).ready(function() {
        $('#citas').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":"{{ url('api/reporte_expediente_medico') }}",
          "columns":
          [
            {data: 'nombreDueño', orderable: false, searchable: false},
            {data: 'paciente.nombre', name:'paciente.nombre'},
            {data: 'fecha' ,
            render: function(data, type, row){
                 if(type === "sort" || type === "type"){
                     return data;
                 }
                 return moment(data).format("DD/MM/YYYY");
             }},
            {data: 'horaInicio'},
            {data: 'horaFinal'},
            {data: 'servicio.descripcion', name:'servicio.descripcion'},
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

  </script>
@endsection
