<?php

include '../database.php';

$ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE id_produk = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk"))
{
    unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM tbl_produk WHERE id_produk = '$_GET[id]'");

echo "<script>alert('Produk berhasil dihapus!');</script>";
echo "<script>location='produk.php'</script>";
