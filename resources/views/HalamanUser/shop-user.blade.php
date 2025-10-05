<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <title>Shop</title>

    <link rel="shortcut icon" type="image/png" href="assets/img/gancilogo.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/shop.css">

    <meta name="shop-filter-url" content="{{ route('shop.filter') }}">

    <style>
        .cart-btn-custom {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #ff6a00; /* Warna oranye */
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

        /* */
        .single-product-item .product-image {
            height: 250px; /* Atur tinggi yang seragam */
            display: flex; /* Menggunakan flexbox */
            align-items: center; /* Posisikan gambar di tengah vertikal */
            justify-content: center; /* Posisikan gambar di tengah horizontal */
            overflow: hidden; /* Sembunyikan gambar yang melebihi ukuran */
        }
        .single-product-item .product-image img {
            width: 100%; /* Lebar 100% dari container */
            height: 100%; /* Tinggi 100% dari container */
            object-fit: cover; /* Penting: Memastikan gambar mengisi area tanpa distorsi */
        }
        /* */
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
                            <a href="index.html">
                                <img src="assets/img/logoganci.png" alt="">
                            </a>
                        </div>
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="{{ route('beranda-user') }}">Home</a></li>
                                <li><a href="{{ route('about-user') }}">About</a></li>
                                <li><a href="{{ route('shop-user') }}">Shop</a></li>
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
                        <p>Custom Gantungan Kunci Anda</p>
                        <h1>Shop</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-section mt-150 mb-150">
        <div class="container">
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="assets/img/logoganci.png" alt="">
							</a>
						</div>
						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{ route('beranda-user') }}">Home</a></li>
								<li><a href="{{ route('about-user') }}">About</a></li>
								<li><a href="{{ route('shop-user') }}">Shop</a>
								<ul class="sub-menu">
										<li><a href="{{ route('pesanan-user') }}">Pesanan</a></li>
									</ul>
								</li>
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
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

            {{-- Filter Kategori --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul id="kategori-filter">
                            <li data-kategori="" class="{{ request('kategori') ? '' : 'active' }}">All</li>
                            @foreach($kategori as $k)
                                <li data-kategori="{{ $k->id }}" class="{{ request('kategori') == $k->id ? 'active' : '' }}">
                                    {{ $k->nama }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Produk --}}
            <div class="row product-lists" id="product-container">
                @include('HalamanUser.partials.product-list', ['produk' => $produk])
            </div>

            {{-- Pagination --}}
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap" id="pagination-container">
                        {{ $produk->withQueryString()->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.js"></script>
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <script src="assets/js/sticker.js"></script>
    <script src="assets/js/main.js"></script>
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