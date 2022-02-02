<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back! <strong><?php echo $get_member_details['fullname']; ?></strong></h4>
                  
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url() ?>EditProfile">Edit</a></li>
                </ol>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="about-me">
                        <div class="profile-personal-info">
                            <h4 class="text-primary mb-4">Personal Information</h4>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-9"><span><?php echo $get_member_details['fullname']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-9"><span><?php echo $get_member_details['email']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">Mobile Number <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-9"><span>+91 <?php echo $get_member_details['mobilenumber']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">Gender <span class="pull-right">:</span></h5>
                                </div>
                                <div class="col-9"><span><?php echo $get_member_details['gender']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">DOB <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-9"><span><?php echo $get_member_details['date_of_birth']; ?></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">State <span class="pull-right">:</span></h5>
                                </div>
                                <?php

                                $state_id = $get_member_details['state'];
                                $state_name = '';
                                foreach ($state_list as $state_list) {
                                    if ($state_id == $state_list['state_id']) {
                                        $state_name =   $state_list['state_name'];
                                    }
                                }
                                ?>
                                <div class='col-9'><span><?php echo $state_name ?></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-3">
                                    <h5 class="f-w-500">City<span class="pull-right">:</span></h5>
                                </div>
                                <div class="col-9"><span><?php echo $get_member_details['city']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>