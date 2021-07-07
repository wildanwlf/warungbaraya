<?php
include 'header.php';
?>

<?php
$ambil = $koneksi->query("SELECT * FROM tbl_transaksi JOIN tbl_pelanggan ON tbl_transaksi.id_pelanggan=tbl_pelanggan.id_pelanggan
WHERE tbl_transaksi.id_transaksi = '$_GET[id]'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>

<div class="container">
    <h3>Detail Pemesanan</h3>
    <br>
    <div class="row">
        <div class="col-md-8 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5>Alamat Pengiriman</h5>
                    <hr>
                    <p><strong><?php echo $detail["nama_pelanggan"]; ?></strong><br>
                        <?php echo $detail["no_hp"]; ?><br>
                        <?php echo $detail["alamat_pengiriman"]; ?>
                    </p>
                    <hr>
                    <h5>Produk yang dibeli</h5>
                    <hr>
                    <?php
                    $totalbelanja  = 0;
                    $ambil = $koneksi->query("SELECT * FROM detail_transaksi JOIN tbl_produk ON detail_transaksi.id_produk=tbl_produk.id_produk WHERE id_transaksi='$detail[id_transaksi]'");
                    while ($data = $ambil->fetch_assoc()) :
                        $total = $data["harga"] * $data['jumlah'];
                    ?>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../foto_produk/<?php echo $data["foto_produk"]; ?>" width="90" alt="">
                            </div>
                            <div class="col-auto">
                                <h5><?php echo $data["nama_produk"]; ?></h5>
                                <p>Rp. <?php echo number_format($data["harga"]); ?><br>
                                    <?php echo $data["jumlah"]; ?> Produk
                                </p>
                            </div>
                        </div>
                        <hr>
                        <?php $tot = $totalbelanja += $total; ?>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Belanja</h5>
                    <p>Total Harga Produk: <strong>Rp. <?php echo number_format($tot); ?></strong><br>
                        Ongkos Kirim: <strong>Rp. <?php echo number_format($detail["ongkir"]); ?></strong></p>
                    <hr>
                    <strong>
                        <p class="text-right">Total Tagihan: Rp. <?php echo number_format($detail["total_pembelian"]); ?></p>
                    </strong>
                    <hr>
                    <form method="post">
                        <center>
                            <?php if ($detail['status'] == 'Menunggu Pembayaran') { ?>
                                <button class="btn btn-outline-warning btn-block" name="konfirmasi">Konfirmasi Pembayaran</button>
                            <?php } ?>
                            <?php if ($detail['status'] == 'Pembayaran Lunas') { ?>
                                <button class="btn btn-outline-success btn-block" name="kirim">Kirim Barang</button>
                            <?php } ?>
                            <?php if ($detail['status'] == 'Barang Sedang Dikirim') { ?>
                                <button class="btn btn-outline-primary btn-block" onclick="window.print()">Print</button>
                            <?php } ?>
                        </center>
                    </form>
                    <?php
                    if (isset($_POST['konfirmasi'])) {

                        $koneksi->query("UPDATE tbl_transaksi SET status='Pembayaran Lunas'
                        WHERE id_transaksi='$_GET[id]'");

                        echo "<script>alert('Konfirmasi Pembayaran Suksess !');</script>";
                        echo "<script>location='penjualan.php';</script>";
                    }
                    if (isset($_POST['kirim'])) {

                        $koneksi->query("UPDATE tbl_transaksi SET status='Barang Sedang Dikirim'
                        WHERE id_transaksi='$_GET[id]'");

                        echo "<script>alert('Status Berhasil Diupdate !');</script>";
                        echo "<script>location='penjualan.php';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// echo "<pre>";
// print_r($data);
// echo "</pre>"; 
?>