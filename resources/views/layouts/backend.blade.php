<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Satria Agung | {{ $page }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist\air-datepicker\dist\css\datepicker.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">
                            <img src="{{ asset('AdminLTE') }}/dist/img/avatar2.png" class="img-circle img-sm"
                                alt="Avatar">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li class="dropdown-item">
                                <a href="{{ route('account.profil') }}" style="color: black;">
                                    <i class="far fa-user fa-fw"></i>
                                    <span> My Profile</span>
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a href="{{ route('logout') }}" style="color: black;">
                                    <i class="fas fa-sign-out-alt fa-fw"></i>
                                    <span> LogOut</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link">
                <img src="{{ asset('AdminLTE') }}/dist/img/satria0.png" alt="Satria Agung"
                    class="img-circle elevation-3 img-size-32">
                <span class="brand-text font-weight-light">PN Satria Agung</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                @if (auth()->user()->role == 'admin')
                <!-- Sidebar Menu -->
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Administrator</span>
                </h6>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ '/home' }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kontingen" class="nav-link">
                                <i class="nav-icon fas fa-gopuram"></i>
                                <p>
                                    Daftar Rayon
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pelatih" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Daftar Pelatih
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('murid') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Daftar Murid
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('ppp') }}" class="nav-link">
                                <i class="nav-icon fas fa-coins"></i>
                                <p>
                                    Pembayaran(PPP)
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('tingkat') }}" class="nav-link">
                                <i class="nav-icon fas fa-khanda"></i>
                                <p>
                                    Tingkat Sabuk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('tahun') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Tahun Angkatan
                                </p>
                            </a>
                        </li>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>
                            User Experient
                        </span>
                    </h6>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ '/data' }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Data Pribadi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/card' }}" class="nav-link">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>
                                    Kartu Tanda Anggota
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endif

                    @if (auth()->user()->role == 'murid')
                    <!-- User/Murid -->
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>
                            User Experient
                        </span>
                    </h6>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ '/data' }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Data Pribadi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ '/card' }}" class="nav-link">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>
                                    Kartu Tanda Anggota
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endif

                    <!-- SuperAdmin -->
                    @if (auth()->user()->role == 'pelatih')
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>
                            Super Admin
                        </span>
                    </h6>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/kontingen" class="nav-link">
                                <i class="nav-icon fas fa-gopuram"></i>
                                <p>
                                    Daftar Rayon
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pelatih" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                    Daftar Pelatih
                                </p>
                            </a>
                        </li>
                    </ul>
                    @endif

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                            <h3>{{ $title }}</h3>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->



            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        @yield('content')

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 Enka Production.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/jquery-ui/jquery-ui.js"></script>
    <!-- date-picker -->
    <script src="{{ asset('AdminLTE') }}/dist\air-datepicker\dist\js\datepicker.js"></script>
    <script src="{{ asset('AdminLTE') }}/dist\air-datepicker\dist\js\i18n\datepicker.en.js"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('AdminLTE') }}/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        $('#example4').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>


    <!-- <script>
    $('.deleted').click(function() {
        var idmurid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Kamu Yakin Menghapus " + nama + " !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/delete/" + idmurid + ""
                Swal.fire(
                    'Deleted!',
                    'Data Berhasil Dihapus.',
                    'success',
                )
            }
        })
    });
    </script> -->


    @include('sweetalert::alert')
    @toastr_render
    @yield('footer')
</body>

</html>