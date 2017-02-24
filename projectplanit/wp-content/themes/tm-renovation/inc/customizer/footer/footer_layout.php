<?php
/**
 * Footer Layout
 * ==============
 */
$section  = 'footer_layout';
$priority = 1;

// Font
Kirki::add_field( 'infinity', array(
	'type'     => 'typography',
	'settings' => 'footer_style_font',
	'label'    => esc_html__( 'Font Family', 'infinity' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => array(
		'font-family' => FOOTER_STYLE_FONT_FAMILY,
		'font-size'   => FOOTER_STYLE_FONT_SIZE,
		'variant'     => FOOTER_STYLE_FONT_VARIANT,
		'subsets'     => array( 'latin-ext' ),
	),
	'output'   => array(
		'element' => '.site-footer',
	),
) );

// Padding
Kirki::add_field( 'infinity', array(
	'type'      => 'spacing',
	'settings'  => 'footer_general_padding',
	'label'     => esc_html__( 'Padding', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => FOOTER_GENERAL_PADDING_TOP,
		'bottom' => FOOTER_GENERAL_PADDING_BOTTOM,
		'left'   => FOOTER_GENERAL_PADDING_LEFT,
		'right'  => FOOTER_GENERAL_PADDING_RIGHT,
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-footer',
			'property' => 'padding',
		),
	)
) );

// Margin
Kirki::add_field( 'infinity', array(
	'type'      => 'spacing',
	'settings'  => 'footer_general_margin',
	'label'     => esc_html__( 'Margin', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => array(
		'top'    => FOOTER_GENERAL_MARGIN_TOP,
		'bottom' => FOOTER_GENERAL_MARGIN_BOTTOM,
		'left'   => FOOTER_GENERAL_MARGIN_LEFT,
		'right'  => FOOTER_GENERAL_MARGIN_RIGHT,
	),
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin',
		),
	)
) );

// Border
Kirki::add_field( 'infinity', array(
	'type'      => 'dimension',
	'settings'  => 'footer_border_width',
	'label'     => esc_html__( 'Border width', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => FOOTER_BORDER_WIDTH,
	'transport' => 'auto',
	'output'    => array(
		array(
			'element'  => '.site-footer',
			'property' => 'border-width',
		),
	)
) );

Kirki::add_field( 'infinity', array(
	'type'      => 'radio-buttonset',
	'settings'  => 'footer_border_style',
	'label'     => esc_html__( 'Border style', 'infinity' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 'solid',
	'transport' => 'auto',
	'choices'   => array(
		'solid'  => esc_html__( 'Solid', 'infinity' ),
		'dashed' => esc_html__( 'Dashed', 'infinity' ),
		'dotted' => esc_html__( 'Dotted', 'infinity' ),
		'double' => esc_html__( 'Double', 'infinity' ),
	),
	'output'    => array(
		array(
			'element'  => '.site-footer',
			'property' => 'border-style',
		),
	)
) );

// Background image
Kirki::add_field( 'infinity', array(
	'type'        => 'image',
	'settings'    => 'footer_bg_image',
	'label'       => esc_html__( 'Background image', 'infinity' ),
	'description' => __( 'Choose a background image for your footer', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => FOOTER_BG_IMAGE,
	'output'      => array(
		array(
			'element'  => '.site-footer',
			'property' => 'background-image',
		),
	)
) );