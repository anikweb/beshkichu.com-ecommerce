<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="robots" content="index, follow" />
    <meta property="og:url" content="http://www.beshkichu.com" />
    <meta property="og:type" content="ecommerce, wholesale business, Dropshipping Business, Shoes" />
    <meta property="og:title" content="{{ basicSettings()->site_title }}" />
    <meta property="og:description" content="{{ basicSettings()->tagline }}" />
    <meta property="og:image" content="{{ asset('assets/images/logo/'.basicSettings()->logo) }}" />

    <title> @if(Route::is('frontend')) Home @elseif(Route::is('frontend.product')) Products @elseif(Route::is('frontend.category.product')) {{$category->name}} - Products @elseif(Route::is('frontend.product.single')) {{ $product->name }} @elseif(Route::is('frontend.wishlist.index')) Wishlist @elseif(Route::is('cart.index')) Carts  @elseif(Route::is('checkout.index')) Checkout @elseif(Route::is('checkout.success')) Success @elseif(Route::is('my-account.index')) Profile @elseif(Route::is('my-account.personal.information.edit')) Update Profile @elseif(Route::is('my-account.orders')) Orders @elseif(Route::is('my-account.delivered.order')) Delevered Orders @elseif(Route::is('my-account.orders.track')) Track Orders @elseif(Route::is('login')) Login @elseif(Route::is('register')) Register @elseif(Route::is('password.request')) Forgot Password @elseif(Route::is('password.reset')) Reset Password  @endif | {{ basicSettings()->site_title }}</title>
    <meta name="description" content="{{ basicSettings()->tagline }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ basicSettings()->key_words }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color2.css') }}" media="screen" id="color">
    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/'.basicSettings()->icon) }}" type="image/x-icon">
    @yield('inline_style')
    <!-- Main Style -->
    <!-- <link rel="stylesheet" href="assets/css/style.css" /> -->

</head>

