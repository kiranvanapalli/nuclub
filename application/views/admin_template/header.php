<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <link rel="apple-touch-icon" href="admin_assets/app-assets/images/ico/apple-icon-120.png" />

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/bootstrap-extended.min.css" />
    <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/components.min.css" />
    <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/vertical-menu-modern.css" />
    <link rel="stylesheet" type="text/css" href="admin_assets/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="admin_assets/assets/line-awesome-1.3.0/1.3.0/css/line-awesome.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="admin_assets/assets/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                            <i class="las la-bars font-large-1"></i></a>
                    </li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard">
                            <img class="brand-logo" alt="modern admin logo" src="admin_assets/app-assets/images/logo/logo.png" />
                            <!-- <h3 class="brand-text">Mythri Movie Maker</h3> -->
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">

                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1 user-name text-bold-200">MMM</span><span class="avatar avatar-online"><img src="admin_assets/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar" /><i></i></span>
                            </a>
                            
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo base_url(); ?>profileview"><i class="ft-user"></i> View/Edit Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>logout"><i class="ft-power"></i> Logout</a>
                                </div>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a href="Dashboard.html" class="active">
                        <i class="las la-braille"></i>
                        <span class="menu-title" data-i18n="Transactions">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Upcomingmovies.html">
                        <i class="las la-film"></i>
                        <span class="menu-title" data-i18n="Transactions">Upcoming Movies</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Awards.html">
                        <i class="las la-award"></i>
                        <span class="menu-title" data-i18n="Transactions">Awards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Movies.html">
                        <i class="las la-film"></i>
                        <span class="menu-title" data-i18n="Transactions">Movies</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Enquiry.html">
                        <i class="las la-headset"></i>
                        <span class="menu-title" data-i18n="Transactions">Enquiry</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Videos.html">
                        <i class="las la-video"></i>
                        <span class="menu-title" data-i18n="Transactions">Videos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="News.html">
                        <i class="las la-newspaper"></i>
                        <span class="menu-title" data-i18n="Transactions">News</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Newsletter.html">
                        <i class="las la-envelope"></i>
                        <span class="menu-title" data-i18n="Transactions">News Letter</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Profile.html">
                        <i class="las la-user"></i>
                        <span class="menu-title" data-i18n="Transactions">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="login.html">
                        <i class="las la-sign-out-alt"></i>
                        <span class="menu-title" data-i18n="Transactions">Logout</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../Main/index.html">
                        <i class="las la-backspace"></i>
                        <span class="menu-title" data-i18n="Transactions">Back to Mythri</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>