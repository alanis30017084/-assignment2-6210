<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SCP Foundation</title>
  </head>
  <body class="bg-secondary">
  <?php include "connection.php"; ?>

    <!-- Site menu -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <a class="navbar-brand text-success" href="index.php">SCP FOUNDATION<br>Secure, Contain, Protect</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php foreach($result as $item): ?>
            <li class="nav-item">
              <a href="index.php?subjects='<?php echo $item['item_no']; ?>'" class="nav-link">
              <?php echo $item['item_no']; ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

      <a href="forms/form.php" class="btn btn-outline-success my-2 my-sm-0" type="button">ADD SCP</a>
      </div>
    </nav>
    