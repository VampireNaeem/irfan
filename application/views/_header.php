<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $this->settings->company_name; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- All css files are included here. -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/frontend/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/font-awesome.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/animate.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/animate-slider.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/slick.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/meanmenu.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/lightbox.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/plugins/magnific-popup.css')?>">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,900i|Roboto:400,500,700">

    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css')?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php // echo base_url('assets/frontend/css/responsive.css')?>">

    <!-- Modernizr JS -->
    <script src="<?php echo base_url('assets/frontend/js/vendor/modernizr-2.8.3.min.js')?>"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <header id="header" class="htc-header">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__area d-none d-md-block sticky__header" style="height: 105px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="logo">
                            <a href="<?php echo base_url('home')?>">
                                <img src="<?php echo base_url('assets/frontend/images/logo/pesh-logo.png')?>" alt="logo">
                            </a>
                        </div>
                    </div>
                    <!-- Start MAinmenu Ares -->
                    <div class="col-lg-10 col-md-9">
                        <nav class="mainmenu__nav">
                            <ul class="main__menu">
                                <li class="drop"><a href="<?php echo base_url('home')?>">Home</a>

                                </li>
                                <li><a href="<?php echo base_url('aboutus')?>">About Us</a></li>
                                <li class="drop"><a href="<?php echo base_url('collection')?>">Collections</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url('ethnological')?>">Ethnological</a></li>
                                        <li><a href="<?php echo base_url('gandharan')?>">Gandharan</a></li>
                                        <li><a href="<?php echo base_url('islamic')?>">Islamic</a></li>
                                        <li><a href="<?php echo base_url('coins')?>">Ancient Coins</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a href="<?php echo base_url('gallery')?>">Gallery</a></li>
                                <li><a href="<?php echo base_url('contactus')?>">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End mainmenu Areas -->
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
        <!-- Mobile-menu-area start -->
        <div class="mobile-menu-area d-block d-md-none">
            <div class="fluid-container mobile-menu-container">
                <div class="mobile-logo"><a href="#"><img src="<?php echo base_url('assets/frontend/images/logo/pesh-logo.png')?>"
                                      alt="Mobile logo"></a></div>
                <div class="mobile-menu clearfix">
                    <nav id="mobile_dropdown">
                        <ul>
                            <li><a href="#">Home</a> </li>
                            <li><a href="<?php echo base_url('aboutus')?>">About Us</a></li>
                            <li><a href="<?php echo base_url('collection')?>">Collections</a>
                                <ul>
                                    <li><a href="<?php echo base_url('ethnological')?>">Ethnological</a></li>
                                    <li><a href="<?php echo base_url('gandharan')?>">Gandharan</a></li>
                                    <li><a href="<?php echo base_url('islamic')?>">Islamic</a></li>
                                    <li><a href="<?php echo base_url('coins')?>">Ancient Coins</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('gallery')?>">Gallery</a></li>
                            <li><a href="<?php echo base_url('contactus')?>">Contact us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Mobile-menu-area End -->
    </header>
    <!-- End Header Style -->