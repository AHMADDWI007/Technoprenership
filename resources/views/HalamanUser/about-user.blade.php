<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <title>About | GanciKuy</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/gancilogo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css?v=2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css?v=2') }}">

</head>
<body>
    
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <div class="site-logo">
                            <a href="{{ route('beranda-user') }}">
                                <img src="{{ asset('assets/img/logoganci.png') }}" alt="GanciKuy Logo">
                            </a>
                        </div>
                        <nav class="main-menu">
                            <ul>
                                <li><a href="{{ route('beranda-user') }}">Home</a></li>
                                <li class="current-list-item"><a href="{{ route('about-user') }}">About</a></li>
                                <li><a href="{{ route('shop-user') }}">Shop</a></li>
                                <li><a href="{{ route('pesanan-user') }}">Pesanan</a></li>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="{{ route('cart-user') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        @if(session('cart') && count(session('cart')) > 0)
                                            <span class="cart-badge">{{ count(session('cart')) }}</span>
                                        @endif</a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>We Sell Attractive Key Chains</p>
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="feature-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="featured-text">
                        <h2 class="pb-3">Kenapa Beli di<span class="orange-text">GanciKuy</span></h2>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-store"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Langsung dari Stand</h3>
                                        <p>Lihat dan pilih produk langsung di stand kami, tanpa repot menunggu pengiriman.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-money-bill-alt"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Best Price</h3>
                                        <p>Harga bersahabat dengan kualitas cetakan dan bahan yang tetap premium.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="content">
                                        <h3>Custom Box</h3>
                                        <p>Pilih desain gantungan kunci sesuai keinginanmu untuk hasil yang unik dan personal.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="list-box d-flex">
                                    <div class="list-icon">
                                        <i class="fas fa-clock"></i> </div>
                                    <div class="content">
                                        <h3>Preorder untuk Desain Khusus</h3>
                                        <p>Untuk desain yang sulit dan detail, kami layani lewat sistem preorder agar hasilnya maksimal.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Our <span class="orange-text">Team</span></h3>
                        <p>Team Pembuat dan Perannya</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-item">
                        <div class="team-bg team-bg-1"></div>
                        <h4>Ahmad Dwi Kurnia <span>Backend Developer</span></h4>
                        <ul class="social-link-team">
                            <li><a href="https://www.instagram.com/_ahmwi?igsh=dWZxMXBlbGVudmZi" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-team-item">
                        <div class="team-bg team-bg-2"></div>
                        <h4>Bangkit Triandoyo <span>UI/UX Designer</span></h4>
                        <ul class="social-link-team">
                            <li><a href="https://www.instagram.com/kitkotzz?igsh=MXViNTB1a2d4ODJmNg==" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                    <div class="single-team-item">
                        <div class="team-bg team-bg-3"></div>
                        <h4>Muhammad Bagas <span>Frontend Developer</span></h4>
                        <ul class="social-link-team">
                            <li><a href="https://www.instagram.com/mhmmd_bgss?igsh=MWFncnk0a3kyeTJtaw==" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/logohima.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/politala.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/LogoTi.png') }}" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="{{ asset('assets/img/company-logos/gancikuy.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box about-widget">
                        <h2 class="widget-title">About us</h2>
                        <p>GanciKuy adalah brand yang menyediakan gantungan kunci akrilik dengan desain unik dan berkualitas tinggi.
                        Kami hadir di berbagai event dan bazar dengan konsep stand langsung, serta melayani preorder untuk desain khusus agar setiap produk benar-benar sesuai keinginan pelanggan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box get-in-touch">
                        <h2 class="widget-title">Get in Touch</h2>
                        <ul>
                            <li>Politeknik Negeri Tanah Laut</li>
                            <li>Email: gancikuy@gmail.com</li>
                            <li>WhatsApp: 085887693441</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box pages">
                        <h2 class="widget-title">Pages</h2>
                        <ul>
                            <li><a href="{{ route('beranda-user') }}">Home</a></li>
                            <li><a href="{{ route('about-user') }}">About</a></li>
                            <li><a href="{{ route('shop-user') }}">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-box subscribe">
                        <h2 class="widget-title">Support</h2>
                        <p>Kalau Anda Suka Support kami ya</p>
                        <form action="{{ route('beranda-user') }}">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <p>Copyrights &copy; 2025 - <a href="https://imransdesign.com/">GanciKuy</a>, All Rights Reserved.<br>
                        Distributed By - <a href="https://themewagon.com/">Politala</a>
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
    <script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/sticker.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>