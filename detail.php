<?php
    require_once "koneksi.php";
    require_once "fungsi.php";
    $id = $_GET["id"];
    $p = query("SELECT * FROM bola WHERE id = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/all.min.css"> <!-- icon FA -->
</head>
<body>
    <div class="container mt-5">
        <div class="row">
        <a href="index.php"><i class="fas fa-backward"></i></a>
            <div class="card" style="width: 18rem;">
            <img src="public/img/<?= $p["foto"]; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center"><?= $p["nama"]; ?> - <?= $p["club"]; ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center"><h3><?= $p["ovr"]; ?></h3></li>
                <li class="list-group-item text-center"><h5><?= $p["posisi"]; ?></h5></li>
            </ul>
            </div>
        </div>
    </div>
</body>
<script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>