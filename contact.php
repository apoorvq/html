<?php
include "ControllerFunction.php";
checkDevice();
    session_start();

    //$newsCategory = getFeaturedEvents();
    $featuredNews = getNews(10);
    $headerEvent = getFeaturedEvents();
    $countCategory = countCategory();
    $featuredEvent = getFeaturedEvents();
    $countCategories = count($countCategory['count']);
    $bannerImage = getBanner();
    
    //print_r($featuredEvent);


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>texTIMZ | Textile Information Network</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<!--Color Themes-->
<link id="theme-color-file" href="css/color-themes/default-theme.css" rel="stylesheet">

<!--Favicon-->
<link rel="shortcut icon" href="assets/favicon.png" type="image/x-icon">
<link rel="icon" href="assets/favicon.png" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">
    
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!-- Main Header -->
    <header class="main-header">

        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">
                    
                    <div class="pull-left logo-outer">
                        <div class="logo"><a href="index1.php"></a></div>
                    </div>
                    
                    <div class="pull-right upper-right clearfix">
                        <div class="add-image">
                            <a href="<?php echo $bannerImage['campaignLink'][0]; ?>"><img height="87px" width="770px" src="<?php echo $bannerImage['campaignImage'][0]; ?>" alt="<?php echo $bannerImage['campaignName'][0]; ?>" /></a><!--todo:backend integration, size = 700X87-->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container">
                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix" id="bs-example-navbar-collapse-1">
                            <ul class="navigation clearfix">
                                <li><a href="index.php">Home</a>
                                </li>
                                <li><a href="about.php">About Us</a></li>
                                <li class="dropdown"><a href="#">Categories</a>
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <?php for ($i=0; $i < $countCategories; $i++) { ?>                          
                                        <li data-tab="#prod-travel" class="tab-btn active-btn"><a href="categories.php?category=<?php echo $countCategory['categoriesName'][$i]; ?>"><?php echo $countCategory['categoriesName'][$i]; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="mega-menu"><a href="news.php">News</a>
                                    <div class="mega-menu-bar">
                                        
                                        <div class="mega-menu-carousel owl-carousel owl-theme">
                                                                        
                                            <!--News Block Nine-->
                                            <?php for ($i=0; $i < 9 ; $i++) { ?>
                                            <div class="news-block-nine">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="singlenews.php?news=<?php echo $featuredNews['slugs'][$i]; ?>"><img height="173px" width="255px" src="<?php echo $featuredNews['sources'][$i]; ?> ?>" alt="" /></a>
                                                        <div class="category"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][$i]; ?>"><?php echo $featuredNews['categoriesName'][$i]; ?></a></div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3 style="height: 90px;"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][$i]; ?>"><?php echo $featuredNews['headlines'][$i]; ?></a></h3>
                                                        <div class="post-date"><?php echo $featuredNews['cardDate'][$i]; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="mega-menu"><a href="events.php">Events</a>
                                    <div class="mega-menu-bar">
                                        
                                        <div class="mega-menu-carousel owl-carousel owl-theme">
                                            <?php $eventCount = $headerEvent['count']; 
                                            for ($i = 0; $i < $eventCount ; $i++) { ?>
                                            <div class="news-block-nine">
                                                <div class="inner-box">
                                                    <div class="image">
                                                        <a href="singleevents.php?event=<?php echo $headerEvent['tag'][$i]; ?>"><img height="173px" width="255px" src="<?php echo $headerEvent['source'][$i]; ?>" alt="" /></a>
                                                        <div class="category"><a href="categories.php?category=<?php  echo $headerEvent['categoriesName'][$i]; ?>"><?php echo $headerEvent['categoriesName'][$i]; ?></a></div>
                                                    </div>
                                                    <div class="lower-box">
                                                        <h3 style="height: 90px;"><a href="singleevents.php?event=<?php echo $headerEvent['tag'][$i]; ?>"><?php echo $headerEvent['event'][$i]." in ".$headerEvent['country'][$i]; ?></a></h3>
                                                        <div class="post-date"><?php echo "From ".$headerEvent['dateStart'][$i]." to ".$headerEvent['dateEnd'][$i]; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>                                     
                                        </div>
                                        
                                    </div>
                                </li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="jobs.php">Jobs</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="outer-box">
                        
                        <!--Search Box--><!--todo:backend integration-->
                        <div class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu1">
                                    <li class="panel-outer">
                                        <div class="form-container">
                                            <form method="post" action="blog.php">
                                                <div class="form-group">
                                                    <input type="search" name="field-name" value="" placeholder="Search Here" required>
                                                    <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Hidden Nav Toggler -->
                     <div class="nav-toggler">
                         <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                     </div>
                    
                </div>
            </div>
        </div>
        <!--End Header Lower-->
        
        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="index.php" class="img-responsive" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="about.php">About Us</a></li>
                                </li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="https://www.facebook.com/textimz/" target="_blank"><span class="fa fa-facebook-square"></span></a></li><!--todo:link-->
                                <li><a href="https://twitter.com/textimz" target="_blank"><span class="fa fa-twitter"></span></a></li><!--todo:link-->
                                <li><a href="https://angel.co/textimz" target="_blank"><span class="fa fa-angellist"></span></a></li><!--todo:link-->
                                <li><a href="https://www.linkedin.com/company/textimz/" target="_blank"><span class="fa fa-linkedin-square"></span></a></li><!--todo:link-->
                                <li><a href="https://www.youtube.com/channel/UCXdkipfigM-VpuokJeXMK_w"><span class="fa fa-youtube-square"></span></a></li><!--todo:link-->
                        </div>

                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
        
    </header>
    <!--End Header Style Two -->
    
    
    
    <!--Page Title-->
    <section class="page-title">
    	<div class="auto-container">
        	<div class="clearfix">
            	<div class="pull-left">
                	<h2>Contact Page</h2>
                </div>
                <div class="pull-right">
                	<ul class="page-title-breadcrumb">
                    	<li><a href="#"><span class="fa fa-home"></span>Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
	<!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
        	<!--Map Section-->
            <section class="map-section">
                <!--Map Outer-->
                <div class="map-outer">
                    <!--Map Canvas-->
                    <div class="map-canvas"
                        data-zoom="17"
                        data-lat="28.5492202"
                        data-lng="77.21490540000002"
                        data-type="roadmap"
                        data-hue="#ffc400"
                        data-title="texTIMZ"
                        data-icon-path=""
                        data-content="87, second floor, Shahpur Jat, Siri Fort Institutional Area, Siri Fort, New Delhi, Delhi 110049<br><a href='mailto:Diksha@live.com'>diksha@live.com</a>">
                    </div>
                </div>
            </section>
            <!--End Map Section-->
            
            <div class="row clearfix">
            	<!--Form Column-->
            	<div class="form-column col-md-8 col-sm-12 col-xs-12">
                	<div class="sec-title">
                    	<h2>Contact Form</h2>
                    </div>
                    <div class="text">Have any Query!</div>
                    <!--Contact Form-->
                    <div class="contact-form">
                        <form method="post" action="sendemail.php" id="contact-form">
                            <div class="clearfix">
                                <div class="form-group">
                                    <input type="text" name="name" value="" placeholder="Name ..." required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" value="" placeholder="Email ..." required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" value="" placeholder="Phone ..." required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Message ..."></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="theme-btn submit-btn">Submit Comment</button>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!--Info Column-->
                <div class="info-column col-md-4 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="sec-title">
                        	<h2>Contact Info</h2>
                        </div>
                        <ul class="social-icon-one alternate">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="g_plus"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li class="linkedin"><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
                            <li class="pinteret"><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                            <li class="android"><a href="#"><span class="fa fa-android"></span></a></li>
                            <li class="instagram"><a href="#"><span class="fa fa-instagram"></span></a></li>
                            <li class="vimeo"><a href="#"><span class="fa fa-vimeo"></span></a></li>
                        </ul>
                        <ul class="info-list">
                        	<li>87, Shahpur Jat, Siri Fort Institutional Area, Siri Fort, New Delhi, Delhi 110049</li>
                            <li>Phone:  <br> Mobile: </li>
                            <li>General: info@textimz.com <br> Editor: shefali@textimz.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--End Contact Section-->
    
    <!--Main Footer-->
    <!--Main Footer-->
    <footer class="main-footer">

        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="column col-md-3 col-sm-12 col-xs-12">
                        <div class="logo">
                            <img src="assets/textimz.png">
                            <a href="index.php"></a>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column col-md-6 col-sm-12 col-xs-12">
                        <div class="text">texTIMZ is a knowledge portal for textile industry. It provides the professionals with crisp and precise information of the industry. texTIMZ enables all this through the website, mobile application and a daily Newsletter. Which reaches more than a million eyeballs.</div>
                    </div>
                    <!--Column-->
                    <div class="column col-md-3 col-sm-12 col-xs-12">
                        <ul class="social-icon-one">
                            <li><a href="https://www.facebook.com/textimz/"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a href="https://twitter.com/textimz"><span class="fa fa-twitter"></span></a></li>
                            <li class="g_plus"><a href="https://angel.co/textimz"><span class="fa fa-angellist"></span></a></li>
                            <li class="linkedin"><a href="https://www.linkedin.com/company/textimz/"><span class="fa fa-linkedin"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Copyright Section-->
            <div class="copyright-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <ul class="footer-nav">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="contact.php">Contacts</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="copyright">&copy; All Right Reserved by texTIMZ, 2017</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!--End Scroll to top-->

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/owl.js"></script>
<script src="js/appear.js"></script>
<script src="js/wow.js"></script>
<script src="js/validate.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/script.js"></script>
<script src="js/color-settings.js"></script>

<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
<script src="js/map-script.js"></script>
<!--End Google Map APi-->

</body>
</html>
