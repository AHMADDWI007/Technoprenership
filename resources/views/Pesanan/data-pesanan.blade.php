<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
            padding: 12px;
        }
        .btn {
            margin: 0 2px;
            font-size: 14px;
        }
        .pagination {
            justify-content: center;
        }
        .thumbnail-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('Template.navbar')
    @include('Template.sidebar')

    <div class="content-wrapper">
        
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pesanan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Catatan</th>
                            <th>Foto Request</th>
                            <th>Total Harga</th>
                            <th>Tanggal/Jam</th>
                            <th>Status</th>
                            {{-- KOLOM AKSI DIHAPUS KARENA HANYA TINGGAL FUNGSI UPDATE STATUS --}}
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pesanan as $psn)
                                @foreach ($psn->detail as $index => $detailPesanan)
                                    <tr>
                                        @if ($index == 0)
                                            <td rowspan="{{ $psn->detail->count() }}">{{ $no++ }}</td>
                                            <td rowspan="{{ $psn->detail->count() }}" style="text-align: left;">
                                                {{ $psn->nama_pembeli }}
                                                {{-- Jika Anda menambahkan nomor HP dan Metode Bayar di Controller, tampilkan di sini --}}
                                                @if(isset($psn->nomor_hp))<br><small>HP: {{ $psn->nomor_hp }}</small>@endif
                                                @if(isset($psn->metode_bayar))<br><small>Bayar: {{ $psn->metode_bayar }}</small>@endif
                                            </td>
                                        @endif

                                        <td style="text-align: left;">{{ $detailPesanan->barang->nama_produk }}</td>
                                        <td>{{ $detailPesanan->jumlah }}</td>
                                        <td>{{ $detailPesanan->deskripsi_request ?? '-' }}</td>
                                        <td>
                                            @if($detailPesanan->foto_request)
                                                {{-- Asumsi foto_request di detail pesanan adalah path tunggal atau string JSON --}}
                                                @php
                                                    $imagePaths = is_string($detailPesanan->foto_request) && (str_starts_with($detailPesanan->foto_request, '[') || str_starts_with($detailPesanan->foto_request, '"')) ? json_decode($detailPesanan->foto_request) : [$detailPesanan->foto_request];
                                                    $firstImagePath = is_array($imagePaths) && !empty($imagePaths) ? $imagePaths[0] : $detailPesanan->foto_request;
                                                @endphp
                                                
                                                @if($firstImagePath)
                                                    <a href="{{ asset('storage/' . $firstImagePath) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $firstImagePath) }}" class="thumbnail-img" alt="Foto Request">
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            @else
                                                -
                                            @endif
                                        </td>

                                        @if ($index == 0)
                                            <td rowspan="{{ $psn->detail->count() }}">Rp {{ number_format($psn->total_harga, 0, ',', '.') }}</td>
                                            <td rowspan="{{ $psn->detail->count() }}">{{ $psn->created_at->format('d M Y, H:i') }}</td>
                                            <td rowspan="{{ $psn->detail->count() }}">
                                                <select onchange="updateStatusPesanan({{ $psn->id }}, this.value)" class="form-control form-control-sm">
                                                    <option value="menunggu" {{ $psn->status == 'menunggu' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                                    <option value="selesai" {{ $psn->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                    {{-- Tambahkan status 'diproses' jika ada di migrasi/Model --}}
                                                </select>
                                            </td>
                                            {{-- Kolom Aksi (Hapus) Dihapus untuk menghindari error route --}}
                                        @endif
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <footer class="main-footer">
        @include('Template.footer')
    </footer>

</div>

@include('Template.script')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // PERBAIKAN: Menggunakan method PUT dan route yang benar
    function updateStatusPesanan(pesananId, status) {
        // Asumsi route yang benar di Controller adalah PUT /pesanan/{id}/status
        const url = `/pesanan/${pesananId}/status`;
        
        axios.put(url, {
            status: status,
            // Jika Anda menggunakan method PUT/PATCH via POST, gunakan _method
            // _method: 'PUT', // Jika server tidak mengenali PUT/PATCH
            _token: "{{ csrf_token() }}"
        })
        .then(response => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: response.data.message,
                timer: 1500,
                showConfirmButton: false
            });
        })
        .catch(error => {
            console.error('AJAX Error:', error.response ? error.response.data : error);
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Status gagal diperbarui. Cek konsol untuk detail error.'
            });
        });
    }
</script>

</body>
</html>