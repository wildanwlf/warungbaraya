<?php
include "../database.php";
$id = $_GET['id'];

$koneksi->query("DELETE FROM tbl_kategori WHERE id_kategori='$id'");

echo "<script>alert('Kategori berhasil dihapus!');</script>";
echo "<script>location='kategori.php'</script>";
