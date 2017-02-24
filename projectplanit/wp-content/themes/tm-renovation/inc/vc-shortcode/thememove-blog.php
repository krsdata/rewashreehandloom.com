<?php
/**
 * ThemeMove Blog Shortcode
 * @version 1.0
 * @package ThemeMove
 */
class WPBakeryShortCode_Thememove_Blog extends WPBakeryShortCode {
	public $query = '';
	public $num_pages = 0;
	public $paged;
	public $offset = 0;


	public function get_query( $atts ) {

		$total_posts    = intval( $atts['total_posts'] ) != - 1 ? intval( $atts['total_posts'] ) : 1000;
		$posts_per_page = intval( $atts['posts_per_page'] ) > 0 ? intval( $atts['posts_per_page'] ) : 5;
		$this->paged     = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$offset = $posts_per_page * ( $this->paged - 1 );

		$orderby = $atts['orderby'];
		$order   = $atts['order'];

		$args   = array(
			'post_type'      => 'post',
			'offset'         => $offset,
			'post_count'     => $total_posts,
			'posts_per_page' => $posts_per_page,
			'orderby'        => $orderby,
			'order'          => $order,
		);

		$filter     = $atts['filter'];
		$taxonomies = $atts['taxonomies'];

		if ( '' != $taxonomies ) {
			if ( 'category' == $filter ) {
				$args['cat'] = $taxonomies;
			}
			if ( 'tag' == $filter ) {
				$args['tag_id'] = $taxonomies;
			}
		}

		$this->query = new WP_Query( $args );

		$this->num_pages = intval( $atts['total_posts'] ) != - 1 ? ceil( $total_posts / $posts_per_page ) : $this->query->max_num_pages;
	}

	/***
	 * Display navigation to next/previous set of posts when applicable.
	 * @return array|string
	 */
	public function get_paging_nav() {
		global $wp_rewrite;

		// Don't print empty markup if there's only one page.
		if ( $this->num_pages < 2 ) {
			return '';
		}

		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $this->num_pages,
			'current'   => $this->paged,
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text'     => '<i class="fa fa-angle-left"></i>',
			'next_text'     => '<i class="fa fa-angle-right"></i>',
		) );

		if ( ! $links ) {
			return '';
		}

		return $links;
	}
}

