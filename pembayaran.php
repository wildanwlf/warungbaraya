<?php
include "_head.php";
echo "<title>Halaman Pembayaran</title>";
include "_heads.php";
include "_menu.php";

if (empty($_SESSION["pelanggan"]) or !isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login atau Daftar terlebih dahulu !');</script>";
    echo "<script>location='log-reg.php';</script>";
}

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
                    <h3>Pembayaran</h3>
                    <ul>
                        <li><a href=".">home</a></li>
                        <li>Pembayaran</li>
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
                            <h3>Total Pembayaran</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">Rp. <?php echo number_format($totalbelanja) ?></p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Biaya Pengiriman</p>
                                    <p class="cart_amount">Rp. <?= number_format($biayakirim) ?></p>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Total Belanja</p>
                                    <p class="cart_amount">Rp. <?= number_format($biayakirim + $totalbelanja) ?></p>
                                </div>
                                <div class="checkout_btn">
                                    <form method="POST">
                                        <button name="bayar" type="submit">Proses Pembayaran</button>
                                    </form>

                                    <?php
                                    if (isset($_POST['bayar'])) {
                                        $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];
                                        $alamat = $_SESSION["pelanggan"]["alamat"];
                                        $biayakirim = 5000;
                                        $tgl_transaksi = date("Y-m-d");

                                        $total_pembelian = $totalbelanja + $biayakirim;

                                        //1. menyimpan data ke tabel transaksi
                                        $koneksi->query("INSERT INTO tbl_transaksi (id_pelanggan, tgl_transaksi, alamat_pengiriman, ongkir, total_pembelian, status)
                                         VALUES ('$id_pelanggan','$tgl_transaksi','$alamat','$biayakirim','$total_pembelian','Menunggu Pembayaran')");

                                        //mendapatkan id_transkasi barusan terjadi
                                        $id_pembelian_barusan = $koneksi->insert_id;

                                        foreach ($_SESSION["keranjang"] as $id => $jumlah) {

                                            //mendapatkan data barang berdasarkan id_barang
                                            $ambil = $koneksi->query("SELECT * FROM tbl_produk WHERE id_produk ='$id'");
                                            $perbarang = $ambil->fetch_assoc();

                                            $harga = $perbarang['harga'];
                                            $subharga = $harga * $jumlah;

                                            $koneksi->query("INSERT INTO detail_transaksi (id_transaksi, id_produk, harga_p, jumlah, subtotal)
                                                VALUES ('$id_pembelian_barusan','$id','$harga','$jumlah','$subharga')");

                                            //syntax update stok produk
                                            $koneksi->query("UPDATE tbl_produk SET stok = stok - $jumlah
                                            WHERE id_produk='$id'");
                                        }

                                        //mengkosongkan keranjang belanja
                                        unset($_SESSION["keranjang"]);

                                        //jika berhasil di alihkan ke halaman nota pembelian yang barusan
                                        echo "<script>alert('Pembelian Sukses');</script>";
                                        echo "<script>location='bayar.php?id=$id_pembelian_barusan';</script>";
                                    }
                                    ?>
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