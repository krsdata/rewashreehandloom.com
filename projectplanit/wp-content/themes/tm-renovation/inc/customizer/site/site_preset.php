<?php

$section  = 'site_preset';
$priority = 1;
$type     = 'site';

Kirki::add_field( 'infinity', array(
	'type'        => 'preset',
	'settings'    => 'site_preset',
	'label'       => esc_html__( 'Site Preset', 'infinity' ),
	'description' => esc_html__( 'Controls the main color scheme & layout throughout your site.', 'infinity' ),
//	'section'     => $section,
	'default'     => 'preset1',
	'priority'    => $priority ++,
	'choices'     => array(
		'1' => array(
			'label'    => infinity_get_preset_label( $type, 'preset1' ),
			'settings' => infinity_get_preset_settings( $type, 'preset1' ),
		),
		'2' => array(
			'label'    => infinity_get_preset_label( $type, 'preset2' ),
			'settings' => infinity_get_preset_settings( $type, 'preset2' ),
		),
		'3' => array(
			'label'    => infinity_get_preset_label( $type, 'preset3' ),
			'settings' => infinity_get_preset_settings( $type, 'preset3' ),
		),
		'4' => array(
			'label'    => infinity_get_preset_label( $type, 'preset4' ),
			'settings' => infinity_get_preset_settings( $type, 'preset4' ),
		),
	),
) );