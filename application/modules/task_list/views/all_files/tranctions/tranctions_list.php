<style type="text/css">
  
.select2-container .select2-selection--single {
    height: 41px;
}

.form-control {
   background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
}

.btn-lg, .btn-group-lg > .btn {
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.6rem;
    border-radius: 0.3rem;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Payment Tranctions</h1><br>

     <!-- <ol class="breadcrumb">
      <a href="#">
        <li class="breadcrumb-item active total_amount"><button  style="background: #40b435; color: white;"  type="button" class="btn btn-block btn-lg total_amounts" ></button></li></a> 
      </ol> --><br> 

        <div class="row" >
          <div class="col-12">

          <form method="post" id="tranction_search_form" class="tranction_search_form"> 
           <div class="row">
 
            <div class="col-md-2 col-lg-2" >
              <div class="form-group">
                  <label for="wlastName2"> <b>Customer Wise</b> </label>
                <select class="form-control select2" style="width: 100%;" id="customer" name="customer">
                   <?php if(isset($customers) && !empty($customers) && is_array($customers)) { ?>
                    <option value="">select</option>
                    <?php foreach ($customers as $customer) { ?>
                    <option value="<?php echo $customer['customer_id']; ?>" <?php echo set_select('customer', $customer['customer_id']); ?>><?php echo $customer['customer_name'];  ?></option>
                    <?php } } ?>
                </select>
              </div>
            </div>  

            <div class="col-md-2 col-lg-2" >
              <div class="form-group">
                  <label for="wlastName2"> <b>Apartment Wise</b> </label>
                <select class="form-control select2" style="width: 100%;" id="appartment" name="appartment">
                   <?php if(isset($appartments) && !empty($appartments) && is_array($appartments)) { ?>
                    <option value="">select</option>
                    <?php foreach ($appartments as $appartment) { ?>
                    <option value="<?php echo $appartment['appartment_id']; ?>" <?php echo set_select('appartment', $appartment['appartment_id']); ?>><?php echo $appartment['name'];  ?></option>
                    <?php } } ?>
                </select>
              </div>
            </div>  

           <!--  <div class="col-md-2 col-lg-2" >
              <div class="form-group">
                  <label for="wlastName2"> <b>Months </b> </label>
                <select class="form-control"  id="months" name="months">
                    <option value="">Select</option>
                    <option value="1" <?php echo set_select('months', 1); ?>>Last month</option>
                    <option value="3" <?php echo set_select('months', 3); ?>>Last 3 month</option>
                    <option value="6"  <?php echo set_select('months', 6); ?>>Last 6 month</option>
                    <option value="12" <?php echo set_select('months', 12); ?>>Last year</option>
                </select>
              </div>
            </div> 
 -->
            <div class="col-md-2 col-lg-2" >
              <div class="form-group">
                  <label for="wlastName2"> <b>From Date </b> </label>
               <input class="form-control" type="date"  id="from_date" name="from_date" value="<?php echo set_value('from_date'); ?>">
              </div>
            </div> 

             <div class="col-md-2 col-lg-2">
              <div class="form-group">
                  <label for="wlastName2"> <b>To Date </b> </label>
               <input class="form-control" type="date"  id="to_date" name="to_date" value="<?php echo set_value('to_date', '0'); ?>">
              </div>
            </div> 

             <div class="col-md-2 col-lg-2">
              <div class="form-group">
              <label for="wlastName2"> <span class="danger">.</span> </label>            
              <button type="submit" class="btn btn-block btn-info btn-lg" id="product_search" value="product_search">Search</button>
              </div>
            </div>

            <div class="col-md-2 col-lg-2">
              <div class="form-group">
              <label for="wlastName2"> <span class="danger">.</span> </label>
              <button type="submit" class="btn btn-block btn-danger btn-lg" id="reset_tranctions" value="reset_tranctions">Reset</button>
              </div>
            </div>

            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

          </div>
        </form>
          
        </div>
      
        </div> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive tranctions_list" cellspacing="0" width="100%"> 
                <!-- <table id="example1 " class="table table-bordered table-striped table-responsive radios"> -->
      <thead>
          <tr>
            <th>S.no</th>
            <th>Order Id</th>
            <th>Customer</th>
            <th>Apartment</th>
            <th>Total Services</th>
            <th>Paid Amount</th>
            <th>Services</th>
            <th>Validate Upto</th>
            <th>Created Date</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S.no</th>
            <th>Order Id</th>
            <th>Customer</th>
            <th>Apartment</th>
            <th>Total Services</th>
            <th>Paid Amount</th>
            <th>Services</th>
            <th>Validate Upto</th>
           <th>Created Date</th>
          </tr>
        </tfoot>
        <tbody>
          
        </tbody>
      </table>



              
            </div>
            <!-- /.box-body
          </div> -->
          <!-- /.box -->          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

      
   
 

