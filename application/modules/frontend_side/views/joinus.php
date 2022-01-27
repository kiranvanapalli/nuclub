<section id="home-area" class="bg-1" data-scroll-index="0">
        <div class="container">
            <div class="row">
                <!--start caption-->
                <div class="col-lg-7 col-md-8">
                    <div class="caption two d-table">
                        <div class="d-table-cell align-middle">
                            <h1 class="mb-3">Welcome Back !</h1>
                            <h4 class="text-dark font-open-sans">NU Club is the most unique mobile app, designed for managing startups, small business projects, and supporting modern companies.</h4>
							<a class="nav-link p-0" style="color: white" href="<?php echo base_url(); ?>">Back To Home >> </a>
                        </div>
                    </div>
                </div>
				<div class="col-lg-5 col-md-5 mt-5 pt-100">
                    <div class="card login-signup-card shadow-lg mb-0">
                        <div class="px-md-5 py-3 p-4">
                            <div class="mb-3">
                                <h5 class="h3 m-auto p-3 text-center text-uppercase">JOIN US</h5>
<!--                                <p class="text-muted mb-0">Sign in to your account to continue.</p>-->
                            </div>

                            <!--login form-->
                            <form class="login-signup-form" name="join_us" id="join_us_form">
                                <div class="form-group">
                                    <label class="pb-1">Full Name</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-user color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Your Name" name="full_name" id="full_name">
                                    </div>
                                </div>
                                <!-- Password -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Email Address</label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-email color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="name@yourdomain.com" name="email" id="email">
                                    </div>
                                </div>
								
								 <!-- Mobile Number -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label class="pb-1">Mobile Number</label>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-phone color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobile_number" id="mobile_number" onkeypress="return onlyNumberKey(event)" maxlength="10">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <button class="btn btn-block secondary-solid-btn border-radius mt-4 mb-2" type="submit" id="join_us_form">
                                    Submit
                                </button>

                            </form>
                        </div>
                        <div class="card-footer bg-transparent border-top px-md-5 col-12">
							<div class="row">
								<div class="col-lg-6 text-left"><a href="<?php echo base_url() ?>register" class="small"> Register Now</a></div>
								<div class="col-lg-6 text-right"><a href="<?php echo base_url() ?>user_login" class="small"> Login</a></div>
							</div>
                    	</div>
                </div>
            </div>
                <!--end caption-->
            </div>
        </div>
    </section>