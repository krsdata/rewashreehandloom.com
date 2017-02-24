<?php

$panel    = 'footer';
$priority = 1;

// Add sections for footer panel
Kirki::add_section( 'footer_layout', array(
	'title'    => esc_html__( 'Layout & Design', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

Kirki::add_section( 'footer_color', array(
	'title'    => esc_html__( 'Color', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

require_once TM_RENOVATION_PATH . '/inc/customizer/footer/footer_layout.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/footer/footer_color.php';