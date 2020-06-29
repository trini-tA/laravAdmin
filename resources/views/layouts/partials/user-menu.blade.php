<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset( 'adminlte/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
      <span class="d-none d-md-inline">{{  Auth::user()->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="{{ asset( 'adminlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        <p>{{  Auth::user()->name }}
            <small>{{  Auth::user()->email }}</small>
        </p>
      </li>
      <!-- Menu Body -->
      {{-- <li class="user-body">
        <div class="row">
          <div class="col-4 text-center">
            <a href="#">Followers</a>
          </div>
          <div class="col-4 text-center">
            <a href="#">Sales</a>
          </div>
          <div class="col-4 text-center">
            <a href="#">Friends</a>
          </div>
        </div> --}}
        <!-- /.row -->
      </li>
      <!-- Menu Footer-->
      <li class="user-footer">
        <a href="{{ route( 'profile.edit', ['profile' => Auth::user()->id ] )}} " class="btn btn-default btn-flat">{{ __('Profile') }}</a>
        <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </li>