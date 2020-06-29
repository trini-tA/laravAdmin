<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview">

        @role( 'superadministrator' )
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-alt"></i>
            <p>{{ __( 'Administration') }}<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <x-menu-item href="{{ route( 'user.index') }}" :sub=true :active=false>
              {{ __( 'Users' ) }}
            </x-menu-item>
            <x-menu-item href="{{ route( 'role.index') }}" :sub=true :active=false>
              {{ __( 'Roles' ) }}
            </x-menu-item>
            <x-menu-item href="{{ route( 'permission.index') }}" :sub=true :active=false>
              {{ __( 'Permissions' ) }}
            </x-menu-item>
            <x-menu-item href="{{ route( 'assignment.index') }}" :sub=true :active=false>
              {{ __( 'assignment' ) }}
            </x-menu-item>
          </ul>
        @endrole

      </li>
      @role( 'superadministrator' )
        <x-menu-item href="{{ route( 'logs.index') }}" icon="fa fa-fw fa-bug" :active=false>
          {{ __( 'Logs' ) }}
        </x-menu-item>
        <x-menu-item href="{{ route( 'activity_log.index') }}" icon="fa fa-fw fa-bug" :active=false>
          {{ __( 'Activity logs' ) }}
        </x-menu-item>
      @endrole
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->