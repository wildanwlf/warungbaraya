<?php
include 'header.php';
include '../database.php';
?>


<div class="container">
    <div class="card">
        <div class='card-header'>Data penjualan</div>
        <div class="table-responsive">
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pembeli</th>
                        <th>Tanggal</th>
                        <th>Total Pembelian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomer = 1; ?>
                    <?php $crot = $koneksi->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan"); ?>
                    <?php while ($data = $crot->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $nomer; ?></td>
                            <td><?php echo $data['nama_pelanggan']; ?></td>
                            <td><?php echo $data['tgl_transaksi']; ?></td>
                            <td>Rp. <?php echo number_format($data['total_pembelian']); ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <a href="detail.php?id=<?php echo $data['id_transaksi']; ?>" class='btn btn-info'>Detail</a>
                            </td>
                        </tr>
                        <?php $nomer++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>