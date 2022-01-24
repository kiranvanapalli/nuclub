<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="col-12">
             <h3>View Movie Details</h3>
            <div class="profile__content">
               <!-- profile user -->
               <div class="profile__user">
                  <div class="profile__avatar">
                     <i class="h2 la-film las m-0 pb-1 pl-0 pr-0 pt-1 text-center text-white w-100"></i>
                  </div>
                  <!-- or red -->
                  <div class="profile__meta profile__meta--green">
                     <h3><?php echo $get_movie['movie_title']; ?></h3>
                  </div>
               </div>
               <!-- end profile user -->
               <!-- profile btns -->
               <div class="profile__actions">
                  <a href="<?= base_url(); ?>edit_movie?id=<?php echo $get_movie['movie_id']; ?>" class="profile__action profile__action--banned open-modal">
                  <i class="las la-edit"></i></a>
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
                                 <img src="<?= base_url(); ?>uploads/movie_images/<?= $get_movie['movie_image']; ?>"  alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-lg-3">
                              <h3 class="dtp text-center"><?= $get_movie['year'] ?></h3>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-9">
                              <h3 class="dtp text-center"><?= $get_movie['movie_link']; ?></h3>
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