<?php
/**
 * woot setup functions
 *
 * @package woot
 */


function woot_theme_setup() {

	add_image_size( 'woot-thumb-400', 400, 400, true );
	load_child_theme_textdomain( 'woot', get_stylesheet_directory() . '/languages' );
}

function woot_google_fonts() {
	wp_enqueue_style( 'woot-googleFonts', '//fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,700,900' );
}


//Dequeue JavaScripts
function woot_dequeue_unnecessary_scripts() {
    wp_dequeue_script( 'storefront-navigation' );

}
add_action( 'wp_print_scripts', 'woot_dequeue_unnecessary_scripts' );

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function woot_scripts() {

	wp_enqueue_style( 'woot-flexslider-css', get_stylesheet_directory_uri() . '/css/flexslider.min.css', array(), '' );

	wp_enqueue_style( 'storefront-style', get_template_directory_uri() . '/style.css' ); //parent style

	wp_enqueue_style( 'woot-style', get_stylesheet_uri(), array('storefront-style') ); // child style

	//wp_deregister_script( 'storefront-navigation' );
	wp_enqueue_script( 'woot-nav', get_stylesheet_directory_uri() . '/js/navigation.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'woot-main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '', true );

	if ( class_exists( 'WooCommerce' ) ) { 
		wp_enqueue_script( 'woot-flexslider-js', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', array(), '', true );
	
		wp_enqueue_script( 'woot-slider-js', get_stylesheet_directory_uri() . '/js/slider.js', array(), '', true );
	}
}