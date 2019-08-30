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
               <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fas fa-bone fa-3x"></i></button>
               <p><small>Procesos<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-folder fa-3x"></i></button>
               <p><small>Mantenimientos<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fas fa-lock fa-3x"></i></button>
               <p><small>Seguridad<br /></small></p>
              </div>
              <div class="process-step">
               <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fas fa-file-alt fa-3x"></i></button>
               <p><small>Reportes<br /></small></p>
              </div>

             </div>
            </div>
            <div class="tab-content">
             <div id="menu1" class="tab-pane fade active in">
              <div class="row">
                <div class="col-md-6">
                  <h3>Permisos disponibles para la sección de calendarización.</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        @foreach ($permisos_calendarizacion as $permiso)
                            <li>
                              <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-calendarizacion" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                          <input type="checkbox" id="permiso-todos-calendarizacion" name="permiso-todos-calendarizacion" value="permiso-todos-calendarizacion">
                          <label for="permiso-todos-calendarizacion">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h3>Permisos disponibles para la sección de expediente médico.</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        @foreach ($permisos_expediente as $permiso)
                            <li>
                              <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-expediente" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                          <input type="checkbox" id="permiso-todos-expediente" name="permiso-todos-expediente" value="permiso-todos-expediente">
                          <label for="permiso-todos-expediente">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <h3>Permisos disponibles para la sección de ventas de animales.</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        @foreach ($permisos_venta_animales as $permiso)
                            <li>
                              <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-venta_animales" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                          <input type="checkbox" id="permiso-todos-ventas_animales" name="permiso-todos-ventas_animales" value="permiso-todos-ventas_animales">
                          <label for="permiso-todos-ventas_animales">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <h3>Permisos disponibles para la sección de registro de adopción de animales.</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        @foreach ($permisos_registro_adopcion_animales as $permiso)
                            <li>
                              <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-registro_adopcion_animales" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                          <input type="checkbox" id="permiso-todos-registro_adopcion_animales" name="permiso-todos-registro_adopcion_animales" value="permiso-todos-registro_adopcion_animales">
                          <label for="permiso-todos-registro_adopcion_animales">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <h3>Permisos disponibles para la sección de solicitud de adopción de animales.</h3>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <ul class="ks-cboxtags">
                        @foreach ($permisos_solicitud_adopcion_animales as $permiso)
                            <li>
                              <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-permisos_solicitud_adopcion_animales" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                          <input type="checkbox" id="permiso-todos-solicitud_adopcion_animales" name="permiso-todos-solicitud_adopcion_animales" value="permiso-todos-solicitud_adopcion_animales">
                          <label for="permiso-todos-solicitud_adopcion_animales">Todos</label>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu2" class="tab-pane fade">
               <div class="row">
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de mantenimientos de usuarios.</h3>
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
                 </div>
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de mantenimientos de pacientes.</h3>
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
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de mantenimiento de tipo de animales.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_tipo_animal as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-tipo_animal" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                           <input type="checkbox" id="permiso-todos-tipo_animal" name="permiso-todos-tipo_animal" value="permiso-todos-tipo_animal">
                           <label for="permiso-todos-tipo_animal">Todos</label>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de mantenimiento de tipo de servicios.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_tipo_servicio as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-tipo_servicio" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                           <input type="checkbox" id="permiso-todos-tipo_servicio" name="permiso-todos-tipo_servicio" value="permiso-todos-tipo_servicio">
                           <label for="permiso-todos-tipo_servicio">Todos</label>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de mantenimiento de animales en venta.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_animal_en_venta as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-animal_en_venta" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                           <input type="checkbox" id="permiso-todos-animal_en_venta" name="permiso-todos-animal_en_venta" value="permiso-todos-animal_en_venta">
                           <label for="permiso-todos-animal_en_venta">Todos</label>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de mantenimiento de citas.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_citas as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-citas" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                           <input type="checkbox" id="permiso-todos-citas" name="permiso-todos-citas" value="permiso-todos-citas">
                           <label for="permiso-todos-citas">Todos</label>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu3" class="tab-pane fade">
               <div class="row">
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de roles y permisos.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_rol as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-rol" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                           <input type="checkbox" id="permiso-todos-rol" name="permiso-todos-rol" value="permiso-todos-rol">
                           <label for="permiso-todos-rol">Todos</label>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de respaldos.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_respaldos as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-respaldos" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
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
                           <input type="checkbox" id="permiso-todos-respaldos" name="permiso-todos-respaldos" value="permiso-todos-respaldos">
                           <label for="permiso-todos-respaldos">Todos</label>
                         </li>
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li><button type="button" class="btn btn-info next-step">Siguiente <i class="fa fa-chevron-right"></i></button></li>
              </ul>
             </div>
             <div id="menu4" class="tab-pane fade">
               <div class="row">
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de reporte de citas.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_reporte_citas as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-reporte_citas" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                               <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                             </li>
                         @endforeach
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de reportes de usuarios.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_reporte_usuarios as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-reporte_usuarios" name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                               <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                             </li>
                         @endforeach
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de reporte de pacientes.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_reporte_pacientes as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-reporte_pacientes " name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                               <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                             </li>
                         @endforeach
                       </ul>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6">
                   <h3>Permisos disponibles para la sección de reporte de expediente medico.</h3>
                   <div class="row">
                     <div class="col-md-12 text-center">
                       <ul class="ks-cboxtags">
                         @foreach ($permisos_reporte_expediente_medico as $permiso)
                             <li>
                               <input type="checkbox" id="permiso-{{$permiso->id}}" class="permiso-reporte_expediente_medico " name="permisos[]" {{($rol->permisos->contains($permiso))?"checked":""}} value="{{$permiso->id}}">
                               <label for="permiso-{{$permiso->id}}">{{$permiso->nombre}}</label>
                             </li>
                         @endforeach
                       </ul>
                     </div>
                   </div>
                 </div>
               </div>
              <ul class="list-unstyled list-inline pull-right">
               <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Atras</button></li>
               <li>
                 <input type="hidden" name="id_edicion" id="id_edicion" value="{{$rol->id}}">
                 <a id="asignar" type="button" class="btn btn-success"><i class="fa fa-check"></i> ¡Hecho!</a>
               </li>
              </ul>
             </div>
            </div>
          </div>
        </div>
        <p class="error-rol text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
      <!-- /.box-body -->
      <div class="row">
        <div class="col-md-12 pull-left">
        <a class="btn bg-orange btn-sm pull-left" style="width:100px;" href="{{ URL::previous() }}">
          <span><i class="fas fa-arrow-left"></i></span>&nbsp;&nbsp;&nbsp;Regresar</a>
        </div>
      </div>
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

    $('#permiso-todos-tipo_animal').change(function(){
      if($(this).is(":checked")){
        $('.permiso-tipo_animal').prop("checked", true);
      }else{
        $('.permiso-tipo_animal').prop("checked", false);
      }
    });

    $('#permiso-todos-tipo_servicio').change(function(){
      if($(this).is(":checked")){
        $('.permiso-tipo_servicio').prop("checked", true);
      }else{
        $('.permiso-tipo_servicio').prop("checked", false);
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

    $('#permiso-todos-animal_en_venta').change(function(){
      if($(this).is(":checked")){
        $('.permiso-animal_en_venta').prop("checked", true);
      }else{
        $('.permiso-animal_en_venta').prop("checked", false);
      }
    });

    $('#permiso-todos-calendarizacion').change(function(){
      if($(this).is(":checked")){
        $('.permiso-calendarizacion').prop("checked", true);
      }else{
        $('.permiso-calendarizacion').prop("checked", false);
      }
    });

    $('#permiso-todos-expediente').change(function(){
      if($(this).is(":checked")){
        $('.permiso-expediente').prop("checked", true);
      }else{
        $('.permiso-expediente').prop("checked", false);
      }
    });

    $('#permiso-todos-ventas_animales').change(function(){
      if($(this).is(":checked")){
        $('.permiso-venta_animales').prop("checked", true);
      }else{
        $('.permiso-venta_animales').prop("checked", false);
      }
    });

    $('#permiso-todos-registro_adopcion_animales').change(function(){
      if($(this).is(":checked")){
        $('.permiso-registro_adopcion_animales').prop("checked", true);
      }else{
        $('.permiso-registro_adopcion_animales').prop("checked", false);
      }
    });

    $('#permiso-todos-solicitud_adopcion_animales').change(function(){
      if($(this).is(":checked")){
        $('.permiso-permisos_solicitud_adopcion_animales').prop("checked", true);
      }else{
        $('.permiso-permisos_solicitud_adopcion_animales').prop("checked", false);
      }
    });

    $('#permiso-todos-rol').change(function(){
      if($(this).is(":checked")){
        $('.permiso-rol').prop("checked", true);
      }else{
        $('.permiso-rol').prop("checked", false);
      }
    });

    $('#permiso-todos-respaldos').change(function(){
      if($(this).is(":checked")){
        $('.permiso-respaldos').prop("checked", true);
      }else{
        $('.permiso-respaldos').prop("checked", false);
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
