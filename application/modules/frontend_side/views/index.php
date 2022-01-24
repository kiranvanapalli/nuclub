<style type="text/css">
   .img_cast
   {
   height: 100px !important;
   width: 100px !important;
   }
	.ade-videos img {
    width: 100%;
    height: 230px;
    object-fit: cover;
    object-position: bottom;
    padding: 0;
    margin: auto;
}
.Ade-video-text {
    font-size: 15px;
    text-align: start;
    text-transform: capitalize;
    line-height: initial;
    vertical-align: revert;
    height: auto;
    width: auto;
    position: relative;
    margin: auto;
    padding: inherit;
}
.upfm-img {
    width: 100% !important;
    height: 31rem !important;
    object-fit: cover;
    object-position: center;
}
</style>
<section class="vs-hero-wrapper">
   <div class="vs-hero-carousel" data-height="650" data-container="1170" data-slidertype="fullwidth">
      <a href="#" class="ls-arrow  d-none d-xxl-inline-block" data-ls-go="next">Next<i class="fal fa-arrow-right"></i></a>
      <a href="#" class="ls-arrow  d-none d-xxl-inline-block" data-ls-go="prev"><i class="fal fa-arrow-left"></i>Prev</a>
      <?php foreach($upcoming_movies_banner_list as $banner)
      { ?>

      
      <div class="ls-slide" data-ls="duration: 8000; transition2d: 5;">
         <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/banner_images/<?php echo $banner['banner_image']; ?>" alt="Hero Bg Image" class="ls-bg" />
        <!--  <a
            href="#"
            class="ls-l ls-responsive ls-hide-phone"
            data-ls-tablet="left: 100px; top: 140px; font-size: 22px;"
            data-ls-laptop="left: 100px; top: 160px; font-size: 18px;"
            style="left: 0; top: 180px; background-color: #34ba5e; font-size: 14px; color: #ffffff; text-transform: uppercase; font-weight: 700; font-family: Roboto; padding: 5px 11px;"
            data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
         </a> -->
         <h1
            class="ls-l ls-responsive"
            data-ls-mobile="left: 50%; top: 70px; font-size: 110px; text-align: center;"
            data-ls-tablet="left: 100px; top: 200px; font-size: 56px;"
            data-ls-laptop="left: 100px; top: 210px; font-size: 52px;"
            style="left: 0; top: 218px; font-family: 'DM Sans', sans-serif; color: #ffffff; font-weight: 700; font-size: 48px;"
            data-ls="durationin: 1000; delayin: 200; easingin:easeOutQuint; texttransitionin: true; textfadein: true; texttypein: words_asc; textstartatin: transitioninstart; textshiftin: 300; textoffsetyin: 50; transitionout: true; offsetxout: 500; durationout: 3000; fadeout: true; skewxout: 10;"
            >
            <?php echo $banner['title']; ?>
         </h1>
         <p
            class="ls-l ls-responsive ls-hide-phone"
            data-ls-tablet="left: 103px; top: 350px; font-size: 22px;"
            data-ls-laptop="left: 103px;"
            style="left: 0; top: 300px; font-size: 16px; color: #e2e2e2; text-transform: uppercase; font-weight: 700;"
            data-ls="minfontsize: 12px; durationin: 1000; delayin: 1100; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;"
            >
            <span class="me-4"><i class="fal fa-calendar-alt me-1"></i><?php echo $banner['released_year']; ?></span> 
         </p>
         <div
            class="ls-l ls-center-xs ls-responsive"
            data-ls-mobile="left: 50%; top: 405px; width: 100px; height: 100px;"
            data-ls-tablet="left: 100px; top: 430px;"
            data-ls-laptop="left: 100px; top: 420px;"
            style="left: 0; top: 340px;"
            data-ls="durationin: 1000; delayin: 1200; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;"
            >
            <div class="ls-btn-group">
             <a href="<?php echo base_url(); ?>movie_info?id=<?php echo $banner['movie_id'] ?>" class="vs-btn gradient-btn">View More</a>
            </div>
         </div>
         <div
            class="ls-l ls-hide-phone ls-responsive"
            data-ls-tablet="left: 80%;"
            data-ls-laptop="left: 80%;"
            style="left: 92.5%; top: 50%;"
            data-ls="durationin: 1000; fadein: true; delayin: 1200; scalexin: 0.5; scaleyin: 0.5; transitionout: true; durationout: 1000; fadeout: true; scalexout: 1.5; scaleyout: 1.5;"
            >
            <a href="<?php echo $banner['movie_link']; ?>" target="_blank" class=" play-btn outline"><i class="fas fa-play"></i></a>
         </div>
      </div>
  <?php } ?>
   </div>
