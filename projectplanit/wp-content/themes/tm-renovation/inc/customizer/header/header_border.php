<?php
/**
 * Header Border
 * ============
 */
$section  = 'header_border';
$priority = 1;

Kirki::add_field( 'infinity', array(
	'type'      => 'dimension',
	'settings'  => 'header_border_width',
	'label'     => esc_html__( 'Border width', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => HEADER_BORDER_WIDTH,
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-header',
			'property' => 'border-width',
		),
	)
) );

Kirki::add_field( 'infinity', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'header_border_style',
	'label'     => esc_html__( 'Border style', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => HEADER_BORDER_STYLE,
	'transport' => 'auto',
	'choices'   => array(
		'solid'  => esc_html__( 'Solid', 'infinity' ),
		'dashed' => esc_html__( 'Dashed', 'infinity' ),
		'dotted' => esc_html__( 'Dotted', 'infinity' ),
		'double' => esc_html__( 'Double', 'infinity' ),
	),
	'output'    => array(
		array(
			'element'  => '.site-header',
			'property' => 'border-style',
		),
	)
) );

Kirki::add_field( 'infinity', array(
	'type'      => 'color',
	'settings'  => 'header_border_color',
	'label'     => esc_html__( 'Border color', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => HEADER_BORDER_COLOR,
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-header',
			'property' => 'border-color',
		),
	)
) );