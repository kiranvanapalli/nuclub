<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <!--
            <div class="row mb-2">
                <div class="col-8">
                    <div class="main__title">
                        <h2>Janatha Garage</h2>
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="main__title">
                        <a href="add-item.html" class="main__title-link">Add Movie</a>
                    </div>
                </div>
            </div>
            -->
         <div class="col-12">
            <div class="profile__content">
               <!-- profile user -->
               <div class="profile__user">
                  <div class="profile__avatar">
                     <i class="h2 la-film las m-0 pb-1 pl-0 pr-0 pt-1 text-center text-white w-100"></i>
                  </div>
                  <!-- or red -->
                  <div class="profile__meta profile__meta--green">
                     <h3><?php echo $get_upcoming_moive_details['title']; ?></h3>
                  </div>
               </div>
               <!-- end profile user -->
               <!-- profile btns -->
               <div class="profile__actions">
                  <a href="pereditpage.html" class="profile__action profile__action--banned open-modal">
                  <i class="las la-edit"></i></a>
                 
               </div>
               <!-- end profile btns -->
            </div>
         </div>
         <!--            --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="#" class="form" >
                  <div class="row row--form">
                     <div class="col-12 col-md-4">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $get_upcoming_moive_details['cover_image']; ?>"  alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-8">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/banner_images/<?php echo $get_upcoming_moive_details['banner_image']; ?>"  alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12">
                        <div class="row row--form">
                           <div class="col-12">
                              <p class="dtp"><?php echo $get_upcoming_moive_details['synopsis']; ?></p>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-12">
                              <h3 class="dtp text-center"><?php echo $get_upcoming_moive_details['released_year']; ?></h3>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="row row--form">
                           <div class="col-12">
                              <iframe width="100%" height="315" src="<?php echo $get_upcoming_moive_details['movie_link']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </div>
                        </div>
                     </div>
                     

                    
                    
                     <div class="col-12">
                        <div class="row row--form">
                           <div class="col-lg-12">
                              <h3>Short Details</h3>
                           </div>
                           <div class="col-12">
                              <p class="dtp"><strong>Stars: </strong><?php foreach($cast_crew as $cast_crew_data)
                              {
                                if($cast_crew_data['role'] == 1)
                                {   
                                    echo " ";
                                    echo $cast_crew_data['name'];
                                }

                                if($cast_crew_data['role'] == 2)
                                {
                                    echo $cast_crew_data['name'];
                                    echo ",";
                                }
                              } ?></p>
                           </div>
                          
                          
                           <div class="col-lg-4">
                              <p class="dtp"><strong>Director Name : </strong>
                                 <?php foreach($cast_crew as $cast_crew_data)
                                {
                                if($cast_crew_data['role'] == 3)
                                {
                                    echo $cast_crew_data['name'];
                                }
                                else
                                {
                                    echo "";
                                } }?>
                            </p>
                       
                           </div>
                           <div class="col-lg-8">
                              <p class="dtp"><strong>Cinematographer : </strong><?php foreach($cast_crew as $cast_crew_data)
                                {
                                if($cast_crew_data['role'] == 5)
                                {
                                    echo $cast_crew_data['name'];
                                }
                                else
                                {
                                    echo "";
                                } }?>  </p>
                           </div>
                           <div class="col-lg-4">
                              <p class="dtp"><strong>Music Director : </strong><?php foreach($cast_crew as $cast_crew_data)
                                {
                                if($cast_crew_data['role'] == 6)
                                {
                                    echo $cast_crew_data['name'];
                                }
                                else
                                {
                                    echo "";
                                } }?>
                           </div>
                           <div class="col-lg-4">
                              <p class="dtp"><strong>Art Director Name : </strong> <?php foreach($cast_crew as $cast_crew_data)
                                {
                                if($cast_crew_data['role'] == 7)
                                {
                                    echo $cast_crew_data['name'];
                                }
                                else
                                {
                                    echo "";
                                } }?> </p>
                           </div>
                           <div class="col-lg-4">
                              <p class="dtp"><strong>Editor Name : </strong> <?php foreach($cast_crew as $cast_crew_data)
                                {
                                if($cast_crew_data['role'] == 8)
                                {
                                    echo $cast_crew_data['name'];
                                }
                                else
                                {
                                    echo "";
                                } }?></p>
                           </div>
                       
                        </div>
                     </div>
                
                     <div class="col-12">
                        <div class="row row--form">
                           <div class="col-lg-12">
                              <h3>CAST & CREW</h3>
                           </div>
                           <?php foreach($cast_crew as $data){ ?>
                           <div class="col-12">
                              <div class="row">
                                 <div class="col-3">
                                    <div class="form__img" style=" height: 150px; "> <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cast_crew_images/<?php echo $data['image']; ?>" alt=""> </div>
                                 </div>
                                 <div class="col-9">
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <p class="dtp"><strong>Acter Name :</strong> <?php echo $data['name']; ?> </p>
                                       </div>
                                       <div class="col-lg-4">
                                          <p class="dtp"><strong>Acter Role :</strong> <?php echo $data['role']; ?> </p>
                                       </div>
                                       <div class="col-4">
                                          <p class="dtp">Fav | <?php echo $data['is_fav']; ?></p>
                                       </div>
                                       <div class="col-lg-12">
                                          <p class="dtp"><strong>link :</strong> <?php echo $data['link']; ?> </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-12 dropdown-divider"></div>
                       <?php } ?>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="row row--form">
                           <div class="col-lg-12">
                              <h3>Slideing Images</h3>
                           </div>
                           <div class="col-12">
                              <div class="row">
                                 <div class="col-3">
                                    <div class="form__img"> <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $get_upcoming_moive_details['sliding_image1']; ?>" alt=""> </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form__img"> <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $get_upcoming_moive_details['sliding_image2']; ?>" alt=""> </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form__img"> <img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $get_upcoming_moive_details['sliding_image3']; ?>" alt=""> </div>
                                 </div>
                                 <div class="col-3">
                                    <div class="form__img"><img src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $get_upcoming_moive_details['sliding_image4']; ?>" alt=""></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!--            --------------------body-------------------------->
      </div>
   </div>
</div>