<section id="home-area" class="bg-1" data-scroll-index="0">
    <div class="container">
        <div class="row">
            <!--start caption-->
            <div class="col-lg-4 col-md-4">
                <div class="caption two d-table">
                    <div class="d-table-cell align-middle">
                        <h1 class="mb-3">Be a <span>NU</span> Member</h1>
                        <h4 class="text-dark font-open-sans">NU Club is the most unique mobile app, designed for managing startups, small business projects, and supporting modern companies.</h4>

                        <a href="<?php echo base_url(); ?>user_login" class="btn mb-2 mt-4 secondary-solid-btn"> Login </a>
                        <a href="<?php echo base_url(); ?>joinus" class="btn mb-2 mt-4 secondary-solid-btn ml-2 mr-3"> Join Us </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8  mt-5 pt-5 mb-5">
                <div class="card login-signup-card shadow-lg mb-0">
                    <div class="px-md-5 py-3 p-4">
                        <!--login form-->
                        <form class="login-signup-form" name="reg_form" id="reg_from" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-user color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Your Name" name="fullname" id="fullname">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-phone color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Enter Mobile Number" name="mobilenumber" id="mobilenumber" onkeypress="return onlyNumberKey(event)" maxlength="10">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-lg-5">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-email color-primary"></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="name@yourdomain.com" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-calendar color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Date Of Birth" name="date" id="date">
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-users-alt-4 color-primary"></span>
                                        </div>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>



                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-location-pin color-primary"></span>
                                        </div>
                                        <select class="form-control" id="state" name="state">
                                            <option value="">Select State</option>
                                            <?php
                                            foreach($states_list as $states_list)
                                            { ?>
                                                <option value="<?php echo $states_list['state_id']; ?>"><?php echo $states_list['state_name']; ?></option>
                                          <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-location-pin color-primary"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="City" name="city" id="city">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Gender-->
                                <div class="form-group col-6">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-lock color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
                                    </div>
                                </div>
                                <!-- DOB -->
                                <div class="form-group col-6">
                                    <div class="input-group input-group-merge">
                                        <div class="input-icon">
                                            <span class="icofont-key color-primary"></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" id="confirm_password">
                                    </div>
                                </div>


                            </div>


                            <!-- Submit -->
                            <button type="submit" class="border-radius btn btn-block secondary-solid-btn col-3 font-weight-bold float-lg-right mb-2 mt-4">
                                Pay Now
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>