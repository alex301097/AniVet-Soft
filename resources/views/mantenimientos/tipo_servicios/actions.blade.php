@if ($deleted_at == null)
  <a type="button" class="btn btn-secondary btn-sm"
  title="Click para editar los detalles del servicio" id="editar_tipo_servicio" name="editar_tipo_servicio"
  data-toggle="modal" data-target="#modal-editar"
  data-id="{{$id}}" data-descripcion="{{$descripcion}}">
  <i class="far fa-edit" style="color:black;"></i>&nbsp;</a>
@else
  <a type="button" class="btn btn-default btn-sm disabled"
  title="Click para editar los detalles del servicio" id="editar_tipo_servicio" name="editar_tipo_servicio"
  data-toggle="modal" data-target="#modal-editar"
  data-id="{{$id}}" data-descripcion="{{$descripcion}}">
  <i class="far fa-edit" style="color:black;"></i>&nbsp;</a>
@endif

<a type="button" data-id="{{$id}}" data-deleted_at="{{$deleted_at}}"
  class="btn {{($deleted_at == null)?"btn-danger":"btn-success"}} btn-sm"
 title="{{($deleted_at == null)?'Click para deshabilitar el servicio':'Click para habilitar el servicio'}}"
 id="{{($deleted_at == null)?'deshabilitar_tipo_servicio':'habilitar_tipo_servicio'}}" name="{{($deleted_at == null)?'deshabilitar_tipo_servicio':'habilitar_tipo_servicio'}}" data-id="{{$id}}">
 &nbsp;<i class="{{($deleted_at == null)?"fas fa-trash-alt":"far fa-check-circle"}}"></i>&nbsp;
</a>
