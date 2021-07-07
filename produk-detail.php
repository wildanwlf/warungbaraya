<?php
include "database.php";
$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE id_produk ='$id'");
$data = $sql->fetch_assoc();

include "_head.php";
echo "<title>Produk $data[kategori] $data[nama_produk] </title>";
include "_heads.php";
include "_menu.php";
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs mt-4">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href=".">home</a></li>
                        <li><a href="produk.php">Produk</a></li>
                        <li><?= $data['nama_produk'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<div class="product_details mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a href="#">
                            <img id="zoom1" src="foto_produk/<?= $data['foto_produk'] ?>" data-zoom-image="foto_produk/<?= $data['foto_produk'] ?>" alt="big-1">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    <form method="POST">
                        <h1><strong><?= $data['nama_produk'] ?></strong></h1>
                        <div class="product_ratting">
                            <ul>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li><a href="#"><i class="icon-star"></i></a></li>
                                <li class="review"><a href="#"> (customer review ) </a></li>
                            </ul>
                        </div>
                        <div class="price_box">
                            <span class="current_price">Rp. <?= number_format($data['harga']) ?></span>
                        </div>
                        <label class="text-success"><b>Stok : <?= $data['stok'] ?></b></label><br>
                        <label><b>Deskripsi : </b></label>
                        <div class="product_desc">
                            <p><?= $data['deskripsi'] ?> </p>
                        </div>
                        <div class="product_variant color">
                            <h3>Catatan Pembelian</h3>
                            <textarea placeholder="Contoh : Rasa Coklat dll.." name="catatan" class="form-control form-control-sm" required></textarea>
                        </div>
                        <div class="product_variant quantity">
                            <label>Jumlah</label>
                            <input name="jumlah" min="1" max="<?= $data['stok'] ?>" value="1" type="number" required>
                            <button name="beli" class="button" type="submit">Beli Sekarang</button>
                        </div>
                        <div class="product_meta">
                            <span>Category: <a href="produk.php?kategori=<?= $data['kategori'] ?>"><?= $data['kategori'] ?></a></span>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["beli"])) {
                        //mendapatkan jumlah yang di inputkan dari detail
                        $jumlah = $_POST["jumlah"];
                        // memasukan ke keranjang
                        $_SESSION["keranjang"][$id] = $jumlah;
                        // unset($_SESSION['keranjang']);
                        echo "<script>alert('Barang sudah di masukan ke keranjang');</script>";
                        echo "<script>location='keranjang.php'</script>";
                    }
                    ?>
                    <div class="priduct_social">
                        <ul>
                            <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                            <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                            <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                            <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                            <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include "_foot.php";
?>