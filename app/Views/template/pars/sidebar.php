<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('home') ?>">SimRtlh-GIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('home') ?>">R-GIS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="<?= $active == 'dashboard' ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url() ?>"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>
            <li class="<?= $active == 'map' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('gis/map') ?>"><i class="fas fa-map"></i> <span>Data Rtlh</span></a></li>
            <li class="<?= $active == 'master-map' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('gis') ?>"><i class="fas fa-database"></i> <span>Master Data RTLH</span></a></li>
            <li class="<?= $active == 'master-user' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('users') ?>"><i class="fas fa-users"></i> <span>Master Data Pengguna</span></a></li>
        </ul>
    </aside>
</div>