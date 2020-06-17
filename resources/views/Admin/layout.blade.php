<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Admin @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('public/admin/assets/img/favicon.ico')}}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{asset('public/admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('public/admin/assets/css/support-chat.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/admin/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('public/admin/plugins/charts/chartist/chartist.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/admin/assets/css/default-dashboard/style.css')}}" rel="stylesheet" type="text/css" />
    @yield('css')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="default-sidebar">

    <!-- Tab Mobile View Header -->
    <header class="tabMobileView header navbar fixed-top d-lg-none">
        <div class="nav-toggle">
            <a href="javascript:void(0);" class="nav-link sidebarCollapse" data-placement="bottom">
                <i class="flaticon-menu-line-2"></i>
            </a>
            <a href="" class=""> <img src="{{asset('public/admin/assets/img/logo-3.png')}}" class="img-fluid"
                    alt="logo"></a>
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-item d-lg-none">
                <form class="form-inline justify-content-end" role="search">
                    <input type="text" class="form-control search-form-control mr-3">
                </form>
            </li>
        </ul>
    </header>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <header class="header navbar fixed-top navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse d-none d-lg-block" data-placement="bottom"><i
                class="flaticon-menu-line-2"></i></a>
        <ul class="navbar-nav flex-row ml-lg-auto">
            <li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-user-12"></span>
                </a>
                <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">
                    <a class="dropdown-item" href="user_profile.html">
                        <i class="mr-1 flaticon-user-6"></i> <span>My Profile</span>
                    </a>
                    <a class="dropdown-item" href="apps_scheduler.html">
                        <i class="mr-1 flaticon-calendar-bold"></i> <span>My Schedule</span>
                    </a>
                    <a class="dropdown-item" href="apps_mailbox.html">
                        <i class="mr-1 flaticon-email-fill-1"></i> <span>My Inbox</span>
                    </a>
                    <a class="dropdown-item" href="user_lockscreen_1.html">
                        <i class="mr-1 flaticon-lock-2"></i> <span>Lock Screen</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="user_login_1.html">
                        <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
                    </a>
                </div>
            </li>

            <li class="nav-item dropdown cs-toggle order-lg-0 order-3">
                <a href="#" class="nav-link toggle-control-sidebar suffle">
                    <span class="flaticon-menu-dot-fill d-lg-inline-block d-none"></span>
                    <span class="flaticon-dots d-lg-none"></span>
                </a>
            </li>
        </ul>
    </header>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>

        <!--  BEGIN SIDEBAR  -->

        <div class="sidebar-wrapper sidebar-theme">

            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>

            <nav id="sidebar">

                <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
                    <li class="nav-item d-flex">
                        <a href="index.html" class="navbar-brand">
                            <img src="{{asset('public/admin/assets/img/logo-3.png')}}" class="img-fluid" alt="logo">
                        </a>
                        <p class="border-underline"></p>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="#" class="nav-link"> Daxone </a>
                    </li>
                </ul>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-chart-line ml-3"></i>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('category.index') }}" class="dropdown-toggle">
                            @if ($title == 'product_categories')
                            <div class="">
                                <i class="flaticon-stack" style="background-color: #322c35;color: #fff;"></i>
                                <span style="color: #fff;">Loại sản phẩm</span>
                            </div>
                            <div>
                                <i class="flaticon-minimize"></i>
                            </div>
                            @else
                            <div class="">
                                <i class="flaticon-stack"></i>
                                <span>Loại sản phẩm</span>
                            </div>
                            @endif
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('supplier.index') }}" class="dropdown-toggle">
                            @if ($title == 'suppliers')
                            <div class="">
                                <i class="flaticon-user-plus" style="background-color: #322c35;color: #fff;"></i>
                                <span style="color: #fff;">Nhà cung cấp</span>
                            </div>
                            <div>
                                <i class="flaticon-minimize"></i>
                            </div>
                            @else
                            <div class="">
                                <i class="flaticon-user-plus"></i>
                                <span style="color: #fff;">Nhà cung cấp</span>
                            </div>
                            @endif
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('product.index') }}" class="dropdown-toggle">
                            @if ($title == 'products')
                            <div class="">
                                <i class="flaticon-gift" style="background-color: #322c35;color: #fff;"></i>
                                <span style="color: #fff;">Sản phẩm</span>
                            </div>
                            <div>
                                <i class="flaticon-minimize"></i>
                            </div>
                            @else
                            <div class="">
                                <i class="flaticon-gift"></i>
                                <span>Sản phẩm</span>
                            </div>
                            @endif
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('order.index') }}" class="dropdown-toggle">
                            @if ($title == 'orders')
                            <div class="">
                                <i class="flaticon-cart-bag-2" style="background-color: #322c35;color: #fff;"></i>
                                <span style="color: #fff;">Đơn hàng</span>
                            </div>
                            <div>
                                <i class="flaticon-minimize"></i>
                            </div>
                            @else
                            <div class="">
                                <i class="flaticon-cart-bag-2"></i>
                                <span>Đơn hàng</span>
                            </div>
                            @endif
                        </a>
                    </li>
                    <li class="menu">
                        <a href="#" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-social"></i>
                                <span>Khách hàng</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            @yield('content')
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <footer class="footer-section theme-footer">

        <div class="footer-section-1  sidebar-theme">

        </div>

        <div class="footer-section-2 container-fluid">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <ul class="list-inline mb-0 d-flex justify-content-sm-end justify-content-center mr-sm-3 ml-sm-0 mx-3">
                    <li class="list-inline-item  mr-3">
                        <p class="bottom-footer">&#xA9; 2020 <a target="_blank"
                                href="https://designreset.com/equation">Daxone Admin</a></p>
                    </li>
                    <li class="list-inline-item align-self-center">
                        <div class="scrollTop"><i class="flaticon-up-arrow-fill-1"></i></div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </footer>
    <!--  END FOOTER  -->

    <!--  BEGIN CONTROL SIDEBAR  -->
    <aside class="control-sidebar control-sidebar-light-color cs-content">
        <div class="">

            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="close-sidebar">
                        <i class="flaticon-close-fill p-3 toggle-control-sidebar"></i>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="usr-info text-center mb-5">
                        <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                            class="img-fluid rounded-circle mb-3">
                        <div class=" mt-2">
                            <h5 class="usr-name mb-0">Linda Nelson</h5>
                            <p class="usr-occupation mb-0 mt-1">Developer</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-navigation-section text-center mb-5 mt-3">
                <ul class="nav nav-tabs nav-justified mx-2">
                    <li class="nav-item">
                        <a data-toggle="tab" href="#feeds-tab" class="nav-link rounded-circle active show">
                            <p class="mb-0">Task</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#friends-tab" class="nav-link rounded-circle">
                            <p class="mb-0">Friends</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#alerts-tab" class="nav-link rounded-circle">
                            <p class="mb-0">Settings</p>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">

                <div id="feeds-tab" class="tab-pane tab-1 fade show active">

                    <div class="tasks">

                        <div class="recent">

                            <div class="d-flex justify-content-between mb-5">

                                <div class="icon">
                                    <i class="flaticon-clock-1"></i>
                                </div>


                                <div>
                                    <span class="">Today</span> <span class="notification-count ml-2">12</span>
                                </div>

                                <div>
                                    <p class="r-view-all">See all</p>
                                </div>

                            </div>


                            <div class="media">
                                <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                    class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Sean Freeman</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>

                            <div class="media">
                                <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                    class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Laurie Fox</h6>
                                    <p>comment to your posts.</p>
                                    <p class="meta-time">13 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>

                            <div class="media system-notify">
                                <i class="flaticon-settings-7  mr-3"></i>
                                <div class="media-body">
                                    <h6 class="mb-0">System Notifications</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>


                            <div class="media mail-notify">
                                <i class="flaticon-folder-fill-1  mr-3"></i>
                                <div class="media-body">
                                    <h6 class="mb-0">Ricky Turner</h6>
                                    <p>has replied your mails.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill remove-noti"></i>
                            </div>

                        </div>



                        <div class="today mt-5">

                            <div class="d-flex justify-content-between mb-5">

                                <div class="icon">
                                    <i class="flaticon-bell-fill-1"></i>
                                </div>
                                <div>
                                    <span>Yesterday</span> <span class="notification-count ml-2">8</span>
                                </div>

                                <div>
                                    <p class="r-view-all">See all</p>
                                </div>

                            </div>


                            <div class="media">
                                <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                    class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Angie Lamb</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>

                            <div class="media">
                                <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                    class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Amy Diaz</h6>
                                    <p>comment to your posts.</p>
                                    <p class="meta-time">13 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>

                            <div class="media">
                                <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                    class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Irene Collins</h6>
                                    <p>has replied your mail.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>


                            <div class="media">
                                <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                    class="img-fluid mr-3">
                                <div class="media-body">
                                    <h6 class="mb-0">Lila Perry</h6>
                                    <p>has replied your mails.</p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                                <i class="flaticon-close-fill  remove-noti"></i>
                            </div>


                        </div>


                        <div class="task-stats mt-5">

                            <div class="t-s-header mb-5">
                                <div class="row">
                                    <div class="col-md-10 text-center">
                                        <h6><span>Task Statistics</span></h6>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <i class="flaticon-close-fill"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="t-s-body">

                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-between">
                                            <p>Feature Development</p>
                                            <p>70%</p>
                                        </div>

                                        <div class="progress  br-30 mb-4">
                                            <div class="progress-bar  br-30 bg-secondary" role="progressbar"
                                                style="width: 70%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-between mt-3">
                                            <p>Uploading files</p>
                                            <p>30%</p>
                                        </div>

                                        <div class="progress  br-30 mb-4">
                                            <div class="progress-bar  br-30 bg-danger" role="progressbar"
                                                style="width: 30%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="d-flex justify-content-between mt-3">
                                            <p>Total Progress</p>
                                            <p>86%</p>
                                        </div>

                                        <div class="progress  br-30">
                                            <div class="progress-bar  br-30 bg-info" role="progressbar"
                                                style="width: 86%" aria-valuenow="75" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                </div>

                                <div class="text-center mt-5 mb-5">
                                    <button class="btn btn-primary btn-rounded mb-5">See all</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div id="friends-tab" class="tab-pane tab-2 fade">

                    <div class="friends">

                        <div class="recent">

                            <div class="t-s-header mb-5">

                                <div class="row">

                                    <div class="col-md-8 text-center">
                                        <h6>
                                            <span>New Activity</span>
                                        </h6>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <p>See all</p>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <ul class="list-inline text-center mb-5">

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                    <span class="badge badge-pill badge-new">8</span>
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                    <span class="badge badge-pill badge-new">5</span>
                                </li>

                                <li class="list-inline-item">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                </li>

                            </ul>


                            <div class="friend-request">

                                <div class="d-flex justify-content-between header mb-5">

                                    <div class="media">
                                        <i class="flaticon-user-plus mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mt-1">Friend request</h6>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="mb-0 mt-2">See all</p>
                                    </div>

                                </div>

                                <div class="media">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                        class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Kara Young</h6>
                                        <p>2 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>

                                <div class="media mt-2">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                        class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Justin Cross</h6>
                                        <p>5 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>

                                <div class="media mt-2">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                        class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Amy Diaz</h6>
                                        <p>7 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>


                                <div class="media mt-2">
                                    <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                        class="img-fluid mr-3">
                                    <div class="media-body">
                                        <h6>Ernest Reeves</h6>
                                        <p>10 mins ago</p>
                                    </div>
                                    <i class="flaticon-fill-tick mr-2"></i>
                                    <i class="flaticon-close-fill"></i>
                                </div>

                            </div>


                        </div>



                        <div class="online mt-5">

                            <div class="t-s-header mb-5">

                                <div class="row">

                                    <div class="col-md-8 text-center">
                                        <h6>
                                            <span>Online</span>
                                        </h6>
                                    </div>

                                    <div class="col-md-4">
                                        <div>
                                            <p class="mb-0 mt-0">See all</p>
                                        </div>
                                    </div>

                                </div>

                            </div>


                            <div class="media d-block d-sm-flex text-sm-left text-center">
                                <img alt="admin-profile" class="mr-sm-3 mb-sm-0 mb-3"
                                    src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                <div class="media-body mb-4">
                                    <h6 class="media-heading mt-0"><span class="media-title"> Irene Collins</span><span
                                            class="badge badge-info float-sm-right ml-2">9</span></h6>
                                    <p class="media-text">
                                        Cras sit amet gravida nulla.
                                    </p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                            </div>


                            <div class="media d-block d-sm-flex text-sm-left text-center">
                                <img alt="admin-profile" class="mr-sm-3 mb-sm-0 mb-3 rounded"
                                    src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                <div class="media-body mb-4">
                                    <h6 class="media-heading mt-0"><span class="media-title"> Thomas Granger</span><span
                                            class="badge badge-secondary float-sm-right ml-2">9</span></h6>
                                    <p class="media-text">
                                        Cras sit amet gravida nulla.
                                    </p>
                                    <p class="meta-time">13 mins ago</p>
                                </div>
                            </div>


                            <div class="media d-block d-sm-flex text-sm-left text-center">
                                <img alt="admin-profile" class="mr-sm-3 mb-sm-0 mb-3 rounded-circle"
                                    src="{{asset('public/admin/assets/img/120x120.jpg')}}">
                                <div class="media-body mb-4">
                                    <h6 class="media-heading mt-0"><span class="media-title"> Grace Roberts</span><span
                                            class="badge badge-warning float-sm-right ml-2">9</span></h6>
                                    <p class="media-text">
                                        Cras sit amet gravida nulla.
                                    </p>
                                    <p class="meta-time">7 mins ago</p>
                                </div>
                            </div>

                        </div>


                        <div class="away-stats">


                            <div class="t-s-header mb-5 mt-5">

                                <div class="row">

                                    <div class="col-md-12">
                                        <h6>
                                            <span>Away</span>
                                        </h6>
                                    </div>

                                </div>

                            </div>

                            <div class="a-s-media mb-5">

                                <div class="media mb-3">
                                    <div class="profile-img mr-3">
                                        <img alt="admin-profile" src="{{asset('public/admin/assets/img/90x90.jpg')}}"
                                            class="img-fluid">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-2">Traci Lopez</h6>
                                    </div>
                                </div>

                                <div class="media mb-3">
                                    <div class="profile-img mr-3">
                                        <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                            class="img-fluid">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-2">Kristen Beck</h6>
                                    </div>
                                </div>

                                <div class="media mb-5">
                                    <div class="profile-img mr-3">
                                        <img alt="admin-profile" src="{{asset('public/admin/assets/img/120x120.jpg')}}"
                                            class="img-fluid">
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-2">Keith Foster</h6>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>

                <div id="alerts-tab" class="tab-pane tab-3 fade">

                    <div class="settings">

                        <div class="admin-setting">


                            <div class="d-flex justify-content-between">

                                <div class="media">
                                    <i class="flaticon-gear-5 mr-3"></i>
                                    <div class="media-body">
                                        <h6 class="mt-2">Admin settings</h6>
                                    </div>
                                </div>

                                <div>
                                    <p class="mb-0 mt-2">See all</p>
                                </div>

                            </div>


                            <div class="mb-3 mt-5">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Show notifications</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Enable auto logout</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Show recent activity</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Chat history</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Users activity</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Orders history</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 mt-1">Show task statistics</h6>
                                    <label
                                        class="custom-control material-switch mb-4 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="general-setting mt-5">


                            <div class="d-flex justify-content-between mb-5">

                                <div class="media">
                                    <i class="flaticon-gear-5 mr-3"></i>
                                    <div class="media-body">
                                        <h6 class="mt-2">General Settings</h6>
                                    </div>
                                </div>

                            </div>


                            <div class="media mb-4">
                                <i class="flaticon-facebook-logo fb"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label
                                        class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="media mb-4">
                                <i class="flaticon-dribbble-bold dribbble"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label
                                        class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="media mb-4">
                                <i class="flaticon-linkedin-logo lin"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label
                                        class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="media mb-4">
                                <i class="flaticon-twitter-logo tweet"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label
                                        class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>


                            <div class="media mb-4">
                                <i class="flaticon-behance-logo behance"></i>
                                <div class="media-body d-flex justify-content-around">
                                    <h6 class="mb-0 mt-2">Show notfications</h6>
                                    <label
                                        class="custom-control material-switch mb-4  mt-2 material-s-rounded material-primary">
                                        <input type="checkbox" class="material-switch-control-input" checked="">
                                        <span class="material-switch-control-indicator"></span>
                                    </label>
                                </div>
                            </div>






                            <div class="chk-settings mt-5">

                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title">Report panel
                                                usage</span>
                                        </h6>
                                        <p class="media-text">
                                            Show information on any malicious activity
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                            <input type="checkbox" class="new-control-input" checked>
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title">Allow mail
                                                redirect</span>
                                        </h6>
                                        <p class="media-text">
                                            Redirect mail through exchange server
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Show author name in
                                                posts</span>
                                        </h6>
                                        <p class="media-text">
                                            Allow the user to show his name in blog posts
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                            <input type="checkbox" class="new-control-input" checked>
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                                <div class="media mb-4 ">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Sync phone when
                                                connected to the PC</span>
                                        </h6>
                                        <p class="media-text">
                                            Connect smart phone automatically and sync with user profile
                                        </p>
                                    </div>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-secondary mr-1">
                                            <input type="checkbox" class="new-control-input" checked>
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>

                            </div>


                            <div class="mt-5 delete-chat mb-5">

                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Delete chat
                                                history</span>
                                        </h6>
                                    </div>
                                    <i class="del-chat-his flaticon-delete-1 mb-4"></i>

                                </div>

                            </div>




                            <div class="mt-5 usr-status mb-5">

                                <div class="d-flex justify-content-between mb-5">

                                    <div class="media">
                                        <i class="flaticon-chat-fill mr-3"></i>
                                        <div class="media-body">
                                            <h6 class="mt-2">Status</h6>
                                        </div>
                                    </div>

                                </div>

                                <div class="media mb-2 stats">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Online</span>
                                        </h6>
                                    </div>

                                    <div class="n-chk">
                                        <label
                                            class="new-control new-checkbox  mr-1  checkbox-outline-success new-checkbox-rounded">
                                            <input type="checkbox" class="chb new-control-input">
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>

                                </div>


                                <div class="media mb-2 stats">
                                    <div class="media-body">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Offline</span>
                                        </h6>
                                    </div>

                                    <div class="n-chk">
                                        <label
                                            class="new-control new-checkbox  mr-1  checkbox-outline-default new-checkbox-rounded">
                                            <input type="checkbox" class="chb new-control-input">
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>



                                <div class="media mb-5 stats">
                                    <div class="media-body mb-5">
                                        <h6 class="media-heading mt-0"><span class="media-title"> Away</span>
                                        </h6>
                                    </div>

                                    <div class="n-chk">
                                        <label
                                            class="new-control new-checkbox  mr-1  checkbox-outline-warning new-checkbox-rounded">
                                            <input type="checkbox" class="chb new-control-input">
                                            <span class="new-control-indicator"></span><span class="invisible">C</span>
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </aside>
    <!--  END CONTROL SIDEBAR  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('public/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/admin/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/app.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('public/admin/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{asset('public/admin/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script
        src="{{asset('public/admin/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js')}}">
    </script>
    <script src="{{asset('public/admin/plugins/calendar/pignose/moment.latest.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/calendar/pignose/pignose.calendar.js')}}"></script>
    <script src="{{asset('public/admin/plugins/progressbar/progressbar.min.js')}}"></script>
    <script src="{{asset('public/admin/assets/js/support-chat.js')}}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @yield('js')
</body>

</html>