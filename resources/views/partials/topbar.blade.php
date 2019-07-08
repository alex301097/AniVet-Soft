<header class="main-header">
  <!-- Logo -->
  <a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>AV</b>S</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>AniVet</b>Soft</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          @if (empty(auth()->user()->imagen))
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="user-image" alt="User Image">
          @else
            <img src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" class="user-image" alt="User Image">
             {{-- style="width:35px; height:35px; top:35px; left:35px;" --}}
          @endif
          <span class="hidden-xs">
            @if (auth()->user())
              {{auth()->user()->nombre." ".auth()->user()->apellidos}}
            @else
              Usuario invitado
            @endif
          </span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            @if (empty(auth()->user()->imagen))
              <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" alt="User Image">
            @else
              <img src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" class="img-circle" alt="User Avatar">
            @endif

            <p>
              @if (auth()->user())
                {{auth()->user()->nombre." ".auth()->user()->apellidos." - ".auth()->user()->rol->descripcion}}
                <small>Creado el {{date("l, d M Y", strtotime(auth()->user()->created_at))}}.</small>
              @else
                Usuario invitado
                <small>No has ingresado al sistema</small>
              @endif
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{route('usuarios.get_editar_perfil',auth()->user()->id)}}" class="btn btn-default btn-flat">Perfil</a>
            </div>
            <div class="pull-right">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="btn btn-default btn-flat">Cerrar sesión</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
</header>
