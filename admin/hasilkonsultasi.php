<?php 

$page = "hasilkonsultasi";
require "../koneksi.php";
require "../functions.php";
include "../template/sidebar.php";
include "../template/topbar.php";

$alternatif = query("SELECT * FROM alternatif");
$kriteria = query("SELECT * FROM kriteria");


if ( isset($_POST["tambah"]) ){

    if(tambahAlternatif($_POST)>0){
        echo"
           <script>
           alert('data berhasil ditambah');
           document.location.href='alternatif.php';
           </script>
           ";
          }else{
            echo"
           <script>
           alert('data gagal di tambah');
           document.location.href='alternatif.php';
           </script>
           ";
          }

}

if(isset($_POST["edit"])){
    
    if(editAlternatif($_POST)>0){
      echo"
         <script>
         alert('data berhasil di ubah');
         document.location.href='alternatif.php';
         </script>
         ";
        }else{
          echo"
         <script>
         alert('data gagal di ubah');
         document.location.href='alternatif.php';
         </script>
         ";
        }
  }

  if(isset($_POST["hapus"])){

    if(hapusAlternatif($_POST)>0){
      echo"
         <script>
         alert('data berhasil di hapus');
         document.location.href='alternatif.php';
         </script>
         ";
        }else{
          echo"
         <script>
         alert('data gagal di hapus');
         document.location.href='alternatif.php';
         </script>
         ";
        }
        
  }


?>


 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-judul">Hasil Konsultasi </h1>

<!-- isi content -->
    <div class="card shadow mb-2">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">List Data Hasil </h6>
        </div>
    </div>
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-success">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kode Konsultasi</th>
            <th class="text-center">Nama </th>
            <th class="text-center">alamat</th>
            <?php foreach ( $kriteria as $key ): ?>
                  <th><?php echo $key["nama_kriteria"]; ?></th>
            <?php endforeach; ?>
            <th Class="text-center">Rekomendasi Tanaman</th>
            <th class="text-center">Aksi</th>

          </tr>
        </thead>

        <tbody>
        
        </tbody>
      </table>
      </div>
    </div>

    
  </div>    
</div>
<!-- /.container-fluid -->

<?php include "../template/footer.php"; ?>