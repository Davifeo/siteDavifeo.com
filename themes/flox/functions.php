<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


/*
 * Theme init
 *************************/
require_once get_template_directory() .'/inc/init.php';


/*
 * Plugin Activation
 *************************/
{
	require_once dirname( __FILE__ ) . '/inc/plugin-activation/class-tgm-plugin-activation.php';

	/** @internal */
	function ckav_theme_register_required_plugins() {

		$plugins = array(
			array(
				'name'      => 'Unyson',
				'slug'      => 'unyson',
				'required'  => true,
			),
			array(
				'name'      => 'C.Kav Custom Post Type',
				'slug'      => 'ckav-custom-posttype',
				'source'    => get_parent_theme_file_path( '/inc/plugin-activation/ckav-custom-posttype.zip' ),
				'required'  => true,
			),
			array(
				'name'      => 'C.Kav demo import',
				'slug'      => 'ckav-demo-import',
				'source'    => get_parent_theme_file_path( '/inc/plugin-activation/ckav-demo-import.zip' ),
				'required'  => true,
			),
			array(
				'name'      => 'Contact form 7',
				'slug' 		=> 'contact-form-7',
				'required' 	=> true,
			), 
			array(
				'name'      => 'Elementor',
				'slug' 		=> 'elementor',
				'required' 	=> true,
			),
			array(
				'name'      => 'Advanced Import : One Click Import for WordPress or Theme Demo Data',
				'slug' 		=> 'advanced-import',
				'required' 	=> true,
			),
			
		);

		$config = array(
			'domain'       		=> 'flox',         				// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'flox' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'flox' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'flox' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'flox' ),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'flox' ),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'flox' ),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'flox' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa($plugins, $config);
	}
	add_action( 'tgmpa_register', 'ckav_theme_register_required_plugins' );
}