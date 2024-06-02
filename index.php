<?php
require 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Buku Tamu</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="flexstart/img/bps.png" rel="icon">
    <link href="flexstart/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="flexstart/vendor/aos/aos.css" rel="stylesheet">
    <link href="flexstart/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="flexstart/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="flexstart/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="flexstart/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="flexstart/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="flexstart/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="flexstart/img/logo.png" alt="">
                <span>Buku Tamu</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#values">Daftar Tamu</a></li>

                    <li><a class="getstarted scrollto" href="login.php">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Layanan Lengkap di Satu Tempat</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Buku Tamu Digital untuk Semua Keperluan Anda di Badan
                        Pusat Statistik</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="#values" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Daftar Tamu</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="flexstart/img/pngegg.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Silahkan Daftar</p>
                </header>

                <form action="daftar-tamu/tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_lengkap">Nama Lengkap Tamu</label>
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap Tamu">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                            <option value="">--Silahkan Pilih--</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_tlp">No.Telephone</label>
                                        <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan No.Telephone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="asal_tamu">Asal Tamu</label>
                                        <select class="form-control" name="asal_tamu" id="asal_tamu">
                                            <option value="">--Silahkan Pilih--</option>
                                            <option value="Instansi">Instansi</option>
                                            <option value="Lembaga">Lembaga</option>
                                            <option value="Organisasi">Organisasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pegawai_id">Bertemu :</label>
                                        <select class="form-control" name="pegawai_id" id="pegawai_id">
                                            <option value="">--Silahkan Pilih--</option>
                                            <?php
                                            $sqlPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai");
                                            while ($pegawai = mysqli_fetch_assoc($sqlPegawai)) {
                                            ?>
                                                <option value="<?= $pegawai["pegawai_id"]; ?>">
                                                    <?= $pegawai["nama_pegawai"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keperluan_id">Keperluan :</label>
                                        <select class="form-control" name="keperluan_id" id="keperluan_id">
                                            <option value="">--Silahkan Pilih--</option>
                                            <?php
                                            $sqlKeperluan = mysqli_query($conn, "SELECT * FROM tb_keperluan");
                                            while ($keperluan = mysqli_fetch_assoc($sqlKeperluan)) {
                                            ?>
                                                <option value="<?= $keperluan["keperluan_id"]; ?>">
                                                    <?= $keperluan["ket_keperluan"]; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-center mb-3"><strong>Unggah Gambar Tamu</strong></h6>
                            <div class="drop-zone">
                                <span class="drop-zone__prompt">Drop file here
                                    or
                                    click to upload</span>
                                <input type="file" name="image" class="drop-zone__input">
                            </div>
                            <button type="submit" class="btn btn-dark flex-auto mt-3" name="daftar">Daftar</button>
                        </div>

                    </div>
                </form>

            </div>

        </section><!-- End Values Section -->


    </main><!-- End #main -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="flexstart/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="flexstart/vendor/aos/aos.js"></script>
    <script src="flexstart/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="flexstart/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="flexstart/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="flexstart/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="flexstart/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="flexstart/js/main.js"></script>
    <script src="flexstart/js/script.js"></script>

</body>

</html>