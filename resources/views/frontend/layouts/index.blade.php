<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Kampung Ketupat">
    <meta name="robots" content="index,follow">
    <meta name="publisher" content="Inforsa">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Kampung Ketupat kampung penuh warna">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Kampung Ketupat | Kampung Penuh Warna</title>

    <!--// Boostrap v4 //-->
    <link rel="stylesheet" href="{{ asset('storage/vendor/css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('storage/vendor/css/magnific.popup.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('storage/vendor/css/animate.min.css') }}">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="{{ asset('storage/vendor/css/owl.carousel.min.css') }}">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="{{ asset('storage/vendor/css/owl.carousel.default.min.css') }}">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="{{ asset('storage/fonts/font_awesome/css/all.css') }}">
    <!--// Ligthbox //-->
    <link rel="stylesheet" href="{{ asset('storage/vendor/css/lightbox.min.css') }}">

    <!--// Theme App Css //-->
    @vite(['resources/css/frontend/app.scss'])

    <!--// Google Fonts //-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body data-spy="scroll" data-target="#fixedNavbar">

    <!--// Page Wrapper Start //-->
    <div class="page-wrapper" id="wrapper">

        @include('frontend.layouts.header')

        <!--// Main Area Start //-->
        <main class="main-area">

            @yield('content')

			@include('frontend.layouts.footer')

        </main>
        <!--// Main Area End //-->

        <a href="#wrapper" class="scroll-top-btn">
            <i class="fa fa-arrow-up"></i>
        </a>
        <!--// .scroll-top-btn // -->

        <div id="preloader-wrap">
            <div class="preloader-inner">
                <div class="gooey">
                    <span class="dot"></span>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <!--// Preloader // -->

    </div>
    <!--// Page Wrapper End //-->

    @stack('modal')

    <!--// JQuery //-->
    <script src="{{ asset('storage/vendor/js/jquery.min.js') }}"></script>
    <!--// Images Loaded //-->
    <script src="{{ asset('storage/vendor/js/images.loaded.min.js') }}"></script>
    <!--// Magnific Popup //-->
    <script src="{{ asset('storage/vendor/js/magnific.popup.min.js') }}"></script>
    <!--// Popper Popup //-->
    <script src="{{ asset('storage/vendor/js/popper.min.js') }}"></script>
    <!--// Bootstrap //-->
    <script src="{{ asset('storage/vendor/js/bootstrap.min.js') }}"></script>
    <!--// Waypoint Js //-->
    <script src="{{ asset('storage/vendor/js/waypoint.min.js') }}"></script>
    <!--// Counter Up Js //-->
    <script src="{{ asset('storage/vendor/js/counter.up.min.js') }}"></script>
    <!--// JQuery Easing Functions //-->
    <script src="{{ asset('storage/vendor/js/jquery.easing.min.js') }}"></script>
    <!--// Owl Carousel //-->
    <script src="{{ asset('storage/vendor/js/owl.carousel.min.js') }}"></script>
    <!--// Form Validate //-->
    <script src="{{ asset('storage/vendor/js/validate.min.js') }}"></script>
    <!--// Particles Js //-->
    <script src="{{ asset('storage/vendor/js/particles.js') }}"></script>
    <!--// Lighbox2 Js //-->
    <script src="{{ asset('storage/vendor/js/lightbox.min.js') }}"></script>

    <!--// App Js //-->
    @vite(['resources/js/frontend/app.js'])
</body>
</html>