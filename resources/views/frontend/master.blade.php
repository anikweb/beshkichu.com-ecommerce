<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <title> @if(Route::is('frontend')) Home @elseif(Route::is('frontend.product')) Products @elseif(Route::is('frontend.product.single')) {{ $product->name }} @elseif(Route::is('frontend.wishlist.index')) Wishlist @elseif(Route::is('cart.index')) Carts @elseif(Route::is('checkout.index')) Checkout @elseif(Route::is('my-account.index')) Profile @elseif(Route::is('my-account.personal.information.edit')) Update Profile @elseif(Route::is('my-account.orders')) Orders @elseif(Route::is('my-account.delivered.order')) Delevered Orders @elseif(Route::is('my-account.orders.track')) Track Orders @elseif(Route::is('login')) Login @elseif(Route::is('register')) Register @elseif(Route::is('password.request')) Forgot Password @elseif(Route::is('password.reset')) Reset Password  @endif | {{ basicSettings()->site_title }}</title>
    <meta name="description" content="{{ basicSettings()->tagline }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="big-deal">
    <meta name="author" content="big-deal">

    <!--Google font-->
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

    <!--icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify.css') }}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/slick-theme.css') }}">

    <!--Animate css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/color2.css" media="screen" id="color">
    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/'.basicSettings()->icon) }}" type="image/x-icon">
    @yield('inline_style')
    <!-- Main Style -->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->

</head>

