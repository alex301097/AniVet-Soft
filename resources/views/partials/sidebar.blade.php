<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          @if (empty(auth()->user()->imagen))
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" alt="User Image">
          @else
            <img src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" class="img-circle" alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          @if (auth()->user())
            <p>{{auth()->user()->nombre}} {{auth()->user()->apellidos}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          @else
            <p>Usuario invitado</p>
            <a href="#"><i class="fa fa-circle text-danger"></i> Online</a>
          @endif
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>

        <li class="treeview" id="side_bar-procesos" name="side_bar-procesos">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Procesos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="side_bar_option-adopcion_mascotas" name="side_bar_option-adopcion_mascotas"><a href="{{route('home')}}"><i class="fa fa-circle-o"></i>Usuarios</a></li>
            <li id="side_bar_option-citas_medicas" name="side_bar_option-citas_medicas"><a href="{{route('home')}}"><i class="fa fa-circle-o"></i>Pacientes</a></li>
            <li id="side_bar_option-expediente_medico" name="side_bar_option-expediente_medico"><a href="{{route('home')}}"><i class="fa fa-circle-o"></i>Tipos de animales</a></li>
          </ul>
        </li>
        <li class="treeview" id="side_bar-mantenimientos" name="side_bar-mantenimientos">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Mantenimientos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="side_bar_option-usuarios" name="side_bar_option-usuarios"><a href="{{route('usuarios')}}"><i class="fa fa-circle-o"></i>Usuarios</a></li>
            <li id="side_bar_option-pacientes" name="side_bar_option-pacientes"><a href="{{route('pacientes')}}"><i class="fa fa-circle-o"></i>Pacientes</a></li>
            <li id="side_bar_option-tipos_animales" name="side_bar_option-tipos_animales"><a href="{{route('tipos_animales')}}"><i class="fa fa-circle-o"></i>Tipos de animales</a></li>
            <li id="side_bar_option-tipos_servicios" name="side_bar_option-tipos_servicios"><a href="{{route('tipos_servicios')}}"><i class="fa fa-circle-o"></i>Tipos de servicios</a></li>
            <li id="side_bar_option-animales_venta" name="side_bar_option-animales_venta"><a href="{{route('animales_venta')}}"><i class="fa fa-circle-o"></i>Animales en venta</a></li>
            <li id="side_bar_option-animales_adopcion" name="side_bar_option-animales_adopcion"><a href="{{route('animales_adopcion')}}"><i class="fa fa-circle-o"></i>Animales en adopción</a></li>
            <li id="side_bar_option-citas" name="side_bar_option-citas"><a href="{{route('citas')}}"><i class="fa fa-circle-o"></i>Citas</a></li>
          </ul>
        </li>
        <li class="treeview" id="side_bar-seguridad" name="side_bar-seguridad">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Seguridad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="side_bar_option-roles" name="side_bar_option-roles"><a href="{{route('roles')}}"><i class="fa fa-circle-o"></i>Roles</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
