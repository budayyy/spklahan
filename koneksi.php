<?php 

//koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$db = "splahan";

$conn = mysqli_connect($host,$username,$password,$db);

if (!$conn){
    echo "koneksi ke database Gagal";
    exit;
}

?>