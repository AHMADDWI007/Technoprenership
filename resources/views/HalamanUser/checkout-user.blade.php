    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

        <!-- title -->
        <title>Check Out</title>

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

        <style>
        .payment-label {
    display: flex;
    align-items: center;
    gap: 15px;       /* kasih jarak antar elemen */
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
                                    <li><a href="{{ route('shop-user') }}">Shop</a>
                                    <ul class="sub-menu">
                                            <li><a href="{{ route('pesanan-user') }}">Pesanan</a></li>
                                        </ul>
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
                            <p>Tunggu Apalagi</p>
                            <h1>Lakukan Pembayaran</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->

        <!-- check out section -->
        <!-- checkout section -->
        <div class="checkout-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">

                                <!-- Metode Pembayaran -->
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
                                                        <img src="assets/img/logo-dana.png">
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" value="BRI" id="payBri">
                                                    <label class="form-check-label payment-label" for="payBri">
                                                        <img src="assets/img/logo-bri.png">
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment" value="QRIS" id="payQris">
                                                    <label class="form-check-label payment-label" for="payQris">
                                                        <img src="assets/img/logo-qris.png">
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data Pembeli -->
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

                            </div><!-- end accordion -->
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="order-details-wrap">
                            <table class="order-details">
                                <thead>
                                    <tr>
                                        <th>Your order Details</th>
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
        <!-- end check out section -->

        <!-- footer -->
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
                                <li>📍 [Alamat Stand atau Lokasi Bisnis] Politeknik Negeri Tanah Laut</li>
                                <li>📧 Email: gancikuy@gmail.com</li>
                                <li>📱 WhatsApp: 085887693441</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box pages">
                            <h2 class="widget-title">Pages</h2>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Shop</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-box subscribe">
                            <h2 class="widget-title">Support</h2>
                            <p>Kalau Anda Suka Support kami ya</p>
                            <form action="index.html">
                                <input type="email" placeholder="Email">
                                <button type="submit"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end footer -->
        
        <!-- copyright -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <p>Copyrights &copy; 2025 - <a href="https://imransdesign.com/">GanciKuy</a>,  All Rights Reserved.<br>
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
        <!-- end copyright -->
        
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
        <!-- sticker js -->
        <script src="assets/js/sticker.js"></script>
        <!-- main js -->
        <script src="assets/js/main.js"></script>

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
        let info = document.getElementById("paymentInfo");
        let details = document.getElementById("paymentDetails");
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