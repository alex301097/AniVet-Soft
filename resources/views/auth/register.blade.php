<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AniVet-Soft | Registro</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ URL::to('registro/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ URL::to('registro/css/style.css') }}">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1364e00aa3.js"></script>

</head>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form" action="{{route('register')}}">
                        <h2 class="form-title">Crear cuenta</h2>
                        <div class="form-group">
                            <input type="text" class="form-input {{ $errors->has('cedula') ? ' is-invalid' : '' }}" value="{{ old('cedula') }}"  placeholder="Cedula" type="text" id="cedula" name="cedula"/>
                        </div>
                        @if ($errors->has('cedula'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('cedula') }}
                          </p>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-input {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}"  placeholder="Nombre" type="text" id="nombre" name="nombre"/>
                        </div>
                        @if ($errors->has('nombre'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('nombre') }}
                          </p>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-input {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" value="{{ old('apellidos') }}"  placeholder="Apellidos" type="text" id="apellidos" name="apellidos"/>
                        </div>
                        @if ($errors->has('apellidos'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('apellidos') }}
                          </p>
                        @endif
                        <div class="form-group">
                            <input type="email" class="form-input {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}"  placeholder="Correo" type="email" id="email" name="email"/>
                        </div>
                        @if ($errors->has('email'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('email') }}
                          </p>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-input {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" type="password" id="password" name="password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                            <small for="password" id="passwordHelpBlock" class="form-text text-muted">
                              <label for=""><i style="color:red;" class="fas fa-asterisk"></i>&nbsp;</label>
                              Tu contraseña debe tener al menos una mayúscula, una minúscula, un carácter, un número, 10 dígitos como mínimo y 50 dígitos como máximo.
                            </small>
                        </div>
                        @if ($errors->has('password'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('password') }}
                          </p>
                        @endif
                        <div class="form-group">
                            <input type="password" class="form-input {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"   placeholder="Confirmar contraseña" type="password" name="password_confirmation" id="password-confirm"/>
                        </div>
                        @if ($errors->has('password_confirmation'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            {{ $errors->first('password_confirmation') }}
                          </p>
                        @endif
                        <div class="form-group">
                            <input id="politicas" name="politicas" type="checkbox" class="agree-term" />
                            <label for="politicas" class="label-agree-term"><span></span>Estoy de acuerdo con todos los <a href="#" class="term-service">Terminos de servicio</a></label>
                        </div>
                        @if ($errors->has('politicas'))
                          <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
                            Las {{ $errors->first('politicas') }}
                          </p>
                        @endif
                        <div class="form-group">
                          @csrf
                          <input type="submit" name="submit" id="submit" class="form-submit" value="Registrar"/>
                        </div>
                    </form>
                    <p class="loginhere">
                        ¿Ya tienes una cuenta? <a href="{{route('login')}}" class="loginhere-link">Ingresa Aqui.</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ URL::to('registro/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('registro/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
