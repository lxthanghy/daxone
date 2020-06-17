<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
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
    @yield('css')
</head>

<body>
    <div class="main-wrapper">
        <header class="header-area transparent-bar sticky-bar pt-10">
            <div class="main-header-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-3">
                            <div class="logo">
                                <a href=""><img src="{{url('public/client/assets/images/logo/logo-1.png')}}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div
                                class="main-menu menu-common-style menu-lh-1 menu-margin-4 menu-font-3 ml-20 menu-others-page">
                                <nav>
                                    <ul>
                                        <li class="angle-shape"><a href="index.html">Home</a>
                                            <ul class="submenu">
                                                <li><a href="index.html">Home version 1 </a></li>
                                                <li><a href="index-2.html">Home version 2 </a></li>
                                                <li><a href="index-3.html">Home version 3 </a></li>
                                                <li><a href="index-4.html">Home version 4 </a></li>
                                                <li><a href="index-5.html">Home version 5 </a></li>
                                                <li><a href="index-6.html">Home version 6 </a></li>
                                                <li><a href="index-7.html">Home version 7 </a></li>
                                                <li><a href="index-8.html">Home version 8 </a></li>
                                                <li><a href="index-9.html">Home version 9 </a></li>
                                                <li><a href="index-10.html">Home version 10 </a></li>
                                            </ul>
                                        </li>
                                        <li class="angle-shape"><a
                                                href="{{ route('product.view_all_product') }}">Shop</a>
                                        </li>
                                        <li><a href="shop.html">Mens</a></li>
                                        <li class="angle-shape"><a href="#">Pages</a>
                                            <ul class="submenu">
                                                <li><a href="about-us.html">about us </a></li>
                                                <li><a href="cart.html">cart page </a></li>
                                                <li><a href="checkout.html">checkout </a></li>
                                                <li><a href="compare.html">compare </a></li>
                                                <li><a href="wishlist.html">wishlist </a></li>
                                                <li><a href="my-account.html">my account </a></li>
                                                <li><a href="contact.html">contact us </a></li>
                                                <li><a href="login-register.html">login/register </a></li>
                                            </ul>
                                        </li>
                                        <li class="angle-shape"><a href="blog.html">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">standard style </a></li>
                                                <li><a href="blog-2col.html">blog 2 column </a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar </a></li>
                                                <li><a href="blog-details.html">blog details </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <div class="header-right-wrap mt-10">
                                <div class="header-wishlist">
                                    <a href="wishlist.html"><i class="la la-heart-o"></i></a>
                                </div>
                                <div class="header-login ml-40">
                                    @if (Auth::guard('customer')->check())
                                    <a href="{{ route('customer.my_account') }}"><i class="la la-user"></i></a>
                                    @else
                                    <a href="{{ route('customer.login') }}"><i class="la la-user"></i></a>
                                    @endif
                                </div>
                                @if (url()->current() != url('/').'/checkout')
                                <div class="cart-wrap common-style ml-35">
                                    <button class="cart-active cart-3">
                                        <span class="count-style"><span id="count_cart"
                                                style="display: inline;">{{$count}}</span> Items</span>
                                        <i class="la la-shopping-cart"></i>
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
                                @endif
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
                                <input id="search" class="input-text" value="" placeholder="Search Now" type="search">
                                <button>
                                    <i class="la la-search"></i>
                                </button>
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
                                <a href="index.html">
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
                                            <a class="cart-close" href="#"><i class="la la-close"></i></a>
                                        </div>
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="public/client/assets/images/cart/cart-1.jpg"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="public/client/assets/images/cart/cart-2.jpg"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt=""
                                                            src="public/client/assets/images/cart/cart-3.jpg"></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">Golden Easy Spot Chair.</a></h4>
                                                    <span>$99.00</span>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="la la-trash"></i></a>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total">
                                                <h4>Subtotal <span class="shop-total">$290.00</span></h4>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover default-btn text-center">
                                                <a class="black-color" href="checkout.html">Continue to Chackout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="la la-navicon la-2x"></i></a>
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
                                <li class="menu-item-has-children"><a href="index.html">Home</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home version 1 </a></li>
                                        <li><a href="index-2.html">Home version 2 </a></li>
                                        <li><a href="index-3.html">Home version 3 </a></li>
                                        <li><a href="index-4.html">Home version 4 </a></li>
                                        <li><a href="index-5.html">Home version 5 </a></li>
                                        <li><a href="index-6.html">Home version 6 </a></li>
                                        <li><a href="index-7.html">Home version 7 </a></li>
                                        <li><a href="index-8.html">Home version 8 </a></li>
                                        <li><a href="index-9.html">Home version 9 </a></li>
                                        <li><a href="index-10.html">Home version 10 </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">shop</a>
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children"><a href="#">shop layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html">standard grid style</a></li>
                                                <li><a href="shop-2.html">standard style 2</a></li>
                                                <li><a href="shop-2-col.html">shop 2 column</a></li>
                                                <li><a href="shop-no-sidebar.html">shop no sidebar</a></li>
                                                <li><a href="shop-fullwide.html">shop fullwide</a></li>
                                                <li><a href="shop-fullwide-no-sidebar.html">fullwide no sidebar </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">shop list layout</a>
                                            <ul class="dropdown">
                                                <li><a href="shop-list.html">list style</a></li>
                                                <li><a href="shop-list-2col.html">list 2 column</a></li>
                                                <li><a href="shop-list-no-sidebar.html">list no sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">product details</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">standard style</a></li>
                                                <li><a href="product-details-2.html">standard style 2</a></li>
                                                <li><a href="product-details-tab1.html">tab style 1</a></li>
                                                <li><a href="product-details-tab2.html">tab style 2</a></li>
                                                <li><a href="product-details-tab3.html">tab style 3 </a></li>
                                                <li><a href="product-details-gallery.html">gallery style </a></li>
                                                <li><a href="product-details-sticky.html">sticky style</a></li>
                                                <li><a href="product-details-slider.html">slider style</a></li>
                                                <li><a href="product-details-affiliate.html">Affiliate style</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="about-us.html">about us </a></li>
                                        <li><a href="cart.html">cart page </a></li>
                                        <li><a href="checkout.html">checkout </a></li>
                                        <li><a href="compare.html">compare </a></li>
                                        <li><a href="wishlist.html">wishlist </a></li>
                                        <li><a href="my-account.html">my account </a></li>
                                        <li><a href="contact.html">contact us </a></li>
                                        <li><a href="login-register.html">login/register </a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Blog</a>
                                    <ul class="dropdown">
                                        <li><a href="blog.html">standard style </a></li>
                                        <li><a href="blog-2col.html">blog 2 column </a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar </a></li>
                                        <li><a href="blog-details.html">blog details </a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact us</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-language-active" href="#">Language <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown lang-dropdown-active">
                            <ul>
                                <li><a href="#">English (US)</a></li>
                                <li><a href="#">English (UK)</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-currency-active" href="#">Currency <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown curr-dropdown-active">
                            <ul>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">Real</a></li>
                                <li><a href="#">BDT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-mobile-curr-lang">
                        <a class="mobile-account-active" href="#">My Account <i class="la la-angle-down"></i></a>
                        <div class="lang-curr-dropdown account-dropdown-active">
                            <ul>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Creat Account</a></li>
                                <li><a href="#">My Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mobile-social-wrap">
                    <a class="facebook" href="#"><i class="ti-facebook"></i></a>
                    <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
                    <a class="pinterest" href="#"><i class="ti-pinterest"></i></a>
                    <a class="instagram" href="#"><i class="ti-instagram"></i></a>
                    <a class="google" href="#"><i class="ti-google"></i></a>
                </div>
            </div>
        </div>
        <div class="breadcrumb-area bg-img"
            style="background-image:url({{url('public/uploads/files/banner_commont.jpg')}});">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Product details page</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">Product details sticky</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content-area pt-80 pb-80">
            @yield('content')
        </div>
        <footer class="footer-area section-padding-2 bg-bluegray pt-80">
            <div class="container-fluid">
                <div class="footer-top pb-40">
                    <div class="row">
                        <div class="col-lg-3 col-md-8 col-12 col-sm-12">
                            <div class="footer-widget mb-30">
                                <a href="#"><img src="{{url('public/client/assets/images/logo/logo-1.png')}}"
                                        alt="logo"></a>
                                <div class="footer-about">
                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are
                                        so beguiled and demoralized by the charms. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-6 col-sm-6">
                            <div class="footer-widget mb-30 ml-55">
                                <div class="footer-title-3">
                                    <h3>Company</h3>
                                </div>
                                <div class="footer-list-3">
                                    <ul>
                                        <li><a href="about-us.html">About US</a></li>
                                        <li><a href="blog.html">Blogs</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 col-sm-6">
                            <div class="footer-widget mb-30 footer-ngtv-mrg1">
                                <div class="footer-title-3">
                                    <h3>Product</h3>
                                </div>
                                <div class="footer-list-3">
                                    <ul>
                                        <li><a href="#">Pricing</a></li>
                                        <li><a href="#">Features</a></li>
                                        <li><a href="#">Customers</a></li>
                                        <li><a href="#">Demos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 col-sm-6">
                            <div class="footer-widget mb-30 ml-35">
                                <div class="footer-title-3">
                                    <h3>Helps</h3>
                                </div>
                                <div class="footer-list-3">
                                    <ul>
                                        <li><a href="#">Introduction</a></li>
                                        <li><a href="#">Feedback</a></li>
                                        <li><a href="#">Referrals</a></li>
                                        <li><a href="#">Network Status</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6 col-sm-6">
                            <div class="footer-widget mb-30 ml-135">
                                <div class="footer-title-3">
                                    <h3>Social Netowrk</h3>
                                </div>
                                <div class="footer-list-3">
                                    <ul>
                                        <li><a href="#">Facebook</a></li>
                                        <li><a href="#">Twitter</a></li>
                                        <li><a href="#">Linkedin</a></li>
                                        <li><a href="#">Google +</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                                        <a class="active" data-toggle="tab" href="#pro-1"><img
                                                src="public/client/assets/images/product/quickview-s1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img
                                                src="public/client/assets/images/product/quickview-s2.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img
                                                src="public/client/assets/images/product/quickview-s3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img
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
                                                <li><a href="#">s</a></li>
                                                <li><a href="#">m</a></li>
                                                <li><a href="#">xl</a></li>
                                                <li><a href="#">xxl</a></li>
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
                                            <a title="Add To Compare" href="#"><i class="la la-retweet"></i> Compare</a>
                                        </div>
                                        <div class="pro-details-wishlist">
                                            <a title="Add To Wishlist" href="#"><i class="la la-heart-o"></i> Add to
                                                wish list</a>
                                        </div>
                                    </div>
                                    <div class="pro-details-buy-now btn-hover btn-hover-radious">
                                        <a href="#">Add To Cart</a>
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
    <script>
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
                "hideDuration": 1000,
                "timeOut": 1000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            var common = {
                init: function() {
                    common.registersEvent();
                },
                registersEvent: function() {
                    $('.addToCart').off('click').on('click', function(event) {
                        event.preventDefault();
                        var url = $(this).data('url');
                        if(url != "")
                            common.AddToCart(url);
                    });

                    //Xoá item trong giỏ hàng
                    $(document).off('click', '.btnDelete').on('click', '.btnDelete', function(event) {
                        event.preventDefault();
                        var url = $(this).data('url');
                        if(url != "")
                            common.DeleteCart(url);
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
            };
            common.init();
        });
    </script>
    @yield('js')
</body>
</html>