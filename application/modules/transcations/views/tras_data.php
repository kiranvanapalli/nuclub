<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row mb-2">
                <!-- main title -->
                <div class="col-6">
                    <div class="main__title">
                        <h2>Transcation List</h2>
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
                                <table class="table table-sm mb-0 text-center transcationtable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Transcation Number</th>
                                            <th>STATUS</th>
                                            <!-- <th>ACTIONS</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // $i = 1;
                                        foreach ($all_trascations as $all_trascations) {  
                                            ?>

                                           

                                            <tr>
                                               
                                                <td>
                                                    <div class="main__table-text"><?php echo $all_trascations['fullname']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?php echo $all_trascations['mobilenumber']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="main__table-text"><?php echo $all_trascations['transaction_id']; ?></div>
                                                </td>
                        
                                                <td class="text-center">
                                                    <?php
                                                    if ($all_trascations['status'] == 1) {
                                                        $status = "Payment Recevied";
                                                        echo "<div class='main__table-text main__table-text--green'>".$status."</div>";

                                                    } else {
                                                        $status = "Payment Not Recevied";
                                                        echo "<div class='main__table-text main__table-text--red'>".$status."</div>";
                                                    }
                                                    ?>
                                                   
                                                </td>
                                              
                                            </tr>

                                        <?php  }

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
                     <h4>Delete Member Details</h4>
                     <p>Are you sure to permanently delete this Member Details</p>
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