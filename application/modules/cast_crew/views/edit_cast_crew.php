<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Edit Cast & Crew Details</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                                   <a href="<?php echo base_url(); ?>cast_crew" class="main__title-link">Back</a>
               </div>
            </div>
         </div>
         <!--        --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="" class="form" name="edit_cast_crew_form" id="edit_cast_crew_form" autocomplete="off">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload" class="label_name"></label>
                                 <input id="form__img-upload" name="cast_crew_image" id="cast_crew_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
                                   <img id="form__img" name = "old_image" src="<?php echo base_url(); ?>uploads/upcoming_movies_images/cast_crew_images/<?php echo $edit_cast_crew_details['image']; ?>" alt=" ">
                                 <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_cast_crew_details['image']; ?>">
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

                                   <option value="<?php echo $list['movie_id']; ?>"<?php if($edit_cast_crew_details['movie_id'] == $list['movie_id']) { echo 'selected'; } ?>><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <input type="text" class="form__input" placeholder="Name" id="name" name="name" value="<?php echo $edit_cast_crew_details['name']; ?>">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <select class="form-control form__gallery" name="role" id="role">
                           <option value="">Please Select Role</option>
                              <?php foreach($role_list as $role)
                              {?>
                                    <option value="<?php echo $role['role_id']; ?>"<?php if($edit_cast_crew_details['role'] == $role['role_id']) { echo 'selected'; } ?>><?php echo $role['role_name']; ?></option>   
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-8">
                              <input type="text" class="form__input form__gallery" placeholder="Link" id="link" name="link" value="<?php echo $edit_cast_crew_details['link']; ?>">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <select class="form-control form__gallery" name="is_fav" id="is_fav">
                                 <option value="">Please Select</option>
                               <option value="yes"<?php if($edit_cast_crew_details['is_fav'] == "yes") { echo 'selected';} ?>>Yes</option>
                                        <option value="no"<?php if($edit_cast_crew_details['is_fav'] == "no") { echo 'selected';} ?>>No</option>
                            </select>
                           </div>
                            <div class="col-12 col-sm-6 col-lg-12">
                            <h6>Status</h6>
                              <select class="form-control" name="status" id="status">
                                 <option value="">Select Status</option>
                                 <option value="1"<?php if($edit_cast_crew_details['status'] == 1) { echo 'selected';} ?>>Active</option>
                                 <option value="0"<?php if($edit_cast_crew_details['status'] == 0) { echo 'selected';} ?>>In Active</option>
                              </select>
                              </div>
                        </div>

                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_cast_crew_details['cast_crew_id']; ?>">
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