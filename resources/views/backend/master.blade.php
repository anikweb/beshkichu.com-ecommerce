        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta property="og:url" content="http://www.beshkichu.com"/>
            <meta property="og:type" content="ecommerce, wholesale business, Dropshipping Business, Shoes" />
            <meta property="og:title" content="{{ basicSettings()->site_title }}" />
            <meta property="og:description" content="{{ basicSettings()->tagline }}" />
            <meta property="og:image" content="{{ asset('assets/images/logo/'.basicSettings()->logo) }}" />
            <title>@if (Route::is('role.create')) Create Role @elseif(Route::is('role.edit')) Edit Role @elseif(Route::is('role.index')) Roles @elseif(Route::is('role.show')) Role Details   @elseif(Route::is('assign.user')) Assign User Role @elseif(Route::is('about.index')) About @elseif(Route::is('create.user')) Create User @elseif(Route::is('category.create')) Create Category @elseif(Route::is('category.edit')) Edit Category @elseif(Route::is('category.index')) Categories @elseif(Route::is('subcategory.create')) Create Subcategory @elseif(Route::is('subcategory.edit')) Edit Subcategory @elseif(Route::is('subcategory.index')) Subcategories @elseif(Route::is('product.index')) Products @elseif(Route::is('product.edit')) Edit Product @elseif(Route::is('product.create')) Add Product @elseif(Route::is('product.show')) {{ $product->name }} @elseif(Route::is('products.image.gallery')) Image Gallery-{{ $product->name }} @elseif(Route::is('voucher.create')) Create Voucher @elseif(Route::is('voucher.deactivate.list')) Deactivated Vouchers @elseif(Route::is('voucher.edit')) Edit Voucher @elseif(Route::is('voucher.index')) Active Vouchers @elseif(Route::is('dashboard.orders.index')) Picup In Progress - Orders @elseif(Route::is('dashboard.orders.shipped')) Shipped - Orders @elseif(Route::is('dashboard.orders.outForDelivered')) Out for Delivery - Orders @elseif(Route::is('dashboard.orders.delivered')) Delivered - Orders @elseif(Route::is('dashboard.orders.details')) {{ $order->invoice_no }} - Orders @elseif(Route::is('dashboard.orders.canceled')) Canceled - Orders  @elseif(Route::is('dashboard.wishlist')) Active Wishlists @elseif(Route::is('basic-settings.index')) Basic Settings @elseif(Route::is('slider.create')) Create Slider @elseif(Route::is('slider.index')) Sliders @elseif(Route::is('slider.edit')) Edit Slider @elseif(Route::is('contact.information')) Contact Information @elseif(Route::is('backend.user')) Profile  @elseif(Route::is('backend.user.edit')) Edit Profile @elseif(Route::is('backend.change.password')) Change Password  @elseif(Route::is('products.attribute.index')) Attributes @elseif(Route::is('products.attribute.edit')) Edit Attributes @elseif(Route::is('faq.create')) Create FAQ @elseif(Route::is('faq.edit')) Edit FAQ @elseif(Route::is('faq.index')) FAQs @elseif(Route::is('faq.trash.index'))  FAQs Trash @elseif(Route::is('blog.index'))  Blogs @elseif(Route::is('blog.edit'))  Edit Blog @elseif(Route::is('blog.create'))  Create Blog @elseif(Route::is('contact.information.google.map')) Live Google Map @elseif(Route::is('backend.requested.product.index')) Requested Products @elseif(Route::is('backend.requested.product.show')) Requested Products Details @elseif(Route::is('privacy-policy.index')) Privacy Policy @elseif(Route::is('privacy-policy.edit')) Edit - Privacy Policy @elseif(Route::is('return-policy.index')) Return Policy @elseif(Route::is('return-policy.edit')) Edit - Return Policy @elseif(Route::is('terms-and-conditions.index')) Terms & Conditions @elseif(Route::is('terms-and-conditions.edit')) Edit - Terms & Conditions @elseif(Route::is('shipping-and-delivery.index')) Shipping & Delivery @elseif(Route::is('shipping-and-delivery.edit')) Edit - Shipping & Delivery @elseif(Route::is('report.index')) Report @elseif(Route::is('report.search')) Search Report @endif @if(Route::is('dashboard')) {{basicSettings()->site_title}} | Dashboard @else | Dashboard @endif </title>
            <!-- Google Font: Source Sans Pro -->
            <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
            <!-- Tempusdominus Bootstrap 4 -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
            <!-- Theme style -->
            <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
            <!-- overlayScrollbars -->
            <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
            {{-- Toastr Nottification --}}
            <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">
            {{--  Select2   --}}
            <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        {{--  Favicon  --}}
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon/'.basicSettings()->icon) }}" type="image/png">
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
        @yield('internal_style')
        </head>
        <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/images/favicon/'.basicSettings()->icon) }}" alt="{{ basicSettings()->site_title }}" height="100" width="100">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                    </div>
                </form>
                </div>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
                </a>
            </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a target="_blank" href="{{  route('frontend') }}" class="brand-link">
            <img src="{{ asset('assets/images/favicon/'.basicSettings()->icon) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{  basicSettings()->site_title }}</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if (isset(personalInfo()->gender))
                        @if (personalInfo()->gender == 'female')
                            <img src="{{ asset('backend/dist/img/user-female.jpg') }}" class="img-circle elevation-2" alt="User Image">
                            @else
                            <img src="{{ asset('backend/dist/img/user-male.jpg') }}" class="img-circle elevation-2" alt="User Image">

                        @endif
                    @else
                    <img src="{{ asset('backend/dist/img/user-male.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                </div>
                <div class="info">
                <a href="{{ route('backend.user') }}" class="d-block">{{ Auth::user()->name }} </a>
                <span class="text-white">({{ Auth::user()->roles->first()->name }})</span>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link @if (Route::is('dashboard')) active @endif ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
                    </li>
                    {{-- Category --}}
                    @can("category view")
                        <li class="nav-item @if (Route::is('category.create')||Route::is('category.edit')||Route::is('category.index')) menu-open @endif">
                            <a href="#" class="nav-link @if (Route::is('category.create')||Route::is('category.edit')||Route::is('category.index')) active @endif">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                            Category
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can("category add")
                                    <li class="nav-item">
                                        <a href="{{ route('category.create') }}" class="nav-link @if (Route::is('category.create')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                @endcan
                                @can("category view")
                                    <li class="nav-item">
                                        <a href="{{ route('category.index') }}" class="nav-link @if (Route::is('category.index')||Route::is('category.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View List</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{-- Subcategory  --}}
                    @can('subcategory view')
                        <li class="nav-item @if (Route::is('subcategory.create')||Route::is('subcategory.edit')||Route::is('subcategory.index')) menu-open @endif">
                            <a href="#" class="nav-link @if (Route::is('subcategory.create')||Route::is('subcategory.edit')||Route::is('subcategory.index')) active @endif">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                            Subcategory
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can("subcategory add")
                                    <li class="nav-item">
                                        <a href="{{ route('subcategory.create') }}" class="nav-link @if (Route::is('subcategory.create')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                @endcan
                                @can("subcategory view")
                                    <li class="nav-item">
                                        <a href="{{ route('subcategory.index') }}" class="nav-link  @if (Route::is('subcategory.index')||Route::is('subcategory.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View List</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{-- Products --}}
                    @can('product view')
                        <li class="nav-item @if (Route::is('product.index')||Route::is('product.create')||Route::is('product.show')||Route::is('product.edit')||Route::is('products.image.gallery')||Route::is('products.attribute.index')||Route::is('products.attribute.edit')) menu-open @endif">
                            <a href="#" class="nav-link @if (Route::is('product.index')||Route::is('product.create')||Route::is('product.show')||Route::is('product.edit')||Route::is('products.image.gallery')||Route::is('products.attribute.index')||Route::is('products.attribute.edit')) active @endif">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can("product add")
                                    <li class="nav-item">
                                        <a href="{{ route('product.create') }}" class="nav-link @if (Route::is('product.create'))active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Add</p>
                                        </a>
                                    </li>
                                @endcan
                                @can("product view")
                                    <li class="nav-item">
                                        <a href="{{ route('product.index') }}" class="nav-link @if (Route::is('product.index')||Route::is('product.edit')||Route::is('product.show')||Route::is('products.image.gallery')||Route::is('products.attribute.index')||Route::is('products.attribute.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View List</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{-- Blog --}}
                    @can('blog management')
                        <li class="nav-item @if(Route::is('blog.create')||Route::is('blog.edit')||Route::is('blog.index')||Route::is('blog.show')) menu-open @endif">
                            <a href="#" class="nav-link @if(Route::is('blog.create')||Route::is('blog.edit')||Route::is('blog.index')||Route::is('blog.show')) active @endif">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Blog
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('blog.create') }}" class="nav-link @if (Route::is('blog.create')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('blog.index') }}" class="nav-link @if (Route::is('blog.index')||Route::is('blog.edit')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View List</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    {{--  Vouchers   --}}
                    @if (auth()->user()->can('voucher actives view')||auth()->user()->can('voucher deactivates view'))
                        <li class="nav-item @if (Route::is('voucher.create')||Route::is('voucher.deactivate.list')||Route::is('voucher.edit')||Route::is('voucher.index')||Route::is('voucher.trash.index')) menu-open @endif">
                            <a href="javascript:void(0)" class="nav-link @if (Route::is('voucher.create')||Route::is('voucher.deactivate.list')||Route::is('voucher.edit')||Route::is('voucher.index')||Route::is('voucher.trash.index')) active @endif">
                            <i class="nav-icon fa fa-tags"></i>
                            <p>
                                Vouchers
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can("voucher add")
                                    <li class="nav-item">
                                        <a href="{{ route('voucher.create') }}" class="nav-link @if (Route::is('voucher.create')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                @endcan
                                @can("voucher actives view")
                                    <li class="nav-item">
                                        <a href="{{ route('voucher.index') }}" class="nav-link @if (Route::is('voucher.index')||Route::is('voucher.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Active Vouchers</p>
                                        </a>
                                    </li>
                                @endcan
                                @can("voucher deactivates view")
                                    <li class="nav-item">
                                        <a href="{{ route('voucher.deactivate.list') }}" class="nav-link @if (Route::is('voucher.deactivate.list')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Deactivated Vouchers</p>
                                        </a>
                                    </li>
                                @endcan
                                @can("voucher trash view")
                                    <li class="nav-item">
                                        <a href="{{ route('voucher.trash.index') }}" class="nav-link @if (Route::is('voucher.trash.index')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Trash</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                    {{--  Wishlist   --}}
                    @can('wishlist view')
                        <li class="nav-item">
                            <a href="{{ route('dashboard.wishlist') }}" class="nav-link @if(Route::is('dashboard.wishlist')) active @endif">
                            <i class="nav-icon fa fa-heart"></i>
                            <p>
                            Active Wishlists
                            </p>
                            </a>
                        </li>
                    @endcan
                    {{--  Order   --}}
                    @can('order management')
                        <li class="nav-item @if(Route::is('dashboard.orders.index')||Route::is('dashboard.orders.shipped')||Route::is('dashboard.orders.outForDelivered')||Route::is('dashboard.orders.delivered')||Route::is('dashboard.orders.details')||Route::is('dashboard.orders.canceled')) menu-open @endif">
                            <a href="#" class="nav-link @if(Route::is('dashboard.orders.index')||Route::is('dashboard.orders.shipped')||Route::is('dashboard.orders.outForDelivered')||Route::is('dashboard.orders.delivered')||Route::is('dashboard.orders.details')||Route::is('dashboard.orders.canceled')) active @endif">
                            <i class="nav-icon fas fa-dolly"></i>
                            <p>
                                Orders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.orders.index') }}" class="nav-link @if(Route::is('dashboard.orders.index')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Picup in Progress</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.orders.shipped') }}" class="nav-link @if(Route::is('dashboard.orders.shipped')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Shipped</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.orders.outForDelivered') }}" class="nav-link @if(Route::is('dashboard.orders.outForDelivered')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Out for Delivery</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.orders.delivered') }}" class="nav-link @if(Route::is('dashboard.orders.delivered')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Delivered</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.orders.canceled') }}" class="nav-link @if(Route::is('dashboard.orders.canceled')) active @endif">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Canceled</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    @can('order management')
                        <li class="nav-item">
                            <a href="{{ route('backend.requested.product.index') }}" class="nav-link @if(Route::is('backend.requested.product.index')||Route::is('backend.requested.product.show')) active @endif">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Product Request
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                    @endcan

                    {{--  Reports   --}}
                    {{-- @can('slider view') --}}
                        <li class="nav-item">
                            <a href="{{ route('report.index') }}" class="nav-link @if(Route::is('report.search')||Route::is('report.index')) active @endif ">
                                <i class="nav-icon fa fa-database"></i>
                                <p>
                                    Reports
                                    {{-- <i class="fas fa-angle-left right"></i> --}}
                                </p>
                            </a>
                        </li>
                    {{-- @endcan --}}
                    {{--  Sliders   --}}
                    @can('slider view')
                        <li class="nav-item @if(Route::is('slider.create')||Route::is('slider.edit')||Route::is('slider.index')) menu-open @endif">
                            <a href="#" class="nav-link @if(Route::is('slider.create')||Route::is('slider.edit')||Route::is('slider.index')) active @endif">
                            <i class="nav-icon fa fa-sliders-h"></i>
                            <p>
                                Sliders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('slider add')
                                    <li class="nav-item">
                                        <a href="{{ route('slider.create') }}" class="nav-link @if(Route::is('slider.create')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('slider view')
                                    <li class="nav-item">
                                        <a href="{{ route('slider.index') }}" class="nav-link @if(Route::is('slider.index')||Route::is('slider.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View List</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{--  FAQ   --}}
                    @can('faq view')
                        <li class="nav-item @if (Route::is('faq.create')||Route::is('faq.edit')||Route::is('faq.index')||Route::is('faq.trash.index')) menu-open @endif">
                            <a href="javascript:void(0)" class="nav-link @if (Route::is('faq.create')||Route::is('faq.edit')||Route::is('faq.index')||Route::is('faq.trash.index')) active @endif">
                                <i class="nav-icon fas fa-swatchbook"></i>
                            <p>
                                FAQ
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('faq view')
                                    <li class="nav-item">
                                        <a href="{{ route('faq.index') }}" class="nav-link @if(Route::is('faq.index')||Route::is('faq.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View List</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('faq add')
                                    <li class="nav-item">
                                        <a href="{{ route('faq.create') }}" class="nav-link @if(Route::is('faq.create')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('faq trash view')
                                    <li class="nav-item">
                                        <a href="{{ route('faq.trash.index') }}" class="nav-link @if(Route::is('faq.trash.index')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Trash</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    {{--  About   --}}
                    @can('about edit')
                        <li class="nav-item @if(Route::is('about.index')) menu-open @endif">
                            <a href="javascript:void(0)" class="nav-link @if(Route::is('about.index')) active @endif">
                                <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                About
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('about.index') }}" class="nav-link @if(Route::is('about.index')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    {{-- Role management --}}
                    @can('role management')
                        <li class="nav-item @if(Route::is('role.create')||Route::is('role.edit')||Route::is('role.index')||Route::is('role.show')||Route::is('assign.user')||Route::is('create.user')) menu-open @endif">
                            <a href="#" class="nav-link @if(Route::is('role.create')||Route::is('role.edit')||Route::is('role.index')||Route::is('role.show')||Route::is('assign.user')||Route::is('create.user')) active @endif">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Role Managements
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('role.create') }}" class="nav-link @if(Route::is('role.create')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Role</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link @if(Route::is('role.index')||Route::is('role.show')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('assign.user') }}" class="nav-link @if(Route::is('assign.user')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assign User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('create.user') }}" class="nav-link @if(Route::is('create.user')) active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endcan
                    {{-- Site Settings  --}}
                    @if (auth()->user()->can('site settings edit')||auth()->user()->can('contact information edit'))
                        <li class="nav-item @if(Route::is('contact.information.google.map')||Route::is('basic-settings.index')||Route::is('contact.information')||Route::is('privacy-policy.index')||Route::is('privacy-policy.edit')||Route::is('return-policy.index')||Route::is('return-policy.edit')||Route::is('terms-and-conditions.index')||Route::is('terms-and-conditions.edit')||Route::is('shipping-and-delivery.index')||Route::is('shipping-and-delivery.edit')) menu-open @endif">
                            <a href="#" class="nav-link @if(Route::is('contact.information.google.map')||Route::is('basic-settings.index')||Route::is('contact.information')||Route::is('privacy-policy.index')||Route::is('privacy-policy.edit')||Route::is('return-policy.index')||Route::is('return-policy.edit')||Route::is('terms-and-conditions.index')||Route::is('terms-and-conditions.edit')||Route::is('shipping-and-delivery.index')||Route::is('shipping-and-delivery.edit')) active @endif">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>
                                Settings
                                <i class="fas fa-angle-left right"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('site settings edit')
                                    <li class="nav-item">
                                        <a href="{{ route('basic-settings.index') }}" class="nav-link @if(Route::is('basic-settings.index')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Basic Settings</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('contact information edit')
                                    <li class="nav-item">
                                        <a href="{{ route('contact.information') }}" class="nav-link @if(Route::is('contact.information')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Contact Information</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('contact.information.google.map') }}" class="nav-link @if (Route::is('contact.information.google.map')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Google Map</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('site settings edit')
                                    <li class="nav-item">
                                        <a href="{{ route('privacy-policy.index') }}" class="nav-link  @if(Route::is('privacy-policy.index')||Route::is('privacy-policy.edit'))active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Privacy Policy</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('site settings edit')
                                    <li class="nav-item">
                                        <a href="{{ route('return-policy.index') }}" class="nav-link @if(Route::is('return-policy.index')||Route::is('return-policy.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Return Policy</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('site settings edit')
                                    <li class="nav-item">
                                        <a href="{{ route('terms-and-conditions.index') }}" class="nav-link @if(Route::is('terms-and-conditions.index')||Route::is('terms-and-conditions.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Terms & Conditions</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('site settings edit')
                                    <li class="nav-item">
                                        <a href="{{route('shipping-and-delivery.index')}}" class="nav-link @if(Route::is('shipping-and-delivery.index')||Route::is('shipping-and-delivery.edit')) active @endif">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Shipping & Delivery</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif
                {{-- Logout  --}}
                    <li class="nav-item">
                        <form id="logout_form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2017-{{ date('y') }} Beshkichu Sourching Company.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            {{--  <b>Version</b> 3.1.0  --}}
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('backend/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>pt>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
        {{-- Toastr Nottification --}}
        <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
        {{-- Sweet Aleart  --}}
        {{-- <script src="{{ asset('backend/dist/js/sweetalert.min.js') }}"></script> --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{--  select2  --}}
        <script src="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/chart.js"></script>
        @yield('footer_js')
        </body>
        </html>
