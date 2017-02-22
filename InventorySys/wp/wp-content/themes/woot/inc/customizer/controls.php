<?php
/**
 * Woot Customizer controls
 *
 * @package woot
 */

/**
 * Customize some of the default Storefront controls.
 * @return void
 */
function woot_customize_storefront_controls( $wp_customize ) {
	
		/**
		 * Header Top Background
		 */
		$wp_customize->add_setting( 'woot_header_top_background_color', array(
			'default'           => apply_filters( 'woot_default_header_top_background_color', '#221E1D' ),
			'sanitize_callback' => 'storefront_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woot_header_top_background_color', array(
			'label'	   => __( 'Top Background color', 'woot' ),
			'section'  => 'header_image',
			'settings' => 'woot_header_top_background_color',
			'priority' => 10,
		) ) );

		/**
		 * Header Top text color
		 */
		$wp_customize->add_setting( 'woot_header_top_text_color', array(
			'default'           => apply_filters( 'woot_default_header_top_text_color', '#ffffff' ),
			'sanitize_callback' => 'storefront_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woot_header_top_text_color', array(
			'label'	   => __( 'Top Text color', 'woot' ),
			'section'  => 'header_image',
			'settings' => 'woot_header_top_text_color',
			'priority' => 12,
		) ) );

		$wp_customize->add_section( 'woot_slider_section' , array(
	      'title'       => __( 'Slider Options', 'woot' ),
	      'priority'    => 33,
	      'description' => __( '', 'woot' ),
	    ) );
	    
	    $wp_customize->add_setting( 'woot_slider_area', array(
	      'default' => 'recent',
	      'sanitize_callback' => 'sanitize_text_field',
	    ));
	    
	    $wp_customize->add_control( 'effect_select_box', array(
	      'settings' => 'woot_slider_area',
	      'label' => __( 'What products to show:', 'woot' ),
	      'section' => 'woot_slider_section',
	      'type' => 'select',
	      'choices' => array(
	        'featured' => 'Featured Products',
	        'total_sales' => 'Best Selling Products',
	        'recent' => 'Recent Products',
	        'top_rated' => 'Top Rated Products',
	        'sale' => 'On Sale Products',
	      ),
	      'priority' => 12,
	    ));

	    $wp_customize->add_setting( 'woot_slider_num_show', array (
	    	'default' => 5,
      		'sanitize_callback' => 'woot_check_number',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_slider_num_show', array(
	      'label'    => __( 'Products show at most', 'woot' ),
	      'section'  => 'woot_slider_section',
	      'settings' => 'woot_slider_num_show',
	      'priority'    => 10,
	    ) ) );


		/**
		 * Footer Background
		 */
		$wp_customize->add_setting( 'woot_footer_credits_background_color', array(
			'default'           => apply_filters( 'woot_default_footer_credits_background_color', '#221E1D' ),
			'sanitize_callback' => 'storefront_sanitize_hex_color',
			'transport'			=> 'postMessage',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'woot_footer_credits_background_color', array(
			'label'	   => __( 'Top Background color', 'woot' ),
			'section'  => 'storefront_footer',
			'settings' => 'woot_footer_credits_background_color',
			'priority' => 50,
		) ) );

		/**
		 * Social Media Icons
		 */
	    $wp_customize->add_section( 'woot_social_section' , array(
	      'title'       => __( 'Social Media Icons', 'woot' ),
	      'priority'    => 42,
	      'description' => __( 'Optional media icons in the header', 'woot' ),
	    ) );
	    
	    $wp_customize->add_setting( 'woot_facebook', array (
      		'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_facebook', array(
	      'label'    => __( 'Enter your Facebook url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_facebook',
	      'priority'    => 101,
	    ) ) );
	  
	    $wp_customize->add_setting( 'woot_twitter', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_twitter', array(
	      'label'    => __( 'Enter your Twitter url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_twitter',
	      'priority'    => 102,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_google', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_google', array(
	      'label'    => __( 'Enter your Google+ url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_google',
	      'priority'    => 103,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_pinterest', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_pinterest', array(
	      'label'    => __( 'Enter your Pinterest url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_pinterest',
	      'priority'    => 104,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_linkedin', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_linkedin', array(
	      'label'    => __( 'Enter your Linkedin url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_linkedin',
	      'priority'    => 105,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_youtube', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_youtube', array(
	      'label'    => __( 'Enter your Youtube url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_youtube',
	      'priority'    => 106,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_tumblr', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_tumblr', array(
	      'label'    => __( 'Enter your Tumblr url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_tumblr',
	      'priority'    => 107,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_instagram', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_instagram', array(
	      'label'    => __( 'Enter your Instagram url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_instagram',
	      'priority'    => 108,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_flickr', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_flickr', array(
	      'label'    => __( 'Enter your Flickr url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_flickr',
	      'priority'    => 109,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_vimeo', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_vimeo', array(
	      'label'    => __( 'Enter your Vimeo url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_vimeo',
	      'priority'    => 110,
	    ) ) );
	    
	    $wp_customize->add_setting( 'woot_rss', array (
	      'sanitize_callback' => 'esc_url_raw',
	    ) );
	    
	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'woot_rss', array(
	      'label'    => __( 'Enter your RSS url', 'woot' ),
	      'section'  => 'woot_social_section',
	      'settings' => 'woot_rss',
	      'priority'    => 112,
	    ) ) );
	    
}
