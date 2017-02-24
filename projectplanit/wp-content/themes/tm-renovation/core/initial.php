<?php
/**
 * Load core.
 * =========
 */
require_once get_template_directory() . '/core/kirki/kirki.php';

//add custom css to admin
function infinity_admin_head() {
	wp_enqueue_style( 'infinity-custom-admin-css', THEME_ROOT . '/core/css/core.css' );
}

add_action( 'admin_head', 'infinity_admin_head' );

function infinity_admin_customizer_css() {
	wp_enqueue_style( 'infinity-customizer-admin-css', THEME_ROOT . '/core/css/customizer.css' );
}
add_action( 'customize_controls_init', 'infinity_admin_customizer_css' );


/**
 * Add JS to backend
 */
function infinity_admin_custom_js()
{
	wp_enqueue_script( 'infinity-custom-admin-js', THEME_ROOT . '/core/js/core.js' );
}

add_action('admin_footer', 'infinity_admin_custom_js');