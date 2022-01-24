<!--        ---------------------------------  Menu  ----------------------------------->
<div class="breadcumb-wrapper breadcumb-layout1 pt-60 pb-50" data-bg-src="user_assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
   <div class="container z-index-common">
      <div class="breadcumb-content text-center">
         <h1 class="breadcumb-title h1 text-white my-0">All Movies</h1>
         <h2 class="breadcumb-bg-title">M.M.M</h2>
         <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
            <li><a href="<?php echo base_url(); ?>"><i class="fal fa-home"></i>Home</a></li>
            <li class="active">All Movies</li>
         </ul>
      </div>
   </div>
</div>
<div class="moviename">
   <section class="featured-blog-wrapper space-top space-md-bottom">
      <div class="container">
         <div class="row">
            <?php foreach ($all_movies_list as $movies) { ?>
               <div class="vs-blog col-xl-3 grid-item pubg fortnite csgo">
                  <div class="position-relative">
                     <a href="<?php echo $movies['movie_link']; ?>" target="_blank" class="overlay overlay-lg"></a>
                     <div class="blog-image"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $movies['cover_image']; ?>" alt="Featured Blog Image" class="w-100" /></div>
                     <div class="blog-content pos-bottom">
                        <div class="blog-content pos-bottom">
                           <div class="position-absolute top-0 end-0 pr-20">
                              <a href="<?php echo $movies['movie_link']; ?>" target="_blank" class="play-btn style-white" tabindex="-1"><i class="fas fa-play"></i></a>
                           </div>
                           <!--  <div class="blog-category mb-1"><a href="#">#Mythri Movie Makers</a></div> -->
                           <h3 class="blog-title h5  font-theme lh-base mb-2"><a href="#" ><?php echo $movies['title']; ?></a></h3>
                           <div class="blog-meta text-light-white fs-xs">
                              <a href="<?php echo $movies['movie_link']; ?>" target="_blank"><i class="fal fa-calendar-alt"></i><?php echo $movies['released_year']; ?></a>
                           </div>
                        </div>
                     </div>
                  </div>
               <?php } ?>
               </div>
         </div>
   </section>
</div>