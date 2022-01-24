<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Edit Movie Details</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <!--                      <a href="Upcomingmovies.html" class="main__title-link">Save</a>-->
               </div>
            </div>
         </div>
         <!--           --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form class="form" name="edit_movie_from" id="edit_movie_from" autocomplete="off">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload" id="cover_label">Upload cover (270 x 400)</label>
                                  <input id="form__img-upload" name="movie_image"  type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this)">
                                 <img id="form__img" name = "old_image" src="<?php echo base_url(); ?>uploads/movie_images/<?php echo $edit_movie['movie_image']; ?>" alt=" ">
                                 <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_movie['movie_image']; ?>">
                                 <img id ="updated_image" src="#" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-12">
                              <input type="text" class="form__input" placeholder="Title" name="movie_title" id="movie_title" value="<?php echo $edit_movie['movie_title']; ?>">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <input type="text" class="form__input" placeholder="Release Date" id="date" name="date" value="<?php echo $edit_movie['year']; ?>">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-8">
                              <input type="text" class="form__input" placeholder="Link" id="movie_link" name="movie_link" value="<?php echo $edit_movie['movie_link']; ?>">
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
                              <br>
                              <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_movie['movie_id']; ?>">
                        <div class="col-12">
                         <button type="submit" class="main__title-link">Update</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <!--           --------------------body-------------------------->
      </div>
   </div>
</div>