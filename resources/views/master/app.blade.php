<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Blood Bank</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('Admin_Lte/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
  <!--flash link --> 

{{--@if(app()->getLocale() =='ar')

    <link rel ="stylesheet" href="{{asset('rtl/AdminLTE.min.css')}}">
    <link rel ="stylesheet" href="{{asset('rtl/fonts-fa.css')}}">
    <link rel ="stylesheet" href="{{asset('rtl/bootstrap-rtl.min.css')}}">
    <link rel ="stylesheet" href="{{asset('rtl/rtl.css')}}">
    <link rel ="stylesheet" href="{{asset('rtl/_all-skins.min.css')}}">
    <link rel ="stylesheet" href="{{asset('rtl/profile.css')}}">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



@endif--}}

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
      <!-- Admin Dropdown Menu -->
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
           
           

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <a href="{{url(route('home'))}}" class="brand-link">
      <img src="{{asset('Admin_Lte/img/logo.png')}}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" >بنك الدم</span>
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
               
              Governorate 
              </p>
            </a>
          </li>

          <!-- المدن -->
          <li class="nav-item has-treeview">
            <a href="{{url(route('city.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-map"></i>
              <p>
               
              Citis
              </p>
            </a>
          </li>

           <!-- الاقسام -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('category.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
               
              Categories

              </p>
            </a>
          </li>

           <!-- المقالاات -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('post.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-scroll"></i>
              <p>
               
              Posts
              </p>
            </a>
          </li>

           <!-- طلبات التبرع -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('donationrequest.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
               
              Donation Requests
              </p>
            </a>
          </li>

           <!-- الشكاوي والاقتراحات -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('contant.index'))}}" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
               
              ContactUs

              </p>
            </a>
          </li>

           <!-- العملاء -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('client.index'))}}"class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               
              Clients
              </p>
            </a>
          </li>


           <!-- المستخدمين -->

          <li class="nav-item has-treeview">
            <a href="{{url(route('users.index'))}}"class="nav-link">
              <i class="nav-icon fas fa-user-secret"></i>
              <p>
               
              Users
              </p>
            </a>
          </li>


           <!-- الرتب -->
          <li class="nav-item has-treeview">
            <a href="{{url(route('role.index'))}}"class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
               
              Roles
              </p>
            </a>
          </li>


           <!-- اعدادت التطبيق -->
           <li class="nav-item has-treeview">
            <a href="{{url(route('settings.index'))}}"class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
               
              Settings
              </p>
            </a>
          </li>

          <!-- اعدادت التطبيق -->
          <li class="nav-item has-treeview">
            <a href="{{url(route('getChangePassword'))}}"class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
               
              Change Password
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
