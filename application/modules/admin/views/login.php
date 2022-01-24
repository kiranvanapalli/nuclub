<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>NUCLUB</title>
  <link rel="apple-touch-icon" href="admin_assets/app-assets/images/ico/apple-icon-120.png" />

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/bootstrap-extended.min.css" />
  <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/components.min.css" />
  <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/vertical-menu-modern.css" />
  <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="admin_assets/assets/line-awesome-1.3.0/1.3.0/css/line-awesome.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>


  <div class="login-bg">
    <div class="content-wrapper">
      <div class="content-body">
        <section class="row flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="admin_assets/app-assets/images/logo/logo-dark.png" alt="branding logo">
                  </div>
                </div>
                <div class="card-content">

                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>OR Using Account
                      Details</span></p>
                  <div class="card-body">
                    <form class="form-horizontal" action="" method="POST">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control" id="admin_email" name="admin_email" placeholder="Admin Email">
                        <div class="form-control-position">
                          <i class="la la-user"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control" id="admin_pass" name="admin_pass" placeholder="Enter Password">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      <div class="form-group row">
                        <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                          <fieldset>
                    <div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" id="remember-me" class="chk-remember" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    <label for="remember-me"> Remember Me</label>
                  </fieldset>
                        </div>
                        <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="<?php echo base_url(); ?>forgetpassword_page" class="card-link">Forgot Password?</a></div>
                      </div>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
  </div>


  <!-- BEGIN: Vendor JS-->
  <script src="admin_assets/app-assets/vendors/js/vendors.min.js"></script>
  <script src="admin_assets/app-assets/js/core/app-menu.min.js"></script>
  <script src="admin_assets/app-assets/js/core/app.min.js"></script>
  <!-- <script src="admin_assets/app-assets/js/scripts/customizer.min.js"></script> -->
  <script src="admin_assets/app-assets/js/scripts/footer.min.js"></script>
  <!-- <script src="admin_assets/app-assets/js/scripts/pages/dashboard-crypto.min.js"></script> -->
  <!--Toster plugins -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!--Toster end plugins -->

  <!--Start toster validation -->
  <?php if($this->session->flashdata('success')) {  ?>
    <script type="text/javascript">
    toastr.success("<?php echo $this->session->flashdata('success'); ?>", "", {
    "closeButton": "true",
    "progressBar": "true",
    "timeOut": "5000",
    "extendedTimeOut": "2000"   
    });
    </script> 
    <?php  } elseif($this->session->flashdata('error')){ ?>
    <script type="text/javascript">
    toastr.error("<?php echo $this->session->flashdata('error'); ?>", "", {
    "closeButton": "true",
    "progressBar": "true"
    });
    </script> 
    <?php } ?>

    <?php 
    $err = validation_errors();
    $err_msg   = str_replace(array("\r","\n"), '\n', $err);
    if(isset($err_msg) &&  $err_msg != ""){?>
    <script type="text/javascript">
    toastr.error("<?php echo $err_msg; ?>", "", {
    "closeButton": "true",
    "progressBar": "true"
    });
    </script> 
    <?php  } ?>   
    <!--End toster validation -->

</body>

</html>