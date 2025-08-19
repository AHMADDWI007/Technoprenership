<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.head')
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
                        <h1 class="m-0">Dashboard</h1>
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
                        <h3 class="card-title">Tambah Produk</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" placeholder="Masukkan nama produk">
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Masukkan harga produk">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="form-control" placeholder="Masukkan deskripsi produk"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" placeholder="Masukkan jumlah stok">
                            </div>

                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" name="gambar" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('data-barang') }}" class="btn btn-secondary">Kembali</a>
                            </div>

                        </form>
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

</body>
</html>
