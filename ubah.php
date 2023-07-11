<?php

    require_once "koneksi.php";
    require_once "fungsi.php";

    $id = $_GET["id"];

    $p = query("SELECT * FROM bola WHERE id = $id")[0]; // [0] perintah untuk mengambil elemen pertama pada array query
    
    // cek submit
    if (isset($_POST["submit"])) {
        if (ubah($_POST)>0) {
            echo "
            <script>
            alert('Data berhasil diubah');
            document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Data gagal diubah');
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
    <title>Ubah data</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/all.min.css"> <!-- icon FA -->
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h1>Ubah Data</h1>
            <a href="index.php"><i class="fas fa-backward"></i></a>
            <form action="" method="post" enctype="multipart/form-data"> <!-- action kosong karena code dieksekusi di atas -->
            <div class="mt-3 mb-3 row">

            <!-- input hidden id dan foto lama -->
            <input type="hidden" id="id" name="id" value="<?= $p["id"]; ?>">
            <input type="hidden" id="fotoLama" name="fotoLama" value="<?= $p["foto"]; ?>">

            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $p["nama"]; ?>">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="club" class="col-sm-2 col-form-label">Club</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="club" name="club" value="<?= $p["club"]; ?>">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $p["posisi"]; ?>">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="ovr" class="col-sm-2 col-form-label">OVR</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="ovr" name="ovr" value="<?= $p["ovr"]; ?>">
                </div>
            </div>
            <div class="mt-3 mb-3 row">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-5">
                    <img src="public/img/<?= $p["foto"];?>" alt="" width="50%">
                    <input type="file" class="form-control" id="foto" name="foto" value="<?= $p["foto"]; ?>">
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