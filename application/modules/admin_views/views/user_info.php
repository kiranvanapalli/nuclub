<style type="text/css">
    .table {
            text-align: center;
        }
</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">User Information</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User Information</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <a class="btn btn-primary round btn-min-width mr-1 mb-1" aria-haspopup="true" aria-expanded="false" href ="<?php echo base_url(); ?>user_details"><i class="ft-users"></i> User List</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="row-separator-colored-controls">User Information</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form form-horizontal row-separator">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="la la-eye"></i> About User</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="firstname">Fist Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="firstname" class="form-control border-primary" placeholder="First Name" name="firstname" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="First Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="lastname">Last Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="lastname" class="form-control border-primary" placeholder="Last Name" name="lastname" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="mobile_number">Mobile Number</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="mobile_number" class="form-control border-primary" placeholder="Mobile Number" name="mobile_number" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Mobile Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="emai">Email</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="email" class="form-control border-primary" placeholder="Email" name="email" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Email Id" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="password">Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" id="password" class="form-control border-primary" placeholder="Password" name="password" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="pin">Pin</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="pin" class="form-control border-primary" placeholder="4 Digit Pin" name="pin" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pin" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="pan_no">Pan Number</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="pan_no" class="form-control border-primary" placeholder="Pan Number" name="pan_no" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Pan Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row mx-auto last">
                                                <label class="col-md-3 label-control" for="pin">Id Proof</label>
                                                <div class="col-md-9">
                                                    <select id="id_proof" name="id_proof" class="form-control">
                                                        <option value="" selected="" disabled="">Select Id Proff</option>
                                                        <option value="Aadhar Card">Aadhar Card</option>
                                                        <option value="Voter Card">Voter Card</option>
                                                        <option value="Passport">Passport</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="form-section"><i class="la la-bank"></i> Bank Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row mx-auto last">
                                            <label class="col-md-3 label-control" for="bank_name">Select Bank</label>
                                            <div class="col-md-9">
                                                <select id="bank_name" name="bank_name" class="form-control">
                                                    <option value="">Select Bank</option>
                                                    <option value="1">State Bank Of India</option>
                                                    <option value="2">Andhra Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mx-auto last">
                                            <label class="col-md-3 label-control" for="branch">Branch</label>
                                            <div class="col-md-9">
                                                <select id="branch" name="branch" class="form-control">
                                                    <option value="">Select Branch</option>
                                                    <option value="1">Visakhapatnam</option>
                                                    <option value="2">Dondaparthi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row mx-auto last">
                                            <label class="col-md-3 label-control" for="ifsc_code">IFSC Code</label>
                                            <div class="col-md-9">
                                                <input type="text" id="ifsc_code" class="form-control border-primary" placeholder="IFSC Code" name="ifsc_code" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Ifsc Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row mx-auto last">
                                            <label class="col-md-3 label-control" for="bank_acc_number">Bank Account Number</label>
                                            <div class="col-md-9">
                                                <input type="text" id="bank_acc_number" class="form-control border-primary" placeholder="Bank Account Number" name="bank_acc_number" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Bank Account Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions text-right">
                                    <button type="button" class="btn btn-warning mr-1"> <i class="la la-remove"></i> Cancel</button>
                                    <button type="submit" class="btn btn-primary"> <i class="la la-check"></i> Update</button>
                                </div>
                            </form>
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
                                <h4 class="card-title">Deposit</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table alt-pagination wallet-wrapper" name="deposit_table" id="deposit_table">
                                        <thead>
                                            <tr>
                                                <th width="5%">S.no</th>
                                                <th>Date</th>
                                                <th>Coin</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">1</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">2</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">3</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">4</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">5</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">6</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">7</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">8</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">9</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">10</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">15-05-2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> BitCoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="amount">200</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
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
        <div class="content-body">
            <section id="pagination">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Withdraw</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table alt-pagination wallet-wrapper" name="withdraw_table" id="withdraw_table">
                                        <thead>
                                            <tr>
                                                <th width="5%">S.no</th>
                                                <th>Date</th>
                                                <th>Coin</th>
                                                <th>Amount</th>
                                                <th>Receiver Bank Details</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">1</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">07/10/2020</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc DASH primary"></i> DASH</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">1.234.00</div>
                                                </td>
                                                <td class="align-middle receiver sorting_1">Bank - 2043********342</td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-danger badge-pill badge-sm">Cancel</div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">2</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">02/12/2018</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc LTC info"></i> Litecoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">0.1235.00</div>
                                                </td>
                                                <td class="align-middle receiver sorting_1">Bank - 2043********951</td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">3</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">02/10/2017</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc BTC warning"></i> Bitcoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">0.4345.00</div>
                                                </td>
                                                <td class="align-middle receiver sorting_1">BTC Wallet - #23412</td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-success badge-pill badge-sm">Completed</div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="align-middle" width="5%">
                                                    <div class="s_no">4</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="date">07/12/2020</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc NEO success"></i> NEO</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">0.550</div>
                                                </td>
                                                <td class="align-middle receiver sorting_1">NEO Wallet - #14342</td>
                                                <td class="align-middle">
                                                    <div class="status badge badge-secondary badge-pill badge-sm">Pending</div>
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
        <div class="content-body">
            <section id="pagination">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Trade History</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table alt-pagination wallet-wrapper" name="tradehistory_table" id="tradehistory_table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Coin</th>
                                                <th>Type</th>
                                                <th>Volume</th>
                                                <th>Price per Unit</th>
                                                <th>Price</th>
                                                <th>Fees (%)</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td class="align-middle sorting_1">
                                                    <div class="date">03/20/2021</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc DASH primary"></i> DASH</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="badge badge-danger badge-pill badge-sm">Withdraw</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">1.225</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="unit-price">90</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-price">110.25</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="fee">0.2</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-amt">88.20</div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="align-middle sorting_1">
                                                    <div class="date">07/10/2019</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc DASH primary"></i> DASH</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="type badge badge-danger badge-pill badge-sm">Withdraw</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">0.525</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="unit-price">100</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-price">52.50</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="fee">0.2</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-amt">42.00</div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="odd">
                                                <td class="align-middle sorting_1">
                                                    <div class="date">10/04/2020</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"><i class="cc LTC info"></i> Litecoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="type badge badge-success badge-pill badge-sm">Deposit</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">0.75</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="unit-price">100</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-price">75</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="fee">0.2</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-amt">60</div>
                                                </td>
                                            </tr>
                                            <tr role="row" class="even">
                                                <td class="align-middle sorting_1">
                                                    <div class="date">12/02/2018</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="coin"> <i class="cc BTC warning"></i> Bitcoin</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="type badge badge-success badge-pill badge-sm">Deposit</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="volume">0.740</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="unit-price">100</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-price">74.00</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="fee">0.2</div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="total-amt">62.92</div>
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
</div>