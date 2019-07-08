<div class="text-center">
<a type="button" class="btn btn-info btn-sm" title="Click para mostrar los detalles del usuario"
data-toggle="modal" data-target="#modal-detalle" id="detalle_usuario" name="detalle_usuario"
data-id="{{$id}}" data-imagen={{(($imagen)?url('imgPerfiles/'.$imagen):"null")}} data-rol="{{$rol_id}}" data-cedula="{{$cedula}}"
data-nombre="{{$nombre}}" data-apellidos="{{$apellidos}}" data-nacionalidad="{{$nacionalidad}}"
data-fecha_nacimiento="{{$fecha_nacimiento}}" data-estado_civil="{{$estado_civil}}" data-sexo="{{$sexo}}"
data-telefono="{{$telefono}}" data-direccion="{{$direccion}}" data-email="{{$email}}"
data-codigo="{{$codigo}}">
&nbsp;<i class="fas fa-info-circle"></i>&nbsp;</a>

@if ($deleted_at == null)
  <a type="button" class="btn btn-sm bg-orange"
  id="editar_usuario" name="editar_usuario"
  title="Click para editar los detalles del usuario" data-toggle="modal" data-target="#modal-editar"
  data-id="{{$id}}" data-imagen={{(($imagen)?url('imgPerfiles/'.$imagen):"null")}} data-rol="{{$rol_id}}" data-cedula="{{$cedula}}"
  data-nombre="{{$nombre}}" data-apellidos="{{$apellidos}}" data-nacionalidad="{{$nacionalidad}}"
  data-fecha_nacimiento="{{$fecha_nacimiento}}" data-estado_civil="{{$estado_civil}}" data-sexo="{{$sexo}}"
  data-telefono="{{$telefono}}" data-direccion="{{$direccion}}" data-email="{{$email}}"
  data-codigo="{{$codigo}}">
  &nbsp;<i class="far fa-edit"></i>&nbsp;</a>
@else
  <a type="button" class="btn btn-sm bg-orange disabled"
  id="editar_usuario" name="editar_usuario"
  title="Click para editar los detalles del usuario" data-toggle="modal" data-target="#modal-editar"
  data-id="{{$id}}" data-imagen={{(($imagen)?url('imgPerfiles/'.$imagen):"null")}} data-rol="{{$rol_id}}" data-cedula="{{$cedula}}"
  data-nombre="{{$nombre}}" data-apellidos="{{$apellidos}}" data-nacionalidad="{{$nacionalidad}}"
  data-fecha_nacimiento="{{$fecha_nacimiento}}" data-estado_civil="{{$estado_civil}}" data-sexo="{{$sexo}}"
  data-telefono="{{$telefono}}" data-direccion="{{$direccion}}" data-email="{{$email}}"
  data-codigo="{{$codigo}}">
  &nbsp;<i class="far fa-edit"></i>&nbsp;</a>
@endif

<a type="button" data-id="{{$id}}" data-deleted_at="{{$deleted_at}}"
  class="btn {{($deleted_at == null)?"btn-danger":"btn-success"}} btn-sm"
 title="{{($deleted_at == null)?'Click para deshabilitar el usuario':'Click para habilitar el paciente'}}"
 id="{{($deleted_at == null)?'deshabilitar_usuario':'habilitar_usuario'}}" name="{{($deleted_at == null)?'deshabilitar_usuario':'habilitar_usuario'}}" data-id="{{$id}}">
 &nbsp;<i class="{{($deleted_at == null)?"fas fa-trash-alt":"far fa-check-circle"}}"></i>&nbsp;
</a>
</div>
