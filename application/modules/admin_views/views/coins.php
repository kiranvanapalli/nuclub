<style type="text/css">
    .wallet-wrapper
    {
    text-align: center;
    }
    .dropdown-toggle
    {
    margin-left: 40px;
    }
    .float-lg-right
    {
        color: green !important;
    }
    .verify_otp
    {
        text-align: center;
        color: orange !important;
    }
    .badge-border span
    {
        bottom: 0px !important;
    }
</style>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Assets</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Assets</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <button class="btn btn-primary round btn-min-width mr-1 mb-1" type="button" aria-haspopup="true" aria-expanded="false" data-toggle="modal" data-target="#addassets">  <i class="la la-plus-circle"></i> Add Asset</button>
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
                            <h4 class="card-title">Asset Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table alt-pagination wallet-wrapper" name="asset_table" id="asset_table">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Asset Name</th>
                                            <th>Today Value</th>
                                            <th>% Incress/Decress</th>
                                            <th>Present Value</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <div class="s_no">1</div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="coin"> <i class="cc BTC warning"></i> Bitcoin</div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="price">100</div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="in_dc">+2%</div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="present">102/-</div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="badge border-success success badge-border"> <span>Active</span>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group mr-1 mb-1 align-middle">
                                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" type="button"><i class="ft-edit float-right"></i>Edit</button>
                                                        <button class="dropdown-item" type="button"><i class="ft-trash float-right"></i>Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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
<!-- Modal -->
<div class="modal fade text-left" id="addassets" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> Asset Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-content collpase show">
                    <div class="card-body">
                        <form class="form">
                            <div class="form-body">
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label for="asset_name">Asset Name</label>
                                        <input type="text" id="asset_name" class="form-control" placeholder="Asset Name" name="asset_name" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Asset Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label for="today_asset_price">Today Asset Price</label>
                                        <input type="text" id="today_asset_price" class="form-control" placeholder="Today Asset Price" name="today_asset_price" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Today Asset Price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label for="in_or_de_asset_value">% Of Increase Or Decrease Asset Price</label>
                                        <input type="number" id="in_or_de_asset_value" class="form-control" placeholder="% Of Increase Or Decrease Asset Price" name="in_or_de_asset_value" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="% Of Increase Or Decrease Asset Price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12 mb-2">
                                        <label for="present_asset_value">Present Asset Value</label>
                                        <input type="text" id="present_asset_value" class="form-control" placeholder="Present Asset Value " name="present_asset_value" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Present Asset Value" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1"> <i class="ft-x"></i> Cancel</button>
                                <button type="submit" class="btn btn-primary"> <i class="la la-check-square-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>