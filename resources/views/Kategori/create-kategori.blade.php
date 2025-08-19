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
        <div class="content">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Kategori</h3>
                    </div>
                    <div class="card-body">
                        <!-- Form Tambah Data Kategori -->
                        <form action="{{ route('simpan-kategori') }}" method="POST">
                            {{ csrf_field() }}

                            <!-- Input Nama Kategori -->
                            <div class="form-group">
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Kategori" required>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan Kategori</button>
                            </div>
                        </form>
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

</body>
</html>
