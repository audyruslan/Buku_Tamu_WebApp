<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
$title = "Data Keperluan";
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
                    <h1 class="m-0">Data Keperluan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Keperluan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-secondary">
                <div class="row">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary ml-2 mt-3 mb-3" data-toggle="modal"
                            data-target="#tambahModal">
                            Tambah Keperluan
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Keperluan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="keperluan/tambah.php" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="ket_keperluan">Keterangan Keperluan</label>
                                                <input type="text" autocomplete="off" class="form-control"
                                                    id="ket_keperluan" name="ket_keperluan"
                                                    placeholder="Masukkan Keperluan">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Kembali</button>
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Keterangan Keperluan</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <?php
                                $i = 1;
                                $sql = mysqli_query($conn, "SELECT * FROM tb_keperluan");
                                while ($row = mysqli_fetch_assoc($sql)) {
                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $row['ket_keperluan']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm ubah" data-toggle="modal"
                                            data-target="#EditModal<?= $row["keperluan_id"]; ?>"><i
                                                class="fas fa-edit"></i> </a>
                                        <a class="btn btn-danger btn-sm hapus_keperluan"
                                            href="keperluan/hapus.php?keperluan_id=<?= $row["keperluan_id"]; ?>"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="EditModal<?= $row["keperluan_id"]; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="#EditModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="EditModalLabel">Ubah Keperluan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="keperluan/ubah.php" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="keperluan_id"
                                                        value="<?= $row["keperluan_id"]; ?>">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="ket_keperluan">Keterangan Keperluan</label>
                                                                <textarea class="form-control" name="ket_keperluan"
                                                                    id="ket_keperluan"
                                                                    placeholder="Masukkan Keperluan"><?= $row["ket_keperluan"]; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Kembail</button>
                                                    <button type="submit" name="ubah"
                                                        class="btn btn-success">Ubah</button>
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
            </div>
        </div>
    </section>
</div>

<?php
require 'layouts/footer.php'; ?>