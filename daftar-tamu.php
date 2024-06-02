<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Daftar Tamu";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

$user = $_SESSION["username"];
$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
$admin = mysqli_fetch_assoc($query);
require 'layouts/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Tamu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Tamu</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title mt-2"><i class="fas fa-table"></i> Tabel Daftar Tamu</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telephone</th>
                                <th>Alamat Lengkap</th>
                                <th>Asal Tamu</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM tb_tamu");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $row['nama_lengkap']; ?></td>
                                <td><?= $row['jenis_kelamin']; ?></td>
                                <td><?= $row['no_tlp']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['asal_tamu']; ?></td>
                                <td>
                                    <img class="img-fluid rounded" src="daftar-tamu/image/<?= $row['img_dir']; ?>" alt="Profil" width="50" height="50">
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm ubah" data-toggle="modal" data-target="#showModal<?= $row["tamu_id"]; ?>"><i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Show Modal -->
                            <div class="modal fade" id="showModal<?= $row["tamu_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="#showModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="showModalLabel">Detail Data Tamu
                                                <strong><?= $row["nama_lengkap"]; ?></strong>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="tamu_id" value="<?= $row["tamu_id"]; ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nama_lengkap">Nama Lengkap Tamu</label>
                                                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $row["nama_lengkap"]; ?>" placeholder="Masukkan Nama Lengkap Tamu" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?= $row["jenis_kelamin"]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="no_tlp">No.Telephone</label>
                                                                <input type="text" class="form-control" name="no_tlp" id="no_tlp" value="<?= $row["no_tlp"]; ?>" placeholder="Masukkan No.Telephone" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="asal_tamu">Asal Tamu</label>
                                                                <input type="text" class="form-control" name="asal_tamu" id="asal_tamu" value="<?= $row["asal_tamu"]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="pegawai_id">Bertemu :</label>
                                                                <?php
                                                                $pegawai_id = $row["pegawai_id"];
                                                                $sqlPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE pegawai_id = $pegawai_id");
                                                                $pegawai = mysqli_fetch_assoc($sqlPegawai);
                                                                ?>
                                                                <input type="text" class="form-control" name="pegawai_id" id="pegawai_id" value="<?= $pegawai["nama_pegawai"]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="keperluan_id">Keperluan :</label>
                                                                <?php
                                                                $keperluan_id = $row["keperluan_id"];
                                                                $sqlKeperluan = mysqli_query($conn, "SELECT * FROM tb_keperluan WHERE keperluan_id = $keperluan_id");
                                                                $keperluan = mysqli_fetch_assoc($sqlKeperluan);
                                                                ?>
                                                                <input type="text" class="form-control" name="keperluan_id" id="keperluan_id" value="<?= $keperluan["ket_keperluan"]; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat Lengkap</label>
                                                        <textarea class="form-control" name="alamat" id="alamat" rows="3" readonly><?= $row["alamat"]; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6 class="text-center mb-3"><strong>Gambar Profil Tamu</strong></h6>
                                                    <img class="img-fluid border border-dark rounded" src="daftar-tamu/image/<?= $row['img_dir']; ?>" alt="Profil">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php $i++; ?>

                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>