<body>
    <header>
        <div class="mobile-fix-option"></div>
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
                                @foreach (category() as $category)
                                    <li><a href="{{ route('frontend.category.product',$category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                                </li>
                                {{-- <li>
                                <a class="mor-slide-click">
                                    more category
                                    <i class="fa fa-angle-down pro-down"></i>
                                    <i class="fa fa-angle-up pro-up" style="display: none;"></i>
                                </a>
                                </li> --}}
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
                                <span class="cart-product">{{ cartsItem()->count() }}</span>
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
                                        <span class="navbar-icon text-dark"><i class="fa fa-arrow-down "></i></span>
                                    </button>
                                    <h5 class="mb-0  title-font">Shop by category</h5>
                                    </nav>
                                    <div class="collapse  nav-desk" id="navbarToggleExternalContent">
                                    <ul class="nav-cat title-font">
                                        @foreach (category() as $category)
                                            <li> <img src="{{ asset('assets/images/layout-2/collection-banner/'.$category->image) }}" alt="{{$category->name}}"> <a href="{{ route('frontend.category.product',$category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
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
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">Services<span class="sub-arrow"></span></a>
                                        <ul id="sm-16353491369166194-16" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-15" aria-expanded="false">
                                            <li><a href="javascript:void(0)">Sourching</a></li>
                                        </ul>
                                    </li>

                                    <!--SHOP-END-->
                                    <!--blog-meu start-->
                                        <li>
                                            <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">blog</a>
                                        </li>

                                        @guest
                                            <li>
                                                <a href="{{ route('my-account.orders.track') }}" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">track order</a>
                                            </li>
                                        @else
                                            @if (auth()->user()->roles->first()->name == 'Customer')
                                                <li>
                                                    <a href="{{ route('my-account.orders.track') }}" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">track order</a>
                                                </li>
                                            @endif
                                        @endguest
                                        <li>
                                            <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-3" aria-haspopup="true" aria-controls="sm-16353491369166194-4" aria-expanded="false">
                                                About us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-3" aria-haspopup="true" aria-controls="sm-16353491369166194-4" aria-expanded="false">
                                                Contact
                                            </a>
                                        </li>
                                        @auth
                                            <li>
                                                <a href="#" class="dark-menu-item has-submenu" id="sm-16353491369166194-15" aria-haspopup="true" aria-controls="sm-16353491369166194-16" aria-expanded="false">Welcome,{{ Auth::user()->name }}<span class="sub-arrow"></span></a>

                                                <ul id="sm-16353491369166194-16" role="group" aria-hidden="true" aria-labelledby="sm-16353491369166194-15" aria-expanded="false">
                                                    @if (auth()->user()->roles->first()->name == 'Customer')
                                                        <li><a href="{{ route('my-account.index') }}">My Account</a></li>
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
                                    <a><i class="icon-heart"></i><div class="cart-item"><div>{{ wishlistItem()->count() }} item<span>wishlist</span></div></div></a></li>
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
                                        <img src="{{ asset('assets/images/logo/'.basicSettings()->logo) }}" class="img-fluid  " alt="{{ basicSettings()->site_title }}">
                                    </div>
                                    <div class="footer-detail">
                                        <p>{{ basicSettings()->tagline }}</p>
                                        <ul class="paymant-bottom">
                                            <li><a href="javascript:void(0)"><img src="{{ asset('assets/images/layout-1/pay/1.png') }}" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="javascript:void(0)"><img src="{{ asset('assets/images/layout-1/pay/2.png') }}" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="javascript:void(0)"><img src="{{ asset('assets/images/layout-1/pay/3.png') }}" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="javascript:void(0)"><img src="{{ asset('assets/images/layout-1/pay/4.png') }}" class="img-fluid" alt="pay"></a></li>
                                            <li><a href="javascript:void(0)"><img src="{{ asset('assets/images/layout-1/pay/5.png') }}" class="img-fluid" alt="pay"></a></li>
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
                <input type="text" name="email" value="{{ old('email') }}"  class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">\
                @error('email')
                    <div class="text-danger">
                        <i class="fa fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                <label for="review">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="review" placeholder="Enter your password">
                @error('password')
                    <div class="text-danger">
                        <i class="fa fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                <button type="submit" class="btn btn-rounded btn-block ">Login</button>
                </div>
                <div>
                <h5 class="forget-class"><a href="{{ route('password.request') }}" class="d-block">forget password?</a></h5>
                <h6 class="forget-class"><a href="{{ route('register') }}" class="d-block">haven't any account? Signup now</a></h6>
                </div>
            </form>
            </div>
        </div>
    </footer>
    <!-- tap to top -->
