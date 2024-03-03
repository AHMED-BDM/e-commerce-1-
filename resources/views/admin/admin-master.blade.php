<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    {{-- <title>Products - Admin Version</title> --}}
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/newCss.css') }}">
    {{-- @extends('layouts.css') <!-- if you need to include css file go to layouts.css--> --}}
</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!--Admin Links -->
                        <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex items-center">
                            <!-- Register Button -->
                            <a href="{{ route('admin') }}" class="btn-primary">Admin Panel</a>
                            <!-- add new product Button -->
                            @yield('add-prod-icon')
                            <a href="{{ route('add-prod') }}" class="btn btn-secondary">
                                <i class="bi bi-plus"></i> Add New Product
                            </a>
                            <!-- add new category Button -->
                            @yield('add-cat-icon')
                            <a href="{{ route('add-cat') }}" class="btn btn-secondary">
                                <i class="bi bi-plus"></i> Add New Category
                            </a>
                        </div>
                        <!-- End Admin Links -->
                    </div>

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="{{ route('admin') }}">Home</a>
                            </li>




                            <li>
                                <a href="{{ route('admin_categories') }}">Categories</a>
                                <ul class="sub-menu">
                                    @foreach ($result as $item)
                                        <li><a href="{{ route('admin_products', $item->id) }}">{{ $item->name }}</a>
                                        </li>
                                    @endforeach
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="{{ route('AllAdminProducts') }}">Products</a>
                            <ul class="sub-menu">
                                @foreach ($prods as $item2)
                                    <li><a href="{{ route('admin_once_Prod', $item2->id) }}">{{ $item2->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>





                        {{-- <li><a href="{{ route('admin_categories') }}">Category</a></li>
                            <li><a href="{{ route('admin_products') }}">Products</a></li> --}}
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="404.html">404 page</a></li>
                                <li><a href="{{ route('sh_cat') }}">User Categories</a></li>
                                <li><a href="{{ route('show_prod') }}">User Products</a></li>

                                <li><a href="{{ route('sh_cat') }}">Shop</a></li>
                            </ul>
                        </li>
                        <li><a href="shop.html">Shop</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('show_prod') }}">Shop</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="header-icons">
                                <a class="shopping-cart" href="#"><i class="fas fa-shopping-cart"></i></a>
                                <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                            </div>
                        </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Search For:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->

    <!-- home page slider -->
    <div class="homepage-slider">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh & Organic</p>
                                <h1>ملابس رياضية اخر شياكة</h1>
                                <div class="hero-btns">
                                    <a href="#" class="boxed-btn">Fruit Collection</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Fresh Everyday</p>
                                <h1>100% طبيعي وطازج</h1>
                                <div class="hero-btns">
                                    <a href="{{ route('sh_cat') }}" class="boxed-btn">Visit Shop</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>الحق شوف اخر العروض</h1>
                                <div class="#">
                                    <a href="#" class="boxed-btn">Visit Shop</a>
                                    <a href="#" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->



    @yield('admin-notfound')
    @yield('content') <!-- the static content been here -->
    <!-- jquery -->
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
