<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SCP Foundation</title>
  </head>
  <body class="container" style="background-color:#333; color:white;">
  <?php include "connection.php"; ?>
    <br><h1 class="text-danger"><a href="index.php">SCP Foundation</a></h1>
    <h3 class="text-danger">Secure, Contain, Protect</h3>

    <!-- Site menu -->
    <div>
      <ul class="nav navbar-expand-lg justify-content-between navbar-light bg-light"  style="color:white;">
          
        <?php foreach($result as $item): ?>
          <li class="nav-item">
            <a href="index.php?subjects='<?php echo $item['item_no']; ?>'" class="nav-link" style="color:black">
            <?php echo $item['item_no']; ?>
            </a>
          </li>
        <?php endforeach; ?>

        <li class="nav-item">
          <a href="forms/form.php" class="nav-link btn-danger">ADD SCP</a>
        </li>
      </ul>
    </div>
    <hr style="border: 1px solid white;">
    