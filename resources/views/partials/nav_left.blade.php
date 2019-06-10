<!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{route('home')}}">
        <img src="{{ URL::to('img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Acción</a>
            <a class="dropdown-item" href="#">Otra acción</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Alguna otra acción</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                @if (empty(auth()->user()->imagen))
                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle" style="width:35px; height:35px; top:35px; left:35px;"alt="User Avatar">
                @else
                  <img class="user-avatar rounded-circle" src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" style="width:35px; height:35px; top:35px; left:35px;"alt="User Avatar">
                @endif
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenido
                @if (auth()->user())
                  {{auth()->user()->nombre}} {{auth()->user()->apellidos}}</h6>
                @endif
                !
            </div>
            <a href="#" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>Mi perfil</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Configuración</span>
            </a>
            <a href="#" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Soporte</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Cerrar sesión</span>
            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{route('home')}}">
                <img src="{{ URL::to('img/brand/blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Buscar" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
              <i class="ni ni-tv-2 text-primary"></i> Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('adopciones')}}">
              <i class="ni ni-single-02 text-yellow"></i> Adopción de Mascotas
            </a>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
              <i class="ni ni-key-25 text-info"></i> Citas medicas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
              <i class="ni ni-key-25 text-info"></i> Expediente medico
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Mantenimientos</h6>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios')}}">
              <i class="ni ni-planet text-blue"></i> Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tipos_animales')}}">
              <i class="ni ni-pin-3 text-orange"></i> Tipos de animales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('animales')}}">
              <i class="ni ni-bullet-list-67 text-red"></i> Animales en venta/adopción
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tipos_servicios')}}">
              <i class="ni ni-single-02 text-yellow"></i> Servicios
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Soporte</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-spaceship"></i> Información General
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-palette"></i> Acerca de..
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-ui-04"></i> Nosotros
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
