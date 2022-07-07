<?php 

require 'functions.php';

$nilaiStandar = query("SELECT * FROM alternatif");
$kriteria = query("SELECT * FROM kriteria");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Konsultasi</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap-4.4.1/css/bootstrap.min.css">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="cssmanual/konsultasi.css">

     <!-- Custom styles for this page -->
     <link href="asset/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>
    
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand" href="index.php">PROFIILE MATCHING</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
              <a class="nav-item nav-link active" aria-current="page" href="index.php">Beranda</a>
              <a class="nav-item nav-link" href="informasi.php">Informasi</a>
              <a class="nav-item nav-link" href="konsultasi.php">Konsultasi</a>
              <!-- <a class="nav-item btn btn-primary tombol" href="admin/login.php">Login</a> -->
            </div>
          </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->



    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">INFORMASI TANAMAN </h1>
        <p class="lead">Sistem Pendukung Keputusan Penyesuaian Lahan Untuk Tanaman Pangan Berdasarkan Tanah Dengan Metode Profile Matching </p>
    </div>
    </div>
    <!-- akhir jumbotron -->



    <!-- container -->
    <div class="container">

        <!-- info panel -->

        <div class="card justify-content-center">
            <div class="card-header text-center">
                SYARAT TUMBUH TANAMAN PANGAN BERDASARKAN KRITERIA LAHAN 
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-success">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Tanaman</th>
                        <?php foreach ( $kriteria as $krt ) : ?>
                        <th class="text-center"><?php echo $krt["nama_kriteria"]; ?></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>

                    <?php $no=1; ?>
                    <?php foreach ( $nilaiStandar as $ns ) : ?>
                    <tr>
                        <td class="text-center"><?php echo $no; ?></td>
                        <td class="text-center"><?php echo $ns["nama_alternatif"]; ?></td>
                        <?php $ida=$ns["kode_alternatif"]; $nilai = query("SELECT * FROM profil_standar WHERE kode_alternatif='$ida' "); ?>
                        <?php foreach ( $nilai as $nil ) : ?>
                        <td class="text-center">
                        <?php 
                        $kode = $nil["kode_kriteria"];
                        
                        //kedalaman
                        if ($kode == "C1" ){
                        
                            if ( $nil["nilai"] == 4 ){
                                echo "< 20 cm (Sangat Dangkal)";
                            }else if($nil["nilai"] == 3){
                                echo "20 - 50 cm (Dangkal)";
                            }else if ($nil["nilai"] == 2 ){
                                echo "51 - 75 cm ( Sedang )";
                            }else{
                                echo "> 75 cm (Dalam)";
                            }
                        
                            //kelembaban
                        }elseif($kode == "C2"){

                            if ( $nil["nilai"] == 4 ){
                                echo "> 80 % ";
                            }else if($nil["nilai"] == 3){
                                echo "51 - 80 %";
                            }else if ($nil["nilai"] == 2 ){
                                echo "25 - 50 %";
                            }else{
                                echo "< 25 %";
                            }

                            //tekstur
                        }elseif($kode == "C3"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Lempung";
                            }else if($nil["nilai"] == 3){
                                echo "Liat Berpasir";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Liat";
                            }else{
                                echo "Lempung Berpasir";
                            }

                            //temperatur
                        }elseif($kode == "C4"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Hangat";
                            }else if($nil["nilai"] == 3){
                                echo "Panas";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Sejuk";
                            }else{
                                echo "Dingin";
                            }

                            //bahan Kasar
                        }elseif($kode == "C5"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Sedikit";
                            }else if($nil["nilai"] == 3){
                                echo "Sedang";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Banyak";
                            }else{
                                echo "Sangat Banyak";
                            }

                            //Kematangan Gambut
                        }elseif($kode == "C6"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Hemik(Setengah Matang )";
                            }else if($nil["nilai"] == 3){
                                echo "Saprik (Matang )";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Saprik+(Sangat Matang)";
                            }else{
                                echo "Fibrik(Belum Matang)";
                            }

                            //Drainase
                        }elseif($kode == "C7"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Cepat";
                            }else if($nil["nilai"] == 3){
                                echo "Baik";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Sedang";
                            }else{
                                echo "Sangat Terhambat";
                            }

                            //Bahaya Erosi
                        }elseif($kode == "C8"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Sangat Ringan (<0,15 cm/tahun)";
                            }else if($nil["nilai"] == 3){
                                echo "Ringan (0,15 - 0,9 cm /tahun) ";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Sedang (0,9 - 1,8 cm /tahun)";
                            }else{
                                echo "Berat ( 1,8 - 4,8 cm /tahun )";
                            }

                            //ketebalan gambut
                        }elseif($kode == "C9"){

                            if ( $nil["nilai"] == 4 ){
                                echo "Sedang ( 50 - 100 cm )";
                            }else if($nil["nilai"] == 3){
                                echo "Tebal ( 200 - 300 cm )";
                            }else if ($nil["nilai"] == 2 ){
                                echo "Tipis ( < 50 cm ) ";
                            }else{
                                echo "Sangat Tebal ( > 300 cm ) ";
                            }

                            //genangan
                        }else {

                            if ( $nil["nilai"] == 4 ){
                                echo "< 25 cm";
                            }else if($nil["nilai"] == 3){
                                echo "25 - 50 cm";
                            }else if ($nil["nilai"] == 2 ){
                                echo "50 - 150 cm";
                            }else{
                                echo "> 150 cm";
                            }

                        }

                        
                        ?>
                        <!-- <?php echo $nil["nilai"]; ?> -->
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                    </table>

                </div>

                
            </div>
            <div class="card-footer text-center">
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>

        <!-- akhir info panel -->

        <!-- footer -->
        <div class="row footer">
            <div class="col text-center">
                <p>( 2021 ) Copyright Buday <a href="admin/login.php">Day Corporate</a> </p>
            </div>
        </div>
        <!-- akhir footer -->


    </div>
    <!-- akhir container -->


    <script src="css/bootstrap-4.4.1/js/bootstrap.min.js"></script>

     <!-- Page level plugins -->
  <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="asset/js/demo/datatables-demo.js"></script>

</body>
</html>