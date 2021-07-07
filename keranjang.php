<?php
include "_head.php";
echo "<title>Keranjang Belanja</title>";
include "_heads.php";
include "_menu.php";

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kososng, Silahkan belanja terlebih dahulu !');</script>";
    echo "<script>location='produk.php';</script>";
}
$biayakirim = 5000;
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs mt-4">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Keranjang Belanja</h3>
                    <ul>
                        <li><a href=".">home</a></li>
                        <li>Keranjang</li>
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
                                    <?php $totalbelanja = 0; ?>
                                    <?php foreach ($_SESSION["keranjang"] as $id => $jumlah) : ?>
                                        <!-- menampilkan barang berdasarkan id_barang-->
                                        <?php $ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE id_produk = '$id'");
                                        $pecah = $ambil->fetch_assoc();
                                        $total = $pecah["harga"] * $jumlah; ?>
                                        <tr>
                                            <td class="product_remove"><a href="hapuskeranjang.php?id=<?php echo $id ?>"><i class="fa fa-trash-o"></i></a></td>
                                            <td class="product_thumb"><a href="#"><img src="foto_produk/<?= $pecah['foto_produk'] ?>" alt=""></a></td>
                                            <td><?php echo $pecah["nama_produk"]; ?></td>
                                            <td class="product-price">Rp. <?php echo number_format($pecah["harga"]); ?></td>
                                            <td class="product_quantity"><?php echo $jumlah; ?></td>
                                            <td class="product_total">Rp. <?php echo number_format($total); ?></td>
                                        </tr>
                                        <?php $totalbelanja += $total; ?>
                                    <?php endforeach ?>
                                    <tr>
                                        <td colspan="5"><b>Subtotal</b></td>
                                        <td><strong>Rp. <?php echo number_format($totalbelanja) ?></strong>
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
                            <h3>Total Keranjang</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">Rp. <?php echo number_format($totalbelanja) ?></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="pembayaran.php">Beli & Bayar Sekarang</a>
                                </div>
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