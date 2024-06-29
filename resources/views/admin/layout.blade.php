<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Machine Test</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('app_assets')}}/dash/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <script>
    var site_url = "{{url('/')}}";
    </script>
</head>
<style>
    a:active{
        background-color: #fffb00;color: #141212;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li></ul>

    <!-- SEARCH FORM -->
   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      	<input type="hidden" value="{{ csrf_token() }}" name="_token"  />

      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            
          
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   
 <a href="{{url('/admin')}}" class="brand-link">
                    <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span> 
                    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item ">
          <a href="{{ route('dashboard')}}" 
          class="nav-link {{ request()->is('admin') ? 'active' : '' }} ">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
       
           <li class="nav-item">
              <a href="{{ route('user.index')}}" class="nav-link  ">
                        <i class="nav-icon fas fa-list"></i>
                        <p> Users</p>
                    </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('sales.create')}}" class="nav-link  ">
                        <i class="nav-icon fas fa-list"></i>
                        <p> Add Sales Details</p>
                    </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('sales.mysales')}}" class="nav-link  ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>My Sales Details</p>
                    </a>
              </li>
              <li class="nav-item">
              <a href="{{ route('sales.payroll')}}" class="nav-link  ">
                        <i class="nav-icon fas fa-list"></i>
                        <p>payroll</p>
                    </a>
              </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('app_assets')}}/dash/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('app_assets')}}/dash/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('app_assets')}}/dash/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('app_assets')}}/dash/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('app_assets')}}/dash/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('app_assets')}}/dash/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('app_assets')}}/dash/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('app_assets')}}/dash/plugins/moment/moment.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('app_assets')}}/dash/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('app_assets')}}/dash/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('app_assets')}}/dash/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('app_assets')}}/dash/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('app_assets')}}/dash/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('app_assets')}}/dash/dist/js/demo.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('app_assets')}}/dash/dist/js/custom.js?v=<?php echo time(); ?>"></script>
<!-- page script -->
<script>
  
</script>
</body>
</html>
