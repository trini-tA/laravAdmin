<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-alt"></i>
          <p>{{ __( 'Administration') }}<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <x-menu-item href="{{ route( 'user.index') }}" :sub=true :active=false>
            {{ __( 'Users list' ) }}
          </x-menu-item>
          <x-menu-item href="#" :sub=true :active=false>
            {{ __( 'Roles' ) }}
          </x-menu-item>
          <x-menu-item href="#" :sub=true :active=false>
            {{ __( 'Permissions' ) }}
          </x-menu-item>
          <x-menu-item href="#" :sub=true :active=false>
            {{ __( 'ACL' ) }}
          </x-menu-item>
        </ul>
      </li>
      <x-menu-item href="#" icon="shopping-basket" :active=false>
        {{ __( 'Watchdog' ) }}
      </x-menu-item>
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->