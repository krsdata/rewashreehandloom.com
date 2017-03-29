<?php

/* enqueue style autolife_enque_scripts(){*/
function autolife_enque_scripts(){
	wp_enqueue_style( 'font-awesome-min-css', get_template_directory_uri() . '/css/font-awesome.min.css' );

	wp_enqueue_style( 'jquery-swipe-nav-css', get_template_directory_uri() . '/css/jquery-swipe-nav.css' );

	if(!is_home()){
	  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/main-style.css' );
	}

	wp_enqueue_style( 'jquery-ui-css', get_template_directory_uri() . '/css/jquery-ui.css' );

	wp_enqueue_style( 'jquery-fancybox-css', get_template_directory_uri() . '/css/jquery.fancybox.css' );

	wp_enqueue_script( 'jquery-swipe-nav-plugin-js', get_template_directory_uri() . '/js/jquery-swipe-nav-plugin.js' ,array('jquery'),false);

	wp_enqueue_script( 'jquery-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.js' ,array('jquery'),false);

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js' ,array('jquery'),false);

	wp_enqueue_script( 'jquery-ui-js', get_template_directory_uri() . '/js/jquery-ui.js' ,array('jquery'),false);

	wp_enqueue_script( 'select-model-js', get_template_directory_uri() . '/js/select-model-ajax.js' ,array('jquery'),false);
	wp_localize_script( 'select-model-js', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
	
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'autolife_enque_scripts' );

/*
** Register custom sidebars
*/
register_sidebar(array(
	'name' => 'Left Sidebar',
	'id'=>'left-sidebare',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
register_sidebar(array(
	'name' => 'Right Sidebar',
	'id'=>'right-sidebare',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
register_sidebar(array(
	'name' => 'Footer 1',	
	'id'=>'footer-1',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'Footer 2',
	'id'=>'footer-2',	
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));

register_sidebar(array(
	'name' => 'Footer 3',
	'id'=>'footer-3',	
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',	
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
/*register_sidebar(array(
	'name' => 'Footer 4',	
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',	
	'before_title' => '<h3 class="widget-title">',	
	'after_title' => '</h3>',
));
*/
/*
** Register Menus
*/
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'theme' ),
	'top_header'=>__( 'Top Navigation', 'theme' ),
));

register_nav_menus( array(
	'footer' => __( 'Footer Navigation', 'theme' ),
));

/*
** Add thumbnail support
*/
if (function_exists( 'add_theme_support' )) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); 
}


/*
** Add custom class to menu item
*/
function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first-menu-item';
    $items[count($items)]->classes[] = 'last-menu-item';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

/**
* Displays navigation to next/previous pages when applicable
*/
function skt_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>">
			<div class="nav-previous"><?php next_posts_link( __( '<span>&larr;</span> Older posts', 'countdown' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span>&rarr;</span>', 'countdown' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}

function skt_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
		$classes[] = 'ie';
		if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
		$classes[] = 'ie'.$browser_version[1];
	} else $classes[] = 'unknown';
	if($is_iphone) $classes[] = 'iphone';
	if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
		$classes[] = 'osx';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
		$classes[] = 'linux';
	} elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
		$classes[] = 'windows';
	}
	return $classes;
}
add_filter('body_class','skt_browser_body_class');



/* array search */
function search_array($array, $key, $value){
         // echo $key .'<br/>'.$value;
        global $cnttval, $basepath, $previous_path;
        foreach ($array as $epic_key => $epic_value) {
            if (is_array($epic_value)) {
                $previous_path = $basepath;
                $basepath = $basepath . "." . $epic_key;
                search_array($epic_value, $key, $value);
                if($cnttval != 1){
                    // $basepath = $previous_path;
                    $breaks = explode(".", $previous_path);
                    array_pop($breaks);
                    array_pop($breaks);
                    // array_pop($breaks);
                    $basepath = implode(".", $breaks);
                }
            }
            else{
                if( ($epic_key == $key) && ($epic_value == $value) ){
                    $basepath = $basepath . "." . $epic_key;
                    $cnttval = 1;
                }
                else{
                    //Let it continue
                }
            }
            if($cnttval == 1){
                return true;
            }
            else{
                //Let it continue
            }
        }
        return false;
    }

/*
** Custom Page Title
*/
function countdown_title($title){
	$cnt_title = $title;
	if ( is_home() && !is_front_page() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_front_page() ){
		$cnt_title .=  get_bloginfo('name');
		$cnt_title .= ' | '; 
		$cnt_title .= get_bloginfo('description');
	}
	if ( is_search() ) {
		$cnt_title .=  get_bloginfo('name');
	}
	if ( is_author() ) { 
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_single() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_page() && !is_front_page() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_category() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_year() ) { 
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_month() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if ( is_day() ) {
		$cnt_title .= get_bloginfo('name');
	}
	if (function_exists('is_tag')) { 
		if ( is_tag() ) {
			$cnt_title .= get_bloginfo('name');
		}
		if ( is_404() ) {
			$cnt_title .= get_bloginfo('name');
		}					
	}
	return $cnt_title;
}
add_filter( 'wp_title', 'countdown_title' );

 /* custom post type News */

function media_and_events_post_type() {
    register_post_type( 'media_and_events',
      array(
        'taxonomies'  => array('media_events_cat' ),
        'labels' => array(
          'name' => __( 'Media and Events' ),
          'singular_name' => __( 'Media and Event' )
        ),
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'media_and_events' ),
        'exclude_from_search' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'media_events_cat' ),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'query_var' => true
      )
    );
  }
  add_action( 'init', 'media_and_events_post_type' );

  function media_and_events_init() {
    register_taxonomy(
      'media_events_cat',
      'media_and_events',
      array(
        'label' => __( 'Media and Events Category' ),
         'sort' => true,
              'hierarchical' => true,
        'name' => __( 'Media and Events Category' ),
        'rewrite' => array( 'slug' => 'media_events_cat' ),
        'supports' => array( 'developer', 'when developed', 'media_events_cat' ),
      )
    );
  }
 add_action( 'init', 'media_and_events_init' );
// shortcode to show latest post
function show_latest_news_fun(){
	$rtn_str='';
	$args = array(
			'post_type' => 'media_and_events',
			'posts_per_page'=>3,
			'tax_query' => array(
			    array(
			    'taxonomy' => 'media_events_cat',
			    'field' => 'id',
			    'terms' => 4
			     )
			  )
			);
	$the_queryy = new WP_Query( $args );
	if ( $the_queryy->have_posts() ) {
		$rtn_str.='<ul class="latest-news arrow-before">';
		while ( $the_queryy->have_posts() ) {
			$the_queryy->the_post();
				$rtn_str.='<li><a href="'.get_permalink(get_the_ID()).'">'.get_the_title().'</a></li>';
					
		}
		$rtn_str.='</ul>';
	}
	return $rtn_str;
}
add_shortcode('show_latest_news','show_latest_news_fun');