<?php

$panel    = 'typo';
$priority = 1;

Kirki::add_section( 'typo_links', array(
	'title'    => esc_html__( 'Links', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

Kirki::add_section( 'typo_body', array(
	'title'    => esc_html__( 'Body', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

Kirki::add_section( 'typo_heading', array(
	'title'    => esc_html__( 'Heading', 'infinity' ),
	'panel'    => $panel,
	'priority' => $priority ++
) );

require_once TM_RENOVATION_PATH . '/inc/customizer/typo/typo_body.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/typo/typo_heading.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/typo/typo_links.php';