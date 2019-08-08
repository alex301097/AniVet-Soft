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
            <img src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" class="img-circle" style="width:50px;height:50px;"  alt="User Image">
          @endif
        </div>
        <div class="pull-left info">
          @if (auth()->user())
            <p>{{auth()->user()->nombre." ".auth()->user()->apellidos}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
          @else
            <p>Usuario invitado</p>
            <a href="#"><i class="fa fa-circle text-danger"></i> En linea</a>
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
            <i class="fa fa-folder" id="side_bar-procesos" name="side_bar-procesos"></i> <span>Procesos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="side_bar_option-expediente_medico" name="side_bar_option-expediente_medico"><a href="{{route('expediente_medico')}}"><i class="fa fa-circle-o"></i>Expediente medico</a></li>
            <li id="side_bar_option-calendarizacion" name="side_bar_option-calendarizacion"><a href="{{route('calendarizacion')}}"><i class="fa fa-circle-o"></i>Calendarización</a></li>
            <li id="side_bar_option-venta_animales" name="side_bar_option-venta_animales"><a href="{{route('venta_animales')}}"><i class="fa fa-circle-o"></i>Venta de animales</a></li>
            <li class="treeview" id="side_bar_option-adopcion_mascotas" name="side_bar_option-adopcion_mascotas">
              <a href="#"><i class="fa fa-circle-o"></i> Adopción de animales
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="side_bar_option-adopcion_mascotas-registro" name="side_bar_option-adopcion_mascotas-registro"><a href="{{route('adopciones.get_registrar')}}" ><i class="fa fa-circle-o"></i> Registro</a></li>
                <li id="side_bar_option-adopcion_mascotas-solicitud" name="side_bar_option-adopcion_mascotas-solicitud"><a href="{{route('adopciones.get_solicitar')}}"><i class="fa fa-circle-o"></i> Solicitud</a></li>
              </ul>
            </li>
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
            <li id="side_bar_option-roles" name="side_bar_option-roles"><a href="{{route('roles')}}"><i class="fa fa-circle-o"></i>Roles/Permisos</a></li>
            <li id="side_bar_option-respaldos" name="side_bar_option-respaldos"><a href="{{route('respaldos')}}"><i class="fa fa-circle-o"></i>Respaldos</a></li>
            <li class="treeview" id="side_bar_option-bitacoras" name="side_bar_option-bitacoras">
              <a href="#"><i class="fa fa-circle-o"></i> Bitacoras
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="side_bar_option-bitacoras-expediente_medico" name="side_bar_option-bitacoras-expediente_medico"><a href="{{route('home')}}" ><i class="fa fa-circle-o"></i> Expediente Medico</a></li>
                <li id="side_bar_option-bitacoras-adopcion_animales" name="side_bar_option-bitacoras-adopcion_animales"><a href="{{route('home')}}" ><i class="fa fa-circle-o"></i> Adopción de animales</a></li>
                <li id="side_bar_option-bitacoras-venta_animales" name="side_bar_option-bitacoras-venta_animales"><a href="{{route('home')}}" ><i class="fa fa-circle-o"></i> Venta de animales</a></li>
                <li id="side_bar_option-bitacoras-calendarizacion" name="side_bar_option-bitacoras-calendarizacion"><a href="{{route('home')}}" ><i class="fa fa-circle-o"></i> Calendarización</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview" id="side_bar-reportes" name="side_bar-reportes">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="side_bar_option-citas" name="side_bar_option-citas"><a href="{{route('reportes.citas')}}"><i class="fa fa-circle-o"></i>Citas</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
