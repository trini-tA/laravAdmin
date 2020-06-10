<li class="nav-item">
    <a href="{{ $href? $href: '#' }}" class="nav-link {{ $active ? 'active' : '' }} ">
      <i class="{{ $sub ? 'far fa-circle' : '' }} nav-icon  {{ $icon? 'fas fa-' . $icon : '' }}"></i>
      <p>{{ $slot }}</p>
    </a>
</li>