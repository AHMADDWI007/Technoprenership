<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

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
								<img src="assets/img/logoganci.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="{{ route('beranda-user') }}">Home</a>
								</li>
								<li><a href="{{ route('about-user') }}">About</a></li>
								<li><a href="{{ route('shop-user') }}">Shop</a></li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ route('cart-user') }}"><i class="fas fa-shopping-cart"></i></a>
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
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Tunggu Apalagi Checkout Sekarang</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
						<tr class="table-head-row">
							<th class="product-remove"></th>
							<th class="product-image">Product Image</th>
							<th class="product-price">Price</th>
							<th class="product-quantity">Quantity</th>
							<th class="product-total">Total</th>
						</tr>
					</thead>
					<tbody>
						@forelse($cart as $id => $item)
							<tr class="table-body-row">
								<td class="product-remove">
									<form action="{{ route('cart.remove', $id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" style="border:none; background:none; cursor:pointer;">
											<i class="far fa-window-close"></i>
										</button>
									</form>
								</td>
								<td class="product-image">
									<img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name'] }}" style="width:70px;">
								</td>
								<td class="product-price">Rp {{ number_format($item['price'],0,',','.') }}</td>
								<td class="product-quantity">
									<form action="{{ route('cart.update', $id) }}" method="POST" enctype="multipart/form-data">
										@csrf
										<input type="number" 
											name="quantity" 
											value="{{ $item['quantity'] }}" 
											min="1" 
											class="cart-quantity" 
											data-id="{{ $id }}" 
											style="width:60px; text-align:center;">
								</td>
								<td class="product-total" id="total-{{ $id }}">Rp {{ number_format((float)$item['price'] * (int)$item['quantity'],0,',','.') }}</td>
							</tr>
							<tr>
								<td colspan="6">
									<label>Upload Desain (bisa lebih dari 1):</label>
									<input type="file" name="uploads[]" multiple class="form-control mb-2">
									@if(!empty($item['uploads']))
										<div class="d-flex flex-wrap mb-2">
											@foreach($item['uploads'] as $upload)
												<img src="{{ asset('storage/'.$upload) }}" style="width:70px; margin-right:5px;">
											@endforeach
										</div>
									@endif
									<label>Deskripsi:</label>
									<textarea name="description" class="form-control">{{ $item['description'] ?? '' }}</textarea>
									<button type="submit" class="btn btn-sm btn-primary">Update</button>
									</form>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="6" class="text-center">Keranjang kosong.</td>
							</tr>
						@endforelse
					</tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td class="subtotal-price" id="subtotal">Rp {{ number_format(collect($cart)->sum(fn($c) => (float)$c['price'] * (int)$c['quantity']),0,',','.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="{{ route('shop-user') }}" class="boxed-btn">Lanjut Belanja</a>
                        <a href="#" class="boxed-btn black">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	<!-- end cart -->
	
	<!-- jquery -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<script src="assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>

	<script>
$(document).ready(function() {
    $(".cart-quantity").on("change", function() {
        let quantity = $(this).val();
        let id = $(this).data("id");

        $.ajax({
            url: "/cart/update/" + id,
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                quantity: quantity
            },
            success: function(response) {
                // Update total per item
                $("#total-" + id).text("Rp " + new Intl.NumberFormat('id-ID').format(response.itemTotal));

                // Update subtotal
                $("#subtotal").text("Rp " + new Intl.NumberFormat('id-ID').format(response.subtotal));
            },
            error: function(xhr) {
                alert("Terjadi kesalahan saat update keranjang!");
            }
        });
    });
});
</script>


</body>
</html>