</section>
<div class="moviename">
   <section class="featured-blog-wrapper space-top">
      <div class="container">
         <div class="row justify-content-center justify-content-md-between">
            <div class="col-auto text-center text-md-start">
               <div class="section-title">
                  <span class="sub-title1 text-theme3"># MYTHRI MOVIES</span>
                  <h2 class="sec-title1 ">MOVIES</h2>
               </div>
            </div>
            <div class="col-auto mt-3 d-none d-md-block">
               <a href="<?php echo base_url(); ?>all_movies" class="vs-btn gradient-btn">See All</a>   
               <!--                            <a href="#" class="vs-btn style3"></a>-->
            </div>
         </div>
         <div class="row multibg-color-cat vs-carousel arrow-white arrow-margin" data-arrows="true" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1">
            <?php foreach($all_movies_list as $movies){ ?>
            <div class="vs-blog col-xl-3">
               <div class="position-relative">
                  <a href="#" class="overlay overlay-lg"></a>
                  <div class="blog-image"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/banner_images/<?php echo $movies['banner_image']; ?>" alt="Featured Blog Image" class="w-100" /></div>
                  <div class="blog-content pos-bottom">
                     <h3 class="blog-title h5  font-theme lh-base mb-2"><a href="<?php echo base_url() ?>movie_info?id=<?php echo $movies['movie_id'];?>"><?php echo $movies["title"]; ?></a></h3>
                     <div class="blog-meta text-light-white fs-xs">
                        <a href="#"><i class="fal fa-calendar-alt"></i><?php echo $movies['released_year']; ?></a>
                     </div>
                     <div class="">
                        <div class="position-absolute top-0 end-0 pr-20">
                           <a href="<?php echo $movies['movie_link']; ?>" target= "_blank" class="play-btn style-white"><i class="fas fa-play"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php } ?>
         </div>
      </div>
   </section>
