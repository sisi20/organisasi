<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Home</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('home/si') ?>" class="nav-link">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Sistem Informasi</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('si/aktivitas/' . $_SESSION['user']->id_user) ?>" class="nav-link">
                <i class="mdi mdi-book-multiple menu-icon"></i>
                <span class="menu-title">Aktivitas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo site_url('si/pengurus/' . $_SESSION['user']->id_user) ?>" class="nav-link">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Pengurus</span>
            </a>
        </li>
        <li class="nav-item sidebar-category">
            <p>Page</p>
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
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('si/lpj/' . $_SESSION['user']->id_user) ?>">LPJ</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('si/proposal/' . $_SESSION['user']->id_user) ?>">Proposal</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->

<div class="container-fluid page-body-wrapper">
    <!-- partial:./partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo base_url() ?>assets/images/logo1.png" width="180" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
            </div>
            <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome back, <?php echo $_SESSION['user']->username ?></h4>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <h4 class="mb-0 font-weight-bold d-none d-xl-block"><?php
                                                              $tgl = date('l, d-m-Y');
                                                              echo $tgl;
                                                              ?></h4>
                </li>
                <li class="nav-item dropdown mr-1">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-calendar mx-0"></i>
                        <span class="count bg-info">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-2">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-email-open mx-0"></i>
                        <span class="count bg-danger">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-information mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-account-box mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
            <ul class="navbar-nav mr-lg-2">
                <!-- <li class="nav-item nav-search d-none d-lg-block">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
                    </div>
                </li> -->
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="<?php echo base_url(); ?>assets/profil/<?php echo $_SESSION['user']->foto ?>" alt="profile" />
                        <span class="nav-profile-name"><?php echo $_SESSION['user']->username ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="<?php echo site_url('home/profil/' . $_SESSION['user']->id_user) ?>">
                            <i class="mdi mdi-settings text-primary"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>">
                            <i class="mdi mdi-logout text-primary"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->

    <div class="main-panel">
        <div class="content-wrapper">


            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data User</h4>

                            <?php
                            foreach ($hima as $key => $value) {
                            ?>
                                <input type="hidden" name="id_user">

                                <div class="form-group">
                                    <label for="exampleInputName1">Program Studi</label>
                                    <input class="form-control" value="<?php echo $value->prodi; ?>" id="exampleInputName1" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Tahun Berdiri</label>
                                    <input class="form-control" value="<?php echo $value->tahun_berdiri; ?>" id="exampleInputName1" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Akreditas</label>
                                    <input class="form-control" value="<?php echo $value->akriditas; ?>" disabled>
                                </div>
                                <?php } ?>
                                <a href="<?php echo site_url('si/edit_hima/' .$_SESSION['user']->id_user) ?>">
                                    <button class="btn btn-primary mr-2">Edit</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-light">Cancel</button>
                                </a>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>