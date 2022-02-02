<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back! <strong><?php echo $member_name; ?></strong></h4>
                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="border-left border-right-0 border-top-0 card text-success borderthree">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="border-success text-success ti-server"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Total Coins</div>
                            <div class="stat-digit"><?php echo $get_member_details['points']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="border-left border-right-0 border-top-0 card card-action text-primary borderthree">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="border-primary text-primary ti-user"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Total Referrals</div>
                            <div class="stat-digit">961</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="border-left border-right-0 border-top-0 card text-warning borderthree">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="border-pink text-warning ti-server"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">NU Coins</div>
                            <div class="stat-digit">770</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="border-left border-right-0 border-top-0 card text-danger borderthree">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="border-danger text-danger ti-server"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Affiliated Market</div>
                            <div class="stat-digit">2,781</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>