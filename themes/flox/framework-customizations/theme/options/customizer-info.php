<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'theme-logo' => array(
        'type'  => 'upload',
        'label' => esc_html__('Upload logo image', 'flox'),
        'images_only' => true,
        'attr'  => array( 'class' => 'fw-frm-inline'),
    ),

    'info-img' => array(
        'type'  => 'upload',
        'label' => esc_html__('Upload info image', 'flox'),
        'images_only' => true,
        'attr'  => array( 'class' => 'fw-frm-inline'),
    ),

    'info-title'  => array(
        'type'  => 'text',
        'label' => esc_html__( 'Title', 'flox' ),
    ),
    'info-subtitle'  => array(
        'type'  => 'text',
        'label' => esc_html__( 'Sub title', 'flox' ),
    ),

    'info-section' => array(
        'type' => 'addable-popup',
        'label' => esc_html__('Info content', 'flox'),
        'desc'  => esc_html__('This information display in sidebar popup area', 'flox'),
        'template' => '{{- desc }}',
        'popup-title' => null,
        'size' => 'small', // small, medium, large
        'limit' => 4, // limit the number of popup`s that can be added
        'add-button-text' => esc_html__('Add', 'flox'),
        'sortable' => true,
        'popup-options' => array(
            'desc'  => array(
                'type'  => 'text',
                'label' => esc_html__( 'Description', 'flox' ),
            ),

            'icon' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'picker' => array(
                    'icon-type' => array(
                        'label' => esc_html__('Icon', 'flox'),
                        'desc' => esc_html__('Select icon type', 'flox'),
                        'attr' => array('class' => 'fw-checkbox-float-left'),
                        'type' => 'radio',
                        'value' => 'font-icon',
                        'choices' => array(
                            'font-icon' => esc_html__('Font icon', 'flox'),
                            'custom-icon' => esc_html__('Custom Upload', 'flox'),
                        ),
                    ),
                ),

                'choices' => array(
                    'font-icon' => array(
                        'icon' => array(
                            'type'  => 'ckav-icon',
                            'label' => '',
                            'desc'  => '',
                            'value' => 'fab fa-facebook',
                            'set' => 'ckav-icons',
                        ),
                    ),
                    'custom-icon' => array(
                        'img' => array(
                            'label' => '',
                            'type' => 'upload',
                        )
                    ),
                )
            ),
        ),
    ),

    'info-button' => array(
        'type' => 'popup',
        'label' => esc_html__('Button', 'flox'),
        'popup-title' => esc_html__('Button details', 'flox'),
        'button' => esc_html__('Edit', 'flox'),
        'size' => 'small', // small, medium, large
        'attr'  => array( 'class' => 'fw-frm-inline'),
        'popup-options' => array(
            'btn-text'  => array(
                'type'  => 'text',
                'label' => esc_html__( 'Button text', 'flox' ),
            ),
            'url'  => array(
                'type'  => 'text',
                'label' => esc_html__( 'URL', 'flox' ),
            ),
            'icon' => array(
                'type'  => 'ckav-icon',
                'label' => '',
                'desc'  => '',
                'value' => 'fas fa-download',
                'set' => 'ckav-icons',
            ),
        ),
    )

);