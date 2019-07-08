<!DOCTYPE html>
<html lang="en">
<head>
	<title>AniVet-Soft | Ingreso</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{ URL::to('ingreso/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::to('ingreso/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ URL::to('img/brand/yugo.png') }}" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="{{route('login')}}" method="post">
					<span class="login100-form-title">
						Ingreso de usuarios
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Un email valido es requerido: ex@abc.xyz">
						<input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo" value="{{ old('email') }}" type="email" id="email" name="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
          @if ($errors->has('email'))
            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
              {{ $errors->first('email') }}
            </p>
          @endif
					<div class="wrap-input100 validate-input" data-validate = "La contraseña en requerida">
            <input class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" type="password" id="password" name="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
          @if ($errors->has('password'))
            <p class="alert alert-danger text-center" style="padding-top:4px; padding-bottom:4px; font-size:14px;">
              {{ $errors->first('password') }}
            </p>
          @endif
					<div class="container-login100-form-btn">
            @csrf
            <button type="submit" class="login100-form-btn">
							Ingresar
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							¿Olvidaste tu
						</span>
						<a class="txt2" href="#">
							contraseña?
						</a>
					</div>

					<div class="text-center p-t-90">
						<a class="txt2" href="{{route('register')}}">
							Crea tu cuenta.
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
	<script src="{{ URL::to('ingreso/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('ingreso/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ URL::to('ingreso/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('ingreso/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('ingreso/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ URL::to('ingreso/js/main.js') }}"></script>

</body>
</html>
