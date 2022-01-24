<!--        ---------------------------------  Menu  ----------------------------------->
<div class="breadcumb-wrapper breadcumb-layout1 pt-60 pb-50" data-bg-src="user_assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
    <div class="container z-index-common">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title h1 text-white my-0">Movies Details</h1>
            <h2 class="breadcumb-bg-title">M.M.M</h2>
            <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                <li>
                    <a href="<?= base_url(); ?>"><i class="fal fa-home"></i>Home</a>
                </li>
                <li class="active">Movies Details</li>
            </ul>
        </div>
    </div>
</div>
<section class="vs-blog-wrapper blog-single-layout1 space-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="vs-blog">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-image image-scale-hover">
                                <a href="">
                                    <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/banner_images/<?php echo $get_upcoming_moive_details['banner_image']; ?>" class="w-100" alt="Blog Image" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="blog-title h4 font-theme"><?php echo $get_upcoming_moive_details['title']; ?></h2>
                            <ul class="m-0 p-0">
                                <li class="pb-1 pt-1">
                                    <strong>Star Cast:</strong>
                                    <?php foreach ($cast_crew as $cast_crew_data) {
                                        if ($cast_crew_data['role'] == 1) {

                                            echo $cast_crew_data['name'];
                                            echo " ,";
                                        }

                                        if ($cast_crew_data['role'] == 2) {
                                            echo $cast_crew_data['name'];
                                        }
                                    } ?>
                                </li>
                                <li class="pb-1 pt-1">
                                    <strong>Director:</strong>
                                    <?php foreach ($cast_crew as $cast_crew_data) {
                                        if ($cast_crew_data['role'] == 3) {
                                            echo $cast_crew_data['name'];
                                        } else {
                                            echo "";
                                        }
                                    } ?>
                                </li>
                                <li class="pb-1 pt-1">
                                    <strong>Cinematographer:</strong>
                                    <?php foreach ($cast_crew as $cast_crew_data) {
                                        if ($cast_crew_data['role'] == 5) {
                                            echo $cast_crew_data['name'];
                                        } else {
                                            echo "";
                                        }
                                    } ?>
                                </li>
                                <li class="pb-1 pt-1">
                                    <strong>Music Director:</strong>
                                    <?php foreach ($cast_crew as $cast_crew_data) {
                                        if ($cast_crew_data['role'] == 6) {
                                            echo $cast_crew_data['name'];
                                        } else {
                                            echo "";
                                        }
                                    } ?>
                                </li>
                                <li class="pb-1 pt-1">
                                    <strong>Art Director:</strong>
                                    <?php foreach ($cast_crew as $cast_crew_data) {
                                        if ($cast_crew_data['role'] == 7) {
                                            echo $cast_crew_data['name'];
                                        } else {
                                            echo "";
                                        }
                                    } ?>
                                </li>
                                <li class="pb-1 pt-1">
                                    <strong>Editor:</strong>
                                    <?php foreach ($cast_crew as $cast_crew_data) {
                                        if ($cast_crew_data['role'] == 8) {
                                            echo $cast_crew_data['name'];
                                        } else {
                                            echo "";
                                        }
                                    } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-content bg-smoke">
                        <?php $message = $get_upcoming_moive_details['synopsis'];
                        $out = strlen($message) >
                            50 ? substr($message, 0, 400) . "..." : $message; ?>
                        <blockquote>
                            <p><?php echo $out; ?></p>
                        </blockquote>
                    </div>
                </div>
                <section class="featured-blog-wrapper">
                    <div class="">
                        <div class="row justify-content-center justify-content-md-between">
                            <div class="col-auto text-center text-md-start">
                                <div class="section-title">
                                    <h2>Cast & Crew</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row vs-carousel arrow-white arrow-margin" data-arrows="true" data-slide-show="6" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">
                            <?php foreach ($cast_crew as $key => $value) {
                            ?>
                                <div class="vs-blog col-xl-2">
                                    <div class="position-relative">
                                        <a href="#" class="overlay overlay-lg"></a>

                                        <div class="blog-image"><a href="<?php echo $value['link'] ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cast_crew_images/<?php echo $value['image']; ?>" alt="Featured Blog Image" class="w-100 img_cast" /></a></div>
                                        <div class="blog-content pos-bottom">
                                            <h3 class="blog-title h5 font-theme lh-base mb-2 text-white"><a href="<?php echo $value['link'] ?>" target="_blank" class="text-white"><?php echo $value['name']; ?></a></h3>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</section>