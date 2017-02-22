<?php
/**
 * Woot customizer hooks
 *
 * @package woot
 */

add_action( 'wp_enqueue_scripts', 									'woot_add_customizer_css');

add_action( 'customize_preview_init', 								'woot_customize_preview_js' );

add_action( 'customize_register', 									'woot_customize_storefront_controls');

/**
 * Customizer default color tweaks
 */
add_filter( 'storefront_default_accent_color', 						'woot_accent_color' );
add_filter( 'storefront_default_header_background_color', 			'woot_white_color' );
add_filter( 'storefront_default_header_text_color', 				'woot_accent_color' );
add_filter( 'storefront_default_header_link_color', 				'woot_semi_dark_color' );
add_filter( 'storefront_default_button_background_color', 			'woot_accent_color' );
add_filter( 'storefront_default_footer_background_color', 			'woot_white_color' );
add_filter( 'storefront_default_footer_link_color', 				'woot_accent_color' );
add_filter( 'storefront_default_button_alt_background_color', 		'woot_alt_color' );