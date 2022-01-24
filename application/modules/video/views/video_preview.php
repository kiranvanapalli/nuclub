<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="col-12">
            <div class="profile__content">
               <!-- profile user -->
               <div class="profile__user">
                  <div class="profile__avatar">
                     <i class="h2 la-video las m-0 pb-1 pl-0 pr-0 pt-1 text-center text-white w-100"></i>
                  </div>
                  <!-- or red -->
                  <div class="profile__meta profile__meta--green">
                     <h3><?php echo $get_video_details['video_title']; ?></h3>
                  </div>
               </div>
               <!-- end profile user -->
               <!-- profile btns -->
               <div class="profile__actions">
                  <a href="<?php echo base_url(); ?>edit_video_details?id=<?php echo $get_video_details['video_id']; ?>" class="profile__action profile__action--banned open-modal">
                  <i class="las la-edit"></i></a>
                  <!-- <a href="Videos.html" class="profile__action profile__action--banned open-modal">
                  <i class="las la-save"></i></a> -->
               </div>
               <!-- end profile btns -->
            </div>
         </div>
         <!--			--------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="#" class="form">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <img src="<?php echo base_url(); ?>uploads/videos/<?php echo $get_video_details['video_image']; ?>"  alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                        <div class="col-6 col-sm-6 col-lg-12">
                        <?php 
                           foreach($movie_list as $movie_list)
                              {
                              if($movie_list['movie_id'] == $get_video_details['movie_id'] )
                              { ?>
                                    <h3 class="dtp text-center"><?php echo $movie_list['title']; ?></h3>   
                              <?php } }
                              ?>
                           </div>
                           <div class="col-6 col-sm-6 col-lg-12">
                              <h3 class="dtp text-center"><?php echo $get_video_details['date']; ?></h3>
                           </div>
                           <!--
                              <div class="col-12 col-sm-6 col-lg-12">
                              	<h3 class="dtp text-center">https://en.wikipedia.org/wiki/Janatha_Garage</h3>
                              </div>
                              -->
                           <div class="col-12 col-sm-6 col-lg-12">
                              <iframe width="100%" height="260" src="<?php echo $get_video_details['youtube_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!--			--------------------body-------------------------->
      </div>
   </div>
</div>