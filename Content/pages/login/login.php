<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Melasuka Apotek - Kesehatan Terpercaya di Pedesaan</title>
  <link rel="shortcut icon" type="image/png" href="../../../assets/images/logos/Logo Apotek Melasuka.jfif"/>
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
          <div class="col-md-12 col-lg-6">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../../../assets/images/logos/Logo Apotek Melasuka.jfif" width="180" alt="">
                </a>
                
                <form class="needs-validation row g-3" method="post" action="process-login.php" novalidate>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan email" aria-describedby="emailHelp" required>
                    <div class="invalid-feedback">
                    Email Wajib Di isi!
                    </div>
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                    <div class="invalid-feedback">
                    Password Wajib Di isi!
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Ingat saya
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="./index.html">Lupa Password?</a>
                  </div>
                  <input type="submit" name="login" value="Masuk" class="btn btn-info w-100 py-8 fs-4 mb-2 rounded-2">
                  <a href="../register/register.php" class="btn btn-success w-100 py-8 fs-4 mb-4 rounded-2">Belum Punyak Akun?</a>
              
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
  <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
        </script>
</body>

</html>
