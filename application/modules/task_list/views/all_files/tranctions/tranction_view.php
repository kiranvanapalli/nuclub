<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="javascript:history.go(-1)" class="btn btn-danger btn-sm" style="color: white"><i class="fa fa-arrow-left" aria-hidden="true"></i>
Back</a>
        </li>
       
      </ol><br><br>

       <div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Vendor Details </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-responsive">
                <tr>
                  <th>NAME</th>
                  <th>PHONE</th>
                  <th>LAND LINE NUMBER</th></th>
                  <th>GENDER</th>
                  <th>DOB</th>
                  <th>AGE</th>
                  <th>CITY</th>
                  <th>STATE</th>
                  <th>PINCODE</th>
                </tr>
                <tr>

                  <td><?php if(!empty($view['name'])){echo $view['name'];} ?></td>
                  <td><?php if(!empty($view['phone'])){echo $view['phone'];} ?></td>
                  <td><?php if(!empty($view['land_line_num'])){echo $view['land_line_num'];} ?></td>
                  <td><?php if(!empty($view['gender'])){echo $view['gender'];} ?></td>
                  <td><?php if(!empty($view['dob'])){echo $view['dob'];} ?></td>
                  <td><?php if(!empty($view['age'])){echo $view['age'];} ?></td>
                  <td><?php if(!empty($view['city'])){echo $view['city'];} ?></td>
                  <td><?php if(!empty($view['state'])){echo $view['state'];} ?></td>
                  <td><?php if(!empty($view['pincode'])){echo $view['pincode'];} ?></td>
                  
                
                </tr>
              </table>
            </div><br><br><br>

            <div class="box-body">
              <table class="table table-bordered table-responsive">
                <tr>
                  <th>GST NO</th>
                 <!--  <th>BUSINESS NAME</th> -->
                  <th>COMPANY NAME</th>
                  <th>FIRM REG</th>
                  <th>TRADE LICENCE</th>
                  <th>CREATED BY</th>
                  <th>AADHAR NUMBER</th>
                  <th>DATE</th>
                </tr>
                <tr>
                <td><?php if(!empty($view['gst_no'])){echo $view['gst_no'];} ?></td>
                 <!--  <td><?php if(!empty($view['business_name'])){echo $view['business_name'];} ?></td> -->
                  <td><?php if(!empty($view['comapany_name'])){echo $view['comapany_name'];} ?></td>
                  <td><?php if(!empty($view['firm_reg'])){echo $view['firm_reg'];} ?></td>
                  <td><?php if(!empty($view['trade_licence'])){echo $view['trade_licence'];} ?></td>
                  <td><?php if(!empty($view['user_name'])){echo $view['user_name'];} ?></td>
                  <td><?php if(!empty($view['aadhar_number'])){echo $view['aadhar_number'];} ?></td>
                  <td><?php if(!empty($view['created_on'])){echo show_date_only($view['created_on']);} ?></td>
                
                </tr>
              </table>
            </div><br><br><br>


            <div class="box-body">
              <table class="table table-bordered table-responsive">
                <tr>
                  <th>address1</th>
                  <th>address2</th>
                 
                </tr>
                <tr>
                  <td><?php if(!empty($view['address1'])){echo $view['address1'];} ?></td>
                  <td><?php if(!empty($view['address2'])){echo $view['address2'];} ?></td> 
                  
                
                </tr>
              </table>
            </div><br><br><br>


            <div class="box-body">
              <table class="table table-bordered table-responsive">
                <tr>
                  <th>Profile</th>
                  <th>Aadhar</th>
                 
                </tr>
                <tr>
                  <td><?php if(!empty($view['profile_pic'])){ ?>
                    <img src="<?php echo base_url('').$view['profile_pic']; ?>" height="100" width="100">;

                  <?php } ?></td>
                  <td><?php if(!empty($view['aadhar_pic'])){ ?>
                    <img src="<?php echo base_url('').$view['aadhar_pic']; ?>" height="100" width="100">;

                  <?php } ?></td>
                  
                
                </tr>
              </table>
            </div>

            
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->
         </div>      
        <!-- /.col -->
      
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
  