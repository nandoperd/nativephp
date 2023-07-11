<?php

    require_once "koneksi.php";
    require_once "fungsi.php";

    // cek tombol submit sudah diklik atau belum
    if (isset($_POST["submit"])) {
        if (tambah($_POST)>0) {
            echo "
            <script>alert('Data berhasil ditambahkan!');
            document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>alert('Data gagal ditambahkan!');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.ico" />
    <title>Tambah data</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/all.min.css"> <!-- icon FA -->
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h1>Tambah Data</h1>
            <a href="index.php"><i class="fas fa-backward"></i></a>
            <form action="" method="post" enctype="multipart/form-data"> <!-- action kosong karena code dieksekusi di atas -->
            <div class="mt-3 mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="club" class="col-sm-2 col-form-label">Club</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="club" name="club">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="posisi" name="posisi">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="ovr" class="col-sm-2 col-form-label">OVR</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="ovr" name="ovr">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-5">
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
<script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>