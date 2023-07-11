<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="jumbotron mt-5">
        <h1 class="display-4">Halo!</h1>
        <p class="lead">Kata-katanya untuk hari ini dong!</p>
        <hr class="my-4">
        <form action="isitest.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="John Bedebah">
                </div>
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tuliskan <cite>Quotes</cite> hari ini</label>
                <textarea class="form-control" id="cerita" name="cerita" rows="3"></textarea>
            </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        </div>
    </div>

</body>
<script src="public/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="public/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>