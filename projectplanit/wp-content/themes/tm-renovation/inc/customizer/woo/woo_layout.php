<?php
/**
 * Woo Layout
 * ================
 */
$section  = 'woo_layout';
$priority = 1;

Kirki::add_field( 'infinity', array(
	'type'        => 'radio-image',
	'settings'     => 'woo_layout_category',
	'label'       => esc_html__( 'Category Product Page Layout', 'infinity' ),
	'description' => esc_html__( 'Choose the category product page layout you want', 'infinity' ),
	'help'        => esc_html__( 'Choose the category product page layout you want', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => WOO_LAYOUT_CATEGORY,
	'choices'     => array(
		'full-width'      => THEME_ROOT . '/core/kirki/assets/images/1c.png',
		'content-sidebar' => THEME_ROOT . '/core/kirki/assets/images/2cr.png',
		'sidebar-content' => THEME_ROOT . '/core/kirki/assets/images/2cl.png',
	),
) );

Kirki::add_field( 'infinity', array(
	'type'        => 'radio-image',
	'settings'     => 'woo_layout_single_product',
	'label'       => esc_html__( 'Single Product Page Layout', 'infinity' ),
	'description' => esc_html__( 'Choose the product page layout you want', 'infinity' ),
	'help'        => esc_html__( 'Choose the product page layout you want', 'infinity' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => WOO_LAYOUT_SINGLE_PRODUCT,
	'choices'     => array(
		'full-width'      => THEME_ROOT . '/core/kirki/assets/images/1c.png',
		'content-sidebar' => THEME_ROOT . '/core/kirki/assets/images/2cr.png',
		'sidebar-content' => THEME_ROOT . '/core/kirki/assets/images/2cl.png',
	),
) );