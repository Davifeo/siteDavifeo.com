<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'copyright'  => array(
        'type'  => 'text',
        'label' => esc_html__( 'Copyright text', 'flox' ),
        'value' => esc_html__( 'C.Kav.Art', 'flox' ),
    ),
);