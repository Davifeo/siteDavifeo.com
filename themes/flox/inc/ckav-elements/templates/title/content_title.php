<?php namespace Elementor;

// All button attributes 
$this->add_render_attribute(
    'title_attr', [
        'class' => [ 
            'content-title',
            $settings['size'] ? $settings['size'] : 'medium',
            $settings['upper'] == 'yes' ? 'txt-upper' : null,
        ]
    ]
);
?>


<h3 <?php echo ckav_render_attr( $this->get_render_attributes('title_attr') ); ?>><?php echo ckav_esc( $settings['title_text'] ); ?></h3>