<?php
include "_head.php";
echo "<title>Produk | BUMDES Cibingbin - Tingtrim </title>";
include "_heads.php";
include "_menu.php";
?>

<!--breadcrumbs area start-->
<div class="breadcrumbs mt-4">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Produk BUMDes</h3>
                    <ul>
                        <li><a href=".">home</a></li>
                        <li>Produk</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<div class="shop_area shop_fullwidth mt-70 mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class=" btn-grid-3" data-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button" class="active btn-grid-4" data-toggle="tooltip" title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                    </div>
                    <div class=" niceselect_option">
                        <form class="select_option" action="#">
                            <select name="orderby" id="short">
                                <?php
                                if (isset($_GET['kategori'])) {
                                    echo "<option selected>Menampilkan Kategori $_GET[kategori]</option>";
                                } else {
                                    echo "<option selected>Menampilkan Semua Kategori</option>";
                                }
                                ?>
                            </select>
                        </form>
                    </div>
                    <div class="page_amount">
                        <p>Total
                            <?php
                            $hitung = $koneksi->query("SELECT * FROM tbl_produk");
                            $jml = $hitung->num_rows;
                            echo $jml;
                            ?>
                            Produk</p>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper">
                    <?php
                    if (isset($_GET['kategori'])) {
                        $sql = $koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori WHERE kategori='$_GET[kategori]' ORDER BY id_produk DESC");
                        while ($data = $sql->fetch_assoc()) : ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="produk-detail.php?id=<?= $data['id_produk'] ?>"><img src="foto_produk/<?= $data['foto_produk'] ?>" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button"><a href="#" title="Lihat Detail"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="#" title="Suka"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="#"><?= $data['nama_produk'] ?></a></h4>
                                        <p><a href="#"><?= $data['kategori'] ?></a></p>
                                        <div class="price_box">
                                            <span class="current_price">Rp. <?= number_format($data['harga']) ?></span>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <h4 class="product_name"><a href="#"><?= $data['nama_produk'] ?></a></h4>
                                        <p><a href="#"><?= $data['kategori'] ?></a></p>
                                        <div class="price_box">
                                            <span class="current_price">Rp. <?= number_format($data['harga']) ?></span>
                                        </div>
                                        <div class="product_desc">
                                            <p><?= $data['deskripsi'] ?></p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="quick_button"><a href="#" title="Lihat Detail"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="#" title="Suka"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                        <?php } else {
                        $sql = $koneksi->query("SELECT * FROM tbl_produk LEFT JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori ORDER BY id_produk DESC");
                        while ($data = $sql->fetch_assoc()) : ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="produk-detail.php?id=<?= $data['id_produk'] ?>"><img src="foto_produk/<?= $data['foto_produk'] ?>" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">Sale</span>
                                            <span class="label_new">New</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button"><a href="#" title="Lihat Detail"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="#" title="Suka"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <h4 class="product_name"><a href="#"><?= $data['nama_produk'] ?></a></h4>
                                        <p><a href="#"><?= $data['kategori'] ?></a></p>
                                        <div class="price_box">
                                            <span class="current_price">Rp. <?= number_format($data['harga']) ?></span>
                                        </div>
                                    </div>
                                    <div class="product_content list_content">
                                        <h4 class="product_name"><a href="#"><?= $data['nama_produk'] ?></a></h4>
                                        <p><a href="#"><?= $data['kategori'] ?></a></p>
                                        <div class="price_box">
                                            <span class="current_price">Rp. <?= number_format($data['harga']) ?></span>
                                        </div>
                                        <div class="product_desc">
                                            <p><?= $data['deskripsi'] ?></p>
                                        </div>
                                        <div class="action_links list_action_right">
                                            <ul>
                                                <li class="quick_button"><a href="#" title="Lihat Detail"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="#" title="Suka"><span class="lnr lnr-heart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php } ?>
                </div>
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>

<?php
include "_foot.php";
?>