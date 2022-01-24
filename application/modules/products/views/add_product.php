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
                                <h4 class="card-title" id="horz-layout-basic">Product Information</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <div class="btn-group float-md-right">
                                        <a class="btn btn-primary round btn-min-width mr-1 mb-1"
                                            href="<?php echo base_url(); ?>product_list" aria-haspopup="true"
                                            aria-expanded="false" id="product"> <i class="las la-arrow-circle-left"></i>
                                            Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="add_product" name="add_product">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-clipboard"></i> Product Details</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_type">Product
                                                            Type</label>
                                                        <select id="product_type" name="product_type"
                                                            class="form-control">
                                                            <option value="">Product Type
                                                            </option>
                                                            <?php
                                                        
                                                        foreach($product_type as $product_type)

                                                        { ?>
                                                            <option
                                                                value="<?php echo $product_type['product_type_id']; ?>">
                                                                <?php echo $product_type['product_type']; ?></option>
                                                            <?php }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_name">Product
                                                            Name</label>

                                                        <input type="text" id="product_name" class="form-control"
                                                            placeholder="Product Name" name="product_name">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="manufactured">Manufactured</label>

                                                        <select id="manufactured" name="manufactured"
                                                            class="form-control">
                                                            <option>Select
                                                                Manufactured
                                                            </option>
                                                            <?php
                                                        
                                                        foreach($manufactured as $manufactured)

                                                        { ?>
                                                            <option
                                                                value="<?php echo $manufactured['manufactured_id']; ?>">
                                                                <?php echo $manufactured['manufactured_name']; ?>
                                                            </option>
                                                            <?php }
                                                        ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="model_name">Model
                                                        </label>
                                                        <select class ="form-control" name="model_name" id="model_name"><option value="">Model</option></select>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="year">Year</label>
                                                        <select id="year" name="year" class="form-control">
                                                           <option value="">Select Year
                                                            </option>
                                                             <?php 
                                                            foreach ($years as $value) {
                                                                ?>
                                                                <option value="<?php echo $value['year_id'] ?>"><?php echo $value['year']; ?></option>
                                                                
                                                           <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="part_no">Part No
                                                        </label>

                                                        <input type="text" id="part_no" class="form-control"
                                                            placeholder="Part Number" name="part_no">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="engine_displacement">Engine
                                                            Displacement
                                                        </label>

                                                        <input type="text" id="engine_displacement" class="form-control"
                                                            placeholder="Engine Displacement"
                                                            name="engine_displacement">

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="price">Price
                                                        </label>

                                                        <input type="text" id="price" class="form-control"
                                                            placeholder="Price" name="price">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Promotions</label>
                                                        <div class="input-group" style="display: grid !important;">
                                                            <div
                                                                class="d-inline-block custom-control custom-radio mr-1">
                                                                <input type="radio" name="promotion_value"
                                                                    class="custom-control-input promotion_value" id="yes" value="yes">
                                                                <label class="custom-control-label"
                                                                    for="yes">Yes</label>
                                                            </div>
                                                            <div class="d-inline-block custom-control custom-radio">
                                                                <input type="radio" name="promotion_value"
                                                                    class="custom-control-input promotion_value" id="no" value ="no">
                                                                <label class="custom-control-label" for="no">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Product
                                                            Image</label>
                                                        <input class="form-control" type="file" id="product_image" name="product_image"
                                                            onchange="previewFile(this);">
                                                        <span class="file-custom"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center imgdiv" style="display:none;">
                                                <img alt="gallery" id="previewImg"
                                                    class="form-group img-thumbnail previewImg">
                                            </div>
                                            <div class=row>
                                                <div class="col-md-12" id="promotion_div" style="display:none;">
                                                    <div class="form-group">
                                                        <label for="promotions_name">Promotions</label>
                                                        <select id="promotions_name" name="promotions_name" class="form-control">
                                                            <option value ="">Please Select Promotion
                                                            </option>
                                                            <?php
                                                        foreach($promotions as $promotions)

                                                        { ?>
                                                            <option value="<?php echo $promotions['promotion_id']; ?>">
                                                                <?php echo $promotions['promotion_name']; ?></option>
                                                            <?php }
                                                        ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
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