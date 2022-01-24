<style>
    .blog-image img {
    height: 25em;
    object-fit: cover;
}
    </style>

<div class="breadcumb-wrapper breadcumb-layout1 pt-60 pb-50" data-bg-src="assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
    <div class="container z-index-common">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title h1 text-white my-0">News Details</h1>
            <h2 class="breadcumb-bg-title">M.M.M</h2>
            <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                <li><a href="<?php echo base_url(); ?>"><i class="fal fa-home"></i>Home</a></li>
                <li class="active">News Details</li>
            </ul>
        </div>
    </div>
</div>

<section class="vs-blog-wrapper blog-single-layout1 space-top ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="vs-blog">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="blog-image image-scale-hover">
                                <a href="">
                                    <img src="<?php echo base_url() ?>uploads/news_images/<?php echo $get_news['image']; ?>" class="w-100" alt="Blog Image" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h2 class="blog-title h4 font-theme">“<?php echo $get_news['news_title']; ?>”</h2>
                            <p class="mt-n1">
                                <?php echo $get_news['news_description']; ?>
                            </p>

                        </div>
                    </div>

                </div>

               <!--  <p class="mt-n1">
                    Assertively conceptualize parallel process improvements through user friendly action items. Interactively cultivate interdependent customer service without clicks-and-mortar e-services. Proactively cultivate
                    go forward testing procedures with accurate quality vectors. Globally embrace ethical functionalities via empowered scenarios. Phosfluorescently restore highly efficient opportunities and client-focused
                    infomediaries.
                </p> -->
            </div>
        </div>
    </div>
</section>