 <style type="text/css">
   
    .select2-container .select2-selection--single {
    height: 38px;
    border-color: #d2d6de;
}

 </style>

 
 <?php if(isset($apartment_edit['image']) && !empty($apartment_edit['image']) && file_exists($apartment_edit['image']))
 {  

     $image = $apartment_edit['image'];
 }
 else
 {
    $image = '';
 }

  ?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-align center;">
       Update Apartment 
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
       
           <!-- /.box-header -->
         <form class="user_form" method="post" id="user_form" enctype="multipart/form-data">
        <div class="box-body">
          <div class="row">
           

     <!-- Basic Forms -->
              <div class="box box-default">

          <div class="box-body">
                  
            <div class="row">
          
            <div class="col-md-6">
              <div class="form-group">
                <label for="wlastName2"> Apartment  Name  </label>
                <input type="text" class="form-control apartment" id="apartment" name="apartment_name" placeholder="Enter product name" autocomplete="off" value="<?php if(isset($apartment_edit['name']) && !empty($apartment_edit['name'])){ echo $apartment_edit['name']; } ?>"> </div>
            </div>

             <div class="col-md-6">
              <div class="form-group">
                <label for="wlastName2"> Apartment Area </label>
                <input type="text" class="form-control Area" id="area" name="area" placeholder="Enter Area" autocomplete="off" value="<?php if(isset($apartment_edit['area']) && !empty($apartment_edit['area'])){ echo $apartment_edit['area']; } ?>"> </div>
            </div>



          </div><br>

          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="wlastName2"> Landmark </label>
                <input type="text" class="form-control landmark" id="landmark" name="landmark" placeholder="Enter landmark" autocomplete="off" value="<?php if(isset($apartment_edit['landmark']) && !empty($apartment_edit['landmark'])){ echo $apartment_edit['landmark']; } ?>"> </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="wlastName2"> Pincode </label>
                <input type="text" class="form-control Area" id="pincode" name="pincode" placeholder="Enter Pincode" autocomplete="off" value="<?php if(isset($apartment_edit['pincode']) && !empty($apartment_edit['pincode'])){ echo $apartment_edit['pincode']; } ?>"> </div>
            </div>

             <div class="col-4">
              <div class="form-group">
              <label for="wlastName2">Active</label></div>

                <div class="demo-radio-button">

                <input name="status" class="status" type="radio" id="radio_1" value="1" <?php if(isset($apartment_edit['status']) && !empty($apartment_edit['status']) && $apartment_edit['status'] == 1){ echo "checked"; } ?>>
                <label for="radio_1" >Active</label>
                <input name="status" class="status" type="radio" id="radio_2" value="0" <?php if(isset($apartment_edit['status']) && $apartment_edit['status'] == 0){ echo "checked"; } ?>>
                <label for="radio_2">Inactive</label>
                </div>
              </div>

          </div><br>

          <div class="row">

               <div class="col-md-12">
                    <div class="form-group">
                      <label for="img_title" class="img_title"> Apartment Image  </label>

                        <div id="gallery">
                        <div id="gallery-content">
                          <div id="gallery-content-center">

                             <?php if(!empty($image) && file_exists($image)){  ?>
                         
                                <a href="<?php echo base_url($image); ?>" data-toggle="lightbox" data-gallery="multiimages" data-title="Profile Pic"><img src="<?php echo base_url($image); ?>" alt="gallery" class="all studio" style="border-radius: 10px;height: 100px;width: 100px;" > </a>

                                <?php } ?> 
                            
                          </div>
                        </div>
                      </div>
                       <input type="file" class="form-control apart_img" id="apart_img" name="apart_img"></div>
               </div>

          </div><br>

           <div class="row">

             <div class="col-md-12">
                    <div class="form-group">
                     <label for="wlastName2"> Address </label>
                <textarea name="address" id="address" class="form-control" rows="5" cols="5"><?php if(isset($apartment_edit['address']) && !empty($apartment_edit['address'])){ echo $apartment_edit['address']; } ?></textarea></div>
              </div> 

          </div><br>

         
        </div>

        <div class="modal-footer">
                 <button type="submit" name="add_apartment" value="add_apartment" id="add_apartment" class="btn btn-success waves-effect text-left add_apartment">Update</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
              </div>

      </div>

        <input type="hidden" name="apartment_id" value="<?php if(isset($apartment_edit['appartment_id']) && !empty($apartment_edit['appartment_id'])){ echo $apartment_edit['appartment_id']; } ?>">
        <input type="hidden" name="apartment_img_old" value="<?php if(isset($apartment_edit['image']) && !empty($apartment_edit['image'])){ echo $apartment_edit['image']; } ?>">
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