<?php if ( has_nav_menu( 'social' ) || Kirki::get_option( 'infinity', 'top_layout_enable' ) == 1 ) { ?>
	<div class="site-top">
		<div class="container">
			<div class="row middle">
				<div class="col-sm-12 col-md-10">
					<?php dynamic_sidebar( 'top-left-widget' ); ?>
				</div>
				<?php
				$class = 'col-sm-2 end-lg';
				if ( class_exists( 'SitePress' ) || class_exists( 'Polylang' ) ) {
					$class = 'col-sm-6 end-lg';
					?>
					<div class="col-sm-6"><?php dynamic_sidebar( 'lang-area' ); ?></div>
				<?php } ?>
				<?php if( has_nav_menu('social') ) { ?>
					<div class="<?php echo esc_attr($class); ?>">
						<?php wp_nav_menu( array(
							'theme_location'  => 'social',
							'menu_id'         => 'social-menu-top',
							'container_class' => 'social-menu hidden-xs hidden-sm hidden-md',
							'fallback_cb'     => false
						) ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>
<header class="site-header">
	<div class="container">
		<div class="row middle-xs middle-sm middle-md">
			<div class="col-xs-10 col-sm-6 col-lg-2 site-branding">
				<?php if ( $logo = Kirki::get_option( 'infinity', 'site_logo' ) ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img
							src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
				<?php } else { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php } ?>
			</div>
			<div class="col-xs-2 col-sm-1 hidden-lg last-sm last-md end">
				<i id="open-<?php echo is_rtl() ? 'right' : 'left'; ?>" class="fa fa-navicon"></i>
			</div>
			<div class="col-xs-12 col-sm-5 col-lg-10 center-xs center-sm center-md">
				<div class="header-right">
					<div class="row middle">
						<?php if ( Kirki::get_option( 'infinity', 'header_layout_search_enable' ) == 1 || (class_exists( 'WooCommerce' ) && Kirki::get_option( 'infinity', 'header_layout_mini_cart_enable' ) == 1) ) { ?>
							<?php $class = 'col-lg-10'; $class2 = 'col-lg-2'; ?>
						<?php } else { ?>
							<?php $class = 'col-lg-12'; ?>
						<?php } ?>
						<nav id="site-navigation" class=" col-xs-12 col-sm-10 <?php echo esc_attr( $class ); ?> start-xs start-sm main-navigation hidden-xs hidden-sm hidden-md">
							<div class="container">
								<div class="row middle">
									<div class="col-lg-12">
										<?php if ( class_exists( 'TM_Walker_Nav_Menu' ) && has_nav_menu( 'primary' ) ) {
											wp_nav_menu( array(
												'theme_location'  => 'primary',
												'menu_id'         => 'primary-menu',
												'container_class' => 'primary-menu',
												'walker'          => new TM_Walker_Nav_Menu
											) );
										} else {
											wp_nav_menu( array(
												'theme_location'  => 'primary',
												'menu_id'         => 'primary-menu',
												'container_class' => 'primary-menu'
											) );
										} ?>
									</div>
								</div>
							</div>
						</nav>
						<!-- #site-navigation -->
						<?php if ( Kirki::get_option( 'infinity', 'header_layout_search_enable' ) == 1 || (class_exists( 'WooCommerce' ) && Kirki::get_option( 'infinity', 'header_layout_mini_cart_enable' ) == 1) ) { ?>
							<div class="col-xs-12 <?php echo esc_attr( $class2 ); ?> end-sm end-lg">
								<?php if ( Kirki::get_option( 'infinity', 'header_layout_search_enable' ) == 1 ) { ?>
									<div class="search-box">
										<?php get_search_form(); ?>
										<i class="fa fa-search"></i>
									</div>
								<?php } ?>
								<?php if ( class_exists( 'WooCommerce' ) && Kirki::get_option( 'infinity', 'header_layout_mini_cart_enable' ) == 1 ) { ?>
									<div class="mini-cart">
										<?php echo infinity__minicart(); ?>
										<div class="widget_shopping_cart_content"></div>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- #masthead -->