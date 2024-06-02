<?php
session_start();
$title = "Administrator - Naive Bayes (NB)";
require 'layouts/header.php';
require 'layouts/navbar.php';
require 'functions.php';

if (isset($_SESSION["login"])) {
  $user = $_SESSION["username"];
  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$user'");
  $admin = mysqli_fetch_assoc($query);
}
require 'layouts/sidebar.php';
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Data Tamu</span>
              <span class="info-box-number">
                <?php
                $tamu = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_tamu"));
                ?>
                <?= $tamu; ?>
                <small>Tamu</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Data Pegawai</span>
              <span class="info-box-number">
                <?php
                $pegawai = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_pegawai"));
                ?>
                <?= $pegawai; ?>
                <small>Pegawai</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Admin</span>
              <span class="info-box-number">
                <?php
                $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin"));
                ?>
                <?= $mhs; ?>
                <small>Admin</small>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="callout callout-danger">
            <h5>
              <i class="fas fa-bullhorn"></i> Sistem Informasi Manajamen <strong>Buku Tamu</strong>!
            </h5>
            Sistem Informasi Manajemen Buku Tamu adalah sebuah aplikasi digital yang dirancang untuk
            mencatat dan mengelola
            kunjungan tamu dengan mudah dan efisien. Aplikasi ini memiliki beberapa menu utama yang membantu
            dalam pengelolaan data terkait kunjungan tamu, antara lain:</p>
            <ul>
              <li><strong>Daftar Tamu :</strong> Menu ini digunakan untuk menyimpan dan menampilkan
                informasi lengkap tentang tamu yang berkunjung, termasuk nama, waktu kunjungan, dan
                tujuan kunjungan.</li>
              <li><strong>Data Pegawai : </strong>Menu ini digunakan untuk mengelola informasi tentang
                pegawai yang terkait
                dengan kunjungan tamu, seperti pegawai yang menerima tamu atau yang bertanggung jawab
                atas tamu tersebut.</li>
              <li><strong>Data Keperluan : </strong>Menu ini digunakan untuk mendokumentasikan tujuan atau
                keperluan dari setiap kunjungan, sehingga memudahkan dalam pencarian dan pelacakan data
                kunjungan berdasarkan keperluan tertentu.</li>
            </ul>

            <p>Dengan Sistem Informasi Manajemen Buku Tamu, pencatatan dan pengelolaan kunjungan tamu
              menjadi lebih terstruktur dan mudah diakses.</p>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
require 'layouts/footer.php';
?>