<?php
include "ControllerFunction.php";
checkDevice();
    session_start();

    $newsCategory = getFeaturedEvents();
    $featuredNews = getNews(10);
    $headerEvent = getFeaturedEvents();
    $countCategory = countCategory();
    $featuredEvent = getFeaturedEvents();
    $countCategories = count($countCategory['count']);
    $bannerImage = getBanner();
    $video = getVideoGalleryLink();
    
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
                                            <form method="post">
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
    
   <!--Main Slider Six-->
    <section class="main-slider-six grey-bg">
        <div class="auto-container">
           <div class="tab-column">
                
                <!--Default Tab Box-->
                <div class="default-tab-box tabs-box">
                    <div class="clearfix">
                        
                        <!--Column-->
                        <div class="column col-md-8 col-sm-12 col-xs-12">
                            <!--Tabs Container-->
                            <div class="tabs-content">
                            
                                <!--Tab / Active Tab-->
                                <div class="tab active-tab" id="tab-1">
                                    <div class="content">
                                        
                                        <!--News Block Three-->
                                        <div class="news-block-three style-two">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img width="800px" height="632px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][0]; ?>" alt="" /><!--todo:Backend integration, size = 800X632-->
                                                    <div class="overlay-box">
                                                        <div class="content">
                                                            <div class="tag"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][0]; ?>"><?php echo $featuredNews['categoriesName'][0]; ?></a></div><!--todo:Backend integration-->
                                                            <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][0]; ?>"><?php echo $featuredNews['headlines'][0]; ?></a></h3><!--todo:Backend integration-->
                                                            <ul class="post-meta">
                                                                <li><span class="icon qb-clock"></span><?php echo $featuredNews['cardDate'][0]; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <!--Tab-->
                                <div class="tab" id="tab-2">
                                    <div class="content">
                                        
                                        <!--News Block Three-->
                                        <div class="news-block-three style-two">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img width="800px" height="632px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][1]; ?>" alt="" /><!--todo:Backend integration, size = 800X632-->
                                                    <div class="overlay-box">
                                                        <div class="content">
                                                            <div class="tag"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][1]; ?>"><?php echo $featuredNews['categoriesName'][1]; ?></a></div><!--todo:Backend integration-->
                                                            <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][1]; ?>"><?php echo $featuredNews['headlines'][1]; ?></a></h3><!--todo:Backend integration-->
                                                            <ul class="post-meta">
                                                                <li><span class="icon qb-clock"></span><?php echo $featuredNews['cardDate'][1]; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!--Tab-->
                                <div class="tab" id="tab-3">
                                    <div class="content">
                                        
                                        <!--News Block Three-->
                                        <div class="news-block-three style-two">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img width="800px" height="632px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][2]; ?>" alt="" /><!--todo:Backend integration, size = 800X632-->
                                                    <div class="overlay-box">
                                                        <div class="content">
                                                            <div class="tag"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][2]; ?>"><?php echo $featuredNews['categoriesName'][2]; ?></a></div><!--todo:Backend integration-->
                                                            <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][2]; ?>"><?php echo $featuredNews['headlines'][2]; ?></a></h3><!--todo:Backend integration-->
                                                            <ul class="post-meta">
                                                                <li><span class="icon qb-clock"></span><?php echo $featuredNews['cardDate'][2]; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!--Tab-->
                                <div class="tab" id="tab-4">
                                    <div class="content">
                                        
                                        <!--News Block Three-->
                                       <div class="news-block-three style-two">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img width="800px" height="632px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][3]; ?>" alt="" /><!--todo:Backend integration, size = 800X632-->
                                                    <div class="overlay-box">
                                                        <div class="content">
                                                            <div class="tag"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][3]; ?>"><?php echo $featuredNews['categoriesName'][3]; ?></a></div><!--todo:Backend integration-->
                                                            <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][3]; ?>"><?php echo $featuredNews['headlines'][3]; ?></a></h3><!--todo:Backend integration-->
                                                            <ul class="post-meta">
                                                                <li><span class="icon qb-clock"></span><?php echo $featuredNews['cardDate'][3]; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <!--Tab-->
                                <div class="tab" id="tab-5">
                                    <div class="content">
                                        
                                        <!--News Block Three-->
                                        <div class="news-block-three style-two">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img width="800px" height="632px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][4]; ?>" alt="" /><!--todo:Backend integration, size = 800X632-->
                                                    <div class="overlay-box">
                                                        <div class="content">
                                                            <div class="tag"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][4]; ?>"><?php echo $featuredNews['categoriesName'][4]; ?></a></div><!--todo:Backend integration-->
                                                            <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][4]; ?>"><?php echo $featuredNews['headlines'][4]; ?></a></h3><!--todo:Backend integration-->
                                                            <ul class="post-meta">
                                                                <li><span class="icon qb-clock"></span><?php echo $featuredNews['cardDate'][4]; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--News Block Three-->
                                        <div class="tab" id="tab-6">
                                        <div class="content">
                                        <div class="news-block-three style-two">
                                            <div class="inner-box">
                                                <div class="image">
                                                    <img width="800px" height="632px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][5]; ?>" alt="" /><!--todo:Backend integration, size = 800X632-->
                                                    <div class="overlay-box">
                                                        <div class="content">
                                                            <div class="tag"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][5]; ?>"><?php echo $featuredNews['categoriesName'][5]; ?></a></div><!--todo:Backend integration-->
                                                            <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][5]; ?>"><?php echo $featuredNews['headlines'][5]; ?></a></h3><!--todo:Backend integration-->
                                                            <ul class="post-meta">
                                                                <li><span class="icon qb-clock"></span><?php echo $featuredNews['cardDate'][5]; ?></li>
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
                        </div>
                        
                        <!--Column-->
                        <div class="column col-md-4 col-sm-12 col-xs-12">
                            <!--Tab Btns-->
                            <ul class="tab-btns tab-buttons clearfix">
                                <li data-tab="#tab-1" class="tab-btn active-btn">
                                    <!--Widget Post-->
                                    <article class="widget-post">
                                        <figure class="post-thumb"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][0]; ?>"><img width="86px" height="79px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][0]; ?>" alt=""></a></figure>
                                        <div class="text"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][0]; ?>"><?php echo $featuredNews['headlines'][0]; ?></a></div>
                                        <div class="post-info"><?php echo $featuredNews['cardDate'][0]; ?></div>
                                    </article>
                                </li>
                                <li data-tab="#tab-2" class="tab-btn">
                                    <!--Widget Post-->
                                    <article class="widget-post">
                                        <figure class="post-thumb"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][1]; ?>"><img width="86px" height="79px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][1]; ?>" alt=""></a></figure>
                                        <div class="text"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][1]; ?>"><?php echo $featuredNews['headlines'][1]; ?></a></div>
                                        <div class="post-info"><?php echo $featuredNews['cardDate'][1]; ?></div>
                                    </article>
                                </li>
                                <li data-tab="#tab-3" class="tab-btn">
                                    <!--Widget Post-->
                                    <article class="widget-post">
                                        <figure class="post-thumb"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][2]; ?>"><img width="86px" height="79px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][2]; ?>" alt=""></a></figure>
                                        <div class="text"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][2]; ?>"><?php echo $featuredNews['headlines'][2]; ?></a></div>
                                        <div class="post-info"><?php echo $featuredNews['cardDate'][2]; ?></div>
                                    </article>
                                </li>
                                <li data-tab="#tab-4" class="tab-btn">
                                    <!--Widget Post-->
                                    <article class="widget-post">
                                        <figure class="post-thumb"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][3]; ?>"><img width="86px" height="79px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][3]; ?>" alt=""></a></figure>
                                        <div class="text"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][3]; ?>"><?php echo $featuredNews['headlines'][3]; ?></a></div>
                                        <div class="post-info"><?php echo $featuredNews['cardDate'][3]; ?></div>
                                    </article>
                                </li>
                                <li data-tab="#tab-5" class="tab-btn">
                                    <!--Widget Post-->
                                    <article class="widget-post">
                                        <figure class="post-thumb"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][4]; ?>"><img width="86px" height="79px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][4]; ?>" alt=""></a></figure>
                                        <div class="text"><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][4]; ?>"><?php echo $featuredNews['headlines'][4]; ?></a></div>
                                        <div class="post-info"><?php echo $featuredNews['cardDate'][4]; ?></div>
                                    </article>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                
            </div>
           
        </div>
    </section>
    <!--End Main Slider Six-->
     <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <!--Latest News-->
                    <div class="latest-news-section">
                        <!--Sec Title-->
                        <div class="sec-title">
                            <h2>Latest News</h2>
                        </div>
                        <div class="row clearfix">
                            
                            <?php for ($i=0; $i < 8; $i++) {  ?>
                            <div class="news-block-two with-margin col-md-6 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="singlenews.php?news=<?php echo $featuredNews['slugs'][$i]; ?>"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredNews['sources'][$i]; ?>" alt="" /></a>
                                        <div class="category"><a href="categories.php?category=<?php echo $featuredNews['categoriesName'][$i]; ?>"><?php echo $featuredNews['categoriesName'][$i]; ?></a></div>
                                    </div>
                                    <div class="lower-box">
                                        <h3><a href="singlenews.php?news=<?php echo $featuredNews['slugs'][$i]; ?>"><?php echo $featuredNews['headlines'][$i]; ?></a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span><?php echo $featuredNews['cardDate'][$i]; ?></li>
                                        </ul>
                                        <div class="text"><?php echo $featuredNews['content'][$i]; ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                        
                    </div>
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar default-sidebar right-sidebar">
                    
                        <!--Social Widget-->
                        <div class="sidebar-widget sidebar-social-widget">
                            <div class="sidebar-title">
                                <h2>Follow Us</h2>
                            </div>
                            <ul class="social-icon-one alternate">
                            <li><a href="https://www.facebook.com/textimz/"><span class="fa fa-facebook"></span></a></li>
                            <li class="twitter"><a href="https://twitter.com/textimz"><span class="fa fa-twitter"></span></a></li>
                            <li class="g_plus"><a href="https://angel.co/textimz"><span class="fa fa-angellist"></span></a></li>
                            <li class="linkedin"><a href="https://www.linkedin.com/company/textimz/"><span class="fa fa-linkedin"></span></a></li>
                            </ul>
                        </div>
                        <!--End Social Widget-->
                        <div class="sidebar-widget posts-widget">

                            <!--Product widget Tabs-->
                            <div class="product-widget-tabs">
                                <!--Product Tabs-->
                                <div class="prod-tabs tabs-box">
                                
                                    <!--Tab Btns-->
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li style="width: auto;" data-tab="#prod-popular" class="tab-btn active-btn">Video Gallery</li>
                                    </ul>
                                     <div class="newsletter-widget no-margin-btm" s>
                                    <div class="inner-box">
                                        <h2><?php echo $video['videoName']; ?></h2>
                                        <div class="emailed-form" >
                                            <iframe width="280" height="188" src="<?php echo $video['videoLink']; ?>" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>   
                            </div>    
                        </div>
                        </div>
                        
                        <!--Category Widget-->
                        <div class="sidebar-widget categories-widget">
                            <div class="sidebar-title">
                                <h2>Categories</h2>
                            </div>
                            <ul class="cat-list">
                                <?php  $countCategories = count($countCategory['count']); 
                                for ($i=0; $i < $countCategories ; $i++) { ?>
                                <li class="clearfix"><a href="categories.php?category=<?php echo $countCategory['categoriesName'][$i]; ?>"><?php echo $countCategory['categoriesName'][$i]; ?> <span>(<?php echo $countCategory['count'][$i]; ?>)</span></a></li>
                                <?php }  ?>
                            </ul>
                        </div>
                        
                        <!--NewsLetter Widget-->
                        <div class="newsletter-widget no-margin-btm">
                            <div class="inner-box">
                                <h2>Subscribe to Newsweave</h2>
                                <div class="emailed-form">
                                    <form method="post" action="subscriber.php">
                                        <div class="form-group">
                                            <input type="email" name="email" value="" placeholder="Enter your email..." required>
                                            <button type="submit" class="theme-btn">Subscribe!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                    </aside>
                </div>
                
            </div>
            
        </div>
    </div>
    <!--End Sidebar Page Container-->
    
    <!--Blog Gallery-->
    <section class="blog-gallery grey-bg">
        <div class="auto-container">
            <div class="row clearfix">
                <h2>EVENTS</h2>
                <hr>
                <div class="column pull-left col-md-3 col-sm-6 col-xs-12">
                    
                    <!--News Block Two-->
                    <?php $event = getEvents();
                    for ($i=0; $i < 2 ; $i++) {  ?>
                    <div class="news-block-two small-block">
                        <div class="inner-box">
                            <div class="image">
                                <a href="SingleEvents.php?event=<?php echo $headerEvent['tag'][$i]; ?>"><img width="273px" height="213px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$i] ?>" alt="" /></a>
                                <div class="category"><a href="#"><?php echo $event['categoriesName'][$i] ?></a></div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="SingleEvents.php?event=<?php echo $headerEvent['tag'][$i]; ?>"><?php echo $event['event'][$i] ?></a></h3>
                                <ul class="post-meta">
                                    <li><span class="icon fa fa-clock-o"></span><?php echo "From ".$event['dateStart'][$i]." to ".$event['dateEnd'][$i] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="column pull-right col-md-3 col-sm-6 col-xs-12">
                    
                    <!--News Block Two-->
                    <?php $event = getEvents();
                    for ($i=2; $i < 4 ; $i++) {  ?>
                    <div class="news-block-two small-block">
                        <div class="inner-box">
                            <div class="image">
                                <a href="SingleEvents.php?event=<?php echo $event['tag'][$i]; ?>"><img width="273px" height="213px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $event['source'][$i] ?>" alt="" /></a>
                                <div class="category"><a href="#"><?php echo $event['categoriesName'][$i] ?></a></div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="SingleEvents.php?event=<?php echo $event['tag'][$i]; ?>"><?php echo $event['event'][$i] ?></a></h3>
                                <ul class="post-meta">
                                    <li><span class="icon fa fa-clock-o"></span><?php echo "From ".$event['dateStart'][$i]." to ".$event['dateEnd'][$i] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
                <div class="column col-md-6 col-sm-12 col-xs-12">
                    
                    <!--News Block Seven-->
                    <?php $featuredEvent = getFeaturedEvents();  ?>
                    <div class="news-block-seven style-two">
                        <div class="inner-box">
                            <div class="image">
                                <a href="SingleEvents.php?event=<?php echo $featuredEvent['tag'][0]; ?>"><img width="563px" height="426px" class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="<?php echo $featuredEvent['source'][0] ?>" alt="" /></a>
                                <div class="category"><a href="categories.php?Category=<?php echo $featuredEvent['categoriesName'][0] ?>"><?php echo $featuredEvent['categoriesName'][0] ?></a></div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="SingleEvents.php?event=<?php echo $featuredEvent['tag'][0]; ?>"><?php echo $featuredEvent['event'][0] ?></a></h3>
                                <ul class="post-meta">
                                    <li><span class="icon fa fa-clock-o"></span><?php echo "From ".$featuredEvent['dateStart'][0]." to ".$featuredEvent['dateEnd'][0] ?></li>
                                </ul>
                                <div class="text"><?php echo $featuredEvent['details'][0] ?></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </section>
    <!--End Blog Gallery-->
    
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
<script src="js/color-settings.js"></script>
<script src="js/script.js"></script>

</body>
</html>
