<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap-4.4.1/css/bootstrap.min.css">

    <!-- my font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- my css -->
    <link rel="stylesheet" href="cssmanual/style.css">

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
        <h1 class="display-4">SISTEM PENDUKUNG KEPUTUSAN </h1>
        <p class="lead">Penyesuaian Lahan Untuk Tanaman Pangan Berdasarkan Tanah Dengan Metode Profile Matching</p>
        <a href="konsultasi.php" class="tombol btn btn-primary">Mulai Uji</a>
    </div>
    </div>
    <!-- akhir jumbotron -->



    <!-- container -->
    <div class="container">

        <!-- info panel -->
        <div class="row justify-content-center">
            <div class="col-lg-10 info-panel">
                <div class="row text-center">
                    <div class="col">
                        <h6>BAGAIMANA SISTEM BEKERJA ??</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <img src="asset/img/admin.png" alt="admin" class="float-left">
                        <h4>Admin</h4>
                        <p> Admin Mengumpulkan data - data Tanaman Dan Kriteria yang akan digunakan pada Sistem</p>
                    </div>
                    <div class="col-lg">
                        <img src="asset/img/user.png" alt="user" class="float-left">
                        <h4>User</h4>
                        <p>User / Pengguna memberikan masukan berupa data uji lahan yang dicari</p>
                    </div>
                    <div class="col-lg">
                        <img src="asset/img/hasil.png" alt="hasil" class="float-left">
                        <h4>Hasil</h4>
                        <p>user atau pengguna akan mendapatkan hasil dari sistem</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir info panel -->


        <!-- pengertian -->
        <div class="row pengertian">
            <div class="col">
                <img src="asset/img/siparhan.png" alt="pengertian" class="img-fluid">
            </div>
            <div class="col">
                <h3>Apa Itu <span>SPKLAHAN??</span></h3>
                <p>SPKLAHAN merupakan sebuah Sistem Pendukung Keputusan Lahan yang dapat membantu pengguna atau orang - orang dalam berkonsultasi tentang penyesuaian lahan untuk tanaman pangan berdasarkan tanah dengan metode profile matching</p>
            </div>
        </div>
        <!-- akhir pengertian -->


        <!-- footer -->
        <div class="row footer">
            <div class="col text-center">
                <p> Copyright ( 2021 ) Buday <a href="admin/login.php">Day Corporate</a> </p>
            </div>
        </div>
        <!-- akhir footer -->

    </div>
    <!-- akhir container -->

    <script src="css/bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>