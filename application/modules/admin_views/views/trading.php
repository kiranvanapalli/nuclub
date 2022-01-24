<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/app-assets/vendors/css/tables/datatable/datatables.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/app-assets/vendors/css/charts/apexcharts.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/app-assets/css/pages/crypto-trading.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admin_assets/app-assets/vendors/css/cryptocoins/cryptocoins.css">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Trading</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>dashboard">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Trading
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <div class="content-header-right col-md-6 col-12">
            <div class="btn-group float-md-right">
              <button class="btn btn-info dropdown-toggle mb-1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
              <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar-check mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><section id="all-transactions">
  <div class="row">
    <div class="col-lg-4  col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            Market
          </h4>
        </div>
        <div class="card-content">
          <div class="table-responsive">
            <table class="table alt-pagination trading-wrapper">
              <thead>
                <tr class="d-none col-md-12">
                  <th>
                    Crypto
                  </th>
                  <th>
                    Price
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="active">
                  <td class="coin align-middle">
                    <i class="cc BTC warning">
                    </i>
                    Bitcoin
                  </td>
                  <td class="price align-middle">
                    250.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc LTC info">
                    </i>
                    Litecoin
                  </td>
                  <td class="price align-middle">
                    120.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc NEO success">
                    </i>
                    NEO
                  </td>
                  <td class="price align-middle">
                    100.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc DASH primary">
                    </i>
                    DASH
                  </td>
                  <td class="price align-middle">
                    360.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc ETH">
                    </i>
                    ETH
                  </td>
                  <td class="price align-middle">
                    100.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc XRP info">
                    </i>
                    XRP
                  </td>
                  <td class="price align-middle">
                    200.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc BTA success">
                    </i>
                    BTA
                  </td>
                  <td class="price align-middle">
                    150.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc XMR primary">
                    </i>
                    XMR
                  </td>
                  <td class="price align-middle">
                    230.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc ANC warning">
                    </i>
                    ANC
                  </td>
                  <td class="price align-middle">
                    70.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc ARK">
                    </i>
                    ARK
                  </td>
                  <td class="price align-middle">
                    120.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc BC info">
                    </i>
                    BC
                  </td>
                  <td class="price align-middle">
                    137.00
                  </td>
                </tr>
                <tr>
                  <td class="coin align-middle">
                    <i class="cc DCR success">
                    </i>
                    DCR
                  </td>
                  <td class="price align-middle">
                    450.00
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-8 col-md-8">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Trading Chart</h4>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div id="candlestick-basic-chart" class="height-400"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                Open Orders
              </h4>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table id="open-trade" class="table table-hover table-xl  open-orders">
                  <thead>
                    <tr>
                      <th>
                        Coin
                      </th>
                      <th>
                        Total Unit
                      </th>
                      <th>
                        No. of unit
                      </th>
                      <th>
                        Exp. Amt
                      </th>
                      <th>
                        Type
                      </th>
                      <th>
                        Amt($)
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="coin align-middle">
                        <i class="cc BTC warning"></i>Bitcoin
                      </td>
                      <td class="unit">
                        0.725
                      </td>
                      <td class="no-unit">
                        0.200
                      </td>
                      <td class="exp-amt">
                        300.00
                      </td>
                      <td class="type">
                        <span class="badge badge-success badge-pill badge-sm">
                          Purchase
                        </span>
                      </td>
                      <td class="amount">
                        60
                      </td>
                    </tr>
                    <tr>
                      <td class="coin align-middle">
                        <i class="cc BTC warning"></i>Bitcoin
                      </td>
                      <td class="unit">
                        0.725
                      </td>
                      <td class="no-unit">
                        0.525
                      </td>
                      <td class="exp-amt">
                        200.00
                      </td>
                      <td class="type">
                        <span class="badge badge-danger badge-pill badge-sm">
                          Sell
                        </span>
                      </td>
                      <td class="amount">
                        105
                      </td>
                    </tr>
                    <tr>
                      <td class="coin align-middle">
                        <i class="cc LTC info"></i>Litecoin
                      </td>
                      <td class="unit">
                        0.800
                      </td>
                      <td class="no-unit">
                        0.200
                      </td>
                      <td class="exp-amt">
                        200.00
                      </td>
                      <td class="type">
                        <span class="badge badge-danger badge-pill badge-sm">
                          Sell
                        </span>
                      </td>
                      <td class="amount">
                        40
                      </td>
                    </tr>
                    <tr>
                      <td class="coin align-middle">
                        <i class="cc NEO success"></i>NEO
                      </td>
                      <td class="unit">
                        0.450
                      </td>
                      <td class="no-unit">
                        0.150
                      </td>
                      <td class="exp-amt">
                        70.00
                      </td>
                      <td class="type">
                        <span class="badge badge-success badge-pill badge-sm">
                          Purchase
                        </span>
                      </td>
                      <td class="amount">
                        10.5
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">
                Your Trades
              </h4>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table id="yr-trade" class="table table-hover table-xl yrtrade-wrapper">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Coin</th>
                      <th>Volume</th>
                      <th>Receiver</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="date">02/12/2018</td>
                      <td class="coin align-middle">
                        <i class="cc LTC info"></i>Litecoin
                      </td>
                      <td class="volume">0.1235.00</td>
                      <td class="receiver">Bank - 2043********951</td>
                      <td class="status">
                        <span class="badge badge-success badge-pill badge-sm">Completed</span>
                      </td>
                    </tr>
                    <tr>
                      <td class="date">07/12/2020</td>
                      <td class="coin align-middle">
                        <i class="cc NEO success"></i>NEO
                      </td>
                      <td class="volume">0.550</td>
                      <td class="receiver">NEO Wallet - #14342</td>
                      <td class="status">
                        <span class="badge badge-secondary badge-pill badge-sm">Pending</span>
                      </td>
                    </tr>
                    <tr>
                      <td class="date">02/10/2017</td>
                      <td class="coin align-middle">
                        <i class="cc BTC warning"></i>Bitcoin
                      </td>
                      <td class="volume">0.4345.00</td>
                      <td class="receiver">BTC Wallet - #23412</td>
                      <td class="status">
                        <span class="badge badge-success badge-pill badge-sm">Completed</span>
                      </td>
                    </tr>
                    <tr>
                      <td class="date">07/10/2020</td>
                      <td class="coin align-middle">
                        <i class="cc DASH primary"></i>DASH
                      </td>
                      <td class="volume">1.234.00</td>
                      <td class="receiver">Bank - 2043********342</td>
                      <td class="status">
                        <span class="badge badge-danger badge-pill badge-sm">Cancel</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/app-assets/js/scripts/pages/crypto-trading.min.js"></script>
