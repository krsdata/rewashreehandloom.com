<?php
/**
 * Header Spacing
 * ============
 */
$section  = 'header_spacing';
$priority = 1;

Kirki::add_field( 'infinity', array(
	'type'      => 'spacing',
	'settings'  => 'header_spacing_padding',
	'label'     => esc_html__( 'Padding', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => HEADER_SPACING_PADDING_TOP,
		'bottom' => HEADER_SPACING_PADDING_BOTTOM,
		'left'   => HEADER_SPACING_PADDING_LEFT,
		'right'  => HEADER_SPACING_PADDING_RIGHT
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-header',
			'property' => 'padding',
		),
	)
) );

Kirki::add_field( 'infinity', array(
	'type'      => 'spacing',
	'settings'  => 'header_spacing_margin',
	'label'     => esc_html__( 'Margin', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => HEADER_SPACING_MARGIN_TOP,
		'bottom' => HEADER_SPACING_MARGIN_BOTTOM,
		'left'   => HEADER_SPACING_MARGIN_LEFT,
		'right'  => HEADER_SPACING_MARGIN_RIGHT
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-header',
			'property' => 'margin',
		),
	)
) );