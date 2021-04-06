<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'blogpost-desc' => array(
        'type'  => 'switch',
        'value' => 'yes',
        'label' => esc_html__('Show description?', 'flox'),
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

    'blogpost-cat' => array(
        'type'  => 'switch',
        'value' => 'yes',
        'label' => esc_html__('Show category?', 'flox'),
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

    'bloggrid-col' => array(
        'type'  => 'select',
        'label' => esc_html__('Blog post grid', 'flox'),
        'attr'  => array( 'class' => 'fw-frm-inline'),
        'value' => '3',
        'choices' => array(
            '1' => esc_html__('1', 'flox'),
            '2' => esc_html__('2', 'flox'),
            '3' => esc_html__('3', 'flox'),
        ),
    ),

    'bloggrid-gt' => array(
        'type'  => 'select',
        'label' => esc_html__('Grid gutter', 'flox'),
        'attr'  => array( 'class' => 'fw-frm-inline'),
        'value' => 'gt30 mb30',
        'choices' => array(
            'gt0 mb0' => esc_html('0', 'flox'),
            'gt1 mb1' => esc_html('1', 'flox'),
            'gt10 mb10' => esc_html('10', 'flox'),
            'gt20 mb20' => esc_html('20', 'flox'),
            'gt30 mb30' => esc_html('30', 'flox'),
            'gt40 mb40' => esc_html('40', 'flox'),
            'gt50 mb50' => esc_html('50', 'flox'),
            'gt60 mb60' => esc_html('60', 'flox'),
        ),
    ),

);