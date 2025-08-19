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

        <section class="content">
            <div class="container-fluid">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Produk</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('barang-update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $barang->nama_produk) }}">
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" value="{{ old('harga', $barang->harga) }}">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" rows="3" class="form-control">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id }}" 
                                            {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                                            {{ $k->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="stok" class="form-control" value="{{ old('stok', $barang->stok) }}">
                            </div>

                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" name="gambar" class="form-control-file">
                                @if($barang->gambar)
                                    <p>Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $barang->gambar) }}" width="100">
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ url('data-barang') }}" class="btn btn-secondary">Kembali</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
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
