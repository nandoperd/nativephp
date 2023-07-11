<?php

    require_once "koneksi.php";
    require_once "fungsi.php";

    // cek submit register
    if (isset($_POST["register"])) {
        if (registrasi($_POST) > 0) {
            echo "
            <script>alert('Registrasi berhasil!')</script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/all.min.css"> <!-- icon FA -->
  <title>Registrasi</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-8">
        <h1 class="text-center mt-5">Registrasi</h1>
        <!-- menggunakan php_self pada action -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" id="username" name="username" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <div class="mb-3">
            <label for="password2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi password" required>
          </div>
          <button type="submit" name="register" class="btn btn-primary w-100">Daftar Sekarang!</button>
          <label class="form-check-label mt-3" for="remember">Sudah punya akun?</label>
          <a href="login.php" class="btn btn-info w-100">Login</a>
        </form>
      </div>
    </div>
  </div>

  <script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>