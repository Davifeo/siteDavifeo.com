<?php 
/*
Plugin Name: C.Kav Custom Post Type
Plugin URI: https://themeforest.net/user/C-Kav
Description: C.Kav Custom Post Type
Author: C-Kav
Author URI: http://ckavart.com
Version: 1.0
Text Domain: flox
*/


/* Portfolio post type settings
/******************************/
function ckav_portfolio_posttype()
{
    $labels = array(
        'name'               => __( 'Portfolio', 'flox' ),
        'singular_name'      => __( 'Portfolio', 'flox' ),
        'menu_name'          => __( 'Portfolio', 'flox' ),
        'add_new'            => __( 'Add New', 'flox' ),
        'add_new_item'       => __( 'Add New Portfolio', 'flox' ),
        'new_item'           => __( 'New Portfolio', 'flox' ),
        'edit_item'          => __( 'Edit Portfolio', 'flox' ),
        'view_item'          => __( 'View Portfolio', 'flox' ),
        'all_items'          => __( 'All Portfolio', 'flox' ),
        'search_items'       => __( 'Search Portfolio', 'flox' ),
        'parent_item_colon'  => __( 'Parent Portfolio:', 'flox' ),
        'not_found'          => __( 'No found.', 'flox' ),
        'not_found_in_trash' => __( 'No found in Trash.', 'flox' )
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'has_archive'        => true,
        'menu_position'      => 6,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'   		 => 'dashicons-schedule'
    );
    
    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'ckav_portfolio_posttype' );



/* Portfolio category settings
/******************************/
function ckav_portfolio_taxonomy()
{
    $labels = array(
        'name'              => __( 'Categories', 'flox' ),
        'singular_name'     => __( 'Category', 'flox' ),
        'search_items'      => __( 'Search Category', 'flox' ),
        'all_items'         => __( 'All Category', 'flox' ),
        'parent_item'       => __( 'Parent Category', 'flox' ),
        'parent_item_colon' => __( 'Parent Category', 'flox' ) . ':',
        'edit_item'         => __( 'Edit Category', 'flox' ),
        'update_item'       => __( 'Update Category', 'flox' ),
        'add_new_item'      => __( 'Add New Category', 'flox' ),
        'new_item_name'     => __( 'New Category Name', 'flox' ),
        'menu_name'         => __( 'Category', 'flox' ),
    );
    
    $args = array(
        'public'			=> true,
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'portfolio-category' ),
    );
    
    register_taxonomy( 'portfolio_cat', array( 'portfolio' ), $args );
}

add_action( 'init', 'ckav_portfolio_taxonomy', 0 );


/* To refresh parmalinks 
/******************************/
function ckav_rewrite_flush() {
    ckav_portfolio_posttype();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ckav_rewrite_flush' );