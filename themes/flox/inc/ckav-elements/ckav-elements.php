<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class CKav_Elements {

	/**
	 * Instance
	 *
	 * @since 1.0
	 * @access private
	 * @static
	 */
	private static $_instance = null;


	public function ckav_elementor_attr( $ele_attr ) {
		
	}

	/**
	 * Register action hooks and filters
	 *
	 * @since 1.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'ckav_editor_enqueue_styles' ) );
		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'ckav_editor_enqueue_styles' ) );

		// Category register
		add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ) );

		// Register controls
		add_action( 'elementor/controls/controls_registered', [ $this, 'register_ckav_controls' ] );

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
		
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @access public
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.0
	 * @access public
	 */
	public function widget_scripts() {
	}
		
	public function ckav_editor_enqueue_styles() {
		wp_enqueue_style('pixeden-icon', THEME_ICONS . "pe-icon-7-stroke.css", array(), THEME_VER);
		wp_enqueue_style('simplelineicons-icon', THEME_ICONS . "simple-line-icons.css", array(), THEME_VER);
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'ckav-elementor', ADMIN_ASSETS  . 'js/elementor.js',array( 'jquery', 'elementor-frontend' ), THEME_VER, true );
	}


	/**
	 * Icon controller
	 *
	 * Load required icons
	 */
	public function register_ckav_controls() {
		require_once( __DIR__ . '/controls/ckav-icon.php');
		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->unregister_control( 'icon' );
		$controls_manager->register_control( 'icon', new Ckav_Icon_Ctrl() );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( THEME_ELE . 'title.php' );
		require_once( THEME_ELE . 'skills.php' );
		require_once( THEME_ELE . 'education.php' );
		require_once( THEME_ELE . 'experience.php' );
		require_once( THEME_ELE . 'pricing.php' );
		require_once( THEME_ELE . 'testimonials.php' );
		require_once( THEME_ELE . 'blogposts.php' );
		require_once( THEME_ELE . 'button.php' );
		require_once( THEME_ELE . 'portfolio.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0
	 * @access public
	 */
	public function register_widgets($widgets_manager) {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		$widgets_manager->register_widget_type( new Elementor\CKav_Title() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Skills() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Education() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Experience() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Pricing() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Testimonials() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Blogposts() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Button() );
		$widgets_manager->register_widget_type( new Elementor\CKav_Portfolio() );
		
	}
	
	public function add_elementor_widget_categories( $elements_manager ){
		$elements_manager->add_category(
			'ckav-pack',
			[
				'title' => esc_html__( 'Ckav Pack', 'flox' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	
}

// Instantiate Class
CKav_Elements::instance();
