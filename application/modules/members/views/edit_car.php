        <!-- content page title -->
        <div class="container-fluid bg-light-opac">
            <div class="row">
                <div class="container my-3 main-container">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="content-color-primary page-title">Edit Car Details</h2>
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-rounded pink-gradient text-uppercase pr-3" href="<?php echo base_url(); ?>car"><i class="fa fa-backward"></i> <span class="text-hide-xs"> Car Details</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content page title ends -->

        <!-- content page -->
        <div class="container mt-4 main-container">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <h5 class="content-color-primary mb-0">Edit Car Details</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mx-auto">
                            <form method="post" id='edit_car_form' name='car_form' class='form-horizontal' enctype="multipart/form-data">
                                <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_name">Car Name</label>
                                    <input type="text" class="form-control" placeholder="Car Name" id="car_name" name="car_name" value="<?php echo $edit_car['car_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_price">Car Price</label>
                                    <input type="text" class="form-control" placeholder="Car Price" id="car_price" name="car_price" value="<?php echo $edit_car['car_price']; ?>">
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_image" class="car_image">Car Image</label>
                                    
                                    <input type="file" name="car_image" id="car_image" class="form-control">
                                    <input type="hidden" name="car_image_old" value="<?php echo $edit_car['car_image']; ?>">
                                    <span class="old_img_gallery"><a href="<?php echo base_url(); ?>uploads/cars/<?php echo $edit_car['car_image']; ?>" title="Banner Image" target="_blank"><img src="<?php echo base_url(); ?>uploads/cars/<?php echo $edit_car['car_image']; ?>" alt="gallery" class="all studio" style="border-radius: 10px;height: 100px;width: 100px;" ></a></span>
                                    <br><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_gear_type">Car Gear Type</label>
                                    <select class="form-control" data-live-search="true" tabindex="-1" aria-hidden="true" name='car_gear_type' id='car_gear_type'>
                                        <option value=''>Select Car Gear Type</option>
                                         <option value="1"<?php if($edit_car['car_gear_type'] == 1) { echo 'selected';} ?>>Auto</option>
                                         <option value="2"<?php if($edit_car['car_gear_type'] == 2) { echo 'selected';} ?>>Manual</option>
                                       
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_seating">Car Seating</label>
                                    <input type="text" class="form-control" placeholder="Car Seating Capacity" id="car_seating" name="car_seating" value="<?php echo $edit_car['car_seating']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_fuel_type">Car Fuel Type</label>
                                    <select class="form-control" data-live-search="true" tabindex="-1" aria-hidden="true" name='car_fuel_type' id='car_fuel_type'>
                                        <option value=''>Select Car Fuel Type</option>
                                         <option value="1"<?php if($edit_car['car_fuel_type'] == 1) { echo 'selected';} ?>>Diesel</option>
                                         <option value="2"<?php if($edit_car['car_fuel_type'] == 2) { echo 'selected';} ?>>Petrol</option>
                                    </select>
                                </div>
                            </div>
                                 
                            <input type="hidden" name="edit_id" value="<?php echo $edit_car['car_id']; ?>">
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Status</option>
                                        <option value="1"<?php if($edit_car['status'] == 1) { echo 'selected';} ?>>Active</option>
                                        <option value="0"<?php if($edit_car['status'] == 0) { echo 'selected';} ?>>In Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                                <button class="btn btn-success float-right" type="submit">Update</button>
                            </div>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- content page ends -->

    </div>