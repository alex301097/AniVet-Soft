<a type="button" class="btn btn-success btn-sm" href="#" title="Click para añadir las imagenes del animal" id="añadir_imagenes" name="añadir_imagenes"
data-toggle="modal" data-target="#modal-añadir" data-id="{{$id}}">
&nbsp;<i class="far fa-images" style="color:black;"></i>&nbsp;
</a>

<a type="button" class="btn btn-info btn-sm" title="Click para mostrar los detalles del animal"
href="{{route('animales_venta.get_detalle', $id)}}">
&nbsp;<i class="fas fa-info-circle" style="color:black;"></i>&nbsp;</a>

@if ($deleted_at == null)
  <a type="button" class="btn btn-secondary btn-sm"
  title="Click para editar los detalles del paciente" href="{{route('animales_venta.get_editar', $id)}}">
  &nbsp;<i class="far fa-edit" style="color:black;"></i>&nbsp;</a>
@else
  <a type="button" class="btn btn-default btn-sm disabled"
  title="Click para editar los detalles del animal" href="{{route('animales_venta.get_editar', $id)}}">
  &nbsp;<i class="far fa-edit" style="color:black;"></i>&nbsp;</a>
@endif

<a type="button" data-id="{{$id}}" data-deleted_at="{{$deleted_at}}"
  class="btn {{($deleted_at == null)?"btn-danger":"btn-success"}} btn-sm"
 title="{{($deleted_at == null)?'Click para deshabilitar el animal':'Click para habilitar el animal'}}"
 id="{{($deleted_at == null)?'deshabilitar_animal':'habilitar_animal'}}" name="{{($deleted_at == null)?'deshabilitar_animal':'habilitar_animal'}}" data-id="{{$id}}">
 &nbsp;<i class="{{($deleted_at == null)?"fas fa-trash-alt":"far fa-check-circle"}}"></i>&nbsp;
</a>
