<?php
session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}

$page = "dashboard";
include "../koneksi.php";
include "../functions.php"; 
include "../template/sidebar.php";
include "../template/topbar.php";

$alternatif = query("SELECT * FROM alternatif ");
$kriteria = query("SELECT * FROM kriteria");
$user = query("SELECT * FROM user");

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>

                        <!-- baris -->
                        <div class="row">

                            <!-- Alternatif -->
                            <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Alternatif</div>
                                            <?php
                                                $jml_alternatif = count($alternatif);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_alternatif; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <a href="alternatif.php"> <i class="fas fa-leaf fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kriteria -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Kriteria</div>
                                            <?php  
                                                $jml_kriteria = count($kriteria);
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_kriteria ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <a href="kriteria.php"><i class="fas fa-clipboard-list fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php $jml_user = count($user); ?>
                                            <?php echo $jml_user ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <a href="user.php"><i class="fas fa-user fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

            

        <div class="card card-shadow mb-4">
            <div class="card-body">
                <div class="alert alert-info text-center ">
                    <b>Selamat Datang di Halaman Admin Sistem Pendukung Keputusan Kesesuaian Lahan Untuk Tanaman Pangan</b>
                </div>

                <p>
                Sistem pendukung keputusan adalah program pemberi nasehat yang terkomputerisasi yang diajukan untuk meniru proses reasoning (pertimbangan) dan pengetahuan dari pakar dalam menyelesaikan permasalahan masalah yang spesifik. Sistem Pendukung Keputusan merupakan implementasi teori-teori pengambilan keputusan yang telah diperkenalkan oleh ilmu-ilmu seperti Operation Research dan Management Science, hanya bedanya adalah bahwa jika dahulu untuk mencari penyelesaian masalah yang dihadapi harus dilakukan perhitungan iterasi secara manual (biasanya untuk mencari nilai minimum dan maksimum)
                </p>
            
            </div>
        </div>
</div>


<?php include "../template/footer.php"; ?>