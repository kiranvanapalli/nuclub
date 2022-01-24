<style>
   .main__title-link {
      width: 157px !important;
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
                  <h2>Profile</h2>
               </div>
            </div>
            <!-- <div class="col-4">
               <div class="main__title">
                  <a href="Profile.html" class="main__title-link">Save</a>
               </div>
            </div> -->
            <!-- end main title -->
         </div>
         <div id="crypto-stats-3" class="row">
            <div class="col-12">
               <div class="profile__content">
                  <!-- profile user -->
                  <div class="profile__user">
                     <div class="profile__avatar">
                        <i class="h2 la-user-tie las m-0 pb-1 pl-0 pr-0 pt-1 text-center text-white w-100"></i>
                     </div>
                     <!-- or red -->
                     <div class="profile__meta profile__meta--green">
                        <h3><?php echo $admin_data['user_name']; ?></h3>
                     </div>
                  </div>
                  <!-- end profile user -->
                  <!-- profile btns -->
                  <div class="profile__actions">
                  </div>
                  <!-- end profile btns -->
               </div>
            </div>

            <div class="col-12">
               <form  method="POST">
                  <div class="row row--form">
                     <div class="col-lg-12">
                        <h3>Details</h3>
                     </div>
                     <div class="col-4">
                        <input type="text" class="form__input" placeholder="Full Name" value="<?php echo $admin_data['user_name']; ?>" id="admin_name" name="admin_name">
                     </div>
                     <div class="col-lg-4">
                        <input type="text" class="form__input" placeholder="Email ID" value="<?php echo $admin_data['user_email']; ?>" id="admin_email" name="admin_email">
                     </div>
                     <div class="col-lg-4">
                        <input type="text" class="form__input" placeholder="Phone No" value=" <?php echo $admin_data['user_phone']; ?>" id="admin_phone" name="admin_phone">
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="main__title">
                           <button type="submit" class="main__title-link" name="profile_update" value="profile_update">Update Profile</button>
                        </div>
                     </div>
                  </div>
               </form>
               <form action="<?php echo base_url('admin_update_pass'); ?>" method="POST">
                  <div class="row row--form">
                     <div class="col-lg-12">
                        <h3>Change Password</h3>
                     </div>
                     <div class="col-4">
                        <input type="password" class="form__input" placeholder="Old Password" id="old_pass" name="old_pass">
                     </div>
                     <div class="col-4">
                        <input type="password" class="form__input" placeholder="New Password" id="new_pass" name="new_pass">
                     </div>
                     <div class="col-4">
                        <input type="password" class="form__input" placeholder="Confirm New Password" id="confirm_pass" name="confirm_pass">
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="main__title">
                           <button type="submit" class="main__title-link" name="password_update" value="password_update">Update Password</button>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>