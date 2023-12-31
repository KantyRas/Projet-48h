<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kapella Bootstrap Admin Dashboard Template</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/template/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="<?php echo base_url()?>assets/template/images/logo.svg" alt="logo">
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                <form class="pt-3" action="<?php echo base_url('C_inscription/newUser')?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Nom" name="nom">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Prénom" name="prenom">
                  </div>
                  <div class="form-group">
                    <label for=""><h5>Photo</h5></label>
                    <input type="file" class="form-control form-control-lg" name="files[]" multiple>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control form-control-lg"  placeholder="Contact" name="contact">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Adresse" name="adresse">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                  </div>
                  <div class="mb-4">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        I agree to all Terms & Conditions
                      </label>
                    </div>
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
                  </div>
                  <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="<?php echo base_url('C_login/loadLogin')?>" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
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
  <script src="<?php echo base_url()?>assets/template/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo base_url()?>assets/template/js/template.js"></script>
  <!-- endinject -->
</body>

</html>