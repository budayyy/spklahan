<?php 

session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}

$page = "nilaialternatif";
require "../koneksi.php";
require "../functions.php";
include "../template/sidebar.php";
include "../template/topbar.php";

$alternatif = query("SELECT * FROM alternatif ");
$kriteria = query("SELECT * FROM kriteria");


if ( isset($_POST["tambah"]) ){

    if(tambahNilaiAlternatif($_POST)>0){
        echo"
           <script>
           alert('data berhasil ditambah');
           document.location.href='nilaialternatif.php';
           </script>
           ";
          }else{
            echo"
           <script>
           alert('data gagal di tambah');
           document.location.href='nilaialternatif.php';
           </script>
           ";
          }

}

if(isset($_POST["edit"])){
    
    if(editNilaiAlternatif($_POST)>0){
      echo"
         <script>
         alert('data berhasil di ubah');
         document.location.href='nilaialternatif.php';
         </script>
         ";
        }else{
          echo"
         <script>
         alert('data gagal di ubah');
         document.location.href='nilaialternatif.php';
         </script>
         ";
        }
  }

  if(isset($_POST["hapus"])){

    if(hapusNilaiAlternatif($_POST)>0){
      echo"
         <script>
         alert('data berhasil di hapus');
         document.location.href='nilaiAlternatif.php';
         </script>
         ";
        }else{
          echo"
         <script>
         alert('data gagal di hapus');
         document.location.href='nilaiAlternatif.php';
         </script>
         ";
        }
        
  }


?>


 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-judul">Nilai Alternatif</h1>

