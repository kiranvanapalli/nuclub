<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Add Behind Screen Details</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
            <a href="<?php echo base_url(); ?>behind_screen" class="main__title-link">Back</a>
               </div>
            </div>
         </div>
         <!--        --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="" class="form" name="add_behind_screen_form" id="add_behind_screen_form" autocomplete="off">
                  <div class="row">
                  <div class="col-6 form__img">
                <label for="form__img-upload" class="label_name"></label>
                <input id="form__img-upload" name="behind_screen_img" class="behind_screen_img" id="behind_screen_img" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
                  <img id="form__img" src="#" alt=""> 
                </div>
                <div class="col-6">
                  <div class="row">
                     <div class="col-12">
                <select class="form-control form__gallery" name="movie_title" id="movie_title">
                  <option value="">Please Select Movie</option>
                   <?php foreach($movie_list as $list)
                      {?>
                      <option value="<?php echo $list['movie_id']; ?>"><?php echo $list['title']; ?></option>
                     <?php } ?>
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