<?php

$section  = 'typo_links';
$priority = 1;

Kirki::add_field( 'infinity', array(
	'type'        => 'color',
	'settings'     => 'site_color_link',
	'label'       => esc_html__( 'Color', 'infinity' ),
	'description' => esc_html__( 'Normal state', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => SECONDARY_COLOR,
	'transport'   => 'postMessage',
	'output'      => array(
		array(
			'element'  => 'a,a:visited',
			'property' => 'color',
		),
	),
) );

Kirki::add_field( 'infinity', array(
	'type'        => 'color',
	'settings'     => 'site_color_link_hover',
	'description' => esc_html__( 'Hover state', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'postMessage',
	'default'     => PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => 'a:hover',
			'property' => 'color',
		),
	),
) );