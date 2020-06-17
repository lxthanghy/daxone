<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daxone Shop</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public/client/assets/images/favicon.png')}}">

    <!-- CSS
       ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('public/client/assets/css/vendor/bootstrap.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{url('public/client/assets/css/vendor/line-awesome.css')}}">
    <link rel="stylesheet" href="{{url('public/client/assets/css/vendor/themify.css')}}">
    <!-- othres CSS -->
    <link rel="stylesheet" href="{{url('public/client/assets/css/plugins/animate.css')}}">
    <link rel="stylesheet" href="{{url('public/client/assets/css/plugins/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{url('public/client/assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{url('public/client/assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('public/client/assets/css/plugins/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{url('public/client/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('public/client/snackbar/snackbar.min.css')}}">
    <link rel="stylesheet" href="{{url('public/toastr/toastr.min.css')}}">
</head>

<body>
    <div class="main-wrapper">
        <header class="header-area transparent-bar sticky-bar">
            <div class="main-header-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo mt-40">
                                <a href=""><img src="{{url('public/client/assets/images/logo/logo-1.png')}}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="main-menu menu-common-style menu-lh-1 menu-other-style">
                                <nav>
                                    <ul>
                                        <li class=""><a href="">Home</a>
                                        </li>
                                        <li class="angle-shape"><a href="{{ route('product.view_all_product') }}">Xe
                                                Đạp</a>
                                            <ul class="submenu">
                                                @foreach ($categories as $category)
                                                @if ($category::has('products') && $category->status == 1)
                                                <li>
                                                    <a href="">{{$category->name}}</a>
                                                    <ul class="submenu tranright">
                                                        @foreach ($category->supplier_name() as $name)
                                                        <li><a href="">{{$name->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="public/client/shop.html">Mens</a></li>
                                        <li class="angle-shape"><a href="public/client/#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="public/client/about-us.html">about us </a></li>
                                                <li><a href="public/client/cart.html">cart page </a></li>
                                                <li><a href="public/client/checkout.html">checkout </a></li>
                                                <li><a href="public/client/compare.html">compare </a></li>
                                                <li><a href="public/client/wishlist.html">wishlist </a></li>
                                                <li><a href="public/client/my-account.html">my account </a></li>
                                                <li><a href="public/client/contact.html">contact us </a></li>
                                                <li><a href="public/client/login-register.html">login/register </a></li>
                                            </ul>
                                        </li>
                                        <li class="angle-shape"><a href="public/client/blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="public/client/blog.html">standard style </a></li>
                                                <li><a href="public/client/blog-2col.html">blog 2 column </a></li>
                                                <li><a href="public/client/blog-sidebar.html">blog sidebar </a></li>
                                                <li><a href="public/client/blog-details.html">blog details </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="public/client/contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3">
                            <div class="header-right-wrap mt-40">
                                <div class="cart-wrap common-style">
                                    <button class="cart-active">
                                        <i class="la la-shopping-cart"></i>
                                        <span class="count-style"><span id="count_cart"
                                                style="display: inline;">{{$count}}</span> Items</span>
                                    </button>
                                    <div class="shopping-cart-content" style="width: 450px!important">
                                        <div class="shopping-cart-top">
                                            <h4>Giỏ hàng của bạn</h4>
                                            <a class="cart-close" href="public/client/#"><i class="la la-close"></i></a>
                                        </div>
                                        <div class="cart_list">
                                            @include('Client.cart.cart_component')
                                        </div>
                                    </div>
                                </div>      
                                <div class="search-wrap common-style ml-25">
                                    <button class="search-active">
                                        <i class="la la-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-search start -->
                <div class="main-search-active">
                    <div class="sidebar-search-icon">
                        <button class="search-close"><span class="la la-close"></span></button>
                    </div>
                    <div class="sidebar-search-input">
                        <form>
                            <div class="form-search">
                                <input id="search" class="input-text" name="txtSearch" value="" placeholder="Tìm kiếm"
                                    type="search">
                                <button><i class="la la-search"></i></button>
                            </div>
                            <div class="result_keyup overflow-auto" style="height: 150px">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-small-mobile">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a href="public/client/index.html">
                                    <img alt="" src="public/client/assets/images/logo/logo-1.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap">
                                <div class="cart-wrap common-style">
                                    <button class="cart-active">
                                        <i class="la la-shopping-cart"></i>
                                        <span class="count-style">2 Items</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <div class="shopping-cart-top">
                                            <h4>Your Cart</h4>
                                            <a class="cart-close" href="public/client/#"><i class="la la-close"></i></a>
                                        </div>
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="public/client/#"><img alt=""
                                                            src="public/client/assets/images/cart/cart-1.jpg"></a>
                                                    <div class="item-close">
                                                        <a href="public/client/#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="public/client/#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="public/client/#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="public/client/#"><img alt=""
                                                            src="public/client/assets/images/cart/cart-2.jpg"></a>
                                                    <div class="item-close">
                                                        <a href="public/client/#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="public/client/#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="public/client/#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="public/client/#"><img alt=""
                                                            src="public/client/assets/images/cart/cart-3.jpg"></a>
                                                    <div class="item-close">
                                                        <a href="public/client/#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="public/client/#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="public/client/#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total">
                                                <h4>Subtotal <span class="shop-total">$290.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover default-btn text-center">
                                                <a class="black-color" href="public/client/checkout.html">Continue to
                                                    Chackout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="public/client/#"><i
                                            class="la la-navicon la-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close"><i class="la la-close"></i></a>
            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder="Search entire store…">
                        <button class="button-search"><i class="la la-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap">
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="public/client/index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="public/client/index.html">Home version 1 </a></li>
                                        <li><a href="public/client/index-2.html">Home version 2 </a></li>
                                        <li><a href="public/client/index-3.html">Home version 3 </a></li>
                                        <li><a href="public/client/index-4.html">Home version 4 </a></li>
                                        <li><a href="public/client/index-5.html">Home version 5 </a></li>
                                        <li><a href="public/client/index-6.html">Home version 6 </a></li>
                                        <li><a href="public/client/index-7.html">Home version 7 </a></li>
                                        <li><a href="public/client/index-8.html">Home version 8 </a></li>
                                        <li><a href="public/client/index-9.html">Home version 9 </a></li>
                                        <li><a href="public/client/index-10.html">Home version 10 </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="public/client/#">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="public/client/#">shop layout</a>
                                            <ul class="dropdown">
                                                <li><a href="public/client/shop.html">standard grid style</a></li>
                                                <li><a href="public/client/shop-2.html">standard style 2</a></li>
                                                <li><a href="public/client/shop-2-col.html">shop 2 column</a></li>
                                                <li><a href="public/client/shop-no-sidebar.html">shop no sidebar</a>
                                                </li>
                                                <li><a href="public/client/shop-fullwide.html">shop fullwide</a></li>
                                                <li><a href="public/client/shop-fullwide-no-sidebar.html">fullwide no
                                                        sidebar </a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="public/client/#">shop list
                                                layout</a>
                                            <ul class="dropdown">
                                                <li><a href="public/client/shop-list.html">list style</a></li>
                                                <li><a href="public/client/shop-list-2col.html">list 2 column</a></li>
                                                <li><a href="public/client/shop-list-no-sidebar.html">list no
                                                        sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="public/client/#">product details</a>
                                            <ul class="dropdown">
                                                <li><a href="public/client/product-details.html">standard style</a></li>
                                                <li><a href="public/client/product-details-2.html">standard style 2</a>
                                                </li>
                                                <li><a href="public/client/product-details-tab1.html">tab style 1</a>
                                                </li>
                                                <li><a href="public/client/product-details-tab2.html">tab style 2</a>
                                                </li>
                                                <li><a href="public/client/product-details-tab3.html">tab style 3 </a>
                                                </li>
                                                <li><a href="public/client/product-details-gallery.html">gallery style
                                                    </a></li>
                                                <li><a href="public/client/product-details-sticky.html">sticky style</a>
                                                </li>
                                                <li><a href="public/client/product-details-slider.html">slider style</a>
                                                </li>
                                                <li><a href="public/client/product-details-affiliate.html">Affiliate
                                                        style</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="public/client/#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="public/client/about-us.html">about us </a></li>
                                        <li><a href="public/client/cart.html">cart page </a></li>
                                        <li><a href="public/client/checkout.html">checkout </a></li>
                                        <li><a href="public/client/compare.html">compare </a></li>
                                        <li><a href="public/client/wishlist.html">wishlist </a></li>
                                        <li><a href="public/client/my-account.html">my account </a></li>
                                        <li><a href="public/client/contact.html">contact us </a></li>
                                        <li><a href="public/client/login-register.html">login/register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="public/client/#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="public/client/blog.html">standard style </a></li>
                                        <li><a href="public/client/blog-2col.html">blog 2 column </a></li>
                                        <li><a href="public/client/blog-sidebar.html">blog sidebar </a></li>
                                        <li><a href="public/client/blog-details.html">blog details </a></li>
                                    </ul>
                                </li>
                                <li><a href="public/client/contact.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="public/client/#">Language <i
                                class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="public/client/#">English (US)</a></li>
                                <li><a href="public/client/#">English (UK)</a></li>
                                <li><a href="public/client/#">Spanish</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-currency-active" href="public/client/#">Currency <i
                                class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown curr-dropdown-active">
                            <ul>
                                <li><a href="public/client/#">USD</a></li>
                                <li><a href="public/client/#">EUR</a></li>
                                <li><a href="public/client/#">Real</a></li>
                                <li><a href="public/client/#">BDT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="public/client/#">My Account <i
                                class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                <li><a href="public/client/#">Login</a></li>
                                <li><a href="public/client/#">Creat Account</a></li>
                                <li><a href="public/client/#">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-social-wrap">
                    <a class="facebook" href="public/client/#"><i class="ti-facebook"></i></a>
                    <a class="twitter" href="public/client/#"><i class="ti-twitter-alt"></i></a>
                    <a class="pinterest" href="public/client/#"><i class="ti-pinterest"></i></a>
                    <a class="instagram" href="public/client/#"><i class="ti-instagram"></i></a>
                    <a class="google" href="public/client/#"><i class="ti-google"></i></a>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div class="slider-active owl-carousel nav-style-1 dot-style-1 nav-dot-left">
                <div class="single-slider height-100vh bg-img" data-dot="01"
                    style="background-image:url({{url('public/uploads/files/banner_commont.jpg')}});">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                                <div class="slider-content-1 slider-animated-1 ml-70">
                                    <h3 class="animated">30% off</h3>
                                    <h1 class="animated">Comfort Chair</h1>
                                    <p class="animated">Collect from Daxone & get 30% Discount.</p>
                                    <div class="slider-btn-1 default-btn btn-hover">
                                        <a class="animated btn-color-theme btn-size-md btn-style-outline" href="#">SHOP
                                            NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider height-100vh bg-img" data-dot="02"
                    style="background-image:url({{url('public/uploads/files/banner03.jpg')}});">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-6 col-12 col-sm-6">
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 col-sm-6">
                                <div class="slider-content-1 slider-animated-1 ml-70">
                                    <h3 class="animated">30% off</h3>
                                    <h1 class="animated">Comfort Chair</h1>
                                    <p class="animated">Collect from Daxone & get 30% Discount.</p>
                                    <div class="slider-btn-1 default-btn btn-hover">
                                        <a class="animated btn-color-theme btn-size-md btn-style-outline"
                                            href="public/client/product-details.html">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-area pt-100 pb-100">
            <div class="container">
                <div class="bg-img pt-100 pb-100 learn-banner"
                    style="background-image:url({{url('public/uploads/files/banner01.jpg')}});">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 col-sm-11">
                            <div class="banner-content">
                                <h2 style="color: whitesmoke!important">Xe đạp <br>Chất lượng cao</h2>
                                <a href="#" style="color: whitesmoke!important">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-135">
            <div class="container">
                <div class="section-title text-center mb-40">
                    <h2>Best Sell</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text</p>
                </div>
                <div class="product-slider-active owl-carousel">
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="public/client/product-details.html"><img
                                    src="public/client/assets/images/product/pro-hm1-1.jpg" alt="product"></a>
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="public/client/#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="public/client/#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="public/client/#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="public/client/product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$210.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="public/client/#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="public/client/product-details.html"><img
                                    src="public/client/assets/images/product/pro-hm1-2.jpg" alt="product"></a>
                            <span class="price-dec">-30%</span>
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="public/client/#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="public/client/#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="public/client/#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="public/client/product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$210.00</span>
                                    <span class="old">$230.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="public/client/#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="public/client/product-details.html"><img
                                    src="public/client/assets/images/product/pro-hm1-3.jpg" alt="product"></a>
                            <span class="new-stock"><span>Stock <br>Out</span></span>
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="public/client/#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="public/client/#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="public/client/#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="public/client/product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$250.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="public/client/#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="public/client/product-details.html"><img
                                    src="public/client/assets/images/product/pro-hm1-4.jpg" alt="product"></a>
                            <span class="price-dec font-dec">NEW</span>
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="public/client/#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="public/client/#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="public/client/#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="public/client/product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$320.00</span>
                                    <span class="old">$120.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="public/client/#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="product-img mb-15">
                            <a href="public/client/product-details.html"><img
                                    src="public/client/assets/images/product/pro-hm1-2.jpg" alt="product"></a>
                            <span class="price-dec">-30%</span>
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                    href="public/client/#"><i class="la la-plus"></i></a>
                                <a title="Wishlist" href="public/client/#"><i class="la la-heart-o"></i></a>
                                <a title="Compare" href="public/client/#"><i class="la la-retweet"></i></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <span>Chair</span>
                            <h4><a href="public/client/product-details.html">Golden Easy Spot Chair.</a></h4>
                            <div class="price-addtocart">
                                <div class="product-price">
                                    <span>$210.00</span>
                                    <span class="old">$230.00</span>
                                </div>
                                <div class="product-addtocart">
                                    <a title="Add To Cart" href="public/client/#">+ Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="discount-area pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="discount-img">
                            <a href="public/client/#">
                                <img src="{{url('public/uploads/files/discount.jpg')}}" alt="discount-img">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="discount-content">
                            <p>Lorem Ipsum is simply dummy text of the <br>printing and typesetting industry.</p>
                            <h2>Winter Discount <br>Up to 30%</h2>
                            <p class="bright-color">It is a long established fact that a reader will be distracted by
                                the readable content of a page when looking at its layout.</p>
                            <div class="discount-btn default-btn btn-hover">
                                <a class="btn-color-theme btn-size-md btn-style-outline" href="#">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-60">
            <div class="container">
                <div class="section-title text-center mb-40">
                    <h2>All Products</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text</p>
                </div>
                <div class="row">
                    @foreach ($model as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                        <div class="product-wrap mb-35">
                            <div class="product-img mb-15">
                                <a href="{{ route('product.viewdetail',['alias' => $item->alias, 'id' => $item->id]) }}"><img
                                        src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}"></a>
                                @if ($item->promotion > 0)
                                <span class="price-dec">-{{$item->promotion}}%</span>
                                @endif
                                <div class="product-action">
                                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                                            class="la la-plus"></i></a>
                                    <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                    <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <span>{{ $item->supplier_name }}</span>
                                <h4><a href="{{ route('product.viewdetail',['alias' => $item->alias, 'id' => $item->id]) }}"></a>{{$item->name}}
                                </h4>
                                <div class="price-addtocart">
                                    <div class="product-price">
                                        @if ($item->promotion > 0)
                                        <span>{{number_format($item->price*((100-($item->promotion))/100))}} đ</span>
                                        <span class="old">{{number_format($item->price)}} đ</span>
                                        @else
                                        <span>{{number_format($item->price)}} đ</span>
                                        @endif
                                    </div>
                                    <div class="product-addtocart">
                                        <a title="Add To Cart" href="#" class="addToCart"
                                            data-url="{{ route('cart.add', ['id' => $item->id, 'quantity' => 1]) }}">+ Thêm
                                            vào giỏ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <footer class="footer-area">
            <div class="footer-top bg-gray pt-120 pb-85">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                            <div class="footer-widget mb-30">
                                <a href="public/client/#"><img src="public/client/assets/images/logo/logo-1.png"
                                        alt="logo"></a>
                                <div class="footer-social">
                                    <span>Follow us:</span>
                                    <ul>
                                        <li><a href="public/client/#"><i class=" ti-facebook "></i></a></li>
                                        <li><a href="public/client/#"><i class=" ti-twitter-alt "></i></a></li>
                                        <li><a href="public/client/#"><i class=" ti-pinterest "></i></a></li>
                                        <li><a href="public/client/#"><i class=" ti-vimeo-alt "></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-12 col-sm-6">
                            <div class="footer-widget mb-30 footer-mrg-hm1">
                                <div class="footer-title">
                                    <h3>Useful Link</h3>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="public/client/cart.html">Shopping Cat</a></li>
                                        <li><a href="public/client/wishlist.html">WIshlist</a></li>
                                        <li><a href="public/client/checkout.html">Chekout</a></li>
                                        <li><a href="public/client/contact.html">Support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-12 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3>About us</h3>
                                </div>
                                <div class="footer-list">
                                    <ul>
                                        <li><a href="public/client/cart.html">About</a></li>
                                        <li><a href="public/client/wishlist.html">Products</a></li>
                                        <li><a href="public/client/checkout.html">Terms and conditions</a></li>
                                        <li><a href="public/client/contact.html">Help Center</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="footer-title">
                                    <h3>Newsletter</h3>
                                </div>
                                <div class="subscribe-style mt-45">
                                    <p>Subscribe to get all new updates</p>
                                    <div id="mc_embed_signup" class="subscribe-form mt-20">
                                        <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style"
                                            novalidate="" target="_blank" name="mc-embedded-subscribe-form"
                                            method="post"
                                            action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                            <div id="mc_embed_signup_scroll" class="mc-form">
                                                <input class="email" type="email" required=""
                                                    placeholder="Enter your email" name="EMAIL" value="">
                                                <div class="mc-news" aria-hidden="true">
                                                    <input type="text" value="" tabindex="-1"
                                                        name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                                </div>
                                                <div class="clear">
                                                    <input id="mc-embedded-subscribe" class="button" type="submit"
                                                        name="subscribe" value="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom bg-gray-2 ptb-20">
                <div class="container">
                    <div class="copyright text-center">
                        <p>Copyright © <a href="public/client/#">Daxone</a>. All Right Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div class="tab-content quickview-big-img">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="public/client/assets/images/product/quickview-l1.jpg" alt="">
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="public/client/assets/images/product/quickview-l2.jpg" alt="">
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="public/client/assets/images/product/quickview-l3.jpg" alt="">
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="public/client/assets/images/product/quickview-l2.jpg" alt="">
                                    </div>
                                </div>
                                <!-- Thumbnail Large Image End -->
                                <!-- Thumbnail Image End -->
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                        <a class="active" data-toggle="tab" href="public/client/#pro-1"><img
                                                src="public/client/assets/images/product/quickview-s1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="public/client/#pro-2"><img
                                                src="public/client/assets/images/product/quickview-s2.jpg" alt=""></a>
                                        <a data-toggle="tab" href="public/client/#pro-3"><img
                                                src="public/client/assets/images/product/quickview-s3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="public/client/#pro-4"><img
                                                src="public/client/assets/images/product/quickview-s4.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <div class="product-details-content quickview-content">
                                    <span>Life Style</span>
                                    <h2>LaaVista Depro, FX 829 v1</h2>
                                    <div class="product-ratting-review">
                                        <div class="product-ratting">
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star"></i>
                                            <i class="la la-star-half-o"></i>
                                        </div>
                                        <div class="product-review">
                                            <span>40+ Reviews</span>
                                        </div>
                                    </div>
                                    <div class="pro-details-color-wrap">
                                        <span>Color:</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="green"></li>
                                                <li class="yellow"></li>
                                                <li class="red"></li>
                                                <li class="blue"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-size">
                                        <span>Size:</span>
                                        <div class="pro-details-size-content">
                                            <ul>
                                                <li><a href="public/client/#">s</a></li>
                                                <li><a href="public/client/#">m</a></li>
                                                <li><a href="public/client/#">xl</a></li>
                                                <li><a href="public/client/#">xxl</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-price-wrap">
                                        <div class="product-price">
                                            <span>$210.00</span>
                                            <span class="old">$230.00</span>
                                        </div>
                                        <div class="dec-rang"><span>- 30%</span></div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                        </div>
                                    </div>
                                    <div class="pro-details-compare-wishlist">
                                        <div class="pro-details-compare">
                                            <a title="Add To Compare" href="public/client/#"><i
                                                    class="la la-retweet"></i> Compare</a>
                                        </div>
                                        <div class="pro-details-wishlist">
                                            <a title="Add To Wishlist" href="public/client/#"><i
                                                    class="la la-heart-o"></i> Add to wish list</a>
                                        </div>
                                    </div>
                                    <div class="pro-details-buy-now btn-hover btn-hover-radious">
                                        <a href="public/client/#">Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>
    <!-- JS
        ============================================ -->

    <!-- Modernizer JS -->
    <script src="{{url('public/client/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!-- Modernizer JS -->
    <script src="{{url('public/client/assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <!-- Popper JS -->
    <script src="{{url('public/client/assets/js/vendor/popper.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{url('public/client/assets/js/vendor/bootstrap.min.js')}}"></script>
    <!-- Slick Slider JS -->
    <script src="{{url('public/client/assets/js/plugins/countdown.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/counterup.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/images-loaded.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/isotope.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/instafeed.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/owl-carousel.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/slick.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/wow.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/textillate.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/elevatezoom.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{url('public/client/assets/js/plugins/smoothscroll.js')}}"></script>
    <!-- Main JS -->
    <script src="{{url('public/client/snackbar/snackbar.min.js')}}"></script>
    <script src="{{url('public/toastr/toastr.min.js')}}"></script>
    <script src="{{url('public/client/assets/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "rtl": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 200,
                "hideDuration": 900,
                "timeOut": 900,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            var home = {
                init: function() {
                    home.registersEvent();
                },
                registersEvent: function() {
                    $('.addToCart').off('click').on('click', function(event) {
                        event.preventDefault();
                        var url = $(this).data('url');
                        if(url != "")
                            home.AddToCart(url);
                    });

                    //Xoá item trong giỏ hàng
                    $(document).off('click', '.btnDelete').on('click', '.btnDelete', function(event) {
                        event.preventDefault();
                        var url = $(this).data('url');
                        if(url != "")
                            home.DeleteCart(url);
                    });

                    $("input[name='txtSearch']").off('keyup').on('keyup', function() {
                        var txtSearch = $(this).val().trim();
                        var url = "{!! route('product.search_keyup_home') !!}";
                        $('.result_keyup').html('');
                        if((txtSearch != "" && txtSearch != null) && url != "")
                            home.SearchKeyUpHome(txtSearch, url);
                    });
                },
                AddToCart: function(url) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(res) {
                            if(res.status == 0)
                            {
                                $('.cart_list').html(res.html_cart);
                                $('#count_cart').html(res.count);
                                toastr["success"]("Thêm thành công");
                            }
                            else if(res.status == 1)
                            {
                                toastr["warning"]("Số lượng vượt quá đáp ứng");
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                },
                DeleteCart: function(url) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(res) {
                            if(res.status == 1)
                            {
                                $('#view_cart_list').html(res.cart_list);
                                $('.cart_list').html(res.html_cart);
                                $('#count_cart').html(res.count);
                                toastr["info"]("Xoá thành công");
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                },
                SearchKeyUpHome: function(txtSearch, url) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            txtSearch: txtSearch
                        },
                        success: function(res) {
                            if(res.status == 1)
                            {
                                $.each(res.model, function(index, value) {
                                    var url = "{!! url('/') !!}";
                                    var image_path = url + value.image;
                                    url += `/product/${value.alias}/${value.id}`;
                                    var html = `<a href="${url}" class="d-block" style="font-weight: bold; color: white; font-size: 16px; letter-spacing: 2px; margin-bottom: 5px;">
                                    <img src="${image_path}" alt="" style="width: 50px; margin-right: 5px;">${value.name}</a>`;
                                    $('.result_keyup').append(html);
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            };
            home.init();
        });
    </script>
</body>
</html>