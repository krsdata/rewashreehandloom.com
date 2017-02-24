<?php
/**
 * Renovation functions and definitions
 *
 * @package Renovation
 */

if ( ! function_exists( 'infinity_base_encode' ) ) {
	function infinity_base_encode( $data ) {
		return $data;
	}
}

if ( ! function_exists( 'infinity_base_decode' ) ) {
	function infinity_base_decode( $data ) {
		return $data;
	}
}

if ( ! function_exists( 'infinity_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 * ===========================================================================
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function infinity_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Renovation, use a find and replace
		 * to change 'infinity' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'infinity', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'post-thumb', 850, 500, true );
		add_image_size( 'small-thumb', 60, 40, true );
		add_image_size( 'medium-thumb', 370, 220, true );
		add_image_size( 'project-single', 1170, 600, true );
		add_image_size( 'project-archive', 600, 400, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'infinity' )
		) );

		$header_type = Kirki::get_option( 'infinity', 'header_type' );

		if ( 'header03' != $header_type ) {
			register_nav_menus( array(
				'top-right' => esc_html__( 'Top Right Menu', 'infinity' ),
			) );
		}

		if ( 'header01' == $header_type ) {
			register_nav_menus( array(
				'top-left' => esc_html__( 'Top Left Menu', 'infinity' ),
			) );
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'infinity_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		// Support woocommerce
		add_theme_support( 'woocommerce' );
	}
endif; // infinity_setup
add_action( 'after_setup_theme', 'infinity_setup' );

/**
 * Define Constants
 * ================
 */
define( 'TM_RENOVATION_PATH', get_template_directory() );
define( 'THEME_ROOT', esc_url( get_template_directory_uri() ) );
define( 'THEME_DIR', 'infinity' );
define( 'THEME_NAME', wp_get_theme()->get( 'Name' ) );
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * ===========================================================================
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

/**
 * Register widget area.
 * ====================
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function infinity_widgets_init() {
	// Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'infinity' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Top left widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Top Left Widget Area', 'infinity' ),
		'id'            => 'top-left-widget',
		'description'   => esc_html__( 'Only available for Header Type 03', 'infinity' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Header Right
	register_sidebar( array(
		'name'          => esc_html__( 'Header Right', 'infinity' ),
		'id'            => 'header-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget header-right %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Sidebar for shop
	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar for shop', 'infinity' ),
			'id'            => 'sidebar-shop',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	// Footer 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1 Widget Area', 'infinity' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Footer 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2 Widget Area', 'infinity' ),
		'id'            => 'footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	// Footer 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3 Widget Area', 'infinity' ),
		'id'            => 'footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
}

add_action( 'widgets_init', 'infinity_widgets_init' );

/**
 * Enqueue scripts and styles.
 * ==========================
 */
