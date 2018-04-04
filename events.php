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
                        <div class="logo"><a href="index.php"></a></div>
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

        
    </section>
    <!-- End / Hidden Bar -->
    
    <!--Main Slider Two-->
    <section class="main-slider-two">
        <div class="single-item-carousel owl-carousel owl-theme">
            
            <!--Slide-->
            <?php  $event = getEvents();
            $j=0;
            $count = $event['count']; $counter = intval($count/5); $limit= $count%5; 
            for ($i=0; $i < $counter; $i++) { ?>
            <div class="slide">
                <div class="clearfix">
                    <!--Slide Column-->
                    <div class="slide-column col-md-6 col-sm-12 col-xs-12">
                        <!--event Block Three-->
                        <div class="news-block-three style-two">
                            <div class="inner-box">
                                <div class="image">
                                    <img height="505px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$j]; ?>" alt="" />
                                    <div class="overlay-box">
                                        <div class="content">
                                            <div class="tag"><a href="categories.php?category=<?php echo $event['categoriesName'][$j]; ?>"><?php echo $event['categoriesName'][$j]; ?></a></div>
                                            <h3><a href="singleevents.php?event=<?php echo $event['tag'][$j]; ?>"><?php echo $event['event'][$j]." in ".$event['city'][$j].", ".$event['country'][$j]; ?></a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon qb-clock"></span><?php echo "From ".$event['dateStart'][$j]." to ".$event['dateEnd'][$j]; ?></li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Slide Column-->
                    <div class="slide-column col-md-6 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                             <div class="inner-slide col-md-6 col-sm-6 col-xs-12">
                                <!--News Block Three-->
                                <div class="news-block-three style-four">
                                    <div class="inner-box">
                                        <div class="image">
                                             <img height="250px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$j+1]; ?>" alt="" />
	                                    	<div class="overlay-box">
	                                        <div class="content">
                                            <div class="tag"><a href="categories.php?category=<?php echo $event['categoriesName'][$j+1]; ?>"><?php echo $event['categoriesName'][$j+1]; ?></a></div>
                                            <h3><a href="singleevents.php?event=<?php echo $event['tag'][$j]; ?>"><?php echo $event['event'][$j+1]." in".$event['city'][$j+1].", ".$event['country'][$j+1]; ?></a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon qb-clock"></span><?php echo "From ".$event['dateStart'][$j+1]." to ".$event['dateEnd'][$j+1]; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="inner-slide col-md-6 col-sm-6 col-xs-12">
                                <!--News Block Three-->
                                <div class="news-block-three style-four">
                                    <div class="inner-box">
                                        <div class="image">
                                             <img height="250px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$j+2]; ?>" alt="" />
	                                    	<div class="overlay-box">
	                                        <div class="content">
                                            <div class="tag"><a href="categories.php?category=<?php echo $event['categoriesName'][$j+2]; ?>"><?php echo $event['categoriesName'][$j+2]; ?></a></div>
                                            <h3><a href="singleevents.php?event=<?php echo $event['tag'][$j]; ?>"><?php echo $event['event'][$j+2]." in".$event['city'][$j+2].", ".$event['country'][$j+2]; ?></a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon qb-clock"></span><?php echo "From ".$event['dateStart'][$j+2]." to ".$event['dateEnd'][$j+2]; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="inner-slide col-md-6 col-sm-6 col-xs-12">
                                <!--News Block Three-->
                                <div class="news-block-three style-four">
                                    <div class="inner-box">
                                        <div class="image">
                                            <img height="250px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$j+3]; ?>" alt="" />
	                                    	<div class="overlay-box">
	                                        <div class="content">
                                            <div class="tag"><a href="categories.php?category=<?php echo $event['categoriesName'][$j+3]; ?>"><?php echo $event['categoriesName'][$j+3]; ?></a></div>
                                            <h3><a href="singleevents.php?event=<?php echo $event['tag'][$j]; ?>"><?php echo $event['event'][$j+3]." in".$event['city'][$j+3].", ".$event['country'][$j+3]; ?></a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon qb-clock"></span><?php echo "From ".$event['dateStart'][$j+3]." to ".$event['dateEnd'][$j+3]; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="inner-slide col-md-6 col-sm-6 col-xs-12">
                                <!--News Block Three-->
                                <div class="news-block-three style-four">
                                    <div class="inner-box">
                                        <div class="image">
                                            <img height="250px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$j+4]; ?>" alt="" />
	                                    	<div class="overlay-box">
	                                        <div class="content">
                                            <div class="tag"><a href="categories.php?category=<?php echo $event['categoriesName'][$j+4]; ?>"><?php echo $event['categoriesName'][$j+4]; ?></a></div>
                                            <h3><a href="singleevents.php?event=<?php echo $event['tag'][$j]; ?>"><?php echo $event['event'][$j+4]." in".$event['city'][$j+4].", ".$event['country'][$j+4]; ?></a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon qb-clock"></span><?php echo "From ".$event['dateStart'][$j+4]." to ".$event['dateEnd'][$j+4]; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php $j+=5;  } ?>
  
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </section>
    <!--End Main Slider Two-->
    
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                        <!--Sec Title-->
                         <div class="sec-title">
                            <h2>All Events</h2>
                        </div>
                        <div class="row clearfix">
                        <?php $lowerLimit = $counter*5; $upperLimit = $lowerLimit+$limit; //echo $lowerLimit." ".$upperLimit."";
                         for ($i = $lowerLimit; $i < $upperLimit; $i++) { ?>
                            <div class="column col-md-6 col-sm-6 col-xs-12">
                                    
                                <!--News Block Two-->
                                <div class="news-block-two with-margin">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="event.php?event=<?php echo $event['tag'][$i]; ?>"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$i]; ?>" alt="" /></a>
                                            <div class="category"><a href="categories.php?category=<?php echo $event['categoriesName'][$i]; ?>"><?php echo $event['categoriesName'][$i]; ?></a></div>
                                        </div>
                                        <div class="lower-box">
                                            <h3><a href="singleevents.php?event=<?php echo $event['tag'][$i]; ?>"><?php echo $event['event'][$i]." in ".$event['city'][$i].", ".$event['country'][$i]; ?></a></h3>
                                            <ul class="post-meta">
                                                <li><span class="icon fa fa-clock-o"></span><?php echo "From ".$event['dateStart'][$i]." to ".$event['dateEnd'][$i]; ?></li>
                                            </ul>
                                            <div style="height: 180px;" class="text"><?php echo $event['details'][$i]; ?></div>
                                        </div>
                                    </div>
                                </div>

                                
                             </div>
                             <?php } ?>
                            
                            
                        </div>
                    </div>
            
        </div>
    </div>

    
                        
                        
    
    
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
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/script.js"></script>
<script src="js/color-settings.js"></script>

</body>
</html>
