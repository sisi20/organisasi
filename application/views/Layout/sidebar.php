 <!-- partial:./partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
   <ul class="nav">
     <li class="nav-item sidebar-category">
       <p>Home</p>
       <span></span>
     </li>
     <li class="nav-item">
       <a href="<?php echo site_url('home/dashboard') ?>" class="nav-link">
         <i class="mdi mdi-view-quilt menu-icon"></i>
         <span class="menu-title">Dashboard</span>
       </a>
     </li>

     <li class="nav-item sidebar-category">
       <p>Components</p>
       <span></span>
     </li>

     <li class="nav-item">
       <a href="<?php echo site_url('home/user') ?>" class="nav-link">
         <i class="mdi mdi-account menu-icon"></i>
         <span class="menu-title">User</span>
       </a>
     </li>
     <li class="nav-item">
       <a href="<?php echo site_url('home/informasi') ?>" class="nav-link">
         <i class="mdi mdi-account-search menu-icon"></i>
         <span class="menu-title">Informasi</span>
       </a>
     </li>
     <li class="nav-item">
       <a href="<?php echo site_url('home/pengawas') ?>" class="nav-link">
         <i class="mdi mdi-certificate menu-icon"></i>
         <span class="menu-title">Data Pengawas</span>
       </a>
     </li>
     <li class="nav-item sidebar-category">
       <p>Pages</p>
       <span></span>
     </li>
     <li class="nav-item">
       <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
         <i class="mdi mdi-account-card-details menu-icon"></i>
         <span class="menu-title">Program Studi</span>
         <i class="menu-arrow"></i>
       </a>
       <div class="collapse" id="ui-basic">
         <ul class="nav flex-column sub-menu">
           <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('home/aktivitas_hima') ?>">Aktivitas</a></li>
           <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('home/pengurus_hima') ?>">Anggota</a></li>
         </ul>
       </div>
     </li>

     <li class="nav-item">
       <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
         <i class="mdi mdi-bookmark-plus menu-icon"></i>
         <span class="menu-title">UKM</span>
         <i class="menu-arrow"></i>
       </a>
       <div class="collapse" id="auth">
         <ul class="nav flex-column sub-menu">
           <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('home/aktivitas_ukm') ?>">Aktivitas</a></li>
           <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('home/pengurus_ukm') ?>">Anggota</a></li>
         </ul>
       </div>
     </li>
     <li class="nav-item sidebar-category">
       <p>Apps</p>
       <span></span>
     </li>
     <li class="nav-item">
       <a class="nav-link" data-toggle="collapse" href="#doc" aria-expanded="false" aria-controls="doc">
         <i class="mdi mdi-file-document-box-outline menu-icon"></i>
         <span class="menu-title">Dokumen</span>
         <i class="menu-arrow"></i>
       </a>
       <div class="collapse" id="doc">
         <ul class="nav flex-column sub-menu">
           <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('home/lpj') ?>">LPJ</a></li>
           <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('home/proposal') ?>">Proposal</a></li>
         </ul>
       </div>
     </li>
   </ul>
 </nav>
 <!-- partial -->