function infinity_scripts() {
	wp_enqueue_style( 'infinity-style', THEME_ROOT . '/style.css' );
	wp_enqueue_style( 'infinity-main', THEME_ROOT . '/css/main.css' );
	wp_enqueue_style( 'infinity-font-awesome', THEME_ROOT . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'thememove-font-pe-icon-7-stroke', THEME_ROOT . '/css/pe-icon-7-stroke.css' );
	wp_enqueue_style( 'thememove-font-renovation-icon', THEME_ROOT . '/css/renovation.css' );

	if ( Kirki::get_option( 'infinity', 'nav_sticky_enable' ) == 1 ) {
		wp_enqueue_script( 'infinity-js-head-room-jquery', THEME_ROOT . '/js/jQuery.headroom.min.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'infinity-js-head-room', THEME_ROOT . '/js/headroom.min.js', array( 'jquery' ), THEME_VERSION, true );
	}
	wp_enqueue_script( 'infinity-js-snap', THEME_ROOT . '/js/snap.min.js', array(), THEME_VERSION, true );
	wp_enqueue_script( 'infinity-js-owl-carousel', THEME_ROOT . '/js/owl.carousel.min.js', array( 'jquery' ), THEME_VERSION, true );
	wp_enqueue_script( 'thememove-js-stellar', THEME_ROOT . '/js/jquery.stellar.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'thememove-js-magnific', THEME_ROOT . '/js/jquery.magnific-popup.min.js' );
	wp_enqueue_script( 'infinity-js-main', THEME_ROOT . '/js/main.js', array( 'jquery' ), THEME_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_rtl() ) {
		wp_enqueue_style( 'infinity-style-rtl', THEME_ROOT . '/css/rtl.css' );
	}
}

add_action( 'wp_enqueue_scripts', 'infinity_scripts' );

/**
 * Setup custom css.
 * ================
 */
function custom_css() {
	$custom_css = Kirki::get_option( 'infinity', 'custom_css' );
	if ( Kirki::get_option( 'infinity', 'custom_css_enable' ) == 1 ) {
		wp_add_inline_style( 'infinity-main', html_entity_decode( $custom_css, ENT_QUOTES ) );
	}
}

add_action( 'wp_enqueue_scripts', 'custom_css' );

/**
 * For live customize in Custom code >> Custom CSS
 */
function infinity_inline_live_css() {
	echo '<style id="infinity-inline-live-css" type="text/css"></style>';
}

add_action( 'wp_head', 'infinity_inline_live_css' );

/**
 * Inline CSS
 */
function infinity_inline_css() {
	echo '<style id="tm-renovation-inline-css" type="text/css"></style>';
}

add_action( 'wp_head', 'infinity_inline_css' );

/**
 * Implement other setup.
 * ======================
 */
// Load core
require_once TM_RENOVATION_PATH . '/core/initial.php';
require_once TM_RENOVATION_PATH . '/inc/customizer/customizer.php';
require_once TM_RENOVATION_PATH . '/inc/oneclick.php';

// Load tmg
require_once TM_RENOVATION_PATH . '/inc/tgm-plugin-activation.php';
require_once TM_RENOVATION_PATH . '/inc/tgm-plugin-registration.php';

// Load metabox
require_once TM_RENOVATION_PATH . '/inc/meta-box.php';

// Load custom js
require_once TM_RENOVATION_PATH . '/inc/custom-js.php';

// Load custom header
require_once TM_RENOVATION_PATH . '/inc/custom-header.php';

// Custom template tags for this theme.
require_once TM_RENOVATION_PATH . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require_once TM_RENOVATION_PATH . '/inc/extras.php';

// Load Jetpack compatibility file.
require_once TM_RENOVATION_PATH . '/inc/jetpack.php';

// Support shortcode in widget
add_filter( 'widget_text', 'do_shortcode' );

// Extend VC
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {
	function infinity_requireVcExtend() {
		require_once get_template_directory() . '/inc/vc-extend.php';
	}

	add_action( 'init', 'infinity_requireVcExtend', 2 );
}

/**
 * Projects Setup
 */
// Remove admin notification of Projects
if ( class_exists( 'Projects_Admin' ) ) {
	global $projects;
	remove_action( 'admin_notices', array( $projects->admin, 'configuration_admin_notice' ) );
}

//remove default style
add_filter( 'projects_enqueue_styles', '__return_false' );

// switch to 3 columns
add_filter( 'projects_loop_columns', 'infinity_project_loop_columns' );
if ( ! function_exists( 'infinity_project_loop_columns' ) ) {
	function infinity_project_loop_columns() {
		return 3; // 3 projects per row
	}
}

/**
 * Woocommerce Setup
 * =================
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Switch to 3 columns
add_filter( 'loop_shop_columns', 'infinity_product_loop_columns' );
if ( ! function_exists( 'infinity_product_loop_columns' ) ) {
	function infinity_product_loop_columns() {
		return 3; // 3 products per row
	}
}

// Three related products
add_filter( 'woocommerce_output_related_products_args', 'infinity_related_products_args' );
function infinity_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns']        = 3; // arranged in 3 columns
	return $args;
}