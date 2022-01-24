 BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Blog Details</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Blog List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <a class="btn btn-primary round btn-min-width mr-1 mb-1" href ="<?php echo base_url(); ?>addblog_view" aria-haspopup="true"
                        aria-expanded="false" id="blog"> <i class="la la-plus-circle"></i> Add Blog</a>
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
                            <h4 class="card-title">Blog Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" name="blog_table" id="blog_table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Blog Category</th>
                                            <th>Blog Title</th>
                                            <th>Blog Image</th>
                                            <th>Blog Message</th>
                                            <th>Status</th>
                                            <th>Date</th>
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
<!-- END: Content