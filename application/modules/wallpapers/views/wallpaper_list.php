<style type="text/css">
   .main__title-link
   {
   width: 170px !important;
   }
</style>
<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
         <div class="row mb-2">
            <!-- main title -->
            <div class="col-8">
               <div class="main__title">
                  <h2>Wallpaper List</h2>
               </div>
            </div>
            <div class="col-4">
               <div class="main__title">
                  <a href="<?php echo base_url() ?>add_wallpaper" class="main__title-link">Add Wallpaper</a>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-content collapse show">
                     <div class="table-responsive">
                        <table class="table table-sm mb-0 text-center" id="wallpaper_table">
                           <thead>
                              <tr>
                                 <th>Sl.no</th>
                                 <th>Movie Name</th>
                                 <th>Image</th>
                                 <th>STATUS</th>
                                 <th>ACTIONS</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $i=1;
                                 
                                 foreach($list as $wallpaper_list)
                                 {
                                 
                                  ?>
                              <tr>
                                 <td>
                                    <div class="main__table-text"><?php echo $i++; ?></div>
                                 </td>
                                 <td>
                                    <div class="main__table-text"><?php echo $wallpaper_list['title']; ?></div>
                                 </td>
                               
                                 <td class="image text-center">
                                    <img src="<?php echo base_url() ?>uploads/wallpapers/<?php echo $wallpaper_list['wallpaper_img']; ?>" />
                                 </td>
                                
                                 <?php if($wallpaper_list['status'] == 1)
                                    {?>
                                 <td>
                                    <div class="main__table-text main__table-text--green">Visible</div>
                                 </td>
                                 <?php }
                                    else
                                    { ?>
                                 <td>
                                    <div class="main__table-text main__table-text--red">In Visible</div>
                                 </td>
                                 <?php } ?>
                                 <td>
                                    <div class="main__table-btns">
                                       <a href="<?php echo base_url(); ?>cast_crew_details?id=<?php echo $wallpaper_list['wallpaper_id']; ?>"class="main__table-btn main__table-btn--view">
                                       <i class="lar la-eye"></i>
                                       </a>
                                       <a href="<?php echo base_url(); ?>edit_wallpaper_details?id=<?php echo $wallpaper_list['wallpaper_id']; ?>" class="main__table-btn main__table-btn--edit">
                                       <i class="las la-edit"></i>
                                       </a>
                                       <a data-toggle="modal" data-target="#modaldelete" class="main__table-btn main__table-btn--delete open-modal delete" id="<?php echo $wallpaper_list['wallpaper_id'];?>">
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
                     <h4>Wallpaper Details Delete</h4>
                     <p>Are you sure to permanently delete this Wallpaper Details</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-6">
                  <div class="main__title">
                     <a href="#" class="main__title-link w-100" id="delete_movie">Delete</a>
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