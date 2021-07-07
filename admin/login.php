<?php
session_start();
include '../database.php';
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

  <title>Login Admin</title>
</head>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->
<link href="style.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Login Admin</h1>
    <br>
    <input type="text" class="form-control" name="user" placeholder="Username" required autofocus>
    <br>
    <input type="password" class="form-control" name="pass" placeholder="Password" required>
    </div>
    <br>
    <button class="btn btn-lg btn-primary btn-block" name="login">Masuk</button>
    <p class="mt-5 mb-3 text-muted">&copy; BUMDES Tingtrim 2020</p>
  </form>
  <?php
  if (isset($_POST['login'])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $ambil = $koneksi->query("SELECT * FROM tbl_admin WHERE username ='$user' AND pass = '$pass'");
    $cocok = $ambil->num_rows;
    if ($cocok == 1) {
      $_SESSION['admin'] = $ambil->fetch_assoc();
      echo "<script>alert('Anda Berhasil Masuk!');</script>";
      echo "<script>location='index.php'</script>";
    } else {
      echo "<script>alert('Login gagal ! Username atau Password salah !');</script>";
      echo "<meta http-equiv='refresh' content='1;url=login.php'>";
    }
  }
  ?>
</body>

</html>