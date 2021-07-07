<?php include 'header.php' ?>
<div class='container'>
    <div class="card">
        <h5 class="card-header">Data Pelanggan</h5>
        <div class="card-body table-responsive">
            <table class="table table-borderd text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM tbl_pelanggan"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama_pelanggan']; ?></td>
                            <td><?php echo $pecah['jk']; ?></td>
                            <td><?php echo $pecah['email']; ?></td>
                            <td><?php echo $pecah['alamat']; ?></td>
                            <td><?php echo $pecah['no_hp']; ?></td>
                            <td>
                                <a href="pelanggan-hapus.php?id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                    <?php } ?>

                </tbody>
            </table>
            </main>
        </div>
    </div>
</div>