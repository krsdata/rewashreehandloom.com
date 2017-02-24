<?php

$panel    = 'nav';
$priority = 1;

Kirki::add_section( 'nav_mobile', array(
	'title'    => esc_html__( 'Mobile Menu', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

Kirki::add_section( 'nav_desktop', array(
	'title'    => esc_html__( 'Desktop Menu', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

require_once TM_RENOVATION_PATH . '/inc/customizer/nav/nav_desktop.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/nav/nav_mobile.php';