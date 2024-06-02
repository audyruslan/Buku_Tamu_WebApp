<?php
session_start();
require '../functions.php';

function daftar_tamu($data)
{
    global $conn;

    $pegawai_id = $data['pegawai_id'];
    $keperluan_id = $data['keperluan_id'];
    $nama_lengkap = $data['nama_lengkap'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $no_tlp = $data['no_tlp'];
    $alamat = $data['alamat'];
    $asal_tamu = $data['asal_tamu'];

    $img_dir = ImgTamu($nama_lengkap);

    $query = "INSERT INTO tb_tamu
				VALUES 
				('','$pegawai_id','$keperluan_id','$nama_lengkap','$jenis_kelamin','$no_tlp','$alamat','$asal_tamu','$img_dir')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["daftar"])) {

    if (daftar_tamu($_POST) > 0) {
        header("Location: ../register-success.php");
    } else {
        header("Location: ../index.php");
    }
}
