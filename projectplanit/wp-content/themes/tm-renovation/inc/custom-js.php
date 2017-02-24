<?php function infinity_js_custom_code() { ?>
	<?php if ( Kirki::get_option( 'infinity', 'custom_js_enable' ) == 1 ): ?>
		<script>
		<?php echo html_entity_decode( Kirki::get_option( 'infinity', 'custom_js' ), ENT_QUOTES ); ?>
		</script>
	<?php endif ?>
	<?php if ( Kirki::get_option( 'infinity', 'nav_sticky_enable' ) == 1 && has_nav_menu( 'primary' ) ): ?>
		<?php if ( Kirki::get_option( 'infinity', 'header_type' ) == 'header03' || Kirki::get_option( 'infinity', 'header_type' ) == 'header04' ) { ?>
			<script>
				jQuery( document ).ready( function( $ ) {
					$( ".header" ).headroom(
						{
							offset: 52
						}
					);
				} );
			</script>
		<?php } else { ?>
			<script>
				jQuery( document ).ready( function( $ ) {
					$( "#site-navigation" ).headroom(
						{
							offset: 130
						}
					);
				} );
			</script>
		<?php } ?>
	<?php endif ?>
	<?php if ( Kirki::get_option( 'infinity', 'site_general_back_to_top' ) == 1 ) : ?>
		<script>
			jQuery( document ).ready( function( $ ) {
				var $window = $( window );
				// Scroll up
				var $scrollup = $( '.scrollup' );

				$window.scroll( function() {
					if ( $window.scrollTop() > 100 ) {
						$scrollup.addClass( 'show' );
					} else {
						$scrollup.removeClass( 'show' );
					}
				} );

				$scrollup.on( 'click', function( evt ) {
					$( "html, body" ).animate( { scrollTop: 0 }, 600 );
					evt.preventDefault();
				} );
			} );
		</script>
	<?php endif; ?>
	<?php if ( is_rtl() ) : ?>
		<script>
			jQuery( window ).load( function() {
				var left = jQuery( '[data-vc-full-width="true"]' ).css('left');
				jQuery( '[data-vc-full-width="true"]' ).css( {
					'left': 'auto',
					'right': left
				} );

				var ess_left = jQuery('.esg-container-fullscreen-forcer' ).css('left');
				jQuery( '.esg-container-fullscreen-forcer' ).css( {
					'left': 'auto',
					'right': ess_left
				} );
			} );
		</script>
	<?php endif; ?>
<?php }

add_action( 'wp_footer', 'infinity_js_custom_code' );
