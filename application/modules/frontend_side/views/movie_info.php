<link rel="stylesheet" type="text/css" href="user_assets/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="user_assets/css/demo.css" />
<link rel="stylesheet" type="text/css" href="user_assets/css/tabs.css" />
<link rel="stylesheet" type="text/css" href="user_assets/css/tabstyles.css" />
<script src="user_assets/js/modernizr.custom.js"></script>
<style>
    .bg-PUSHPA {
        background-image: url(uploads/upcoming_movies_images/background_images/<?php echo $get_movie_details['background_img'] ?>);
    }
</style>
<svg class="hidden">
    <defs>
        <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z" />
    </defs>
</svg>

<section class="bg-PUSHPA">
    <div class="container">
        <div class="movie-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-image image-scale-hover">
                        <a href="">
                            <img src="<?php echo base_url() ?>uploads/upcoming_movies_images/banner_images/<?php echo $get_movie_details['banner_image']; ?>" class="w-100" alt="Blog Image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h2 class="blog-title h4 font-theme"><?php echo $get_movie_details['title']; ?></h2>
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
            <br> <br>
            <div class="row">
                <section>
                    <div class="tabs tabs-style-shape">
                        <nav>
                            <ul>
                                <li>
                                    <a href="#section-shape-1">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>SYNOPSIS</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section-shape-2">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>CAST & CREDITS</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section-shape-3">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>NEWS</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section-shape-4">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>GALLERY</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section-shape-5">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>BEHIND THE SCENES</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section-shape-6">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>VIDEOS</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#section-shape-7">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>WALLPAPERS</span>
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="#section-shape-8">
                                        <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                                            <use xlink:href="#tabshape"></use>
                                        </svg>
                                        <span>AWARDS</span>
                                    </a>
                                </li> -->
                            </ul>
                        </nav>
                        <div class="content-wrap">
                            <section id="section-shape-1">
                                <!-- <h6>Genre: Action, Adventure & Drama.</h6> -->
                                <!-- <p>Assertively conceptualize parallel process improvements through user friendly action items. Interactively cultivate interdependent customer service without clicks-and-mortar e-services. Proactively cultivate go forward testing procedures with accurate quality vectors. Globally embrace ethical functionalities via empowered scenarios. Phosfluorescently restore highly efficient opportunities and client-focused infomediaries.</p> -->
                                <p><?php if ($get_movie_details['synopsis'] != '') {
                                        echo $get_movie_details['synopsis'];
                                    } else {
                                        echo "No Data Found";
                                    } ?></p>
                            </section>
                            <section id="section-shape-2">
                                <div class="row">
                                    <?php
                                    if (!empty($cast_crew_details)) {
                                        foreach ($cast_crew_details as $cast_crew) { ?>

                                            <div class="col-lg-2">
                                                <div class="cstcr">
                                                    <img src="<?php echo base_url() ?>uploads/upcoming_movies_images/cast_crew_images/<?php echo $cast_crew['image'] ?>" class="img-fluid" alt="">
                                                    <p class="pt-2"><strong>Name :</strong><?php echo $cast_crew['name'] ?> </p>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <p class="pt-2">No Data Found</p>
                                    <?php }
                                    ?>
                                </div>
                            </section>
                            <section id="section-shape-3">
                                <div class="row">
                                    <?php
                                    if (!empty($news)) {
                                        foreach ($news as $news) {
                                            $date = $news['created_at'];
                                            $news_date = date('d-m-Y', strtotime($date))
                                    ?>
                                            <div class="col-lg-4">
                                                <div class="col-lg-4" style="width: 400px;" data-slick-index="1" aria-hidden="true" tabindex="-1">
                                                    <div class="vs-blog position-relative mb-25">
                                                        <div class="blog-image image-scale-hover">
                                                            <a href="#" tabindex="-1"><img src="<?php echo base_url() ?>uploads/news_images/<?php echo $news['image']; ?>" alt="Blog Image"></a>
                                                        </div>
                                                        <div class="blog-content mt-15">
                                                            <h3 class="blog-title font-theme  lh-base fs-20 mb-1"><a href="#" tabindex="-1">“<?php echo $news['news_title']; ?>“</a></h3>
                                                            <div class="blog-meta text-light fs-xs">
                                                                <a href="#" tabindex="-1"><i class="fal fa-calendar-alt"></i><?php echo $news_date; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  }
                                    } else {
                                        ?>
                                        <p class="pt-2">No News Found</p>
                                    <?php }
                                    ?>
                                </div>
                            </section>
                            <section id="section-shape-4">
                                <h6>Gallery</h6>
                                <div class="row gallry">
                                    <?php if (!empty($gallery)) {
                                        foreach ($gallery as $gallery) { ?> <div class="col-6 col-lg-3 col-md-4 p-1">
                                                <img src="<?php echo base_url() ?>uploads/gallery/<?php echo $gallery['gallery_img']; ?>" class="img-fluid p-0 m-0" style=" width: 100%; " alt="">
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <p class="pt-2">No Gallery Images Found</p>
                                    <?php } ?>
                                </div>
                            </section>
                            <section id="section-shape-5">
                                <h6>Behind The Screen</h6>
                                <div class="row gallry">
                                    <?php
                                    if (!empty($behind_screen)) {
                                        foreach ($behind_screen as $behind_screen) {
                                    ?>
                                            <div class="col-6 col-lg-3 col-md-4 p-1">
                                                <img src="<?php echo base_url() ?>uploads/behind_screen_imgs/<?php echo $behind_screen['behind_screen_img']; ?>" class="img-fluid p-0 m-0" style=" width: 100%; " alt="">
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <p class="pt-2">No Images Found</p>
                                    <?php } ?>
                                </div>
                            </section>
                            <section id="section-shape-6">
                                <h6>VIDEOS</h6>
                                <div class="row">
                                    <?php
                                    if (!empty($videos)) {
                                        foreach ($videos as $videos) {
                                    ?>
                                            <div class="col-12 col-lg-4"><iframe width="560" height="315" src="<?php echo $videos['youtube_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                                        <?php }
                                    } else { ?>
                                        <p class="pt-2">No Videos Found</p>
                                    <?php } ?>
                                </div>
                            </section>
                            <section id="section-shape-7">
                                <h6>Wallpapers</h6>
                                <div class="row gallry">
                                    <?php
                                    if (!empty($wall_papers)) {
                                        foreach ($wall_papers as $wall_papers) {
                                    ?>
                                            <div class="col-6 col-lg-3 col-md-4 p-1">
                                                <img src="<?php echo base_url() ?>uploads/wallpapers/<?php echo $wall_papers['wallpaper_img']; ?>" class="img-fluid p-0 m-0" style=" width: 100%; " alt="">
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <p class="pt-2">No Images Found</p>
                                    <?php } ?>
                                </div>
                            </section>
                            <!-- <section id="section-shape-8">
                                <h6>AWARDS</h6>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="cstcr">
                                            <img src="assets/img/singel-page-movie/Pushpa/Acter/AA.jpg" class="img-fluid" alt="">
                                            <p class="pt-2"><strong>Name :</strong>Allu Arjun</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="cstcr">
                                            <img src="assets/img/singel-page-movie/Pushpa/Acter/licensed-image.jpg" class="img-fluid" alt="">
                                            <p class="pt-2"><strong>Name :</strong>Rashmika Mandanna</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="cstcr">
                                            <img src="assets/img/singel-page-movie/Pushpa/Acter/Fahadh.jpg" class="img-fluid" alt="">
                                            <p class="pt-2"><strong>Name :</strong>Fahadh</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="cstcr">
                                            <img src="assets/img/singel-page-movie/Pushpa/Acter/Anasuya-Bharadwaj.jpg" class="img-fluid" alt="">
                                            <p class="pt-2"><strong>Name :</strong>Anasuya Bharadwaj</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="cstcr">
                                            <img src="assets/img/singel-page-movie/Pushpa/Acter/Sunil.jpeg" class="img-fluid" alt="">
                                            <p class="pt-2"><strong>Name :</strong>Sunil</p>
                                        </div>
                                    </div>

                                </div>
                            </section> -->
                        </div><!-- /content -->
                    </div><!-- /tabs -->
                </section>
            </div>

        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.8/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

<script src="user_assets/js/cbpFWTabs.js"></script>
<script>
    (function() {

        [].slice.call(document.querySelectorAll('.tabs')).forEach(function(el) {
            new CBPFWTabs(el);
        });

    })();
</script>