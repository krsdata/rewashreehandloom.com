<?php

$panel    = 'breadcrumb';
$priority = 1;

Kirki::add_section( 'breadcrumb', array(
	'title'    => esc_html__( 'Breadcrumb Options', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

// Include setup
require_once get_template_directory() . '/inc/customizer/breadcrumb/breadcrumb_options.php';
