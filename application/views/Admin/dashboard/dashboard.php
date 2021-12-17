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

        <div class="col-12 col-xl-6 grid-margin stretch-card">
          <div class="row w-100 flex-grow">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Website Audience Metrics</p>
                  <p class="text-muted">25% more traffic than previous week</p>
                  <div class="row mb-3">
                    <div class="col-md-7">
                      <div class="d-flex justify-content-between traffic-status">
                        <div class="item">
                          <p class="mb-">UKM</p>
                          <h5 class="font-weight-bold mb-0"> <?php echo $ukm; ?></h5>
                          <div class="color-border"></div>
                        </div>
                        <div class="item">
                          <p class="mb-">Hima</p>
                          <h5 class="font-weight-bold mb-0"><?php echo $hima; ?></h5>
                          <div class="color-border"></div>
                        </div>
                        <div class="item">
                          <p class="mb-">Page Views</p>
                          <h5 class="font-weight-bold mb-0">78,254</h5>
                          <div class="color-border"></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <ul class="nav nav-pills nav-pills-custom justify-content-md-end" id="pills-tab-custom" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-h  ome-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                            Day
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                            Week
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                            Month
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <canvas id="audience-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-6 grid-margin stretch-card">
          <div class="row w-100 flex-grow">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Regional Load</p>
                  <p class="text-muted">Last update: 2 Hours ago</p>
                  <div class="regional-chart-legend d-flex align-items-center flex-wrap mb-1" id="regional-chart-legend"></div>
                  <canvas height="280" id="regional-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- row end -->
      <!-- row end -->
    </div>