<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <title>Cart | GanciKuy</title>

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
                                <li><a href="{{ route('pesanan-user') }}">Pesanan</a></li>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="{{ route('cart-user') }}">
                                            <i class="fas fa-shopping-cart"></i>
                                            @if(session('cart') && count(session('cart')) > 0)
                                                <span class="cart-badge">{{ count(session('cart')) }}</span>
                                            @endif
                                        </a>
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
                        <p>Tunggu Apalagi Checkout Sekarang</p>
                        <h1>Cart</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                    <th class="product-name">Product Name</th>
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
                                        <td class="product-name">{{ $item['name'] }}</td>
                                        <td class="product-price">Rp {{ number_format($item['price'],0,',','.') }}</td>
                                        <td class="product-quantity">
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
                                    <tr class="table-body-row-details">
                                        <td colspan="6" class="product-details-extra">
                                            <form action="{{ route('cart.update', $id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-2">
                                                    <label class="font-weight-bold">Upload Foto (jika memesan lebih dari 1, tambahkan Foto Lainnya):</label>
                                                    <input type="file" name="uploads[]" multiple class="form-control-file">
                                                </div>
                                                @if(!empty($item['uploads']))
                                                    <p class="mt-2 mb-1">Foto terlampir:</p>
                                                    <div class="d-flex flex-wrap mb-2">
                                                        @foreach($item['uploads'] as $upload)
                                                            <img src="{{ asset('storage/'.$upload) }}" style="width:70px; margin-right:5px; border-radius:5px; border: 1px solid #ccc;">
                                                        @endforeach
                                                    </div>
                                                @endif
                                                <div class="form-group mb-3">
                                                    <label class="font-weight-bold">Deskripsi/Catatan Khusus:</label>
                                                    <textarea name="description" class="form-control" rows="2" placeholder="Contoh: Kunci A: warna merah, foto 1. Kunci B: warna biru, foto 2.">{{ $item['description'] ?? '' }}</textarea>
                                                </div>
                                                <button type="submit" class="boxed-btn small">Update Foto/Deskripsi</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Keranjang kosong. <a href="{{ route('shop-user') }}">Yuk, mulai belanja!</a></td>
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
                            <a href="{{ route('checkout-user') }}" class="boxed-btn black">Check Out</a>
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

    <script>
    // Memperbaiki skrip AJAX agar memanggil fungsi update yang sudah Anda buat.
    $(document).ready(function() {
        // Mengubah input type="number" di baris kuantitas untuk memicu update AJAX saat nilainya berubah
        $(".cart-quantity").on("change", function() {
            // Kita perlu mengambil kuantitas dan ID
            let quantity = $(this).val();
            let id = $(this).data("id");
            
            // Logika AJAX untuk mengupdate kuantitas
            $.ajax({
                url: "{{ url('/cart/update') }}/" + id, // Menggunakan url() untuk route
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    quantity: quantity
                },
                success: function(response) {
                    if(response.success) {
                        // Update total per item
                        $("#total-" + id).text("Rp " + new Intl.NumberFormat('id-ID').format(response.itemTotal));

                        // Update subtotal
                        $("#subtotal").text("Rp " + new Intl.NumberFormat('id-ID').format(response.subtotal));
                    } else {
                        alert("Gagal update kuantitas: " + response.message);
                    }
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