<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row">
            <div class="col-12">
               <form class="form" name="update_transction" id="update_transction" autocomplete="off">
                  <div class="row row--form">
                     <div class="col-12 col-md-12">
                        <h3>Update Transcation Details</h3>
                        <div class="row row--form">
                           <div class="col-lg-6">
                              <input type="text" class="form__input" placeholder="Full Name" id="full_name" name="full_name" value="Full Name: <?php echo $user_data['fullname'] ?>" readonly>
                           </div>
                           <div class="col-sm-6 col-lg-6">
                              <input type="email" class="form__input" placeholder="Email ID" id="email_id" name="email_id" value="Email Id: <?php echo $user_data['email'] ?>" readonly> 
                           </div>
                           <div class="col-12 col-sm-6 col-lg-6">
                              <input type="text" class="form__input" placeholder="Mobile Number" id="mobile_number" name="mobile_number" value="Mobile Number: <?php echo $user_data['mobilenumber'] ?>" readonly>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-6">
                              <?php $transcation_type = '';
                                 $value = '';
                                 if($edit_transction['transaction_type'] == 'transaction_id')
                                 {
                                 $transcation_type = "Transcation ID";
                                 $value = $edit_transction['transaction_id'];
                                 
                                 }
                                 else
                                 {
                                 $transcation_type = "UTR Number";
                                 $value = $edit_transction['utr_number'];
                                 }
                                 ?>
                              <input type="text" class="form__input" placeholder="Mobile Number" id="transcation_type" name="transcation_type" value="Transcation Type: <?php echo $transcation_type; ?>" readonly>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-6">
                              <input type="text" class="form__input" placeholder="Mobile Number" id="Transcation Number" name="mobile_number" value="<?php echo $value; ?>" readonly>
                           </div>
                           <div class="col-12 col-sm-6 col-lg-6">
                                 <select name="transcation_status" id="transcation_status" class="form__input">
                                 <option value="">Please Select Status</option>
                                 <option value="1">Payment Received</option>
                                 <option value="0">Payment Not Received</option>
                                 </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-12">
                        <button type="submit" name="update_transcation" class="main__title-link">Update</button>
                     </div>
                     <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $edit_transction['tr_id']; ?>">
                     <input type="hidden" name="member_id" id="member_id" value="<?php echo $user_data['member_id']; ?>">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>