<?php
/**
 * Template functions used for the site header.
 *
 * @package woot
 */

if ( ! function_exists( 'woot_social_media_links' ) ) {
	/**
	 * Display Social Media
	 * @since  1.0.0
	 * @return void
	 */
	function woot_social_media_links() {
		?>
		<div class="social-media">
			<?php woot_social_icons(); ?>
		</div>
		<?php
	}
}


if ( ! function_exists( 'woot_secondary_navigation' ) && ! function_exists( 'storefront_header_widget_region' )) {
	/**
	 * Display Secondary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function woot_secondary_navigation() {
		?>
		<nav class="second-nav" role="navigation" aria-label="<?php _e( 'Secondary Navigation', 'storefront' ); ?>">
			<?php
				wp_nav_menu(
					array(
						'theme_location'	=> 'secondary',
						'fallback_cb'		=> '',
					)
				);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'woot_site_branding' ) ) {
	/**
	 * Display Site Branding
	 * @since  1.0.0
	 * @return void
	 */
	function woot_site_branding() {
		if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} else { ?>
			<div class="site-branding">
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php if ( '' != get_bloginfo( 'description' ) ) { ?>
					<p class="site-description"><?php echo bloginfo( 'description' ); ?></p>
				<?php } ?>
			</div>
		<?php }
	}
}

function woot_featured_slider() {
	/**
	 * Display Slider
	 * @since  1.0.0
	 * @return void
	 */ 
?>
	<?php if ( class_exists( 'WooCommerce' ) ) { ?>
	<div class="flexslider">
		
	    <ul class="slides"> 
	        <?php

			$meta_key = get_theme_mod( 'woot_slider_area' );
			if(get_theme_mod( 'woot_slider_num_show' )) {
				$num_prod = get_theme_mod( 'woot_slider_num_show' );
			} else {
				$num_prod = "5";
			}

			if( $meta_key == "top_rated" ) {
				add_filter( 'posts_clauses', array( WC()->query, 'order_by_rating_post_clauses' ) );
				$args = array( 'posts_per_page' => $num_prod, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product' );
				$args['meta_query'] = WC()->query->get_meta_query();
			} elseif( $meta_key == "featured" ) {
				$args = array( 'post_type' => 'product', 'posts_per_page' => $num_prod ,'meta_key' => '_featured', 'meta_value' => 'yes' );
			} elseif( $meta_key == "sale" ) {
				$args = array( 'post_type' => 'product', 'posts_per_page' => $num_prod,
				    'meta_query' => array(
				        'relation' => 'OR',
				        array( 
				        'key'           => '_sale_price',
				        'value'         => 0,
				        'compare'       => '>',
				        'type'          => 'numeric'
				        ),
				        array( // Variable products type
				        'key'           => '_min_variation_sale_price',
				        'value'         => 0,
				        'compare'       => '>',
				        'type'          => 'numeric'
				        )
				    ) 
				);	
			} elseif( $meta_key == "total_sales" ) {
				$args = array(
					'post_type' => 'product',
					'meta_key' => 'total_sales',
					'orderby' => 'meta_value_num',
					'posts_per_page' => $num_prod
				);
			} elseif( $meta_key == "recent" ) {
				$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => $num_prod, 'orderby' =>'date','order' => 'DESC' );
			} else {
				$args = array( 'post_type' => 'product', 'stock' => 1, 'posts_per_page' => $num_prod, 'orderby' =>'date','order' => 'DESC' );
			}
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product, $post;	 ?>

				<li class="product-slider"> 
					<div class="banner-product-image">
						<?php if ( has_post_thumbnail( $loop->post->ID ) ) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="300px" height="300px" />'; ?>
					</div>
					<div class="banner-product-details">   
						<h3><?php the_title(); ?></h3>
						<?php woocommerce_show_product_sale_flash( $post, $product ); ?>
						<p class="price"><?php echo $product->get_price_html(); ?></p>
						<p><?php echo $loop->post->post_excerpt; ?></p>
						<a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="button" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php _e('View Product','woot'); ?></a>
					</div>
					<div class="clearfix"></div>
				</li>
			<?php endwhile; ?>
			<?php 
				if( $meta_key == "top_rated" ) {
					remove_filter( 'posts_clauses', array( WC()->query, 'order_by_rating_post_clauses' ) ); 
				}
			?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>

<?php } } 

function woot_inner_title() {
?>
	<div class="inner-title">
			<h1>
				<?php
					if( is_post_type_archive('product') ) {
						woocommerce_page_title();
					} elseif( is_category() ) {
						single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif( is_author() ) {
						global $post;
						$author_id = $post->post_author;
						the_author_meta('display_name', $author_id);
					} elseif ( is_day() || is_month() || is_year() ) {
						the_time('F Y');
					} elseif( is_archive() ) {
						single_cat_title();
					} elseif( is_home() ) { 
						$blog_page_id = get_option('page_for_posts');
						echo get_post($blog_page_id)->post_title;
					} else {
						the_title();				
					}
				?>
			</h1>
	</div>
<?php
}

if ( ! function_exists( 'woot_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 * @since  1.0.0
	 * @return void
	 */
	function woot_primary_navigation() {
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
		<button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false"><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Navigation', 'storefront' ) ) ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'	=> 'primary',
					'container_class'	=> 'primary-navigation',
					)
			);

			wp_nav_menu(
				array(
					'theme_location'	=> 'handheld',
					'container_class'	=> 'handheld-navigation',
					)
			);
			?>
		</nav><!-- #site-navigation -->
		<?php
	}
}