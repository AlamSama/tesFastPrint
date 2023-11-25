<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Restu ALam</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Dashboard</a>
            <div class="nav-item">
                <a href="{{ route('produk') }}" class="nav-link {{ Request::segment(1) === 'produk' || Request::segment(1) === 'arsipProduk' ? 'active' : '' }}"><i class="fas fa-box me-2"></i>Produk</a>
            </div>
            <div class="nav-item">
                <a href="{{ route('kategori') }}" class="nav-link {{ Request::segment(1) === 'kategori' || Request::segment(1) === 'arsipKategori'  ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Kategori Produk</a>
            </div>
            <div class="nav-item">
                <a href="{{ route('status') }}" class="nav-link {{ Request::segment(1) === 'status' ||  Request::segment(1) === 'arsipStatus' ? 'active' : '' }}"><i class="fas fa-filter me-2"></i>Status</a>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->