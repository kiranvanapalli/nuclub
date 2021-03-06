<section id="home-area" class="bg-1" data-scroll-index="0">
        <div class="container">
            <div class="row">
                <!--start caption-->
                <div class="col-lg-7 col-md-8">
                    <div class="caption two d-table">
                        <div class="d-table-cell align-middle">
                            <h1 class="mb-3">Welcome Back !</h1>
                            <h4 class="text-dark font-open-sans">NU Club is the most unique mobile app, designed for managing startups, small business projects, and supporting modern companies.</h4>
							<a class="nav-link p-0" style="color: white" href="<?php echo base_url() ?>">Back To Home >> </a>
                        </div>
                    </div>
                </div>
				<div class="col-lg-5 col-md-5 mt-5 pt-100">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="px-md-5 py-3 p-4">
                            <div class="mb-3">
                                <h5 class="h3 m-auto p-3 text-center text-uppercase">Login</h5>
<!--                                <p class="text-muted mb-0">Sign in to your account to continue.</p>-->
                            </div>

                            <!--login form-->
                            <form class="login-signup-form" id="user_login" method="POST">
                                <!-- Password -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Email</label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-phone color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Please Enter Email" name="email" id="email">
                                    </div>
                                </div>
								
								 <!-- Mobile Number -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Password</label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-key color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Please Enter Password" name="password" id="password">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-2" type="submit" id="login_btn">
                                    Submit
                                </button>

                            </form>
                        </div>
                        <div class="card-footer bg-transparent border-top px-md-5 col-12">
							<div class="row">
								<div class="col-lg-12 text-center"><a href="<?php echo base_url() ?>register" class="small"> Now Have a Accont <strong>Register Now</strong></a></div>
								<div class="col-lg-12 text-center"><a href="<?php echo base_url() ?>user_forgotpassword" class="small"> Forgot Password ?</a></div>
							</div>
                    	</div>
                </div>
            </div>
                <!--end caption-->
            </div>
        </div>
    </section>

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