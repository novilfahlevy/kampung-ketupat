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

    <!--// Theme App Css //-->
    @vite(['resources/css/frontend/app.scss'])

    <!--// Google Fonts //-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body data-spy="scroll" data-target="#fixedNavbar">

    <!--// Page Wrapper Start //-->
    <div class="page-wrapper" id="wrapper">

        <!--// Header Start //-->
        <header class="header fixed-top p-3 p-lg-0" id="header">
            <div id="nav-menu-wrap">
                <div class="container">
                    <nav class="navbar navbar-expand-lg p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fixedNavbar" 
                            aria-controls="fixedNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse main-menu justify-content-center" id="fixedNavbar">
                            @php
                                $isInGalleryPage = request()->routeIs('galeri.index') || request()->routeIs('galeri.show');
                                $isInBlogPage = request()->routeIs('blog.index') || request()->routeIs('blog.show');
                                $isInsidePage = $isInGalleryPage || $isInBlogPage;
                            @endphp
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/') : '#home' }}">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#lokasi') : '#lokasi' }}">Lokasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#kerjasama') : '#kerjasama' }}">Kerjasama</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#galeri') : '#galeri' }}">Galeri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#blog') : '#blog' }}">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#ulasan') : '#ulasan' }}">Ulasan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="{{ $isInsidePage ? url('/#faq-area') : '#faq-area' }}">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!--// Header End  //-->

        <!--// Main Area Start //-->
        <main class="main-area">

            @yield('content')

			<!--// Footer Start //-->
			<footer class="footer">
				<div class="footer-top">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-6 col-lg-4 footer-widget-resp">
								<div class="footer-widget">
									<h6 class="footer-title">Tentang</h6>
									<p class="footer-desc">
										Kampung Ketupat merupakan salah satu destinasi wisata yang ada di kota Samarinda.
									</p>
									<div class="footer-social-links">
										<a href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
										<a href="#">
											<i class="fab fa-twitter"></i>
										</a>
										<a href="#">
											<i class="fab fa-instagram"></i>
										</a>
										<a href="#">
											<i class="fab fa-youtube"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4 footer-widget-resp">
								<div class="footer-widget">
									<h6 class="footer-title">Kontak</h6>
									<div class="footer-contact-info-wrap">
										<ul class="footer-contact-info-list">
											<li>
												<h6>Alamat:</h6>
												<p>Jl. Mangkupalas, Mesjid, Kec. Samarinda Seberang, Kota Samarinda, Kalimantan Timur 75251</p>
											</li>
											<li>
												<h6>Email & No Telp:</h6>
												<div class="text">
													<p>info@example.com</p>
													<p>(423) 391-7144</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="copyright text-center">
					<div class="container">
						<p class="copyright-text">© Copyright 2021. Kampung Ketupat</p>
					</div>
				</div>
			</footer>
			<!--// Footer End //-->

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

    <!--// App Js //-->
    @vite(['resources/js/frontend/app.js'])
</body>
</html>