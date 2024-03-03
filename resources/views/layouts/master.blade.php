<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>@yield('title')</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <link rel="stylesheet" href="{{ asset('admin-assets/css/newCss.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
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



                            @guest
                                <!-- Registeration Links -->
                                <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex items-center">
                                    <!-- Register Button -->
                                    <a href="{{ route('register') }}" class="btn-primary">{{ __('private.Register')}}</a>

                                    <!-- Log in Button -->
                                    <a href="{{ route('login') }}" class="btn-secondary">
                                        <i class="fas fa-sign-in-alt mr-2"></i> {{ __('private.Login')}}
                                    </a>
                                </div>
                            @else
                                <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex items-center">
                                    <!-- Account Button -->
                                    <a href="{{ route('show.profile') }}" class="btn-secondary">
                                        <i class="fas fa-sign-in-alt mr-2"></i> {{__('private.myAccount')}}
                                    </a>
                                </div>
                            @endguest

                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">

                            <ul>
                                <li class="current-list-item"><a href="/">{{ __('private.Home')}}</a>
                                </li>

                                <li><a href="{{ route('sh_cat') }}">{{ __('private.Categories')}}</a>
                                    <ul class="sub-menu">
                                        @foreach ($result as $item)
                                            <li><a href="{{ route('show_prod', $item->id) }}">{{ $item->name }}</a>
                                            </li>
                                        @endforeach
                                        {{-- <li><a style="color: white;text-align: center;" href="{{ route('sh_cat') }}">More Categories</a></li> --}}

                                </li>
                            </ul>
                            </li>
                            <li><a href="{{ route('AllProducts') }}">{{ __('private.Products')}}</a>
                                <ul class="sub-menu">
                                    @foreach ($prods as $item2)
                                        <li><a href="{{ route('once-prod', $item2->id) }}">{{ $item2->name }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li><a style="color: white;text-align: center;" href="{{ route('AllProducts') }}">More Products</a></li> --}}
                                </ul>
                            </li>

                            <li><a href="#">{{ __('private.Pages')}}</a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 page</a></li>
                                    <li><a href="{{ route('sh_cat') }}">Category</a></li>
                                    <li><a href="{{ route('show_prod') }}">Products</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="{{ route('sh_cat') }}">Shop</a></li>
                                </ul>
                            </li>
                            <li><a href="#">{{ __('private.ContactUs')}}</a></li>
                            {{-- <li><a href="shop.html">{{ __('private.Shop')}}</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('show_prod') }}">Shop</a></li>
                                </ul>
                            </li> --}}

                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="{{ route('switch.lang', 'en') }}" class="btn btn-secondary">English</a>
                                    <a href="{{ route('switch.lang', 'ar') }}" class="btn btn-secondary">العربية</a>
                                    <a href="{{ route('switch.lang', 'sp') }}" class="btn btn-secondary">Española</a>
                                </div>

                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="{{ route('cart.show') }}">{{ __('private.Cart')}}
                                        <i class="fas fa-shopping-cart">
                                            <span
                                                style="width:20px; font-size:100%;color:#fff;margin-left:3px; background-color:#f28123; padding:7px;border-radius:7px;">
                                                {{ Cart::content()->count() }}</span></i></a>

                                    <a class="mobile-hide search-bar-icon" href="#">
                                        <i class="fas fa-search"></i></a>
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
                            <h3>{{__('private.searchFor')}}</h3>
                            <form action="{{ route('search.products') }}" method="get">
                                @csrf
                                <input type="text" name="q" placeholder="{{__('private.Keywords')}}">
                                <button type="submit">{{__('private.search')}} <i class="fas fa-search"></i></button>
                            </form>
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



    @yield('content') <!-- the static content been here -->
    @yield('scripts')

    <!-- footer -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                            <li>support@fruitkha.com</li>
                            <li>+00 111 222 3333</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Subscribe</h2>
                        <p>Subscribe to our mailing list to get the latest updates.</p>
                        <form action="index.html">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end footer -->

    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                        Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                    </p>
                </div>
                <div class="col-lg-6 text-right col-md-12">
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end copyright -->

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
