<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="horizontal-form-layouts">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-basic">Model Information</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <div class="btn-group float-md-right">
                                        <a class="btn btn-primary round btn-min-width mr-1 mb-1"
                                            href="<?php echo base_url(); ?>model" aria-haspopup="true"
                                            aria-expanded="false" id="product"> <i class="las la-arrow-circle-left"></i>
                                            Product Models</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    <form class="form form-horizontal" id="add_model" name="add_model">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-clipboard"></i> Model Details</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="manufactured_id">Manufactured</label>

                                                        <select id="manufactured_id" name="manufactured_name"
                                                            class="manufactured_name form-control">
                                                            <option value="">Select
                                                                Manufactured
                                                            </option>
                                                            <?php
                                                        
                                                        foreach($manufactured as $manufactured)

                                                        { ?>
                                                            <option
                                                                value="<?php echo $manufactured['manufactured_id']; ?>">
                                                                <?php echo $manufactured['manufactured_name']; ?>
                                                            </option>
                                                            <?php }
                                                        ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="model_name">Model Name</label>
                                                        <input type="text" id="model_name" class="form-control"
                                                            placeholder="Model Name" name="model_name">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>

    </div>
</div>