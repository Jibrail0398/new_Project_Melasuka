<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Melasuka Apotek - Kesehatan Terpercaya di Pedesaan</title>
  <link rel="shortcut icon" type="image/png" href="../../../assets/images/logos/Logo Apotek Melasuka.jfif" />
  <link rel="stylesheet" href="../../../assets/css/style.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../../../index" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../../../assets/images/logos/Logo Apotek Melasuka.jfif" width="180" alt="logo melasuka">
                </a>
                
                <form class="row g-3" action="process-register.php" method="post" >
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="name" aria-describedby="textHelp"  required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                  </div>
                  <div class="col md-6 mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                  </div>
                  <div class="col md-6 mb-4">
                    <label for="passwordConfirm" class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="passwordConfirm" required>
                  </div>                          
                  <div class="mb-0">
                    <input class="form-check-input" type="radio" name="jeniskelamin" id="flexRadioDefault1" value="Laki-Laki" required>
                    <label for="jenisKelamin" class="form-label">Laki-Laki</label>
                  </div>
                  <div class="mb-0">
                    <input class="form-check-input" type="radio" name="jeniskelamin" id="flexRadioDefault1" value="Perempuan" required>
                    <label for="jenisKelamin" class="form-label">perempuan</label>
                  </div>
                  <input name="submit" type="submit" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Sudah punya akun?</p>
                    <a class="text-primary fw-bold ms-2" href="../login/login.php">Masuk disini</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>