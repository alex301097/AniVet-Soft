@extends('layouts.master')
@section('contenido')
    <div class="row">
      <div class="col-md-12">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-mute ls-1 mb-1">Mantenimiento</h6>
                  <h2 class="text-black mb-0">Usuarios</h2>
                </div>
                {{-- <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Month</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Week</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div> --}}
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-7">
                    <h6 class="heading-small text-muted mb-4">Lista de Usuarios</h6>
                  </div>
                  <div class="col-md-3 text-right">
                    <div class="form-group">
                      <select class="form-control form-control-sm" id="filtro" name="filtro">
      									<option value="0">Usuarios habilitados</option>
      									<option value="1">Usuarios deshabilitados</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 text-left">
                    <button class="btn btn-icon btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modal-añadir">
                    	<span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Añadir</span>
                    </button>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark" id="usuarios" name="usuarios">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Usuario</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="lista-usuarios" name="lista-usuarios">
                            @foreach ($usuarios as $usuario)
                              <tr id="usuario_{{$usuario->id}}" name="usuario_{{$usuario->id}}">
                                  <th scope="row">
                                      <div class="media align-items-center">
                                          <a href="#" class="avatar rounded-circle mr-3">
                                            @if (empty($usuario->imagen))
                                              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="User Avatar">
                                            @else
                                              <img src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" lt="User Avatar">
                                            @endif
                                          </a>
                                          <div class="media-body">
                                              <span class="mb-0 text-sm">{{$usuario->nombre}} {{$usuario->apellidos}}</span>
                                          </div>
                                      </div>
                                  </th>
                                  <td>
                                      {{$usuario->cedula}}
                                  </td>
                                  <td>
                                      {{$usuario->telefono}}
                                  </td>
                                  <td>
                                      {{$usuario->descripcionRol}}
                                  </td>
                                  <td>
                                      <span class="badge badge-dot mr-4">
                                        @if ($usuario->deleted_at != null)
                                          <i class="bg-danger"></i> Inactivo
                                        @else
                                          <i class="bg-success"></i> Activo
                                        @endif
                                      </span>
                                  </td>
                                  <td class="text-right">
                                      <div class="dropdown">
                                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                              <a class="dropdown-item" href="#" id="detalle_usuario" name="detalle_usuario"
                                              data-toggle="modal" data-target="#modal-detalle"
                                              data-id="{{$usuario->id}}" data-rol="{{$usuario->rol_id}}" data-cedula="{{$usuario->cedula}}"
                                              data-nombre="{{$usuario->nombre}}" data-apellidos="{{$usuario->apellidos}}" data-nacionalidad="{{$usuario->nacionalidad}}"
                                              data-fecha_nacimiento="{{$usuario->fecha_nacimiento}}" data-estado_civil="{{$usuario->estado_civil}}" data-sexo="{{$usuario->sexo}}"
                                              data-telefono="{{$usuario->telefono}}" data-direccion="{{$usuario->direccion}}" data-email="{{$usuario->email}}"
                                              data-codigo="{{$usuario->codigo}}">
                                                <span><i class="ni ni-glasses-2"></i></span>
                                                &nbsp;&nbsp;Detalle
                                              </a>
                                              <a class="dropdown-item" href="#" id="editar_usuario" name="editar_usuario"
                                              data-toggle="modal" data-target="#modal-editar"
                                              data-id="{{$usuario->id}}" data-rol="{{$usuario->rol_id}}" data-cedula="{{$usuario->cedula}}"
                                              data-nombre="{{$usuario->nombre}}" data-apellidos="{{$usuario->apellidos}}" data-nacionalidad="{{$usuario->nacionalidad}}"
                                              data-fecha_nacimiento="{{$usuario->fecha_nacimiento}}" data-estado_civil="{{$usuario->estado_civil}}" data-sexo="{{$usuario->sexo}}"
                                              data-telefono="{{$usuario->telefono}}" data-direccion="{{$usuario->direccion}}" data-email="{{$usuario->email}}"
                                              data-codigo="{{$usuario->codigo}}">
                                                <span><i class="ni ni-ruler-pencil"></i></span>
                                                &nbsp;&nbsp;Editar
                                              </a>
                                              <a class="dropdown-item" href="#" id="deshabilitar_usuario" name="deshabilitar_usuario"
                                              data-id="{{$usuario->id}}">
                                                <span><i class="ni ni-fat-remove"></i></span>
                                                &nbsp;&nbsp;Deshabilitar
                                              </a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class='row'>
        								<div class="col-md-12">
        									{{$usuarios->links()}}
        								</div>
        								<hr>
        							</div>

                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-añadir" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title-default">Añadir usuario</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md">
                        <h6 class="heading-small text-muted mb-4">Información personal</h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-1">

                      </div>
                      <div class="col-md-2 text-center">
                          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" id="avatar" name="avatar" class="avatar rounded-circle" style="width:35px; height:35px; top:35px; left:35px;"alt="User Avatar">
                          <label for="avatar"><h5>Imagen</h5></label>
                      </div>
                      <div class="col-md-8">
                        <input type="file" class="custom-file-input" id="imagen" name="imagen" aria-describedby="inputGroupFileAddon01" accept="image/*">
                        <label class="custom-file-label" for="imagen">Seleccione una imagen</label>
                      </div>
                      <div class="col-md-1">

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="rol"><h5>Rol</h5></label>
                          <select class="form-control form-control-sm" id="rol" name="rol">
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
                          <label for="cedula"><h5>Cédula</h5></label>
                          <input type="text" class="form-control form-control-sm form-control-alternative" id="cedula" name="cedula" placeholder="Cédula">
                          <p class="error_cedula text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nombre"><h5>Nombre</h5></label>
                          <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre" name="nombre" placeholder="Nombre">
                          <p class="error_nombre text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="apellidos"><h5>Apellidos</h5></label>
                          <input type="text" class="form-control form-control-sm form-control-alternative" id="apellidos" name="apellidos" placeholder="Apellidos">
                          <p class="error_apellidos text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="nacionalidad"><h5>País de nacimiento</h5></label>
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
                          <label for="fecha_nacimiento"><h5>Fecha de nacimiento</h5></label>
                            <div class="input-group">
                                <input type="date" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                            </div>
                            <p class="error_fecha_nacimiento text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="estado_civil"><h5>Estado Civil</h5></label>
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
                          <label for="nacionalidad"><h5>Sexo</h5></label>
                          <div class="custom-control custom-radio mb-3">
                            <input name="sexo" class="custom-control-input" id="masculino" value="Masculino" checked type="radio">
                            <label class="custom-control-label" for="masculino">Masculino</label>
                          </div>
                          <div class="custom-control custom-radio mb-3">
                            <input name="sexo" class="custom-control-input" id="femenino" value="Femenino" type="radio">
                            <label class="custom-control-label" for="femenino">Femenino</label>
                          </div>
                          <p class="error_sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="telefono"><h5>Telefono</h5></label>
                          <input type="text" class="form-control form-control-sm form-control-alternative" id="telefono" name="telefono" placeholder="Telefono">
                          <p class="error_telefono text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="direccion"><h5>Dirección</h5></label>
                          <textarea class="form-control" id="direccion" name="direccion" rows="3" placeholder="Dirección"></textarea>
                          <p class="error_direccion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md">
                        <h6 class="heading-small text-muted mb-4">Credenciales</h6>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control form-control-sm form-control-alternative" placeholder="name@example.com" type="email" id="email" name="email">
                            <p class="error_email text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                            </div>
                            <input class="form-control form-control-sm form-control-alternative" placeholder="Codigo" type="text" id="codigo" name="codigo">
                            <p class="error_codigo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                            </div>
                            <input class="form-control form-control-sm form-control-alternative" placeholder="Contraseña" type="password" id="password" name="password">
                            <p class="error_password text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="input-group input-group-alternative mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                            </div>
                            <input class="form-control form-control-sm form-control-alternative" placeholder="Confirmar contraseña" type="password" name="password_confirmation" id="password-confirm">
                            <p class="error_password_confirmation text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="registrar" name="registrar">Añadir</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-detalle" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">

              <div class="modal-header">
                  <h2 class="modal-title" id="modal-title-default">Detalle del usuario</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-md">
                    <h6 class="heading-small text-muted mb-4">Información personal</h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="rol_detalle"><h5>Rol</h5></label>
                      <select class="form-control form-control-sm" readonly id="rol_detalle" name="rol_detalle">
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
                      <input type="text" class="form-control form-control-sm form-control-alternative" readonly id="cedula_detalle" name="cedula_detalle" placeholder="Cédula">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_detalle"><h5>Nombre</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" readonly id="nombre_detalle" name="nombre_detalle" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="apellidos_detalle"><h5>Apellidos</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" readonly id="apellidos_detalle" name="apellidos_detalle" placeholder="Apellidos">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nacionalidad_detalle"><h5>País de nacimiento</h5></label>
                        <select name="nacionalidad_detalle" id="nacionalidad_detalle" readonly class="form-control form-control-sm">
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
                        <div class="input-group">
                            <input type="date" class="form-control form-control-sm" readonly id="fecha_nacimiento_detalle" name="fecha_nacimiento_detalle" placeholder="Fecha de nacimiento">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="estado_civil"><h5>Estado Civil</h5></label>
                      <select class="form-control form-control-sm form-control-alternative" readonly id="estado_civil_detalle" name="estado_civil_detalle">
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
                      <div class="custom-control custom-radio mb-3">
                        <input name="sexo_detalle" class="custom-control-input" id="masculino_detalle" disabled value="Masculino" type="radio">
                        <label class="custom-control-label" for="masculino_detalle">Masculino</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input name="sexo_detalle" class="custom-control-input" id="femenino_detalle" disabled value="Femenino" type="radio">
                        <label class="custom-control-label" for="femenino_detalle">Femenino</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="telefono_detalle"><h5>Telefono</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" readonly id="telefono_detalle" name="telefono_detalle" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="direccion_detalle"><h5>Dirección</h5></label>
                      <textarea class="form-control" id="direccion_detalle" name="direccion_detalle" readonly rows="3" placeholder="Dirección"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md">
                    <h6 class="heading-small text-muted mb-4">Credenciales</h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                        </div>
                        <input class="form-control form-control-sm form-control-alternative" readonly placeholder="name@example.com" type="email" id="email_detalle" name="email_detalle">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                        </div>
                        <input class="form-control form-control-sm form-control-alternative" readonly placeholder="Codigo" type="text" id="codigo_detalle" name="codigo_detalle">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cerrar</button>
              </div>
          </div>
      </div>
    </div>

    <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">

              <div class="modal-header">
                  <h2 class="modal-title" id="modal-title-default">Editar usuario</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-md">
                    <h6 class="heading-small text-muted mb-4">Información personal</h6>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="rol_edicion"><h5>Rol</h5></label>
                      <select class="form-control form-control-sm" id="rol_edicion" name="rol_edicion">
                        <option value="">Seleccione una opción</option>
                        @foreach ($roles as $rol)
                          <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                        @endforeach
                      </select>
                      <p class="error_rol_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cedula_edicion"><h5>Cédula</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="cedula_edicion" name="cedula_edicion" placeholder="Cédula">
                      <p class="error_cedula_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nombre_edicion"><h5>Nombre</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="nombre_edicion" name="nombre_edicion" placeholder="Nombre">
                      <p class="error_nombre_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="apellidos_edicion"><h5>Apellidos</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="apellidos_edicion" name="apellidos_edicion" placeholder="Apellidos">
                      <p class="error_apellidos_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nacionalidad_edicion"><h5>País de nacimiento</h5></label>
                        <select name="nacionalidad_edicion" id="nacionalidad_edicion" class="form-control form-control-sm">
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
                      <label for="fecha_nacimiento_edicion"><h5>Fecha de nacimiento</h5></label>
                        <div class="input-group">
                            <input type="date" class="form-control form-control-sm" id="fecha_nacimiento_edicion" name="fecha_nacimiento_edicion" placeholder="Fecha de nacimiento">
                        </div>
                        <p class="error_fecha_nacimiento_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="estado_civil_edicion"><h5>Estado Civil</h5></label>
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
                      <label for="sexo_edicion"><h5>Sexo</h5></label>
                      <div class="custom-control custom-radio mb-3">
                        <input name="sexo_edicion" class="custom-control-input" id="masculino_edicion" value="Masculino" type="radio">
                        <label class="custom-control-label" for="masculino_edicion">Masculino</label>
                      </div>
                      <div class="custom-control custom-radio mb-3">
                        <input name="sexo_edicion" class="custom-control-input" id="femenino_edicion" value="Femenino" type="radio">
                        <label class="custom-control-label" for="femenino_edicion">Femenino</label>
                      </div>
                      <p class="error_sexo text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="telefono_edicion"><h5>Telefono</h5></label>
                      <input type="text" class="form-control form-control-sm form-control-alternative" id="telefono_edicion" name="telefono_edicion" placeholder="Telefono">
                      <p class="error_telefono_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="direccion_edicion"><h5>Dirección</h5></label>
                      <textarea class="form-control" id="direccion_edicion" name="direccion_edicion" rows="3" placeholder="Dirección"></textarea>
                      <p class="error_direccion_edicion text-center alert alert-danger hidden" style="padding-top:4px; padding-bottom:4px; font-size:14px;"></p>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="id_edicion" id="id_edicion" value="">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="editar" name="editar">Editar</button>
                  <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Cerrar</button>
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

    //filtro
    $('#filtro').change(function(){
      var urlFiltro = "{{route('filtro.usuarios', ['filtro'=>':estado'])}}";
      urlFiltro = urlFiltro.replace(':estado', this.value);
      $.ajax({
      type: 'post',
      url: urlFiltro,
      data: {
        '_token': $('input[name=_token]').val(),
        'filtro': this.value
      },
      success: function(data) {
        $('#lista-usuarios').empty();
        $.each(data['data'], function(index, value){

          if(value.deleted_at != null){
  					icono = "<i class='bg-danger'></i> Inactivo";
  					acciones = "<a class='dropdown-item' href='#' id='detalle_usuario' name='detalle_usuario'" +
                "data-toggle='modal' data-target='#modal-detalle'" +
                "data-id='" + value.id + "' data-rol='" + value.rol_id + "' data-cedula='" + value.cedula + "'" +
                "data-nombre='" + value.nombre + "' data-apellidos='" + value.apellidos + "' data-nacionalidad='" + value.nacionalidad + "'" +
                "data-fecha_nacimiento='" + value.fecha_nacimiento + "' data-estado_civil='" + value.estado_civil + "' data-sexo='" + value.sexo + "'" +
                "data-telefono='" + value.telefono + "' data-direccion='" + value.direccion + "' data-email='" + value.email + "'" +
                "data-codigo='" + value.codigo + "'>" +
                  "<span><i class='ni ni-glasses-2'></i></span>" +
                  "&nbsp;&nbsp;Detalle" +
                "</a>" +
                "<a class='dropdown-item' href='#' id='editar_usuario' name='editar_usuario'" +
                "data-toggle='modal' data-target='#modal-editar'" +
                "data-id='" + value.id + "' data-rol='" + value.rol_id + "' data-cedula='" + value.cedula + "'" +
                "data-nombre='" + value.nombre + "' data-apellidos='" + value.apellidos + "' data-nacionalidad='" + value.nacionalidad + "'" +
                "data-fecha_nacimiento='" + value.fecha_nacimiento + "' data-estado_civil='" + value.estado_civil + "' data-sexo='" + value.sexo + "'" +
                "data-telefono='" + value.telefono + "' data-direccion='" + value.direccion + "' data-email='" + value.email + "'" +
                "data-codigo='" + value.codigo + "'>" +
                  "<span><i class='ni ni-ruler-pencil'></i></span>" +
                  "&nbsp;&nbsp;Editar" +
                "</a>" +
                "<a class='dropdown-item' href='#' id='habilitar_usuario' name='habilitar_usuario'" +
                "data-id='" + value.id + "'>" +
                  "<span><i class='ni ni-fat-remove'></i></span>" +
                  "&nbsp;&nbsp;Habilitar" +
                "</a>";
  				}else{
            icono = "<i class='bg-success'></i> Activo";
  					acciones = "<a class='dropdown-item' href='#' id='detalle_usuario' name='detalle_usuario'" +
                "data-toggle='modal' data-target='#modal-detalle'" +
                "data-id='" + value.id + "' data-rol='" + value.rol_id + "' data-cedula='" + value.cedula + "'" +
                "data-nombre='" + value.nombre + "' data-apellidos='" + value.apellidos + "' data-nacionalidad='" + value.nacionalidad + "'" +
                "data-fecha_nacimiento='" + value.fecha_nacimiento + "' data-estado_civil='" + value.estado_civil + "' data-sexo='" + value.sexo + "'" +
                "data-telefono='" + value.telefono + "' data-direccion='" + value.direccion + "' data-email='" + value.email + "'" +
                "data-codigo='" + value.codigo + "'>" +
                  "<span><i class='ni ni-glasses-2'></i></span>" +
                  "&nbsp;&nbsp;Detalle" +
                "</a>" +
                "<a class='dropdown-item' href='#' id='editar_usuario' name='editar_usuario'" +
                "data-toggle='modal' data-target='#modal-editar'" +
                "data-id='" + value.id + "' data-rol='" + value.id + "' data-cedula='" + value.id + "'" +
                "data-nombre='" + value.id + "' data-apellidos='" + value.id + "' data-nacionalidad='" + value.id + "'" +
                "data-fecha_nacimiento='" + value.id + "' data-estado_civil='" + value.id + "' data-sexo='" + value.id + "'" +
                "data-telefono='" + value.id + "' data-direccion='" + value.id + "' data-email='" + value.id + "'" +
                "data-codigo='" + value.id + "'>" +
                  "<span><i class='ni ni-ruler-pencil'></i></span>" +
                  "&nbsp;&nbsp;Editar" +
                "</a>" +
                "<a class='dropdown-item' href='#' id='deshabilitar_usuario' name='deshabilitar_usuario'" +
                "data-id='" + value.id + "'>" +
                  "<span><i class='ni ni-fat-remove'></i></span>" +
                  "&nbsp;&nbsp;Deshabilitar" +
                "</a>";
  				}

          if (value.imagen == null){
            imagen = "<img src='http://ssl.gstatic.com/accounts/ui/avatar_2x.png' alt='User Avatar'>";
          }else{
            var imagen = "<img src='{{ url('imgPerfiles/:url') }}' alt='User Avatar'>";
            imagen = urlFiltro.replace(':url', {{auth()->user()->imagen}});
          }

          $('#lista-usuarios').append("<tr id='" + "usuario_" + value.id + "' name='" + "usuario_" + value.id + "'>" +
              "<th scope='row'>" +
                  "<div class='media align-items-center'>" +
                      "<a href='#' class='avatar rounded-circle mr-3'>" +
                        imagen +
                      "</a>" +
                      "<div class='media-body'>" +
                          "<span class='mb-0 text-sm'>" + value.nombre + " " + value.apellidos + "</span>" +
                      "</div>" +
                  "</div>" +
              "</th>" +
              "<td>" +
                  value.cedula +
              "</td>" +
              "<td>" +
                  value.telefono +
              "</td>" +
              "<td>" +
                  value.descripcionRol +
              "</td>" +
              "<td>" +
                  "<span class='badge badge-dot mr-4'>" +
                    icono +
                  "</span>" +
              "</td>" +
              "<td class='text-right'>" +
                  "<div class='dropdown'>" +
                      "<a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                        "<i class='fas fa-ellipsis-v'></i>" +
                      "</a>" +
                      "<div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>" +
                        acciones +
                      "</div>" +
                  "</div>" +
              "</td>" +
          "</tr>");
          });
        }
      });
    });

    //Añadir
    $('#registrar').click(function(){

      $.ajax({
        type: 'post',
        url: '{{route('usuarios.añadir')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'rol': $('#rol').val(),
          'cedula': $('#cedula').val(),
          'nombre': $('#nombre').val(),
          'apellidos': $('#apellidos').val(),
          'nacionalidad': $('#nacionalidad').val(),
          'fecha_nacimiento': $('#fecha_nacimiento').val(),
          'estado_civil': $('#estado_civil').val(),
          'sexo': $('input[name="sexo"]:checked').val(),
          'telefono': $('#telefono').val(),
          'direccion': $('#direccion').val(),
          'email': $('#email').val(),
          'codigo': $('#codigo').val(),
          'password': $('#password').val(),
          'password_confirmation': $('#password-confirm').val()
        },
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

    $('#editar').click(function(){

      $.ajax({
        type: 'post',
        url: '{{route('usuarios.editar')}}',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_edicion': $('#id_edicion').val(),
          'rol_edicion': $('#rol_edicion').val(),
          'cedula_edicion': $('#cedula_edicion').val(),
          'nombre_edicion': $('#nombre_edicion').val(),
          'apellidos_edicion': $('#apellidos_edicion').val(),
          'nacionalidad_edicion': $('#nacionalidad_edicion').val(),
          'fecha_nacimiento_edicion': $('#fecha_nacimiento_edicion').val(),
          'estado_civil_edicion': $('#estado_civil_edicion').val(),
          'sexo_edicion': $('input[name="sexo_edicion"]:checked').val(),
          'telefono_edicion': $('#telefono_edicion').val(),
          'direccion_edicion': $('#direccion_edicion').val(),
        },
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
              $('.error_apellidos_edicion').removeClass('hidden');
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
