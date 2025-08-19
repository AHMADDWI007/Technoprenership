<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.head')
    <style>
        /* CSS untuk menambah kenyamanan tampilan */
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
                        <h1 class="m-0">Data Kategori</h1>
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
        <div class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Kategori</h3>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('create-kategori') }}" class="btn btn-success">
                                Tambah Kategori <i class="fas fa-plus-square"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- Formulir Pencarian -->
                        <form method="GET" action="{{ route('data-kategori') }}" class="mb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Kategori" value="{{ request('search') }}">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>

                        <!-- Tabel Kategori -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kategori as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($kategori->currentPage() - 1) * $kategori->perPage() }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <a href="{{ route('edit-kategori', $item->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('delete-kategori', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger delete-button">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak ada data kategori ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        @if ($kategori instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="d-flex justify-content-end mt-3">
                                <div>{{ $kategori->links() }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
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
                    title: 'Apakah Anda Yakin?',
                    text: "Data kategori ini akan dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
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
