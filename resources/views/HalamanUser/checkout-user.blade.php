<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <title>Check Out | GanciKuy</title>

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

    <style>
    .payment-label {
        display: flex;
        align-items: center;
        gap: 15px;      /* kasih jarak antar elemen */
        margin-bottom: 15px; /* kasih spasi antar opsi */
    }

    .payment-label img {
        max-height: 50px;   /* batasi tinggi biar rapi */
        width: auto;        /* biar proporsional */
        max-width: 100%;    /* biar responsif */
        object-fit: contain;
    }

    @media (max-width: 576px) {
        .payment-label img {
            max-height: 35px; /* logo lebih kecil di HP */
        }
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
                                <li><a href="{{ route('pesanan-user') }}">Pesanan</a></li>
                                <li class="current-list-item">
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
                        <p>Tunggu Apalagi</p>
                        <h1>Lakukan Pembayaran</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-accordion-wrap">
                        <div class="accordion" id="accordionExample">

                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                                            Pilih Metode Pembayaran <span id="check-payment" style="display:none;">✅</span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form id="paymentForm">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment" value="Dana" id="payDana">
                                                <label class="form-check-label payment-label" for="payDana">
                                                    <img src="{{ asset('assets/img/logo-dana.png') }}" alt="Dana Logo">
                                                    Dana
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment" value="BRI" id="payBri">
                                                <label class="form-check-label payment-label" for="payBri">
                                                    <img src="{{ asset('assets/img/logo-bri.png') }}" alt="BRI Logo">
                                                    Bank BRI
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment" value="QRIS" id="payQris">
                                                <label class="form-check-label payment-label" for="payQris">
                                                    <img src="{{ asset('assets/img/logo-qris.png') }}" alt="QRIS Logo">
                                                    QRIS (Semua Bank/E-Wallet)
                                                </label>
                                            </div>
                                        </form>
                                        {{-- Tambahkan div ini agar JS bisa menampilkannya --}}
                                        <div id="paymentDetails" style="display:none;" class="mt-3 p-3 border rounded">
                                            <p id="paymentInfo" class="mb-2 font-weight-bold"></p>
                                            <img id="qrisImage" src="{{ asset('assets/img/qris-barcode.png') }}" alt="QRIS Barcode" style="max-width: 200px; display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card single-accordion">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                            Isi Data Pembeli <span id="check-buyer" style="display:none;">✅</span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form id="buyerForm">
                                            <p><input type="text" id="buyerName" class="form-control" placeholder="Nama Pembeli" required></p>
                                            <p><input type="tel" id="buyerPhone" class="form-control" placeholder="Nomor HP Pembeli" required></p>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div></div>
                </div>

                <div class="col-lg-4">
                    <div class="order-details-wrap">
                        <table class="order-details">
                            <thead>
                                <tr>
                                    <th>Your Order Details</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="order-details-body">
                                <tr><td><strong>Product</strong></td><td><strong>Total</strong></td></tr>
                                @forelse($cart as $item)
                                    <tr>
                                        <td>{{ $item['name'] }} (x{{ $item['quantity'] }})</td>
                                        <td>Rp {{ number_format((float)$item['price'] * (int)$item['quantity'], 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">Keranjang kosong.</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tbody class="checkout-details">
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('konfirmasi-pembayaran') }}" id="placeOrderBtn" class="boxed-btn disabled" style="pointer-events:none;opacity:0.6;">Place Order</a>
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
document.addEventListener("DOMContentLoaded", function() {
    let paymentSelected = false;
    let buyerCompleted = false;
    let selectedPayment = "";
    let paymentInfoText = "";

    // ceklis untuk metode pembayaran
    document.querySelectorAll('input[name="payment"]').forEach((radio) => {
        radio.addEventListener('change', function() {
            paymentSelected = true;
            selectedPayment = this.value;
            document.getElementById("check-payment").style.display = "inline"; 
            showPaymentDetails(selectedPayment); // tampilkan detail pembayaran
            checkAllConditions();
        });
    });

    // tampilkan detail pembayaran sesuai pilihan
    function showPaymentDetails(method) {
        let details = document.getElementById("paymentDetails");
        let info = document.getElementById("paymentInfo");
        let qrisImg = document.getElementById("qrisImage");

        details.style.display = "block";
        qrisImg.style.display = "none";

        if (method === "Dana") {
            paymentInfoText = "085822734981";
            info.textContent = "Silakan transfer ke nomor Dana berikut: " + paymentInfoText;
        } else if (method === "BRI") {
            paymentInfoText = "1234-01-000987-56-7";
            info.textContent = "Silakan transfer ke rekening BRI berikut: " + paymentInfoText;
        } else if (method === "QRIS") {
            paymentInfoText = "QRIS Barcode";
            info.textContent = "Silakan scan barcode QRIS berikut untuk melakukan pembayaran:";
            qrisImg.style.display = "block";
        }
    }

    // ceklis untuk form pembeli
    function checkBuyerForm() {
        let name = document.getElementById("buyerName").value.trim();
        let phone = document.getElementById("buyerPhone").value.trim();
        if (name !== "" && phone !== "") {
            buyerCompleted = true;
            document.getElementById("check-buyer").style.display = "inline";
        } else {
            buyerCompleted = false;
            document.getElementById("check-buyer").style.display = "none";
        }
        checkAllConditions();
    }

    document.getElementById("buyerName").addEventListener("input", checkBuyerForm);
    document.getElementById("buyerPhone").addEventListener("input", checkBuyerForm);

    // aktifkan tombol jika syarat terpenuhi
    function checkAllConditions() {
        let btn = document.getElementById("placeOrderBtn");
        if (paymentSelected && buyerCompleted) {
            btn.classList.remove("disabled");
            btn.style.pointerEvents = "auto";
            btn.style.opacity = "1";
        } else {
            btn.classList.add("disabled");
            btn.style.pointerEvents = "none";
            btn.style.opacity = "0.6";
        }
    }

    // aksi ketika klik Place Order
    document.getElementById("placeOrderBtn").addEventListener("click", function(e) {
        e.preventDefault();
        if (paymentSelected && buyerCompleted) {
            let name = document.getElementById("buyerName").value.trim();
            let phone = document.getElementById("buyerPhone").value.trim();

            // arahkan ke halaman konfirmasi-pembayaran dengan query string
            let url = "{{ route('konfirmasi-pembayaran') }}" 
                     + "?name=" + encodeURIComponent(name)
                     + "&phone=" + encodeURIComponent(phone)
                     + "&payment=" + encodeURIComponent(selectedPayment)
                     + "&info=" + encodeURIComponent(paymentInfoText);

            window.location.href = url;
        }
    });
});
</script>


</body>
</html>