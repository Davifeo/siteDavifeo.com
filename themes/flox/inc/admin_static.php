<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if ( is_admin() ) {
	wp_enqueue_script('ckav-theme-script', ADMIN_ASSETS . 'js/ckav-script.js', array( 'jquery' ), '1.0' );
	wp_enqueue_style( 'ckav-admin-css', ADMIN_ASSETS . 'css/admin.css' );	
	
	wp_enqueue_style('pixeden-icon', THEME_ICONS . "pe-icon-7-stroke.css", array(), '1.0');
	wp_enqueue_style('simplelineicons-icon', THEME_ICONS . "simple-line-icons.css", array(), '1.0');
	wp_enqueue_style('fontawesome-icon', THEME_ICONS . "fontawesome-all.css", array(), '1.0');
}
