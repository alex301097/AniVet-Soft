{{-- <a type="button" class="btn btn-info btn-sm" title="Click para mostrar los detalles del rol"
href="#" id="detalle_rol" name="detalle_rol">
&nbsp;<i class="fas fa-info-circle" style="color:black;"></i>&nbsp;</a> --}}

@if ($deleted_at == null)
  <a type="button" class="btn btn-secondary btn-sm"
  title="Click para asignar los permisos del rol" href="{{route('roles.permisos.get_asignar',$id)}}"
  id="asignar_permisos" name="asignar_permisos">
  &nbsp;<i class="far fa-edit" style="color:black;"></i>&nbsp;</a>
@else
  <a type="button" class="btn btn-default btn-sm disabled" id="asignar_permisos" name="asignar_permisos"
  title="Click para asignar los permisos del rol" href="#">
  &nbsp;<i class="far fa-edit" style="color:black;"></i>&nbsp;</a>
@endif

<a type="button" data-id="{{$id}}" data-deleted_at="{{$deleted_at}}"
  class="btn {{($deleted_at == null)?"btn-danger":"btn-success"}} btn-sm"
 title="{{($deleted_at == null)?'Click para deshabilitar el rol':'Click para habilitar el rol'}}"
 id="{{($deleted_at == null)?'deshabilitar_rol':'habilitar_rol'}}" name="{{($deleted_at == null)?'deshabilitar_rol':'habilitar_rol'}}" data-id="{{$id}}">
 &nbsp;<i class="{{($deleted_at == null)?"fas fa-trash-alt":"far fa-check-circle"}}"></i>&nbsp;
</a>
