<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/estilo.css">
    <meta charset="utf-8">
    <title>Reporte de citas</title>

    {{-- <style>
    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }
    body {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      position: relative;
      width: 19cm;
      height: 27cm;
      margin: 0 auto;
      color: #001028;
      background: #FFFFFF;
      font-size: 14px;
    }
    h1 {
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: center;
      border-top: 1px solid #5D6975;
      border-bottom: 1px solid #5D6975;
      margin: 0 0 2em 0;
      width: 100%;
    }

    h1 small {
      font-size: 0.45em;
      line-height: 1.5em;
      float: left;
    }

    h1 small:last-child {
      float: right;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 30px;
    }

    table th,
    table td {
      text-align: left;
      vertical-align: top;
    }

    table th {
      padding: 5px 20px;
      color: #5D6975;
      border-bottom: 1px solid #C1CED9;
      font-weight: normal;
    }
table th img, table td image{
  padding:1px;
width:150px; height:150px;
}

    table td {
      padding: 10px;
      text-align: left;
    }

    table tr:nth-child(2n-1) td {
      background: #EEEEEE;
    }

    table tr:last-child td {
      background: #DDDDDD;
    }
    footer {
      color: #5D6975;
      width: 100%;
      height: 30px;
      position: absolute;
      bottom: 0;
      border-top: 1px solid #C1CED9;
      padding: 8px 0;
      text-align: center;
    }
    style="float:center;text-align:center;"
    - {{date('d/m/Y')}} -
</style> --}}
<style media="screen">
  table{
    overflow: auto;
  }


</style>
  </head>
  <body>
    <main>
      <div>
        <img width="20%" height="20%" src="img/brand/yugo.jpg">
        <br>
      </div>
      <h3 class="clearfix">
     <small>
       Telefono: 2487-6064
     </small>
     <strong style="float:center;text-align:center;">
       <h1>
       Reporte de citas
       <h1>
     </strong>
       <small style="float:right;text-align:right;">
         {{date_default_timezone_set('America/Costa_Rica')}}
         {{date('d/m/Y g:ia')}}
         <br>
         {{auth()->user()->nombre}}
      </small>
     </h3>
     <br>
     <br>
     <br>
     <div id="main-container">
      <table BORDER = "1" border-collapse= "collapse" cellpadding="5" cellspacing="0">
      <thead>
        <tr  style="float:center;text-align:center;">
          <td>
            	<b>Encargado</b>
          </td>
          <td>
            	<b>Paciente</b>
          </td>
          <td>
            	<b>Fecha</b>
          </td>
          <td>
            	<b>Hora de inicio</b>
          </td>
          <td>
            	<b>Hora final</b>
          </td>
          <td>
            	<b>Servicio</b>
          </td>
          <td>
            	<b>Motivo</b>
          </td>
        </tr>
    </thead>
    <tbody>

      @foreach ($citas as $cita)
        <tr style="float:center;text-align:center;">
          <td>{{$cita->paciente->user->nombre." ".$cita->paciente->user->apellidos}}</td>
          <td>{{$cita->paciente->nombre." - ".$cita->paciente->tipo_animal->descripcion." - ".$cita->paciente->raza." - ".$cita->paciente->sexo}} </td>
          <td>{{$cita->fecha}}</td>
          <td>{{$cita->horaInicio}}</td>
          <td>{{$cita->horaFinal}}</td>
          <td>{{$cita->tipo_servicio->descripcion}}</td>
          <td>{{$cita->motivo}}</td>

        </tr>
      @endforeach


      </tbody>
    </table>
  </div>
  </main>
  <footer>
    <small style="float:right;text-align:right;">
    
    </small>
  </footer>
  </body>
</html>
