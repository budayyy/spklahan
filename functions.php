<?php 

require 'koneksi.php';

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }

    return $rows;

}


function tambahAlternatif($data){
    global $conn;

    //ambil data dari tiap elemen
    
    $kode =  htmlspecialchars($data["kode_alternatif"]);

    $cek = count(query("SELECT kode_alternatif FROM alternatif WHERE kode_alternatif='$kode'"));
    if ( $cek>0 ){

        echo "<script>
                alert('Kode Sudah Ada')
              </script>
        ";
        return false;
    }
    
    $nama =  htmlspecialchars($data["nama_alternatif"]);

    //insert data
    $query = "INSERT INTO alternatif VALUES ('','$kode','$nama')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editAlternatif($data){
    global $conn;

    //ambil data dari elemen tiap form
    $id_alternatif = $data["id_alternatif"];
    $kode_alternatif = htmlspecialchars($data["kode_alternatif"]);
    $nama_alternatif = htmlspecialchars($data["nama_alternatif"]);

    //query update data
    $query = " UPDATE alternatif SET kode_alternatif= '$kode_alternatif', nama_alternatif= '$nama_alternatif' WHERE id_alternatif=$id_alternatif; ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function hapusAlternatif($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM alternatif WHERE id_alternatif = $id");

    return mysqli_affected_rows($conn);
}


function tambahNilaiGap($data){
    global $conn;

    //ambil data dari tiap elemen
    
    $selisih =  htmlspecialchars($data["selisih"]);
    $nilai =  htmlspecialchars($data["nilai_bobot"]);
    $keterangan =  htmlspecialchars($data["keterangan"]);

    //insert data
    $query = "INSERT INTO bobot VALUES ('','$selisih','$nilai','$keterangan')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);  
}


function editNilaiGap($data){
    global $conn;

    //ambil data dari elemen tiap form
    $id_bobot = $data["id_bobot"];
    $selisih = htmlspecialchars($data["selisih"]);
    $nilai_bobot = htmlspecialchars($data["nilai_bobot"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    //query update data
    $query = " UPDATE bobot SET selisih= '$selisih', nilai_bobot= '$nilai_bobot', keterangan= '$keterangan' WHERE id_bobot=$id_bobot; ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


function hapusNilaiGap($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM bobot WHERE id_bobot = $id");

    return mysqli_affected_rows($conn);
}


function tambahKriteria($data){
    global $conn;

    //ambil data dari tiap elemen
    
    $kode =  htmlspecialchars($data["kode_kriteria"]);
    $cek = count(query("SELECT kode_kriteria FROM kriteria WHERE kode_kriteria='$kode'"));
    if ( $cek>0 ){

        echo "<script>
                alert('Kode Sudah Ada')
              </script>
        ";
        return false;
    }
    $nama =  htmlspecialchars($data["nama_kriteria"]);
    $jenis =  htmlspecialchars($data["jenis_kriteria"]);

    //insert data
    $query = "INSERT INTO kriteria VALUES ('','$kode','$nama','$jenis')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editKriteria($data){
    global $conn;

    //ambil data dari elemen tiap form
    $id = $data["id_kriteria"];
    $kode = htmlspecialchars($data["kode_kriteria"]);
    $nama = htmlspecialchars($data["nama_kriteria"]);
    $jenis = htmlspecialchars($data["jenis_kriteria"]);

    //query update data
    $query = " UPDATE kriteria SET kode_kriteria= '$kode', nama_kriteria= '$nama', jenis_kriteria= '$jenis' WHERE id_kriteria=$id; ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


function hapusKriteria($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM kriteria WHERE id_kriteria = $id");

    return mysqli_affected_rows($conn);
}


function tambahNilaiAlternatif($data){

    global $conn;

    $kode_alternatif = htmlspecialchars($data["kode_alternatif"]);

    $jumlahKriteria = query("SELECT * FROM kriteria");
    foreach ( $jumlahKriteria as $jk ){
        $kode = $jk["kode_kriteria"];
        $nilai = htmlspecialchars($data["$kode"]);
        $query = "INSERT INTO profil_standar VALUES ('','$kode_alternatif','$kode','$nilai')";
        mysqli_query($conn,$query);
    }

    return mysqli_affected_rows($conn);
}


function editNilaiAlternatif($data) {

    global $conn;

    $id = htmlspecialchars($data["kode_alternatif"]);
    $cek = query("SELECT kode_kriteria FROM kriteria");
    foreach ( $cek as $key ) {

        $kode = $key["kode_kriteria"];
        $nilai = htmlspecialchars($data["$kode"]);
        $query = "UPDATE profil_standar SET nilai='$nilai' WHERE kode_alternatif='$id' AND kode_kriteria='$kode' ";
        mysqli_query($conn,$query);
    }
    return mysqli_affected_rows($conn);

}

function hapusNilaiAlternatif($id){


    global $conn;
    $query = "DELETE FROM profil_standar WHERE kode_alternatif='$id' ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubahPassword($data){
    global $conn;

    $id =  $_SESSION['admin'];
    $password1 = htmlspecialchars($data["password1"]);
    $password2 = htmlspecialchars($data["password2"]);

     //cek konfirmasi password
     if ( $password1 !== $password2 ) {
        echo "<script>
                alert( 'Konfirmasi Password Tidak Sesuai' );
              </script>";
        return false;
    }

    $password = password_hash($password1,PASSWORD_DEFAULT);
    mysqli_query($conn,"INSERT user SET password='$password' WHERE id='$id' ");

    return mysqli_affected_rows($conn);
}

function blockir_user(){
    echo "<script>
            alert( 'Anda Telah Diblokir' );
          </script>";
}

?>