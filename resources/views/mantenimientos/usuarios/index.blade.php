@extends('layouts.master')
@section('css')
  <!-- datatable and dropzone css links -->
  <link rel="stylesheet" rel="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css"></script>
  <link rel="stylesheet" rel="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ URL::to('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ URL::to('plugins/iCheck/all.css') }}">
@endsection
@section('contenido')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuarios
      <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li><a href="#">Mantenimientos</a></li>
      <li class="active">Usuarios</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lista de usuarios</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row" style="padding-bottom:25px;">
          <div class="col-md-6">
          </div>
          <div class="col-md-3 text-right">
            {{-- <div class="form-group">
              <select class="form-control form-control-sm" id="filtro" name="filtro">
                <option value="0">Usuarios habilitados</option>
                <option value="1">Usuarios deshabilitados</option>
              </select>
            </div> --}}
          </div>
          <div class="col-md-3 text-left">
            @can('mant_usuarios-crear')
              <button class="btn btn-block btn-primary btn-sm pull-right" style="padding-right:10px;width:75px;" type="button" data-toggle="modal" data-target="#modal-añadir">
                <span><i class="fas fa-plus"></i></span>&nbsp;&nbsp;Añadir
              </button>
            @endcan
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" id="usuarios" name="usuarios">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->

    <div class="modal fade" id="modal-añadir" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Añadir usuario</h4>
          </div>
          <div class="modal-body">
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
                          <div class="col-md-4 text-center">
                              <div class="row" style="padding-bottom:10px;">
                                <div class="col-lg-12" id="avatar" name="avatar">
                                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" style="width:200px; height:200px; top:200px; left:200px;" alt="User Avatar">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" for="imagen">Seleccione una imagen</label>
                                    <p class="error_imagen text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="rol"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Rol</h5></label>
                                    <select class="form-control form-control-sm" required id="rol" name="rol">
                                      <option value="">Seleccione una opción</option>
                                      @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                                      @endforeach
                                    </select>
                                    <p class="error_rol text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="cedula"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Cédula</h5></label>
                                    <input type="number" class="form-control form-control-sm form-control-alternative" id="cedula" name="cedula" placeholder="Cédula">
                                    <p class="error_cedula text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nombre"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Nombre</h5></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre" name="nombre" placeholder="Nombre">
                                    <p class="error_nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="apellidos"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Apellidos</h5></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" id="apellidos" name="apellidos" placeholder="Apellidos">
                                    <p class="error_apellidos text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nacionalidad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;País de nacimiento</h5></label>
                                      <select name="nacionalidad" id="nacionalidad" class="form-control form-control-sm">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Panamá">Panamá</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Otro">Otro</option>
                                      </select>
                                      <p class="error_nacionalidad text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fecha_nacimiento"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Fecha de nacimiento</h5></label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control form-control-sm pull-right" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                                    </div>
                                    <p class="error_fecha_nacimiento text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="estado_civil"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Estado Civil</h5></label>
                                    <select class="form-control form-control-sm form-control-alternative" id="estado_civil" name="estado_civil">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                        <option value="Separado(a)">Separado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Unión Libre">Unión Libre</option>
                                    </select>
                                    <p class="error_estado_civil text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="nacionalidad"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <input name="sexo" class="minimal" id="masculino" value="Masculino" checked type="radio">
                                        <label class="custom-control-label" for="masculino">Masculino</label>
                                      </div>
                                      <div class="col-md-6">
                                        <input name="sexo" class="minimal" id="femenino" value="Femenino" type="radio">
                                        <label class="custom-control-label" for="femenino">Femenino</label>
                                      </div>
                                    </div>
                                    <p class="error_sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="telefono"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Telefono</h5></label>
                                    <input type="number" class="form-control form-control-sm form-control-alternative" id="telefono" name="telefono" placeholder="Telefono">
                                    <p class="error_telefono text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="direccion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Dirección</h5></label>
                                    <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Dirección"></textarea>
                                    <p class="error_direccion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel box box-warning">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          Credenciales
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Correo</h5></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control form-control-sm" placeholder="ejemplo@gmail.com" id="email" name="email">
                              </div>
                              <p class="error_email text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="codigo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Codigo</h5></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="codigo" class="form-control form-control-sm" placeholder="Codigo" id="codigo" name="codigo">
                              </div>
                              <p class="error_codigo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="codigo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Contraseña</h5></label>
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
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="codigo"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Confirmar contraseña</h5></label>
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

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="registrar" name="registrar">Añadir</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-detalle" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Detalle de usuario</h4>
          </div>
          <div class="modal-body">
            <div class="box-group" id="accordion">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne_detalle">
                          Información personal
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne_detalle" class="panel-collapse collapse in">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-4 text-center">
                              <div class="row" style="padding-bottom:10px;">
                                <div class="col-lg-12" id="avatar_detalle" name="avatar_detalle">
                                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" style="width:200px; height:200px; top:200px; left:200px;" alt="User Avatar">
                                </div>
                              </div>
                          </div>
                          <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="rol_detalle"><h5>Rol</h5></label>
                                    <select readonly class="form-control form-control-sm" required id="rol_detalle" name="rol_detalle">
                                      <option value="">Seleccione una opción</option>
                                      @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="cedula_detalle"><h5>Cédula</h5></label>
                                    <input readonly type="number" class="form-control form-control-sm form-control-alternative" id="cedula_detalle" name="cedula_detalle" placeholder="Cédula">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nombre_detalle"><h5>Nombre</h5></label>
                                    <input readonly type="text" class="form-control form-control-sm form-control-alternative" id="nombre_detalle" name="nombre_detalle" placeholder="Nombre">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="apellidos_detalle"><h5>Apellidos</h5></label>
                                    <input readonly type="text" class="form-control form-control-sm form-control-alternative" id="apellidos_detalle" name="apellidos_detalle" placeholder="Apellidos">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nacionalidad"><h5>País de nacimiento</h5></label>
                                      <select readonly name="nacionalidad_detalle" id="nacionalidad_detalle" class="form-control form-control-sm">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Panamá">Panamá</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Otro">Otro</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fecha_nacimiento_detalle"><h5>Fecha de nacimiento</h5></label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input readonly type="text" class="form-control form-control-sm pull-right" id="fecha_nacimiento_detalle" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="estado_civil_detalle"><h5>Estado Civil</h5></label>
                                    <select readonly class="form-control form-control-sm form-control-alternative" id="estado_civil_detalle" name="estado_civil_detalle">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                        <option value="Separado(a)">Separado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Unión Libre">Unión Libre</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="sexo_detalle"><h5>Sexo</h5></label>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <input name="sexo_detalle" class="minimal" id="masculino_detalle" value="Masculino" checked type="radio">
                                        <label disabled class="custom-control-label" for="masculino">Masculino</label>
                                      </div>
                                      <div class="col-md-6">
                                        <input disabled name="sexo_detalle" class="minimal" id="femenino_detalle" value="Femenino" type="radio">
                                        <label class="custom-control-label" for="femenino">Femenino</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="telefono_detalle"><h5>Telefono</h5></label>
                                    <input readonly type="number" class="form-control form-control-sm form-control-alternative" id="telefono_detalle" name="telefono_detalle" placeholder="Telefono">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="direccion_detalle"><h5></i>Dirección</h5></label>
                                    <textarea readonly class="form-control" id="direccion_detalle" name="direccion_detalle" rows="3" placeholder="Dirección"></textarea>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="panel box box-warning">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_detalle">
                          Credenciales
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo_detalle" class="panel-collapse collapse">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email_detalle"><h5>&nbsp;Correo</h5></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input readonly type="email" class="form-control form-control-sm" placeholder="ejemplo@gmail.com" id="email_detalle" name="email_detalle">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="codigo_detalle"><h5>&nbsp;Codigo</h5></label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input readonly type="text" class="form-control form-control-sm" placeholder="Codigo" id="codigo_detalle" name="codigo_detalle">
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-editar" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editar usuario</h4>
          </div>
          <div class="modal-body">
            <div class="box-group" id="accordion">
                  <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                  <div class="panel box box-primary">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne_editar">
                          Información personal
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne_editar" class="panel-collapse collapse in">
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-4 text-center">
                              <div class="row" style="padding-bottom:10px;">
                                <div class="col-lg-12" id="avatar_edicion" name="avatar_edicion">
                                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" style="width:200px; height:200px; top:200px; left:200px;" alt="User Avatar">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen_edicion" name="imagen_edicion" aria-describedby="inputGroupFileAddon01" accept="image/*">
                                    <label class="custom-file-label" for="imagen">Seleccione una imagen</label>
                                    <p class="error_imagen_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="rol_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Rol</h5></label>
                                    <select class="form-control form-control-sm" required id="rol_edicion" name="rol_edicion">
                                      <option value="">Seleccione una opción</option>
                                      @foreach ($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                                      @endforeach
                                    </select>
                                    <p class="error_rol text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="cedula_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Cédula</h5></label>
                                    <input type="number" class="form-control form-control-sm form-control-alternative" id="cedula_edicion" name="cedula_edicion" placeholder="Cédula">
                                    <p class="error_cedula_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nombre_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Nombre</h5></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre_edicion" name="nombre_edicion" placeholder="Nombre">
                                    <p class="error_nombre_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="apellidos_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Apellidos</h5></label>
                                    <input type="text" class="form-control form-control-sm form-control-alternative" id="apellidos_edicion" name="apellidos_edicion" placeholder="Apellidos">
                                    <p class="error_apellidos_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="nacionalidad_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;País de nacimiento</h5></label>
                                      <select name="nacionalidad_edicion" id="nacionalidad_edicion" class="form-control form-control-sm">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Panamá">Panamá</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Otro">Otro</option>
                                      </select>
                                      <p class="error_nacionalidad_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fecha_nacimiento_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Fecha de nacimiento</h5></label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control form-control-sm pull-right" id="fecha_nacimiento_edicion" name="fecha_nacimiento_edicion" placeholder="Fecha de nacimiento">
                                    </div>
                                    <p class="error_fecha_nacimiento_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="estado_civil_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Estado Civil</h5></label>
                                    <select class="form-control form-control-sm form-control-alternative" id="estado_civil_edicion" name="estado_civil_edicion">
                                        <option value="">Seleccione una opción</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                        <option value="Separado(a)">Separado(a)</option>
                                        <option value="Divorciado(a)">Divorciado(a)</option>
                                        <option value="Unión Libre">Unión Libre</option>
                                    </select>
                                    <p class="error_estado_civil_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">

                                  <div class="form-group">
                                    <label for="sexo_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Sexo</h5></label>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <input name="sexo_edicion" class="minimal" id="masculino_edicion" value="Masculino_edicion" checked type="radio">
                                        <label class="custom-control-label" for="masculino">Masculino</label>
                                      </div>
                                      <div class="col-md-6">
                                        <input name="sexo_edicion" class="minimal" id="femenino_edicion" value="Femenino" type="radio">
                                        <label class="custom-control-label" for="femenino">Femenino</label>
                                      </div>
                                    </div>
                                    <p class="error_sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="telefono_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Telefono</h5></label>
                                    <input type="number" class="form-control form-control-sm form-control-alternative" id="telefono_edicion" name="telefono_edicion" placeholder="Telefono">
                                    <p class="error_telefono text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="direccion_edicion"><h5><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;Dirección</h5></label>
                                    <textarea class="form-control" id="direccion_edicion" name="direccion_edicion" rows="3" placeholder="Dirección"></textarea>
                                    <p class="error_direccion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="editar" name="editar">Editar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

@endsection
@section('scripts')

  <!-- Dropzone.js and dataTables links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <!-- bootstrap datepicker -->
  <script src="{{ URL::to('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- iCheck 1.0.1 -->
  <script src="{{ URL::to('plugins/iCheck/icheck.min.js') }}"></script>

  <script type="text/javascript">

      //Date picker
      $('#fecha_nacimiento').datepicker({
        autoclose: true
      })

      //Date picker
      $('#fecha_nacimiento_edicion').datepicker({
        autoclose: true
      })

      //Date picker
      $('#fecha_nacimiento_detalle').datepicker({
        autoclose: true
      })
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

      $(document).ready(function(){
        $('#side_bar-mantenimientos').addClass('active');
        $('#side_bar_option-usuarios').addClass('active');
      })

      function filePreview_crear(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#avatar').html("<img src='"+e.target.result+"' class='img-circle' style='width:200px; height:200px; top:200px; left:200px;' alt='User Avatar'>");
          }
            reader.readAsDataURL(input.files[0]);
        }
      }

      function filePreview_editar(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#avatar_edicion').html("<img src='"+e.target.result+"' class='img-circle' style='width:200px; height:200px; top:200px; left:200px;' alt='User Avatar'>");
          }
            reader.readAsDataURL(input.files[0]);
        }
      }

      $('#imagen').change(function(){
        filePreview_crear(this);
      });

      $('#imagen_edicion').change(function(){
        filePreview_editar(this);
      });

      Dropzone.options.myAwesomeDropzone = {
        paramName: "Imagen",
        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
        addRemoveLinks: true,
        dictCancelUpload: "Cancelar",
        dictCancelUploadConfirmation: "Cancelado.",
        dictRemoveFile: "Eliminar",
        maxFilesize: 8
      };

      $(document).ready(function() {
        $('#usuarios').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax":"{{ url('api/usuarios') }}",
          "columns":
          [
            {data: 'usuario', orderable: false, searchable: false},
            {data: 'nombre'},
            {data: 'cedula'},
            {data: 'telefono'},
            {data: 'descripcionRol', orderable: false, searchable: false},
            {data: 'estado'},
            {data: 'btn', orderable: false, searchable: false}
          ],
          "language":{
            "info": "Mostrando total registros",
            "search": "Buscar",
            "paginate": {
                "next": "Siguiente",
              "previous": "Anterior",
            },
            "lengthMenu":
            'Mostrar <select>' +
            '<option value="10">10</option>' +
            '<option value="30">30</option>' +
            '<option value="-1">Todos</option>' +
            '</select> registros' ,
            "loadingRecords": "Cargando...",
            "processing": "Procesando..",
            "emptyTable": "No hay datos",
            "zeroRecords": "No hay coincidencias",
            "infoEmpty": "",
            "infoFiltered": "",
          }
        });

      } );

    //Añadir
    $('#registrar').click(function(){
      var form_data = new FormData();
      form_data.append('_token', $('input[name=_token]').val());
      if($('#imagen')[0].files[0]){
        form_data.append('imagen', $('#imagen')[0].files[0]);
      }
      form_data.append('rol', $('#rol').val());
      form_data.append('cedula', $('#cedula').val());
      form_data.append('nombre', $('#nombre').val());
      form_data.append('apellidos', $('#apellidos').val());
      form_data.append('nacionalidad', $('#nacionalidad').val());
      form_data.append('fecha_nacimiento', $('#fecha_nacimiento').val());
      form_data.append('estado_civil', $('#estado_civil').val());
      form_data.append('sexo', $('#sexo').val());
      form_data.append('telefono', $('#telefono').val());
      form_data.append('direccion', $('#direccion').val());
      form_data.append('email', $('#email').val());
      form_data.append('codigo', $('#codigo').val());
      form_data.append('password', $('#password').val());
      form_data.append('password_confirmation', $('#password-confirm').val());

      $.ajax({
        type: 'post',
        url: '{{route('usuarios.añadir')}}',
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
            if(data.errors.email){
              $('.error_email').removeClass('hidden');
              $('.error_email').text(data.errors.email);
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
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'El usuario se ha creado correctamente!',
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

    //Detalle
    $(document).on('click', '#detalle_usuario', function() {
      $('#rol_detalle').val($(this).data('rol'));
      var imagen = $(this).data('imagen');
      if(imagen){
        $('#avatar_detalle').html("<img src='" + $(this).data('imagen') + "' class='img-circle' style='width:200px; height:200px; top:200px; left:200px;' alt='User Avatar'>");
      }else{
        $('#avatar_detalle').html("<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='img-circle' style='width:200px; height:200px; top:200px; left:200px;' alt='User Avatar'>");
      }
      $('#cedula_detalle').val($(this).data('cedula'));
      $('#nombre_detalle').val($(this).data('nombre'));
      $('#apellidos_detalle').val($(this).data('apellidos'));
      $('#nacionalidad_detalle').val($(this).data('nacionalidad'));
      $('#fecha_nacimiento_detalle').val($(this).data('fecha_nacimiento'));
      $('#estado_civil_detalle').val($(this).data('estado_civil'));
      if($(this).data('sexo') == "Masculino"){
        $("#masculino_detalle").prop("checked", true);
      }else{
        $("#femenino_detalle").prop("checked", true);
      }
      $('#telefono_detalle').val($(this).data('telefono'));
      $('#direccion_detalle').val($(this).data('direccion'));
      $('#email_detalle').val($(this).data('email'));
      $('#codigo_detalle').val($(this).data('codigo'));

    });

    //Editar
    $(document).on('click', '#editar_usuario', function() {
      $('#id_edicion').val($(this).data('id'));
      $('#rol_edicion').val($(this).data('rol'));
      var imagen = $(this).data('imagen');
      if(imagen){
        $('#avatar_edicion').html("<img src='" + $(this).data('imagen') + "' class='img-circle' style='width:200px; height:200px; top:200px; left:200px;' alt='User Avatar'>");
      }else{
        $('#avatar_edicion').html("<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' class='img-circle' style='width:200px; height:200px; top:200px; left:200px;' alt='User Avatar'>");
      }
      $('#cedula_edicion').val($(this).data('cedula'));
      $('#cedula_edicion').val($(this).data('cedula'));
      $('#nombre_edicion').val($(this).data('nombre'));
      $('#apellidos_edicion').val($(this).data('apellidos'));
      $('#nacionalidad_edicion').val($(this).data('nacionalidad'));
      $('#fecha_nacimiento_edicion').val($(this).data('fecha_nacimiento'));
      $('#estado_civil_edicion').val($(this).data('estado_civil'));
      if($(this).data('sexo') == "Masculino"){
        $("#masculino_edicion").prop("checked", true);
      }else{
        $("#femenino_edicion").prop("checked", true);
      }
      $('#telefono_edicion').val($(this).data('telefono'));
      $('#direccion_edicion').val($(this).data('direccion'));
    });

    //Editar
    $('#editar').click(function(){
      var form_data = new FormData();
      form_data.append('_token', $('input[name=_token]').val());
      form_data.append('id_edicion', $('#id_edicion').val());
      if($('#imagen_edicion')[0].files[0]){
        form_data.append('imagen_edicion', $('#imagen_edicion')[0].files[0]);
      }
      form_data.append('rol_edicion', $('#rol_edicion').val());
      form_data.append('cedula_edicion', $('#cedula_edicion').val());
      form_data.append('nombre_edicion', $('#nombre_edicion').val());
      form_data.append('apellidos_edicion', $('#apellidos_edicion').val());
      form_data.append('nacionalidad_edicion', $('#nacionalidad_edicion').val());
      form_data.append('fecha_nacimiento_edicion', $('#fecha_nacimiento_edicion').val());
      form_data.append('estado_civil_edicion', $('#estado_civil_edicion').val());
      form_data.append('sexo_edicion', $('#sexo_edicion').val());
      form_data.append('telefono_edicion', $('#telefono_edicion').val());
      form_data.append('direccion_edicion', $('#direccion_edicion').val());

      $.ajax({
        type: 'post',
        url: '{{route('usuarios.editar')}}',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(data){
          if((data.errors)){
            Toast.fire({
              type: 'warning',
              title: 'Errores de validación!'
            })

            if(data.errors.rol_edicion){
              $('.error_rol_edicion').removeClass('hidden');
              $('.error_rol_edicion').text(data.errors.rol_edicion);
            }
            if(data.errors.cedula_edicion){
              $('.error_cedula_edicion').removeClass('hidden');
              $('.error_cedula_edicion').text(data.errors.cedula_edicion);
            }
            if(data.errors.nombre_edicion){
              $('.error_nombre_edicion').removeClass('hidden');
              $('.error_nombre_edicion').text(data.errors.nombre_edicion);
            }
            if(data.errors.apellidos_edicion){
              $('.error_apellido_edicions').removeClass('hidden');
              $('.error_apellidos_edicion').text(data.errors.apellidos_edicion);
            }
            if(data.errors.nacionalidad_edicion){
              $('.error_nacionalidad_edicion').removeClass('hidden');
              $('.error_nacionalidad_edicion').text(data.errors.nacionalidad_edicion);
            }
            if(data.errors.fecha_nacimiento_edicion){
              $('.error_fecha_nacimiento_edicion').removeClass('hidden');
              $('.error_fecha_nacimiento_edicion').text(data.errors.fecha_nacimiento_edicion);
            }
            if(data.errors.estado_civil_edicion){
              $('.error_estado_civil_edicion').removeClass('hidden');
              $('.error_estado_civil_edicion').text(data.errors.estado_civil_edicion);
            }
            if(data.errors.sexo_edicion){
              $('.error_sexo_edicion').removeClass('hidden');
              $('.error_sexo_edicion').text(data.errors.sexo_edicion);
            }
            if(data.errors.telefono_edicion){
              $('.error_telefono_edicion').removeClass('hidden');
              $('.error_telefono_edicion').text(data.errors.telefono_edicion);
            }
            if(data.errors.direccion_edicion){
              $('.error_direccion_edicion').removeClass('hidden');
              $('.error_direccion_edicion').text(data.errors.direccion_edicion);
            }
          }else{
            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: 'El usuario se ha editado correctamente!',
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

    //Habilitar
    $(document).on('click', '#habilitar_usuario', function() {
      var id = $(this).data('id');

      swal_confirm.fire({
        title: 'Estas seguro de habilitar esto?',
        text: "Podras deshabilitar esto después!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, habilitalo!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
							type: "POST",
							url: "{{route('usuarios.eliminar')}}",
							data: {
								'_token': $('input[name=_token]').val(),
								'id':id,
							},
							success: function (data) {
                swal_confirm.fire(
                  'Habilitado!',
                  'Los datos han sido habilitados.',
                  'success'
                ).then(function() {
                    location.reload();
                });
							}
					});
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swal_confirm.fire(
            'Cancelado',
            'Los datos del usuario estan seguros :)',
            'error'
          )
        }
      });
    });

    //Deshabilitar
    $(document).on('click', '#deshabilitar_usuario', function() {
      var id = $(this).data('id');

      swal_confirm.fire({
        title: 'Estas seguro de deshabilitar esto?',
        text: "Podras habilitar esto después!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, deshabilitalo!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
							type: "POST",
							url: "{{route('usuarios.eliminar')}}",
							data: {
								'_token': $('input[name=_token]').val(),
								'id':id,
							},
							success: function (data) {
                swal_confirm.fire(
                  'Deshabilitado!',
                  'Los datos han sido deshabilitados.',
                  'success'
                ).then(function() {
                    location.reload();
                });
							}
					});
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swal_confirm.fire(
            'Cancelado',
            'Los datos del usuario estan seguros :)',
            'error'
          )
        }
      });
    });

  </script>
@endsection
