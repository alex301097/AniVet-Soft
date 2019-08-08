@extends('layouts.master')
@section('css')
  <link type="text/css" href="{{ URL::to('css/checkbox.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ URL::to('css/circular_tabs.css') }}" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Asignación
      <small>Permisos - {{$rol->descripcion}}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="{{route('roles')}}">Roles</a></li>
      <li class="active">Asignar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de permisos</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Colapsar">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="process">
             <div class="process-row nav nav-tabs">
              <div class="process-step">
               <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
               <p><small>Usuarios<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x"></i></button>
               <p><small>Roles<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
               <p><small>Pacientes<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-cogs fa-3x"></i></button>
               <p><small>Tipos de animales<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-cogs fa-3x"></i></button>
               <p><small>Tipos de servicios<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu6"><i class="fa fa-check fa-3x"></i></button>
               <p><small>Animales en venta<br /></small></p>
              </div>
             </div>
            </div>
            <div class="tab-content">
             <div id="menu1" class="tab-pane fade active in">
              <h3>Permisos disponibles para la sección de usuarios.</h3>
              <div class="row">
                <div class="col-md-12 text-center">
                  <ul class="ks-cboxtags">
                    @foreach ($permisos_usuario as $permiso)
                        <li>
                          <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-usuarios" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                          <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <ul class="ks-cboxtags">
                    <li>
                      <input type="checkbox" id="permiso-todos-usuarios" name="permiso-todos-usuarios" value="permiso-todos-usuarios">
                      <label for="permiso-todos-usuarios">Todos</label>
                    </li>
                  </ul>
                </div>
              </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu2" class="tab-pane fade">
               <h3>Permisos disponibles para la sección de roles.</h3>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     @foreach ($permisos_rol as $permiso)
                         <li>
                           <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-roles" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                           <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                         </li>
                     @endforeach
                   </ul>
                 </div>
               </div>
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
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu3" class="tab-pane fade">
               <h3>Permisos disponibles para la sección de pacientes.</h3>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     @foreach ($permisos_paciente as $permiso)
                         <li>
                           <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-pacientes" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                           <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                         </li>
                     @endforeach
                   </ul>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     <li>
                       <input type="checkbox" id="permiso-todos-pacientes" name="permiso-todos-pacientes" value="permiso-todos-pacientes">
                       <label for="permiso-todos-pacientes">Todos</label>
                     </li>
                   </ul>
                 </div>
               </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu4" class="tab-pane fade">
               <h3>Permisos disponibles para la sección de tipos de animales.</h3>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     @foreach ($permisos_tipo_animal as $permiso)
                         <li>
                           <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-tipos_animal" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                           <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                         </li>
                     @endforeach
                   </ul>
                 </div>
               </div>
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
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu5" class="tab-pane fade">
               <h3>Permisos disponibles para la sección de tipos de servicios.</h3>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     @foreach ($permisos_tipo_servicio as $permiso)
                         <li>
                           <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-tipos_servicio" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                           <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                         </li>
                     @endforeach
                   </ul>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     <li>
                       <input type="checkbox" id="permiso-todos-tipos_servicio" name="permiso-todos-tipos_servicio" value="permiso-todos-tipos_servicio">
                       <label for="permiso-todos-tipos_servicio">Todos</label>
                     </li>
                   </ul>
                 </div>
               </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu6" class="tab-pane fade">
               <h3>Permisos disponibles para la sección de animales en venta.</h3>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     @foreach ($permisos_animal_en_venta as $permiso)
                         <li>
                           <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-animales_en_venta" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                           <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                         </li>
                     @endforeach
                   </ul>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-12 text-center">
                   <ul class="ks-cboxtags">
                     <li>
                       <input type="checkbox" id="permiso-todos-animales_en_venta" name="permiso-todos-animales_en_venta" value="permiso-todos-animales_en_venta">
                       <label for="permiso-todos-animales_en_venta">Todos</label>
                     </li>
                   </ul>
                 </div>
               </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><a id="asignar" type="button" class="btn btn-success"><i class="fa fa-check"></i> ¡Hecho!</a></li>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <p class="error-rol text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>

      <!-- /.box-body -->

      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection
@section('scripts')
  <script src="{{ URL::to('js/circular_tabs.js') }}"></script>
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

    $(document).ready(function(){
      $('#side_bar-seguridad').addClass('active');
      $('#side_bar_option-roles').addClass('active');
    })

    $(function(){
      $('a[title]').tooltip();
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
    $('#asignar').click(function(){
      $(this).html('<i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;Procesando');
      $(this).addClass('disabled');

      if($('#id_edicion').val() == 1){
        $('#asignar').html('<i class="fa fa-plus"></i>&nbsp;&nbsp;¡Hecho!');
        $('#asignar').removeClass('disabled');
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
              $('#asignar').html('<i class="fa fa-plus"></i>&nbsp;&nbsp;¡Hecho!');
              $('#asignar').removeClass('disabled');
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
