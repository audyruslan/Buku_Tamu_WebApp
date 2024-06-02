<?php
session_start();
require '../functions.php';

$pegawai_id = $_GET["pegawai_id"];

if (hapus_pegawai($pegawai_id) > 0) {
    $_SESSION['status'] = "Data Pegawai";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil Pegawai!";
    header("Location: ../pegawai.php");
} else {
    $_SESSION['status'] = "Data Pegawai";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal Pegawai!";
    header("Location: ../pegawai.php");
}