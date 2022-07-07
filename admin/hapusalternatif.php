<?php

session_start();
if ( !isset($_SESSION["admin"]) ){
    header("location: login.php");
    exit;
}

require '../functions.php';
$id = $_GET["id"];

if ( hapusAlternatif ($id) > 0 ) {
    echo "
        
    <script>
        alert('Data berhasil dihapus');
        document.location.href = 'alternatif.php'
    </script>

";
}else {
    echo "
        
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'alternatif.php'
    </script>

"; 
}

?>