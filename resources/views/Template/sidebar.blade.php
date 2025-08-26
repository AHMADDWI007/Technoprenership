<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('Gambar/Kedai Kopi.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kedai Rudi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Gambar/Rudi Tabuti.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <!-- Dashboard Section -->
                <li class="nav-header">Dashboard</li>
                <li class="nav-item">
                    <a href="{{ route('beranda') }}"
                        class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Menu Section -->
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="{{ route('data-barang') }}"
                        class="nav-link {{ request()->routeIs('data-barang') || request()->routeIs('barang*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>Data Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('data-pesanan') }}"
                        class="nav-link {{ request()->routeIs('data-pesanan') || request()->routeIs('pesanan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Data Pesanan</p>
                    </a>
                </li>

                <!-- Menu Laporan Section -->
                <li class="nav-header">Menu Laporan</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Data Transaksi</p>
                    </a>
                </li>

                <!-- Master Section -->
                <li class="nav-header">Master</li>
                <li class="nav-item">
                    <a href="{{ route('data-kategori') }}"
                        class="nav-link {{ request()->routeIs('data-kategori') || request()->routeIs('create-kategori') || request()->routeIs('edit-kategori') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item mt-3">
                    <a href="#" class="nav-link bg-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
