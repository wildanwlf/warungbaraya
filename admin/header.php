<?php
session_start();
include "../database.php";
if (empty($_SESSION['admin'])) {
  echo "<script>location='login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>

  <title>Admin Dashboard</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="index.php"><strong>BUMDES</strong> CIBINGBIN</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><b>Home</b></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b>Master Data</b>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="kategori.php">Kategori</a>
              <a class="dropdown-item" href="produk.php">Produk</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pelanggan.php"><b>Data Pelanggan</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="penjualan.php"><b>Data Penjualan</b></a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <a href="logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout" class="btn btn-outline-light navbar-btn" role="button"><span class="glyphicon glyphicon-off"></span> Logout</a>
        </ul>
      </div>
  </nav>
  <br>