<?php
session_start();
require '../functions.php';

$keperluan_id = $_GET["keperluan_id"];

if (hapus_keperluan($keperluan_id) > 0) {
    $_SESSION['status'] = "Data Keperluan";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil DiHapus!";
    header("Location: ../keperluan.php");
} else {
    $_SESSION['status'] = "Data Keperluan";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal DiHapus!";
    header("Location: ../keperluan.php");
}