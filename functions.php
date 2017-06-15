<?php

// Load jQuery and Scripts
add_action( 'wp_enqueue_scripts', 'load_scripts' );
function load_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array('jquery'));
	wp_enqueue_script('swipe', get_template_directory_uri() . '/js/jquery.cycle2.swipe.min.js', array('jquery'));
	wp_enqueue_script('slimscroll', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array('jquery'));
}

// Title
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
		return $title;
	}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

// Register Post Type: Slides
add_action( 'init', 'register_cpt_slide' );
function register_cpt_slide() {
    $labels = array( 
        'name' => _x( 'Home Page Slider', 'slide' ),
        'singular_name' => _x( 'Slide', 'slide' ),
        'add_new' => _x( 'Add New', 'slide' ),
        'add_new_item' => _x( 'Add New Slide', 'slide' ),
        'edit_item' => _x( 'Edit Slide', 'slide' ),
        'new_item' => _x( 'New Slide', 'slide' ),
        'view_item' => _x( 'View Slide', 'slide' ),
        'search_items' => _x( 'Search slides', 'slide' ),
        'not_found' => _x( 'No slides found', 'slide' ),
        'not_found_in_trash' => _x( 'No slides found in Trash', 'slide' ),
        'parent_item_colon' => _x( 'Parent Slide:', 'slide' ),
        'menu_name' => _x( 'Home Page Slider', 'slide' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'slide', $args );
}

// Register Post Type: Agents
add_action( 'init', 'register_cpt_agents' );
function register_cpt_agents() {
    $labels = array( 
        'name' => _x( 'Agents', 'agent' ),
        'singular_name' => _x( 'Agent', 'agent' ),
        'add_new' => _x( 'Add New', 'agent' ),
        'add_new_item' => _x( 'Add New Agent', 'agent' ),
        'edit_item' => _x( 'Edit Agent', 'agent' ),
        'new_item' => _x( 'New Agent', 'agent' ),
        'view_item' => _x( 'View Agent', 'agent' ),
        'search_items' => _x( 'Search agents', 'agent' ),
        'not_found' => _x( 'No agents found', 'agent' ),
        'not_found_in_trash' => _x( 'No agents found in Trash', 'agent' ),
        'parent_item_colon' => _x( 'Parent Agent:', 'agent' ),
        'menu_name' => _x( 'Agents', 'agent' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-businessman',
        'menu_position' => 20,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'agent', $args );
}

?>