<?php
session_start();
require '../functions.php';

function tambah_keperluan($data)
{
    global $conn;

    $ket_keperluan = $data['ket_keperluan'];

    $query = "INSERT INTO tb_keperluan
                (ket_keperluan)
				VALUES 
				('$ket_keperluan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Data Menu
if (isset($_POST["tambah"])) {

    if (tambah_keperluan($_POST) > 0) {
        $_SESSION['status'] = "Data Keperluan";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Terkirim";
        header("Location: ../keperluan.php");
    } else {
        $_SESSION['status'] = "Data Keperluan";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Terkirim";
        header("Location: ../keperluan.php");
    }
}