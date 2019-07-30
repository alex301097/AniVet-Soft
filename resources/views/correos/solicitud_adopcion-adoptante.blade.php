<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación de adopción de animales</title>
  </head>
  <body>
    <p>¡Buenas! Le notificamos que ha solicitado correctamente las adopciones de animales. Aqui dejaremos todos los datos pertinentes.</p>
   <p>Estos son los animales que se quieren adoptar y las personas que los pusieron en adopción:</p>
     @foreach ($encabezados_adopcion as $enc_adopcion)
       <p>Información de la persona:</p>
       <ul>
         <li>Cedula: {{ $enc_adopcion->cedula_dueño }}</li>
         <li>Nombre completo: {{ $enc_adopcion->nombre_dueño." ".$enc_adopcion->apellidos_dueño }}</li>
         <li>Dirección: {{ $enc_adopcion->direccion_dueño }}</li>
         <li>Telefono: {{ $enc_adopcion->telefono_dueño }}</li>
         <li>Correo: {{ $enc_adopcion->correo_dueño }}</li>
         <li>Sexo: {{ $enc_adopcion->sexo_dueño }}</li>
         @if (!empty($enc_adopcion->observaciones))
           <li>Observaciones: {{ $enc_adopcion->observaciones }}</li>
         @endif
       </ul>
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
      <hr>
   @endforeach
  </body>
</html>
