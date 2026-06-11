<?php
/**
 * Dumbiri Cletus functions and definitions
 *
 * @package Dumbiri_Cletus
 */

if ( ! function_exists( 'dumbiri_cletus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function dumbiri_cletus_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dumbiri-cletus' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'dumbiri_cletus_setup' );

/**
 * Enqueue scripts and styles.
 */
function dumbiri_cletus_scripts() {
	wp_enqueue_style( 'dumbiri-cletus-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_style( 'dumbiri-cletus-fonts', 'https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@400;500;600;700;800&display=swap', array(), null );

	wp_enqueue_script( 'dumbiri-cletus-js', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'dumbiri_cletus_scripts' );

/**
 * Register Custom Post Types.
 */
function dumbiri_cletus_register_cpts() {
	// Events CPT
	register_post_type( 'event', array(
		'labels' => array(
			'name' => __( 'Events' ),
			'singular_name' => __( 'Event' ),
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );

	// Library Items CPT
	register_post_type( 'library_item', array(
		'labels' => array(
			'name' => __( 'Library' ),
			'singular_name' => __( 'Library Item' ),
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-book-alt',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );

	// Podcasts CPT
	register_post_type( 'podcast', array(
		'labels' => array(
			'name' => __( 'Podcasts' ),
			'singular_name' => __( 'Podcast' ),
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-microphone',
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'dumbiri_cletus_register_cpts' );

/**
 * Register Custom Taxonomies.
 */
function dumbiri_cletus_register_taxonomies() {
	register_taxonomy( 'library_category', 'library_item', array(
		'label' => __( 'Categories' ),
		'rewrite' => array( 'slug' => 'library-category' ),
		'hierarchical' => true,
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'dumbiri_cletus_register_taxonomies' );
