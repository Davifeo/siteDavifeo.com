<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

if (defined('FW')) :

/**
 * @param FW_Ext_Backups_Demo[] $demos
 * @return FW_Ext_Backups_Demo[]
 */
function ckav_filter_theme_fw_ext_backups_demos($demos) {
    $demo_content_installer = 'http://flox.c-kav.com/demo-data/';

    $demos_array = array(
        'demo01' => array(
            'title' => esc_html__('Demo 01', 'flox'),
            'screenshot' => esc_url( $demo_content_installer ) . 'demo-screenshots/demo-01.jpg',
            'preview_link' => 'http://flox.c-kav.com/demos/01',
        ),
        'demo02' => array(
            'title' => esc_html__('Demo 02', 'flox'),
            'screenshot' => esc_url( $demo_content_installer ) . 'demo-screenshots/demo-02.jpg',
            'preview_link' => 'http://flox.c-kav.com/demos/02',
        ),
        'demo03' => array(
            'title' => esc_html__('Demo 03', 'flox'),
            'screenshot' => esc_url( $demo_content_installer ) . 'demo-screenshots/demo-03.jpg',
            'preview_link' => 'http://flox.c-kav.com/demos/03',
        ),
        'demo04' => array(
            'title' => esc_html__('Demo 04', 'flox'),
            'screenshot' => esc_url( $demo_content_installer ) . 'demo-screenshots/demo-04.jpg',
            'preview_link' => 'http://flox.c-kav.com/demos/04',
        ),
        'demo05' => array(
            'title' => esc_html__('Demo 05', 'flox'),
            'screenshot' => esc_url( $demo_content_installer ) . 'demo-screenshots/demo-05.jpg',
            'preview_link' => 'http://flox.c-kav.com/demos/05',
        ),
        'demo06' => array(
            'title' => esc_html__('Demo 06', 'flox'),
            'screenshot' => esc_url( $demo_content_installer ) . 'demo-screenshots/demo-06.jpg',
            'preview_link' => 'http://flox.c-kav.com/demos/06',
		),
        
    );

    
    $download_url = esc_url( $demo_content_installer );
    foreach ($demos_array as $id => $data) {
        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
            'url' => $download_url,
            'file_id' => $id,
        ));
        $demo->set_title($data['title']);
        $demo->set_screenshot($data['screenshot']);
        $demo->set_preview_link($data['preview_link']);

        $demos[ $demo->get_id() ] = $demo;

        unset($demo);
    }

    return $demos;
}

add_filter('fw:ext:backups-demo:demos', 'ckav_filter_theme_fw_ext_backups_demos');

endif;