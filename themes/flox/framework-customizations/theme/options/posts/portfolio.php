<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio-setting' => array(
		'type'     => 'box',
		'title'    => esc_html__('Portfolio settings', 'flox'),
		'priority' => 'high',
		'options'  => array(
            'layout_fullw' => array(
                'type'  => 'switch',
                'value' => 'no',
                'label' => esc_html__('Full width page?', 'flox'),
                'desc'  => esc_html__('Support full width for content area which give flexibility to format content. Useful to craete content using elementor.', 'flox'),
                'attr'  => array( 'class' => 'fw-frm-inline'),
                'left-choice' => array(
                    'value' => 'no',
                    'label' => esc_html__('On', 'flox'),
                ),
                'right-choice' => array(
                    'value' => 'yes',
                    'label' => esc_html__('Yes', 'flox'),
                ),
            ),
            
            'year' => array(
                'type' => 'text',
                'label' => esc_html__( 'Year', 'flox' ),
                'desc' => esc_html__( 'Enter year', 'flox' ),
            ),

            'client' => array(
                'type' => 'text',
                'label' => esc_html__( 'Project for', 'flox' ),
                'desc' => esc_html__( 'Enter client name', 'flox' ),
            ),

            'url' => array(
                'type' => 'text',
                'label' => esc_html__( 'Website URL', 'flox' ),
                'desc' => esc_html__( 'Enter URL', 'flox' ),
            ),
		)
	),
	
);