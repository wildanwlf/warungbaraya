<?php
include 'header.php';
?>

<main role="main" class="container">

  <?php
  $ambil = $koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE id_produk = '$_GET[id]'");
  $pecah = $ambil->fetch_assoc();
  ?>

  <div class="card">
    <div class="card-header">
      Edit Produk
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk'] ?>">
        </div>
        <div class="form-group">
          <label>Harga (Rp)</label>
          <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga'] ?>">
        </div>
        <div class="form-group">
          <label>Stok</label>
          <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok'] ?>">
        </div>
        <div class="form-group">
          <label>Kategori</label>
          <select name="id_kategori" class="form-control">
            <option value="<?= $pecah['id_kategori'] ?>"><?= $pecah['kategori'] ?></option>
            <?php
            $sql = $koneksi->query("SELECT * FROM tbl_kategori");
            while ($k = $sql->fetch_assoc()) { ?>
              <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div>
          <div class="form-group">
            <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
          </div>
          <div class="form-group">
            <label>Ganti Foto</label>
            <input type="file" class="form-control-file" name="foto">
          </div>
          <div class="form-group">
            <label>Deskripsi Barang</label>
            <textarea class="form-control" name="deskripsi" rows="4"><?php echo $pecah['deskripsi']; ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button href="produk.php" class="btn btn-secondary">Batal</button>
          <button class="btn btn-primary" name="ubah">Edit</button>
      </form>
      <?php
      if (isset($_POST['ubah'])) {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_name'];
        // jika foto di ubah
        if (!empty($lokasifoto)) {
          move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

          $koneksi->query("UPDATE tbl_produk SET nama_produk ='$_POST[nama]',
          harga ='$_POST[harga]', stok = '$_POST[stok]',id_kategori = '$_POST[id_kategori]',
          foto_produk= '$namafoto', deskripsi = '$_POST[deskrpisi]'
          WHERE id_produk = '$_GET[id]'");
        } else {
          $koneksi->query("UPDATE tbl_produk SET nama_produk ='$_POST[nama]',
          harga ='$_POST[harga]', stok = '$_POST[stok]',id_kategori = '$_POST[id_kategori]',
          deskripsi = '$_POST[deskripsi]' WHERE id_produk = '$_GET[id]'");
        }
        echo "<script>alert('Data Produk Berhasil diubah!');</script>";
        echo "<script>location='produk.php'</script>";
      }
      ?>
    </div>
  </div>
</main>