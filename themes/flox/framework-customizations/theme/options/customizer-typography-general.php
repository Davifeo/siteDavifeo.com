<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'section_typography_general' => array(
		'title' => esc_html__('General typography', 'flox'),
		'options' => array(	

			'body-fonts' => array(
                'label' => esc_html__('Body fonts', 'flox'),
				'desc'  => esc_html__('Select body fonts which is global fonts of theme, Font size must be in PX only', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Merriweather',
					'subset' => 'latin-ext',
					'variation' => 'regular',
					'size' => 14,
					'line-height' => 1.8,
					'letter-spacing' => 0,
					'color' => '#666'
				),
				'components' => array(
					'family'         => true,
					'size'           => true,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => true
				),
			),
			
			'menu-fonts' => array(
				'label' => esc_html__('Menu fonts', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
					'subset' => 'latin-ext',
					'variation' => '600',
					'size' => 16,
					'letter-spacing' => 0,
					'line-height' => 1.3,
				),
				'components' => array(
					'family'         => true,
					'size'           => true,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => false
				),
            ),
            
            'general-title-fonts' => array(
				'label' => esc_html__('General title fonts', 'flox'),
				'desc'  => esc_html__('General title fonts (H1 to H6)', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
					'subset' => 'latin-ext',
					'variation' => '700',
					'letter-spacing' => 0,
					'line-height' => 1.3,
					'color' => '#343e45'
				),
				'components' => array(
					'family'         => true,
					'size'           => false,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => true
				),
            ),
			
			'btn-fonts' => array(
				'label' => esc_html__('Button fonts', 'flox'),
				'desc'  => esc_html__('Global button fonts', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
					'subset' => 'latin-ext',
					'variation' => '700',
					'letter-spacing' => 0,
					'line-height' => 1.3,
				),
				'components' => array(
					'family'         => true,
					'size'           => false,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => false
				),
            ),
            
			'h1-size' => array(
				'label' => esc_html__('H1 - size', 'flox'),
				'type'  => 'slider',
				'value' => 40,
				'properties' => array(
					'min' => 12,
					'max' => 100,
					'step' => 1, 
				),
			),
			'h2-size' => array(
				'label' => esc_html__('H2 - size', 'flox'),
				'type'  => 'slider',
				'value' => 30,
				'properties' => array(
					'min' => 12,
					'max' => 100,
					'step' => 1, 
				),
			),
			'h3-size' => array(
				'label' => esc_html__('H3 - size', 'flox'),
				'type'  => 'slider',
				'value' => 25,
				'properties' => array(
					'min' => 12,
					'max' => 100,
					'step' => 1, 
				),
			),
			'h4-size' => array(
				'label' => esc_html__('H4 - size', 'flox'),
				'type'  => 'slider',
				'value' => 20,
				'properties' => array(
					'min' => 12,
					'max' => 100,
					'step' => 1, 
				),
			),
			'h5-size' => array(
				'label' => esc_html__('H5 - size', 'flox'),
				'type'  => 'slider',
				'value' => 16,
				'properties' => array(
					'min' => 12,
					'max' => 100,
					'step' => 1, 
				),
			),
			'h6-size' => array(
				'label' => esc_html__('H6 - size', 'flox'),
				'type'  => 'slider',
				'value' => 14,
				'properties' => array(
					'min' => 12,
					'max' => 100,
					'step' => 1, 
				),
			),

			

		),
	),
);