
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Mythri Movie Makers</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/" />
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Montserrat:wght@700&amp;family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />

        <link rel="icon" type="image/png" sizes="16x16" href="user_assets/img/favicons/favicon-16x16.png" />
		
        <link rel="manifest" href="user_assets/img/favicons/manifest.json" />
        <link rel="stylesheet" href="user_assets/css/app.min.css" />
        <link rel="stylesheet" href="user_assets/css/fontawesome.min.css" />
        <link rel="stylesheet" href="user_assets/css/style.css" />
        <link rel="stylesheet" href="user_assets/css/theme-color1.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <div class="preloader">
<!--            <button class="vs-btn preloaderCls">Cancel Preloader</button>-->
            <div class="preloader-inner">
                <div class="loader-logo"><img src="user_assets/img/logo.png" alt="Loader Image" /></div>
                <div class="loader-wrap pt-4"><span class="loader"></span></div>
            </div>
        </div>
        <div class="sticky-header-wrap sticky-header py-1 py-sm-2 py-lg-1">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-5 col-md-3">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>"><img src="user_assets/img/logo-2.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-7 col-md-9 text-end position-static">
                        <nav class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
                            <ul>
                                <li><a href="<?php echo base_url(); ?>">Home</a></li>
								<li class="menu-item-has-children">
								   <a href="#">company</a>
								   <ul class="sub-menu">
									  <li><a href="<?php echo base_url(); ?>about">About</a></li>
                                      <li><a href="<?php echo base_url(); ?>awards">Awards</a></li>
								   </ul>
								</li>
								<li><a href="<?= base_url(); ?>all_movies">Movies</a></li>
								<li><a href="<?= base_url(); ?>contactus">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="vs-menu-wrapper">
            <div class="vs-menu-area bg-dark">
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
                <div class="mobile-logo">
                    <a href="<?php echo base_url(); ?>"><img src="user_assets/img/logo.png" alt="" /></a>
                </div>
                <div class="vs-mobile-menu link-inherit"></div>
            </div>
        </div>
        <header class="header-wrapper header-layout3 z-index-step1">
            
            <div class="menu-area py-3 py-lg-0">
                <div class="container position-relative">
                    <div class="row align-items-center">
                        <div class="col-6 col-xl-2">
                            <div class="bg-major-black d-lg-block d-none header-logo2 pt-30">
                                <a href="<?php echo base_url(); ?>"><img src="user_assets/img/logo.png" alt="Logo Image" /></a>
                            </div>
                            <a class="d-inline-block d-lg-none" href="<?php echo base_url(); ?>"><img src="user_assets/img/logo-2.png" alt="Theme Logo" /></a>
                        </div>
                        <div class="col-6 col-lg-12 text-end ">
                            <nav class="main-menu menu-style2 mobile-menu-active" data-expand="992">
                                <ul>
									<li><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="menu-item-has-children">
									  <a href="#">company</a>
									  <ul class="sub-menu">
										  <li><a href="<?php echo base_url(); ?>about">About</a></li>
									 	  <li><a href="<?php echo base_url(); ?>awards">Awards</a></li>
									  </ul>
								   </li>
                                   <li><a href="<?= base_url(); ?>all_movies">Movies</a></li>
									<li><a href="<?= base_url(); ?>contactus">Contact</a></li>
                            	</ul>
                            </nav>
                            <button type="button" class="vs-menu-toggle  d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
