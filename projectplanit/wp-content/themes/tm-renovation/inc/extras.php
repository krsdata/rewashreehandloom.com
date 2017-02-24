<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Renovation
 */

/**
 * Adds custom classes to the array of body classes.
 * ================================================
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function infinity_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	global $infinity_custom_class;
	if ( $infinity_custom_class ) {
		$classes[] = $infinity_custom_class;
	}

	if ( Kirki::get_option( 'infinity', 'site_general_boxed' ) == 1 ) {
		$classes[] = 'boxed';
	}

	$classes[] = Kirki::get_option( 'infinity', 'header_type' );

	global $infinity_page_layout_private;
	if ( $infinity_page_layout_private != 'default' && class_exists( 'cmb2_bootstrap_205' ) ) {
		$layout = get_post_meta( get_the_ID(), "infinity_page_layout_private", true );
	} else {
		$layout = Kirki::get_option( 'infinity', 'page_layout' );
	}

	$classes[] = $layout;

	if ( defined( 'TM_CORE_VERSION' ) ) {
		$classes[] = 'core_' . str_replace( ".", "", TM_CORE_VERSION );
	}

	return $classes;
}

add_filter( 'body_class', 'infinity_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 * ==========================================================================
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 *
	 * @return string The filtered title.
	 */
	function infinity_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'infinity' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'infinity_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function infinity_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}

	add_action( 'wp_head', 'infinity_render_title' );
endif;

/***
 * Get mini cart HTML
 * ==================
 * @return string
 */
if ( class_exists( 'WooCommerce' ) ) {
	function infinity__minicart() {
		$cart_html = '';
		$qty       = WC()->cart->get_cart_contents_count();
		$cart_html .= '<div class="mini-cart__button" title="' . esc_html__( 'View your shopping cart', 'infinity' ) . '">';
		$cart_html .= '<span class="mini-cart-icon"' . ' data-count="' . $qty . '"></span>';
		$cart_html .= '</div>';

		return $cart_html;
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'infinity_header_add_to_cart_fragment' );
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * ========================================================================
 *
 * @param $fragments
 *
 * @return mixed
 */
if ( class_exists( 'WooCommerce' ) ) {
	function infinity_header_add_to_cart_fragment( $fragments ) {
		ob_start();
		$cart_html = infinity__minicart();
		echo $cart_html;
		$fragments['.mini-cart__button'] = ob_get_clean();

		return $fragments;
	}
}

/**
 * Custom Comment Form
 * ========================================================================
 */
function infinity_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, $size = '100' ); ?>
		</div>
		<div class="comment-content">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'infinity' ) ?></em>
				<br/>
			<?php endif; ?>
			<div class="metadata">
				<?php printf( wp_kses( '<cite class="fn">%s</cite>', array( 'cite' => array() ) ), get_comment_author_link() ) ?>
				<br/>
				<a class="comment-date"
				   href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php printf( esc_html__( '%1$s', 'infinity' ), get_comment_date(), get_comment_time() ) ?></a>
				<?php edit_comment_link( esc_html__( '(Edit)', 'infinity' ), '  ', '' ) ?>
				<?php comment_reply_link( array_merge( $args, array(
					'depth'     => $depth,
					'max_depth' => $args['max_depth']
				) ) ) ?>
			</div>
			<?php comment_text() ?>
		</div>
	</div>
	<?php
}

/**
 * Extra Info
 * =============
 */
function infinity_extra_info() {
	global $wp_version, $woocommerce;
	$parent_theme       = wp_get_theme( THEME_DIR );
	$child_theme        = wp_get_theme();
	$child_theme_in_use = false;
	if ( $parent_theme->name != $child_theme->name ) {
		$child_theme_in_use = true;
	}
	$vc_version = "Not activated";
	if ( defined( 'WPB_VC_VERSION' ) ) {
		$vc_version = "v" . WPB_VC_VERSION;
	}
	$tm_core_version = "Not activated";
	if ( defined( 'TM_CORE_VERSION' ) ) {
		$tm_core_version = "v" . TM_CORE_VERSION;
	}
	?>
	<!--
    * WordPress: v<?php echo $wp_version . "\n"; ?>
    * ThemMove Core: <?php echo $tm_core_version; ?><?php echo "\n"; ?>
    <?php if ( class_exists( 'WooCommerce' ) ) : ?>* WooCommerce: v<?php echo $woocommerce->version . "\n"; ?><?php else : ?>* WooCommerce: Not Installed <?php echo "\n"; ?><?php endif; ?>
    * Visual Composer: <?php echo $vc_version; ?><?php echo "\n"; ?>
    * Theme: <?php echo $parent_theme->name; ?> v<?php echo $parent_theme->version; ?> by <?php echo $parent_theme->get( 'Author' ) . "\n"; ?>
    * Child Theme: <?php if ( $child_theme_in_use == true ) { ?>Activated<?php } else { ?>Not activated<?php } ?><?php echo "\n"; ?>
    -->
<?php }

