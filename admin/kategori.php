<title>Data Kategori Produk</title>
<?php
include 'header.php';
?>
<div class='container'>
    <div class="card">
        <h5 class="card-header">Data Kategori</h5>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                Tambah Kategori
            </button>
            <br>
            <br>
            <table class="table table borderd">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM tbl_kategori"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['kategori']; ?></td>
                            <td>
                                <a href="kategori-hapus.php?id=<?php echo $pecah['id_kategori']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Kategori Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" name="save">Simpan</button>
                </form>
                <?php
                if (isset($_POST['save'])) {
                    $koneksi->query("INSERT INTO tbl_kategori (kategori) VALUES('$_POST[kategori]')");
                    echo "<script>alert('Kategori baru berhasil ditambahkan!');</script>";
                    echo "<meta http-equiv='refresh' content='1;url=kategori.php'>";
                }
                ?>
            </div>
        </div>
    </div>
</div>