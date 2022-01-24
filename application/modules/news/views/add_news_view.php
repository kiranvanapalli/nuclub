
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <div class="col-8">
               <div class="main__title">
                  <h2>Add News</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <a href="<?= base_url() ?>news" class="main__title-link">News List</a>
               </div>
            </div>
         </div>
         <!--           --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="" class="form" id="news_form" name="news_form">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload" id="cover">Upload cover (270 x 400)</label>
                                 <input id="form__img-upload" name="news_image" id="news_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this)">
                                 <img id="form__img" src="#" alt=" ">
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
                                    <option value="<?php echo $list['movie_id']; ?>"><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12">
                              <input type="text" class="form__input" placeholder="Title" name="title" id="title">
                           </div>
                           <div class="col-12">
                              <textarea id="text" name="description" id="description" class="form__textarea" placeholder="Description" rows="5" ></textarea>
                           </div>
                        </div>
                        <div class="col-12">
                           <button type="submit" class="main__title-link" name="save_news_details" id="save_news_details">Save</button>
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