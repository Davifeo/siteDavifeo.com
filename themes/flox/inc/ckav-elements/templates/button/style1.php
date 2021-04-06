<?php namespace Elementor;

// All attributes 
$this->add_render_attribute(
    'btn_attr', [
        'class' => [ 
            'ckav-btn',
            $settings['size'] ? $settings['size'] : '',
            $settings['color'] ? $settings['color'] : 'primary-btn',
            $settings['upper'] == 'yes' ? 'txt-upper' : null,
        ],
        'target' => [
            $settings['url']['is_external'] ? '_blank' : '_self'
        ],
        'href' => [
            $settings['url']['url'] ? esc_url($settings['url']['url']) : '#'
        ]
    ]
); ?>

<a <?php echo ckav_render_attr( $this->get_render_attributes('btn_attr') ); ?>><?php echo esc_html($settings['text']); ?></a>