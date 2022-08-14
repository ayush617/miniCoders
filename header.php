<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 */
$announcement_bar_show = get_theme_mod('announcement_bar_show', 1);
$announcement_bar_social = get_theme_mod('announcement_bar_social', 1);
$announcement_bar_name = get_theme_mod('announcement_bar_name');
$announcement_bar_email = get_theme_mod('announcement_bar_email');
$fb_link = get_theme_mod('fb_link'); 
$twitt_link = get_theme_mod('twitt_link');
$linked_link = get_theme_mod('linked_link');
$youtube_link = get_theme_mod('youtube_link');
$insta_link = get_theme_mod('insta_link');
$pinterest_link = get_theme_mod('pinterest_link')
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
<!-- Fav Icon -->
<!-- <link rel="icon" href="https://omstech.in/wp/wp-content/themes/miniCoders/images/favicon.ico" type="image/x-icon"> -->

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/font-awesome-all.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/flaticon.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/owl.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/bootstrap.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/animate.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/color.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/style.css" rel="stylesheet">
<link href="https://omstech.in/wp/wp-content/themes/miniCoders/css/responsive.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content_navigator">
<?php esc_html_e( 'Skip to content', 'mini-coders' ); ?>
</a>
<?php
	$showpagebanner = get_theme_mod('inner_page_banner_option', 1);
	$showpostbanner = get_theme_mod('inner_post_banner_option', 1);
	$pagethumb = get_theme_mod('inner_page_banner_thumb');
	$postthumb = get_theme_mod('inner_post_banner_thumb');
?>
<div class="boxed_wrapper">
    <!-- main header -->
    <header class="main-header">
            <?php 
                if (1 == $announcement_bar_show) { ?>
            <div class="header-top">
                <!-- header-top -->
                <div class="auto-container">
                    <div class="top-inner clearfix">
                        <div class="text pull-left"><p><?php echo $announcement_bar_name; ?></p></div>
                        <div class="top-right pull-right clearfix">
                          <?php 
                            if (1 == $announcement_bar_social) { ?>
                            <ul class="social-links">
                                <li><a href="<?php echo esc_url($twitt_link); ?>"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?php echo esc_url($fb_link); ?>"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="<?php echo esc_url($pinterest_link); ?>"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="<?php echo esc_url($insta_link); ?>"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                          <?php }  ?>
                            <div class="link">
                                <div class="bg-color"></div>
                                <a href="mailto:<?php echo $announcement_bar_email; ?>"><?php echo $announcement_bar_email; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="info-box pull-left clearfix">
                            <div class="logo-box">
                                <div class="bg-color"></div>
                                <figure class="logo"><a href="index.html"><img src="https://omstech.in/wp/wp-content/themes/miniCoders/images/logo.png" alt=""></a></figure>
                                <!-- <?php mini_coders_the_custom_logo(); ?> -->
                            </div>
                            <div class="phone-box">
                                <div class="icon-box"><i class="flaticon-chat"></i></div>
                                <p>Have any question?</p>
                                <h5><a href="tel:0424483300">042 448 3300</a></h5>
                            </div>
                        </div>
                        <div class="menu-area pull-right">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary', 'menu_class' => 'navigation clearfix' ) ); ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box clearfix">
                        <div class="info-box pull-left clearfix">
                            <div class="logo-box">
                                <div class="bg-color"></div>
                                <figure class="logo"><a href="index.html"><img src="https://omstech.in/wp/wp-content/themes/miniCoders/images/logo.png" alt=""></a></figure>
                            </div>
                        </div>
                        <div class="menu-area pull-right">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="https://omstech.in/wp/wp-content/themes/miniCoders/images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>Georges Hall NSW, Australia</li>
                        <li><a href="tel:0424483300">042 448 3300</a></li>
                        <li><a href="mailto:info@example.com">info@amsfacilitiesgroup.com.au</a></li>
                    </ul>
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->
        <!-- main-header end -->