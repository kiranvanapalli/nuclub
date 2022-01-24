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

        <div class="col-4">
          <div class="main__title">
            <!--						<a href="add-item.html" class="main__title-link">Add Item</a>-->
          </div>
        </div>
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
                <!-- <span>MythriID: 23562</span> -->
              </div>
            </div>
            <!-- end profile user -->

            <!-- profile btns -->
            <div class="profile__actions">
              <a href="<?= base_url() ?>edit_profile" class="profile__action profile__action--banned open-modal">
                <i class="las la-edit"></i></a>
            </div>
            <!-- end profile btns -->
          </div>
        </div>

        <div class="col-12">
          <div class="row row--form">

            <div class="col-lg-12">
              <h3>Details</h3>
            </div>

            <div class="col-4">
              <p class="dtp"><strong>Full Name:</strong> <?php echo $admin_data['user_name']; ?></p>
            </div>
            <div class="col-lg-4">
              <p class="dtp"><strong>Email ID :</strong><?php echo $admin_data['user_email']; ?></p>
            </div>
            <div class="col-lg-4">
              <p class="dtp"><strong>Phone No :</strong> +91 <?php echo $admin_data['user_phone']; ?> </p>
            </div>
           
            <!-- <div class="col-lg-4">
              <p class="dtp"><strong>Admin</strong> </p>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>