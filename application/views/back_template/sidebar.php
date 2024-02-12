    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-bsn sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
            <div class="sidebar-brand-img mx-3">
                <img src="<?= base_url() ?>assets/back_template/img/BSN_logo master_PNG.png" alt="" class="img-brand">
                <img src="<?= base_url() ?>assets/back_template/img/BSN_logo_brand.png" alt="" class="img-toggled">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li <?php if ($this->uri->segment(1) == "dashboard") {
                echo 'class="nav-item active"';
            } else {
                echo 'class="nav-item"';
            } ?>>
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <?php if ($this->session->role_id == 4 || $this->session->role_id == 5) : ?>
            <!-- Nav Item - List laporan Menu -->
            <li <?php if ($this->uri->segment(1) == "listlaporan") {
                    echo 'class="nav-item active"';
                } else {
                    echo 'class="nav-item"';
                } ?> ?>
                <a class="nav-link" href="<?= base_url('listlaporan') ?>">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>List Laporan</span></a>
            </li>
        <?php endif; ?>

        <?php if ($this->session->role_id == 2 || $this->session->role_id == 3) : ?>
            <!-- Nav Item - Task Management Menu -->
            <li <?php if ($this->uri->segment(1) == "taskmanagement") {
                    echo 'class="nav-item active"';
                } else {
                    echo 'class="nav-item"';
                } ?>>
                <a class="nav-link" href="<?= base_url('taskmanagement') ?>">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Task Management</span></a>
            </li>
        <?php endif; ?>

        <!-- Nav Item - Reporting Menu
        <li <?php if ($this->uri->segment(1) == "reporting") {
                echo 'class="nav-item active"';
            } else {
                echo 'class="nav-item"';
            } ?>>
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Reporting</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('reporting/laporansmlit') ?>">Report Dokumen SMLIT</a>
                    <a class="collapse-item" href="<?= base_url('reporting/laporantiappersonil') ?>">Report Tiap Personil</a>
                </div>
            </div>
        </li> -->

        <!-- Nav Item - Tambah Faq Menu -->
        <li <?php if ($this->uri->segment(1) == "listfaq") {
                echo 'class="nav-item active"';
            } else {
                echo 'class="nav-item"';
            } ?>>
            <a class="nav-link" href="<?= base_url('listfaq') ?>">
                <i class="fas fa-fw fa-question"></i>
                <span>Tambah FAQ</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout') ?>">
                <i class="fas fa-sign-out-alt fa-fw"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->