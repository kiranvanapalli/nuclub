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
                                            aria-expanded="false" id="blog"> <i class="las la-arrow-circle-left"></i>
                                            Blog</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                    <form class="form form-horizontal" id="edit_blog_form" name="edit_blog_form">
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
                                                        
                                                        foreach($blog_category as $blog_category)
                                                        { ?>
        <option value="<?php echo $blog_category['category_id']; ?>"
                                                                <?php if($edit_blog['blog_category'] == $blog_category['category_id']) { echo 'selected'; } ?>>
                                                                <?php echo $blog_category['category_name']; ?></option>
                                                            <?php }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="blog_title">Blog Title</label>

                <input type="text" id="blog_title" class="form-control" placeholder="Blog Title" name="blog_title" value="<?php echo $edit_blog['blog_title']; ?>">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                         <label>Select Blog
                                                            Image</label>
                                                        <input type="hidden" name="old_art_img"
                                                            value="<?php echo $edit_blog['blog_image']; ?>">

                                                         <input class="form-control" type="file" id="blog_image" name="blog_image"
                                                             onchange="previewFile(this);">
                                                        <span class="old_img_gallery"><a
                                                                href="<?php echo base_url(); ?>uploads/blog_images/<?php echo $edit_blog['blog_image']; ?>"
                                                                title="Blog Image" target="_blank"><img
                                                                    src="<?php echo base_url(); ?>uploads/blog_images/<?php echo $edit_blog['blog_image']; ?>"
                                                                    alt="gallery" class="all studio"
                                                                    style="border-radius: 10px;height: 100px;width: 100px;"></a></span>
                                                        <span class="file-custom"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="manufactured">Blog Message</label>

            <textarea class="textarea" name="blog_message" id="blog_message" placeholder="Place some text here" style="width: 100%; height: 250px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $edit_blog['blog_message'] ?></textarea>
                                                    </div>

                                                </div>

                                            </div>
                                       

                    <input type="hidden" name="edit_id"
                                            value="<?php echo $edit_blog['blog_id']; ?>">
                                        <div class="form-group row">
                                            <div class="col-lg-12 col-md-12">
                                                <label for="status">Status</label>
                                                <select class="form-control" name="status" id="status">
                                                    <option value="">Select Status</option>
                                                    <option value="1"
                                                        <?php if($edit_blog['status'] == 1) { echo 'selected';} ?>>
                                                        Active</option>
                                                    <option value="0"
                                                        <?php if($edit_blog['status'] == 0) { echo 'selected';} ?>>In
                                                        Active</option>
                                                </select>
                                            </div>
                                        </div>
                                            
                                           
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
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