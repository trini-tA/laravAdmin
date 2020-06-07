<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('layouts.partials.head')
</head>
<body class="hold-transition login-page">
    @yield('body')
    <!-- Scripts -->
    @include('layouts.partials.js')
</body>
</html>