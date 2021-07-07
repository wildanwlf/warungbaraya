<?php
session_start();
$id = $_GET["id"];
unset($_SESSION["keranjang"][$id]);

echo "<script>alert('produk telah di hapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
