<?php 
/*
Plugin Name: C.Kav demo import
Plugin URI: https://themeforest.net/user/C-Kav
Description: C.Kav demo import
Author: C-Kav
Author URI: http://ckavart.com
Version: 1.0
Text Domain: flox
*/

function ckav_demo_import_lists(){
    $demo_lists = array(
		'demo1' =>array(
			'title' => __( 'Demo 01', 'flox' ),/*Title*/
			'is_pro' => false,/*Is Premium*/
			'type' => 'elementor',/*Optional eg gutentor, elementor or other page builders or type*/
			'author' => __( 'C-Kav', 'flox' ),/*Author Name*/
			//'categories' => array( 'All categories','multipurpose' ),/*Categories*/
			'template_url' => array(
				'content' => plugin_dir_url( __FILE__ ).'demos/demo-01/content.json',/*Full URL Path to content.json*/
				'options' => plugin_dir_url( __FILE__ ).'demos/demo-01/options.json',/*Full URL Path to options.json*/
				'widgets' => plugin_dir_url( __FILE__ ).'demos/demo-01/widgets.json'/*Full URL Path to widgets.json*/
			),
			'screenshot_url' => plugin_dir_url( __FILE__ ).'demos/screenshots/demo-01.jpg?ver=1.6',/*Full URL Path to demo screenshot image*/
			'demo_url' => 'http://flox.c-kav.com/demos/01',/*Full URL Path to Live Demo*/
			/* Recommended plugin for this demo */
			'plugins' => array(
				array(
					'name'      => 'Unyson',
					'slug'      => 'unyson',
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
        	)
		),

		'demo2' =>array(
			'title' => __( 'Demo 02', 'flox' ),/*Title*/
			'is_pro' => false,/*Is Premium*/
			'type' => 'elementor',/*Optional eg gutentor, elementor or other page builders or type*/
			'author' => __( 'C-Kav', 'flox' ),/*Author Name*/
			//'categories' => array( 'All categories','multipurpose' ),/*Categories*/
			'template_url' => array(
				'content' => plugin_dir_url( __FILE__ ).'demos/demo-02/content.json',/*Full URL Path to content.json*/
				'options' => plugin_dir_url( __FILE__ ).'demos/demo-02/options.json',/*Full URL Path to options.json*/
				'widgets' => plugin_dir_url( __FILE__ ).'demos/demo-02/widgets.json'/*Full URL Path to widgets.json*/
			),
			'screenshot_url' => plugin_dir_url( __FILE__ ).'demos/screenshots/demo-02.jpg?ver=1.6',/*Full URL Path to demo screenshot image*/
			'demo_url' => 'http://flox.c-kav.com/demos/02',/*Full URL Path to Live Demo*/
			/* Recommended plugin for this demo */
			'plugins' => array(
				array(
					'name'      => 'Unyson',
					'slug'      => 'unyson',
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
			)
		),


		'demo3' =>array(
			'title' => __( 'Demo 03', 'flox' ),/*Title*/
			'is_pro' => false,/*Is Premium*/
			'type' => 'elementor',/*Optional eg gutentor, elementor or other page builders or type*/
			'author' => __( 'C-Kav', 'flox' ),/*Author Name*/
			//'categories' => array( 'All categories','multipurpose' ),/*Categories*/
			'template_url' => array(
				'content' => plugin_dir_url( __FILE__ ).'demos/demo-03/content.json',/*Full URL Path to content.json*/
				'options' => plugin_dir_url( __FILE__ ).'demos/demo-03/options.json',/*Full URL Path to options.json*/
				'widgets' => plugin_dir_url( __FILE__ ).'demos/demo-03/widgets.json'/*Full URL Path to widgets.json*/
			),
			'screenshot_url' => plugin_dir_url( __FILE__ ).'demos/screenshots/demo-03.jpg?ver=1.6',/*Full URL Path to demo screenshot image*/
			'demo_url' => 'http://flox.c-kav.com/demos/03',/*Full URL Path to Live Demo*/
			/* Recommended plugin for this demo */
			'plugins' => array(
				array(
					'name'      => 'Unyson',
					'slug'      => 'unyson',
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
			)
		),

		'demo4' =>array(
			'title' => __( 'Demo 04', 'flox' ),/*Title*/
			'is_pro' => false,/*Is Premium*/
			'type' => 'elementor',/*Optional eg gutentor, elementor or other page builders or type*/
			'author' => __( 'C-Kav', 'flox' ),/*Author Name*/
			//'categories' => array( 'All categories','multipurpose' ),/*Categories*/
			'template_url' => array(
				'content' => plugin_dir_url( __FILE__ ).'demos/demo-04/content.json',/*Full URL Path to content.json*/
				'options' => plugin_dir_url( __FILE__ ).'demos/demo-04/options.json',/*Full URL Path to options.json*/
				'widgets' => plugin_dir_url( __FILE__ ).'demos/demo-04/widgets.json'/*Full URL Path to widgets.json*/
			),
			'screenshot_url' => plugin_dir_url( __FILE__ ).'demos/screenshots/demo-04.jpg?ver=1.6',/*Full URL Path to demo screenshot image*/
			'demo_url' => 'http://flox.c-kav.com/demos/04',/*Full URL Path to Live Demo*/
			/* Recommended plugin for this demo */
			'plugins' => array(
				array(
					'name'      => 'Unyson',
					'slug'      => 'unyson',
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
			)
		),

		'demo5' =>array(
			'title' => __( 'Demo 05', 'flox' ),/*Title*/
			'is_pro' => false,/*Is Premium*/
			'type' => 'elementor',/*Optional eg gutentor, elementor or other page builders or type*/
			'author' => __( 'C-Kav', 'flox' ),/*Author Name*/
			//'categories' => array( 'All categories','multipurpose' ),/*Categories*/
			'template_url' => array(
				'content' => plugin_dir_url( __FILE__ ).'demos/demo-05/content.json',/*Full URL Path to content.json*/
				'options' => plugin_dir_url( __FILE__ ).'demos/demo-05/options.json',/*Full URL Path to options.json*/
				'widgets' => plugin_dir_url( __FILE__ ).'demos/demo-05/widgets.json'/*Full URL Path to widgets.json*/
			),
			'screenshot_url' => plugin_dir_url( __FILE__ ).'demos/screenshots/demo-05.jpg?ver=1.6',/*Full URL Path to demo screenshot image*/
			'demo_url' => 'http://flox.c-kav.com/demos/05',/*Full URL Path to Live Demo*/
			/* Recommended plugin for this demo */
			'plugins' => array(
				array(
					'name'      => 'Unyson',
					'slug'      => 'unyson',
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
			)
		),

		'demo6' =>array(
			'title' => __( 'Demo 06', 'flox' ),/*Title*/
			'is_pro' => false,/*Is Premium*/
			'type' => 'elementor',/*Optional eg gutentor, elementor or other page builders or type*/
			'author' => __( 'C-Kav', 'flox' ),/*Author Name*/
			//'categories' => array( 'All categories','multipurpose' ),/*Categories*/
			'template_url' => array(
				'content' => plugin_dir_url( __FILE__ ).'demos/demo-06/content.json',/*Full URL Path to content.json*/
				'options' => plugin_dir_url( __FILE__ ).'demos/demo-06/options.json',/*Full URL Path to options.json*/
				'widgets' => plugin_dir_url( __FILE__ ).'demos/demo-06/widgets.json'/*Full URL Path to widgets.json*/
			),
			'screenshot_url' => plugin_dir_url( __FILE__ ).'demos/screenshots/demo-06.jpg?ver=1.6',/*Full URL Path to demo screenshot image*/
			'demo_url' => 'http://flox.c-kav.com/demos/06',/*Full URL Path to Live Demo*/
			/* Recommended plugin for this demo */
			'plugins' => array(
				array(
					'name'      => 'Unyson',
					'slug'      => 'unyson',
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
			)
		),

    );
    return $demo_lists;
}
add_filter('advanced_import_demo_lists','ckav_demo_import_lists');