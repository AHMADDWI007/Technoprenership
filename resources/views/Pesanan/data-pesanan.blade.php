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
                {{-- <div class="card-header">
                    <h3 class="card-title">Daftar Pesanan</h3>
                </div> --}}

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
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                       @foreach ($pesanan as $psn)
                                @foreach ($psn->detail as $index => $detailPesanan)
                                    <tr>
                                        @if ($index == 0)
                                            <td rowspan="{{ $psn->detail->count() }}">{{ $no++ }}</td>
                                            <td rowspan="{{ $psn->detail->count() }}" style="text-align: left;">{{ $psn->nama_pembeli }}</td>
                                        @endif

                                        <td style="text-align: left;">{{ $detailPesanan->barang->nama_produk }}</td>
                                        <td>{{ $detailPesanan->jumlah }}</td>
                                        <td>{{ $detailPesanan->deskripsi_request ?? '-' }}</td>
                                        <td>
                                            @if($detailPesanan->foto_request)
                                                <a href="{{ asset('uploads/'.$detailPesanan->foto_request) }}" target="_blank">
                                                    <img src="{{ asset('uploads/'.$detailPesanan->foto_request) }}" class="thumbnail-img">
                                                </a>
                                            @else
                                                -
                                            @endif
                                        </td>

                                        @if ($index == 0)
                                            <td rowspan="{{ $psn->detail->count() }}">Rp {{ number_format($psn->total_harga, 0, ',', '.') }}</td>
                                            <td rowspan="{{ $psn->detail->count() }}">{{ $psn->created_at->format('d M Y, H:i') }}</td>
                                            <td rowspan="{{ $psn->detail->count() }}">
                                                <select onchange="updateStatusPesanan({{ $psn->id }}, this.value)">
                                                    <option value="menunggu" {{ $psn->status == 'menunggu' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                                                    <option value="selesai" {{ $psn->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                                    {{-- Jika Anda menambahkan 'diproses' di migrasi, tambahkan baris ini: --}}
                                                    {{-- <option value="diproses" {{ $psn->status == 'diproses' ? 'selected' : '' }}>Sedang Diproses</option> --}}
                                                </select>
                                            </td>
                                            <td rowspan="{{ $psn->detail->count() }}">
                                                <form action="{{ route('pesanan-destroy', $psn->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pesanan">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
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
    function updateStatusPesanan(pesananId, status) {
        axios.post(`/pesanan/update-status/${pesananId}`, {
            status: status,
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
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Status gagal diperbarui'
            });
        });
    }
</script>

</body>
</html>
