<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gudang Pintar SMK</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
    <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" />
    <link rel="stylesheet" href="../assets/fonts/material.css" />
    <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" />
    <link rel="stylesheet" href="../assets/css/style-preset.css" id="preset-style-link" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  </head>

  <body>
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <header class="pc-header">
      <div class="m-header">
        <a href="dashboard" class="b-brand">
          <h3 class="text-secondary">GUDANG PINTAR</h3>
        </a>
        <div class="pc-h-item">
          <a href="#" class="pc-head-link head-link-secondary m-0" id="sidebar-hide"><i class="ti ti-menu-2"></i></a>
        </div>
      </div>
      <div class="header-wrapper">
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <li class="pc-h-item header-mobile-collapse">
            <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse"><i class="ti ti-menu-2"></i></a>
          </li>
          <li class="dropdown pc-h-item d-inline-flex d-md-none">
            <a class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false"><i class="ti ti-search"></i></a>
            <div class="dropdown-menu pc-h-dropdown drp-search">
              <form class="px-3">
                <div class="form-group mb-0 d-flex align-items-center">
                  <i class="ti ti-search"></i>
                  <input type="search" class="form-control border-0 shadow-none" placeholder="Search here..." />
                </div>
              </form>
            </div>
          </li>
          <li class="pc-h-item d-none d-md-inline-flex">
            <form class="header-search">
              <i class="ti ti-search icon-search"></i>
              <input type="search" class="form-control" placeholder="Search here..." />
            </form>
          </li>
        </ul>
      </div>
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item header-user-profile">
            <a class="pc-head-link head-link-primary dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
              <img src="../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
              <span><i class="ti ti-settings"></i></span>
            </a>
            <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
              <div class="dropdown-header">
                <h4>Selamat Datang, <span class="small text-muted"> Operator</span></h4>
                <p class="text-muted">Operator</p>
                <hr />
                <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
                  <a href="https://drive.google.com/drive/folders/1lAczCHhkkBHqlaP8SEGK4g_nlGvt25W0?usp=drive_link" target="_blank" class="btn dropdown-item"><i class="fa-solid fa-address-book"></i><span>Manual User</span></a>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn dropdown-item"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></button>
                  </form>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </header>

    {{-- Sidebar --}}
    <nav class="pc-sidebar">
      <div class="navbar-wrapper">
        <div class="m-header">
          <a href="index.html" class="b-brand">
            <img src="../assets/images/logo-dark.svg" alt="" class="logo logo-lg" />
          </a>
        </div>
        <div class="navbar-content">
          <ul class="pc-navbar">
            <li class="pc-item pc-caption">
              <label>Dashboard</label>
            </li>
            <li class="pc-item">
              <a href="dashboard" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-house-chimney"></i></i></span><span class="pc-mtext">Dashboard</span></a>
            </li>
            <li class="pc-item pc-caption">
              <label>Inventaris</label>
            </li>
            <li class="pc-item">
              <a href="peminjamanoperator" class="pc-link"><span class="pc-micon"><i class="fa-solid fa-file-circle-plus"></i></span><span class="pc-mtext">Peminjaman</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="pc-container">
      <div class="pc-content">
        <!-- [ Main Content ] -->
          @yield('content')
      </div>
    </div>

    <footer class="pc-footer">
      <div class="footer-wrapper container-fluid">
        <div class="row">
          <div class="col my-1">
            <p class="m-0">nadnad</p>
          </div>
          <div class="col-auto my-1">
            <p>Semangat Semua!</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/pcoded.js"></script>

    <script src="../assets/js/plugins/apexcharts.min.js"></script>
    <script src="../assets/js/pages/dashboard-default.js"></script>
  </body>
</html>