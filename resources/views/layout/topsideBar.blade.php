<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMART CLASS</title>

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="icon" href="{{ asset('AdminLTE/dist/img/smart-class.png') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/dashboard.css') }}">

    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"
    style="  font-family: 'Poppins', sans-serif;">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('AdminLTE/dist/img/smart-class.png') }}" alt="smart-class"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand header"
            style="border-bottom: 0px;  padding-top: 5px;
       padding-bottom: 5px;
       background: rgb(0,0,0);
       background: linear-gradient(315deg, rgba(0,0,0,1) 0%, rgba(21,120,166,1) 100%);
       border-bottom: 0px;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"style="color: white"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" id="TopTitle" class="nav-link" style="color: white">DASHBOARD SMART
                        CLASS</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <div class="info">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" style="color: white">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link" style="background-color: #0000;">
                <img src="{{ asset('AdminLTE/dist/img/smart-class.png') }}" alt="Smart-logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light ml-3" style="color: white">SMART CLASS</span>
            </a>
            <div style="height: 10px"></div>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav id="menuAktif" class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li id="beranda" class="nav-item">
                            <a href="/home" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Beranda</p>
                            </a>
                        </li>

                        <li id="datasensorAktif">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Data Sensor
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/datasensor/grafik" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Grafik</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/datasensor/table" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tabel</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li id="kelas" class="nav-item">
                            <a href="/kelas" class="nav-link">
                                <i class="nav-icon fas fa-landmark"></i>
                                <p>Kelas</p>
                            </a>
                        </li>
                        <li id="user" class="nav-item">
                            <a href="/admin/user" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <div id="dashboard" class="content-wrapper">
            @yield('content')
        </div>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="http://sinamlab.com">SinamLab</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->

    <!-- Bootstrap -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    {{-- <script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script> --}}

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- Page specific script -->
</body>

<style>
    .nav-link2 {
        font-size: 18px;
        font-weight: 400;
        color: rgb(255, 255, 255);
        transition: all 0.4s ease;
    }
</style>

</html>
