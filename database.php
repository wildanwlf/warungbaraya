<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'bumdes';

$koneksi = mysqli_connect($server, $username, $password) or die("Gagal terhubung ke server..!!");
mysqli_select_db($koneksi, $database) or die("Database Error");
