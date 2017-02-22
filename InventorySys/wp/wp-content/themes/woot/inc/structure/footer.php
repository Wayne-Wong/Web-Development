<?php
/**
 * Template functions used for the site footer.
 *
 * @package woot
 */

if ( ! function_exists( 'woot_credit' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0
	 * @return void
	 */
	function woot_credit() {
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . date( 'Y' ) ) ); ?>
			<?php if ( apply_filters( 'storefront_credit_link', true ) && is_home() || is_front_page()) { ?>
			<?php printf( __( '| %1$s design by %2$s.', 'woot' ), 'Theme', '<a href="http://deucethemes.com/" title="Responsive WordPress Themes by Deuce Themes">Deuce Themes</a>' ); ?>
			<?php } ?>
		</div><!-- .site-info -->
		<?php
	}
}