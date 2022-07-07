<?php 

session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}

$page="ubahpassword";
require "../koneksi.php";
require "../functions.php";
include "../template/sidebar.php";
include "../template/topbar.php";

if (isset($_POST["ubah"]) ){
// var_dump($_POST);die;
    if (ubahPassword($_POST)>0){
        echo"
        <script>
        alert('data berhasil diubah');
        document.location.href='index.php';
        </script>
        ";
       }else{
         echo"
        <script>
        alert('data gagal di ubah');
        document.location.href='index.php';
        </script>
        ";
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-judul">Ubah Password</h1>


    <!-- baris -->
    <div class="row">

<!-- Alternatif -->
<div class="col-xl-5 col-md-6 mb-4">
<div class="card shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <form action="" method="POST">

                  <div class="form-group">
                        <label for="password1" class="col-form-label">Id admin <span style="color:red;">*</span></label>
                        <input  class="form-control mt-1" name="id<?php $_SESSION['admin']  ?>" value="<?php echo $_SESSION['admin'] ?>" required>
                  </div>

                  <div class="form-group">
                        <label for="password1" class="col-form-label">Password Baru <span style="color:red;">*</span></label>
                        <input type="password" class="form-control mt-1" name="password1" required>
                  </div>

                  <div class="form-group">
                        <label for="password2" class="col-form-label">Konfirmasi Password Baru <span style="color:red;">*</span></label>
                        <input type="password" class="form-control mt-1" name="password2" required>
                  </div>

                  <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</div>

</div>
<!-- /.container-fluid -->


<?php include "../template/footer.php"; ?>