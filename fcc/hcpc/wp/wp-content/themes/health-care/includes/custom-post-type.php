<?php 
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

  /* custom post type Professions */

function professions_post_type() {
    register_post_type( 'profession',
      array(
        'taxonomies'  => array('profession_cat' ),
        'labels' => array(
          'name' => __( 'Professions' ),
          'singular_name' => __( 'Profession' )
        ),
        'public' => true,
        'has_archive' => true,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'profession' ),
        'exclude_from_search' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'profession_cat' ),
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'query_var' => true
      )
    );
  }
  add_action( 'init', 'professions_post_type' );

  function professions_init() {
    register_taxonomy(
      'profession_cat',
      'profession',
      array(
        'label' => __( 'Professions Category' ),
         'sort' => true,
              'hierarchical' => true,
        'name' => __( 'Professions Category' ),
        'rewrite' => array( 'slug' => 'profession_cat' ),
        'supports' => array( 'developer', 'when developed', 'profession_cat' ),
      )
    );
  }
 add_action( 'init', 'professions_init' );
?>