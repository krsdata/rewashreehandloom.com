<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Renovation
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
		<link rel="shortcut icon" href="<?php echo Kirki::get_option( 'infinity', 'site_favicon' ); ?>">
		<link rel="apple-touch-icon" href="<?php echo Kirki::get_option( 'infinity', 'site_apple_touch_icon' ); ?>"/>
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="snap-drawers">
	<div class="snap-drawer snap-drawer-<?php echo is_rtl() ? 'right' : 'left'; ?>">
		<div class="hidden-lg">
			<?php infinity_social_links( true ); ?>
		</div>
		<?php
		if ( class_exists( 'TM_Walker_Nav_Menu' ) && has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location'  => 'primary',
				'menu_id'         => 'mobile-menu',
				'container_class' => 'mobile-menu',
				'walker'          => new TM_Walker_Nav_Menu(),
			) );
		} else {
			wp_nav_menu( array(
				'theme_location'  => 'primary',
				'menu_id'         => 'mobile-menu',
				'container_class' => 'mobile-menu',
			) );
		}
		?>
	</div>
</div>
<div id="page" class="hfeed site">

	<?php
	$header_type = Kirki::get_option( 'infinity', 'header_type' );
	require_once get_template_directory() . '/template-parts/' . $header_type . '.php';
	?>
	<div id="content" class="site-content">
