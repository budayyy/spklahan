<?php

session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}
require '../functions.php';
$id = $_GET["id"];

if ( hapusKriteria ($id) > 0 ) {
    echo "
        
    <script>
        alert('Data berhasil dihapus');
        document.location.href = 'kriteria.php'
    </script>

";
}else {
    echo "
        
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'kriteria.php'
    </script>

"; 
}

?>