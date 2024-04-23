<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TrustImo - Dashboard-Pro</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    <style>
        .active {
            color:white !important;
            background-color: #389d69;
            border-radius: 10px;
        }

        .hover:hover{
            color:white !important;
            background-color: #389d69;
            border-radius: 10px;
        }

    </style>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-white sidebar sidebar-light shadow-md accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="../assets/img/logo_Trust Imo.png" height="70px" width="70px" alt="">
                </div>

            </div>



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link hover {{request()->is('owner-dash') ? ' text-white bg-green bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white'}}" href="{{route('ownerdash')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Annonces
            </div>


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link hover {{request()->is('owner-houses') ? ' text-white bg-green bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white'}}" href="{{route('owner_properties')}}">
                    <i class="fas fa-comments fa-cog"></i>
                    <span>Propriétés</span>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider">
                <a class="nav-link hover {{request()->is('owner-parcelles') ? ' text-white bg-green bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white'}}" href="{{route('owner_parcelles')}}">
                    <i class="fas fa-users fa-cog"></i>
                    <span>Parcelles</span>
                </a>
            {{--
                <!-- Heading -->
                <div class="sidebar-heading">
                    Informations
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider">

                 <a class="nav-link hover {{request()->is('abonnement') ? ' text-white bg-green bg-opacity-75 p-3' : 'hover:bg-green-500 hover:bg-opacity-75 p-3 hover:text-white'}}" href="">
                    <i class="fas fa-user fa-cog"></i>
                    <span>Abonnement</span>
                </a> --}}
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">



            <div class="sidebar-brand-text mx-4"><!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0 bg-success" id="sidebarToggle"></button>
                </div>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <h1 class="h3 mb-0 text-gray-800">@yield('head')</h1>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 regular"> {{Auth::user()->UserName;}} </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mon Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Se déconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('app')

                </div>
                <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white justify-content-end flex-column d-flex b-0">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; TrustImo 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prêt à partir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Clickez sur "Se déconnecter" si vous souhaitez arrêter la session en cours</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Se déconnecter</a>
                </div>
            </div>
        </div>
    </div>

    <script>

        const activeLink = document.querySelector('a[href="' + window.location.pathname + '"]');

        activeLink.classList.add('active');

        new TomSelect('select[multiple]', {plugins: {remove_botton: {title: 'Supprimer'}}});
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>


    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>


</body>

</html>

