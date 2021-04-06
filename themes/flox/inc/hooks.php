<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


/*
 * Theme setup
 *************************/
if ( ! function_exists( 'ckav_action_theme_setup' ) ) :
	function ckav_action_theme_setup() {

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'css/editor-style.css' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		// Make Theme available for translation.
		load_theme_textdomain( 'flox', get_template_directory() . '/languages' );
		
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for Title Tag
		add_theme_support( 'title-tag' );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
		* Enable support for Post Formats.
		* See http://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'gallery',
			'quote',
			'link',
			'video',
			'audio',
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
endif;
add_action( 'init', 'ckav_action_theme_setup' );



/*
 * Adjust content_width value for image attachment template.
 *************************/
function ckav_action_theme_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'ckav_action_theme_content_width' );



/*
 * Register widget areas.
 *************************/
function ckav_action_theme_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sticky sidebar', 'flox' ),
		'id'            => 'sticky-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title content-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ckav_action_theme_widgets_init' );



/*
 * Fome errors in admin
 *************************/
if ( defined( 'FW' ) ):
	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'ckav_action_theme_display_form_errors' ) ):
		function ckav_action_theme_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'fw-theme-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'fw-theme-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action('wp_enqueue_scripts', 'ckav_action_theme_display_form_errors');
endif;
