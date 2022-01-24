<style>
    img#previewImg {
        width: 200px;
        height: 130px;
    }
</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-basic">Lead Information</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <div class="btn-group float-md-right">
                                        <a class="btn btn-primary round btn-min-width mr-1 mb-1"
                                            href="<?php echo base_url(); ?>lead_list" aria-haspopup="true"
                                            aria-expanded="false" id="blog"> <i class="las la-arrow-circle-left"></i>
                                            Lead's</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="edit_lead_form" name="edit_lead_form">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-clipboard"></i> Lead Details</h4>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo $edit_lead['email']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                         
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="parts_description">Parts Description</label>
                                                        <textarea class="textarea" id="parts_description" name="parts_description" placeholder="Place some text here" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $edit_lead['parts_description']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="additional_information">Additional Information</label>
                                                        <textarea class="textarea" id="additional_information" name="additional_information" placeholder="Place some text here" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $edit_lead['additional_information']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                               <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="contact_information">Contact Information</label>
                                                        <textarea class="textarea" id="contact_information" name="contact_information" placeholder="Place some text here" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $edit_lead['contact_information']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <input type="hidden" name="edit_id" value="<?php echo $edit_lead['lead_id']; ?>">
                                            <div class="form-group row">
                                                <div class="col-lg-12 col-md-12">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="">Select Status</option>
                                                        <option value="1" <?php if($edit_lead['status']==1) {
                                                            echo 'selected' ;} ?>>
                                                            Active</option>
                                                        <option value="0" <?php if($edit_lead['status']==0) {
                                                            echo 'selected' ;} ?>>In
                                                            Active</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1" id="cancel">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Update
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>

    </div>
</div>