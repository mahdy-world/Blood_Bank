<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blood Bank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Admin_Lte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--flash link --> 
  


</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper --> 
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
      
    </ul>

    <!-- SEARCH FORM -->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
       
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url(route('home.index'))}}" class="brand-link">
      <img src="{{asset('Admin_Lte/img/logo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Blood Bank</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- المحافظات -->
          <li class="nav-item has-treeview">
            <a href="{{url(route('governorate.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-flag"></i>
              <p>
               
              المحافظات
              </p>
            </a>
          </li>

          <!-- المدن -->
          <li class="nav-item has-treeview">
            <a href="{{url(route('city.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
               
              المدن
              </p>
            </a>
          </li>

           <!-- الاقسام -->
           <li class="nav-item has-treeview">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
               
              الاقسام
              </p>
            </a>
          </li>

           <!-- المقالاات -->
           <li class="nav-item has-treeview">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
               
              المقالاات
              </p>
            </a>
          </li>

           <!-- طلبات التبرع -->
           <li class="nav-item has-treeview">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
               
              طلبات التبرع
              </p>
            </a>
          </li>

           <!-- الشكاوي والاقتراحات -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('contant.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
               
              الشكاوي والاقتراحات
              </p>
            </a>
          </li>

           <!-- العملاء -->
           <li class="nav-item has-treeview">
            <a href="../widgets.html"class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               
              العملاء
              </p>
            </a>
          </li>

          

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 
  </aside>
  <!-- Content Wrapper. Contains page content -->
  @yield('content-wrapper')
  

  
  <!-- Control Sidebar -->
    <!-- Control sidebar content goes here -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin_Lte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('Admin_Lte/js/demo.js')}}"></script>
</body>
</html>
