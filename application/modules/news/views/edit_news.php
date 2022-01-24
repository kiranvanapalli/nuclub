
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <div class="col-8">
               <div class="main__title">
                  <h2>Edit News</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <a href="<?= base_url() ?>news" class="main__title-link">News List</a>
               </div>
            </div>
         </div>
         <!---------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="" class="form" id="edit_news_form" name="edit_news_form">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload" id="cover">Upload cover (270 x 400)</label>
                                 <input id="form__img-upload" name="news_image"  type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this)">
                                 <img id="form__img" name = "old_image" src="<?php echo base_url(); ?>uploads/news_images/<?php echo $edit_news['image']; ?>" alt=" ">
                                 <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_news['image']; ?>">
                                 <img id ="updated_image" src="#" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-12">
                           <select class="form-control form__gallery" name="movie_id" id="movie_id">
                              <option value="">Please Select Movie</option>
                              <?php foreach($movie_list as $list)
                              {?>
                                    <!-- <option value="<?php echo $list['movie_id']; { echo 'selected';}  ?>"><?php echo $list['title'];  ?></option> -->
                                    <option value="<?php echo $list['movie_id']; ?>" <?php if($edit_news['movie_id'] == $list['movie_id']) { echo 'selected'; } ?>><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12">
                              <input type="text" class="form__input" placeholder="Title" name="title" id="title" value="<?php echo $edit_news['news_title']; ?>">
                           </div>
                           <div class="col-12">
                              <textarea id="text" name="description" id="description" class="form__textarea" placeholder="Description" rows="5" ><?php echo $edit_news['news_description']; ?></textarea>
                           </div>
                           <!-- <div class="col-12">
                              <input type="text" class="form__input" placeholder="Date" name="date" id="date" value="<?php echo $edit_news['created_at']; ?>">
                           </div> -->
                           <div class="col-12" class="form_control">
                              <h6>Status</h6>
                              <select class="form-control" name="status" id="status">
                                 <option value="">Select Status</option>
                                 <option value="1"<?php if($edit_news['status'] == 1) { echo 'selected';} ?>>Active</option>
                                 <option value="0"<?php if($edit_news['status'] == 0) { echo 'selected';} ?>>In Active</option>
                              </select>
                           </div>
                        </div>
                        <br>
                        <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_news['news_id']; ?>">
                        <div class="col-12">
                           <button type="submit" class="main__title-link" name="save_news_details" id="save_news_details">Update</button>
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