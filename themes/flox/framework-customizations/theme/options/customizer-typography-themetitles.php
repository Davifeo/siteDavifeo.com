<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'section_typography_theme' => array(
		'title' => esc_html__('Theme Titles', 'flox'),
		'options' => array(	

			'page-title-fonts' => array(
				'label' => esc_html__('Page - Title', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
                    'subset' => 'latin-ext',
                    'size' => 45,
					'variation' => '700',
					'letter-spacing' => 0,
					'line-height' => 1.3,
					'color' => '#222222'
				),
				'components' => array(
					'family'         => true,
					'size'           => true,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => true
				),
			),
			
			'section-title-fonts' => array(
				'label' => esc_html__('Section - Title', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
                    'subset' => 'latin-ext',
                    'size' => 30,
					'variation' => '700',
					'letter-spacing' => 0,
					'line-height' => 1.3,
					'color' => '#222222'
				),
				'components' => array(
					'family'         => true,
					'size'           => true,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => true
				),
			),


			'content-title-fonts' => array(
				'label' => esc_html__('Content - Title', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
                    'subset' => 'latin-ext',
                    'size' => 18,
					'variation' => '700',
					'letter-spacing' => 0,
					'line-height' => 1.3,
					'color' => '#222222'
				),
				'components' => array(
					'family'         => true,
					'size'           => true,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => true
				),
            ),
			

			'sub-title-fonts' => array(
				'label' => esc_html__('Sub - Title', 'flox'),
				'type' => 'typography-v2',
				'value' => array(
					'family' => 'Montserrat',
                    'subset' => 'latin-ext',
                    'size' => 20,
					'variation' => '300',
					'letter-spacing' => 0,
					'line-height' => 1.3,
					'color' => '#222222'
				),
				'components' => array(
					'family'         => true,
					'size'           => true,
					'line-height'    => true,
					'letter-spacing' => true,
					'color'          => true
				),
            ),
		),
	),
);