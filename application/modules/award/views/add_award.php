<style type="text/css">
    .select2-container--default .select2-selection--multiple {
    background-color: black !important;
    }
    container--default .select2-results__options .select2-results__option[aria-selected="true"] {
    /* background-color: #666ee8 !important; */
    color: black !important;
}
</style>
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <div class="col-8">
               <div class="main__title">
                  <h2>Add Awards</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <!--                        <a href="Awardsdetailpage.html" class="main__title-link">Save</a>-->
               </div>
            </div>
         </div>
         <!--            --------------------body-------------------------->
         <div class="row">
            <div class="col-12">
               <form action="#" class="form" name="award_form" id="award_form">
                  <div class="row row--form">
                     <div class="col-12 col-md-5 form__cover">
                        <div class="row row--form">
                           <div class="col-12 col-sm-6 col-md-12">
                              <div class="form__img">
                                 <label for="form__img-upload">Upload cover (270 x 400)</label>
                                  <input id="form__img-upload" name="award_image" id="award_image" type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this);">
                                 <img id="form__img" src="#" alt=" ">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-7 form__content">
                        <div class="row row--form">
                           <div class="col-12 col-lg-8">
                           <select class="form-control form__gallery" name="award_title" id="award_title">
                              <option value="">Please Select Movie</option>
                              <?php foreach($movie_list as $list)
                              {?>
                                    <option value="<?php echo $list['movie_id']; ?>"><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                           </div>
                           <div class="col-12 col-lg-4">
                              <input type="text" class="form__input" placeholder="year" id="year" name="year" >
                           </div>
                           <div class="col-12 col-sm-6 col-lg-6 ">
                         
                              <select  class="form-control form__input" name="award_type[]" id="award_type" multiple="multiple">
                                 <option value>Select Award</option>
                                   <?php foreach($award_type as $award_type){ ?>
                                  <option value="<?php echo $award_type['award_type_id']; ?>"><?php echo $award_type['award_name']; ?></option>
                              <?php } ?>
                              </select>

                           </div>
                           <div class="col-12 col-lg-6">
                              <input type="text" class="form__input" placeholder="link" name="link" id="link">
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
         <!--            --------------------body-------------------------->
      </div>
   </div>
</div>