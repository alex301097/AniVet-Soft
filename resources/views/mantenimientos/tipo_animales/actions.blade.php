<div class="text-center">
@if ($deleted_at == null)
  <a type="button" class="btn btn-sm bg-orange"
  title="Click para editar los detalles del tipo animal" id="editar_tipo_animal" name="editar_tipo_animal"
  data-toggle="modal" data-target="#modal-editar"
  data-id="{{$id}}" data-descripcion="{{$descripcion}}">
  &nbsp;<i class="far fa-edit"></i>&nbsp;</a>
@else
  <a type="button" class="btn btn-sm bg-orange disabled"
  title="Click para editar los detalles del tipo animal" id="editar_tipo_animal" name="editar_tipo_animal"
  data-toggle="modal" data-target="#modal-editar"
  data-id="{{$id}}" data-descripcion="{{$descripcion}}">
  &nbsp;<i class="far fa-edit"></i>&nbsp;</a>
@endif

<a type="button" data-id="{{$id}}" data-deleted_at="{{$deleted_at}}"
class="btn {{($deleted_at == null)?"btn-danger":"btn-success"}} btn-sm"
 title="{{($deleted_at == null)?'Click para deshabilitar el tipo animal':'Click para habilitar el tipo animal'}}"
 id="{{($deleted_at == null)?'deshabilitar_tipo_animal':'habilitar_tipo_animal'}}" name="{{($deleted_at == null)?'deshabilitar_tipo_animal':'habilitar_tipo_animal'}}" data-id="{{$id}}">
 &nbsp;<i class="{{($deleted_at == null)?"fas fa-trash-alt":"far fa-check-circle"}}"></i>&nbsp;
</a>
</div>
