<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        @include( 'layouts.partials.navbar')
        
        @include( 'layouts.partials.main-sidebar' )
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                      <h1>Project Add</h1>
                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{ url('/') }}">{{ _('Home') }}</a></li>
                        <li class="breadcrumb-item active">Project Add</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>

           

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('main')
                </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include( 'layouts.partials.control-sidebar' )

        @include( 'layouts.partials.footer' )
        
    </div>
    <!-- ./wrapper -->

    <!-- Scripts -->
    <!-- Scripts -->
    @include('layouts.partials.js')
</body>
</html>