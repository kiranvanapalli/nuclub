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
      <h1 style="text-align: center;">Apartment List </h1><br>

     <ol class="breadcrumb">
        <a href="<?php echo base_url('add-apartment'); ?>">
        <li class="breadcrumb-item active"><button  type="button" class="btn btn-block btn-info btn-lg" id="EmployeAdd"><i class="fa fa-plus"></i> Add Apartment</button></li></a> 
      </ol><br> 

         
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
         
          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive product_list" cellspacing="0" width="100%"> 
                <!-- <table id="example1 " class="table table-bordered table-striped table-responsive radios"> -->
      <thead>
          <tr>
            <th>S.no</th>
            <th>Apartment</th>
            <th>Area</th>
           <!--  <th>Landmark</th> -->
            <th>Image</th>
            <th>Pincode</th>
            <th>Created By</th>
            <th>Phone</th>
             <th>Date</th>
            <th>Status</th>
            <th>View/Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S.no</th>
            <th>Apartment</th>
            <th>Area</th>
           <!--  <th>Landmark</th> -->
            <th>Image</th>
            <th>Pincode</th>
            <th>Created By</th>
            <th>Phone</th>
             <th>Date</th>
            <th>Status</th>
            <th>View/Edit</th>
            <th>Delete</th>
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

      
   
 

