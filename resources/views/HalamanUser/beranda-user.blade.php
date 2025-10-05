<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <title>GanciKuy</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/gancilogo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    
    {{-- Memastikan CSS shop juga dimuat --}}
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">

    {{-- STYLE CUSTOM TOMBOL DARI SHOP DIPINDAH KE SINI --}}
    <style>
        .cart-btn-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #ff6a00; /* Warna oranye/kuning */
            color: #fff;
            font-weight: 600;
            padding: 10px 25px;
            border: none;
            border-radius: 30px; /* Membulat */
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .cart-btn-custom i {
            margin-right: 8px;
        }

        .cart-btn-custom:hover {
            background-color: #e65c00; /* Warna hover lebih gelap */
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        
        /* Memastikan gambar produk seragam */
        .single-product-item .product-image {
            height: 250px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            overflow: hidden; 
        }
        .single-product-item .product-image img {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
        }
    </style>

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
                                <li class="current-list-item"><a href="{{ route('beranda-user') }}">Home</a></li>
                                <li><a href="{{ route('about-user') }}">About</a></li>
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
    <div class="hero-area hero-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">GanciKuy</p>
                            <h1>Buat Gantungan Kunci Anda Lebih Menarik</h1>
                            <div class="hero-btns">
                                <a href="{{ route('shop-user') }}" class="boxed-btn">Pesan Ganci Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title"> 
                        <h3><span class="orange-text">Pilih</span> Gantunganmu</h3>
                        {{-- Catatan: Jumlah produk kini dibatasi 3 di BerandaController --}}
                        <p>3 Pilihan gantungan kunci terbaru kami:</p>
                    </div>
                </div>
            </div>

            <div class="row product-lists" id="product-container">
                {{-- Memanggil daftar produk dinamis, menggunakan tombol cart-btn-custom --}}
                @include('HalamanUser.partials.product-list', ['produk' => $produk])
            </div>
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('shop-user') }}" class="boxed-btn">Lihat Semua Produk</a>
                </div>
            </div>
        </div>
    </div>
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg">
                        <a href="https://www.youtube.com/watch?v=X8be6QHxmTQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">Starting in the year 2025</p>
                        <h2>We are <span class="orange-text">GanciKuy</span></h2>
                        <p>GanciKuy adalah sebuah website yang dibangun untuk memperkenalkan brand gantungan kunci unik dan kreatif. Dengan tampilan modern dan sederhana, website ini memberikan informasi tentang awal berdirinya brand di tahun 2025, serta menampilkan visi untuk menghadirkan produk aksesori yang stylish dan bermanfaat.</p>
                        <p>Dengan desain clean dan responsif, GanciKuy hadir sebagai media promosi sekaligus branding digital untuk memperkenalkan produk gantungan kunci yang trendi, personal, dan relevan dengan gaya anak muda masa kini.</p>
                        <a href="{{ route('about-user') }}" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shop-banner">
        <div class="container">
            <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="{{ route('shop-user') }}" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
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
                            <li>📍 Politeknik Negeri Tanah Laut</li>
                            <li>📧 Email: gancikuy@gmail.com</li>
                            <li>📱 WhatsApp: 085887693441</li>
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
    
    {{-- SCRIPT TAMBAHAN UNTUK FUNGSI CART AJAX/SHOP --}}
    <script src="{{ asset('assets/js/cart-badge.js') }}"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>

</body>
</html>