<?php
include "ControllerFunction.php";
checkDevice();
    session_start();
if (isset($_GET['news'])) 
{
    $news = $_GET['news'];
    //echo $news;
    $featuredNews = getNews(10);
    $headerEvent = getFeaturedEvents();
    $countCategory = countCategory();
    $featuredEvent = getFeaturedEvents();
    $countCategories = count($countCategory['count']);
    $bannerImage = getBanner();
    $singleNews = getSingleNews($news);
    $relatedItems = getNews(10);

    
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
                                            <form method="post" >
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
                                            <!--Page Title-->
   
                </div>
            </div>
        </div>
         <section class="page-title" style="border-bottom: 1px solid #ddd; ">
        <div class="auto-container">
            <div class="clearfix">
                <div class="pull-left">
                    <h2><?php echo "News"; ?></h2>
                </div>
                <div class="pull-right">
                    <ul class="page-title-breadcrumb">
                        <li><a href="index.php"><span class="fa fa-home"></span>Home</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="#"><?php echo $singleNews['headlines']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Shop Single-->
    <div class="shop-page">
        <div class="auto-container">
            <!--Basic Details-->
            <div class="basic-details">
                <div class="row clearfix">
                
                    <div class="image-column col-md-6 col-sm-12 col-xs-12">
                        <div class="carousel-outer">
                            <a href="#" class="lightbox-image" title="<?php echo $singleNews['headlines']; ?>"><img width="570px" height="570px" src="<?php echo $singleNews['sources']; ?>" alt="<?php echo $singleNews['headlines']; ?>"></a>
                        </div>
                    </div>
                    
                    <!--Info Column-->
                    <div class="info-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="inner-column">
                            <div class="details-header">
                                <h4><?php echo $singleNews['headlines']; ?></h4>
                                <div class="item-price"><?php echo $singleNews['cardDate']; ?></div>
                            </div>
                            <div class="text">
                                <p><?php echo $singleNews['contents']; ?></p>
                            </div>
                           
                            <div class="other-options">
                                <!--Select Items-->
                                <div class="items-form">
                                    <div class="select-column">   
                                    </div>
                                </div>
                                <!--Btns Box-->
                                <div style="margin-left: 0px" class="btns-box">
                                    <button type="button" class="theme-btn add-to-cart"><a href="<?php echo $singleNews['link']; ?>"> Read More </a></button>
                                </div>
                            </div>

                            <ul class="tags-box">
                            	<li>Categories: <a href="Categories.php?category=<?php echo $singleNews['categoriesName']; ?>"><?php echo $singleNews['categoriesName']; ?></a> </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--Basic Details-->
            
            <!--Related Items-->
            <div class="related-items">
            	<div class="sec-title">
                	<h2>More News</h2>
                </div>
                <div class="four-item-carousel owl-carousel owl-theme">
                	
                    <?php for ($i=0; $i < 10 ; $i++) {  ?>
                    <div class="shop-item">
                        <div class="inner-box">
                            <div class="image-box">
                                <a href="singlenews.php?news=<?php echo $relatedItems['slugs'][$i];?>"><img width="277px" height="333px" src="<?php echo $relatedItems['sources'][$i]; ?>" alt="" /></a>
                            </div>
                            <div class="lower-box">
                                <a href="categories.php?category=<?php echo $relatedItems['categoriesName'][$i];?>">
                                <div class="off-price" style="background-color: #222; top: -20%;border-radius: 0px;width: 70%"><?php echo $relatedItems['categoriesName'][$i];?></div></a>
                                <div class="upper-box">
                                    <h4 style="height: 90px"><a href="singlenews.php?news=<?php echo $relatedItems['slugs'][$i];?>"><?php echo $relatedItems['headlines'][$i];?></a></h4>
                                </div>
                                <div class="lower-content">
                                    <div class="price"><?php echo $relatedItems['cardDate'][$i] ?></div>
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
<?php } ?>
