<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Data Pegawai";
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
                    <h1 class="m-0">Data Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
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
                        <h3 class="card-title mt-2"><i class="fas fa-table"></i> Tabel Data Pegawai</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
                            Tambah Pegawai
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegawai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="pegawai/tambah.php" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nik_pegawai">NIK Pegawai</label>
                                                        <input type="text" class="form-control" name="nik_pegawai" id="nik_pegawai" placeholder="NIK Pegawai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama_pegawai">Nama Pegawai</label>
                                                        <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="tgl_lahir_pegawai">TGL Lahir Pegawai</label>
                                                        <input type="date" class="form-control" name="tgl_lahir_pegawai" id="tgl_lahir_pegawai" placeholder="TGL Lahir Pegawai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="pendidikan_pegawai">Pendidikan
                                                            Pegawai</label>
                                                        <input type="text" class="form-control" name="pendidikan_pegawai" id="pendidikan_pegawai" placeholder="Pendidikan Pegawai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="istri_pegawai">Istri Pegawai</label>
                                                        <input type="number" class="form-control" name="istri_pegawai" id="istri_pegawai" placeholder="Istri Pegawai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="anak_pegawai">Anak
                                                            Pegawai</label>
                                                        <input type="number" class="form-control" name="anak_pegawai" id="anak_pegawai" placeholder="Anak Pegawai">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat_pegawai">Alamat Pegawai</label>
                                                <textarea autocomplete="off" class="form-control" id="alamat_pegawai" name="alamat_pegawai" placeholder="Alamat Pegawai" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover text-center" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK Pegawai</th>
                                <th>Nama Pegawai</th>
                                <th>TGL Lahir Pegawai</th>
                                <th>Pendidikan Pegawai</th>
                                <th>Alamat Pegawai</th>
                                <th>Istri Pegawai</th>
                                <th>Anak Pegawai</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <?php
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM tb_pegawai");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                            <tr>
                                <td><?= $i; ?>.</td>
                                <td><?= $row['nik_pegawai']; ?></td>
                                <td><?= $row['nama_pegawai']; ?></td>
                                <td><?= tgl_indo($row["tgl_lahir_pegawai"]); ?></td>
                                <td><?= $row['pendidikan_pegawai']; ?></td>
                                <td><?= $row['alamat_pegawai']; ?></td>
                                <td><?= $row['istri_pegawai']; ?></td>
                                <td><?= $row['anak_pegawai']; ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm ubah" data-toggle="modal" data-target="#EditModal<?= $row["pegawai_id"]; ?>"><i class="fas fa-edit"></i> </a>
                                    <a class="btn btn-danger btn-sm hapus_pegawai" href="pegawai/hapus.php?pegawai_id=<?= $row["pegawai_id"]; ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="EditModal<?= $row["pegawai_id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="#EditModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="EditModalLabel">Ubah Data Pegawai</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="pegawai/ubah.php" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="pegawai_id" value="<?= $row["pegawai_id"]; ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nik_pegawai">NIK Pegawai</label>
                                                            <input type="text" class="form-control" name="nik_pegawai" id="nik_pegawai" value="<?= $row["nik_pegawai"]; ?>" placeholder="NIK Pegawai">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nama_pegawai">Nama Pegawai</label>
                                                            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $row["nama_pegawai"]; ?>" placeholder="Nama Pegawai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tgl_lahir_pegawai">TGL Lahir Pegawai</label>
                                                            <input type="date" class="form-control" name="tgl_lahir_pegawai" value="<?= $row["tgl_lahir_pegawai"]; ?>" id="tgl_lahir_pegawai" placeholder="TGL Lahir Pegawai">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="pendidikan_pegawai">Pendidikan
                                                                Pegawai</label>
                                                            <input type="text" class="form-control" name="pendidikan_pegawai" id="pendidikan_pegawai" value="<?= $row["pendidikan_pegawai"]; ?>" placeholder="Pendidikan Pegawai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="istri_pegawai">Istri Pegawai</label>
                                                            <input type="number" class="form-control" name="istri_pegawai" id="istri_pegawai" value="<?= $row["istri_pegawai"]; ?>" placeholder="Istri Pegawai">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="anak_pegawai">Anak
                                                                Pegawai</label>
                                                            <input type="number" class="form-control" name="anak_pegawai" id="anak_pegawai" value="<?= $row["anak_pegawai"]; ?>" placeholder="Anak Pegawai">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_pegawai">Alamat Pegawai</label>
                                                    <textarea autocomplete="off" class="form-control" id="alamat_pegawai" name="alamat_pegawai" placeholder="Alamat Pegawai" rows="3"><?= $row["alamat_pegawai"]; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                                                <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
                                            </div>
                                        </form>
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