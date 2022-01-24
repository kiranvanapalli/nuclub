<div class="app-content content">
    
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">

            <div class="row mb-2">
                <!-- main title -->
                <div class="col-8">
                    <div class="main__title">
                        <h2>Dashboard</h2>
                    </div>
                </div>

                <!-- <div class="col-4">
                    <div class="main__title">
                        <a href="add-item.html" class="main__title-link">Add Item</a>
                    </div>
                </div> -->
                <!-- end main title -->


            </div>

            <div id="crypto-stats-3" class="row">

                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url() ?>upcoming_movies">
                        <div class="card p-2 stats colo-1">
                            <span>Upcoming Movies</span>
                            <p><?php echo $movies; ?></p>
                            <i class="las la-film"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url(); ?>award">
                        <div class="card p-2 stats colo-2">
                            <span>Awards</span>
                            <p><?php echo $awards; ?></p>
                            <i class="las la-award"></i>
                        </div>
                    </a>
                </div>
<!-- 
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url() ?>movies">
                        <div class="card p-2 stats colo-3">
                            <span>Movies</span>
                            <p><?php echo $movies; ?></p>
                            <i class="las la-film"></i>
                        </div>
                    </a>
                </div> -->

                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url() ?>enquiry">
                        <div class="card p-2 stats colo-4">
                            <span>Enquiry</span>
                            <p><?php echo $contactus; ?></p>
                            <i class="las la-headset"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url() ?>videos">
                        <div class="card p-2 stats colo-5">
                            <span>Videos</span>
                            <p><?php echo $videos; ?></p>
                            <i class="las la-video"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url(); ?>news">
                        <div class="card p-2 stats colo-6">
                            <span>News</span>
                            <p><?php echo $recent_news; ?></p>
                            <i class="las la-newspaper"></i>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="<?php echo base_url(); ?>news_letter">
                        <div class="card p-2 stats colo-7">
                            <span>New Letter</span>
                            <p><?php echo $email_subscriber; ?></p>
                            <i class="las la-envelope"></i>
                        </div>
                    </a>
                    
                </div>

            </div>
        </div>
    </div>
</div>