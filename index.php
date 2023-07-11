<?php

// syarat session login
session_start();

if (!$_SESSION["login"]) {
    header("Location: login.php");
    exit;
}

require_once 'koneksi.php';
require_once 'fungsi.php';

$player = query("SELECT * FROM bola");

// membuat variabel untuk memanggil fungsi cari
if (isset($_POST["cari"])) {
    $player = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="public/img/favicon.ico" />
    <title>Home</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/all.min.css"> <!-- icon FA -->
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <h1>Data Players</h1>
            <div class="container mt-5">
                <!-- Logout Button -->
                <div class="d-flex justify-content-end">        
                    <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out"></i> Logout</a>
                </div>
                <div class="col-auto">
                <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
                </div>
                <br>
                <!-- form cari/filter data -->
                <form action="" method="post" class="row g-3">
                <div class="col-auto">
                    <input type="text" name="keyword" class="form-control" id="cari" placeholder="Cari">
                </div>
                <div class="col-auto">
                    <button type="submit" name="cari" class="btn btn-dark mb-3"><i class="fas fa-search"></i></button>
                </div>
                </form>

            <table class="table table-bordered table-striped table-responsive">
                <thead class="table-dark">
                    <tr>
                    <th width="10px" scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Club</th>
                    <th scope="col">Posisi</th>
                    <th scope="col" class="text-center">OVR</th>
                    <th scope="col" class="text-center">Foto</th>
                    <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach($player as $p) : ?>
                    <tr>
                    <th scope="row" class="text-center"><?= $no++?></th>
                    <td><?= $p["nama"];?></td>
                    <td><?= $p["club"];?></td>
                    <td><?= $p["posisi"];?></td>
                    <td class="text-center"><?= $p["ovr"];?></td>
                    <td class="text-center"><img src="public/img/<?= $p["foto"];?>" alt="" width="35px" height="35px"></td>
                    <td class="text-center">
                        <a href="ubah.php?id=<?= $p["id"]; ?>"><i class="far fa-edit text-dark"></i></a>
                        <a href="hapus.php?id=<?= $p["id"]; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data <?= $p ["nama"]; ?>? ')"><i class="fas fa-trash-alt text-dark"></i></a>
                        <a href="detail.php?id=<?= $p["id"]; ?>"><i class="fas fa-id-card text-dark"></i></a>
                    </td>
                    </tr>
                <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>

    <script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>