<?php

$priority = 1;

// Add panels
Kirki::add_panel( 'site', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Site', 'infinity' ),
) );

Kirki::add_panel( 'logo', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Logo & Favicon', 'infinity' ),
) );

Kirki::add_panel( 'layout', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Layout & Background', 'infinity' ),
) );

Kirki::add_panel( 'typo', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Typography', 'infinity' ),
) );

Kirki::add_panel( 'color', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Color', 'infinity' ),
) );

Kirki::add_panel( 'top', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Top Area', 'infinity' ),
) );

Kirki::add_panel( 'header', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Header', 'infinity' ),
) );

Kirki::add_panel( 'social', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Social', 'infinity' ),
) );

if ( function_exists( 'tm_bread_crumb' ) ) {
	Kirki::add_panel( 'breadcrumb', array(
		'priority' => $priority ++,
		'title'    => esc_html__( 'Breadcrumb', 'infinity' ),
	) );
}

Kirki::add_panel( 'nav', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Navigation', 'infinity' ),
) );

Kirki::add_panel( 'button', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Button', 'infinity' ),
) );

Kirki::add_panel( 'footer', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Footer', 'infinity' ),
) );

Kirki::add_panel( 'copyright', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Copyright', 'infinity' ),
) );

Kirki::add_panel( 'page', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Page', 'infinity' ),
) );

Kirki::add_panel( 'post', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Post', 'infinity' ),
) );

Kirki::add_panel( 'woo', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Woocommerce', 'infinity' ),
) );

Kirki::add_panel( 'custom', array(
	'priority' => $priority ++,
	'title'    => esc_html__( 'Custom Code', 'infinity' ),
) );

require_once TM_RENOVATION_PATH . '/inc/customizer/site/_site.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/logo/_logo.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/layout/_layout.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/typo/_typo.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/color/_color.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/nav/_nav.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/button/_button.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/top/_top.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/header/_header.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/social/_social.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/breadcrumb/_breadcrumb.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/footer/_footer.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/copyright/_copyright.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/page/_page.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/post/_post.php';
if ( class_exists( 'WooCommerce' ) ) {
	require_once TM_RENOVATION_PATH . '/inc/customizer/woo/_woo.php';
}
require_once TM_RENOVATION_PATH . '/inc/customizer/custom/_custom.php';