<style type="text/css">


.select2-container--default .select2-selection--multiple .select2-selection__choice__display {
cursor: default;
padding-left: 18px !important;
padding-right: 5px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
background-color: black !important;
}
.select2-container--default .select2-results>.select2-results__options 
    {
        background: black;
        color: white;
    }


</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <form action="#" class="form" name="edit_award_form" id="edit_award_form">
                        <div class="row row--form">
                            <div class="col-12 col-md-5 form__cover">
                                <div class="row row--form">
                                    <div class="col-12 col-sm-6 col-md-12">
                                        <div class="form__img">
                                            <label for="form__img-upload" id="cover_label">Upload cover (270 x 400)</label>
                                            <input id="form__img-upload" name="award_image"  type="file" accept=".png, .jpg, .jpeg" onchange="previewFile(this)">
                                            <img id="form__img" name = "old_image" src="<?php echo base_url(); ?>uploads/award_images/<?php echo $edit_award['award_image']; ?>" alt=" ">
                                            <input type="hidden" name="old_art_img" id="old_art_img" value="<?php echo $edit_award['award_image']; ?>">
                                            <img id ="updated_image" src="#" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 form__content">
                                <div class="row row--form">
                                    <div class="col-12 col-lg-8">
                                    <select class="form-control form__gallery" name="movie_id" id="movie_id">
                              <option value="">Please Select Movie</option>
                              <?php foreach($movie_list as $list)
                              {?>
                                    <!-- <option value="<?php echo $list['movie_id']; { echo 'selected';}  ?>"><?php echo $list['title'];  ?></option> -->
                                    <option value="<?php echo $list['movie_id']; ?>" <?php if($edit_award['movie_id'] == $list['movie_id']) { echo 'selected'; } ?>><?php echo $list['title']; ?></option>
                              <?php } ?>
                            </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <input type="text" class="form__input" placeholder="year" value="<?php echo $edit_award['award_year']; ?>" id="year" name="year">
                                    </div>
                                    <div class="col-12 col-lg-12 mb-2">
                                        <select  class="form-control form__input" name="award_type[]" id="award_type" multiple="multiple">
                                            <option value>Select Award</option>
                                            <?php
                                            $award = explode(",", $edit_award['award_type']);

                                                        foreach($award_type_list as $award_type)
                                                        {  
                                                        ?>
                                                    <option value="<?php echo $award_type['award_type_id']; ?>"
                                                    <?php 
                                                        foreach($award as $aw)
                                                        {
                                                        if($aw == $award_type['award_type_id'] )
                                                        {
                                                            echo "selected";
                                                        }
                                                    }
                                                     ?>> <?php echo $award_type['award_name'];  ?></option>
                                               <?php  }  ?> 
                                           
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <input type="text" class="form__input" placeholder="link" value="<?php echo $edit_award['award_link']; ?>" name="link" id="link">
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-12">
                                        <h6>Status</h6>
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Select Status</option>
                                            <option value="1"<?php if($edit_award['status'] == 1) { echo 'selected';} ?>>Active</option>
                                            <option value="0"<?php if($edit_award['status'] == 0) { echo 'selected';} ?>>In Active</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_award['award_id']; ?>">
                                <div class="col-12">
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