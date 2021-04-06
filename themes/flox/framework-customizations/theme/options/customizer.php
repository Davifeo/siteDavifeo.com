<?php if (!defined('FW')) {
	die('Forbidden');
}
/**
 * Customizer options
 *
 * @var array $options Fill this array with options to generate theme style from frontend Customizer
 */

$options = array(
	'panel_info' => array(
		'title'   => esc_html__('C.Kav - Info section', 'flox'),
		'options' => array(
			fw()->theme->get_options( 'customizer-info' ),
		),
	),

	'panel_footer' => array(
		'title'   => esc_html__('C.Kav - Footer', 'flox'),
		'options' => array(
			fw()->theme->get_options( 'customizer-footer' ),
		),
	),

	'panel_customization' => array(
		'title'   => esc_html__('C.Kav - Theme customization', 'flox'),
		'options' => array(
			fw()->theme->get_options( 'customizer-general' ),
			fw()->theme->get_options( 'customizer-defaultcolors' ),
			fw()->theme->get_options( 'customizer-typography-general' ),
			fw()->theme->get_options( 'customizer-typography-themetitles' ),
		),
	),
	
	'panel_blog' => array(
		'title'   => esc_html__('C.Kav - Blog', 'flox'),
		'options' => array(
			fw()->theme->get_options( 'customizer-blog' ),
		),
	),

	'panel_social' => array(
		'title'   => esc_html__('C.Kav - Social', 'flox'),
		'options' => array(
			fw()->theme->get_options( 'customizer-social' ),
		),
	),

	'custom_js' => array(
		'title'   => esc_html__('C.Kav - Additional JS', 'flox'),
		'options' => array(
			'custom-js' => array(
				'type'  => 'textarea',
				'value' => '',
				'label' => esc_html__('JS code field', 'flox'),
				'desc'  => wp_kses(__('without &lt;script&gt; tags', 'flox'), array(
					'&lt;' => array(),
					'&gt;' => array()
				)),
				'attr'  => array(
					'class'       => 'large-textarea',
					'placeholder' => 'jQuery( document ).ready(function() {  SOME CODE  });',
					'rows'        => 20,
				),
			),
		),
	),
);
