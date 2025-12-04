<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #8B0000;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <span class="logo-lg"> <img src="<?= base_url('img/umc.png') ?>" width="30px" height="30px"></span>
        </div>
        <div class="sidebar-brand-text mx-2 text-lg">SISPASI UMC</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li
    class="nav-item <?= service('request')->uri->getPath() == 'admin' || service('request')->uri->getPath() == '/admin/' ? 'active' : '' ?>">
    <a href="<?= base_url('/admin') ?>" class="nav-link">
        <i class="fas fa-home"></i>
        <span class="mx-1">Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<div class="sidebar-heading">
    Data Akun
</div>

<li class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_admin') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
    <a href="<?= base_url('admin/master_admin') ?>" class="nav-link">
        <i class="fas fa-user-lock"></i>
        <span class="mx-2">Data Admin</span>
    </a>
</li>

<li class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_user') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
    <a href="<?= base_url('admin/master_user') ?>" class="nav-link">
        <i class="fas fa-user-graduate"></i>
        <span class="mx-2">Data Mahasiswa</span>
    </a>
</li>

<li class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_otp') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?> <?= strpos(service('request')->uri->getPath(), 'admin/master_token') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
    aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span class="mx-2">Verifikasi</span>
</a>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Verifikasi:</h6>
        <a class="collapse-item <?= strpos(service('request')->uri->getPath(), 'admin/master_google') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>" href="<?= base_url('admin/master_google') ?>">Data Google</a>
        <a class="collapse-item <?= strpos(service('request')->uri->getPath(), 'admin/master_otp') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>" href="<?= base_url('admin/master_otp') ?>">Data OTP</a>
        <a class="collapse-item <?= strpos(service('request')->uri->getPath(), 'admin/master_token') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>" href="<?= base_url('admin/master_token') ?>">Data Token Reset</a>
    </div>
</div>
</li>

<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Data Master
</div>

<!-- Nav Item - Tables -->
<li
class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_gejala') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
<a href="<?= base_url('admin/master_gejala') ?>" class="nav-link">
    <i class="fas fa-notes-medical"></i>
    <span class="mx-2">Data Gejala</span>
</a>
</li>

<li
class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_penyakit') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
<a href="<?= base_url('admin/master_penyakit') ?>" class="nav-link">
    <i class="fas fa-briefcase-medical"></i>
    <span class="mx-1">Data Penyakit</span>
</a>
</li>

<li
class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_aturan') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
<a href="<?= base_url('admin/master_aturan') ?>" class="nav-link">
    <i class="fas fa-book-medical"></i>
    <span class="mx-2">Data Aturan</span>
</a>
</li>

<li
class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_faq') !== false || service('request')->uri->getSegment(2) == 'new' || service('request')->uri->getSegment(2) == 'edit' ? 'active' : '' ?>">
<a href="<?= base_url('admin/master_faq') ?>" class="nav-link">
    <i class="fas fa-question"></i>
    <span class="mx-2">Data Faq</span>
</a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Diagnosis
</div>

<li class="nav-item">
    <a class="nav-link" href="<?= base_url('mahasiswa/cek_diagnosa') ?>">
        <i class="fas fa-hand-holding-medical"></i>
        <span class="mx-1">Expert System</span></a>
    </li>

    <li
    class="nav-item <?= strpos(service('request')->uri->getPath(), 'admin/master_laporan') !== false || service('request')->uri->getSegment(2) == 'view' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('admin/master_laporan') ?>">
        <i class="fas fa-chart-bar"></i>
        <span class="mx-2">Laporan Diagnosa</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>