<?php

session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}

$page = "editnilaialternatif";
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
<h1 class="h3 mb-4 text-judul">Edit Nilai Alternatif</h1>

<!-- isi content -->
    <div class="card shadow mb-2">
      <div class="card-body">
      <div class="table-responsive">

      <form method="post" enctype="multipart/form-data">
             <div class="modal-header modal-bg" back>
               <h5 class="modal-title modal-text" id="modalEditDataTitle">Form Edit Alternatif</h5>
              
             </div>
             <div class="modal-body">
            
              <table class="table " id="dataTable" width="100%" cellspacing="0">
                  <tr>
                  <input type="hidden" name="id" class="form-control">
                  <div class="form-group">
                    <label for="nama_alternatif" class="col-form-label">Nama Alternatif :</label>
                    <input type="text" class="form-control mt-1" name="kode_alternatif" required>
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
               <div class="text-center">
                 <a class="btn btn-secondary" href="nilaialternatif.php">Kembali</a>
                 <button type="submit" name="edit" class="btn btn-primary">Update</button>
               </div>
          </form>

      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->

<?php include "../template/footer.php"; ?>