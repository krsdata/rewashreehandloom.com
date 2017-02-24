<?php
/* Loads renovation Icon font. */

// Enqueue CSS
wp_enqueue_style('thememove-font-renovation-icon', THEME_ROOT . '/css/renovation.css');

add_filter( 'vc_iconpicker-type-renovation', 'vc_iconpicker_type_renovation' );

/**
 * renovation icons from thememove.com/
 *
 * @param $icons - taken from filter - vc_map param field settings['source'] provided icons (default empty array).
 * If array categorized it will auto-enable category dropdown
 *
 * @since 4.4
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
function vc_iconpicker_type_renovation( $icons ) {
	$renovation_icons = array(
		array( "rn-door"        => esc_html__( "door", "infinity" ) ),
		array( "rn-electrical"  => esc_html__( "electrical", "infinity" ) ),
		array( "rn-home"        => esc_html__( "home", "infinity" ) ),
		array( "rn-painting"    => esc_html__( "painting", "infinity" ) ),
		array( "rn-plumbing"    => esc_html__( "plumbing", "infinity" ) ),
		array( "rn-tools"       => esc_html__( "tools", "infinity" ) ),
		array( "rn-heating"     => esc_html__( "heating", "infinity" ) ),
		array( "rn-renovation"  => esc_html__( "renovation", "infinity" ) ),
		array( "rn-drywall"     => esc_html__( "drywall", "infinity" ) ),
		array( "rn-drill"       => esc_html__( "drill", "infinity" ) ),
		array( "rn-gear"        => esc_html__( "gear", "infinity" ) ),
		array( "rn-wall"        => esc_html__( "wall", "infinity" ) ),
		array( "rn-windows"     => esc_html__( "windows", "infinity" ) ),
	);

	return array_merge( $icons, $renovation_icons );
}