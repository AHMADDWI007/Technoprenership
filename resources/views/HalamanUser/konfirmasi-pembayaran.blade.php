<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/gancilogo.png">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background: #f8f9fa; /* putih lembut */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2d3436;
            min-height: 100vh;
            animation: fadeIn 1s ease-in-out;
        }

        .card {
            border-radius: 20px;
            border: none;
            background: #ffffff;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.15);
        }

        .header-title {
            font-weight: 700;
            font-size: 2rem;
            color: #F28123;
            text-shadow: 0 0 6px rgba(0,0,0,0.1);
            animation: pulseText 2s infinite;
        }

        .sub-title {
            color: #6c757d;
            font-size: 1rem;
        }

        .list-group-item {
            border: none;
            padding: 12px 15px;
            font-size: 1rem;
            background: transparent;
            color: #333;
        }

        .badge {
            font-size: 0.9rem;
            padding: 6px 10px;
            background: #F28123; /* warna metode */
            border-radius: 8px;
            color: #fff;
        }

        .payment-info {
            font-size: 1rem;
            background: #fdfdfd;
            border: 1px solid #dee2e6;
            padding: 18px;
            border-radius: 15px;
            box-shadow: 0 0 12px rgba(0,0,0,0.05);
            animation: fadeInUp 1s ease;
        }

        .qris-img {
            max-width: 280px;
            margin-top: 10px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .qris-img:hover {
            transform: scale(1.05);
        }

        .btn-copy {
            font-size: 0.9rem;
            margin-left: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .btn-copy:hover {
            background: #F28123;
            color: #fff;
        }

        .alert {
            border-radius: 12px;
        }

        .btn-success {
            padding: 12px 25px;
            font-size: 1.05rem;
            font-weight: 600;
            border-radius: 12px;
            background: #2d3436; /* default abu */
            border: none;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
        }
        .btn-success:hover {
            background: #F28123; /* warna saat hover */
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(242,129,35,0.4);
        }

        /* Animations */
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        @keyframes fadeInUp {
            from {opacity: 0; transform: translateY(40px);}
            to {opacity: 1; transform: translateY(0);}
        }
        @keyframes pulseText {
            0%, 100% { text-shadow: 0 0 6px rgba(0,0,0,0.1); }
            50% { text-shadow: 0 0 12px rgba(0,0,0,0.2); }
        }
    </style>
</head>
<body class="container py-5">

    <div class="text-center mb-4">
        <h2 class="header-title">Konfirmasi Pembayaran</h2>
        <p class="sub-title">Silakan lakukan pembayaran sesuai dengan metode yang dipilih</p>
    </div>

    <div class="card p-4">
        <h5 class="mb-3 text-secondary">Detail Pembeli</h5>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Nama:</strong> {{ request('name') }}</li>
            <li class="list-group-item"><strong>No HP:</strong> {{ request('phone') }}</li>
            <li class="list-group-item">
                <strong>Metode:</strong> 
                <span class="badge">{{ request('payment') }}</span>
            </li>
        </ul>

        <h5 class="mb-3 text-secondary">Informasi Pembayaran</h5>

        @if(request('payment') == 'Dana')
            <div class="payment-info d-flex align-items-center justify-content-between">
                <div><strong>Nomor Dana:</strong> 085822734981</div>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-copy" 
                        onclick="copyText('085822734981')">Salin</button>
            </div>

        @elseif(request('payment') == 'BRI')
            <div class="payment-info d-flex align-items-center justify-content-between">
                <div><strong>No Rekening BRI:</strong> 1234-01-000987-56-7</div>
                <button type="button" class="btn btn-sm btn-outline-secondary btn-copy" 
                        onclick="copyText('1234-01-000987-56-7')">Salin</button>
            </div>

        @elseif(request('payment') == 'QRIS')
            <div class="payment-info text-center">
                <p><strong>Scan QRIS untuk pembayaran:</strong></p>
                <img src="{{ asset('assets/img/qris-barcode.png') }}" alt="QRIS Barcode" 
                    class="qris-img img-fluid">
            </div>
        @endif

        <div class="alert alert-warning mt-4" role="alert">
            ⚠️ Simpan bukti transaksi Anda untuk verifikasi ke admin setelah pembayaran.
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('beranda-user') }}" class="btn btn-success">Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        function copyText(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert("✅ Nomor berhasil disalin: " + text);
            }).catch(err => {
                alert("❌ Gagal menyalin. Error: " + err);
            });
        }
    </script>

</body>
</html>
