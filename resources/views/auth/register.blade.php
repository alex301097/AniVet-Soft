@extends('layouts.master_invite')
@section('contenido')
  <!-- Table -->
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header">
              </div>
              <div class="card-body px-lg-4 py-lg-4">
                <div class="text-center text-muted mb-4">
                  <small>Registrese con tus credenciales</small>
                </div>
                <form role="form" method="POST" action="{{ route('register') }}">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="codigo"><h5>Nombre de usuario</h5></label>
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control form-control-sm form-control-alternative {{ $errors->has('codigo') ? ' is-invalid' : '' }}" value="{{ old('codigo') }}"  autofocus placeholder="Nombre de usuario" type="text" id="codigo" name="codigo">
                          @if ($errors->has('codigo'))
                            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('codigo') }}
                            </p>
                          @endif
                          {{-- <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span> --}}

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cedula"><h5>Cédula</h5></label>
                        <input type="text" class="form-control form-control-sm form-control-alternative {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}"  id="cedula" name="cedula" placeholder="Cédula">
                        @if ($errors->has('cedula'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('cedula') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nombre"><h5>Nombre</h5></label>
                        <input type="text" class="form-control form-control-sm form-control-alternative {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}"  id="nombre" name="nombre" placeholder="Nombre">
                        @if ($errors->has('nombre'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('nombre') }}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="apellidos"><h5>Apellidos</h5></label>
                        <input type="text" class="form-control form-control-sm form-control-alternative {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{ old('apellidos') }}"  id="apellidos" name="apellidos" placeholder="Apellidos">
                        @if ($errors->has('apellidos'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('apellidos') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nacionalidad"><h5>País de nacimiento</h5></label>
                          <select name="nacionalidad" id="nacionalidad" class="form-control form-control-sm {{ $errors->has('nacionalidad') ? ' is-invalid' : '' }}" value="{{ old('nacionalidad') }}" >
                            <option value="">Seleccione una opción</option>
                            <option value="Costa Rica" {{(old('nacionalidad') == "Costa Rica")?'selected':'' }}>Costa Rica</option>
                            <option value="Panamá" {{(old('nacionalidad') == "Panamá")?'selected':'' }}>Panamá</option>
                            <option value="Nicaragua" {{(old('nacionalidad') == "Nicaragua")?'selected':'' }}>Nicaragua</option>
                            <option value="Guatemala" {{(old('nacionalidad') == "Guatemala")?'selected':'' }}>Guatemala</option>
                            <option value="Honduras" {{(old('nacionalidad') == "Honduras")?'selected':'' }}>Honduras</option>
                            <option value="Otro" {{(old('nacionalidad') == "Otro")?'selected':'' }}>Otro</option>
                          </select>
                          @if ($errors->has('nacionalidad'))
                            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('nacionalidad') }}
                            </p>
                          @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="fecha_nacimiento"><h5>Fecha de nacimiento</h5></label>
                          <div class="input-group">
                              <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" value="{{ old('fecha_nacimiento') }}"  id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento">
                          </div>
                          @if ($errors->has('fecha_nacimiento'))
                            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('fecha_nacimiento') }}
                            </p>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="estado_civil"><h5>Estado Civil</h5></label>
                        <select class="form-control form-control-sm form-control-alternative {{ $errors->has('estado_civil') ? ' is-invalid' : '' }}" value="{{ old('estado_civil') }}"  id="estado_civil" name="estado_civil">
                            <option value="">Seleccione una opción</option>
                            <option value="Soltero(a)" {{(old('estado_civil') == "Soltero(a)")?'selected':'' }}>Soltero(a)</option>
                            <option value="Casado(a)" {{(old('estado_civil') == "Casado(a)")?'selected':'' }}>Casado(a)</option>
                            <option value="Viudo(a)" {{(old('estado_civil') == "Viudo(a)")?'selected':'' }}>Viudo(a)</option>
                            <option value="Separado(a)" {{(old('estado_civil') == "Separado(a)")?'selected':'' }}>Separado(a)</option>
                            <option value="Divorciado(a)" {{(old('estado_civil') == "Divorciado(a)")?'selected':'' }}>Divorciado(a)</option>
                            <option value="Unión Libre" {{(old('estado_civil') == "Unión Libre")?'selected':'' }}>Unión Libre</option>
                        </select>
                        @if ($errors->has('estado_civil'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('estado_civil') }}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="sexo"><h5>Sexo</h5></label>
                        <select class="form-control form-control-sm form-control-alternative {{ $errors->has('sexo') ? ' is-invalid' : '' }}" value="{{ old('sexo') }}"  id="sexo" name="sexo">
                            <option value="">Seleccione una opción</option>
                            <option value="Masculino" {{(old('sexo') == "Masculino")?'selected':'' }}>Masculino</option>
                            <option value="Femenino" {{(old('sexo') == "Femenino")?'selected':'' }}>Femenino</option>
                            <option value="Otro" {{(old('sexo') == "Otro")?'selected':'' }}>Otro</option>
                        </select>
                        @if ($errors->has('sexo'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('sexo') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="telefono"><h5>Telefono</h5></label>
                        <input type="text" class="form-control form-control-sm form-control-alternative {{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') }}"  id="telefono" name="telefono" placeholder="Telefono">
                        @if ($errors->has('telefono'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('telefono') }}
                          </p>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="direccion"><h5>Dirección</h5></label>
                        <textarea class="form-control {{ $errors->has('dirrecion') ? ' is-invalid' : '' }}"   id="direccion" name="direccion" rows="3" placeholder="Dirección">{{ old('dirrecion') }}</textarea>
                        @if ($errors->has('direccion'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('direccion') }}
                          </p>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md">
                      <h6 class="heading-small text-muted mb-4">Credenciales</h6>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                          </div>
                          <input class="form-control form-control-sm form-control-alternative {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"  placeholder="name@example.com" type="email" id="email" name="email">
                          @if ($errors->has('email'))
                            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('email') }}
                            </p>
                          @endif
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
                          <input class="form-control form-control-sm form-control-alternative {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" type="password" id="password" name="password">
                          @if ($errors->has('password'))
                            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('password') }}
                            </p>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-group input-group-alternative mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                          </div>
                          <input class="form-control form-control-sm form-control-alternative {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"   placeholder="Confirmar contraseña" type="password" name="password_confirmation" id="password-confirm">
                          @if ($errors->has('password_confirmation'))
                            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                              {{ $errors->first('password_confirmation') }}
                            </p>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row my-4">
                    <div class="col-12">
                      <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="politicas" name="politicas" type="checkbox">
                        <label class="custom-control-label" for="politicas">
                          <span class="text-muted">Estoy de acuerdo con las <a href="#!">Politicas de privacidad</a></span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-4">Crear usuario</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection
