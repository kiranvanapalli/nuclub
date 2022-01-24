<style type="text/css">
   .image
   {
   border-radius: 10px;
   height: auto;
   width: 200px;
   vertical-align: middle;
   border-style: none;
   }
   td.image img {
    height: 150px;
    width: 144px;
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
                  <h2>News</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <a href="<?= base_url() ?>add_news" class="main__title-link">Add News</a>
               </div>
            </div>
            <!-- end main title -->
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-content collapse show">
                     <div class="table-responsive">
                        <table class="table table-sm mb-0" name="news_list" id="news_list">
                           <thead>
                              <tr class="text-center">
                                 <th>S.No.</th>
                                 <th>Tittle</th>
                                 <th>CRAETED DATE</th>
                                 <th>Image</th>
                                 <th>STATUS</th>
                                 <th class="text-center">ACTIONS</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $i=1;
                                 foreach ($all_news as $key) 
                                 {
                                     $date = show_date_only($key['created_at']);   
                                 ?>
                              <tr class="text-center">
                                 <td>
                                    <div class="main__table-text"><?php echo $i++; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $key['news_title']; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $date; ?></div>
                                 </td>
                                 <td class="image text-center">
                                    <img src="<?php echo base_url() ?>uploads/news_images/<?php echo $key['image']; ?>">
                                 </td>
                                 <?php if($key['status'] == 1)
                                    {?>
                                 <td>
                                    <div class="main__table-text main__table-text--green">Active</div>
                                 </td>
                                 <?php }
                                    else
                                    {
                                        ?>
                                 <td>
                                    <div class="main__table-text main__table-text--green">InActive</div>
                                 </td>
                                 <?php } ?>
                                 <td>
                                    <div class="main__table-btns">
                                      <!--  <a data-toggle="modal" data-target="#modalstatus" class="main__table-btn main__table-btn--banned open-modal">
                                       <i class="las la-lock-open"></i>
                                       </a> -->
                                       <a href="<?php echo base_url(); ?>news_view?id=<?php echo $key['news_id']; ?>" class="main__table-btn main__table-btn--view">
                                       <i class="lar la-eye"></i>
                                       </a>
                                       <a href="<?php echo base_url(); ?>edit_news?id=<?php echo $key['news_id']; ?>" class="main__table-btn main__table-btn--edit">
                                       <i class="las la-edit"></i>
                                       </a>
                                       <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal delete"  id="<?php echo $key['news_id']; ?>">
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
                     <h4>Recent News Details Delete</h4>
                     <p>Are you sure to permanently delete this News</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" id="delete_news">Delete</a>
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