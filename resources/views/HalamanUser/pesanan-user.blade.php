<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <title>Pesanan | GanciKuy</title>

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
    <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}">
    <meta name="shop-filter-url" content="{{ route('shop.filter') }}">

    <style>
.card {
    transition: all 0.3s ease;
    border: none;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0,0,0,0.1);
}
.badge {
    font-size: 13px;
    padding: 8px 12px;
    border-radius: 8px;
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
                                <li><a href="{{ route('beranda-user') }}">Home</a></li>
                                <li><a href="{{ route('about-user') }}">About</a></li>
                                <li><a href="{{ route('shop-user') }}">Shop</a></li>
                                <li class="current-list-item"><a href="{{ route('pesanan-user') }}">Pesanan</a></li>
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
                        <p>Cek Pesanan Anda</p>
                        <h1>Pesanan</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                @if($pesanan->isEmpty())
                    <div class="alert alert-warning text-center mt-4">
                        Anda belum memiliki pesanan.
                    </div>
                @else
                    @foreach ($pesanan as $psn)
                        <div class="card shadow-lg mb-4 border-0 rounded-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-bold mb-0">{{ $psn->nama_pembeli }}</h5>
                                    <span class="badge 
                                        @if($psn->status == 'menunggu') bg-warning text-dark
                                        @elseif($psn->status == 'diproses') bg-info text-white
                                        @elseif($psn->status == 'selesai') bg-success
                                        @else bg-secondary
                                        @endif
                                    ">
                                        {{ ucfirst($psn->status) }}
                                    </span>
                                </div>

                                <hr>

                                {{-- Daftar Produk --}}
                                @foreach ($psn->detail as $detail)
                                    <div class="d-flex align-items-center mb-3">
                                        @php
                                            $imagePaths = is_string($detail->foto_request) && (str_starts_with($detail->foto_request, '[') || str_starts_with($detail->foto_request, '"')) 
                                                ? json_decode($detail->foto_request) 
                                                : [$detail->foto_request];
                                            $firstImagePath = is_array($imagePaths) && !empty($imagePaths) ? $imagePaths[0] : $detail->foto_request;
                                        @endphp

                                        <div class="me-3">
                                            @if($firstImagePath)
                                                <img src="{{ asset('storage/' . $firstImagePath) }}" 
                                                     alt="Foto Request" 
                                                     class="rounded-3" 
                                                     style="width:70px;height:70px;object-fit:cover;">
                                            @else
                                                <img src="{{ asset('assets/img/noimage.png') }}" 
                                                     class="rounded-3" 
                                                     style="width:70px;height:70px;object-fit:cover;">
                                            @endif
                                        </div>

                                        <div>
                                            <h6 class="fw-semibold mb-1">{{ $detail->barang->nama_produk ?? '-' }}</h6>
                                            <p class="text-muted small mb-0">Jumlah: {{ $detail->jumlah }}</p>
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="fw-bold text-muted mb-0">Total:</h6>
                                    <h5 class="fw-bold text-primary mb-0">Rp {{ number_format($psn->total_harga, 0, ',', '.') }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

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
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/js/cart-badge.js') }}"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>

    <script>
        // Hilangkan preloader setelah halaman selesai dimuat
        $(window).on('load', function() {
            $('.loader').fadeOut('slow');
        });
    </script>
</body>
</html>