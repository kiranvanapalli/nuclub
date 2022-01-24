 <style type="text/css">
   
    .select2-container .select2-selection--single {
    height: 38px;
    border-color: #d2d6de;
}

 </style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-align center;">
       Add Apartment 
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       <!--  <div class="box-header with-border">
          <h3 class="box-title">Select Elements</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div> -->
        <!-- /.box-header -->
         <form class="user_form" method="post" id="user_form" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
           

     <!-- Basic Forms -->
              <div class="box box-default">

          <div class="box-body">
                  
            <div class="row">
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="wlastName2"> Apartment  Name  </label>
                <input type="text" class="form-control apartment" id="apartment" name="apartment_name" placeholder="Enter product name" autocomplete="off"> </div>
            </div>

             <div class="col-md-4">
              <div class="form-group">
                <label for="wlastName2"> Apartment Area </label>
                <input type="text" class="form-control Area" id="area" name="area" placeholder="Enter Area" autocomplete="off"> </div>
            </div>

             <div class="col-md-4">
              <div class="form-group">
                <label for="wlastName2"> Landmark </label>
                <input type="text" class="form-control landmark" id="landmark" name="landmark" placeholder="Enter landmark" autocomplete="off"> </div>
            </div>




          </div><br>

          <div class="row">

             <div class="col-md-6">
                    <div class="form-group">
                      <label for="img_title" class="img_title"> Apartment Image  </label>
                      <span class="apart_img"></span>
                      <input type="file" class="form-control apart_img" id="apart_img" name="apart_img"> </div>
              </div>

                <div class="col-md-6">
              <div class="form-group">
                <label for="wlastName2"> Pincode </label>
                <input type="text" class="form-control Area" id="pincode" name="pincode" placeholder="Enter Pincode" autocomplete="off"> </div>
            </div>

          </div><br>

           <div class="row">

             <div class="col-md-12">
                    <div class="form-group">
                     <label for="wlastName2"> Address </label>
                <textarea name="address" id="address" class="form-control" rows="5" cols="5"></textarea></div>
              </div> 

          </div><br>

         
        </div>

        <div class="modal-footer">
                 <button type="submit" name="add_apartment" value="add_apartment" id="add_apartment" class="btn btn-success waves-effect text-left add_apartment">Submit</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
              </div>

      </div>
      <!-- /.box -->

              </div>
              
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
          
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        </form>    
        <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->
  </div>