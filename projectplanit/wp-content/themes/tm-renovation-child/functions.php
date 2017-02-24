<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
        
if ( !function_exists( 'renovation_enqueue_scripts' ) ):
    function renovation_enqueue_scripts() {
        wp_enqueue_style( 'renovation-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'renovation_enqueue_scripts' );

// END ENQUEUE PARENT ACTION
