  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
          <?php
            if (empty($_SESSION["username"])) {
            ?>
          <img src="assets/img/logo.png" alt="InstaCode Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Buku Tamu</span>
          <?php } else { ?>
          <img src="assets/img/logo.png" alt="InstaCode Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Buku Tamu</span>
          <?php } ?>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <?php
            if (!empty($_SESSION["username"])) {
            ?>
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="admin/<?= $admin["img_dir"]; ?>" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block"><?= $admin["nama_lengkap"]; ?></a>
              </div>
          </div>
          <?php } ?>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="home.php" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <?php
                    if (!empty($_SESSION["username"])) {
                    ?>
                  <li class="nav-item">
                      <a href="admin.php" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Admin
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="daftar-tamu.php" class="nav-link">
                          <i class="nav-icon fas fa-address-book"></i>
                          <p>
                              Daftar Tamu
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pegawai.php" class="nav-link">
                          <i class="nav-icon fas fa-users"></i>
                          <p>
                              Data Pegawai
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="keperluan.php" class="nav-link">
                          <i class="nav-icon fas fa-clipboard-list"></i>
                          <p>
                              Data Keperluan
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="password.php" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Ubah Password
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="logout.php" data-toggle="modal" data-target="#logoutModal" class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>

                  <?php } ?>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>