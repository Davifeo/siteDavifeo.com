<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


if (defined('FW')) :

    function ckav_theme_include_custom_option_types() {
        require_once THEME_DIR . '/inc/includes/option-types/ckav-icon/class-fw-option-type-ckav-icon.php';
        require_once THEME_DIR . '/inc/includes/option-types/ckav-color-picker/class-fw-option-type-ckav-color-picker.php';
    }
    add_action('fw_option_types_init', 'ckav_theme_include_custom_option_types');
    
    
    /**
     * Define ckav icons
     */
    if ( !function_exists( 'ckav_icon_set' ) ) {
    
        function ckav_icon_set($sets) {
            include 'theme-icons.php';
    
            $sets['ckav-icons'] = array(
                'container-class' => 'fa-lg', // some fonts need special wrapper class to display properly
                'groups' => array(
                    'fab' => esc_html__('Font Awesome Brands', 'flox'),
                    'far' => esc_html__('Font Awesome Regular', 'flox'),
                    'fas' => esc_html__('Font Awesome Solid', 'flox'),
                    'pix' => esc_html__('Pixeden Icons', 'flox'),
                    'simpleline' => esc_html__('Simple line icon', 'flox'),
                ),
                'icons' => $ckav_icons
            );
    
            $sets['ckav-social'] = array(
                'container-class' => 'fa-lg', // some fonts need special wrapper class to display properly
                'groups' => array(
                    'fab' => esc_html__('Font Awesome Brands', 'flox'),
                ),
                'icons' => $ckav_social_icons
            );

            $sets['font-awesome']['font-style-src'] = '';
            return $sets;
        }
        add_filter('fw_option_type_icon_sets', 'ckav_icon_set');
    }
    
endif;
    