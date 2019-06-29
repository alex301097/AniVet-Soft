@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/checkbox.css') }}" rel="stylesheet">
@endsection
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Asignación</h6>
                  <h2 class="mb-0">Permisos - {{$rol->descripcion}}</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <p class="error-rol text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
              <div class="row">
                <div class="col-md-6 text-center">
                  <span>Mantenimiento de usuarios</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_usuario as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-usuarios" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-usuarios" name="permiso-todos-usuarios"  value="permiso-todos-usuarios">
                          <label for="permiso-todos-usuarios">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <span>Mantenimiento de roles</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_rol as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-roles" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-roles" name="permiso-todos-roles" value="permiso-todos-roles">
                          <label for="permiso-todos-roles">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 text-center">
                  <span>Mantenimiento de tipos de animales</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_tipo_animal as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-tipos_animal" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-tipos_animal" name="permiso-todos-tipos_animal" value="permiso-todos-tipos_animal">
                          <label for="permiso-todos-tipos_animal">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <span>Mantenimiento de tipos de servicios</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_tipo_servicio as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-tipos_servicio" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-tipos_servicio" name="permiso-todos-tipos_servicio" value="permiso-todos-tipos_servicios">
                          <label for="permiso-todos-tipos_servicio">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 text-center">
                  <span>Mantenimiento de pacientes</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_paciente as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-pacientes" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-pacientes" name="permiso-todos-pacientes" class="permiso-todos-pacientes" value="permiso-todos-pacientes">
                          <label for="permiso-todos-pacientes">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <span>Mantenimiento de citas</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_citas as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-citas" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-citas" name="permiso-todos-citas" class="permiso-todos-citas" value="permiso-todos-citas">
                          <label for="permiso-todos-citas">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <span>Mantenimiento de animales en venta</span>
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_animal_en_venta as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-animales_en_venta" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        <li>
                          <input type="checkbox" id="permiso-todos-animales_en_venta" name="permiso-todos-animales_en_venta" class="permiso-todos-animales_en_venta" value="permiso-todos-animales_en_venta">
                          <label for="permiso-todos-animales_en_venta">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                  <div class="col text-right">
                    <input type="hidden" id="id_edicion" name="id_edicion" value="{{$rol->id}}">
                    @csrf
                    <button class="btn btn-icon btn-3 btn-primary" type="button" id="registrar" name="registrar">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Asignar permisos</span>
                    </button>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script type="text/javascript">

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 2500
    });

    const swal_confirm = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    });

    // $(document).ready(function() {
    //   let valores_usuario = this.querySelectorAll('input[class=permiso-usuarios]:checked');
    //   var cant_usuario = count($permisos_usuario);
    //   alert(valores_usuario.length + " - " + cant_usuario);
    //   if (valores_usuario == 0) {
    //       $('#permiso-todos-usuarios').prop("checked", false);
    //   }
    //   if (valores_usuario == cant_usuario) {
    //     $('#permiso-todos-usuarios').prop("checked", true);
    //   }
    // });

    $('#permiso-todos-usuarios').change(function(){
      if($(this).is(":checked")){
        $('.permiso-usuarios').prop("checked", true);
      }else{
        $('.permiso-usuarios').prop("checked", false);
      }
    });

    $('#permiso-todos-roles').change(function(){
      if($(this).is(":checked")){
        $('.permiso-roles').prop("checked", true);
      }else{
        $('.permiso-roles').prop("checked", false);
      }
    });

    $('#permiso-todos-tipos_animal').change(function(){
      if($(this).is(":checked")){
        $('.permiso-tipos_animal').prop("checked", true);
      }else{
        $('.permiso-tipos_animal').prop("checked", false);
      }
    });

    $('#permiso-todos-tipos_servicio').change(function(){
      if($(this).is(":checked")){
        $('.permiso-tipos_servicio').prop("checked", true);
      }else{
        $('.permiso-tipos_servicio').prop("checked", false);
      }
    });

    $('#permiso-todos-pacientes').change(function(){
      if($(this).is(":checked")){
        $('.permiso-pacientes').prop("checked", true);
      }else{
        $('.permiso-pacientes').prop("checked", false);
      }
    });

    $('#permiso-todos-citas').change(function(){
      if($(this).is(":checked")){
        $('.permiso-citas').prop("checked", true);
      }else{
        $('.permiso-citas').prop("checked", false);
      }
    });

    $('#permiso-todos-animales_en_venta').change(function(){
      if($(this).is(":checked")){
        $('.permiso-animales_en_venta').prop("checked", true);
      }else{
        $('.permiso-animales_en_venta').prop("checked", false);
      }
    });
    //Añadir
    $('#registrar').click(function(){
      if($('#id_edicion').val() == 1){
        Toast.fire({
          type: 'danger',
          title: 'No se pueden modificar los permisos del administrador!'
        })
      }else{
        let valoresCheck = [];
        $('input[name="permisos[]"]:checked').each(function(){
            valoresCheck.push(this.value);
        });
        $.ajax({
          type: 'post',
          url: '{{route('roles.permisos.asignar')}}',
          data: {
            '_token': $('input[name=_token]').val(),
            'rol': $('#id_edicion').val(),
            'permisos': valoresCheck
          },
          success: function(data){
            if((data.errors)){
              Toast.fire({
                type: 'warning',
                title: 'Errores de validación!'
              })

              if(data.errors.permisos){
                $('.error-permisos').removeClass('hidden');
                $('.error-permisos').text(data.errors.permisos);
              }

              if(data.errors.rol){
                $('.error-rol').removeClass('hidden');
                $('.error-rol').text(data.errors.rol);
              }

            }else{
              Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Los permisos se han asignado correctamente!',
                showConfirmButton: false,
                timer: 1500
              })

              setTimeout(function(){
                var url = "{{route('roles')}}";
                    document.location.href=url;
              }, 2000);
          }
          },
        });
      }
    });
  </script>

@endsection
