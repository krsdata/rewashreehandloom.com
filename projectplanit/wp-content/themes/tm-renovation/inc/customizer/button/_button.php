<?php

$panel = 'button';

$priority = 1;
// Add sections for button panel
Kirki::add_section( 'button_layout', array(
	'title'       => esc_html__( 'Layout', 'infinity' ),
	'description' => esc_html__( 'In this section you can control all layout settings of buttons', 'infinity' ),
	'panel'       => $panel,
	'priority'    => $priority ++
) );

Kirki::add_section( 'button_color', array(
	'title'    => esc_html__( 'Color', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++,
) );

require_once TM_RENOVATION_PATH . '/inc/customizer/button/button_layout.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/button/button_color.php';