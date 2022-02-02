<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>:: NU Club ::</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="member_assets/images/favicon.png">
    <link href="member_assets/vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="member_assets/vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="member_assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="member_assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="javascript:void()" class="brand-logo">
                <img class="logo-abbr" src="member_assets/images/logo.png" alt="">
                <img class="logo-compact" src="member_assets/images/logo-text.png" alt="">
                <img class="brand-title" src="member_assets/images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">

                        <ul class="navbar-nav header-right float-right">
                            <li class="nav-item header-profile">
                                <a class="nav-link" href="<?php echo base_url() ?>member_dashboard" role="button">
                                    <i class="mdi mdi-home-account"></i> <span>Home</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i> <span>Profile</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="<?php echo base_url(); ?>Profile" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="<?php echo base_url(); ?>user_login"  onclick="return confirm('Are you sure to logout?');" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>