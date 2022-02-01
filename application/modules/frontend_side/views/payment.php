<section id="core-feature-area" class="bg-3">
    <div class="core-feature-circle">
        <img class="circle1" src="user_assets/new-assets/images/asset-6.png" alt="">
        <img class="circle2" src="user_assets/new-assets/images/asset-6.png" alt="">
        <img class="circle3" src="user_assets/new-assets/images/asset-6.png" alt="">
    </div>
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-4 pb-3 pt-3 text-center">
                <img src="user_assets/new-assets/images/qrcode.png" alt="" class="text-center w-75" style="
    border: 8px solid #3890fe;">
            </div>
            <div class="col-lg-8">
                <h1>Scan & Pay Now</h1>
                <p>Enter Your Transaction ID</p>
                <form class="login-signup-form" name="payment_form" id="payment_form" method="POST">
                    <div class="row">
                        <!-- Gender-->
                        <div class="form-group col-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input transaction_type" type="radio" name="transaction_type" id="utr_number" value="utr_number">
                                <label class="form-check-label" for="utr_number">UTR Number</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input transaction_type" type="radio" name="transaction_type" id="transaction_id" value="transaction_id">
                                <label class="form-check-label" for="transaction_id">Transaction ID</label>
                            </div>

                        </div>
                        <!-- DOB -->
                    </div>
                    <div class="row">
                        <div class="form-group col-12">
                            <div class="input-group input-group-merge">
                                <div class="input-icon">
                                    <span class="icofont-rss color-primary"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="UTR/Transaction" name="UTR_Transaction_value" id="UTR_Transaction_value">
                            </div>
                        </div>
                    </div>

                    <?php $member_id = $_SESSION['member_id'];  ?>

                <input type="hidden" name="member_id" id="member_id" value="<?php echo $member_id; ?>">

                    <button type="submit" class="border-radius btn btn-block secondary-solid-btn col-3 font-weight-bold float-lg-right mb-2 mt-4"> Submit </button>

                </form>
            </div>
        </div>
    </div>
</section>