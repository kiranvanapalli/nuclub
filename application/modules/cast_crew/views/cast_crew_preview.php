<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="col-12">
             <h3>View Cast & Crew Details</h3>
           
            <div class="profile__content">
               <!-- profile user -->
               <div class="profile__user">
                  <div class="profile__avatar">
                     <i class="h2 la-film las m-0 pb-1 pl-0 pr-0 pt-1 text-center text-white w-100"></i>
                  </div>
                  <!-- or red -->
                  <div class="profile__meta profile__meta--green">
                     <h3><?php echo $get_cast_crew_data['name']; ?></h3>
                  </div>
               </div>

               <!-- end profile user -->
               <!-- profile btns -->
               <div class="profile__actions">
                  <a href="<?= base_url(); ?>edit_cast_crew_details?id=<?php echo $get_cast_crew_data['cast_crew_id']; ?>" class="profile__action profile__action--banned open-modal">
                  <i class="las la-edit"></i></a>
               </div>
               <!-- end profile btns -->
            </div>

         </div>
         <!--        --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="#" class="form">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <img src="<?= base_url(); ?>uploads/upcoming_movies_images/cast_crew_images/<?= $get_cast_crew_data['image']; ?>"  alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-lg-6">
                              <h3 class="dtp text-center">
                                 <?php 
                              foreach($movie_list as $movie_list)
                              {
                              if($movie_list['movie_id'] == $get_cast_crew_data['movie_id'])
                              {
                                 echo $movie_list['title'];
                              } }?>
                              </h3>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-6">
                              <h3 class="dtp text-center"><?php 
                              foreach($role_list as $role_list)
                              {
                              if($role_list['role_id'] == $get_cast_crew_data['role'])
                              {
                                 echo $role_list['role_name'];
                              } }?></h3>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-12">
                              <h3 class="dtp text-center"><?= $get_cast_crew_data['link']; ?></h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!--        --------------------body-------------------------->
      </div>
   </div>
</div>