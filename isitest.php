<?php
    if (!isset($_POST['nama']) or !isset($_POST['cerita'])) {
        header('location:test.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">    
    <div class="card">
    <div class="card-header">
        Quotes
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p><?= $_POST['cerita']; ?></p>
        <footer class="blockquote-footer"><?= $_POST['nama']; ?></footer>
        </blockquote>
    </div>
    </div>
</div>

</body>
<script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>