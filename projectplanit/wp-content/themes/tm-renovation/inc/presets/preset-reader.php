<?php

/**
 * Get preset form file
 *
 * @param string $type
 * @param string $preset_id
 *
 * @return array|mixed|object
 */
function infinity_get_preset( $type = '', $preset_id = 'preset1' ) {
	global $wp_filesystem;

	require_once( ABSPATH . '/wp-admin/includes/file.php' );
	WP_Filesystem();

	$path = TM_RENOVATION_PATH . '/inc/presets/' . $type . '/' . $preset_id . '.json';

	$preset = array();

	if ( file_exists( $path ) ) {

		$json   = $wp_filesystem->get_contents( $path );
		$preset = json_decode( $json, true );
	}

	return $preset;
}

/**
 * Get preset label
 *
 * @param string $type
 * @param string $preset_id
 *
 * @return mixed|string
 */
function infinity_get_preset_label( $type = '', $preset_id = 'preset1' ) {
	$preset = infinity_get_preset( $type, $preset_id );

	if ( ! empty( $preset ) && isset( $preset['label'] ) ) {
		return $preset['label'];
	}

	return '';
}

/**
 * Get preset settings
 *
 * @param string $type
 * @param string $preset_id
 *
 * @return array|mixed
 */
function infinity_get_preset_settings( $type = '', $preset_id = 'preset1' ) {
	$preset = infinity_get_preset( $type, $preset_id );

	if ( ! empty( $preset ) && isset( $preset['settings'] ) ) {
		return $preset['settings'];
	}

	return array();
}