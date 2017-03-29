<!-- #Footer Area -->
<footer>
	<div class="inner-wrapper">
		<div id="top-footer" class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-9 nav-menu">
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
		</div> 
		<div id="bottom-fotter" class="row">
			<div class="col-sm-3">
				<?php if ( is_active_sidebar( 'footer-1' ) ) :
					 dynamic_sidebar('footer-1'); 
			 	endif; ?>
			</div>
			<div class="col-sm-5">
				<?php if ( is_active_sidebar( 'footer-2' ) ) :
					 dynamic_sidebar('footer-2'); 
			 	endif; ?>
			</div>
			<div class="col-sm-4">
				<?php if ( is_active_sidebar( 'footer-3' ) ) :
					 dynamic_sidebar('footer-3'); 
			 	endif; ?>
			</div>
		</div> 
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>