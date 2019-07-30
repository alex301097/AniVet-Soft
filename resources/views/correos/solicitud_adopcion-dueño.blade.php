<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación de adopción de animales</title>
  </head>
  <body>
    <p>¡Buenas! Le notificamos que se ha solicitado la adopción de animales. Aqui dejaremos todos los datos pertinentes.</p>
   <p>Esta es la persona que quiere adoptar los animales:</p>
   <ul>
     <li>Cedula: {{ $enc_solicitud->cedula }}</li>
     <li>Nombre completo: {{ $enc_solicitud->nombre." ".$enc_solicitud->apellidos }}</li>
     <li>Dirección: {{ $enc_solicitud->direccion }}</li>
     <li>Telefono: {{ $enc_solicitud->telefono }}</li>
     <li>Correo: {{ $enc_solicitud->correo }}</li>
     <li>Sexo: {{ $enc_solicitud->sexo }}</li>
     @if (!empty($enc_solicitud->observaciones))
       <li>Observaciones: {{ $enc_solicitud->observaciones }}</li>
     @endif
   </ul>
   <p>Estos son los animales que se quieren adoptar:</p>
       @foreach ($detalles_adopcion as $detalle_adopcion)
         @if ($enc_adopcion->id == $detalle_adopcion->enc_adopcion_id)
           <p>Información del animal:</p>
           <ul>
             @if (!empty($detalle_adopcion->nombre))
               <li>Nombre: {{ $detalle_adopcion->nombre }}</li>
             @endif
             <li>Edad: {{ $detalle_adopcion->edad }}</li>
             <li>Peso: {{ $detalle_adopcion->peso }}</li>
             <li>Tipo de animal: {{ $detalle_adopcion->tipo_animal }}</li>
             <li>Raza: {{ $detalle_adopcion->raza }}</li>
             <li>Color: {{ $detalle_adopcion->color }}</li>
             <li>Cantidad: {{ $detalle_adopcion->cantidad }}</li>
             <li>Observaciones: {{ $detalle_adopcion->observaciones }}</li>
             <li>Condiciones: {{ $detalle_adopcion->condiciones }}</li>
           </ul>
         @endif
     @endforeach
  </body>
</html>
