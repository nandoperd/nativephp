<?php
    
    // memulai session
    session_start();

    // lempar user ke index jika sudah login
    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    require_once "koneksi.php";
    // require_once "fungsi.php";

    // cek submit login
    if (isset($_POST["login"])) {
        
        //ambil data dari form login
        $username = $_POST["username"];
        $password = $_POST["password"];

        //cek data username pada database
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        //cek username
        // num row adalah data yg dikembalikan dari database, jika ada (1) maka
        if ( mysqli_num_rows($result) === 1 ) {
            
            // cek password
            $row = mysqli_fetch_assoc($result);

            // menggunakan password verify (kebalikan hash) untuk verifikasi password
            // (!) usahakan buat panjang password di angka 255 untuk menghindari error pada password
            if ( password_verify($password, $row["password"])) {
            
                //set session
                $_SESSION["login"] = true;

                header("Location: index.php");
                // exit adalah untuk mematikan code setelahnya
                exit;
            }
        }

        // membuat kodisi error
        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="public/css/all.min.css"> <!-- icon FA -->
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 col-sm-8">
        <h1 class="text-center mt-5">Login</h1>
        
        <!-- pesan error -->
        <?php if(isset($error)) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username/Password tidak sesuai!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" class="form-control" id="username" name="username" placeholder="Username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          </div>
          <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
          <label class="form-check-label mt-3" for="remember">Belum punya akun? Daftar sekarang!</label>
          <a href="registrasi.php" class="btn btn-info w-100">Registrasi</a>
          <div class="text-center">
          <label class="form-check-label mt-3" for="remember">-- atau --</label><br>
          <label>Anda punya <i>quotes</i> untuk hari ini?</label>
          </div>
          <a href="test.php" class="btn btn-warning w-100">Tuliskan disini..</a>
        </form>
      </div>
    </div>
  </div>

  <script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  <script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>