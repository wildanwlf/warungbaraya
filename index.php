<?php
include "_head.php";
echo "<title>Home | BUMDES Cibingbin - Tingtrim </title>";
include "_heads.php";
include "_menu.php";
?>

<!--slider area start-->
<section class="slider_section slider_s_five mb-70">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content">
                            <br><br>
                            <h1>Makanan Serba Ada</h1>
                            <h2>Produk Makanan</h2>
                            <p>
                                Makanan pokok dan lainnya yang dapat membuat tenaga mu terisi kembali.
                            </p>
                            <a href="produk.php">Lihat ah </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/img/bgg.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content">
                            <br><br>
                            <h1>Sembako Juga Ada</h1>
                            <h2>Produk Sembako</h2>
                            <p>
                                Sembako murah dapat memenuhi kebutuhan dapur anda.
                            </p>
                            <a href="produk.php">Lihat cuy </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/img/bg4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="slider_content">
                            <h1>Minuman Menyegarkan</h1>
                            <h2>Produk Minuman</h2>
                            <p>
                                Minuman fresh serta sirup segala macam jug ada.
                            </p>
                            <a href="produk.php">Lihat cuy </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="assets/img/bg1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

<!--banner area start-->
<div class="banner_area">
    <div class="container">
        <div class="row">
            <?php
            include "database.php";
            $ka = $koneksi->query("SELECT * FROM tbl_kategori");
            while ($k = $ka->fetch_assoc()) { ?>
                <div class="col-lg-4 col-md-4 mb-4">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a class="card bg-success text-white text-center p-3" href="produk.php?kategori=<?= $k['kategori'] ?>">
                                <h2 class="mt-4"><?= $k['kategori'] ?></h2>
                                <h4 class="mt-2 mb-4">Belanja Sekarang ></h4>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!--banner area end-->

<!--product area start-->
<div class="product_area mb-65">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <p>Baru Saja Ditambahkan </p>
                    <h2>New Products</h2>
                </div>
            </div>
        </div>
        <div class="product_container">
            <div class="row">
                <div class="col-12">
                    <div class="product_carousel product_column5 owl-carousel">
                        <?php
                        $sql = $koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori ORDER BY id_produk DESC");
                        while ($data = $sql->fetch_assoc()) : ?>
                            <article class="single_product">
                                <figure>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="produk-detail.php?id=<?= $data['id_produk'] ?>"><img src="foto_produk/<?= $data['foto_produk'] ?>" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button"><a href="produk-detail.php?id=<?= $data['id_produk'] ?>" title="Lihat Detail"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="#" title="Like"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <figcaption class="product_content">
                                        <h4 class="product_name"><a href="product-details.html"><?= $data['nama_produk'] ?></a></h4>
                                        <p><a href="#"><?= $data['kategori'] ?></a></p>
                                        <div class="price_box">
                                            <span class="current_price">Rp. <?= number_format($data['harga']) ?></span>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product area end-->

<?php
include "_foot.php";
?>