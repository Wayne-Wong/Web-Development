<?php
/**
 * Woot Theme Customizer functions
 *
 * @package woot
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since  1.0.0
 */

	function woot_customize_preview_js() {
		wp_enqueue_script( 'woot_customizer', get_stylesheet_directory_uri() . '/inc/customizer/js/customizer.min.js', array( 'customize-preview' ), '1.15', true );
	}


	/* social icons*/
	function woot_social_icons()  { 

		$social_networks = array( 
			array( 'name' => __( 'Facebook','woot' ), 'theme_mode' => 'woot_facebook','icon' => 'fa-facebook' ),
			array( 'name' => __( 'Twitter','woot' ), 'theme_mode' => 'woot_twitter','icon' => 'fa-twitter' ),
			array( 'name' => __( 'Google+','woot' ), 'theme_mode' => 'woot_google','icon' => 'fa-google-plus' ),
			array( 'name' => __( 'Pinterest','woot' ), 'theme_mode' => 'woot_pinterest','icon' => 'fa-pinterest' ),
			array( 'name' => __( 'Linkedin','woot' ), 'theme_mode' => 'woot_linkedin','icon' => 'fa-linkedin' ),
			array( 'name' => __( 'Youtube','woot' ), 'theme_mode' => 'woot_youtube','icon' => 'fa-youtube' ),
			array( 'name' => __( 'Tumblr','woot' ), 'theme_mode' => 'woot_tumblr','icon' => 'fa-tumblr' ),
			array( 'name' => __( 'Instagram','woot' ), 'theme_mode' => 'woot_instagram','icon' => 'fa-instagram' ),
			array( 'name' => __( 'Flickr','woot' ), 'theme_mode' => 'woot_flickr','icon' => 'fa-flickr' ),
			array( 'name' => __( 'Vimeo','woot' ), 'theme_mode' => 'woot_vimeo','icon' => 'fa-vimeo-square' ),
			array( 'name' => __( 'RSS','woot' ), 'theme_mode' => 'woot_rss','icon' => 'fa-rss' )
		);


		for ( $row = 0; $row < 11; $row++ ){
			if ( get_theme_mod( $social_networks[$row]["theme_mode"] ) ): ?>
				<a href="<?php echo esc_url( get_theme_mod($social_networks[$row]['theme_mode']) ); ?>" class="social-tw" title="<?php echo esc_url( get_theme_mod( $social_networks[$row]['theme_mode'] ) ); ?>" target="_blank">
				<span class="fa <?php echo $social_networks[$row]['icon']; ?>"></span> 
				</a>
			<?php endif;
		}
                      
	}

	function woot_check_number( $value ) {
	    $value = ( int ) $value; // Force the value into integer type.
	    return ( 0 < $value ) ? $value : null;
	}