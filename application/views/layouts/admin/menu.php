 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Divider -->
     <hr class="sidebar-divider my-0">
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fas fa-laugh-wink"></i>
             </div>
             <div class="sidebar-brand-text mx-3">ADMIN</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>admin/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard </span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>admin/datasiswa">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Siswa</span></a>
          </li>  

            <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>admin/dataguru">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Guru</span></a>
          </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Prediksi</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- <h6 class="collapse-header">Prediksi:</h6> -->
                    <a class="collapse-item" href="<?= base_url("admin/hasil") ?>">Prediksi</a>
                    <a class="collapse-item" href="kriteria">Kriteria</a>
                    <a class="collapse-item" href="datatrining">Data Trining</a>
                    <a class="collapse-item" href="datatesting">Data Testing</a>
                    <a class="collapse-item" href="uji_akurasi">Uji Akurasi</a>
                </div>
            </div>
        </li>
         <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>admin/laporan">
            <i class="fas fa-fw fa-list alt"></i>
            <span>Laporan</span></a>
          </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url() ?>admin/dataadmin">
            <i class="fas fa-fw fa-glyphicon fa-user"></i>
            <span>User</span></a>
          </li>   

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         <!-- Nav Item - Laporan -->
         <li class="nav-item active">
             <a class="nav-link collapsed" href="<?= base_url("admin/dataadmin") ?>" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="fas fa-fw fa-glyphicon fa-user"></i>
                 <span>User</span>
             </a>
         </li>
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
     </ul>
 </ul>
 <!-- End of Sidebar -->