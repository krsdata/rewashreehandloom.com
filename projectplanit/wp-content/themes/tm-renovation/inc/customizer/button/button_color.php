<?php

$section  = 'button_color';
$priority = 1;

// Text color
Kirki::add_field( 'infinity', array(
	'type'        => 'color',
	'settings'    => 'button_style_link_color',
	'label'       => esc_html__( 'Text Color', 'infinity' ),
	'description' => esc_html__( 'Normal State', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => BUTTON_STYLE_LINK_COLOR,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '
				button, input[type="button"],
				input[type="reset"], input[type="submit"],
				a.btn, a.thememove-btn',
			'property' => 'color',
		),
		array(
			'element'  => '.tp-caption.Renovation-Button > a',
			'property' => 'color',
			'units'    => '!important'
		)
	)
) );

Kirki::add_field( 'infinity', array(
	'type'        => 'color',
	'settings'    => 'button_style_link_color_hover',
	'description' => esc_html__( 'Hover State', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => BUTTON_STYLE_LINK_COLOR_HOVER,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '
				button:hover, input[type="button"]:hover,
				input[type="reset"]:hover, input[type="submit"]:hover,
				a.btn:hover, a.thememove-btn:hover',
			'property' => 'color',
		),
		array(
			'element'  => '.tp-caption.Renovation-Button:hover > a, .tp-caption.Renovation-Button > a:hover',
			'property' => 'color',
			'units'    => '!important'
		)
	)
) );

// Background color
Kirki::add_field( 'infinity', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_bg_color',
	'label'       => esc_html__( 'Background color', 'infinity' ),
	'description' => esc_html__( 'Normal State', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => BUTTON_BG_COLOR,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '
				a.button, button, input[type="button"],
				input[type="reset"], input[type="submit"],
				.btn, .thememove-btn
			',
			'property' => 'background-color',
		),
		array(
			'element'  => '.tp-caption.Renovation-Button',
			'property' => 'background-color',
			'units'    => '!important'
		),
	),
) );

Kirki::add_field( 'infinity', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_bg_color_hover',
	'description' => esc_html__( 'Hover State', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => BUTTON_BG_COLOR_HOVER,
	'output'      => array(
		array(
			'element'  => '
				a.button:hover, button:hover, input[type="button"]:hover,
				input[type="reset"]:hover, input[type="submit"]:hover,
				.btn:hover, .thememove-btn:hover
			',
			'property' => 'background-color',
		),
		array(
			'element'  => '.tp-caption.Renovation-Button:hover',
			'property' => 'background-color',
			'units'    => '!important'
		),
	)
) );

// Border color
Kirki::add_field( 'infinity', array(
	'type'        => 'color',
	'settings'    => 'button_border_color',
	'label'       => esc_html__( 'Border color', 'infinity' ),
	'description' => esc_html__( 'Border color', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => BUTTON_BORDER_COLOR,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '
				a.button, button, input[type="button"],
				input[type="reset"], input[type="submit"],
				.btn, .thememove-btn',
			'property' => 'border-color',
		),
	)
) );

Kirki::add_field( 'infinity', array(
	'type'        => 'color',
	'settings'    => 'button_border_color_hover',
	'description' => esc_html__( 'Border color', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => BUTTON_BORDER_COLOR_HOVER,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element'  => '
				a.button:hover, button:hover, input[type="button"]:hover,
				input[type="reset"]:hover, input[type="submit"]:hover,
				.btn:hover, .thememove-btn:hover',
			'property' => 'border-color',
		),
	)
) );