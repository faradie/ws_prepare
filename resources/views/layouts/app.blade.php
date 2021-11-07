<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.app.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('includes.app.navbar')

  @include('includes.app.sidebar')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  @include('includes.app.breadcrumb')

    <!-- Main content -->
    <div class="content">
        @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('includes.app.right_sidebar')

  @include('includes.app.foot')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('includes.app.script')
@stack('scripts')
</body>
</html>
