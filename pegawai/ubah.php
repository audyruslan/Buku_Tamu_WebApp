<?php
session_start();
require '../functions.php';

function ubah_pegawai($data)
{
    global $conn;
    $pegawai_id = $data["pegawai_id"];
    $nik_pegawai = $data['nik_pegawai'];
    $nama_pegawai = $data['nama_pegawai'];
    $tgl_lahir_pegawai = $data['tgl_lahir_pegawai'];
    $pendidikan_pegawai = $data['pendidikan_pegawai'];
    $alamat_pegawai = $data['alamat_pegawai'];
    $istri_pegawai = $data['istri_pegawai'];
    $anak_pegawai = $data['anak_pegawai'];


    $query = "UPDATE tb_pegawai
                SET
				nik_pegawai = '$nik_pegawai',
				nama_pegawai = '$nama_pegawai',
				tgl_lahir_pegawai = '$tgl_lahir_pegawai',
				pendidikan_pegawai = '$pendidikan_pegawai',
				alamat_pegawai = '$alamat_pegawai',
				istri_pegawai = '$istri_pegawai',
				anak_pegawai = '$anak_pegawai'
                WHERE pegawai_id = $pegawai_id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// Ubah Data
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["ubah"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah_pegawai($_POST) > 0) {
        $_SESSION['status'] = "Data Pegawai";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil DiUbah!";
        header("Location: ../pegawai.php");
    } else {
        $_SESSION['status'] = "Data Pegawai";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal DiUbah!";
        header("Location: ../pegawai.php");
    }
}