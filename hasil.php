<?php 

include 'functions.php';

$nilaiStandar = query("SELECT *  FROM alternatif");
$kriteria=query('SELECT * FROM kriteria');

// var_dump($_POST);
$kedalaman          =isset($_POST['button'])?(int)$_POST['kedalaman']:0;
$kelembaban         =isset($_POST['button'])?(int)$_POST['kelembaban']:0;
$temperatur         =isset($_POST['button'])?(int)$_POST['temperatur']:0;
$tekstur            =isset($_POST['button'])?(int)$_POST['tekstur']:0;
$bahankasar         =isset($_POST['button'])?(int)$_POST['bahankasar']:0;
$kematanganGambut   =isset($_POST['button'])?(int)$_POST['kematanganGambut']:0;
$drainase           =isset($_POST['button'])?(int)$_POST['drainase']:0;
$bahayaErosi        =isset($_POST['button'])?(int)$_POST['bahayaErosi']:0;
$ketebalanGambut    =isset($_POST['button'])?(int)$_POST['ketebalanGambut']:0;
$genangan           =isset($_POST['button'])?(int)$_POST['genangan']:0;


if(!isset($_POST['button'])){

    echo "
        
    <script>
        alert('Belum Insert Data');
        document.location.href = 'konsultasi.php'
    </script>

";
    
}

