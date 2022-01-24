 BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Orders</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
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
                            <h4 class="card-title">Order Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" name="order_table" id="order_table">
                                    <thead>
                                        <tr>
                                            <th width="3%">S.no</th>
                                            <th width="10%">Product Name</th>
                                            <th width="8%">Price</th>
                                            <th width="10%">Full Name</th>
                                            <th width="8%">Mobile</th>
                                            <th width="8%">Email</th>
                                            <!-- <th width="8%">Zip Code</th> -->
                                            <th width="8%">Status</th>
                                            <th width="8%">Edit Status</th>
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
<div class="modal fade" id="editstatus" tabindex="-1" role="dialog" aria-labelledby="edit_status"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" id="status_title">
                <div class="col text-center">
                    <h5 class="status_title_div" id='editstatus'>Edit Status</h5>
                </div>
                <button type="button" class="close absolute" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="order_form" method="post" id="order_form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mx-auto">
                            <div class="form-group row status_div" id='status_div'>
                                <div class="col-lg-12 col-md-12">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Status</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Deliverd</option>
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


