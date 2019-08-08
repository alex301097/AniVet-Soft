<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte de pacientes</title>
    <style>
      .simbolo {
        font-family: DejaVu Sans;
      }

      body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }

      .text-size-10 {
        font-size: 10pt;
      }

      .text-size-6 {
        font-size: 6pt;
      }

      table,
      th,
      td {
        /* border: 1px solid black; */
        border-collapse: collapse;
      }

      td {
        padding: 2px 8px;
      }

      .text-center {
        text-align: center;
      }

      .text-left {
        text-align: left;
      }

      .text-right {
        text-align: right;
      }

      .cuadrado-3 {
        width: 20px;
        height: 20px;
        border: 1px solid #555;
      }

      .container {
        float: left;
        width: 50%;
      }

      h5 {
        padding: 0px;
        margin: 25px 0px 0px 0px;
      }

      .mt-15 {
        margin-top: 15px;
      }

      .mt-10 {
        margin-top: 10px;
      }

      .mt-5 {
        margin-top: 5px;
      }

      .footer {
        position: fixed;
        left: 0;
        bottom: 20px;
        width: 100%;
        text-align: center;
        padding-bottom: 20px;
      }

      .footer h4 {
        margin-top: 5px;
        padding-top: 5px;
      }

      /* footer {
          position: fixed;
          margin-bottom: 5px;
          padding-bottom: 5px;
          left: 0;
          right: 0;
          bottom: 0;
          color: #4f82d6;
          font-weight: bold;
      } */


      .page-number:before {
          content: counter(page);
      }

      hr {
        border: 0.5pt solid black;
      }
    </style>
    {{-- <style>
      .tablilla table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 30px;
      }

      .tablilla table th,
      .tablilla table td {
        text-align: left;
        vertical-align: top;
      }

      .tablilla table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        font-weight: normal;
      }

      .tablilla table td {
        padding: 10px;
        text-align: left;
      }

      .tablilla table tr:nth-child(2n-1) td {
        background: #EEEEEE;
      }

      .tablilla table tr:last-child td {
        background: #DDDDDD;
      }


    </style> --}}
  </head>
  <body>
    <table style="width: 100%;">
      <tr>
        <td colspan="12">
          <table face="verdana" style="width: 100%">
            <tr>
              <td width="30%" colspan="4">
                <img width="150" class="logo" src="{{public_path().'/img/brand/logo_original.jpeg'}}">
              </td>
              <td width="40%" colspan="4" class="text-center">
              </td>
              <td width="30%" colspan="4" class="text-right">
                <b>
                <small>
                  {{\Carbon\Carbon::now()->formatLocalized('%A, %d de %B del %Y, %H:%M hrs')}}
                  <br>
                  Realizado por: {{auth()->user()->nombre}}
                </small>
                </b>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td colspan="12" class="text-center">
          <u><b><h2>Reporte de pacientes</h2></b></u>
        </br>
        </br>
        </td>
      </tr>
      <tr class="text-size-10">
        <td><b>Paciente</b></td>
        <td><b>Edad</b></td>
        <td><b>Peso</b></td>
        <td><b>Tipo</b></td>
        <td><b>Sexo</b></td>
        <td><b>Raza</b></td>
      </tr>
      @foreach ($pacientes as $paciente)
        <tr class="text-size-10 text-center">
          <td>{{$paciente->nombre}}</td>
          <td>{{$paciente->edad }}</td>
          <td>{{$paciente->peso}}</td>
          <td>{{$paciente->tipo_animal->descripcion}}</td>
          <td>{{$paciente->sexo}}</td>
          <td>{{$paciente->raza}}</td>
        </tr>
      @endforeach
    </table>
    <div class="footer">
      <table style="width: 100%;">
        <tr>
          <td width="20%" colspan="2" class="text-right">
          <b>  Anivet-Soft</b>
          </td>
          <td width="60%" colspan="8" class="text-center">
            <h4>veterinariaelyugo@hotmail.com<br>
              Turrúcares, Alajuela, Costa Rica</h4>
          </td>
          <td width="20%" colspan="2" class="text-right">
          <b>  Página <span class="page-number"></span></b>
          </td>
        </tr>
      </table>
    </div>
    <br>
  </body>
</html>
