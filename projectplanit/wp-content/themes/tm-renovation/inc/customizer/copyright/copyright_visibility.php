<?php

$section  = 'copyright_visibility';
$priority = 1;

Kirki::add_field( 'infinity', array(
	'type'        => 'toggle',
	'settings'     => 'copyright_layout_enable',
	'label'       => esc_html__( 'Copyright', 'infinity' ),
	'description' => esc_html__( 'Enabling this option will display copyright area', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => COPYRIGHT_LAYOUT_ENABLE,
) );