<!-- isi content -->
    <div class="card shadow mb-2">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">List Data Nilai Alternatif</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah</a>
        </div>
    </div>
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-success">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Alternatif</th>
            <?php foreach ( $kriteria as $krit ) : ?>
            <th class="text-center"><?php echo $krit["nama_kriteria"]; ?></th>
            <?php endforeach; ?>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>

        
        <?php $i=1;?>
        <?php foreach ($alternatif as $row):?>
            <tbody>
            <tr>
              <td class="text-center"><?=$i;?></td>
              <td class="text-center"><?=$row['nama_alternatif'];?></td>

              <?php 
              $kode_alternatif = $row["kode_alternatif"];
              $nilai = query("SELECT * FROM profil_standar WHERE kode_alternatif='$kode_alternatif' ");
              ?>
              <?php foreach ( $nilai as $nil ) : ?>
                <!-- <td class="text-center"><?php echo $nil["nilai"]; ?></td> -->
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
                        </td>

              <?php endforeach; ?>
              <td class="text-center">
                <form method="POST">
                  <a class="btn btn-warning btn-sm" id="edit" href="editnilaialternatif.php?id=<?= $row['kode_alternatif']; ?>"><i class="fas fa-edit"></i></a>
                  
                  <a class="btn btn-danger btn-sm" href="hapusnilaialternatif.php?id=<?php echo $row["kode_alternatif"]; ?>" onclick="return confirm('apakah anda yakin ingin dihapus');"><i class="fas fa-trash-alt"></i></a>
                  
                  </form>     
             </td>
            </tr>
            <?php $i++;?>
          <?php endforeach; ?>
        </tbody>
      </table>
      </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modalTambah" tabindex="-2" role="dialog" aria-labelledby="modalTambahTitle" aria-hidden="true">
              </button>
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
          <form method="POST" enctype="multipart/form-data">
            <div class="modal-header modal-bg" back>
              <h5 class="modal-title modal-text" id="modalTambahTitle">Form Nilai Alternatif</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
              <div class="modal-body">

                <form>
                <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <tr>
                  <input type="hidden" class="form-control mt-1" id="id" name="id"  required>
                  <div class="form-group">
                        <select class="form-control form-select" aria-label="Default select example" name="kode_alternatif">
                            <option selected>Pilih Alternatif</option>
                        <?php foreach ( $alternatif as $row ) : ?>
                     <option value="<?php echo $row["kode_alternatif"]; ?>"><?= $row['nama_alternatif']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                  </tr>
                  
                  <tr>
                    <td>
                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Kedalaman :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C1">
                            <option selected>Pilih</option>
                            <option value="4">< 20 cm (4)</option>
                            <option value="3">20 - 50 cm (3)</option>
                            <option value="2">51 - 75 cm (2)</option>
                            <option value="1">> 75 cm (1)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Kelembaban :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C2">
                            <option selected>Pilih</option>
                            <option value="1">< 25 % (1)</option>
                            <option value="2">25 - 50 % (2)</option>
                            <option value="3">51 - 80 % (3)</option>
                            <option value="4">> 80 % (4)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Tekstur tanah :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C3">
                            <option selected>Pilih</option>
                            <option value="3">Liat Berpasir (3)</option>
                            <option value="4">Lempung (4)</option>
                            <option value="1">Lempung Berpasir (1)</option>
                            <option value="2">Liat (2)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Temperatur :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C4">
                            <option selected>Pilih</option>
                            <option value="1">Dingin (1)</option>
                            <option value="2">Sejuk (2)</option>
                            <option value="4">Hangat (4)</option>
                            <option value="3">Panas (3)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Bahan Kasar :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C5">
                            <option selected>Pilih</option>
                            <option value="4">Sedikit (4)</option>
                            <option value="3">Sedang (3)</option>
                            <option value="2">Banyak (2)</option>
                            <option value="1">Sangat Banyak (1)</option>
                        </select>
                    </div>
                    </td>
                    <td>
                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Kematangan Gambut :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C6">
                            <option selected>Pilih</option>
                            <option value="3">Saprik (3)</option>
                            <option value="4">Hemik (4)</option>
                            <option value="2">Hemik + (2)</option>
                            <option value="1">Fibrik (1)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Drainase :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C7">
                            <option selected>Pilih</option>
                            <option value="1">Sangat Terhambat (1)</option>
                            <option value="2">Sedang (2)</option>
                            <option value="3">Baik (3)</option>
                            <option value="4">Cepat (4)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Bahaya Erosi :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C8">
                            <option selected>Pilih</option>
                            <option value="4">Sangat Ringan (4)</option>
                            <option value="3">Ringan (3)</option>
                            <option value="2">Sedang (2)</option>
                            <option value="1">Berat (1)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Ketebalan Gambut :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C9">
                            <option selected>Pilih</option>
                            <option value="2">Tipis (2)</option>
                            <option value="4">Sedang (4)</option>
                            <option value="3">Tebal (3)</option>
                            <option value="1">Sangat Tebal (1)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Genangan :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C10">
                            <option selected>Pilih</option>
                            <option value="4">< 25 cm (4)</option>
                            <option value="3">26 - 50 cm (3)</option>
                            <option value="2">51 - 150 cm (2)</option>
                            <option value="1">> 150 cm(1)</option>
                        </select>
                    </div>
                    </td>
                    </tr>
                    </div>
          
                </table>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah </button>
                  </div>
              
              </div>
          </form>
        </div>
    </div>

    <!-- Modal Edit Data -->
    <?php foreach ($alternatif as $row)  : ?>
    <div class="modal fade" id="modalEdit<?=$row['kode_alternatif'] ?>" tabindex="-2" role="dialog" aria-labelledby="modalEditDataTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
           <form method="post" enctype="multipart/form-data">
             <div class="modal-header modal-bg" back>
               <h5 class="modal-title modal-text" id="modalEditDataTitle">Form Edit Alternatif</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
              <>
              <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <tr>
                  <input type="hidden" name="id" class="form-control">
                  <div class="form-group">
                    <label for="nama_alternatif" class="col-form-label">Nama Alternatif :</label>
                    <input type="text" class="form-control mt-1" name="kode_alternatif" value="<?=$row['nama_alternatif'] ?>" required>
                  </div>
                  </tr>

                  <tr>
                    <td>
                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Kedalaman :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C1">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Kelembaban :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C2">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Tekstur tanah :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C3">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Temperatur :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C4">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Bahan Kasar :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C5">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    </td>
                    <td>
                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Kematangan Gambut :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C6">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Drainase :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C7">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Bahaya Erosi :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C8">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Ketebalan Gambut :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C9">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kriteria" class="col-form-label">Genangan :</label>
                        <select class="form-control form-select" aria-label="Default select example" name="C10">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    </td>
                    </tr>
                    </div>
               </table>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" name="edit" class="btn btn-primary">Update</button>
               </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  <!-- Modal Hapus Data-->
     <!-- <?php foreach ($alternatif as $row)  : ?>
    <div class="modal fade" id="modalHapus<?=$row['id_alternatif'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="GET" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalHapusLabel">Konfirmasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?=$row['id_alternatif'] ?>">
                  <label class="text-center">Anda yakin ingin menghapus Alternatif <b><?=$row['nama_alternatif'] ?></b> ?</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="hapus" class="btn btn-primary">Delete</button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?> -->

  </div>
</div>
<!-- /.container-fluid -->

<?php include "../template/footer.php"; ?>