$nilai_alternatif=[];
    $nilai_standar=query("SELECT alternatif.kode_alternatif, kriteria.kode_kriteria, profil_standar.nilai 
    FROM profil_standar JOIN alternatif USING (kode_alternatif)
    JOIN kriteria USING (kode_kriteria)");

foreach ($nilai_standar as $nst){
$nilai_alternatif[$nst['kode_alternatif']][$nst['kode_kriteria']]=$nst['nilai'];
}
// print_r($nilai_alternatif);
// nilai sampel - nilai standar alternatif
    $nilai_GAP=[];
    foreach($nilai_alternatif as $kode_alternatif => $key){
        foreach($key as $kode_kriteria =>$nilai){
            if($kode_kriteria=='C1'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$kedalaman;
            }elseif($kode_kriteria=='C2'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$kelembaban;
            }elseif($kode_kriteria=='C3'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$tekstur;
            }elseif($kode_kriteria=='C4'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$temperatur;
            }elseif($kode_kriteria=='C5'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$bahankasar;
            }elseif($kode_kriteria=='C6'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$kematanganGambut;
            }elseif($kode_kriteria=='C7'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$drainase;
            }elseif($kode_kriteria=='C8'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$bahayaErosi;
            }elseif($kode_kriteria=='C9'){
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$ketebalanGambut;
            }else{
                $nilai_GAP[$kode_alternatif][$kode_kriteria]=$nilai-$genangan;
            }
            
        }
    }


    // query mengambil nilai bobot dari database
    $nilaibobot = query("SELECT * FROM bobot");

    $bobot=[];
    //melakukan pengisian array untuk tiap record data
    foreach ( $nilaibobot as $key ) {
        $bobot[$key['selisih']]=$key['nilai_bobot'];
    }


    $terbobot=[];
    foreach ( $nilai_GAP as $key => $value ) {
        foreach ( $value as $gaps => $nilai ) {
            $terbobot[$key][$gaps] = $bobot[$nilai];
        }
    }
    

    //menghitung nilai GAP core factor dan secondary factor
    $kriteria=query('SELECT * FROM kriteria');
    $kriteria_core=query("SELECT * FROM kriteria WHERE jenis_kriteria='core'");
    $kriteria_secondary=query("SELECT * FROM kriteria WHERE jenis_kriteria='secondary'");

    $kode_krit=[];
    foreach ( $kriteria as $key ) {
        $kode_krit[$key['id_kriteria']][$key['kode_kriteria']]=$key['jenis_kriteria'];
    }

    // menghitung nilai CF
    $nilai_NCF=[];
    foreach($nilaiStandar as $nlstndr){
        $kd=$nlstndr['kode_alternatif'];
        foreach($kriteria_core as $krcore){
            $krtr=$krcore['kode_kriteria'];
            $nilai_NCF[$kd][$krtr]=(float)$terbobot[$kd][$krtr];
        }
    }

    $NCF=[];
    foreach($nilaiStandar as $nilAl){
        $kde=$nilAl['kode_alternatif'];
        $jmlNCF=count($nilai_NCF[$kde]);
            $total=array_sum($nilai_NCF[$kde]);
            $NCF[$kde]=$total/$jmlNCF;
    }

    // menghitung nilai SF
    $nilai_SF=[];
    foreach($nilaiStandar as $nlstndr){
        $kd=$nlstndr['kode_alternatif'];
        foreach($kriteria_secondary as $krsecondary){
            $krtr=$krsecondary['kode_kriteria'];
            $nilai_SF[$kd][$krtr]=(float)$terbobot[$kd][$krtr];
        }
    }

    $SF=[];
    foreach($nilaiStandar as $nilAl){
        $kde=$nilAl['kode_alternatif'];
        $jmlSF=count($nilai_SF[$kde]);
            $total=array_sum($nilai_SF[$kde]);
            $SF[$kde]=$total/$jmlSF;
    }
    
    // menjumlahkan nilai CF dan SF
    $nilai_ahir=[];
    foreach($nilaiStandar as $nilaStd){
        $kd=$nilaStd['kode_alternatif'];
        $nilai_ahir[$kd]=($NCF[$kd]*0.6)+($SF[$kd]*0.4);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Hasil</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap-4.4.1/css/bootstrap.min.css">
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="cssmanual/hasil.css">

    <!-- Custom styles for this page -->
    <link href="asset/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
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
              <!-- <a class="nav-item btn btn-outline-primary tombol" href="admin/login.php">Login</a> -->
            </div>
          </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container">
    
        <!-- Judul Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mt-3">
            <h1 class="h4 mt-6 text-gray-800">Hasil Analisa Dengan Metode Profile Matching</h1>
            <!-- <a href="print.php" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
            <i class="fas fa-print"></i> Cetak</a> -->

        </div>

        <!-- baris pertama -->
        <div class="row">

            <!-- Nama Hasil Rekomendasi Alternatif -->
            <div class="col-xl-10 col-md-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">
                                Hasil Rekomendasi Tanaman Yang Sesuai Adalah : </div>
                                <div class="h3 font-weight-bold text-gray-800">Tanaman
                                
                                <?php arsort($nilai_ahir);
                                $index=key($nilai_ahir);
                                $nama_awal = query("SELECT * FROM alternatif WHERE kode_alternatif='$index' ");
                                echo $nama_awal[0]['nama_alternatif'];
                                ?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hasil Atau Nilai Yang di dapat -->
            <div class="col-xl-2 col-md-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Dengan Nilai :</div>
                                <div class="h3 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $max =max($nilai_ahir);
                                echo $max;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir baris pertama-->

        <!-- isi konten -->
        <div class="card shadow mt-4">
            <div class="card-header py-3">
                <div class="d-sm-flex align-items-center justify-content-between ">
                <h5 class="mb-0 text-primary">Hasil Perhitungan Profile Matching</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-success">
                    <tr>
                        <th class="text-center">Nama Alternatif</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Rekomendasi</th>
                    </tr>
                    </thead>
                    <?php
                    $rekomendasi = 1;
                    ?>
                    <?php arsort($nilai_ahir); 
                    foreach ( $nilai_ahir as $nkk=>$val ) : ?>
                        <tr>
                                <?php $nama=query("SELECT * FROM alternatif WHERE kode_alternatif='$nkk'") ?>
                            <td class="text-center"><?=$nama[0]['nama_alternatif']; ?></td>
                            <td class="text-center"><?=$val; ?></td>
                            <td class="text-center"><?php echo $rekomendasi; ?></td>
                        </tr>
                        <?php 
                            $rekomendasi++;
                        ?>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="card col-md-12 bg-light">
            <div class="card-body">
                <p>
                <a href="konsultasi.php" class="btn btn-primary mt-3">Kembali</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#yangDipilih" role="button" aria-expanded="false" aria-controls="collapseExample">Kriteria Dipilih</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#nilaiProfil" role="button" aria-expanded="false" aria-controls="collapseExample">Nilai Profil Alternatif</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#selisih" role="button" aria-expanded="false" aria-controls="collapseExample">Nilai Selisih</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#konversiGap" role="button" aria-expanded="false" aria-controls="collapseExample">Konversi Nilai GAP</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#nilaiCF" role="button" aria-expanded="false" aria-controls="collapseExample">Nilai Core Factor</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#nilaiSF" role="button" aria-expanded="false" aria-controls="collapseExample">Nilai Secondary Factor</a>
                <a class="btn btn-outline-primary mt-3" data-toggle="collapse" href="#nilaiAkhir" role="button" aria-expanded="false" aria-controls="collapseExample">Nilai AKhir</a>
                </p>
            </div>

            <div class="collapse" id="yangDipilih">
            <div class="card card-body">
            <h5>Kriteria Lahan Yang Dipilih</h5>
                <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <tr>
                        <?php foreach ( $kriteria as $ktr ) : ?>
                            <th class="text-center"><?php echo $ktr['nama_kriteria']; ?>  </th>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td class="text-center">
                        <?php 
                        if ( $kedalaman == 4 ){
                            echo "< 20 cm (Sangat Dangkal)";
                        }else if($kedalaman == 3){
                            echo "20 - 50 cm (Dangkal)";
                        }else if ($kedalaman == 2 ){
                            echo "51 - 75 cm ( Sedang )";
                        }else{
                            echo "> 75 cm (Dalam)";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $kelembaban == 4 ){
                            echo "> 80 % ";
                        }else if($kelembaban == 3){
                            echo "51 - 80 %";
                        }else if ($kelembaban == 2 ){
                            echo "25 - 50 %";
                        }else{
                            echo "< 25 %";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $tekstur == 4 ){
                            echo "Lempung";
                        }else if($tekstur == 3){
                            echo "Liat Berpasir";
                        }else if ($tekstur == 2 ){
                            echo "Liat";
                        }else{
                            echo "Lempung Berpasir";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $temperatur == 4 ){
                            echo "Hangat";
                        }else if($temperatur == 3){
                            echo "Panas";
                        }else if ($temperatur == 2 ){
                            echo "Sejuk";
                        }else{
                            echo "Dingin";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $bahankasar == 4 ){
                            echo "Sedikit";
                        }else if($bahankasar == 3){
                            echo "Sedang";
                        }else if ($bahankasar == 2 ){
                            echo "Banyak";
                        }else{
                            echo "Sangat Banyak";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $kematanganGambut == 4 ){
                            echo "Hemik(Setengah Matang )";
                        }else if($kematanganGambut == 3){
                            echo "Saprik (Matang )";
                        }else if ($kematanganGambut == 2 ){
                            echo "Saprik+(Sangat Matang)";
                        }else{
                            echo "Fibrik(Belum Matang)";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $drainase == 4 ){
                            echo "Cepat";
                        }else if($drainase == 3){
                            echo "Baik";
                        }else if ($drainase == 2 ){
                            echo "Sedang";
                        }else{
                            echo "Sangat Terhambat";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $bahayaErosi == 4 ){
                            echo "Sangat Ringan (<0,15 cm/tahun)";
                        }else if($bahayaErosi == 3){
                            echo "Ringan (0,15 - 0,9 cm /tahun) ";
                        }else if ($bahayaErosi == 2 ){
                            echo "Sedang (0,9 - 1,8 cm /tahun)";
                        }else{
                            echo "Berat ( 1,8 - 4,8 cm /tahun )";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $ketebalanGambut == 4 ){
                            echo "Sedang ( 50 - 100 cm )";
                        }else if($ketebalanGambut == 3){
                            echo "Tebal ( 200 - 300 cm )";
                        }else if ($ketebalanGambut == 2 ){
                            echo "Tipis ( < 50 cm ) ";
                        }else{
                            echo "Sangat Tebal ( > 300 cm ) ";
                        }
                        ?>
                        </td>
                        <td class="text-center">
                        <?php 
                        if ( $genangan == 4 ){
                            echo "< 25 cm";
                        }else if($genangan == 3){
                            echo "25 - 50 cm";
                        }else if ($genangan == 2 ){
                            echo "50 - 150 cm";
                        }else{
                            echo "> 150 cm";
                        }
                        ?>
                        </td>
                    </tr>
                    <tr>
                    <td class="text-center"><?php echo $kedalaman ?></td>
                    <td class="text-center"><?php echo $kelembaban ?></td>
                    <td class="text-center"><?php echo $tekstur ?></td>
                    <td class="text-center"><?php echo $temperatur ?></td>
                    <td class="text-center"><?php echo $bahankasar ?></td>
                    <td class="text-center"><?php echo $kematanganGambut ?></td>
                    <td class="text-center"><?php echo $drainase ?></td>
                    <td class="text-center"><?php echo $bahayaErosi ?></td>
                    <td class="text-center"><?php echo $ketebalanGambut ?></td>
                    <td class="text-center"><?php echo $genangan ?></td>
                    </tr>
                </table>
                </div>
            </div>
            </div>

            <div class="collapse" id="nilaiProfil">
            <div class="card card-body">
            <h5>Nilai Profil Alternatif</h5>
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <tr class="text-center">
                        <th>Nama Alternatif</th>
                        <?php foreach ( $kriteria as $ktr ) : ?>
                            <th class="text-center"><?php echo $ktr['nama_kriteria']; ?>  </th>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                    <?php
                        foreach ( $nilaiStandar as $ns ) :
                    ?>
                        <td class="text-center"><?php echo $ns['nama_alternatif'] ?></td>
                        <?php $nsb=$ns['kode_alternatif']; $nilai=query("SELECT * FROM profil_standar WHERE kode_alternatif='$nsb'"); foreach($nilai as $nil ):?>
                        <td class="text-center"><?= $nil["nilai"] ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
            </table>
            </div>
            </div>

            <div class="collapse" id="selisih">
            <div class="card card-body">
            <h5>Nilai Selisih</h5>
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                    <tr class="text-center">
                    <tr>
                        <th class="text-center">Nama Alternatif</th>
                        <?php foreach ( $kriteria as $ktr ) : ?>
                            <th class="text-center"><?php echo $ktr['nama_kriteria']; ?>  </th>
                        <?php endforeach; ?>
                    </tr>

                    <tr>
                    <?php 
                    foreach ( $nilaiStandar as $nt ) : 
                    ?>
                        <td class="text-center"><?= $nt['nama_alternatif'] ?></td>
                        <?php $nsc=$nt['kode_alternatif']; ?>              
                        <?php foreach ( $nilai_GAP[$nsc] as $gep ) : ?>
                            
                            <td class="text-center"><?= $gep; ?></td>   
                            
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                    </tr>
            </table>
            </div>
            </div>

            <div class="collapse" id="konversiGap">
            <div class="card card-body">
            <h5>Nilai Konversi GAP</h5>
            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                <tr>
                        <th class="text-center">Nama Alternatif</th>
                        <?php foreach ( $kriteria as $ktr ) : ?>
                            <th class="text-center"><?php echo $ktr['nama_kriteria']; ?>  </th>
                        <?php endforeach; ?>
                    </tr>
                    <?php foreach ( $nilaiStandar as $nk ) : ?>
                        <tr>
                                <td class="text-center"><?= $nk['nama_alternatif'] ?></td>
                                <?php $nss=$nk['kode_alternatif']; ?>
                                <?php foreach ( $terbobot[$nss] as $bot ) : ?>
                                            
                                            <td class="text-center"><?= $bot; ?></td>
                                <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
            </table>
            </div>
            </div>

            <div class="collapse" id="nilaiCF">
            <div class="card card-body">
            <h5>Nilai Core Factor</h5>
            <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-success">
                <tr>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">nCF</th>
                </tr>
                </thead>

                <?php foreach ($nilaiStandar as $nk ) : ?>
                <tr>
                        <td class="text-center"><?= $nk['nama_alternatif'] ?></td>
                        <?php $nss=$nk['kode_alternatif']; ?>
                        <td class="text-center"><?= $NCF[$nss]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            </div>
            </div>

            <div class="collapse" id="nilaiSF">
            <div class="card card-body">
            <h5>Nilai Secondary Factor</h5>
            <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-success">
                <tr>
                    <th class="text-center">Nama Alternatif</th>
                    <th class="text-center">nSF</th>
                </tr>
                </thead>

                <?php foreach ($nilaiStandar as $nk ) : ?>
                <tr>
                        <td class="text-center"><?= $nk['nama_alternatif'] ?></td>
                        <?php $nss=$nk['kode_alternatif']; ?>
                        <td class="text-center"><?= $SF[$nss]; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            </div>
            </div>

            <div class="collapse" id="nilaiAkhir">
            <div class="card card-body">
            <h5>Nilai Akhir</h5>
            <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-success">
                    <tr>
                        <th class="text-center">Nama Alternatif</th>
                        <th class="text-center">Nilai Akhir</th>
                    </tr>
                    </thead>
                    <?php foreach ( $nilaiStandar as $nk ) : ?>
                        <tr>
                                <td class="text-center"><?= $nk['nama_alternatif'] ?></td>
                                <?php $nss=$nk['kode_alternatif']; ?>
                                <td class="text-center"><?= $nilai_ahir[$nss]; ?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
            </div>
            </div>

            <!-- <form method="POST">
                <input type="text" class="form-control mt-2 mb-1" name="keterangan" placeholder="isi keterangan simpan nama tempat" required>
                <button class="btn btn-primary float-left mb-3" type="submit" name="simpan">Simpan Hasil</button>
            </form> -->
        </div>
    </div>




    <!-- footer -->
    <div class="row footer">
            <div class="col text-center">
                <p>( 2021 ) Copyright Buday <a href="admin/login.php">Day Corporate</a> </p>
            </div>
        </div>
    <!-- akhir footer -->

    

<!-- bootstrap javascript -->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Page level plugins -->
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="asset/js/demo/datatables-demo.js"></script>

<script>
    $(function(){
    $("dataTable").DataTable({
        "paging":false,
        "lengthChange":false,
        "searching": false,
        "ordering":false,
        "info":false,
        "autoWidth":false,
    });
    });
</script>



</body>
</html>
