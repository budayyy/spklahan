<?php 
session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}

$page = "kriteria";
require "../koneksi.php";
require "../functions.php";
include "../template/sidebar.php";
include "../template/topbar.php";

$kriteria = query("SELECT * FROM kriteria");


if ( isset($_POST["tambah"]) ){

    if(tambahKriteria($_POST)>0){
        echo"
           <script>
           alert('data berhasil ditambah');
           document.location.href='kriteria.php';
           </script>
           ";
          }else{
            echo"
           <script>
           alert('data gagal di tambah');
           document.location.href='kriteria.php';
           </script>
           ";
          }

}

if(isset($_POST["edit"])){
    
    if(editKriteria($_POST)>0){
      echo"
         <script>
         alert('data berhasil di ubah');
         document.location.href='kriteria.php';
         </script>
         ";
        }else{
          echo"
         <script>
         alert('data gagal di ubah');
         document.location.href='kriteria.php';
         </script>
         ";
        }
  }

  if(isset($_POST["hapus"])){

    if(hapusKriteria($_POST)>0){
      echo"
         <script>
         alert('data berhasil di hapus');
         document.location.href='kriteria.php';
         </script>
         ";
        }else{
          echo"
         <script>
         alert('data gagal di hapus');
         document.location.href='kriteria.php';
         </script>
         ";
        }
        
  }


?>


 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-judul">Kriteria</h1>

<!-- isi content -->
    <div class="card shadow mb-2">
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h6 class="m-0 font-weight-bold text-primary">List Data Kriteria</h6>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah</a>
        </div>
    </div>
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered table-display table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead class="table-success">
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kode</th>
            <th class="text-center">Nama Kriteria</th>
            <th class="text-center">Jenis Kriteria</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>

        <tbody>
        <?php $i=1;?>
        <?php foreach ($kriteria as $row):?>

            <tr>
              <td class="text-center"><?=$i;?></td>
              <td class="text-center"><?=$row['kode_kriteria'];?></td>
              <td class="text-center"><?=$row['nama_kriteria'];?></td>
              <td class="text-center"><?=$row['jenis_kriteria'];?></td>
              <td class="text-center">
                <form method="POST">
                  <button type="button" id="edit" name="edit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit<?= $row['id_kriteria']; ?>"> 
                  <i class="fas fa-edit"></i> Edit</button>

                  <a class="btn btn-danger btn-sm" href="hapuskriteria.php?id=<?php echo $row["id_kriteria"]; ?>" onclick="return confirm('apakah anda yakin ingin dihapus');"><i class="fas fa-trash-alt"></i> Delete</a>
                  
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
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
          <form method="POST" enctype="multipart/form-data">
            <div class="modal-header modal-bg" back>
              <h5 class="modal-title modal-text" id="modalTambahTitle">Form Alternatif</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <div class="modal-body">
                <form>
                  <input type="hidden" class="form-control mt-1" id="id" name="id"  required>
                  <div class="form-group">
                    <label for="kode_kriteria" class="col-form-label">Kode Kriteria :</label>
                    <input type="text" class="form-control mt-1" id="kode_kriteria" name="kode_kriteria"  required>
                  </div>

                  <div class="form-group">
                    <label for="nama_kriteria" class="col-form-label">Nama Kriteria :</label>
                    <input type="text" class="form-control mt-1" id="nama_kriteria" name="nama_kriteria"  required>
                  </div>

                  <div class="form-group">
                  <label for="jenis_kriteria" class="col-form-label">Jenis Kriteria :</label>
                        <select name="jenis_kriteria" id="jenis_kriteria" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="Core">Core Factor</option>
                            <option value="Secondary">Secondary Factor</option>
                        </select>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah </button>
                  </div>
      </div>
                </form>
              </div>
          </form>
        </div>
    </div>

  <!-- Modal Edit Data -->
    <?php foreach ($kriteria as $row)  : ?>
    <div class="modal fade" id="modalEdit<?=$row['id_kriteria'] ?>" tabindex="-2" role="dialog" aria-labelledby="modalEditDataTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
           <form method="post" enctype="multipart/form-data">
             <div class="modal-header modal-bg" back>
               <h5 class="modal-title modal-text" id="modalEditDataTitle">Form Edit Kriteria</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
              <form>
                  <input type="hidden" name="id_kriteria" class="form-control" value="<?=$row['id_kriteria'] ?>">

                  <div class="form-group">
                    <label for="kode_kriteria" class="col-form-label">Kode Kriteria :</label>
                    <input type="text" class="form-control mt-1" name="kode_kriteria" value="<?=$row['kode_kriteria'] ?>" required>
                  </div>

                  <div class="form-group">
                    <label for="nama_kriteria" class="col-form-label">Nama Kriteria :</label>
                    <input type="text" class="form-control mt-1" name="nama_kriteria" value="<?=$row['nama_kriteria'] ?>" required>
                  </div>

                  <div class="form-group">
                  <label for="jenis_kriteria" class="col-form-label">Jenis Kriteria :</label>
                        <select name="jenis_kriteria" id="jenis_kriteria" class="form-control" required>
                        <?php $id=$row["id_kriteria"]; $jenis = query("SELECT * FROM kriteria"); ?>
                        <?php foreach ( $jenis as $key ) : ?>
                        <?php if ( $key["jenis_kriteria"]==$id ) {
                          $select="selected";
                        }else{
                          $select="";
                        } 
                        echo "<option $select>".$key["jenis_kriteria"]."</option>"
                        ?>
                        <?php endforeach; ?>
                            <option value="">Pilih</option>
                            <option value="Core">Core Factor</option>
                            <option value="Secondary">Secondary Factor</option>
                        </select>
                  </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 <button type="submit" name="edit" class="btn btn-primary">Update</button>
               </div>
             </form>
           </div>
          </form>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

  <!-- Modal Hapus Data-->
     <!-- <?php foreach ($kriteria as $row)  : ?>
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