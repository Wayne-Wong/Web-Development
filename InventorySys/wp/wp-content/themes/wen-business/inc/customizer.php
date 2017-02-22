<?php
/**
 * WEN Business Theme Customizer
 *
 * @package WEN Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wen_business_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wen_business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wen_business_customize_preview_js() {
  wp_enqueue_script( 'wen_business_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wen_business_customize_preview_js' );

function wen_business_custom_customize_enqueue_scripts() {

    wp_register_script( 'wen_business_customizer_button', get_template_directory_uri() . '/assets/js/customizer-button.js', array( 'customize-controls' ), '20130508', true );
    $data = array(
      'updrade_button_text' => __( 'Buy WEN Business Pro', 'wen-business' ),
      'updrade_button_link' => esc_url( 'http://catchthemes.com/themes/wen-business-pro' ),
    );
    wp_localize_script( 'wen_business_customizer_button', 'WEN_Business_Customizer_Object', $data );
    wp_enqueue_script( 'wen_business_customizer_button' );

}

add_action( 'customize_controls_enqueue_scripts', 'wen_business_custom_customize_enqueue_scripts' );

if( ! function_exists( 'wen_business_customizer_script' ) ) :

  /**
   * Custom customizer script
   *
   * @since  WEN Business 1.0
   */
  function wen_business_customizer_script( $hook ){

    $screen = get_current_screen();

    if ( 'customize' != $screen->id ) {
      return;
    }

    wp_enqueue_script(
          'custom-customizer-script',      //Give the script an ID
          get_template_directory_uri() . '/assets/js/custom-customizer.js',//Point to file
          array( 'jquery' ),  //Define dependencies
          '',           //Define a version (optional)
          true            //Put script in footer?
      );

  }
endif;

add_action( 'admin_enqueue_scripts', 'wen_business_customizer_script' );
