<?php
$panel    = 'color';
$priority = 1;

Kirki::add_section( 'color_settings', array(
	'title'    => esc_html__( 'Color Settings', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

require_once get_template_directory() . '/inc/customizer/color/color_settings.php';