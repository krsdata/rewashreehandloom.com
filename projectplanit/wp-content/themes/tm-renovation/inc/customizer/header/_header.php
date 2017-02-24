<?php

$panel    = 'header';
$priority = 1;

// Add sections for header panel

Kirki::add_section( 'header_layout', array(
	'title'    => esc_html__( 'Layout & Design', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

Kirki::add_section( 'search', array(
	'title'    => esc_html__( 'Search', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );


if ( class_exists( 'WooCommerce' ) ) {
	Kirki::add_section( 'minicart', array(
		'title'    => esc_html__( 'Minicart', 'infinity' ),
		'panel'    => $panel,
		'priority' => $priority ++
	) );
}

Kirki::add_section( 'header_spacing', array(
	'title'       => esc_html__( 'Spacing', 'infinity' ),
	'description' => esc_html__( 'In this section you can control all spacing settings of header', 'infinity' ),
	'panel'       => $panel,
	'priority'    => $priority ++
) );

Kirki::add_section( 'header_border', array(
	'title'       => esc_html__( 'Border', 'infinity' ),
	'description' => esc_html__( 'In this section you can control all border settings of header', 'infinity' ),
	'panel'       => $panel,
	'priority'    => $priority ++
) );

require_once TM_RENOVATION_PATH . '/inc/customizer/header/header_layout.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/header/header_search.php';
if ( class_exists( 'WooCommerce' ) ) {
	require_once TM_RENOVATION_PATH . '/inc/customizer/header/header_minicart.php';
}
require_once TM_RENOVATION_PATH . '/inc/customizer/header/header_spacing.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/header/header_border.php';