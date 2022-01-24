<style type="text/css">
.modal-dialog {
    position: relative;
    width: auto;
    pointer-events: none;
    top: 10%;
}
   
</style>
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Enquiry</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-content collapse show">
                     <div class="table-responsive">
                        <table class="table table-sm mb-0" name="enquiry_table" id="enquiry_table">
                           <thead>
                              <tr class="text-center">
                                 <th>S.No.</th>
                                 <th>Name</th>
                                 <th>Email ID</th>
                                 <th>DATE</th>
                                 <th>ACTIONS</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                              $i=1;
                              foreach ($all_enquiry as $enquiry) {
                                 $date = show_date_only($enquiry['created_at']);
                              ?>
                              <tr class="text-center">
                                 <td>
                                    <div class="main__table-text"><?php echo $i++; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $enquiry['name']; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $enquiry['email']; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $date; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-btns">
                                       <a data-toggle="modal" data-target="#modalstatus" class="main__table-btn main__table-btn--view open-modal open" id="<?php echo $enquiry['enquiry_id']; ?>">
                                       <i class="lar la-eye"></i>
                                       </a>
                                       <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal delete" id="<?php echo $enquiry['enquiry_id']; ?>">
                                       <i class="las la-trash-alt"></i>
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                           <?php } ?>
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
<div class="modal" id="modaldelete">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body p-4">
            <div class="row">
               <div class="col-12 pb-1">
                  <div class="text-center">
                     <h4>Item Delete</h4>
                     <p>Are you sure to permanently delete this Enquiry?</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" id="delete_enquiry">Delete</a>
                  </div>
               </div>
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" data-dismiss="modal">Close</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal modalstatus" id="modalstatus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body p-4">
          <div class="row">
           <div class="col-12 pb-1">
            <div class="">
               <div class="row">
                  <div class="col-lg-6"><h4><strong>Enquiry</strong></h4></div>
                  <div class="col-lg-6 text-right"><i class="las la-calendar"></i><p id="date"></p></div>
               </div>
               <hr>
               <h4 id="name" name="name"></h4>
               <h6 id="email" name="email"></h6>
               <hr>
               <p id="message" name="message"></p>
              </div>
           </div>
         </div>
         <div class="row">
            <div class="col-lg-12 col-md-12">
               <div class="main__title">
                  <a href="#" class="main__title-link w-100" data-dismiss="modal">Close</a>
               </div>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div> 