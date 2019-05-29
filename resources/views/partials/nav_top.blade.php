<!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Inicio</a>
      <!-- Form -->
      <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Buscar" type="text">
          </div>
        </div>
      </form>
      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                @if (empty(auth()->user()->imagen))
                  <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar rounded-circle" style="width:35px; height:35px; top:35px; left:35px;" alt="User Avatar">
                @else
                  <img class="user-avatar rounded-circle" src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" style="width:35px; height:35px; top:35px; left:35px;" alt="User Avatar">
                @endif
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold">
                  @if (auth()->user())
                    {{auth()->user()->nombre}} {{auth()->user()->apellidos}}</h6>
                  @else
                    Sin especificar
                  @endif
                </span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Bienvenido
                @if (auth()->user())
                  {{auth()->user()->nombre}} {{auth()->user()->apellidos}}</h6>
                @endif
                !
              </h6>
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
    </div>
  </nav>
