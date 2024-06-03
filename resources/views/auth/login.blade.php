<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
    <title>Login | GUDANG PINTAR</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Berry is made using Bootstrap 5 design framework. Download the free admin template & use it for your project."
    />
    <meta name="keywords" content="Berry, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template" />
    <meta name="author" content="CodedThemes" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />
 <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link" />
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" />
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="../assets/fonts/material.css" />
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" />
<link rel="stylesheet" href="../assets/css/style-preset.css" id="preset-style-link" />

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <div class="card my-5">
            <div class="card-body">
              <a class="d-flex justify-content-center">
                <B>GUDANG PINTAR</B>
              </a>
              <div class="row">
                <div class="d-flex justify-content-center">
                  <div class="auth-header">
                    <h2 class="text-secondary mt-5"><b>Hi, Welcome Back</b></h2>
                  </div>
                </div>
              </div>
              @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

              <h5 class="my-4 d-flex justify-content-center">Masukkan username dan password</h5>
              <form method="post" action="/">
                @csrf
                <div class="mb-3">
                  <label >Username</label>
                  <input type="text" name="username"  class="form-control @error('username') is-invalid @enderror" placeholder="Username" id="floatingInput">
                      @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                </div>
                <div class="mb-3">
                  <label >Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password">
                      @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                      @enderror
                </div>

                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-secondary">Masuk</button>
                </div>
              </form>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/pcoded.js"></script>

  </body>
  <!-- [Body] end -->
</html>
