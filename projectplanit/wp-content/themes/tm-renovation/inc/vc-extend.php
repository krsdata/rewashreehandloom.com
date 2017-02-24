<?php
/**
 * Initial setup
 * =============
 */
$new_vc_dir = get_template_directory() . '/inc/vc-template';
if ( function_exists( "vc_set_shortcodes_templates_dir" ) ) {
	vc_set_shortcodes_templates_dir( $new_vc_dir );
}

if ( class_exists( 'WPBakeryShortCode' ) ) {

	// params
	require_once get_template_directory() . '/inc/vc-params/thememove-responsive/thememove_responsive.php';

	// fontlibs
	require_once get_template_directory() . '/inc/fontlibs/pe7stroke.php';
	require_once get_template_directory() . '/inc/fontlibs/renovation.php';

	// shortcodes
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-blog.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-button.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-recentposts.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-gmaps.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-gmaps2.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-icon.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-testimonials.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-project-details.php';
	require_once get_template_directory() . '/inc/vc-shortcode/thememove-project-share.php';
}

/**
 * Visual Composer Rewrite Classes
 * ===============================
 */
function custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
	if ( $tag == 'vc_row' || $tag == 'vc_row_inner' ) {
		$class_string = str_replace( 'vc_row-fluid', 'row', $class_string );
	}
	if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
		$class_string = preg_replace( '/vc_col-xs-(\d{1,2})/', 'col-xs-$1', $class_string );
		$class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'col-sm-$1', $class_string );
		$class_string = preg_replace( '/vc_col-md-(\d{1,2})/', 'col-md-$1', $class_string );
		$class_string = preg_replace( '/vc_col-lg-(\d{1,2})/', 'col-lg-$1', $class_string );
	}

	return $class_string;
}

add_filter( 'vc_shortcodes_css_class', 'custom_css_classes_for_vc_row_and_vc_column', 10, 2 );

// disable auto update of VC
add_action( 'vc_before_init', 'disable_updater' );
function disable_updater() {
	vc_set_as_theme();
}

/**
 * Get Taxonomy for Auto-Complete Params
 *
 * @param $taxonomy
 *
 * @return array
 */
function thememove_get_taxonomy_for_autocomplete() {
	$record_set = array();

	$categories = get_categories();
	foreach ( $categories as $category ) {
		$cat_arr          = array();
		$cat_arr['label'] = $category->cat_name;
		$cat_arr['value'] = $category->cat_ID;
		$cat_arr['group'] = 'CATEGORY';

		$record_set[] = $cat_arr;
	}

	$tags = get_tags();
	foreach ( $tags as $tag ) {
		$tag_arr          = array();
		$tag_arr['label'] = $tag->name;
		$tag_arr['value'] = $tag->term_id;
		$tag_arr['group'] = 'TAG';

		$record_set[] = $tag_arr;
	}

	return $record_set;
}