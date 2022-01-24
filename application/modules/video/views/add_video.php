<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-body">
      <div class="row mb-2">
        <!-- main title -->
        <div class="col-8">
          <div class="main__title">
            <h2>Add Video</h2>
          </div>
        </div>
        <div class="col-4">
          <div class="main__title">
            <a href="<?= base_url() ?>videos" class="main__title-link">Video's List</a>
          </div>
        </div>
        <!-- end main title -->
      </div>
      <!--			--------------------body-------------------------->
      <div class="row">
        <div class="col-12">
          <form action="#" class="form" name="video_form" id="video_form">
            <div class="row row--form">
              <div class="col-12 col-md-5 form__cover">
                <div class="row row--form">
                  <div class="col-12 col-sm-6 col-md-12">
                    <div class="form__img">
                      <label for="form__img-upload">Upload cover (270 x 400)</label>
                      <input id="form__img-upload" name="video_image" id="video_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
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
                    <input type="text" class="form__input" placeholder="Title" name="video_title" id="video_title"> 
                  </div>
                  <div class="col-12 col-sm-6 col-lg-4" for="date">
                    <input type="date" for="date" class="form__input" placeholder="Date" name="date" id="date">
                  </div>
                 
                  <div class="col-lg-8">
                    <input type="text" class="form__input" placeholder="Youtube Embed link" name="youtube_link" id="youtube_link">
                  </div>
                  <!--  <div class="col-12 col-sm-6 col-lg-6">
                    <input type="text" class="form__input" placeholder="Amazon Prime link">
                  </div> -->
                  <div class="col-12">
                    <button type="submit" class="form__btn">Save</button>
                  </div>
                </div>
              </div>
            <!--   <div class="col-12">
                <div class="row row--form">
                  <div class="col-6">
                    <input type="text" class="form__input" placeholder="Amazon Prime link">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form__input" placeholder="Youtube link">
                  </div>
                  
                </div>
              </div> -->
            </div>
          </form>
        </div>
      </div>
      <!--			--------------------body-------------------------->
    </div>
  </div>
</div>