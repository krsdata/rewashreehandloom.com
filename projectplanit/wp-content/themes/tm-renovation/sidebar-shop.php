<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Renovation
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}
?>
<div class="col-sm-4 col-md-3">
	<aside class="sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-shop' ); ?>
	</aside>
</div>
