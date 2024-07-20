<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
            <img src="<?= base_url('public/gambar'); ?>/logo/btm1.png" alt="" width="50">
        <div class="sidebar-brand-text mx-3"><img src="<?= base_url('public/gambar'); ?>/logo/btm2.png" alt="" width="100"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= (uri_string() == '') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url(''); ?>">
            <i class="fa fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu Utama
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= (uri_string() == 'wisata') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="<?= base_url('/wisata'); ?>">
            <i class="fas fa-umbrella-beach"></i>
            <span>Wisata</span>
        </a>
    </li>

    <li class="nav-item <?= (uri_string() == 'penginapan') ? 'active' : '' ?>">
        <a class="nav-link collapsed" href="<?= base_url('/penginapan'); ?>">
            <i class="fas fa-bed"></i>
            <span>Penginapan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Lanjutan
    </div>

    <li class="nav-item <?= (uri_string() == 'admin') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/admin'); ?>">
            <row>
                <i class="fas fa-cogs"></i>
                <span>Daftar Admin</span>
            </row>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->