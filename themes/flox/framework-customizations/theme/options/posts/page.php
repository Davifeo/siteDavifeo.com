<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'page-setting' => array(
		'type'     => 'box',
		'title'    => esc_html__('Page settings', 'flox'),
		'priority' => 'high',
		'options'  => array(
            'footer-status' => array(
                'type'  => 'switch',
                'value' => 'yes',
                'label' => esc_html__('Show footer?', 'flox'),
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
		)
	),
	
);