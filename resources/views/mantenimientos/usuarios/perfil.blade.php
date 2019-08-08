@extends('layouts.master')
@section('css')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ URL::to('plugins/iCheck/all.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('contenido')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Configuración del perfil de usuario
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Perfil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              @if (empty($usuario->imagen))
                <img class="profile-user-img img-responsive img-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="User profile picture">
              @else
                <img class="profile-user-img img-responsive img-circle" style="width:150px;height:150px;" src="{{ url('imgPerfiles/'.$usuario->imagen) }}" alt="User profile picture">
              @endif

              <h3 class="profile-username text-center">{{$usuario->nombre." ".$usuario->apellidos}}</h3>

              <p class="text-muted text-center">{{$usuario->rol->descripcion}}</p>

              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-primary btn-block"><b>Cerrar sesión</b></a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sobre mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Información de contacto</strong>

              <p class="text-muted">
              <ul>
                <li><b>Codigo: </b>{{($usuario->codigo)?$usuario->codigo:"No registrado."}}</li>
                <li><b>Email: </b>{{($usuario->email)?$usuario->email:"No registrado."}}</li>
                <li><b>Telefono: </b>{{($usuario->telefono)?$usuario->telefono:"No registrado."}}</li>
                <li><b>Dirección: </b>{{($usuario->direccion)?$usuario->direccion:"No registrada."}}</li>
              </ul>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Información personal</strong>

              <ul>
                <li><b>Cedula: </b>{{($usuario->cedula)?$usuario->cedula:"No registrada."}}</li>
                <li><b>Sexo: </b>{{($usuario->sexo)?$usuario->sexo:"No registrado."}}</li>
                <li><b>Nacionalidad: </b>{{($usuario->nacionalidad)?$usuario->nacionalidad:"No registrada."}}</li>
                <li><b>Fecha de nacimiento: </b>{{($usuario->fecha_nacimiento)?Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d/m/Y'):"No registrada."}}</li>
                <li><b>Estado civil: </b>{{($usuario->estado_civil)?$usuario->estado_civil:"No registrado."}}</li>
              </ul>
              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Permisos</strong>

              <p>
                @if ($usuario->rol->permisos->contains('categoria', 'usuarios'))
                  <b>Mantenimiento de usuarios: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','usuarios') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif

                @if ($usuario->rol->permisos->contains('categoria', 'pacientes'))
                  <b>Mantenimiento de pacientes: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','pacientes') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif
                @if ($usuario->rol->permisos->contains('categoria', 'roles'))
                  <b>Mantenimiento de roles: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','roles') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif
                @if ($usuario->rol->permisos->contains('categoria', 'tipos de animales'))
                  <b>Mantenimiento de tipos de animales: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','tipos de animales') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif
                @if ($usuario->rol->permisos->contains('categoria', 'tipos de servicio'))
                  <b>Mantenimiento de tipos de servicio: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','tipos de servicio') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif
                @if ($usuario->rol->permisos->contains('categoria', 'animales en venta'))
                  <b>Mantenimiento de animales en venta: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','animales en venta') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif
                @if ($usuario->rol->permisos->contains('categoria', 'citas'))
                  <b>Mantenimiento de citas: </b> <br>
                  @foreach ($usuario->rol->permisos->where('categoria','citas') as $permiso)
                    <span class="label label-info">{{$permiso->nombre}}</span>
                  @endforeach
                  <br>
                @endif
              </p>

              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#info" data-toggle="tab">Información</a></li>
              <li><a href="#configuracion" data-toggle="tab">Configuración</a></li>
            </ul>
            <div class="tab-content">
              <!-- /.tab-info -->
              <div class="active tab-pane" id="info">

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="configuracion">
                <form class="form-horizontal">
                  <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                Información personal
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md" style="padding-left:25px; padding-right:25px;">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                        <label for="cedula"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Cedula</h5></label>
                                        <input type="text" class="form-control form-control-sm form-control-alternative" id="cedula" name="cedula" placeholder="Cedula" value="{{$usuario->cedula}}">
                                        <p class="error_cedula text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                      </div>
                                    </div>
                                  </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="nombre"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Nombre</h5></label>
                                          <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre" name="nombre" placeholder="Nombre" value="{{$usuario->nombre}}">
                                          <p class="error_nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="apellidos"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Apellidos</h5></label>
                                          <input type="text" class="form-control form-control-sm form-control-alternative" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{$usuario->apellidos}}">
                                          <p class="error_apellidos text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="nacionalidad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;País de nacimiento</h5></label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-control form-control-sm">
                                              <option value="" >Seleccione una opción</option>
                                              <option value="Costa Rica" {{($usuario->nacionalidad == "Costa Rica")?"selected":""}}>Costa Rica</option>
                                              <option value="Panamá" {{($usuario->nacionalidad == "Panamá")?"selected":""}}>Panamá</option>
                                              <option value="Nicaragua" {{($usuario->nacionalidad == "Nicaragua")?"selected":""}}>Nicaragua</option>
                                              <option value="Guatemala" {{($usuario->nacionalidad == "Guatemala")?"selected":""}}>Guatemala</option>
                                              <option value="Honduras" {{($usuario->nacionalidad == "Honduras")?"selected":""}}>Honduras</option>
                                              <option value="Otro" {{($usuario->nacionalidad == "Otro")?"selected":""}}>Otro</option>
                                            </select>
                                            <p class="error_nacionalidad text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="fecha_nacimiento"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Fecha de nacimiento</h5></label>
                                          <div class="input-group date">
                                            <div class="input-group-addon">
                                              <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control form-control-sm pull-right" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" value="{{date('d/m/Y', strtotime($usuario->fecha_nacimiento))}}">
                                            <input type="hidden" id="fecha_nacimiento_formato" value="">
                                          </div>
                                          <p class="error_fecha_nacimiento text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="estado_civil"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Estado Civil</h5></label>
                                          <select class="form-control form-control-sm form-control-alternative" id="estado_civil" name="estado_civil">
                                              <option value="">Seleccione una opción</option>
                                              <option value="Soltero(a)" {{($usuario->estado_civil == "Soltero(a)")?"selected":""}}>Soltero(a)</option>
                                              <option value="Casado(a)" {{($usuario->estado_civil == "Casado(a)")?"selected":""}}>Casado(a)</option>
                                              <option value="Viudo(a)" {{($usuario->estado_civil == "Viudo(a)")?"selected":""}}>Viudo(a)</option>
                                              <option value="Separado(a)" {{($usuario->estado_civil == "Separado(a)")?"selected":""}}>Separado(a)</option>
                                              <option value="Divorciado(a)" {{($usuario->estado_civil == "Divorciado(a)")?"selected":""}}>Divorciado(a)</option>
                                              <option value="Unión Libre" {{($usuario->estado_civil == "Unión Libre")?"selected":""}}>Unión Libre</option>
                                          </select>
                                          <p class="error_estado_civil text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                      <div class="col-md-6">

                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="nacionalidad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                                          <br>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <input name="sexo" class="minimal" id="masculino" value="Masculino" {{($usuario->sexo == "Masculino")?"checked":""}} type="radio">
                                              <label class="custom-control-label" for="masculino">Masculino</label>
                                            </div>
                                            <div class="col-md-6">
                                              <input name="sexo" class="minimal" id="femenino" value="Femenino" {{($usuario->sexo == "Femenino")?"checked":""}} type="radio">
                                              <label class="custom-control-label" for="femenino">Femenino</label>
                                            </div>
                                          </div>
                                          <p class="error_sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="telefono"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Telefono</h5></label>
                                          <input type="number" class="form-control form-control-sm form-control-alternative" id="telefono" name="telefono" placeholder="Telefono" value="{{$usuario->telefono}}">
                                          <p class="error_telefono text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                          <label for="direccion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Dirección</h5></label>
                                          <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Dirección">{{$usuario->telefono}}</textarea>
                                          <p class="error_direccion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel box box-info">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Imagen de perfil
                              </a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md">
                                    <div class="row" style="padding-bottom:10px;">
                                      <div class="col-lg-12 text-center" id="avatar" name="avatar">
                                        @if (!empty($usuario->imagen))
                                          <img src="{{ url('imgPerfiles/'.$usuario->imagen) }}" class="img-circle" style="width:300px; height:300px; top:300px; left:300px;" alt="User Avatar">
                                        @else
                                          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" style="width:300px; height:300px; top:300px; left:300px;" alt="User Avatar">
                                        @endif
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-3">

                                </div>
                                <div class="col-lg-6 text-center">
                                  <div class="custom-file text-center">
                                    <label class="custom-file-label" for="imagen">Seleccione una imagen</label>
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen" aria-describedby="inputGroupFileAddon01" accept="image/*" value="{{$usuario->imagen}}">
                                    <p class="error_imagen text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-lg-3">

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="panel box box-warning">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                Credenciales
                              </a>
                            </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-12" style="padding-left:25px; padding-right:25px;">
                                  <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                    <label for="codigo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Codigo</h5></label>
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                      <input type="text" class="form-control form-control-sm" placeholder="Codigo" id="codigo" name="codigo" value="{{$usuario->codigo}}">
                                    </div>
                                    <p class="error_codigo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              {{-- <div class="row">
                                <div class="col-md-12" style="padding-left:25px; padding-right:25px;">
                                  <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                    <label for="old_password"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Contraseña Actual</h5></label>
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                      <input class="form-control form-control-sm" placeholder="Contraseña" type="password" id="old_password" name="old_password">
                                    </div>
                                    <p class="error_old_password text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                  <small for="old_password" id="passwordHelpBlock" class="form-text text-muted">
                                    <label for=""><i style="color:gray;" class="fas fa-asterisk"></i>&nbsp;</label>
                                    Debes digitar tu actual contraseña para poder actualizarla.
                                  </small>
                                </div>
                              </div> --}}
                              <div class="row">
                                <div class="col-md-6" style="padding-left:25px; padding-right:25px;">
                                  <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                    <label for="password"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Contraseña</h5></label>
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                      <input class="form-control form-control-sm" placeholder="Contraseña" type="password" id="password" name="password">
                                    </div>
                                    <p class="error_password text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                  <small for="password" id="passwordHelpBlock" class="form-text text-muted">
                                    <label for=""><i style="color:gray;" class="fas fa-asterisk"></i>&nbsp;</label>
                                    Tu contraseña debe tener al menos una mayúscula, una minúscula, un carácter, un número y 10 dígitos como mínimo.
                                  </small>
                                </div>
                                <div class="col-md-6" style="padding-left:25px; padding-right:25px;">
                                  <div class="form-group" style="padding-left:15px; padding-right:15px;">
                                    <label for="password-confirm"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Confirmar contraseña</h5></label>
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                      <input class="form-control form-control-sm" placeholder="Confirmar contraseña" type="password" name="password_confirmation" id="password-confirm">
                                    </div>
                                    <p class="error_password_confirmation text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="checkbox pull-left">
                              <label>
                                <input type="checkbox" name="condiciones" id="condiciones" class="minimal pull-left"> Estoy de acuerdo con los <a href="#">terminos y condiciones</a>
                                <p class="error_condiciones text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <input type="hidden" id="id_edicion" name="id_edicion" value="{{$usuario->id}}">
                              <button type="button" class="btn btn-danger pull-right" id="registrar">Guardar cambios</button>
                            </div>
                          </div>
                        </div>
                      </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection
@section('scripts')
  <!-- datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="{{ URL::to('plugins/iCheck/icheck.min.js') }}"></script>

  <script type="text/javascript">

    $(document).ready(function () {
      $(function() {

          $('input[name="fecha_nacimiento"]').daterangepicker({
            "singleDatePicker": true,
              opens: 'center',
              autoUpdateInput: false,
              maxDate: moment(),
             "locale": {
                 "format": "DD/MM/YYYY",
                 "separator": " - ",
                 "applyLabel": "Aplicar",
                 "cancelLabel": "Cancelar/Limpiar",
                 "fromLabel": "De",
                 "toLabel": "hasta",
                 "customRangeLabel": "Custom",
                 "daysOfWeek": [
                     "Dom",
                     "Lun",
                     "Mar",
                     "Mie",
                     "Jue",
                     "Vie",
                     "Sáb"
                 ],
                 "monthNames": [
                     "Enero",
                     "Febrero",
                     "Marzo",
                     "Abril",
                     "Mayo",
                     "Junio",
                     "Julio",
                     "Agosto",
                     "Septiembre",
                     "Octubre",
                     "Noviembre",
                     "Diciembre"
                 ],
                 "firstDay": 1
             }
          });

          $('input[name="fecha_nacimiento"]').on('apply.daterangepicker', function(ev, picker) {

              $("#fecha_nacimiento").val(picker.startDate.format('DD/MM/YYYY'));

              $("#fecha_nacimiento_formato").val(picker.startDate.format('YYYY-MM-DD'));

          });

          $('input[name="fecha_nacimiento"]').on('cancel.daterangepicker', function(ev, picker) {
            $("#fecha_nacimiento").val("");

            $("#fecha_nacimiento_formato").val("");
          });

        });
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })

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

    function filePreview(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
          $('#avatar').html("<img src='"+e.target.result+"' class='img-circle' style='width:300px; height:300px; top:300px; left:300px;' alt='User Avatar'>");
        }
          reader.readAsDataURL(input.files[0]);
      }
    }

    $('#imagen').change(function(){
      filePreview(this);
    });
    
    //Añadir
    $('#registrar').click(function(){
      var form_data = new FormData();
      form_data.append('_token', $('input[name=_token]').val());
      form_data.append('id_edicion', $('#id_edicion').val());
      if($('#imagen')[0].files[0]){
        form_data.append('imagen', $('#imagen')[0].files[0]);
      }

      if($('input[name=condiciones]').is(":checked")){
        form_data.append('condiciones', true);
  		}else{
        form_data.append('condiciones', false);
  		}

      form_data.append('rol', $('#rol').val());
      form_data.append('cedula', $('#cedula').val());
      form_data.append('nombre', $('#nombre').val());
      form_data.append('apellidos', $('#apellidos').val());
      form_data.append('nacionalidad', $('#nacionalidad').val());
      form_data.append('fecha_nacimiento', $('#fecha_nacimiento_formato').val());
      form_data.append('estado_civil', $('#estado_civil').val());
      form_data.append('sexo', $('input[name="sexo"]:checked').val());
      form_data.append('telefono', $('#telefono').val());
      form_data.append('direccion', $('#direccion').val());
      form_data.append('codigo', $('#codigo').val());
      form_data.append('password', $('#password').val());
      form_data.append('password_confirmation', $('#password-confirm').val());

      $.ajax({
        type: 'post',
        url: '{{route('usuarios.editar_perfil')}}',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.rol){
              $('.error_rol').removeClass('hidden');
              $('.error_rol').text(data.errors.rol);
            }
            if(data.errors.cedula){
              $('.error_cedula').removeClass('hidden');
              $('.error_cedula').text(data.errors.cedula);
            }
            if(data.errors.nombre){
              $('.error_nombre').removeClass('hidden');
              $('.error_nombre').text(data.errors.nombre);
            }
            if(data.errors.apellidos){
              $('.error_apellidos').removeClass('hidden');
              $('.error_apellidos').text(data.errors.apellidos);
            }
            if(data.errors.nacionalidad){
              $('.error_nacionalidad').removeClass('hidden');
              $('.error_nacionalidad').text(data.errors.nacionalidad);
            }
            if(data.errors.fecha_nacimiento){
              $('.error_fecha_nacimiento').removeClass('hidden');
              $('.error_fecha_nacimiento').text(data.errors.fecha_nacimiento);
            }
            if(data.errors.estado_civil){
              $('.error_estado_civil').removeClass('hidden');
              $('.error_estado_civil').text(data.errors.estado_civil);
            }
            if(data.errors.sexo){
              $('.error_sexo').removeClass('hidden');
              $('.error_sexo').text(data.errors.sexo);
            }
            if(data.errors.telefono){
              $('.error_telefono').removeClass('hidden');
              $('.error_telefono').text(data.errors.telefono);
            }
            if(data.errors.direccion){
              $('.error_direccion').removeClass('hidden');
              $('.error_direccion').text(data.errors.direccion);
            }
            if(data.errors.codigo){
              $('.error_codigo').removeClass('hidden');
              $('.error_codigo').text(data.errors.codigo);
            }
            if(data.errors.password){
              $('.error_password').removeClass('hidden');
              $('.error_password').text(data.errors.password);
            }
            if(data.errors.password_confirmation){
              $('.error_password_confirmation').removeClass('hidden');
              $('.error_password_confirmation').text(data.errors.password_confirmation);
            }
            if(data.errors.condiciones){
              $('.error_condiciones').removeClass('hidden');
              $('.error_condiciones').text(data.errors.condiciones);
            }
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: '¡La información del usuario se ha actualizado correctamente!',
              showConfirmButton: false,
              timer: 1500
            })

            setTimeout(function(){
              location.reload();
            }, 2000);
        }
        },
      });

    });
  </script>
@endsection
