<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview {{menuOpen('user.index', 'role.index', 'permission.index', 'assignment.index' )}}">

        @role( 'superadministrator' )
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>{{ __( 'Administration') }}<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <x-menu-item href="{{ route( 'user.index') }}" :sub=true :active="currentRouteActive('user.index')">
              {{ __( 'Users' ) }}
            </x-menu-item>
            <x-menu-item href="{{ route( 'role.index') }}" :sub=true :active="currentRouteActive('role.index')">
              {{ __( 'Roles' ) }}
            </x-menu-item>
            <x-menu-item href="{{ route( 'permission.index') }}" :sub=true :active="currentRouteActive('permission.index')">
              {{ __( 'Permissions' ) }}
            </x-menu-item>
            <x-menu-item href="{{ route( 'assignment.index') }}" :sub=true :active="currentRouteActive('assignment.index')">
              {{ __( 'assignment' ) }}
            </x-menu-item>
          </ul>
        @endrole

      </li>
      @role( 'superadministrator' )
        <x-menu-item href="{{ route( 'logs.index') }}" icon="fa fa-fw fa-bug" :active="currentRouteActive('logs.index')">
          {{ __( 'Logs' ) }}
        </x-menu-item>
        <x-menu-item href="{{ route( 'activity_log.index') }}" icon="fa fa-fw fa-bug" :active="currentRouteActive('activity_log.index')">
          {{ __( 'Activity logs' ) }}
        </x-menu-item>
        <x-menu-item href="{{ route( 'notification.index') }}" icon="fa fa-fw fa-notification" :active="currentRouteActive('notification.index')">
          {{ __( 'Notifications' ) }}
        </x-menu-item>
      @endrole
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->