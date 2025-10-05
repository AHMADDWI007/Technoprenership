<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran</title>
    {{-- Aset dan Style --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/gancilogo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <style>
        /* ... (Gaya CSS Anda) ... */
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #2d3436;
            min-height: 100vh;
        }
        .card { border-radius: 20px; border: none; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .badge { background: #F28123; color: #fff; }
        .btn-process {
            padding: 12px 25px;
            font-size: 1.05rem;
            font-weight: 600;
            border-radius: 12px;
            background: #F28123;
            border: none;
            color: #fff;
        }
    </style>
</head>
<body class="container py-5">

    <div class="text-center mb-4">
        <h2 class="header-title">Konfirmasi Pembayaran</h2>
    </div>
    
    {{-- ⭐ KONDISI UTAMA: TAMPILAN SETELAH SUBMIT KE DB ⭐ --}}
    @if(session('success'))
        <div class="alert alert-success text-center mb-4">
            {{ session('success') }}
            @if(session('pesanan_id'))
                <p class="mt-2 mb-0">Nomor Pesanan Anda: <strong>#{{ session('pesanan_id') }}</strong></p>
            @endif
            <div class="text-center mt-4">
                 {{-- Tombol Kembali setelah sukses --}}
                <a href="{{ route('beranda-user') }}" class="btn btn-success">Kembali ke Beranda</a>
            </div>
        </div>
    @else
        {{-- ⭐ TAMPILAN REVIEW SEBELUM SUBMIT KE DB (Mengambil dari Query String) ⭐ --}}
        <p class="sub-title text-center">Detail pesanan dan pembayaran Anda</p>
        
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
                    <button type="button" class="btn btn-sm btn-outline-secondary btn-copy" onclick="copyText('085822734981')">Salin</button>
                </div>
            @elseif(request('payment') == 'BRI')
                <div class="payment-info d-flex align-items-center justify-content-between">
                    <div><strong>No Rekening BRI:</strong> 1234-01-000987-56-7</div>
                    <button type="button" class="btn btn-sm btn-outline-secondary btn-copy" onclick="copyText('1234-01-000987-56-7')">Salin</button>
                </div>
            @elseif(request('payment') == 'QRIS')
                <div class="payment-info text-center">
                    <p><strong>Scan QRIS untuk pembayaran:</strong></p>
                    <img src="{{ asset('assets/img/qris-barcode.png') }}" alt="QRIS Barcode" class="qris-img img-fluid">
                </div>
            @endif

            <div class="alert alert-warning mt-4" role="alert">
                ⚠️ Pastikan Anda sudah *checkout* di halaman sebelumnya. Klik **Buat Pesanan** untuk menyimpan ke sistem.
            </div>

            <div class="text-center mt-4">
                {{-- Form yang akan memicu penyimpanan pesanan ke database --}}
                <form action="{{ route('proses-pesanan-baru') }}" method="POST">
                    @csrf
                    {{-- Mengirim data pembeli dan metode bayar via form tersembunyi --}}
                    <input type="hidden" name="name" value="{{ request('name') }}">
                    <input type="hidden" name="phone" value="{{ request('phone') }}">
                    <input type="hidden" name="payment" value="{{ request('payment') }}">
                    
                    <button type="submit" class="btn btn-process">
                        Buat Pesanan
                    </button>
                </form>
            </div>
        </div>
    @endif

    <script>
        function copyText(text) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert("✅ Nomor berhasil disalin: " + text);
        }
    </script>
</body>
</html>