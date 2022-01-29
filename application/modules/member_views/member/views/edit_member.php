<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <form class="form" name="update_member" id="update_member" autocomplete="off">
                        <div class="row row--form">
                            <div class="col-12 col-md-12">
                                <h3>Edit Member Details</h3>
                                <div class="row row--form">
                                    <div class="col-12">
                                        <input type="text" class="form__input" placeholder="Full Name" id="full_name" name="full_name" value="<?php echo $get_member_details['fullname'] ?>">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="email" class="form__input" placeholder="Email ID" id="email_id" name="email_id" value="<?php echo $get_member_details['email'] ?>">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="text" class="form__input" placeholder="Mobile Number" id="mobile_number" name="mobile_number" value="<?php echo $get_member_details['mobilenumber'] ?>" onkeypress="return onlyNumberKey(event)" maxlength="10">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <select class="form__input" id="gender" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male" <?php if ($get_member_details['gender'] == "Male") {
                                                                        echo 'selected';
                                                                    } ?>>Male</option>
                                            <option value="Female" <?php if ($get_member_details['gender'] == "Female") {
                                                                        echo 'selected';
                                                                    } ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="text" class="form__input" placeholder="DOB" id="date" name="date" autocomplete="off" value="<?php echo $get_member_details['date_of_birth']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row row--form">
                                    <div class="col-lg-6">
                                        <div class="row row--form">
                                            <div class="col-lg-12 col-md-12">
                                                <h3>Address</h3>
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <select name="state" class="form__input" id="state">

                                                    <option value="">Select State Name</option>
                                                    <?php
                                                    foreach ($states as $states_list) { 
                                                      ?>
                                                       <option value="<?php echo $states_list['state_id']; ?>"<?php if($get_member_details['state'] == $states_list['state_id']) { echo 'selected'; } ?>><?php echo $states_list['state_name']; ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <input type="text" class="form__input" placeholder="City" name="city" id="city" value="<?php echo $get_member_details['city']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="row row--form">
                                            <div class="col-lg-12 col-md-12">
                                                <h3>Pay Via</h3>
                                            </div>
                                            <div class="col-lg-12">
                                                <select class="form__input" id="pay_via" name="pay_via">

                                                    <option value="GooglePay" <?php if ($get_member_details['payment_via'] == "GooglePay") {
                                                                                    echo 'selected';
                                                                                } ?>>GooglePay</option>
                                                    <option value="PhonePe" <?php if ($get_member_details['payment_via'] == "PhonePe") {
                                                                                echo 'selected';
                                                                            } ?>>PhonePe</option>
                                                    <option value="Cash" <?php if ($get_member_details['payment_via'] == "Cash") {
                                                                                echo 'selected';
                                                                            } ?>>Cash</option>
                                                    <option value="Debit_Credit_Card" <?php if ($get_member_details['payment_via'] == "Debit_Credit_Card") {
                                                                                            echo 'selected';
                                                                                        } ?>>Debit/Credit Card</option>
                                                    <option value="Internet_Banking" <?php if ($get_member_details['payment_via'] == "Internet_Banking") {
                                                                                            echo 'selected';
                                                                                        } ?>>Internet Banking</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <div class="row row--form">

                                            <div class="col-lg-12">
                                                <h3>Update Password</h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="password" name="password" id="password" class="form__input" placeholder="Password" autocomplete="off" value="<?php echo $get_member_details['password']; ?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="password" name="conf_password" id="conf_password" class="form__input" placeholder="Confirm Password" autocomplete="off" value="<?php echo $get_member_details['password']; ?>"onkeypress="return onlyNumberKey(event)" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row row--form">
                                    <div class="col-lg-6">
                                        <div class="row row--form">
                                            <div class="col-lg-12">
                                                <h3>Add NU Points</h3>
                                            </div>
                                            <div class="col-lg-12"><input type="text" class="form__input" placeholder="0000" name="nu_points" id="nu_points" value="<?php echo $get_member_details['points'];  ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <h3>Status</h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <select class="form__input" id="status" name="status">
                                                <option value="">Select Status</option>
                                                <option value="1" <?php if ($get_member_details['status'] == "1") {
                                                                            echo 'selected';
                                                                        } ?>>Active</option>
                                                <option value="0" <?php if ($get_member_details['status'] == "0") {
                                                                            echo 'selected';
                                                                        } ?>>In Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="update_member_button" class="main__title-link">Update</button>
                        </div>
                    </div>
                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $get_member_details['member_id']; ?>">
                <input type="hidden" name="member_code" value="<?php echo $get_member_details['member_code']; ?>">
            </form>
            </div>
        </div>
    </div>
</div>