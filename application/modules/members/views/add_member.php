<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <form class="form" name="add_member" id="add_member" autocomplete="off">
                        <div class="row row--form">
                            <div class="col-12 col-md-12">
                                <div class="row row--form">
                                    <div class="col-12">
                                        <input type="text" class="form__input" placeholder="Full Name" id="full_name" name="full_name">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="email" class="form__input" placeholder="Email ID" id="email_id" name="email_id">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="text" class="form__input" placeholder="Mobile Number" id="mobile_number" name="mobile_number" onkeypress="return onlyNumberKey(event)" maxlength="10">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <select class="form__input" id="gender" name="gender">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3">
                                        <input type="text" class="form__input" placeholder="DOB" id="date" name="date" autocomplete="off">
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
                                                        foreach($states_list as $states_list)
                                                        {?>
                                                        <option value="<?php echo $states_list['state_id'] ?>"><?php echo $states_list['state_name']; ?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-6 col-sm-4">
                                                <input type="text" class="form__input" placeholder="City" name="city" id="city">
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
                                                    <option value="">Select Payment Type</option>
                                                    <option value="GooglePay">GooglePay</option>
                                                    <option value="PhonePe">PhonePe</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Debit_Credit_Card">Debit/Credit Card</option>
                                                    <option value="Internet Banking">Internet Banking</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row row--form">

                                    <!-- <div class="col-lg-8">
                                        <h3>Pay Via</h3>
                                    </div> -->
                                    <!-- <div class="col-lg-4"><button type="button" class=" main__title-link w-100 mb-2">Pay Via</button></div> -->
                                    <div class="col-12">
                                        <div class="row row--form">

                                            <div class="col-lg-12">
                                                <h3>Create Password</h3>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="password" name="password" id="password" class="form__input" placeholder="Password" autocomplete="off">
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="password" name="conf_password" id="conf_password" class="form__input" placeholder="Confirm Password" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row row--form">

                                            <div class="col-lg-12">
                                                <h3>Add NU Points</h3>
                                            </div>
                                            <div class="col-lg-6"><input type="text" class="form__input" placeholder="0000" name="nu_points" id="nu_points"  onkeypress="return onlyNumberKey(event)"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" name="add_member_button" class="main__title-link">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>