        <!-- content page title -->
        <div class="container-fluid bg-light-opac">
            <div class="row">
                <div class="container my-3 main-container">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="content-color-primary page-title">Add Car</h2>
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
                    <h5 class="content-color-primary mb-0">Add Car</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-10 mx-auto">
                            <form method="post" id='car_form' name='car_form' class='form-horizontal' enctype="multipart/form-data">
                                 <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_name">Car Name</label>
                                    <input type="text" class="form-control" placeholder="Car Name" id="car_name" name="car_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_price">Car Price</label>
                                    <input type="text" class="form-control" placeholder="Car Price" id="car_price" name="car_price">
                                </div>
                            </div>
                             <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_image" class="car_image">Car Image</label>
                                    <input type="file" name="car_image" id="car_image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_gear_type">Car Gear Type</label>
                                    <select class="form-control" data-live-search="true" tabindex="-1" aria-hidden="true" name='car_gear_type' id='car_gear_type'>
                                        <option value=''>Select Car Gear Type</option>
                                        <option value="1">Auto</option>
                                        <option value="2">Manual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_seating">Car Seating</label>
                                    <input type="text" class="form-control" placeholder="Car Seating Capacity" id="car_seating" name="car_seating">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12 col-md-12">
                                    <label for="car_fuel_type">Car Fuel Type</label>
                                    <select class="form-control" data-live-search="true" tabindex="-1" aria-hidden="true" name='car_fuel_type' id='car_fuel_type'>
                                        <option value=''>Select Car Fuel Type</option>
                                        <option value="1">Diesel</option>
                                        <option value="2">Petrol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-secondary" type="reset">Cancel</button>
                                <button class="btn btn-success float-right" type="submit">Submit</button>
                            </div>
                            <!-- <input type="hidden" name="<?php// echo $this->security->get_csrf_token_name();?>" value="<?php// echo $this->security->get_csrf_hash();?>"> -->
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- content page ends -->

    </div>