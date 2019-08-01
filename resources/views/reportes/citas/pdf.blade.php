<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte de citas</title>
    <style media="screen">
      table{
        overflow: auto;
      }
    </style>
  </head>
  <body>
    <main>
      <table border-collapse= "collapse" cellpadding="5" cellspacing="0">
        <thead>
          <tr>
            <td COLSPAN='2'>
              <div style="text-align:left;">
                <img width="20%" height="20%" src="img/brand/logo_original.jpeg"/>
              </div>
            </td>
            <td COLSPAN='2' style="text-align:center;">
              <strong style="text-align:center;">
                <h2>Reporte de citas</h2>
              </strong>
            </td>
            <td COLSPAN='2'>
              <div style="text-align:right;">
                <small>
                  {{date_default_timezone_set('America/Costa_Rica')}}
                  {{date('l, d M Y - H:i:s')}}
                  <br>
                  Hecho por: {{auth()->user()->nombre}}
                </small>
              </div>
            </td>
          </tr>
          <tr style="text-align:center;">
            <td><b>Encargado</b></td>
            <td><b>Paciente</b></td>
            <td><b>Fecha</b></td>
            <td><b>Hora de inicio</b></td>
            <td><b>Hora final</b></td>
            <td><b>Servicio</b></td>
            <td><b>Motivo</b></td>
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
              <td>{{$cita->servicio->descripcion}}</td>
              <td>{{$cita->motivo}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
  </main>
  <footer>
    <small style="float:right;text-align:right;">
      <p></p>
    </small>
  </footer>
  </body>
</html>
