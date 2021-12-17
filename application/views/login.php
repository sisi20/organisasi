<div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="text-center">
                <img src="<?php echo base_url()?>assets/assets/img/gallery/logo2.png" width="200" alt="logo">
              </div>
              <div class="pt-3">
              <h4>Hello! Selamat datang</h4>
              <h6 class="font-weight-light">Silahkan login disini.</h6>
              </div>
              <form class="pt-3" method="POST" action="auth/cek_login">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?php echo base_url()?>assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url()?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url()?>assets/js/template.js"></script>
  <!-- endinject -->
</body>

</html>