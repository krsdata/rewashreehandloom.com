<?php
/**
 * Site Favicon
 * =========
 */
$section  = 'favicon';
$priority = 1;

Kirki::add_field( 'infinity', array(
	'type'        => 'image',
	'settings'     => 'site_favicon',
	'description' => esc_html__( 'File must be .png or .ico format. Optimal dimensions: 32px x 32px', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => SITE_FAVICON,
) );

Kirki::add_field( 'infinity', array(
	'type'        => 'image',
	'settings'     => 'site_apple_touch_icon',
	'label'       => esc_html__( 'Apple Touch Icon', 'infinity' ),
	'description' => esc_html__( 'File must be .png format. Optimal dimensions: 152px x 152px', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => SITE_APPLE_TOUCH_ICON,
) );