<div class="tap-top">
    <div>
      <i class="fa fa-angle-double-up"></i>
    </div>
  </div>
  <!-- tap to top End -->

  <!-- Add to cart bar -->
  <div id="cart_side" class=" add_to_cart top">
    <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my cart</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeCart()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        <ul class="cart_product">
            @php
                $total = 0;
            @endphp
            @forelse (cartsItem() as $cart)
                <li>
                    <div class="media">
                        <a href="javascript:void(0)"><img alt="{{ $cart->product->name }}" class="mr-3" src="{{ asset('assets/images/product/'.$cart->product->created_at->format('Y/m/d').'/'.$cart->product->id.'/thumbnail/'.$cart->product->thumbnail) }}"></a>
                        <div class="media-body">
                            <a href="#">
                            <h4>{{ $cart->product->name }}</h4>
                            </a>
                            <h4><span>{{ $cart->quantity }} x ৳{{ $total = $total + $cart->product->attribute->where('color_id',$cart->color_id)->where('size_id',$cart->size_id)->first()->offer_price }}</span></h4>
                        </div>
                    </div>
                    {{--  <div class="close-circle">
                        <a href="#">
                            <i class="ti-trash" aria-hidden="true"></i>
                        </a>
                    </div>  --}}
                </li>
            @empty
            <h5 class="text-center py-2"><i class="fa fa-exclamation-circle"></i> Empty</h5>
            @endforelse
        </ul>
        <ul class="cart_total">
          <li>
            <div class="total">
              <h5>subtotal : <span>৳{{ $total }}</span></h5>
            </div>
          </li>
          <li>
            <div class="buttons">
              <a href="{{ route('cart.index') }}" class="btn btn-normal btn-xs view-cart">view cart</a>
              {{-- <a href="#" class="btn btn-normal btn-xs checkout">checkout</a> --}}
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Add to cart bar end-->



  <!-- Quick-view modal popup start-->
  <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content quick-view-modal">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <div class="row">
            <div class="col-lg-6 col-xs-12">
              <div class="quick-view-img"><img src="../assets/images/layout-2/product/a1.jpg" alt="" class="img-fluid "></div>
            </div>
            <div class="col-lg-6 rtl-text">
              <div class="product-right">
                <h2>Women Pink Shirt</h2>
                <h3>$32.96</h3>
                <ul class="color-variant">
                  <li class="bg-light0"></li>
                  <li class="bg-light1"></li>
                  <li class="bg-light2"></li>
                </ul>
                <div class="border-product">
                  <h6 class="product-title">product details</h6>
                  <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                </div>
                <div class="product-description border-product">
                  <div class="size-box">
                    <ul>
                      <li class="active"><a href="#">s</a></li>
                      <li><a href="#">m</a></li>
                      <li><a href="#">l</a></li>
                      <li><a href="#">xl</a></li>
                    </ul>
                  </div>
                  <h6 class="product-title">quantity</h6>
                  <div class="qty-box">
                    <div class="input-group"><span class="input-group-prepend"><button type="button" class="btn quantity-left-minus" data-type="minus" data-field=""><i class="ti-angle-left"></i></button> </span>
                      <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button></span></div>
                  </div>
                </div>
                <div class="product-buttons"><a href="#" class="btn btn-normal">add to cart</a> <a href="#" class="btn btn-normal">view detail</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Quick-view modal popup end-->





  <!-- Add to account bar end-->

  <!-- Add to wishlist bar -->
  <div id="wishlist_side" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my wishlist</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeWishlist()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="cart_media">
        <ul class="cart_product">
            @php
                $total =0
            @endphp
            @forelse (wishlistItem() as $wishlist)
          <li>
            <div class="media">
              <a href="#"><img alt="{{ $wishlist->product->name }}" class="mr-3" src="{{ asset('assets/images/product/'.$wishlist->product->created_at->format('Y/m/d').'/'.$wishlist->product->id.'/thumbnail/'.$wishlist->product->thumbnail) }}"></a>
              <div class="media-body">
                <a href="#"><h4>item name</h4></a>
                <h4><span>৳{{ $total = $total + $wishlist->product->attribute->min('offer_price') }}</span></h4>
              </div>
            </div>
            {{--  <div class="close-circle">
              <a href="#">
                <i class="ti-trash" aria-hidden="true"></i>
              </a>
            </div>  --}}
          </li>
          @empty
            <h5 class="text-center py-2"><i class="fa fa-exclamation-circle"></i> Empty</h5>
          @endforelse
        </ul>
        <ul class="cart_total">
          <li>
            <div class="total">
              <h5>subtotal : <span>৳{{  $total }}</span></h5>
            </div>
          </li>
          <li>
            <div class="buttons">
              <a href="{{ route('frontend.wishlist.index') }}" class="btn btn-normal btn-block  view-cart">view wislist</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Add to wishlist bar end-->

  <!-- add to  setting bar  start-->
  {{--  <div id="mySetting" class="add_to_cart right">
    <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
    <div class="cart-inner">
      <div class="cart_top">
        <h3>my setting</h3>
        <div class="close-cart">
          <a href="javascript:void(0)" onclick="closeSetting()">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="setting-block">
        <div >
          <h5>language</h5>
          <ul>
            <li><a href="#">english</a></li>
            <li><a href="#">french</a></li>
          </ul>
          <h5>currency</h5>
          <ul>
            <li><a href="#">uro</a></li>
            <li><a href="#">rupees</a></li>
            <li><a href="#">pound</a></li>
            <li><a href="#">doller</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>  --}}
  <!-- facebook chat section end -->

    <!-- notification product -->
    {{--  <div class="product-notification" id="dismiss">
        <span  onclick="dismiss();" class="close" aria-hidden="true">×</span>
        <div class="media">
        <img class="mr-2" src="../assets/images/layout-1/product/5.jpg" alt="Generic placeholder image">
        <div class="media-body">
            <h5 class="mt-0 mb-1">Latest trending</h5>
            Cras sit amet nibh libero, in gravida nulla.
        </div>
        </div>
    </div>  --}}
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

