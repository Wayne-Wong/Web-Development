<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package woot
 */

/**
 * Check whether the Storefront Customizer settings ar enabled
 * @return boolean
 * @since  1.1.2
 */
function is_woot_customizer_enabled() {
	return apply_filters( 'woot_customizer_enabled', true );
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}