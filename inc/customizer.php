<?php
/**
 * Mini Coders Theme Customizer
 *
 * @package Mini Coders
 */
 
function mini_coders_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'mini_coders_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'mini_coders_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'mini_coders_custom_header_setup' );
if ( ! function_exists( 'mini_coders_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see mini_coders_custom_header_setup().
 */
function mini_coders_header_style() {
	?>    
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // mini_coders_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function mini_coders_customize_register( $wp_customize ) {
	//Add a class for titles
    class mini_coders_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Announcement Bar
	$wp_customize->add_section('announcement_bar',array(
		'title'	=> esc_html__('Announcement Bar','mini-coders'),					
		'priority'		=> null
	));

	$wp_customize->add_setting('announcement_bar_show',array(
		'sanitize_callback' => 'mini_coders_sanitize_checkbox',
		'default' => true,
	));	 
	$wp_customize->add_control( 'announcement_bar_show', array(
		'section'   => 'announcement_bar',    	 
		'label'	=> esc_html__('Show Announcement.','mini-coders'),
		'type'      => 'checkbox'
	));

	$wp_customize->add_setting('announcement_bar_name',array(
		'default'	=> null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('announcement_bar_name',array(
			'label'	=> esc_html__('Name','mini-coders'),
			'section'	=> 'announcement_bar',
			'setting'	=> 'announcement_bar_name'
	));

	$wp_customize->add_setting('announcement_bar_email',array(
		'default'	=> null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('announcement_bar_email',array(
			'label'	=> esc_html__('Email','mini-coders'),
			'section'	=> 'announcement_bar',
			'setting'	=> 'announcement_bar_email'
	));

	$wp_customize->add_setting('announcement_bar_social',array(
		'sanitize_callback' => 'mini_coders_sanitize_checkbox',
		'default' => true,
	));	 
	$wp_customize->add_control( 'announcement_bar_social', array(
		'section'   => 'announcement_bar',    	 
		'label'	=> esc_html__('Show Social Media.','mini-coders'),
		'type'      => 'checkbox'
	));

	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#2f8d5f',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','mini-coders'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
		$wp_customize->add_setting('header_bg_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_bg_color',array(
			'label' => esc_html__('Heder Background Color','mini-coders'),				
			'section' => 'colors',
			'settings' => 'header_bg_color'
		))
	);
	
		$wp_customize->add_setting('footer_bg_color',array(
			'default'	=> '#0d4128',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_bg_color',array(
			'label' => esc_html__('Footer Background Color','mini-coders'),				
			'section' => 'colors',
			'settings' => 'footer_bg_color'
		))
	);	

		$wp_customize->add_setting('footer_text_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_text_color',array(
			'label' => esc_html__('Footer Text Color','mini-coders'),				
			'section' => 'colors',
			'settings' => 'footer_text_color'
		))
	);	

	// Inner Page Banner Settings
	$wp_customize->add_section('inner_page_banner',array(
			'title'	=> esc_html__('Inner Page Banner Settings','mini-coders'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_page_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_page_banner_thumb', array(
        'section' => 'inner_page_banner',
		'label'	=> esc_html__('Upload Default Banner Image','mini-coders'),
        'settings' => 'inner_page_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_page_banner_option',array(
			'sanitize_callback' => 'mini_coders_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_page_banner_option', array(
    	   'section'   => 'inner_page_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Page Banner On All Inner Pages. For Display Different Banner Image On Each Page Set Page Featured Image. Set Image Size (1400 X 310) For Better Resolution.','mini-coders'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings
	 
	 
	// Inner Post Banner Settings
	$wp_customize->add_section('inner_post_banner',array(
			'title'	=> esc_html__('Single Post Banner Settings','mini-coders'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_post_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_post_banner_thumb', array(
        'section' => 'inner_post_banner',
		'label'	=> esc_html__('Upload Default Banner Image','mini-coders'),
        'settings' => 'inner_post_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_post_banner_option',array(
			'sanitize_callback' => 'mini_coders_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_post_banner_option', array(
    	   'section'   => 'inner_post_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Post Banner On Single Posts. For Display Different Banner Image On Each Post Set Post Featured Image. Set Image Size (1400 X 310) For Better Resolution.','mini-coders'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings	 
	 
	 
	// Footer Info Box 
	$wp_customize->add_section('footer_bar',array(
			'title'	=> esc_html__('Footer','mini-coders'),					
			'priority'		=> null
	));

		// $wp_customize->add_section('footer_text_copyright',array(
	// 		'title'	=> esc_html__('Footer Copyright Text','mini-coders'),				
	// 		'priority'		=> null
	// ));
	
	$wp_customize->add_setting('footer_text',array(
		'default'	=> null,
		'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('footer_text',array(
			'label'	=> esc_html__('Add Copyright Text Here','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'footer_text'
	));
	
	
    // $wp_customize->add_setting( 'footer_logo_image', array(
    //     'default' => '', 
    //     'sanitize_callback' => 'esc_url_raw'
    // ));
 
    // $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_image_control', array(
    //     'label'	=> esc_html__('Footer Logo','mini-coders'),
    //     'section' => 'footer_bar',
    //     'settings' => 'footer_logo_image',
    //     'button_labels' => array(// All These labels are optional
    //                 'select' => 'Select Logo',
    //                 'remove' => 'Remove Logo',
    //                 'change' => 'Change Logo',
    //                 )
    // )));
	
	$wp_customize->add_setting('footer_logo_url',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('footer_logo_url',array(
			'label'	=> esc_html__('Footer Logo Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'footer_logo_url'
	));		

	$wp_customize->add_setting('footer_email',array(
		'default'	=> null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('footer_email',array(
			'label'	=> esc_html__('Add Email','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'footer_email'
	));

	$wp_customize->add_setting('footer_phno',array(
		'default'	=> null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('footer_phno',array(
			'label'	=> esc_html__('Add Phno','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'footer_phno'
	));

	$wp_customize->add_setting('footer_visitus',array(
		'default'	=> null,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('footer_visitus',array(
			'label'	=> esc_html__('Add Visit Us','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'footer_visitus'
	));

	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> esc_html__('Add Facebook Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> esc_html__('Add Twitter Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> esc_html__('Add Linkedin Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_setting('youtube_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('youtube_link',array(
			'label'	=> esc_html__('Add Youtube Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'youtube_link'
	));	
	
	$wp_customize->add_setting('insta_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('insta_link',array(
			'label'	=> esc_html__('Add Instagram Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'insta_link'
	));	
	
	$wp_customize->add_setting('pinterest_link',array(
		'default'	=> null,
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('pinterest_link',array(
			'label'	=> esc_html__('Add Pinterest Link','mini-coders'),
			'section'	=> 'footer_bar',
			'setting'	=> 'pinterest_link'
	));

	// Hide Footer Info Box
	$wp_customize->add_setting('hide_footer_bar',array(
			'sanitize_callback' => 'mini_coders_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_footer_bar', array(
    	   'section'   => 'footer_bar',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','mini-coders'),
    	   'type'      => 'checkbox'
     )); 	
	 // Hide Footer Info Box	 	 
}
add_action( 'customize_register', 'mini_coders_customize_register' );
//Integer
function mini_coders_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function mini_coders_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function mini_coders_custom_css() {
    wp_enqueue_style(
        'mini-coders-custom-style',
        get_template_directory_uri() . '/css/mini-coders-custom-style.css' 
    );
        $color = esc_html(get_theme_mod( 'color_scheme' ));
		$headerbgcolor = esc_html(get_theme_mod( 'header_bg_color' )); 
		$footerbgcolor = esc_html(get_theme_mod( 'footer_bg_color' ));
		$footertextcolor = esc_html(get_theme_mod( 'footer_text_color' )); 

        $custom_css = "
					#sidebar ul li a:hover,
					.footerarea a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.postmeta a:hover,
					.tagcloud a,
					.blocksbox:hover h3,
					.rdmore a,
					.main-navigation ul li:hover a, .main-navigation ul li a:focus, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_item a,
					.cols-3 ul li a:hover,
					.cols-3 ul li.current_page_item a
					{ 
						 color: {$color} !important;
					}

					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					input.search-submit,
					.recent-post .morebtn:hover, 
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.head-info-area,
					.designs-thumb,
					.hometwo-block-button,
					.aboutmore,
					.service-thumb-box,
					.view-all-btn a:hover,
					.main-navigation ul ul li a:hover,
					.main-navigation ul ul li a:focus,
					.get-button a
					{ 
					   background-color: {$color} !important;
					}

					.titleborder span:after{border-bottom-color: {$color} !important;}
					.sticky{border-right-color: {$color} !important;}
					.header{background-color: {$headerbgcolor};}
					#footer, .ft-infobox, .ft-infobox .footerarea, .footerarea{background-color: {$footerbgcolor};}
					.copyright-txt{color: {$footertextcolor} !important;}
				";
        wp_add_inline_style( 'mini-coders-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'mini_coders_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mini_coders_customize_preview_js() {
	wp_enqueue_script( 'mini_coders_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'mini_coders_customize_preview_js' );