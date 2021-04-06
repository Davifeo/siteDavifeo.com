<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/* Theme specific icons for elementor
/******************************/
add_filter( 'elementor/icons_manager/additional_tabs', function(){
	return [
		'simple-line-icons' => [
			'name' => 'simple-line-icons',
			'label' => esc_html__( 'Simple line icons', 'flox' ),
			'url' => THEME_ICONS . 'simple-line-icons.css',
			'enqueue' => [ THEME_ICONS . 'simple-line-icons.css' ],
			'prefix' => 'icon-',
			'displayPrefix' => 'icon',
			'labelIcon' => 'icon-plane',
			'ver' => '1.0',
			'fetchJson' => THEME_ICONS . 'simple-line-icons.json',
			'native' => true,
		],

		'pixeden-icons' => [
			'name' => 'pixeden-icons',
			'label' => esc_html__( 'Pixeden icons', 'flox' ),
			'url' => THEME_ICONS . 'pe-icon-7-stroke.css',
			'enqueue' => [ THEME_ICONS . 'pe-icon-7-stroke.css' ],
			'prefix' => 'pe-7s-',
			'displayPrefix' => 'pe-7s',
			'labelIcon' => 'pe-7s-rocket',
			'ver' => '1.0',
			'fetchJson' => THEME_ICONS . 'pe-icon-7-stroke.json',
			'native' => true,
		]
	];
});