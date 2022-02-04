<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row mb-2">
                <!-- main title -->
                <div class="col-6">
                    <div class="main__title">
                        <h2>Intersted Contact List</h2>
                    </div>
                </div>

                <!-- <div class="col-6">
                    <div class="main__title">
                        <a href="<?php echo base_url() ?>add_member" class="main__title-link w-50">Add Member</a>
                    </div>
                </div> -->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-content collapse show">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 text-center contact_us_table">
                                    <thead>
                                        <tr>
                                            <th>Sl.no</th>    
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($contact_list as $contact_list) { ?>

                                            <tr>
                                                <td>
                                                    <div class="main__table-text"><?php echo $i++; ?></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?php echo $contact_list['name']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?php echo $contact_list['mobile_no']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?php echo $contact_list['email']; ?></div>
                                                </td>

                                                
                                                <td class="text-center">
                                                    <div class="main__table-btns text-center">
                                                      
                                                        <!-- <a href="detailviewpage.html" target="_blank" class="main__table-btn main__table-btn--view">
                                                            <i class="lar la-eye"></i>
                                                        </a> -->
                                                        <a id="<?php echo $contact_list['contact_id']; ?>"data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal delete">
                                                            <i class="las la-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modaldelete" id="modaldelete">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body p-4">
            <div class="row">
               <div class="col-12 pb-1">
                  <div class="text-center">
                     <h4>Delete Join Us Details</h4>
                     <p>Are you sure to permanently delete this Join US Details</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" id="delete_member">Delete</a>
                  </div>
               </div>
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" data-dismiss="modal" id="close">Close</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>