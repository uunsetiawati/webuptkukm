

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?=base_url('adminaset/assets/images/logos/dark-logo.svg')?>" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/dashboard')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">dashboard</span>
              </a>
            </li> 
            <?php $role = session()->get('role'); ?>
            <?php if (in_array($role, ['admin', 'superadmin'])): ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/posting/data')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Post</span>
              </a>
            </li> 
            <?php endif;?> 
            <?php if (in_array($role, ['superadmin'])): ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/slider')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Slider</span>
              </a>
            </li>  
            <?php endif;?>   
            <?php if (in_array($role, ['superadmin'])): ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/pengumuman')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pengumuman</span>
              </a>
            </li>  
            <?php endif;?>  
            <?php $segment4=1;if (in_array($role, ['superadmin'])): ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/pengaturan/edit/'.$segment4)?>" aria-expanded="false">
                <span>
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Pengaturan</span>
              </a>
            </li> 
            <?php endif;?>  
            <?php if (in_array($role, ['superadmin'])): ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/pejabat')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Pejabat</span>
              </a>
            </li> 
            <?php endif;?>  
            <?php if (in_array($role, ['superadmin'])): ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?=site_url('admin/pengaduan')?>" aria-expanded="false">
                <span>
                  <i class="ti ti-tag"></i>
                </span>
                <span class="hide-menu">Pengaduan</span>
              </a>
            </li> 
            <?php endif;?>       
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">              
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <!-- <i class="ti ti-user fs-6"></i> -->
                   <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">                    
                    <a href="<?=site_url('admin/logout')?>" class="btn btn-outline-primary mx-3 mt-2 d-block"><i class="fa-solid fa-right-from-bracket"></i>  Logout </a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->