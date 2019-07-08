<a type="button" class="btn btn-info btn-sm" title="Click para mostrar los detalles de la cita"
href="{{route('citas.get_detalle', $id)}}">
&nbsp;<i class="fas fa-info-circle"></i>&nbsp;</a>

@if ($deleted_at == null)
  <a type="button" class="btn btn-sm bg-orange"
  title="Click para editar los detalles de la cita" href="{{route('citas.get_editar', $id)}}">
  &nbsp;<i class="far fa-edit"></i>&nbsp;</a>
@else
  <a type="button" class="btn btn-sm bg-orange disabled"
  title="Click para editar los detalles de la cita" href="{{route('citas.get_editar', $id)}}">
  &nbsp;<i class="far fa-edit"></i>&nbsp;</a>
@endif

<a type="button" data-id="{{$id}}" data-deleted_at="{{$deleted_at}}"
  class="btn {{($deleted_at == null)?"btn-danger":"btn-success"}} btn-sm"
 title="{{($deleted_at == null)?'Click para deshabilitar la cita':'Click para habilitar la cita'}}"
 id="{{($deleted_at == null)?'deshabilitar_cita':'habilitar_cita'}}" name="{{($deleted_at == null)?'deshabilitar_cita':'habilitar_cita'}}" data-id="{{$id}}">
 &nbsp;<i class="{{($deleted_at == null)?"fas fa-trash-alt":"far fa-check-circle"}}"></i>&nbsp;
</a>