add_action( 'wp_head', 'infinity_extra_info', 9999 );


/**
 * ============================================================================
 * Dynamic excerpt for post
 * ============================================================================
 *
 * @param int $length Max excerpt length.
 *
 * @return string
 */
function infinity_print_excerpt( $length ) {
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content( '' );
		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]>', $text );
	}
	$text = strip_shortcodes( $text );
	$text = strip_tags( $text );

	$text    = substr( $text, 0, $length );
	$excerpt = infinity_reverse_strrchr( $text, '.', 1 );
	if ( $excerpt ) {
		echo apply_filters( 'the_excerpt', $excerpt );
	} else {
		echo apply_filters( 'the_excerpt', $text );
	}
}

/**
 * Returns the portion of haystack which goes until the last occurrence of needle
 *
 * @param int $haystack
 * @param int $needle
 * @param int $trail
 *
 * @return int
 */
function infinity_reverse_strrchr( $haystack, $needle, $trail ) {
	return strrpos( $haystack, $needle ) ? substr( $haystack, 0, strrpos( $haystack, $needle ) + $trail ) : false;
}

if ( class_exists( 'Projects' ) ) {
	function infinity_new_projects_fields( $fields ) {

		$fields['location'] = array(
			'name'        => esc_html__( 'Location', 'projects' ),
			'description' => esc_html__( 'Enter a location for this project.', 'projects' ),
			'type'        => 'text',
			'default'     => '',
			'section'     => 'info'
		);

		$fields['date_completed'] = array(
			'name'        => esc_html__( 'Date Completed', 'projects' ),
			'description' => esc_html__( 'Enter a date Completed for this project.', 'projects' ),
			'type'        => 'text',
			'default'     => '',
			'section'     => 'info'
		);

		$fields['value'] = array(
			'name'        => esc_html__( 'Value', 'projects' ),
			'description' => esc_html__( 'Enter a value for this project.', 'projects' ),
			'type'        => 'text',
			'default'     => '',
			'section'     => 'info'
		);

		if ( class_exists( 'WPBakeryVisualComposer' ) ) {
			$pt_array = ( $pt_array = vc_settings()->get( 'content_types' ) ) ? ( $pt_array ) : vc_default_editor_post_types(); // post type array
			if ( in_array( 'project', $pt_array ) ) {
				$fields['use_vc'] = array(
					'name'        => esc_html__( 'Use Visual Composer', 'projects' ),
					'description' => esc_html__( 'Use Visual Composer for this project', 'projects' ),
					'type'        => 'checkbox',
					'default'     => 'no',
					'section'     => 'info'
				);
			}
		}

		return $fields;
	}

	add_filter( 'projects_custom_fields', 'infinity_new_projects_fields' );
}

/**
 * Pass a PHP string to Javasript variable
 **/
function infinity_esc_js( $string ) {
	return str_replace( "\n", '\n', str_replace( '"', '\"', addcslashes( str_replace( "\r", '', (string) $string ), "\0..\37" ) ) );
}

/**
 * Move comment field to bottom
 *
 * @param $fields
 *
 * @return mixed
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4', '>=' ) ) :
	function infinity_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;

		return $fields;
	}

	add_filter( 'comment_form_fields', 'infinity_move_comment_field_to_bottom' );
endif;

/**
 * Social Links
 *
 * @sine 2.0
 *
 * @param bool $mobile
 */
function infinity_social_links( $mobile = false ) {

	if ( ! Kirki::get_option( 'infinity', 'social_links_enable' ) ) {
		return;
	}

	$social_links = Kirki::get_option( 'infinity', 'social_links' );

	$id = $mobile ? 'social-menu-top-mobile' : 'social-menu-top';

	$classes = array( 'social-menu' );

	if ( $mobile ) {
		$classes[] = 'social-menu--mobile';
	}

	if ( ! empty( $social_links ) ) {
		?>
		<div class="<?php echo implode( ' ', $classes ); ?>">
			<ul class="menu" id="<?php echo esc_attr( $id ); ?>">
				<?php foreach ( $social_links as $row ) { ?>
					<li class="menu-item">
						<?php if ( isset( $row['link_url'] ) && ! empty( $row['link_url'] ) ) { ?>
						<a href="<?php echo esc_url_raw( $row['link_url'] ); ?>">
							<?php } ?>
							<?php if ( isset( $row['icon_class'] ) && ! empty( $row['icon_class'] ) ) { ?>
								<i class="fa <?php echo esc_attr( $row['icon_class'] ); ?>"></i>
							<?php } ?>
							<?php if ( isset( $row['link_url'] ) && ! empty( $row['link_url'] ) ) { ?>
						</a>
					<?php } ?>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php
	}
}