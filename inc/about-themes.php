<?php
//about theme info
add_action( 'admin_menu', 'mini_coders_abouttheme' );
function mini_coders_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'mini-coders'), esc_html__('About Theme', 'mini-coders'), 'edit_theme_options', 'mini_coders_guide', 'mini_coders_mostrar_guide');   
} 
//guidline for about theme
function mini_coders_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'mini-coders'); ?>
		   </div>
          <p><?php esc_html_e('Mini Coders is a garden landscape recycle based responsive flexible easy to use lightweight WordPress theme based on Gutenberg block editor. Can be used for conservation, eco friendly, green renewable energy, non profit, NGO, ecology, gardening, earth, environment, wind, hydro, nature, agriculture, farming, flowers, organic, nursery, wildlife preservation, lawn, fertilizer, forest, bio etc.','mini-coders'); ?></p>
          <a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'mini-coders'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'mini-coders'); ?></a> | 
				<a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'mini-coders'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_PLANTS_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>