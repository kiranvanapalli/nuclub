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
                                <h4 class="card-title" id="horz-layout-basic">Blog Information</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <div class="btn-group float-md-right">
                                        <a class="btn btn-primary round btn-min-width mr-1 mb-1"
                                            href="<?php echo base_url(); ?>blog_list" aria-haspopup="true"
                                            aria-expanded="false" id="product"> <i class="las la-arrow-circle-left"></i>
                                            Blog</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="add_blog" name="add_blog">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-clipboard"></i> Blog Details</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="blog_category">Blog Category</label>
                                                        <select id="blog_category" name="blog_category"
                                                            class="form-control">
                                                            <option value="">Blog Category
                                                            </option>
                                                            <?php
                                                        
                                                foreach($all_blog_categories as $blog_categories)

                                                        { ?>
                                        <option value="<?php echo $blog_categories['category_id']; ?>">
                                                                <?php echo $blog_categories['category_name']; ?></option>
                                                            <?php }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_name">Blog Title</label>

                                                        <input type="text" id="blog_title" class="form-control"
                                                            placeholder="Blog Title" name="blog_title">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="part_no">Blog Image
                                                        </label>

                                                         <input class="form-control" type="file" id="blog_image" name="blog_image"
                                                            onchange="previewFile(this);">
                                                        <span class="file-custom"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="manufactured">Blog Message</label>

                                                        <textarea class="textarea" id="blog_message" name="blog_message" placeholder="Place some text here"
                                  style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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