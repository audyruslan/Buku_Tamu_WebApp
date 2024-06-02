<?php
session_start();
require '../functions.php';

function tambah_pegawai($data)
{
    global $conn;

    $nik_pegawai = $data['nik_pegawai'];
    $nama_pegawai = $data['nama_pegawai'];
    $tgl_lahir_pegawai = $data['tgl_lahir_pegawai'];
    $pendidikan_pegawai = $data['pendidikan_pegawai'];
    $alamat_pegawai = $data['alamat_pegawai'];
    $istri_pegawai = $data['istri_pegawai'];
    $anak_pegawai = $data['anak_pegawai'];

    $query = "INSERT INTO tb_pegawai
				VALUES 
				('','$nik_pegawai','$nama_pegawai','$tgl_lahir_pegawai','$pendidikan_pegawai','$alamat_pegawai','$istri_pegawai','$anak_pegawai')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Pegawai
if (isset($_POST["tambah"])) {

    if (tambah_pegawai($_POST) > 0) {
        $_SESSION['status'] = "Data Pegawai";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Ditambahkan!";
        header("Location: ../pegawai.php");
    } else {
        $_SESSION['status'] = "Data Pegawai";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Ditambahkan!";
        header("Location: ../pegawai.php");
    }
}
