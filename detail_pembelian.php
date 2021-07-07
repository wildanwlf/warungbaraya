<?php
include "_head.php";
echo "<title>Detail Pembelian Produk di BUMDES Tingtrim Kec Bojong</title>";
include "_heads.php";
include "_menu.php";

if (empty($_SESSION["pelanggan"]) or !isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login atau Daftar terlebih dahulu !');</script>";
    echo "<script>location='log-reg.php';</script>";
}

$sql = $koneksi->query("SELECT * FROM tbl_transaksi WHERE id_transaksi = '$_GET[transaksi]'");
$data = $sql->fetch_assoc();
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs mt-4">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Detail Pembelian Produk</h3>
                    <ul>
                        <li><a href=".">home</a></li>
                        <li>Detail Pembelian</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<div class="shopping_cart_area mt-70">
    <div class="container">
        <?php
        // echo "<pre>";
        // print_r($_SESSION['keranjang']);
        // echo "</pre>";
        ?>
        <form method="POST">
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            <b>Alamat Pengiriman</b>
                            <p><?= $_SESSION['pelanggan']['alamat'] ?></p>
                        </h3>
                    </div>
                </div>
                <div class="col-12">
                    <strong>
                        <p>Produk Yang Dibeli</p>
                    </strong><br>
                    <div class="table_desc">
                        <div class="cart_page">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_remove">Hapus</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Produk</th>
                                        <th class="product-price">Harga</th>
                                        <th class="product_quantity">Jumlah</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalbelanja  = 0;
                                    $ambil = $koneksi->query("SELECT * FROM detail_transaksi JOIN tbl_produk ON detail_transaksi.id_produk=tbl_produk.id_produk WHERE id_transaksi='$_GET[transaksi]'");
                                    while ($pecah = $ambil->fetch_assoc()) :
                                        $total = $pecah["harga"] * $pecah['jumlah']; ?>
                                        <tr>
                                            <td class="product_remove"><a href="hapuskeranjang.php?id=<?php echo $id ?>"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb"><a href="#"><img src="foto_produk/<?= $pecah['foto_produk'] ?>" alt=""></a></td>
                                            <td><?php echo $pecah["nama_produk"]; ?></td>
                                            <td class="product-price">Rp. <?php echo number_format($pecah["harga_p"]); ?></td>
                                            <td class="product_quantity"><?php echo $pecah['jumlah']; ?></td>
                                            <td class="product_total">Rp. <?php echo number_format($pecah['subtotal']); ?></td>
                                        </tr>
                                        <?php $tot = $totalbelanja += $total; ?>
                                    <?php endwhile ?>
                                    <tr>
                                        <td colspan="5"><b>Subtotal</b></td>
                                        <td><strong>Rp. <?php echo number_format($tot) ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area start-->
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="coupon_code right">
                            <h3>Ringkasan Belanja</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">Rp. <?php echo number_format($tot); ?></p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Biaya Pengiriman</p>
                                    <p class="cart_amount">Rp. <?= number_format($data['ongkir']) ?></p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Total Belanja</p>
                                    <p class="cart_amount">Rp. <?= number_format($data['total_pembelian']) ?></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="bayar.php?id=<?= $data['id_transaksi'] ?>" type="submit">Bayar</a>
                                    <?php if ($data['status'] == 'Barang Sedang Dikirim') { ?>
                                        <form method="post">
                                            <button type="submit" name="selesai" onclick="return confirm('Yakin barang sudah sampai di Alamat Rumah anda ?')">Barang Sudah Diterima ?</button>
                                        </form>
                                    <?php } ?>
                                </div>
                                <?php
                                if (isset($_POST['selesai'])) {

                                    $koneksi->query("UPDATE tbl_transaksi SET status='Selesai'
                                                WHERE id_transaksi='$_GET[transaksi]'");

                                    echo "<script>alert('Pembelian Barang Selesai Terimakasih !');</script>";
                                    echo "<script>location='akun.php';</script>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--coupon code area end-->
        </form>
    </div>
</div>

<?php
include "_foot.php";
?>