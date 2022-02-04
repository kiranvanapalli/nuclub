<input type="hidden" id="base" value="<?php echo base_url(); ?>">
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
   <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
         <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "dashboard") {
               echo "active";
               } ?>" href="<?= base_url() ?>dashboard">
            <i class="las la-braille"></i>
            <span class="menu-title" data-i18n="Transactions">Dashboard</span>
            </a>
         </li>
         <li class="nav-item" class="<?php echo active_link('members'); ?>">
            <a class="<?php if ($this->uri->segment(1) == "members") {
               echo "active";
               }
               else if($this->uri->segment(1) == "add_member")
               {
                  echo "active";
               }
               else if($this->uri->segment(1) == "edit_member")
               {
                  echo "active";
               } ?>" href="<?= base_url() ?>members">
            <i class="las la-user-alt"></i>
            <span class="menu-title" data-i18n="Transactions">Members</span>
            </a>
         </li>
         <!-- <li class="sidebar__nav-item">
            <a class="<?php if ($this->uri->segment(1) == "transcations") {
               echo "active";
               }
               else if ($this->uri->segment(1) == "Transcation List") {
               echo "active";
               }
                else if ($this->uri->segment(1) == "edit_award") {
               echo "active";
               }
                ?>" href="<?= base_url() ?>transcations">
            <i class="las la-calendar-check"></i>
            <span class="menu-title" data-i18n="Transactions">Transcations</span>
            </a>
         </li> -->
         <li class="sidebar__nav-item">
					<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="true" aria-controls="collapseMenu"><i class="las la-calendar-check"></i> <span>Transcations</span> <i class="icon ion-md-arrow-dropdown"></i></a>

					<ul class="collapse show sidebar__menu" id="collapseMenu">
						<li class="<?php if ($this->uri->segment(1) == "transcations") {
               echo "active";
               }?>" ><a href="<?php echo base_url() ?>transcations">Pending Transction List</a></li>
						<li class="<?php if ($this->uri->segment(1) == "tras_data") {
               echo "active";
               }?>" ><a href="<?php echo base_url()?>tras_data">Transcation List</a></li>
					</ul>
				</li>
         <li class="nav-item" class="<?php echo active_link('join_us'); ?>">
            <a class="<?php if ($this->uri->segment(1) == "join_us") {
               echo "active";
               } ?>" href="<?= base_url() ?>join_us">
            <i class="las la-user-friends"></i>
            <span class="menu-title" data-i18n="Transactions">Interested</span>
            </a>
         </li>
        
         <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "news_letter_subscription") {
               echo "active";
               } ?>" href="<?= base_url() ?>news_letter_subscription">
            <i class="las la-newspaper"></i>
            <span class="menu-title" data-i18n="Transactions">News Letter Subscription</span>
            </a>
         </li>

         <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "contact") {
               echo "active";
               } ?>" href="<?= base_url() ?>contact">
            <i class="las la-newspaper"></i>
            <span class="menu-title" data-i18n="Transactions">Contact</span>
            </a>
         </li>
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "enquiry") {
               echo "active";
               } ?>" href="<?= base_url() ?>enquiry">
            <i class="las la-headset"></i>
            <span class="menu-title" data-i18n="Transactions">Enquiry</span>
            </a>
         </li> -->
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "videos") {
               echo "active";
               } else if ($this->uri->segment(1) == "add_video") {
               echo "active";
               }
               else if($this->uri->segment(1) == "video_preview")
               {
                  echo "active";
               }else if($this->uri->segment(1) == "edit_video_details")
               {
                  echo "active";
               } ?>" href="<?= base_url() ?>videos">
            <i class="las la-video"></i>
            <span class="menu-title" data-i18n="Transactions">Videos</span>
            </a>
         </li> -->
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "news") {
               echo "active";
               } else if ($this->uri->segment(1) == "add_news") {
               echo "active";
               }
               else if($this->uri->segment(1) == "news_view")
               {
                  echo "active";
               }
               else if($this->uri->segment(1) == "edit_news")
               {
                  echo "active";
               }?>" href="<?= base_url() ?>news">
            <i class="las la-newspaper"></i>
            <span class="menu-title" data-i18n="Transactions">News</span>
            </a>
         </li> -->
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "gallery") {
               echo "active";
               } else if ($this->uri->segment(1) == "add_gallery") {
               echo "active";
               }
               else if($this->uri->segment(1) == "gallery_view")
               {
                  echo "active";
               }
               else if($this->uri->segment(1) == "edit_gallery")
               {
                  echo "active";
               }?>" href="<?= base_url() ?>gallery">
            <i class="las la-newspaper"></i>
            <span class="menu-title" data-i18n="Transactions">Gallery</span>
            </a>
         </li> -->

         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "behind_screen") {
               echo "active";
               } else if ($this->uri->segment(1) == "add_behind_screen") {
               echo "active";
               }
               else if($this->uri->segment(1) == "behind_screen_view")
               {
                  echo "active";
               }
               else if($this->uri->segment(1) == "edit_behind_screen")
               {
                  echo "active";
               }?>" href="<?= base_url() ?>behind_screen">
            <i class="las la-newspaper"></i>
            <span class="menu-title" data-i18n="Transactions">Behind the Screen</span>
            </a>
         </li> -->

         
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "wallpapers") {
               echo "active";
               } else if ($this->uri->segment(1) == "add_wallpaper") {
               echo "active";
               }
               else if($this->uri->segment(1) == "wallpaper_view")
               {
                  echo "active";
               }
               else if($this->uri->segment(1) == "edit_wallpaper")
               {
                  echo "active";
               }?>" href="<?= base_url() ?>wallpapers">
            <i class="las la-newspaper"></i>
            <span class="menu-title" data-i18n="Transactions">Wallpapers</span>
            </a>
         </li> -->
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "news_letter") {
               echo "active";
               } ?>" href="<?= base_url() ?>news_letter">
            <i class="las la-envelope"></i>
            <span class="menu-title" data-i18n="Transactions">News Letter</span>
            </a>
         </li> -->
         <!-- <li class="nav-item">
            <a class="<?php if ($this->uri->segment(1) == "profileview") {
               echo "active";
               } ?>" href="<?= base_url() ?>profileview">
            <i class="las la-user"></i>
            <span class="menu-title" data-i18n="Transactions">Profile</span>
            </a>
         </li> -->
         <!-- <li class="nav-item">
            <a href="<?= base_url() ?>logout">
            <i class="las la-sign-out-alt"></i>
            <span class="menu-title" data-i18n="Transactions">Logout</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="<?= base_url() ?>">
            <i class="las la-backspace"></i>
            <span class="menu-title" data-i18n="Transactions">Back to Mythri</span>
            </a>
         </li> -->
      </ul>
   </div>
</div>