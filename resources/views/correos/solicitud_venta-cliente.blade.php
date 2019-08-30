<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación de solicitud de compra de animales</title>
  </head>
  <body style="margin: 0; padding: 0;">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="800" style="border-collapse: collapse;">
      <tr>
       <td colspan="4">
         <b><p style="font-size: 14pt;">¡Buenas! Le notificamos que ha solicitado correctamente la compra de los animales. Aqui dejaremos todos los datos pertinentes.</p></b>
       </td>
      </tr>
      <tr>
        <td colspan="4">
          <b><p style="font-size: 14pt;">Estos son los animales que se quieren comprar y los datos del solicitante:</p></b>
        </td>
      </tr>
      <tr style="background-color:#F08080;">
        <td colspan="4" style="padding:5px; text-align:center;">
          <p style="font-size: 12pt; color:white;">Información de la persona solicitante</p>
        </td>
      </tr>
      <tr>
        <td valign="top" style="padding:5px;">Cedula:</td>
        <td valign="top" style="padding:5px;">{{ $enc_solicitud->cedula }}</td>
        <td valign="top" style="padding:5px;">Nombre completo:</td>
        <td valign="top" style="padding:5px;">{{ $enc_solicitud->nombre." ".$enc_solicitud->apellidos }}</td>
      </tr>
      <tr>
        <td valign="top" style="padding:5px;">Dirección:</td>
        <td valign="top" style="padding:5px;">{{ $enc_solicitud->direccion }}</td>
        <td valign="top" style="padding:5px;">Telefono:</td>
        <td valign="top" style="padding:5px;">{{ $enc_solicitud->telefono }}</td>
      </tr>
      <tr>
        <td valign="top" style="padding:5px;">Correo:</td>
        <td valign="top" style="padding:5px;">{{ $enc_solicitud->correo }}</td>
        <td valign="top" style="padding:5px;">Sexo:</td>
        <td valign="top" style="padding:5px;">{{ $enc_solicitud->sexo }}</td>
      </tr>
      @if (!empty($enc_solicitud->observaciones))
      <tr>
        <td colspan="2" valign="top" style="padding:5px;">Observaciones:</td>
        <td colspan="2" valign="top" style="padding:5px;">{{ $enc_solicitud->observaciones }}</td>
      </tr>
      @endif
      @foreach ($detalles_animales as $animal_en_venta)
        <tr style="background-color:#FFA07A">
          <td colspan="4" style="padding:5px; text-align:center;"><p style="font-size: 12pt; color:white">Información del animal:</p></td>
        </tr>
        <tr>
          <td valign="top" style="padding:5px;">Nombre:</td>
          <td valign="top" style="padding:5px;">
            @if ($animal_en_venta->nombre)
              {{ $animal_en_venta->nombre }}
            @else
              Sin nombre
            @endif
          </td>
          <td valign="top" style="padding:5px;">Edad:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->edad }}</td>
        </tr>
        <tr>
          <td valign="top" style="padding:5px;">Peso:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->peso }}</td>
          <td valign="top" style="padding:5px;">Tipo de animal:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->tipo_animal->descripcion }}</td>
        </tr>
        <tr>
          <td valign="top" style="padding:5px;">Raza:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->raza }}</td>
          <td valign="top" style="padding:5px;">Color:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->color }}</td>
        </tr>
        <tr>
          <td valign="top" style="padding:5px;">Observaciones:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->observaciones }}</td>
          <td valign="top" style="padding:5px;">Condiciones:</td>
          <td valign="top" style="padding:5px;">{{ $animal_en_venta->condiciones }}</td>
        </tr>
      @endforeach
     </table>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="800" style="border-collapse: collapse;">
       <tr>
         <td style="padding:5px; text-align:center;">
           <b>Veterinaria El Yugo</b>
         </td>
         <td style="padding:5px; text-align:center;">
           <h4>veterinariaelyugo@hotmail.com<br>
             Turrúcares, Alajuela, Costa Rica</h4>
         </td>
         <td style="padding:5px; text-align:center;">
           <b>Telefono: 2487-6064</b>
         </td>
         <td style="padding:5px; text-align:center;">
           <b>Anivet-Soft</b>
         </td>
       </tr>
     </table>
  </body>
</html>
