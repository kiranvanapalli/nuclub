<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-lg-4">
               <div class="main__title">
                  <h2>Edit Upcoming Movies</h2>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="main__title">
                  <a href="<?php echo base_url() ?>movie_cast_details?id=<?php echo $edit_movie['movie_id']; ?>"class="main__title-link">Cast & Crew</a>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="main__title">
                  <a href="<?php echo base_url() ?>upcoming_movies" class="main__title-link">Back</a>
               </div>
            </div>
         </div>
         <div class="col-12">
            <form action="#" class="form" autocomplete="off" name="edit_movies_form" id="edit_movies_form">
               <div class="row row--form">
               <div class="col-12 col-sm-6 col-lg-12 mb-2">
                            <h6>Movie Status</h6>
                              <select class="form-control" name="movie_status" id="movie_status">
                                 <option value="">Select Movie Released Status</option>
                                 <option value="released"<?php if($edit_movie['movie_status'] == 'released') { echo 'selected';} ?>>Released</option>
                                 <option value="upcoming"<?php if($edit_movie['movie_status'] == 'upcoming') { echo 'selected';} ?>>Upcoming</option>
                              </select>
                              </div>
                              <div class="col-12 col-md-12">
                     <div class="row row--form">
                        <div class="col-12 col-sm-12 col-md-12">
                        <div class="form__img">
                              <label for="background_img"></label>
                              <input id="background_img" name="background_img" type="file" accept=".png, .jpg, .jpeg" onchange="previewBackgroud(this);"/> 
                              <img id="form__img_back" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/background_images/<?php echo $edit_movie['background_img']; ?>" alt=" ">
                              <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_movie['background_img']; ?>">
                              <img id="form__img_background" src="#" alt=" " /> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-4">
                     <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                           <div class="form__img">
                              <label for="cover_image"></label>
                              <input id="cover_image" name="cover_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);"/> 
                              <img id="form__img" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $edit_movie['cover_image']; ?>" alt=" ">
                              <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_movie['cover_image']; ?>">
                              <img id="form__img_cover" src="#" alt=" " /> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-8">
                     <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                           <div class="form__img">
                              <label for="form__img-upload_banner"></label>
                              <input id="form__img-upload_banner" name="movie_banner" type="file" accept=".png, .jpg, .jpeg" onchange="previewBanner(this);"/> 
                              <img id="form__img1" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/banner_images/<?php echo $edit_movie['banner_image']; ?>" alt=" ">
                              <input type="hidden" name="old_banner_image" id="old_art_img" value="<?php echo $edit_movie['banner_image']; ?>">
                              <img id="form__img_banner" src="#" alt=" " /> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-12">
                     <div class="row row--form">
                        <div class="col-8">
                           <input type="text" class="form__input" placeholder="Title" name="movie_title" id="movie_title" value="<?php echo $edit_movie['title']; ?>" /> 
                        </div>
                        <div class="col-4 col-sm-4 col-lg-4">
                           <input type="text" class="form__input" placeholder="Release year" id="date" name="date" value ="<?php echo $edit_movie['released_year']; ?>" /> 
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row row--form">
                        <div class="col-lg-12">
                           <input type="text" class="form__input" placeholder="Movie link" name="movie_link" id="movie_link" value ="<?php echo $edit_movie['movie_link']; ?>" /> 
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row row--form">
                        <div class="col-lg-12">
                           <h3>Synopsis</h3>
                        </div>
                        <div class="col-12">
                           <textarea id="text" class="form__textarea" placeholder="Synopsis" name="synopsis" id="synopsis"><?php echo $edit_movie['synopsis']; ?></textarea>
                        </div>
                        <!-- <div class="col-lg-4">
                           <input type="text" class="form__input" placeholder="Director Name" /> 
                           </div>
                           <div class="col-lg-8">
                           <input type="text" class="form__input" placeholder="Cinematographer Name" /> 
                           </div>
                           <div class="col-lg-4">
                           <input type="text" class="form__input" placeholder="Music Director Name" /> 
                           </div>
                           <div class="col-lg-4">
                           <input type="text" class="form__input" placeholder="Art Director Name" /> 
                           </div>
                           <div class="col-lg-4">
                           <input type="text" class="form__input" placeholder="Editor Name" /> 
                           </div> -->
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row row--form">
                        <div class="col-12">
                           <div class="row row--form">
                              <div class="col-lg-12">
                                 <h3>Slideing Images</h3>
                              </div>
                              <div class="col-12">
                                 <div class="row">
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover1"></label>
                                          <input id="upload_cover1" name="cover_image1" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover1(this);" /> 
                                          <img id="form__img_cover1" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $edit_movie['sliding_image1']; ?>" alt=" ">
                                          <input type="hidden" name="old_art_img_cover1" id="old_art_img" value="<?php echo $edit_movie['sliding_image1']; ?>">
                                          <img id="cover1" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover2"></label>
                                          <input id="upload_cover2" name="cover_image2" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover2(this);" /> 
                                          <img id="form__img_cover2" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $edit_movie['sliding_image2']; ?>" alt=" ">
                                          <input type="hidden" name="old_art_img_cover2" id="old_art_img" value="<?php echo $edit_movie['sliding_image2']; ?>">
                                          <img id="cover2" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover3"></label>
                                          <input id="upload_cover3" name="cover_image3" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover3(this);" /> 
                                          <img id="form__img_cover3" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $edit_movie['sliding_image3']; ?>" alt=" ">
                                          <input type="hidden" name="old_art_img_cover3" id="old_art_img" value="<?php echo $edit_movie['sliding_image3']; ?>">
                                          <img id="cover3" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover4"></label>
                                          <input id="upload_cover4" name="cover_image4" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover4(this);" />
                                          <img id="form__img_cover4" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cover_images/<?php echo $edit_movie['sliding_image4']; ?>" alt=" ">
                                          <input type="hidden" name="old_art_img_cover4" id="old_art_img" value="<?php echo $edit_movie['sliding_image4']; ?>">
                                          <img id="cover4" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6 col-lg-12">
                            <h6>Status</h6>
                              <select class="form-control" name="status" id="status">
                                 <option value="">Select Status</option>
                                 <option value="1"<?php if($edit_movie['status'] == 1) { echo 'selected';} ?>>Active</option>
                                 <option value="0"<?php if($edit_movie['status'] == 0) { echo 'selected';} ?>>In Active</option>
                              </select>
                              </div>
                           </div>
                           
                        </div>
                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_movie['movie_id']; ?>">

                        <div class="col-12">
                             <br>
                           <button type="submit" class="main__title-link" name="save_news_details">Update</button>
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