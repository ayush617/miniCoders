<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mini Coders
 */
$footer_text = get_theme_mod('footer_text');
$footerlogo = get_theme_mod('footer_logo_image'); 
$footerlogo_link = get_theme_mod('footer_logo_url'); 
$fb_link = get_theme_mod('fb_link'); 
$twitt_link = get_theme_mod('twitt_link');
$linked_link = get_theme_mod('linked_link');
$youtube_link = get_theme_mod('youtube_link');
$insta_link = get_theme_mod('insta_link');
$pinterest_link = get_theme_mod('pinterest_link');
$footer_email = get_theme_mod('footer_email');
$footer_phno = get_theme_mod('footer_phno');
$footer_visitus = get_theme_mod('footer_visitus');
$hidefooterbox = get_theme_mod('hide_footer_bar', 1);
?>

<!-- main-footer -->
<footer class="main-footer">
    <div class="footer-top">
        <div class="auto-container">
            <div class="top-inner clearfix">
                <div class="footer-logo pull-left">
                    <div class="bg-color"></div>
                    <figure class="logo">
                        <a href="index.html"><img src="https://omstech.in/wp/wp-content/themes/miniCoders/images/footer-logo.png" alt=""></a>
                    </figure>
                </div>
                <div class="footer-info pull-right">
                    <ul class="info-list clearfix"> 
                        <li>
                            <i class="flaticon-email"></i>
                            <span>Email Address</span>
                            <h6><a href="mailto:<?php echo $footer_email; ?>"><?php echo $footer_email; ?></a></h6>
                        </li>
                        <li>
                            <i class="flaticon-telephone"></i>
                            <span>Phone Line</span>
                            <h6><a href="tel:<?php echo $footer_phno; ?>"><?php echo $footer_phno; ?></a></h6>
                        </li>
                        <li>
                            <i class="flaticon-pin"></i>
                            <span>Visit Us</span>
                            <h6><?php echo $footer_visitus; ?></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="copyright pull-left">
                    <p>
                    <?php if (!empty($footer_text)) { ?>
                        <?php echo esc_html($footer_text); ?>
                    <?php } else { ?>
                        <?php esc_html_e('© Copyright 2022'); ?>
                    <?php } ?>
                    <!-- &copy; Copyright 2022 by <a href="index.html">AMS</a> -->
                    </p>
                </div>
                <ul class="footer-social pull-right clearfix">
                <?php 
                if (!empty($twitt_link)) { ?>
                    <li><a href="<?php echo esc_url($twitt_link); ?>"><i class="fab fa-twitter"></i></a></li>
                <?php } 		
                if (!empty($fb_link)) { ?>
                    <li><a href="<?php echo esc_url($fb_link); ?>"><i class="fab fa-facebook-square"></i></a></li>
                <?php } 		
                if (!empty($pinterest_link)) { ?>  
                    <li><a href="<?php echo esc_url($pinterest_link); ?>"><i class="fab fa-pinterest-p"></i></a></li>
                <?php } 		
                if (!empty($insta_link)) { ?>  
                    <li><a href="<?php echo esc_url($insta_link); ?>"><i class="fab fa-instagram"></i></a></li>
                <?php } ?>  
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->

    <?php get_footer();?>

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-arrow-up"></span>
    </button>
</div>
    <!-- jequery plugins -->
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/jquery.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/popper.min.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/bootstrap.min.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/owl.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/wow.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/validation.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/jquery.fancybox.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/appear.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/jquery.countTo.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/scrollbar.js"></script>
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/jquery.nice-select.min.js"></script>

    <!-- main-js -->
    <script src="https://omstech.in/wp/wp-content/themes/miniCoders/js/script.js"></script>
</body>
</html>