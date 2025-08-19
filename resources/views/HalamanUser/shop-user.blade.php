<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Shop</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/gancilogo.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
	<link rel="stylesheet" href="assets/css/shop.css">

	<!-- Untuk AJAX filter -->
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

	</style>
</head>
<body>
	<!-- PreLoader -->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!-- PreLoader Ends -->

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

	<!-- breadcrumb-section -->
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

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

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
	<!-- end products -->

	<!-- jquery -->
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
