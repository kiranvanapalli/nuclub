    <div class="breadcumb-wrapper breadcumb-layout1 pt-60 pb-50" data-bg-src="user_assets/img/breadcumb/breadcumb-1.jpg" data-overlay>
         <div class="container z-index-common">
            <div class="breadcumb-content text-center">
               <h1 class="breadcumb-title h1 text-white my-0">Awards</h1>
               <h2 class="breadcumb-bg-title">Awards</h2>
               <ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
                  <li><a href="<?php echo base_url(); ?>"><i class="fal fa-home"></i>Home</a></li>
                  <li class="active">Awards</li>
               </ul>
            </div>
         </div>
      </div>
      
      <section class="vs-match-wrapper vs-match-layout1 newsletter-pb">
         <div class="container">
            <div class="mb-15 filter-active row moviename ">
                    <?php foreach($award_list as $award){
                         $award_type= explode(",", $award['award_type']);
                     ?>
                          <div class="vs-blog col-xl-3 grid-item pubg fortnite csgo">
                            <div class="position-relative">
                                <a href="#" class="overlay overlay-lg"></a>
                                <div class="blog-image"><img src="<?php echo base_url(); ?>uploads/award_images/<?php echo $award['award_image']; ?>" alt="Featured Blog Image" class="w-100" /></div>
                                <div class="blog-content pos-bottom">
                                     
                                    <h3 class="blog-title h5  font-theme lh-base mb-2"><a href="#"><?php echo $award['award_title']; ?></a></h3>
                                    <div class="blog-meta text-light-white fs-xs">
                                        <a href="#"><i class="fal fa-calendar-alt"></i><?php echo $award['award_year']; ?></a>
                                    </div>
                                    <div class="blog-meta text-light-white fs-xs">

                                       

                                            <?php 
                                              foreach($award_type_list as $award_type_data)
                                              {
                                            foreach($award_type as $aw)
                                            {

                                                if($aw == $award_type_data['award_type_id'])
                                                {?>
                                                     <a href="#"><i class="fal fa-award"></i>
                                                    <?php  
                                                    echo "#".$award_type_data['award_name']."<br>";
                                                   
                                                }

                                            }
                                        } ?>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                        
                      
                       
                       
              
              
               
                
         </div>
      </section>