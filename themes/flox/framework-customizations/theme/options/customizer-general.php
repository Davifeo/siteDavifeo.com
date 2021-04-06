<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'section_general' => array(
		'title' => esc_html__('General', 'flox'),
		'options' => array(	

			'theme-layout' => array(
                'type'  => 'image-picker',
                'value' => 'layout-1',
                'label' => esc_html__('Theme layout', 'flox'),
                'choices' => array(
                    
                    'layout-1' => array(
                        'small' => array(
                            'src' => ADMIN_IMG .'header-layout-01.png',
                            'height' => 80
                        ),
                    ),
                    
                    'layout-2' => array(
                        'small' => array(
                            'src' => ADMIN_IMG .'header-layout-02.png',
                            'height' => 80
                        ),
                    ),

                    'layout-3' => array(
                        'small' => array(
                            'src' => ADMIN_IMG .'header-layout-03.png',
                            'height' => 80
                        ),
                    ),
                ),
            ),

            'portfolio-page-url'  => array(
                'type'  => 'text',
                'label' => esc_html__( 'Portfolio page URL', 'flox' ),
                'desc'  => esc_html__('This URL apply on portfolio single page grid icon', 'flox'),
            ),
		),
	),
);