<body>
    <header>
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-5 col-md-7 col-sm-6">
                        <div class="top-header-left">
                            <div class="shpping-order">
                                <h6>free shipping on order over $99 </h6>
                            </div>
                            <div class="app-link">
                                <h6>Download app</h6>
                                <ul>
                                    <li><a><i class="fa fa-apple"></i></a></li>
                                    <li><a><i class="fa fa-android"></i></a></li>
                                    <li><a><i class="fa fa-windows"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-md-5 col-sm-6">
                        <div class="top-header-right">
                            <div class="top-menu-block">
                                <ul>
                                    <li><a href="#">gift cards</a></li>
                                    <li><a href="#">Notifications</a></li>
                                    <li><a href="#">help &amp; contact</a></li>
                                    <li><a href="#">todays deal</a></li>
                                    <li><a href="#">track order</a></li>
                                    <li><a href="#">shipping </a></li>
                                    <li><a href="#">easy returns</a></li>
                                </ul>
                            </div>
                            <div class="language-block">
                                <div class="language-dropdown">
                                    <span class="language-dropdown-click">
                                        <a href="{{ route('register') }}" class="text-white"> Register</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-header2">
            <div class="container">
                <div class="col-md-12">
                    <div class="main-menu-block">
                        <div class="sm-nav-block">
                            <span class="sm-nav-btn"><i class="fa fa-bars"></i></span>
                            <ul class="nav-slide">
                                <li>
                                <div class="nav-sm-back">
                                    back <i class="fa fa-angle-right pl-2"></i>
                                </div>
                                </li>
                                <li><a href="#">western ware</a></li>
                                <li><a href="#">TV, Appliances</a></li>
                                <li><a href="#">Pets Products</a></li>
                                <li><a href="#">Car, Motorbike</a></li>
                                <li><a href="#">Industrial Products</a></li>
                                <li><a href="#">Beauty, Health Products</a></li>
                                <li><a href="#">Grocery Products </a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Bags, Luggage</a></li>
                                <li><a href="#">Movies, Music </a></li>
                                <li><a href="#">Video Games</a></li>
                                <li><a href="#">Toys, Baby Products</a></li>
                                <li class="mor-slide-open" style="display: none;">
                                <ul>
                                    <li><a href="#">Bags, Luggage</a></li>
                                    <li><a href="#">Movies, Music </a></li>
                                    <li><a href="#">Video Games</a></li>
                                    <li><a href="#">Toys, Baby Products</a></li>
                                </ul>
                                </li>
                                <li>
                                <a class="mor-slide-click">
                                    mor category
                                    <i class="fa fa-angle-down pro-down"></i>
                                    <i class="fa fa-angle-up pro-up" style="display: none;"></i>
                                </a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-block">
                            <a href="{{ route('frontend') }}"><img style="max-width:250px;" src="{{ asset('assets/images/logo/'.basicSettings()->logo) }}" class="img-fluid  " alt="{{ basicSettings()->site_title }}"></a>
                        </div>
                        <div class="input-block">
                            <div class="input-box">
                                <form class="big-deal-form">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="search"><i class="fa fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search a Product">
                                        <div class="input-group-prepend">
                                            <select>
                                                <option>All Category</option>
                                                <option>indurstrial</option>
                                                <option>sports</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="cart-block cart-hover-div " onclick="openCart()">
                            <div class="cart ">
                                <span class="cart-product">0</span>
                                <ul>
                                    <li class="mobile-cart  ">
                                        <a href="#">
                                        <i class="icon-shopping-cart "></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-item">
                                <h5>shopping</h5>
                                <h5>cart</h5>
                            </div>
                        </div>
                        <div class="menu-nav">
                            <span class="toggle-nav">
                                <i class="fa fa-bars "></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category-header-2">
            <div class="custom-container">
                <div class="row">
                    <div class="col">
                        <div class="navbar-menu">
                            <div class="category-left">
                                <div class="nav-block">
                                <div class="nav-left">
                                    <nav class="navbar" data-toggle="collapse" data-target="#navbarToggleExternalContent">
                                    <button class="navbar-toggler" type="button" style="">
                                        <span class="navbar-icon"><i class="fa fa-arrow-down"></i></span>
                                    </button>
                                    <h5 class="mb-0  text-white title-font">Shop by category</h5>
                                    </nav>
                                    <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                    <ul class="nav-cat title-font">
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/01.png') }}" alt="category-product"> <a href="#">western ware</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/02.png') }}" alt="category-product"> <a href="#">TV, Appliances</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/03.png') }}" alt="category-product"> <a href="#">Pets Products</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/04.png') }}" alt="category-product"> <a href="#">Car, Motorbike</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/05.png') }}" alt="category-product"> <a href="#">Industrial Products</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/06.png') }}" alt="category-product"> <a href="#">Beauty, Health Products</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/07.png') }}" alt="category-product"> <a href="#">Grocery Products </a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/08.png') }}" alt="category-product"> <a href="#">Sports</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/09.png') }}" alt="category-product"> <a href="#">Bags, Luggage</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/10.png') }}" alt="category-product"> <a href="#">Movies, Music </a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/11.png') }}" alt="category-product"> <a href="#">Video Games</a></li>
                                        <li> <img src="{{ asset('assets/images/layout-1/nav-img/12.png') }}" alt="category-product"> <a href="#">Toys, Baby Products</a></li>
                                        <li>
                                        <ul class="mor-slide-open" style="display: none;">
                                            <li> <img src="{{ asset('assets/images/layout-1/nav-img/08.png') }}" alt="category-product"> <a>Sports</a></li>
                                            <li> <img src="{{ asset('assets/images/layout-1/nav-img/09.png') }}" alt="category-product"> <a>Bags, Luggage</a></li>
                                            <li> <img src="{{ asset('assets/images/layout-1/nav-img/10.png') }}" alt="category-product"> <a>Movies, Music </a></li>
                                            <li> <img src="{{ asset('assets/images/layout-1/nav-img/11.png') }}" alt="category-product"> <a>Video Games</a></li>
                                            <li> <img src="{{ asset('assets/images/layout-1/nav-img/12.png') }}" alt="category-product"> <a>Toys, Baby Products</a></li>
                                        </ul>
                                        </li>
                                        <li>
                                        <a class="mor-slide-click">more category <i class="fa fa-angle-down pro-down"></i><i class="fa fa-angle-up pro-up" style="display: none;"></i></a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                                <div class="menu-block">
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal" data-smartmenus-id="16353491369166194">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                                    </li>
                                    <!--HOME-->
                                    <li>
                                        <a href="{{ route('frontend') }}" class="dark-menu-item has-submenu" id="sm-16353491369166194-1" aria-haspopup="true" aria-controls="sm-16353491369166194-2" aria-expanded="false">Home</a>
                                    </li>
                                    <!--HOME-END-->

                                    <!--SHOP-->
                                    <li>
                                        <a href="{{ route('frontend.product') }}" class="dark-menu-item has-submenu" id="sm-16353491369166194-3" aria-haspopup="true" aria-controls="sm-16353491369166194-4" aria-expanded="false">
                                            shop
                                            {{-- <span class="sub-arrow"></span> --}}
                                        </a>
                                        {{-- <ul id="sm-16353491369166194-4" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-3" aria-expanded="false">
                                            <li><a href="category-page(left-sidebar).html">left sidebar</a></li>
                                            <li><a href="category-page(right-sidebar).html">right sidebar</a></li>
                                            <li><a href="category-page(no-sidebar).html">no sidebar</a></li>
                                            <li><a href="category-page(sidebar-popup).html">sidebar popup</a></li>
                                            <li><a href="category-page(metro).html">metro </a></li>
                                            <li><a href="category-page(full-width).html">full width </a></li>
                                            <li><a href="category-page(infinite-scroll).html">infinite scroll</a></li>
                                            <li><a href="category-page(3-grid).html">3 grid</a></li>
                                            <li><a href="category-page(6-grid).html">6 grid</a></li>
                                            <li><a href="category-page(list-view).html">list view</a></li>
                                        </ul> --}}
                                    </li>
                                    <!--SHOP-END-->


                                    <!--product-meu start-->
                                    <li class="mega"><a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-5" aria-haspopup="true" aria-controls="sm-16353491369166194-6" aria-expanded="false">product
                                    <span class="sub-arrow"></span></a>
                                        <ul class="mega-menu full-mega-menu " id="sm-16353491369166194-6" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-5" aria-expanded="false">
                                        <li>
                                            <div class="container">
                                            <div class="row">
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>sidebar</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="product-page(left-sidebar).html">left sidebar</a></li>
                                                        <li><a href="product-page(right-sidebar).html">right sidebar</a></li>
                                                        <li><a href="product-page(no-sidebar).html">non sidebar</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>bonus layout</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="product-page(bundle).html">bundle</a></li>
                                                        <li><a href="product-page(image-swatch).html">image swatch</a></li>
                                                        <li><a href="product-page(vertical-tab).html">vertical tab</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>product layout </h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="product-page(4-image).html">4 image </a></li>
                                                        <li><a href="product-page(sticky).html">sticky</a></li>
                                                        <li><a href="product-page(accordian).html">accordian</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>thumbnail image</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="product-page(left-image).html">left image</a></li>
                                                        <li><a href="product-page(right-image).html">right image</a></li>
                                                        <li><a href="product-page(image-outside).html">image outside</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>3 column</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="product-page(3-col-left).html">thumbnail left</a></li>
                                                        <li><a href="product-page(3-col-right).html">thumbnail right</a></li>
                                                        <li><a href="product-page(3-column).html">thubnail bottom</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>product element</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="element-productbox.html">product box</a></li>
                                                        <li><a href="element-product-slider.html">product slider</a></li>
                                                        <li><a href="element-no_slider.html">no slider</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row menu-banner">
                                                <div class="col-lg-6">
                                                <div>
                                                    <img src="{{ asset('assets/images/menu-banner1.jpg') }}" alt="menu-banner" class="img-fluid">
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div>
                                                    <img src="{{ asset('assets/images/menu-banner2.jpg') }}" alt="menu-banner" class="img-fluid">
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        </ul>
                                    </li>
                                    <!--product-meu end-->

                                    <!--mega-meu start-->
                                    <li class="mega">
                                        <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-7" aria-haspopup="true" aria-controls="sm-16353491369166194-8" aria-expanded="false">features<span class="sub-arrow"></span></a>
                                        <ul class="mega-menu full-mega-menu ratio_landscape" id="sm-16353491369166194-8" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-7" aria-expanded="false">
                                        <li>
                                            <div class="container">
                                            <div class="row">
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>portfolio</h5></div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="grid-2-col.html">portfolio grid 2</a></li>
                                                        <li><a href="grid-3-col.html">portfolio grid 3</a></li>
                                                        <li><a href="grid-4-col.html">portfolio grid 4</a></li>
                                                        <li><a href="grid-6-col.html">portfolio grid 6</a></li><li><a href="masonary-2-grid.html">mesonary grid 2</a></li>
                                                        <li><a href="masonary-3-grid.html">mesonary grid 3</a></li>
                                                        <li><a href="masonary-4-grid.html">mesonary grid 4</a></li>
                                                        <li><a href="masonary-fullwidth.html">mesonary full width</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>add to cart</h5></div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="layout-5.html">cart modal popup</a></li>
                                                        <li><a href="layout-6.html">qty. counter </a></li>
                                                        <li><a href="index.html">cart top</a></li>
                                                        <li><a href="layout-2.html">cart bottom</a></li>
                                                        <li><a href="layout-3.html">cart left</a></li>
                                                        <li><a href="layout-4.html">cart right</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>shortcodes</h5></div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="element-title.html">title</a></li>
                                                        <li><a href="element-banner.html">collection banner</a></li>
                                                        <li><a href="element-slider.html">home slider</a></li>
                                                        <li><a href="element-category.html">category</a></li>
                                                        <li><a href="element-service.html">service</a></li>
                                                        <li><a href="element-image-ratio.html">image size ratio</a></li>
                                                        <li><a href="element-tab.html">tab</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box">
                                                <div class="link-section">
                                                    <div class="menu-title">
                                                    <h5>email template</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="email-order-success.html">order success</a></li>
                                                        <li><a href="email-order-success-tow.html">order success 2</a></li>
                                                        <li><a href="email-template.html">email template</a></li>
                                                        <li><a href="email-template-tow.html">email template 2</a></li>
                                                    </ul>
                                                    </div>
                                                    <div class="menu-title menu-secon-title">
                                                    <h5>Easy to use</h5>
                                                    </div>
                                                    <div class="menu-content">
                                                    <ul>
                                                        <li><a href="button.html">element button</a></li>
                                                        <li><a href="instagram.html">element instagram</a></li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col mega-box product ">
                                                <div class="mega-img">
                                                    <img src="../assets/images/mega-banner.jpg" alt="menu-banner" class="img-fluid">
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        </ul>
                                    </li>
                                    <!--mega-meu end-->

                                    <!--pages-meu start-->
                                    <li><a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-9" aria-haspopup="true" aria-controls="sm-16353491369166194-10" aria-expanded="false">pages<span class="sub-arrow"></span></a>
                                        <ul id="sm-16353491369166194-10" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-9" aria-expanded="false">
                                        <li>
                                            <a href="#" class="has-submenu" id="sm-16353491369166194-11" aria-haspopup="true" aria-controls="sm-16353491369166194-12" aria-expanded="false">account<span class="sub-arrow"></span></a>
                                            <ul id="sm-16353491369166194-12" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-11" aria-expanded="false">
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="dashboard.html">Dashboard</a></li>
                                            <li><a href="login.html">login</a></li>
                                            <li><a href="register.html">register</a></li>
                                            <li><a href="contact.html">contact</a></li>
                                            <li><a href="forget-pwd.html">forget password</a></li>
                                            <li><a href="profile.html">profile </a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-page.html">about us</a></li>
                                        <li><a href="search.html">search</a></li>
                                        <li><a href="typography.html">typography </a></li>
                                        <li><a href="review.html">review </a></li>
                                        <li><a href="order-success.html">order success</a></li>
                                        <li><a href="order-history.html">order history</a></li>
                                        <li>
                                            <a href="#" class="has-submenu" id="sm-16353491369166194-13" aria-haspopup="true" aria-controls="sm-16353491369166194-14" aria-expanded="false">compare<span class="sub-arrow"></span></a>
                                            <ul id="sm-16353491369166194-14" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-13" aria-expanded="false">
                                            <li><a href="compare.html">compare</a></li>
                                            <li><a href="compare-2.html">compare-2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="collection.html">collection</a></li>
                                        <li><a href="look-book.html">lookbook</a></li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="coming-soon.html">coming soon </a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                        </ul>
                                    </li>
                                    <!--product-end end-->

                                    <!--blog-meu start-->
                                        <li>
                                            <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">blog<span class="sub-arrow"></span></a>
                                            <ul id="sm-16353491369166194-16" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-15" aria-expanded="false">
                                            <li><a href="blog(left-sidebar).html">left sidebar</a></li>
                                            <li><a href="blog(right-sidebar).html">right sidebar</a></li>
                                            <li><a href="blog(no-sidebar).html">no sidebar</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                            </ul>
                                        </li>
                                        <!--blog-meu end-->
                                        @auth
                                            <li>
                                                <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">Welcome,{{ Auth::user()->name }}<span class="sub-arrow"></span></a>

                                                <ul id="sm-16353491369166194-16" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-15" aria-expanded="false">
                                                    @if (auth()->user()->roles->first()->name == 'Customer')
                                                        <li><a href="{{ route('my-account.index') }}">Profile</a></li>
                                                        <li><a href="{{ route('my-account.orders') }}">My Orders</a></li>
                                                        <li><a href="{{ route('my-account.orders.track') }}">Track Order</a></li>
                                                        <li><a href="#">Security</a></li>
                                                    @else
                                                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>

                                                    @endif
                                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                    </form>
                                                    <li><a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <li class="mobile-user onhover-dropdown" onclick="openAccount()">
                                                <a href="javascript:void(0)">
                                                    <i style="font-size:32px" class="icon-user"></i>
                                                    <span class="d-md-none">Login</span>
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </nav>
                                </div>
                                <div class="icon-block">
                                <ul>

                                    <li class="mobile-wishlist" onclick="openWishlist()">
                                    <a><i class="icon-heart"></i><div class="cart-item"><div>0 item<span>wishlist</span></div></div></a></li>
                                    <li class="mobile-search"><a href="#"><i class="icon-search"></i></a>
                                    <div class="search-overlay" style="display: none;">
                                        <div>
                                        <span class="close-mobile-search">×</span>
                                        <div class="overlay-content">
                                            <div class="container">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                <form>
                                                    <div class="form-group"><input type="text" class="form-control" id="exampleInputPassword1" placeholder="Search a Product"></div>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li class="mobile-setting mobile-setting-hover" onclick="openSetting()"><a href="#"><i class="icon-settings"></i></a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            <div class="category-right">
                                <div class="contact-block">
                                    <div>
                                        <i class="fa fa-volume-control-phone"></i>
                                        <span>call us<span>123-456-76890</span></span>
                                    </div>
                                </div>
                                {{-- <div class="btn-group">
                                    <div class="gift-block" data-toggle="dropdown">
                                        <div class="grif-icon">
                                            <i class="icon-gift"></i>
                                        </div>
                                        <div class="gift-offer">
                                            <p>gift box</p>
                                            <span>Festivel Offer</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu gift-dropdown">
                                        <div class="media">
                                            <div class="mr-3">
                                                <img src="../assets/images/icon/1.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0">Billion Days</h5>
                                                <p><img src="../assets/images/icon/currency.png" class="cash" alt="curancy"> Flat Rs. 270 Rewards</p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <img src="../assets/images/icon/2.png" alt="Generic placeholder image" class="gift-bloc">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0">Fashion Discount</h5>
                                                <p><img src="../assets/images/icon/fire.png" class="fire" alt="fire">Extra 10% off (upto Rs. 10,000*) </p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <img src="../assets/images/icon/3.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0">75% off Store</h5>
                                                <p>No coupon code is required.</p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <img src="../assets/images/icon/6.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0">Upto 50% off</h5>
                                                <p>Buy popular phones under Rs.20.</p>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="mr-3">
                                                <img src="../assets/images/icon/5.png" alt="Generic placeholder image">
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mt-0">Beauty store</h5>
                                                <p><img src="../assets/images/icon/currency.png" class="cash" alt="curancy"> Flat Rs. 270 Rewards</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <section class="contact-banner contact-banner-inverse">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="contact-banner-contain">
                        <div class="contact-banner-img"><img src="../assets/images/layout-1/call-img.png" class="  img-fluid" alt="call-banner"></div>
                            <div> <h3>if you have any question please call us</h3></div>
                        <div><h2>123-456-7890</h2></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-2">
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="footer-main-contian">
                        <div class="row ">
                            <div class="col-lg-4 col-md-12 ">
                                <div class="footer-left">
                                    <div class="footer-logo">
                                        <img src="../assets/images/layout-2/logo/logo.png" class="img-fluid  " alt="logo">
                                    </div>
                                    <div class="footer-detail">
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                                        <ul class="paymant-bottom">
                                            <li><a href="#"><img src="../assets/images/layout-1/pay/1.png" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="#"><img src="../assets/images/layout-1/pay/2.png" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="#"><img src="../assets/images/layout-1/pay/3.png" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="#"><img src="../assets/images/layout-1/pay/4.png" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="#"><img src="../assets/images/layout-1/pay/5.png" class="img-fluid" alt="pay"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 ">
                                <div class="footer-right">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="subscribe-section">
                                                <div class="row">
                                                    <div class="col-md-5 ">
                                                        <div class="subscribe-block">
                                                            <div class="subscrib-contant ">
                                                                <h4>subscribe to newsletter</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 ">
                                                        <div class="subscribe-block">
                                                            <div class="subscrib-contant">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="your email">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text telly"><i class="fa fa-telegram"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="account-right">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="footer-box">
                                                            <div class="footer-title">
                                                                <h5>my account</h5>
                                                            </div>
                                                            <div class="footer-contant">
                                                                <ul>
                                                                    <li><a href="#">about us</a></li>
                                                                    <li><a href="#">contact us</a></li>
                                                                    <li><a href="#">terms &amp; conditions</a></li>
                                                                    <li><a href="#">returns &amp; exchanges</a></li>
                                                                    <li><a href="#">shipping &amp; delivery</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="footer-box">
                                                            <div class="footer-title">
                                                                <h5>quick link</h5>
                                                            </div>
                                                            <div class="footer-contant">
                                                                <ul>
                                                                    <li><a href="#">store location</a></li>
                                                                    <li><a href="#"> my account</a></li>
                                                                    <li><a href="#"> orders tracking</a></li>
                                                                    <li><a href="#"> size guide</a></li>
                                                                    <li><a href="#">FAQ </a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="footer-box footer-contact-box">
                                                            <div class="footer-title">
                                                                <h5>contact us</h5>
                                                            </div>
                                                            <div class="footer-contant">
                                                                <ul class="contact-list">
                                                                    <li><i class="fa fa-map-marker"></i><span>big deal store demo store <br> <span> india-3654123</span></span></li>
                                                                    <li><i class="fa fa-phone"></i><span>call us: 123-456-7898</span></li>
                                                                    <li><i class="fa fa-envelope-o"></i><span>email us: support@bigdeal.com</span></li>
                                                                    <li><i class="fa fa-fax"></i><span>fax 123456</span></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-link-block  bg-transparent">
            <div class="container">
                <div class="row">
                    <div class="app-link-bloc-contain app-link-bloc-contain-1">
                        <div class="app-item-group">
                            <div class="app-item">
                                <img src="../assets/images/layout-1/app/1.png" class="img-fluid" alt="app-banner">
                            </div>
                            <div class="app-item">
                                <img src="../assets/images/layout-1/app/2.png" class="img-fluid" alt="app-banner">
                            </div>
                        </div>
                        <div class="app-item-group ">
                            <div class="sosiyal-block">
                                <h6>follow us</h6>
                                <ul class="sosiyal">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="sub-footer-contain">
                            <p><span>2017-{{ date('y') }} </span>copyright by Beshkichu Sourcing Company</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- My account bar start-->
        <div id="myAccount" class="add_to_cart right account-bar">
            <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
            <div class="cart-inner">
            <div class="cart_top">
                <h3>my account</h3>
                <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
                </div>
            </div>
            <form class="theme-form" action="{{ route('login') }}"  method="POST">
                @csrf
                <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="{{ old('email') }}"  class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="review">Password</label>
                <input type="password" name="password" class="form-control" id="review" placeholder="Enter your password">
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-rounded btn-block ">Login</button>
                </div>
                <div>
                <h5 class="forget-class"><a href="{{ route('password.request') }}" class="d-block">forget password?</a></h5>
                <h6 class="forget-class"><a href="{{ route('register') }}" class="d-block">new to store? Signup now</a></h6>
                </div>
            </form>
            </div>
        </div>
    </footer>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- slick js-->
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <!-- popper js-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <!-- menu js-->
    <script src="{{ asset('assets/js/menu.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    <script src="{{ asset('assets/js/modal.js') }}"></script>
    @yield('footer_js')
</body>

<!-- Mirrored from template.hasthemes.com/jesco/jesco/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Sep 2021 07:19:34 GMT -->
</html>

