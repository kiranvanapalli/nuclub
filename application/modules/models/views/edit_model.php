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
                                <h4 class="card-title" id="horz-layout-basic">Edit Model Information</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <div class="btn-group float-md-right">
                                        <a class="btn btn-primary round btn-min-width mr-1 mb-1"
                                            href="<?php echo base_url(); ?>model" aria-haspopup="true"
                                            aria-expanded="false" id="product"> <i class="las la-arrow-circle-left"></i>
                                            Product Model</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="edit_product_model_form" name="edit_product_model_form">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-clipboard"></i>Edit Product Model Details
                                            </h4>
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="manufactured">Manufactured</label>

                                                        <select id="manufactured" name="manufactured"
                                                            class="form-control">
                                                            <option value="">Select
                                                                Manufactured
                                                            </option>
                                                            <?php
                                                        
                                                        foreach($manufactured as $manufactured)

                                                        { ?>
                                                            <option
                                                                value="<?php echo $manufactured['manufactured_id']; ?>"
                                                                <?php if($edit_model['manufactured_id'] == $manufactured['manufactured_id']) { echo 'selected'; } ?>>
                                                                <?php echo $manufactured['manufactured_name']; ?>
                                                            </option>
                                                            <?php }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="model_name">Model Name
                                                        </label>

                                                        <input type="text" id="model_name" class="form-control"
                                                            placeholder="Model Name" name="model_name"
                                                            value="<?php echo $edit_model['model_name']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="edit_id" value="<?php echo $edit_model['model_id']; ?>">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">Select Status</option>
                                                    <option value="1"
                                                        <?php if($edit_model['status'] == 1) { echo 'selected';} ?>>
                                                        Active</option>
                                                    <option value="0"
                                                        <?php if($edit_model['status'] == 0) { echo 'selected';} ?>>In
                                                        Active</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1" id="reset">
                                                <i class="ft-x"></i> Cancel
                                            </button>
                                          <!--   <input type="reset"  class="btn btn-warning mr-1"><i class="ft-x"></i> Reset -->
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