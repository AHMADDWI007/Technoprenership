<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.head')
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
                        <h1 class="m-0">Edit Produk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

       <div class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kategori</h3>
                    </div>
                    <div class="card-body">
                        <!-- Form Edit Data Kategori -->
                        <form action="{{ route('update-kategori', $kategori->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input Nama Kategori -->
                            <div class="form-group">
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori" value="{{ old('nama', $kategori->nama) }}" required>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
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
</body>
</html>
