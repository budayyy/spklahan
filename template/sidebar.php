<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPK Lahan</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

     <!-- Custom styles for this page -->
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #61b15a">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SPK LAHAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php if ( $page == "dashboard" ) { ?>
            <li class="nav-item active">
            <?php } else { ?>
            <li class="nav-item">
            <?php } ?>
                <a class="nav-link" href="../admin/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - alternatif -->
            <?php if ( $page == "alternatif" ) { ?>
            <li class="nav-item active">
            <?php } else { ?>
            <li class="nav-item">
            <?php } ?>
                <a class="nav-link" href="../admin/alternatif.php">
                <i class="fas fa-leaf"></i>
                    <span>Alternatif</span>
                </a>
            </li>
            
            <!-- Nav Item - kriteria -->
            <?php if ( $page == "kriteria" ) { ?>
                <li class="nav-item active">
            <?php } else { ?>
                <li class="nav-item">
            <?php } ?>
                <a class="nav-link" href="../admin/kriteria.php">
                <i class="fas fa-leaf"></i>
                    <span>Kriteria</span>
                </a>
            </li>

            <!-- Nav Item - Nilai Alternatif -->
            <?php if ( $page == "nilaialternatif" ) { ?>
                <li class="nav-item active">
            <?php } else { ?>
                <li class="nav-item">
            <?php } ?>
                <a class="nav-link" href="../admin/nilaialternatif.php">
                <i class="fas fa-clipboard-list"></i>
                    <span>Nilai Alternatif</span>
                </a>
            </li>

            <!-- Nav Item - Nilai Gap -->
            <?php if ( $page == "nilaigap" ) { ?>
                <li class="nav-item active">
            <?php } else { ?>
                <li class="nav-item">
            <?php } ?>
                <a class="nav-link" href="../admin/nilaigap.php">
                <i class="fas fa-clipboard-list"></i>
                    <span>Nilai Gap</span>
                </a>
            </li>

            <!-- Nav Item - pengguna
            <?php if ( $page == "hasilkonsultasi" ) { ?>
                <li class="nav-item active">
            <?php } else { ?>
                <li class="nav-item">
            <?php } ?>
                <a class="nav-link" href="../admin/hasilkonsultasi.php">
                <i class="fas fa-user"></i>
                    <span>Hasil Konsultasi</span>
                </a>
            </li> -->

            <!-- Nav Item - keluar -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                <i class="fas fa-sign-out-alt fa-sm " ></i>
                    <span>Logout</span>
                </a>
            </li>
            
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">