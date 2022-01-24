<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Awards</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <a href="<?php echo base_url(); ?>add_award" class="main__title-link">Add Award</a>
               </div>
            </div>
            <!-- end main title -->
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-content collapse show">
                     <div class="table-responsive">
                        <table class="table table-sm mb-0 text-center" id="award_table" name="award_table">
                           <thead>
                              <tr>
                                 <th>sl.no</th>
                                 <th>Movie Name</th>
                                 <th>Image</th>
                                 <th>Year</th>
                                 <th>Status</th>
                                 <th>ACTIONS</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $i=1;
                                 foreach ($award_list as $award)
                                 {
                                 ?>
                              <tr>
                                 <td>
                                    <div class="main__table-text"><?php echo $i++; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $award['title']; ?></div>
                                 </td>
                                 <td class="image text-center">
                                    <img src="<?php echo base_url() ?>uploads/award_images/<?php echo $award['award_image']; ?>">
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $award['award_year']; ?></div>
                                 </td>
                                 <?php
                                    if($award['status'] == 1)
                                    { ?>
                                 <td>
                                    <div class="main__table-text main__table-text--green">Visible</div>
                                 </td>
                                 <?php }
                                    else
                                    { ?>
                                 <td>
                                    <div class="main__table-text main__table-text--red">In Visible</div>
                                 </td>
                                 <?php }
                                    ?>
                                 <td>
                                    <div class="main__table-btns">
                                       <!--  <a data-toggle="modal" data-target="#modalstatus" class="main__table-btn main__table-btn--banned open-modal">
                                          <i class="las la-unlock-alt"></i>
                                          </a> -->
                                       <a href="<?php echo base_url() ?>award_preview?id=<?php echo $award['award_id']; ?>" class="main__table-btn main__table-btn--view">
                                       <i class="lar la-eye"></i>
                                       </a>
                                       <a href="<?php echo base_url() ?>edit_award?id=<?php echo $award['award_id']; ?>" class="main__table-btn main__table-btn--edit">
                                       <i class="las la-edit"></i>
                                       </a>
                                       <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal delete" id="<?php echo $award['award_id']; ?>">
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
                     <h4>Award Details Delete</h4>
                     <p>Are you sure to permanently delete this Award Details</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" id="delete_award">Delete</a>
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