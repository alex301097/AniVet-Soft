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
            <img src="{{ url('imgPerfiles/'.Auth::user()->imagen) }}" class="img-circle"  alt="User Image">
          @endif
          {{-- style="width:50px;height:50px;" --}}
        </div>
        <div class="pull-left info">
          @if (auth()->user())
            <p>{{auth()->user()->nombre." ".auth()->user()->apellidos}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
          @else
            <p>Usuario invitado</p>
            <a href="#"><i class="fa fa-circle text-danger"></i> Fuera de linea</a>
          @endif
        </div>
      </div>
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>
        <li><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>&nbsp;&nbsp;Inicio</span></a></li>
        <li class="treeview" id="side_bar-procesos" name="side_bar-procesos">
          <a href="#">
            <i class="fas fa-bone" id="side_bar-procesos" name="side_bar-procesos"></i><span>&nbsp;&nbsp;Procesos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('pro_expediente-index')
            <li id="side_bar_option-expediente_medico" name="side_bar_option-expediente_medico"><a href="{{route('expediente_medico')}}"><i class="fas fa-laptop-medical"></i>&nbsp;&nbsp; Expediente medico</a></li>
            @endcan
            @can('pro_calendarizacion-index')
            <li id="side_bar_option-calendarizacion" name="side_bar_option-calendarizacion"><a href="{{route('calendarizacion')}}"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Calendarización</a></li>
            @endcan
            <li id="side_bar_option-venta_animales" name="side_bar_option-venta_animales"><a href="{{route('venta_animales')}}"><i class="fas fa-money-bill-wave"></i>&nbsp;&nbsp;Venta de animales</a></li>
            <li class="treeview" id="side_bar_option-adopcion_mascotas" name="side_bar_option-adopcion_mascotas">
              <a href="#"><i class="fas fa-cat"></i>&nbsp;&nbsp;Adopción de animales
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li id="side_bar_option-adopcion_mascotas-registro" name="side_bar_option-adopcion_mascotas-registro"><a href="{{route('adopciones.get_registrar')}}" ><i class="fas fa-book-medical"></i>&nbsp;&nbsp;Registro</a></li>
                <li id="side_bar_option-adopcion_mascotas-solicitud" name="side_bar_option-adopcion_mascotas-solicitud"><a href="{{route('adopciones.get_solicitar')}}"><i class="fas fa-edit"></i>&nbsp;&nbsp;Solicitud</a></li>
              </ul>
            </li>
          </ul>
        </li>
        @canany(['mant_usuarios-index', 'mant_pacientes-index', 'mant_tipos_animales-index', 'mant_tipos_servicios-index', 'mant_animales_en_venta-index', 'mant_citas-index'])
        <li class="treeview" id="side_bar-mantenimientos" name="side_bar-mantenimientos">
          <a href="#">
            <i class="fa fa-folder"></i><span>&nbsp;&nbsp;Mantenimientos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('mant_usuarios-index')
            <li id="side_bar_option-usuarios" name="side_bar_option-usuarios"><a href="{{route('usuarios')}}"><i class="fas fa-users"></i>&nbsp;&nbsp;Usuarios</a></li>
            @endcan
            @can('mant_pacientes-index')
            <li id="side_bar_option-pacientes" name="side_bar_option-pacientes"><a href="{{route('pacientes')}}"><i class="fas fa-horse-head"></i>&nbsp;&nbsp;Pacientes</a></li>
            @endcan
            @can('mant_tipos_animales-index')
            <li id="side_bar_option-tipos_animales" name="side_bar_option-tipos_animales"><a href="{{route('tipos_animales')}}"><i class="fas fa-fish"></i>&nbsp;&nbsp;Tipos de animales</a></li>
            @endcan
            @can('mant_tipos_servicios-index')
            <li id="side_bar_option-tipos_servicios" name="side_bar_option-tipos_servicios"><a href="{{route('tipos_servicios')}}"><i class="fas fa-book-open"></i>&nbsp;&nbsp;Tipos de servicios</a></li>
            @endcan
            @can('mant_animales_en_venta-index')
            <li id="side_bar_option-animales_venta" name="side_bar_option-animales_venta"><a href="{{route('animales_venta')}}"><i class="fas fa-coins"></i>&nbsp;&nbsp;Animales en venta</a></li>
            @endcan
            @can('mant_citas-index')
            <li id="side_bar_option-citas" name="side_bar_option-citas"><a href="{{route('citas')}}"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Citas</a></li>
            @endcan
          </ul>
        </li>
        @endcanany
        @canany(['mant_roles-index','seg_respaldos-index'])
        <li class="treeview" id="side_bar-seguridad" name="side_bar-seguridad">
          <a href="#">
            <i class="fas fa-lock"></i> <span>&nbsp;&nbsp;Seguridad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('mant_roles-index')
            <li id="side_bar_option-roles" name="side_bar_option-roles"><a href="{{route('roles')}}"><i class="fas fa-user-tag"></i>&nbsp;&nbsp;Roles/Permisos</a></li>
            @endcan
            @can('seg_respaldos-index')
            <li id="side_bar_option-respaldos" name="side_bar_option-respaldos"><a href="{{route('respaldos')}}"><i class="fas fa-passport"></i>&nbsp;&nbsp;Respaldos</a></li>
            @endcan
          </ul>
        </li>
        @endcanany
        @canany(['rep_reporte_citas-index', 'rep_reporte_usuarios-index', 'rep_reporte_pacientes-index', 'rep_reporte_expediente_medico-index'])
        <li class="treeview" id="side_bar-reportes" name="side_bar-reportes">
          <a href="#">
            <i class="fas fa-file-alt"></i> <span>&nbsp;&nbsp;Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @can('rep_reporte_citas-index')
            <li id="side_bar_option-reportes-citas" name="side_bar_option-reportes-citas"><a href="{{route('reportes.citas')}}"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;Citas</a></li>
            @endcan
            @can('rep_reporte_usuarios-index')
            <li id="side_bar_option-reportes-usuarios" name="side_bar_option-reportes-usuarios"><a href="{{route('reportes.usuarios')}}"><i class="fas fa-users"></i>&nbsp;&nbsp;Usuarios</a></li>
            @endcan
            @can('rep_reporte_pacientes-index')
            <li id="side_bar_option-reportes-pacientes" name="side_bar_option-reportes-pacientes"><a href="{{route('reportes.pacientes')}}"><i class="fas fa-crow"></i>&nbsp;&nbsp;Pacientes</a></li>
            @endcan
            @can('rep_reporte_expediente_medico-index')
            <li id="side_bar_option-reportes-expediente_medico" name="side_bar_option-reportes-expediente_medico"><a href="{{route('reportes.expediente_medico')}}"><i class="fas fa-archive"></i>&nbsp;&nbsp;Expediente Medico</a></li>
            @endcan
          </ul>
        </li>
        @endcanany
        <li class="treeview" id="side_bar-ayuda" name="side_bar-ayuda">
          <a href="#">
            <i class="fas fa-lock"></i> <span>&nbsp;&nbsp;Ayuda</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="side_bar_option-acerca_de" name="side_bar_option-acerca_de"><a href="{{route('home')}}"><i class="fas fa-question"></i>&nbsp;&nbsp;Acerca de..</a></li>
            <li id="side_bar_option-nosotros" name="side_bar_option-nosotros"><a href="{{route('nosotros')}}"><i class="fas fa-user"></i>&nbsp;&nbsp;Nosotros</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
