<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back! <strong><?php echo $this->session->userdata('fullname');  ?></strong></h4>

                </div>
            </div>
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="Profile.html">Save</a></li>
                </ol>
            </div> -->
        </div>
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <form name="update_profile" id="update_profile">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>FullName</label>
                                <input type="text" placeholder="Full Name" class="form-control" name="fullname" id="fullname" value="<?php echo $get_member_details['fullname']; ?>" />
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label>Mobile Number</label>
                                <input type="text" placeholder="Mobile Number" class="form-control" name="mobilenumber" id="mobilenumber" onkeypress="return onlyNumberKey(event)" maxlength="10" value="<?php echo $get_member_details['mobilenumber']; ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" placeholder="Email" class="form-control" name="email" id="email" value="<?php echo $get_member_details['email']; ?>" />
                            </div> -->
                            <div class="form-group col-md-3">
                                <label>Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="">Please Select Gender</option>
                                    <option value="Male" <?php if ($get_member_details['gender'] == "Male") {
                                                                echo 'selected';
                                                            } ?>>Male</option>
                                    <option value="Female" <?php if ($get_member_details['gender'] == "Female") {
                                                                echo 'selected';
                                                            } ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Date Of Birth</label>
                                <input type="text" placeholder="Date Of Birth" class="form-control" name="date" id="date" value="<?php echo $get_member_details['date_of_birth']; ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>State</label>
                                <select class="form-control" name="state" id="state">
                                    <option value="">Please Select State</option>
                                    <?php
                                    foreach ($state_list as $states_list) {
                                    ?>
                                        <option value="<?php echo $states_list['state_id']; ?>" <?php if ($get_member_details['state'] == $states_list['state_id']) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $states_list['state_name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" placeholder="City" class="form-control" name="city" id="city" value="<?php echo $get_member_details['city']; ?>" />
                            </div>
                        </div>
                        <button class="btn btn-secondary float-lg-right" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>