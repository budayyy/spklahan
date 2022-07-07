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
        <h1 class="display-4">HALAMAN KONSULTASI </h1>
        <p class="lead">Silahkan Masukan Data Uji Lahan Yang Akan Di cari Dan Sistem Akan Memberikan Rekomendasi Terhadap anda</p>
    </div>
    </div>
    <!-- akhir jumbotron -->



    <!-- container -->
    <div class="container">

        <!-- info panel -->

        <div class="card justify-content-center">
            <div class=" text-center">
                <h5>~ <u>SILAHKAN MASUKAN DATA LAHAN YANG AKAN DIUJI..?</u> ~</h5>
            </div>
            <div class="card-body">

                <form action="hasil.php" method="post">                
                <!-- pertanyaan pertama -->
                <div class="form-group">
                        <label for="kedalaman" class="col-form-label">1. Berapakah Kedalaman Tanah Yang Anda Uji..?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="kedalaman" required>
                            <option >pilih</option>
                            <option value="4">< 20cm (Sangat Dangkal) </option>
                            <option value="3">20 - 50cm (Dangkal) </option>
                            <option value="2">51 - 75cm (Sedang) </option>
                            <option value="1">> 75 cm (Dalam) </option>
                        </select>
                </div>

                <!-- pertanyaan kedua -->
                <div class="form-group">
                        <label for="kelembaban" class="col-form-label">2. Berapakah Kelembaban tanah yang anda uji..?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="kelembaban" required>
                            <option >pilih</option>
                            <option value="1">< 25%</option>
                            <option value="2">25 - 50%</option>
                            <option value="3">51 - 80%</option>
                            <option value="4">> 80%</option>
                        </select>
                </div>

                <!-- pertanyaan ketiga -->
                <div class="form-group">
                        <label for="tekstur" class="col-form-label">3. Apakah tekstur tanah yang digunakan</label>
                        <select class="form-control form-select" aria-label="Default select example" name="tekstur" required>
                            <option >pilih</option>
                            <option value="3">Liat Berpasir</option>
                            <option value="4">Lempung</option>
                            <option value="1">Lempung Berpasir</option>
                            <option value="2">Liat</option>
                        </select>
                </div>

                <!-- pertanyaan keempat -->
                <div class="form-group">
                        <label for="temperatur" class="col-form-label">4. Temperatur apa yang anda cari...</label>
                        <select class="form-control form-select" aria-label="Default select example" name="temperatur" required>
                            <option >pilih</option>
                            <option value="1">Dingin</option>
                            <option value="2">Sejuk</option>
                            <option value="4">Hangat</option>
                            <option value="3">Panas</option>
                        </select>
                </div>

                <!-- pertanyaan kelima -->
                <div class="form-group">
                        <label for="bahankasar" class="col-form-label">5. Berapakah Bahan Kasar Yang Diperlukan...?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="bahankasar" required>
                            <option >pilih</option>
                            <option value="4">Sedikit</option>
                            <option value="3">Sedang</option>
                            <option value="2">Banyak</option>
                            <option value="1">Sangat Banyak</option>
                        </select>
                </div>

                <!-- pertanyaan keenam -->
                <div class="form-group">
                        <label for="kematanganGambut" class="col-form-label">6. Berapakah Kematangan Gambut Lahan Yang Diperlukan...?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="kematanganGambut" required>
                            <option >pilih</option>
                            <option value="3">Saprik</option>
                            <option value="4">Hemik</option>
                            <option value="2">Hemik+</option>
                            <option value="1">Fibrik</option>
                        </select>
                </div>

                <!-- pertanyaan ketujuh -->
                <div class="form-group">
                <label for="drainase" class="col-form-label">7. apakah Ada Drainase nya...?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="drainase" required>
                            <option >pilih</option>
                            <option value="1">Sangat Terhambat</option>
                            <option value="2">Sedang</option>
                            <option value="3">Baik</option>
                            <option value="4">Cepat</option>
                        </select>
                </div>

                <!-- pertanyaan kedelapan -->
                <div class="form-group">
                        <label for="bahayaErosi" class="col-form-label">8. apakah ada Bahaya Erosi ...?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="bahayaErosi" required>
                            <option >pilih</option>
                            <option value="4">Sangat Rendah</option>
                            <option value="3">Rendah</option>
                            <option value="2">Sedang</option>
                            <option value="1">Berat</option>
                        </select>
                </div>

                <!-- pertanyaan sembilan -->
                <div class="form-group">
                <label for="ketebalanGambut" class="col-form-label">9. berapakah Ketebalan Gambutnya...?</label>
                        <select class="form-control form-select" aria-label="Default select example" name="ketebalanGambut" required>
                            <option >pilih</option>
                            <option value="2">Tipis</option>
                            <option value="4">Sedang</option>
                            <option value="3">Tebal</option>
                            <option value="1">Sangat Tebal</option>
                        </select>
                </div>

                
                <!-- pertanyaan sepuluh -->
                <div class="form-group">
                        <label for="genangan" class="col-form-label">10. berapakah kedalaman genangan pada lahan yang anda cari...</label>
                        <select class="form-control form-select" aria-label="Default select example" name="genangan" required>
                            <option >pilih</option>
                            <option value="4">< 25 cm </option>
                            <option value="3">20 - 50 cm</option>
                            <option value="2">50 - 150 cm</option>
                            <option value="1">> 150 cm</option>
                        </select>
                </div>

                </div>
                <div class=" text-center">
                    <button type="submit" name="button" class="btn btn-primary">Proses</button>
                </div>
                </form>
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
</body>
</html>