<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo">
                <img src="<?= base_url() ?>assets/virtual/img/logo-mamen-hd.png" alt="Logo Mamen" width="40px;">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-3 text-capitalize">V-Lab</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?= (current_url() == base_url('admin')) ? 'active' : ''; ?>">
            <a href="<?= base_url() ?>admin" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item <?= (current_url() == base_url('admin/period')) ? 'active' : ''; ?>">
            <a href="<?= base_url() ?>admin/period" class="menu-link">
                <i class='menu-icon tf-icons bx bx-calendar'></i>
                <div data-i18n="Analytics">Periode</div>
            </a>
        </li>
        <li class="menu-item <?= (current_url() == base_url('admin/upload')) ? 'active' : ''; ?>">
            <a href="<?= base_url() ?>admin/upload" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-file'></i>
                <div data-i18n="Analytics">Upload Hasil Seleksi</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->

<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->