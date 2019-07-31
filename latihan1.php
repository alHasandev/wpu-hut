<?php

$data = file_get_contents('data/pizza.json');

$pizza = json_decode($data, true);

$menu = $pizza['menu'];

// die(print_r($menu));

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/css/bootstrap.min.css">

  <title>WPU Hut</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="logo" style="width: 120px">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Home</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="row my-3">
      <div class="col">
        <h1>All Menu</h1>
      </div>
    </div>

    <div class="row">

      <?php foreach ($menu as $mn) : ?>
        <div class="col-md-4">
          <div class="card mb-3">
            <div class="card-header">
              <?= $mn['kategori'] ?>
            </div>
            <img src="img/menu/<?= $mn['gambar'] ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?= $mn['nama'] ?></h5>
              <p class="card-text"><?= $mn['deskripsi'] ?></p>
              <h6>Rp. <?= number_format($mn['harga'], 2, ',', '.') ?></h6>
              <a href="#" class="btn btn-primary mt-3">Pesan Sekarang!</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Bootstrap JS -->
  <script src="vendor/js/jquery-3.4.1.min.js"></script>
  <script src="vendor/js/bootstrap.min.js"></script>
</body>

</html>