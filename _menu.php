<body>
    <!-- Header Section Start From Here -->
    <header class="header-wrapper">
        <div class="header-top header-style-3 header-style-4 bg-blue sticky-nav ptb-10px d-lg-block d-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 d-flex">
                        <div class="logo align-self-center">
                            <a href="index.html"><img class="img-responsive" src="assets/images/logo/logowarung.png" width="80px" alt="logo.jpg" /></a>
                        </div>
                    </div>
                    <div class="col-md-7 align-self-center header-menu-3">
                        <div class="header-horizontal-menu">
                            <ul class="menu-content">
                                <li><a href=".">Home</a></li>
                                <li><a href="contact.html">Produk</a></li>
                                <li><a href="contact.html">About</a></li>
                                <li><a href="contact.html">Kontak</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-right align-self-center">
                        <!--Contact info Start -->
                        <div class="contact-link">
                            <div class="phone">
                                <p>Customer Support:</p>
                                <a href="tel:(+800)123456789">(+800)123 456 789</a>
                            </div>
                        </div>
                        <!--Contact info End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Nav End -->
        <div class="header-menu header-menu-style-3 d-lg-block d-none ptb-13px">
            <div class="container">
                <div class="header-bottom bg-white">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="header-menu-vertical">
                                <h4 class="menu-title">Browse Categories </h4>
                                <ul class="menu-content display-none">
                                    <li class="menu-item"><a href="#">Televisions</a></li>
                                    <li class="menu-item"><a href="#">Digital Cameras</a></li>
                                </ul>
                                <!-- menu content -->
                            </div>
                            <!-- header menu vertical -->
                        </div>
                        <div class="col-lg-7">
                            <div class="header-right-element d-flex">
                                <div class="search-element media-body">
                                    <form action="#">
                                        <input type="text" placeholder="Enter your search key ... " />
                                        <button>Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--Cart info Start -->
                        <div class="col-lg-3 text-right">
                            <div class="header-tools">
                                <div class="cart-info align-self-center">
                                    <a href="#offcanvas-wishlist" class="heart offcanvas-toggle"><i class="lnr lnr-heart"></i><span>Wishlist</span></a>
                                    <a href="#offcanvas-cart" class="bag offcanvas-toggle"><i class="lnr lnr-cart"></i><span>My Cart</span></a>
                                </div>
                            </div>
                        </div>
                        <!--Cart info End -->
                    </div>
                    <!-- row -->
                </div>
            </div>
            <!-- container -->
        </div>
        <!-- header menu -->
    </header>
    <!-- Header Section End Here -->

    <!-- Mobile Header Section Start -->
    <div class="mobile-header d-lg-none sticky-nav bg-white ptb-20px">
        <div class="container">
            <div class="row align-items-center">

                <!-- Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="index.html"><img class="img-responsive" src="assets/images/logo/logowarung.png" width="40%" alt="logo.jpg" /></a>
                    </div>
                </div>
                <!-- Header Logo End -->

                <!-- Header Tools Start -->
                <div class="col-auto">
                    <div class="header-tools justify-content-end">
                        <div class="cart-info d-flex align-self-center">
                            <a href="#offcanvas-wishlist" class="heart offcanvas-toggle"><i class="lnr lnr-heart"></i><span>Wishlist</span></a>
                            <a href="#offcanvas-cart" class="bag offcanvas-toggle"><i class="lnr lnr-cart"></i><span>My Cart</span></a>
                        </div>
                        <div class="mobile-menu-toggle">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Header Tools End -->

            </div>
        </div>
    </div>

    <!-- Search Category Start -->
    <div class="mobile-search-area d-lg-none mb-15px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-element media-body">
                        <form class="d-flex" action="#">
                            <input type="text" placeholder="Enter your search key ... " />
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Category End -->
    <div class="mobile-category-nav d-lg-none mb-15px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!--=======  category menu  =======-->
                    <div class="hero-side-category">
                        <!-- Category Toggle Wrap -->
                        <div class="category-toggle-wrap">
                            <!-- Category Toggle -->
                            <button class="category-toggle"><i class="fa fa-bars"></i> All Categories</button>
                        </div>

                        <!-- Category Menu -->
                        <nav class="category-menu">
                            <ul>
                                <li class="menu-item"><a href="#">Digital Cameras</a></li>
                                <li class="menu-item"><a href="#">Headphones</a></li>
                                <li>
                                    <a href="#" id="more-btn"><i class="ion-ios-plus-empty" aria-hidden="true"></i> More Categories</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!--=======  End of category menu =======-->
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Header Section End -->

    <!-- OffCanvas Search Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <div class="inner customScroll">
            <div class="head">
                <span class="title">&nbsp;</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="offcanvas-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="lnr lnr-magnifier"></i></button>
                </form>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href=".">Home</a></li>
                    <li><a href="contact.html">Produk</a></li>
                    <li><a href="contact.html">About</a></li>
                    <li><a href="contact.html">Kontak</a></li>
                </ul>
            </div>
            <!-- OffCanvas Menu End -->
            <div class="offcanvas-social mt-30px">
                <ul>
                    <li>
                        <a href="#"><i class="ion-social-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ion-social-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Search End -->