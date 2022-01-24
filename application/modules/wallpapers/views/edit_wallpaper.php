<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Edit Wallpaper Details</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                                   <a href="<?php echo base_url(); ?>wallpapers" class="main__title-link">Back</a>
               </div>
            </div>
         </div>
         <!--        --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="" class="form" name="edit_wallpaper_form" id="edit_wallpaper_form" autocomplete="off">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload" class="label_name"></label>
                                 <input id="form__img-upload" class="wallpaper_img" name="wallpaper_img" id="wallpaper_img" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
                                   <img id="form__img" name = "old_image" src="<?php echo base_url(); ?>uploads/wallpapers/<?php echo $edit_wallpaper_details['wallpaper_img']; ?>" alt=" ">
                                 <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_wallpaper_details['wallpaper_img']; ?>">
                                 <img id ="updated_image" src="#" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-lg-4">
                            <select class="form-control form__gallery" name="movie_title" id="movie_title">
                              <option value="">Please Select Movie</option>
                              <?php foreach($movie_list as $list)
                              {?>

                                   <option value="<?php echo $list['movie_id']; ?>"<?php if($edit_wallpaper_details['movie_id'] == $list['movie_id']) { echo 'selected'; } ?>><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                          
                          
                          
                          
                            <div class="col-12 col-sm-6 col-lg-12">
                            <h6>Status</h6>
                              <select class="form-control" name="status" id="status">
                                 <option value="">Select Status</option>
                                 <option value="1"<?php if($edit_wallpaper_details['status'] == 1) { echo 'selected';} ?>>Active</option>
                                 <option value="0"<?php if($edit_wallpaper_details['status'] == 0) { echo 'selected';} ?>>In Active</option>
                              </select>
                              </div>
                        </div>

                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_wallpaper_details['wallpaper_id']; ?>">
                        <div class="col-12">
                           <br>

                         <button type="submit" class="main__title-link">Update</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>