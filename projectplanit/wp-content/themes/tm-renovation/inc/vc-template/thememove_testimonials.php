<?php
/**
 * Shortcode attributes
 *
 * @var $enable_carousel
 * @var $display_bullets
 * @var $enable_autoplay
 * @var $number
 * @var $orderby
 * @var $order
 * @var $display_author
 * @var $display_url
 * @var $display_avatar
 * @var $size
 * @var $el_class
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Testimonials
 */
$output = '';
$atts   = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
?>
	<div <?php echo 'class="thememove-testimonials ' . esc_attr( $el_class ) . '"'; ?> >
		<?php do_action( 'woothemes_testimonials', array(
			'limit'           => $number,
			'size'            => $size,
			'orderby'         => $orderby,
			'order'           => $order,
			'display_author'  => ( $display_author == 'yes' ? true : false ),
			'display_avatar'  => ( $display_avatar == 'yes' ? true : false ),
			'display_url'     => ( $display_url == 'yes' ? true : false ),
			'display_bullets' => ( $display_bullets == 'yes' ? true : false ),
		) ); ?>
	</div>

<?php if ( $enable_carousel == 'yes' ) { ?>
	<script>
		jQuery( document ).ready( function( $ ) {
			$( ".wpb_row .testimonials-list" ).owlCarousel(
				{
					items: 1,
					navigation: false,
					margin: 30,
					<?php if($display_bullets == 'yes'){ ?>
					dots: true,
					<?php }else { ?>
					dots: false,
					<?php } ?>
					<?php if($number > 1) { ?>
					loop: true,
					<?php } ?>
					<?php if($enable_autoplay == 'yes'){ ?>
					autoplay: true,
					<?php }else { ?>
					autoplay: false,
					<?php } ?>
					autoplayHoverPause: true,
					<?php if (is_rtl()) { ?>
					rtl: true,
					<?php } ?>
				}
			);
		} );
	</script>
<?php } ?>