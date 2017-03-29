<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?> </title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet"> 
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php wp_head(); ?>
	
	<!---Favicon-image-->
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/vnd.microsoft.icon"/>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/fav/favicon.ico" type="image/x-ico"/>
	<!---Favicon-image-->
	
	<!--Add JavaScript & jQuery files here-->
    <script>var sit_url='<?php echo site_url(); ?>';</script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<!--Add JavaScript & jQuery files here--> 
</head>

<body <?php body_class(); ?>>

<div class="container">
	<header id="site-header" class="site-header">
		<div class="inner-wrapper">
			<div id="top-header"  class="row nav-menu">
				<div class="col-sm-9">
					<?php if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top_header' ) ) {
							wp_nav_menu(array( 'sort_column' => 'menu_order', 'container_class' => 'top-menu', 'container_id' => 'top-menu', 'menu_id' => 'top-menu-list', 'theme_location'  => 'top_header') );
							echo get_search_form();
						} else { ?>
						
						<div id="header-main-menu" class="main-menu">
							<ul id="menu_list" class="menu">
								<?php wp_list_pages('title_li=&depth=0'); ?>
							</ul>
						</div>
					<?php } ?>
				</div>
				<div id="logo" class="col-sm-3">
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name') ?>">
						<img src="<?php bloginfo('template_url')?>/images/logo-new.png" alt="<?php bloginfo('name') ?>">
					</a>
				</div><!-- #logo -->
			</div>
			<div id="bottom-header" class="row nav-menu">
				<div class="col-sm-12">
					<?php if( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary' ) ) {
						wp_nav_menu(array( 'sort_column' => 'menu_order', 'container_class' => 'main-menu', 'container_id' => 'header-main-menu', 'menu_id' => 'menu_list', 'theme_location'  => 'primary') );
					} else { ?>
					
					<div id="header-main-menu" class="main-menu">
						<ul id="menu_list" class="menu">
							<?php wp_list_pages('title_li=&depth=0'); ?>
						</ul>
					</div>
					<?php } ?>
				</div>
			</div><!--  container  -->
		</div>
	</header>


		