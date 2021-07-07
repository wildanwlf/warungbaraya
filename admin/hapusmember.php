<?php
include '../koneksi.php';

$koneksi->query("DELETE FROM tbl_member WHERE id_member = '$_GET[id]'");

echo "<script>alert('Data Member Berhasil dihapus!');</script>";
echo "<script>location='member.php'</script>";

?>