// Mapping shortcode
vc_map( array(
	'name'     => esc_html__( 'Blog', 'infinity' ),
	'base'     => 'thememove_blog',
	'category' => esc_html__( 'by THEMEMOVE', 'infinity' ),
	'params'   => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Post layout', 'thememove' ),
			'description' => esc_html__( 'Select a template to display post', 'thememove' ),
			'param_name'  => 'layout',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'List Post Layout', 'thememove' )    => 'list',
				esc_html__( '1 Full Post then List Layout', 'thememove' )    => 'full_list',
				esc_html__( 'Grid Post Layout', 'thememove' )    => 'grid',
				esc_html__( '1 Full Post then Grid Layout', 'thememove' )    => 'full_grid',
				esc_html__( 'Simple Post Layout', 'thememove' )    => 'simple',
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Total Posts', 'infinity' ),
			'param_name'  => 'total_posts',
			'value'       => -1,
			'description' => esc_html__( 'Set max limit for items in grid or enter -1 to display all (limited to 1000)', 'infinity' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Posts per page', 'infinity' ),
			'param_name'  => 'posts_per_page',
			'value'       => 5,
			'description' => esc_html__( 'Number of items to show per page', 'infinity' ),
		),
		array(
			'type'       => 'checkbox',
			'param_name' => 'enable_share',
			'value'      => array(esc_html__('Show Share Buttons', 'infinity') => 'true'),
			'dependency' => array( 'element' => 'layout', 'value' => array('list', 'full_list') )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Item Width', 'infinity' ),
			'description' => __( 'Enter item width in a row (has 12 columns)', 'infinity' ),
			'param_name'  => 'item_width_md',
			'value'       => array(
				__( 'Default (6 columns - 1/2 - 2 items in a row)', 'infinity' ) => 6,
				__( '1 columns - 1/1 - 12 items in a row', 'infinity' )          => 1,
				__( '2 columns - 1/6 - 6 items in a row', 'infinity' )           => 2,
				__( '3 columns - 1/4 - 4 items in a row', 'infinity' )           => 3,
				__( '4 columns - 1/3 - 3 items in a row', 'infinity' )           => 4,
				__( '6 columns - 1/2 - 2 items in a row', 'infinity' )           => 6,
				__( '12 columns - 1/1 - 1 item in a row', 'infinity' )           => 12,
			),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array('grid', 'full_grid'),
			)
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Number of posts in a row', 'infinity' ),
			'param_name' => 'number_of_columns_simple',
			'value'      => array(
				esc_html__( 'Default (2 posts)', 'infinity' ) => 6,
				esc_html__( '12 posts', 'infinity' )          => 1,
				esc_html__( '6  posts', 'infinity' )          => 2,
				esc_html__( '4  posts', 'infinity' )          => 3,
				esc_html__( '3  posts', 'infinity' )          => 4,
				esc_html__( '2  posts', 'infinity' )          => 6,
				esc_html__( '1  posts', 'infinity' )          => 12,
			),
			'dependency' => array( 'element' => 'layout', 'value' => 'simple' )
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'infinity' ),
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Order by', 'infinity' ),
			'param_name'  => 'orderby',
			'description' => esc_html__( 'Select order type.', 'infinity' ),
			'value'       => array(
				esc_html__( 'Date', 'infinity' ) => 'date',
				esc_html__( 'Post ID', 'infinity' ) => 'ID',
				esc_html__( 'Author', 'infinity' ) => 'author',
				esc_html__( 'Title', 'infinity' ) => 'title',
				esc_html__( 'Last modified date', 'infinity' ) => 'modified',
				esc_html__( 'Random order', 'infinity' ) => 'rand',
			)
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'infinity' ),
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Sorting', 'infinity' ),
			'param_name'  => 'order',
			'description' => esc_html__( 'Select sorting order.', 'infinity' ),
			'value'       => array(
				esc_html__( 'Descending', 'infinity' ) => 'DESC',
				esc_html__( 'Ascending', 'infinity' ) => 'ASC',
			)
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'infinity' ),
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Filter by', 'infinity' ),
			'param_name'  => 'filter',
			'description' => esc_html__( 'Select filter source.', 'infinity' ),
			'value'       => array(
				esc_html__( 'Categories', 'infinity' ) => 'category',
				esc_html__( 'Tags', 'infinity' ) => 'tag'
			)
		),
		array(
			'group'       => esc_html__( 'Data Settings', 'infinity' ),
			'type'        => 'autocomplete',
			'param_name'  => 'taxonomies',
			'description' => esc_html__( 'Enter categories, tags to filter.', 'infinity' ),
			'settings' => array(
				'multiple' => true,
				'min_length' => 1,
				'groups' => true,
				'unique_values' => true,
				'display_inline' => true,
				'delay' => 0,
				'auto_focus' => true,
				'values' => thememove_get_taxonomy_for_autocomplete()
			),
			'dependency' => array( 'element' => 'filter', 'value' => array('category', 'tag') )
		),
		array(
			'group'       => __( 'Responsive Options', 'infinity' ),
			'type'        => 'thememove_responsive',
			'heading'     => __( 'Responsiveness', 'infinity' ),
			'param_name'  => 'responsive',
			'description' => __( 'Adjust Number of items in a row for different screen sizes.', 'infinity' ),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array('grid', 'full_grid'),
			)
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra class name', 'infinity'),
			'param_name' => 'el_class',
			'description' => esc_html__('If you want to use multiple Google Maps in one page, please add a class name for them.', 'infinity'),
		),
	)
) );