</div>
<div class="arrow-wrap bg-gray mb-40 mt-40 pb-60 pt-60 vs-video-area" data-overlay="dark" data-opacity="9">
   <div class="container">
      <h2 class="h4 font-theme3 mt-md-n2 mb-4 z-index-common">video</h2>
      <div class="row vs-carousel z-index-common arrow-margin arrow-white" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
         <?php foreach($video_list as $video_list){ ?>
         <div class="col-lg-4">
            <div class="vs-blog position-relative mb-25">
               <div class="blog-image image-scale-hover ade-videos">
                  <img src="<?php echo base_url(); ?>uploads/videos/<?php echo $video_list['video_image']; ?>" alt="Blog Image" height ="370px" width="240px"/>
                  <div class="position-absolute top-0 end-0 pt-30 pr-20">
                     <a href="<?php echo $video_list['youtube_link']; ?>" target ="_blank" class="play-btn style-white"><i class="fas fa-play"></i></a>
                  </div>
               </div>
               <div class="blog-content mt-15">
                  <h3 class="blog-title Ade-video-text mb-1"><?php echo $video_list['video_title']; ?></h3>
                  <div class="blog-meta text-light fs-xs">
                     <a href="#"><i class="fal fa-calendar-alt"> <?php  $date = show_date_only($video_list['created_at']);
                        echo $date; ?></i>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
<section class="vs-news-area">
   <div class="container">
      <div class="row">
         <div class="col-lg-8">
            <div class="row pb-30 moviename">
               <div class="col-md-6">
                  <h2 class="h4  font-theme3 mt-md-n1 mb-4">Upcoming film</h2>
                  <div class="multibg-color-cat vs-carousel" data-slide-show="1">
					  
                     <div class="position-relative vs-blog m-0">
                        <a href="#" class="overlay overlay-lg"></a>
                        <div class="blog-image"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $upcoming_movies[0]['sliding_image1']; ?>" alt="Latest Blog Image" class="w-100 upfm-img" /></div>
                        <div class="blog-content pos-bottom">
                           <h3 class="blog-title h5  font-theme lh-base mb-2"><a href="#"><?php echo $upcoming_movies[0]['title'] ?></a></h3>
                           <div class="blog-meta text-light-white fs-xs">
                             <i class="fal fa-calendar-alt"></i> <?php echo $upcoming_movies[0]['released_year']; ?>
                           </div>
                        </div>
                     </div>
                     <?php if($upcoming_movies[0]['sliding_image2'] != '')
                     { ?>
                        <div class="position-relative vs-blog m-0">
                        <a href="#" class="overlay overlay-lg"></a>
                        <div class="blog-image"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $upcoming_movies[0]['sliding_image2']; ?>" alt="Latest Blog Image" class="w-100 upfm-img" /></div>
                        <div class="blog-content pos-bottom">
                           <h3 class="blog-title h5  font-theme lh-base mb-2"><a href="#"><?php echo $upcoming_movies[0]['title'] ?></a></h3>
                           <div class="blog-meta text-light-white fs-xs">
                              <i class="fal fa-calendar-alt"></i> <?php echo $upcoming_movies[0]['released_year']; ?> 
                           </div>
                        </div>
                     </div>

                   <?php  } 
                   if($upcoming_movies[0]['sliding_image3'] != '')
                    {
                        ?>


                     
                     <div class="position-relative vs-blog m-0">
                        <a href="#" class="overlay overlay-lg"></a>
                        <div class="blog-image"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $upcoming_movies[0]['sliding_image3']; ?>" alt="Latest Blog Image" class="w-100 upfm-img" /></div>
                        <div class="blog-content pos-bottom">
                           <h3 class="blog-title h5  font-theme lh-base mb-2"><a href="#"><?php echo $upcoming_movies[0]['title'] ?></a></h3>
                           <div class="blog-meta text-light-white fs-xs">
                              <i class="fal fa-calendar-alt"></i> <?php echo $upcoming_movies[0]['released_year']; ?> 
                           </div>
                        </div>
                     </div>
                 <?php } ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <h2 class="h4  font-theme3 mt-md-n1 mb-4">Cast</h2>
                  <div class="post-thumb-style1">
                     <?php foreach($cast_data as $cast_crew_data){ ?>
                     <div class="vs-blog d-flex gap-3">
                        <div class="media-img">
                           <a href="<?php echo $cast_crew_data['link']; ?>" target="_blank"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cast_crew_images/<?php echo $cast_crew_data['image']; ?>" class="img_cast" alt="Recent Post" /></a>
                        </div>
                        <div class="media-body align-self-center">
                           <div class="blog-category"><a href="#"><?php
                              foreach($role_list as $role_data)
                              {
                              if($cast_crew_data['role'] == $role_data['role_id'] )
                              {
                                      echo $role_data['role_name'];
                              } } ?></a></div>
                           <h4 class="h5 blog-title font-theme lh-base  mb-0"><a href="#"><?php echo $cast_crew_data['name']; ?></a></h4>
                        </div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mt-45">
            <h2 class="h4  font-theme3 mt-md-n1 mb-4"></h2>
            <div class="post-thumb-style1 row">
               <?php 
                  for ($i=1; $i <= 3 ; $i++) { 
                     
                  // print_r($movie_list); ?>
               <div class="col-md-12 vs-blog">
                  <div class="d-flex gap-3">
                     <div class="media-img">
                        <a href="#"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $upcoming_movies_list[$i]['cover_image']; ?>" class="img_cast" alt="Recent Post" /></a>
                     </div>
                     <div class="media-body align-self-center">
                        <h4 class="h5 font-theme lh-base  mb-0"><?php echo $upcoming_movies_list[$i]['title']; ?></h4>
                        <div class="blog-meta text-light fs-xs mt-1">
                           <a href="#"><i class="fal fa-calendar-alt"></i><?php echo $upcoming_movies_list[$i]['released_year']; ?></a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php  }?>
               <!-- <div class="col-md-12 vs-blog">
                  <div class="d-flex gap-3">
                      <div class="media-img">
                          <a href="#"><img src="user_assets/img/recent-post/recent-post-5.jpg" alt="Recent Post" /></a>
                      </div>
                      <div class="media-body align-self-center">
                          <h4 class="h5 font-theme lh-base  mb-0">Sarkaru Vaari Paata</h4>
                          <div class="blog-meta text-light fs-xs mt-1">
                              <a href="#"><i class="fal fa-calendar-alt"></i>2022</a>
                          </div>
                      </div>
                  </div>
                  </div> -->
               <!--  <div class="col-md-12 vs-blog">
                  <div class="d-flex gap-3">
                      <div class="media-img">
                          <a href="#"><img src="user_assets/img/recent-post/recent-post-6.jpg" alt="Recent Post" /></a>
                      </div>
                      <div class="media-body align-self-center">
                          <h4 class="h5 font-theme lh-base  mb-0">Ante Sundaraniki</h4>
                          <div class="blog-meta text-light fs-xs mt-1">
                              <a href="#"><i class="fal fa-calendar-alt"></i>----</a>
                          </div>
                      </div>
                  </div>
                  </div> -->
               <!--  <div class="col-md-12 vs-blog">
                  <div class="d-flex gap-3">
                      <div class="media-img">
                          <a href="#"><img src="user_assets/img/recent-post/recent-post-1.jpg" alt="Recent Post" /></a>
                      </div>
                      <div class="media-body align-self-center">
                          <h4 class="h5 font-theme lh-base  mb-0">Puspa</h4>
                          <div class="blog-meta text-light fs-xs mt-1">
                              <a href="#"><i class="fal fa-calendar-alt"></i>----</a>
                          </div>
                      </div>
                  </div>
                  </div> -->
            </div>
         </div>
      </div>
   </div>
</section>
<div class=" bg-gray vs-video-area pt-60 pb-100" data-bg-src="user_assets/img/bg/video-bg-1-1.jpg" data-overlay="dark" data-opacity="9">
   <div class="container">
      <h2 class="h4  font-theme3 mt-md-n2 mb-4 z-index-common">Recent News</h2>
      <div class="row vs-carousel z-index-common arrow-margin arrow-white" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
         <?php foreach($all_news as $news){ ?>
         <div class="col-lg-4">
            <div class="vs-blog position-relative mb-25">
               <div class="blog-image image-scale-hover">
                  <a href="<?php echo base_url() ?>news_details?id=<?php echo $news['news_id']; ?>"><img src="<?php echo base_url() ?>uploads/news_images/<?php echo $news['image']; ?>" alt="Blog Image" /></a>
               </div>
               <div class="blog-content mt-15">
                  <h3 class="blog-title font-theme  lh-base fs-20 mb-1"><a href="#"><?php echo $news['news_title']; ?></a></h3>
                  <div class="blog-meta text-light fs-xs">
                     <i class="fal fa-calendar-alt"></i> <?php 
                        $date = show_date_only($news['created_at']);
                        
                        echo $date;
                        
                         ?>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
   </div>
</div>
<section class="vs-newsletter-wrapper bg-light-dark">
   <div class="container">
      <div class="position-relative">
         <div class="bg-light-gray bg-major-black end-0 inner-wrapper px-50 py-50 start-0 top-50" style=" position: relative; top: -40px !important; ">
            <div class="row align-items-center justify-content-center justify-content-xl-start">
               <div class="text-center text-xl-start col-xl-6 mb-4 mb-xl-0">
                  <h2 class="mb-0 text-white h3 font-theme3"><img class="align-middle me-2" src="user_assets/img/icons/newsletter-2.png" alt="Newsletter Icon"> get newsletter</h2>
               </div>
               <div class="col-sm-11 col-lg-7 col-xl-6 text-center text-md-end">
                  <form action="<?= base_url() ?>saveemail" method="post" class="newsletter-style2 d-md-flex m-auto">
					  <input type="email" name="email" id="email" class="form-control" placeholder="Enter email address"> <button class="vs-btn style1 mt-3 mt-md-0" type="submit">Subscribe Now</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>