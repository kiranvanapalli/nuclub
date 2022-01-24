<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Blog Category</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Blog Category List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-primary round btn-min-width mr-1 mb-1" type="button" aria-haspopup="true"
                        aria-expanded="false" data-toggle="modal" id="blog_type_model"
                        data-target="#addblogcat_model"> <i class="la la-plus-circle"></i> Add Blog Category</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Blog Category Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
               <table class="table text-center" name="blog_category_table" id="blog_category_table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Blog Category Title</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- END: Content-->

<div class="modal fade" id="addblogcat_model" tabindex="-1" role="dialog" aria-labelledby="addblogcat_Title"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="addblogtypeTitle">
                <div class="col text-center">
                    <h5 class="addblogtype_title" id='blogcat_title'>Add Blog Category</h5>
                </div>
                <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="blog_category_form" method="post" id="blog_category_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mx-auto">

                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="blog_category_name" class="blog_category_name">Blog Category Name</label>
                                    <input type="text" name="blog_category_name" id="blog_category_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row status_div" id='status_div'>
                                <div class="col-lg-12 col-md-12">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="edit_id" name="edit_id" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_save" class="btn btn-primary">Submit</button>
                </div>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                    value="<?php echo $this->security->get_csrf_hash();?>">
            </form>
        </div>
    </div>
</div>