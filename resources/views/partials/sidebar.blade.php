<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('kategori.index') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Kategori</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('produk.index') }}">
                <i class="ti-bag menu-icon"></i>
                <span class="menu-title">Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('pesanan.index') }}">
                <i class="ti-shopping-cart menu-icon"></i>
                <span class="menu-title">Pesanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="ti-files menu-icon"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('laporan.index') }}">Laporan Pesanan</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="ti-settings menu-icon"></i>
                <span class="menu-title">Pengaturan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" > Data Pelanggan </a></li>
                    <li class="nav-item"> <a class="nav-link" > Pengaturan Akun </a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>
