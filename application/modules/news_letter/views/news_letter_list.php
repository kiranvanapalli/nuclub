<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>News Letter</h2>
               </div>
            </div>
            <!-- end main title -->
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-content collapse show">
                     <div class="table-responsive">
                        <table class="table table-sm mb-0" name="news_letter" id="news_letter">
                           <thead>
                              <tr>
                                 <th>S.No.</th>
                                 <th>Email ID</th>
                                 <th>Date</th>
                                 <th>Delete</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                               $i=1;
                                 foreach($all_news_letters as $news_letters){
                                    
                                     $date = show_date_only($news_letters['created_at']);
                                  ?>
                              <tr>
                                 <td>
                                    <div class="main__table-text"><?php echo $i++; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $news_letters['email'] ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $date; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-btns">
                                       <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal delete" id="<?php echo $news_letters['id']; ?>">
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
                     <p>Are you sure to permanently delete this item?</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" id="delete_news_letter">Delete</a>
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