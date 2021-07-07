<title>Data Produk</title>
<?php
include 'header.php';
?>
<div class='container'>
    <div class="card">
        <h5 class="card-header">Data Produk</h5>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Tambah
                Produk</button>
            <br>
            <br>
            <table class="table table borderd">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok Produk</th>
                        <th>Kategori</th>
                        <th>Foto Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama_produk']; ?></td>
                            <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                            <td><?php echo $pecah['stok']; ?></td>
                            <td><?php echo $pecah['kategori']; ?></td>
                            <td>
                                <img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
                            </td>
                            <td>
                                <a href="hapusproduk.php?hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                <a href="editproduk.php?editproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Dialog Tambah Produk -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Produk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control">
                            <option selected disabled>-Pilih Kategori-</option>
                            <?php
                            $sql = $koneksi->query("SELECT * FROM tbl_kategori");
                            while ($k = $sql->fetch_assoc()) { ?>
                                <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control-file" name="foto">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" name="save">Simpan</button>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    $nama = $_FILES['foto']['name'];
                    $lokasi = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($lokasi, "../foto_produk/" . $nama);
                    $koneksi->query("INSERT INTO tbl_produk
                    (nama_produk,harga,stok,id_kategori,foto_produk,deskripsi)
                    VALUES('$_POST[nama]','$_POST[harga]','$_POST[stok]','$_POST[kategori]','$nama','$_POST[deskripsi]')");
                    echo "<script>alert('Produk baru berhasil ditambahkan!');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=produk.php'>";
                }
                ?>
            </div>
        </div>
    </div>
</div>