<?php
// Mulai Session
session_start();

// Cek apakah session login sudah ada
if (isset($_SESSION["ses_username"]) == "") {
    header("location: http://localhost/kasmasjid1/login.php");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_user = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
}

// Koneksi DB
include "inc/koneksi.php";

// Fungsi Rupiah
include "inc/rupiah.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kas Masjid Nur-Hidayah</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="dist/css/sweetalert2.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="vendor/sweetalert/alert.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/kasmasjid1/">
                <div class="sidebar-brand-text mx-3">Kas Masjid Nur-Hidayah</div>
            </a>

            <hr class="sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <?php
            	if ($data_level == "Administrator") {
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/kasmasjid1/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Menu Kas Masjid -->
            <div class="sidebar-heading">
                Menu Kas Masjid
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="nav-icon fas fa-envelope"></i>
                    <span>Kas Masjid</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="collapse-inner rounded">
                        <a class="collapse-item" href="?page=i_data_km">Pemasukan Kas Masjid</a>
                        <a class="collapse-item" href="?page=o_data_km">Pengeluaran Kas Masjid</a>
                        <a class="collapse-item" href="?page=rekap_km">Rekapitulasi Kas Masjid</a>
                    </div>
                </div>
            </li>

            <!-- Data Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="nav-icon fas fa-file"></i>
                    <span>Data Laporan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=lap_masjid">Rekapitulasi Kas Masjid</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Settings -->
            <div class="sidebar-heading">
                Settings
            </div>
            <li class="nav-item">
                <a class="nav-link" href="?page=MyApp/data_pengguna">
                    <i class="fas fa-fw far fa-user"></i>
                    <span>User</span>
                </a>
            </li>

			<?php
			} elseif ($data_level == "Bendahara") {
			?>

            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/kasmasjid1/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Menu Kas Masjid -->
            <div class="sidebar-heading">
                Menu Kas Masjid
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="nav-icon fas fa-envelope"></i>
                    <span>Kas Masjid</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="collapse-inner rounded">
                        <a class="collapse-item" href="?page=i_data_km">Pemasukan Kas Masjid</a>
                        <a class="collapse-item" href="?page=o_data_km">Pengeluaran Kas Masjid</a>
                        <a class="collapse-item" href="?page=rekap_km">Rekapitulasi Kas Masjid</a>
                    </div>
                </div>
            </li>

            <!-- Data Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="nav-icon fas fa-file"></i>
                    <span>Data Laporan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=lap_masjid">Rekapitulasi Kas Masjid</a>
                    </div>
                </div>
            </li>
            <?php
            }
			?>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, <?php echo $data_nama; ?> </span>
                                <img class="img-profile rounded-circle" src="dist/img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item nav-link text-gray-600" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Content -->
                <section class="content">
                    <div class="container-fluid">
                        <?php
                        if (isset($_GET['page'])) {
                            $hal = $_GET['page'];
                            switch ($hal) {
                                //Klik Halaman Home Pengguna
                                case 'MyApp/admin':
                                    include "home/admin.php";
                                    break;
                                case 'bendahara':
                                    include "home/bendahara.php";
                                    break;

                                //Pengguna
                                case 'MyApp/data_pengguna':
                                    include "admin/pengguna/data_pengguna.php";
                                    break;
                                case 'MyApp/add_pengguna':
                                    include "admin/pengguna/add_pengguna.php";
                                    break;
                                case 'MyApp/edit_pengguna':
                                    include "admin/pengguna/edit_pengguna.php";
                                    break;
                                case 'MyApp/del_pengguna':
                                    include "admin/pengguna/del_pengguna.php";
                                    break;

                                //Masjid in
                                case 'i_data_km':
                                    include "bendahara/masjid/in/data_kas.php";
                                    break;
                                case 'i_add_km':
                                    include "bendahara/masjid/in/add_kas.php";
                                    break;
                                case 'i_edit_km':
                                    include "bendahara/masjid/in/edit_kas.php";
                                    break;
                                case 'i_del_km':
                                    include "bendahara/masjid/in/del_kas.php";
                                    break;

                                //Masjid out
                                case 'o_data_km':
                                    include "bendahara/masjid/out/data_kas.php";
                                    break;
                                case 'o_add_km':
                                    include "bendahara/masjid/out/add_kas.php";
                                    break;
                                case 'o_edit_km':
                                    include "bendahara/masjid/out/edit_kas.php";
                                    break;
                                case 'o_del_km':
                                    include "bendahara/masjid/out/del_kas.php";
                                    break;
                                case 'rekap_km':
                                    include "bendahara/masjid/rekap_kas.php";
                                    break;

                                //lap kas mas
                                case 'lap_masjid':
                                    include "bendahara/masjid/laporan/lap_mas.php";
                                    break;

                                //default
                                default:
                                    echo "<center><h1> ERROR !</h1></center>";
                                    break;
                            }
                        } else {
                            // Halaman default berdasarkan level
                            if ($data_level == "Administrator") {
                                include "home/admin.php";
                            } elseif ($data_level == "Bendahara") {
                                include "home/bendahara.php";
                            }
                        }
                        ?>
                    </div>
                </section>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Masjid Nur Hidayah 2025</span>
                    </div>
                </div>
            </footer>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin keluar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Klik "Keluar" di bawah ini jika Anda sudah siap mengakhiri sesi</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-primary" href="logout.php">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="build/js/sb-admin-2.min.js"></script>
            <script src="vendor/sweetalert/alert.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <script src="vendor/sweetalert/alert.js"></script>
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="build/js/demo/datatables-demo.js"></script>
            <script src="build/js/demo/chart-area-demo.js"></script>
            <script src="build/js/demo/chart-pie-demo.js"></script>

        </div>
    </div>
</body>

</html>