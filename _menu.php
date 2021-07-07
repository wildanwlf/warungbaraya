<body>

    <!--header area start-->

    <!--offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="icon-x"></i></a>
                        </div>
                        <div class="header_social text-right">
                            <ul>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>


                        <div class="call-support">
                            <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children">
                                    <a href=".">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="akun.php">Akun Saya</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="produk.php">Semua Produk</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href=".">about Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--offcanvas menu area end-->

    <header>
        <div class="main_header">
            <div class="header_middle header_middle5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                            <div class="logo">
                                <a href=".">
                                    <b>BUMDES</b>
                                    <h3 class="text-success"> Cibingbin</h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-5 col_search5">
                            <div class="search_box search_five mobail_s_none">
                                <form action="#">
                                    <input placeholder="Search here..." type="text">
                                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-7 col-8">
                            <div class="header_account_area">
                                <div class="header_account_list register">
                                    <ul>
                                        <?php if (empty($_SESSION['pelanggan'])) { ?>
                                            <li><a href="log-reg.php">Register</a></li>
                                            <li><span>/</span></li>
                                            <li><a href="log-reg.php">Login</a></li>
                                        <?php } else { ?>
                                            <li><a href="akun.php">Hi, <?= $_SESSION['pelanggan']['nama_pelanggan'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <div class="header_account_list">
                                    <a href="keranjang.php"><span class="lnr lnr-cart"></span><span class="item_count">2</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_bottom sticky-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 col-sm-6 mobail_s_block">
                            <div class="search_box search_five">
                                <form action="#">
                                    <input placeholder="Search here..." type="text">
                                    <button type="submit"><span class="lnr lnr-magnifier"></span></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="categories_menu">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Kategori Produk</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                    <ul>
                                        <?php
                                        include "database.php";
                                        $ka = $koneksi->query("SELECT * FROM tbl_kategori");
                                        while ($k = $ka->fetch_assoc()) { ?>
                                            <li><a href="produk.php?kategori=<?= $k['kategori'] ?>"> <?= $k['kategori'] ?></a></li>
                                        <?php } ?>
                                        <li class="hidden"><a href=".">Coming Soon..</a></li>
                                        <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> Kategori Lainnya</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!--main menu start-->
                            <div class="main_menu menu_position">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="."> Home</a></li>
                                        <li><a href="produk.php"> Semua Produk</a></li>
                                        <li><a href="keranjang.php"> Keranjang Belanja</a></li>
                                        <li><a href="."> About</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="call-support">
                                <p><a href="tel:(08)23456789">(08) 23 456 789</a> Customer Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header area end-->