<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/shop/css/main.css') }}">
</head>
<body>

    <section class="generic-banner relative">
    <!-- Start Header Area -->
        <div id="undefined-sticky-wrapper" class="sticky-wrapper" style="height: 56px;"><header class="default-header">
            <nav class="navbar navbar-expand-lg  navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('themes/shop/img/logo.png') }}">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="lnr lnr-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('shop') }}">Shop</a></li>
                            @if(Auth::check())
                                <li class="dropdown">
                                  <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                  </a>
                                  <div class="dropdown-menu" style="display: none;">
                                    @if(Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{ url('product') }}">
                                        <i class="fa fa-shopping-bag"></i>
                                        Daftar Produk
                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ url('order') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                        Daftar Pesanan
                                    </a>
                                    <a class="dropdown-item" href="#" onclick="getElementById('logoutForm').submit()">
                                        <i class="fa fa-sign-out"></i>
                                        Logout
                                    </a>
                                    <form id="logoutForm" method="post" action="{{ url('logout') }}">
                                        {{ csrf_field() }}
                                    </form>
                                  </div>
                                </li>
                            @else
                                <li><a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                            @endif
                            
                            @if(Auth::check() && Auth::user()->isAdmin())
                            @else
                             <li>
                                <a href="{{ url('cart') }}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="badge badge-danger rounded-circle">
                                        {{ \Cart::count() }}
                                    </span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>                        
                </div>
            </nav>
        </div>
    <!-- End Header Area -->   
        @if(request()->route()->getName() == 'home')             
        <div class="container">
            <div class="row height align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="generic-banner-content">
                        <h2 class="text-white text-center">The Elements Page</h2>
                        <p class="text-white">It won’t be a bigger problem to find one video game lover in your <br> neighbor. Since the introduction of Virtual Game.</p>
                        <div class="text-center">
                            <a href="{{ url('shop') }}" class="genric-btn info circle arrow">
                                Shopping Page
                                <span class="lnr lnr-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                <div class="col-first">
                    <h1>@yield('title')</h1>
                     <nav class="d-flex align-items-center justify-content-start">
                        <a href="{{ url('/') }}">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        @yield('breadcrumb')
                    </nav>
                </div>
            </div>
        </div>
        @endif
    </section>

    <!-- Start My Account -->
    <div class="container mt-5">
    	@yield('content')
    </div>
    <!-- End My Account -->

    <!-- start footer Area -->      
    <footer class="footer-area section-gap mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Us</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>Stay update with our latest</p>
                        <div class="" id="mc_embed_signup">

                                <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                <div class="d-flex flex-row">

                                    <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


                                        <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                        </div>
                                    
                                    <!-- <div class="col-lg-4 col-md-4">
                                        <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                                    </div>  -->
                                </div>      
                                <div class="info"></div>
                                </form>
                        </div>
                        </div>
                </div>                      
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Follow Us</h6>
                        <p>Let us be social</p>
                        <div class="footer-social d-flex align-items-center">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>                          
            </div>
            <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <p class="footer-text m-0">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </footer>   
    <!-- End footer Area -->        

    
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('themes/shop/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('themes/shop/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('themes/shop/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('themes/shop/js/ion.rangeSlider.js') }}"></script>
    <script src="{{ asset('themes/shop/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/shop/js/owl.carousel.min.js') }}"></script>            
    <script src="{{ asset('themes/shop/js/main.js') }}"></script>
    <script>
        $(function(){
            $('.nice-select').hide();
            $('select').show();
        });
    </script>  
    @stack('scripts')  
</body>
</html>