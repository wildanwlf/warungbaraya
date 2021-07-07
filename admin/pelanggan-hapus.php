<?php
include '../database.php';

$koneksi->query("DELETE FROM tbl_pelanggan WHERE id_pelanggan = '$_GET[id]'");

echo "<script>alert('Data Pelanggan Berhasil dihapus!');</script>";
echo "<script>location='pelanggan.php'</script>";
