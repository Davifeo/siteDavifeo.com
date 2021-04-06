<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'section_themecolors' => array(
		'title' => esc_html__('Theme colors', 'flox'),
		'options' => array(	

			'darktheme-status' => array(
				'type'  => 'switch',
				'value' => 'no',
				'label' => esc_html__('Apply dark theme?', 'flox'),
				'attr'  => array( 'class' => 'fw-frm-inline'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'flox'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'flox'),
				),
			),

			'popup-theme-colors' => array(
				'type' => 'popup',
				'label' => esc_html__('Theme colors', 'flox'),
				'popup-title' => esc_html__('Customization', 'flox'),
				'attr'  => array( 'class' => 'fw-frm-inline'),
				'button' => esc_html__('Edit', 'flox'),
				'popup-title' => null,
				'size' => 'small', // small, medium, large
				'popup-options' => array(
					'theme-skins' => array(
						'type'  => 'select',
						'label' => esc_html__('Color themes', 'flox'),
						'desc'  => esc_html__('Changing theme will reset your selected colors', 'flox'),
						'choices' => array(
							'reset' => esc_html__('Select pre-define themes', 'flox'),
							'default' => esc_html__('Default theme', 'flox'),
							'dark' => esc_html__('Dark theme', 'flox'),
							'theme1' => esc_html__('Color theme 1', 'flox'),
							'theme2' => esc_html__('Color theme 2', 'flox'),
							'theme3' => esc_html__('Color theme 3', 'flox'),
							'theme4' => esc_html__('Color theme 4', 'flox'),
						),
					),
					'theme-default' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Default', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'theme-primary' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Primary', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'theme-dark' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Dark', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'theme-light' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Light', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'theme-lighten' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Lighten', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'theme-basefontcolor' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Body font', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'theme-white' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('White', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
				),
			),
			
			'body-bg' => array(
				'type' => 'popup',
				'label' => esc_html__('Body background', 'flox'),
				'popup-title' => esc_html__('Customization', 'flox'),
				'attr'  => array( 'class' => 'fw-frm-inline'),
				'button' => esc_html__('Edit', 'flox'),
				'popup-title' => null,
				'size' => 'small', // small, medium, large
				'popup-options' => array(
					fw()->theme->get_options( 'common-options-bg' ),
				),
			),

			'page-bg' => array(
				'type' => 'popup',
				'label' => esc_html__('Page background', 'flox'),
				'popup-title' => esc_html__('Customization', 'flox'),
				'attr'  => array( 'class' => 'fw-frm-inline'),
				'button' => esc_html__('Edit', 'flox'),
				'popup-title' => null,
				'size' => 'small', // small, medium, large
				'popup-options' => array(

					'bg' => array(
						'type'  => 'ckav-color-picker',
						'label' => esc_html__('Page background', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'shadow-color' => array(
						'type'  => 'ckav-color-picker',
						'value' => 'rgba(0, 0, 0, 0.3)',
						'label' => esc_html__('Page shadow', 'flox'),
						'attr'  => array( 'class' => 'fw-frm-inline'),
					),
					'size' => array(
						'label' => esc_html__('Shadow size', 'flox'),
						'type'  => 'slider',
						'value' => 60,
						'properties' => array(
							'min' => 0,
							'max' => 150,
							'step' => 1, 
						),
					),
					'offset' => array(
						'label' => esc_html__('Shadow offset', 'flox'),
						'type'  => 'slider',
						'value' => 10,
						'properties' => array(
							'min' => 0,
							'max' => 150,
							'step' => 1, 
						),
					),
				),
			),

		),
	),
);