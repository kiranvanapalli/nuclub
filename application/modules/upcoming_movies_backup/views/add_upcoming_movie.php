<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-lg-6">
               <div class="main__title">
                  <h2>Upcoming Movies</h2>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="main__title">
                  <a href="<?php echo base_url() ?>upcoming_movies" class="main__title-link">Back</a>
               </div>
            </div>
         </div>
         <div class="col-12">
            <form action="#" class="form" autocomplete="off" name="upcoming_movies_form" id="upcoming_movies_form">
               <div class="row row--form">
                  <div class="col-12 col-md-4">
                     <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                           <div class="form__img">
                              <label for="movie_cover">Upload cover</label>
                              <input id="movie_cover" name="movie_cover" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);"/> 
                              <img id="form__img_cover" src="#" alt=" " /> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="col-12 col-md-4">
                     <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                           <div class="form__img">
                              <label for="form__img-upload">Upload cover</label>
                              <input id="form__img-upload" name="movie_cover" type="file" accept=".png, .jpg, .jpeg" onchange="previewBanner(this);"/> 
                              <img id="form__img_banner" src="#" alt=" " /> 
                           </div>
                        </div>
                     </div>
                     </div> -->
                  <div class="col-12 col-md-8">
                     <div class="row row--form">
                        <div class="col-12 col-sm-6 col-md-12">
                           <div class="form__img">
                              <label for="form__img-upload_banner">Upload Banner</label>
                              <input id="form__img-upload_banner" name="movie_banner" type="file" accept=".png, .jpg, .jpeg" onchange="previewBanner(this);"/> 
                              <img id="form__img_banner" src="#" alt=" " /> 
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-12">
                     <div class="row row--form">
                        <div class="col-8">
                           <input type="text" class="form__input" placeholder="Title" name="movie_title" id="movie_title" /> 
                        </div>
                        <div class="col-4 col-sm-4 col-lg-4">
                           <input type="text" class="form__input" placeholder="Release year" id="date" name="date" /> 
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row row--form">
                        <div class="col-lg-12">
                           <input type="text" class="form__input" placeholder="Movie link" name="movie_link" id="movie_link" /> 
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="row row--form">
                        <div class="col-lg-12">
                           <h3>Synopsis</h3>
                        </div>
                        <div class="col-12">
                           <textarea id="text" class="form__textarea" placeholder="Synopsis" name="synopsis" id="synopsis"></textarea>
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
                        
                           <div class="col-8">
                              <h3>1) CAST & CREW</h3>
                           </div>
                           <div class="col-lg-4">
                              <button type="button" class="main__title-link w-100 mb-2" id="add_cast_crew">Add One More Crew</button>
                           </div>
                           <div class="col-lg-12 cast_crew" id="cast_crew">
                              <div class="row">
                                 <div class="col-lg-9">
                                    <div class="row">
                                       <div class="col-lg-4">
                                          <select class="form-control form__gallery" name="role[]" id="role">
                                             <option value="">Select Role</option>
                                             <?php foreach($role_list as $roles)
                                                {?>
                                             <option value="<?php echo $roles['role_id']; ?>"><?php echo $roles['role_name']; ?></option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                       <div class="col-lg-8">
                                          <input type="text" class="form__input" placeholder="Name" name="name[]" id="name" /> 
                                       </div>
                                       <div class="col-lg-8">
                                          <input type="text" class="form__input" placeholder="add a link" name="link[]" id="link" /> 
                                       </div>
                                       <div class="col-lg-4">
                                          <select class="form-control form__gallery" name="fav[]" id="fav">
                                              <option value="">Please Select Favorite</option>
                                              <option value="yes">Yes</option>
                                              <option value="no">No</option>
                                          </select> 
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-3">
                                    <div class="form__img"style=" height: 110px; ">
                                       <label for="cast">Upload Image</label>
                                       <input id="cast" name="cast_photo[]" type="file" accept=".png, .jpg, .jpeg" onchange="previewCast(this);"  multiple class="img" /> <img id="form__img_cast1" src="#" alt=" " /> 
                                    </div>
                                    <button class="btn btn-danger btn_remove" type="button" id="1"style="float: left;" name="remove">Remove</button>
                                 </div>
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
                                       <div class="form__img">
                                          <label for="upload_cover1">Upload Cover Image 1</label>
                                          <input id="upload_cover1" name="cover_image1" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover1(this);" /> <img id="cover1" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover2">Upload Cover Image 2</label>
                                          <input id="upload_cover2" name="cover_image2" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover2(this);" /> <img id="cover2" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover3">Upload Cover Image 3</label>
                                          <input id="upload_cover3" name="cover_image3" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover3(this);" /> <img id="cover3" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                    <div class="col-3">
                                       <div class="form__img">
                                          <label for="upload_cover4">Upload Cover Image 4</label>
                                          <input id="upload_cover4" name="cover_image4" type="file" accept=".png, .jpg, .jpeg" onchange="previewcover4(this);" /> <img id="cover4" src="#" alt=" " /> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12">
                           
                           <button type="submit" class="main__title-link" name="save_news_details">Save</button>
                           
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