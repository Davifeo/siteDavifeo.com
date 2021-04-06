<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
    'socials' => array(
        'type' => 'addable-popup',
        'size' => 'medium',
        'label' => esc_html__('Social Links', 'flox'),
        'desc' => esc_html__('Add your social profiles', 'flox'),
        'template' => '{{=social_name}}',
        'popup-options' => array(
            'social_name' => array(
                'label' => esc_html__('Name', 'flox'),
                'desc' => esc_html__('Enter a name which is used as title', 'flox'),
                'type' => 'text',
            ),
            
            'social_type' => array(
                'type' => 'multi-picker',
                'label' => false,
                'desc' => false,
                'picker' => array(
                    'social-type' => array(
                        'label' => esc_html__('Icon', 'flox'),
                        'desc' => esc_html__('Select social icon type', 'flox'),
                        'attr' => array('class' => 'fw-checkbox-float-left'),
                        'type' => 'radio',
                        'value' => 'icon-social',
                        'choices' => array(
                            'icon-social' => esc_html__('Font Awesome', 'flox'),
                            'upload-icon' => esc_html__('Custom Upload', 'flox'),
                        ),
                    ),
                ),

                'choices' => array(
                    'icon-social' => array(
                        'icon_class' => array(
                            'type'  => 'ckav-icon',
                            'label' => '',
                            'desc'  => '',
                            'value' => 'fab fa-facebook',
                            'set' => 'ckav-social',
                        ),
                    ),
                    'upload-icon' => array(
                        'upload-social-icon' => array(
                            'label' => '',
                            'type' => 'upload',
                        )
                    ),
                )
            ),
            'social-url' => array(
                'label' => esc_html__('URL', 'flox'),
                'desc' => esc_html__('Enter your social URL', 'flox'),
                'type' => 'text',
            ),
        ),
    ),
    'sociallink-target' => array(
        'type'  => 'switch',
        'value' => 'yes',
        'label' => esc_html__('Links in new window', 'flox'),
        'desc'  => esc_html__('Enable or disable social media link opening in new window', 'flox'),
        'left-choice' => array(
            'value' => 'no',
            'label' => esc_html__('No', 'flox'),
        ),
        'right-choice' => array(
            'value' => 'yes',
            'label' => esc_html__('Yes', 'flox'),
        ),
    )

);