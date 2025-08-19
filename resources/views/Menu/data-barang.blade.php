<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.head')
    <style>
        .menu-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: space-between;
        }
        .menu-item {
            flex: 0 0 24%;
            box-sizing: border-box;
            text-align: center;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: transform 0.2s;
            background-color: #f9f9f9;
        }
        .menu-item:hover {
            transform: scale(1.05);
        }
        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .menu-item .name {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .menu-item .price {
            color: #28a745;
            font-size: 1em;
            margin-bottom: 5px;
        }
        .menu-item .description {
            font-style: italic;
            margin-bottom: 5px;
            text-align: justify;
            padding: 0 5px;
        }
        .menu-item .category {
            font-size: 0.8em;
            color: #6c757d;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include('Template.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('Template.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card card-info card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('barang-create') }}" class="btn btn-success">
                                Tambah Produk <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="menu-grid">
                            @forelse($barang as $item)
                                <div class="menu-item">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}">
                                    <div class="name">{{ $item->nama_produk }}</div>
                                    <div class="price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                                    <div class="description"> {{ $item->deskripsi }}</div>
                                    <div class="category"> {{ $item->kategori->nama ?? '-' }}</div>
                                    <div class="stock">Stok: {{ $item->stok }}</div>
                                    <div class="actions">
                                        <a href="{{ route('barang-edit', $item->id) }}" class="btn btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('barang-destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-button">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <p>Tidak ada produk tersedia.</p>
                            @endforelse
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        @include('Template.footer')
    </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('Template.script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Ingin menghapus menu ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    @if(session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

</body>
</html>
