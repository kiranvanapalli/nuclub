<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>:: NU Club ::</title>
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="user_assets/assets/images/favicon.png" />
    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/bootstrap.min.css">
    <!--owl carousel css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/owl.carousel.min.css">
    <!--magnific popup css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/fontawesome-all.min.css">
    <!--icomoon icon css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/icomoon.css">
    <!--icofont css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/icofont.min.css">
    <!--animate css-->
    <link rel="stylesheet" type="text/css" href="user_assets/assets/css/animate.css">
    <!--main css-->
    <link rel="stylesheet" type="text/css" href="user_assets/new-assets/css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" type="text/css" href="user_assets/new-assets/css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

</head>
<?php if($this->session->userdata('user_logged') == 1) 
{ 

    $name = $_SESSION['fullname']; ?>
    <header id="header" class="two sticky" style=" background: linear-gradient(90deg,#fff 15%, rgb(56, 144, 254) 100%);">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo base_url(); ?>"><img src="user_assets/new-assets/images/logo-2.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"><i class="icofont-navigation-menu"></i></span>
                    </button>
                    <!-- navbar links -->
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                            </li>
                           
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<strong>WelCome</strong> <?php echo $name; ?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								   <a class="dropdown-item" href="<?php echo base_url(); ?>user_logout">LogOut</a>
								   
								</div>
							 </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

<?php }
else
{ ?>
<header id="header" class="two">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="logo" href="<?php echo base_url(); ?>"><img src="user_assets/new-assets/images/logo-2.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"><i class="icofont-navigation-menu"></i></span>
                    </button>
                    <!-- navbar links -->
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo base_url(); ?>">Home</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="2">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="2">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-scroll-nav="4">News & Events</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link" href="" type="button" data-toggle="modal" data-target="#sidebar-right">Refer & Earn</a>
                            </li>
                            <li class="nav-item download-btn">
                                <a class="nav-link" href="<?php echo base_url(); ?>joinus">Join Us</a>
                            </li>
							<li class="nav-item download-btn">
                                <a class="nav-link" href="<?php echo base_url(); ?>user_login">Login / SignUp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

<?php } ?>
