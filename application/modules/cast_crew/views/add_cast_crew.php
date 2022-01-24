<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Add Cast & Crew Details</h2>
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
               <form action="" class="form" name="cast_crew_form" id="cast_crew_form" autocomplete="off">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload" class="label_name"></label>
                                 <input id="form__img-upload" name="cast_crew_image" id="cast_crew_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
                                 <img id="form__img" src="#" alt=" ">
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
                                    <option value="<?php echo $list['movie_id']; ?>"><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <input type="text" class="form__input" placeholder="Name" id="name" name="name">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <select class="form-control form__gallery" name="role" id="role">
                           <option value="">Please Select Role</option>
                              <?php foreach($role_list as $role)
                              {?>
                                    <option value="<?php echo $role['role_id']; ?>"><?php echo $role['role_name']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-8">
                              <input type="text" class="form__input form__gallery" placeholder="Link" id="link" name="link">
                           </div>
                           <div class="col-12 col-sm-6 col-lg-4">
                              <select class="form-control form__gallery" name="is_fav" id="is_fav">
                                 <option value="">Please Select</option>
                              <option value="yes">YES</option>
                              <option value="no">NO</option>
                            </select>
                           </div>
                        </div>
                        <div class="col-12">
                         <button type="submit" class="main__title-link">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>