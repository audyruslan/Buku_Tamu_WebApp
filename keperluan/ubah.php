<?php
session_start();
require '../functions.php';

function ubah_keperluan($data)
{
    global $conn;
    $keperluan_id = $data["keperluan_id"];
    $ket_keperluan = $data['ket_keperluan'];

    $query = "UPDATE tb_keperluan 
                SET
				ket_keperluan = '$ket_keperluan'
                WHERE keperluan_id = $keperluan_id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_keperluan($_POST) > 0) {
        $_SESSION['status'] = "Data Keperluan";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Diubah!";
        header("Location: ../keperluan.php");
    } else {
        $_SESSION['status'] = "Data Keperluan";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Diubah!";
        header("Location: ../keperluan.php");
    }
}