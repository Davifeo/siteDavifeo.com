<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


/* Ddynamic popup case
/******************************/
if (! function_exists ( 'ckav_popup_id' )) {
	function ckav_popup_id($data) {
		return $data;
	}
}

/*
 * Theme option get
 *************************/
if (! function_exists ( 'ckav_theme_option' )) {
	function ckav_theme_option( $type, $option_id, $default = '' ) {
		
		if ( $type == 'post' ) {
			return function_exists ( 'fw_get_db_post_option' ) ? fw_get_db_post_option( get_the_ID(), $option_id ) : $default;
		}
		
		if ( $type == 'setting' ) {
			return function_exists ( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( $option_id ) : $default;
		}

		if ( $type == 'customizer' ) {
			return function_exists ( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( $option_id ) : $default;
		}

	}
}

/*
 * Theme option get
 *************************/
if (! function_exists ( 'ckav_getkey' )) {
	function ckav_getkey( $keys, &$array_or_object, $default_value = null, $keys_delimiter = '/' ) {

		return function_exists ( 'fw_akg' ) ? fw_akg( $keys, $array_or_object, $default_value, $keys_delimiter ) : '';

	}
}

/*
 * Elementor attributes 
 *************************/
if (! function_exists ( 'ckav_render_attr' )) {
	
	function ckav_render_attr( array $attributes ) {

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'elementor_admin_notice_missing_main_plugin' ] );
			return;
		} else {
			return \Elementor\Utils::render_html_attributes( $attributes );
		}
	}
}

function elementor_admin_notice_missing_main_plugin() {

	if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

	$message = sprintf(
		/* translators: 1: Plugin name 2: Elementor */
		esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'flox' ),
		'<strong>' . esc_html__( 'Elementor Test Extension', 'flox' ) . '</strong>',
		'<strong>' . esc_html__( 'Elementor', 'flox' ) . '</strong>'
	);

	printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

}


/*
 * Esc HTML
 * 
 * WP Kses Allowed HTML Tags Array in function
 * Use: ckav_esc( $html );
 * 
 *************************/
if (! function_exists ( 'ckav_esc' )) {
	function ckav_esc( $html ) {
		if ( function_exists( 'wp_kses' ) ) { // WP is here
			$html_str = wp_kses( $html, ckav_basic_allowed_html() );
		} else {
			$html_str = $html;
		}
		return $html_str;
	}

	function ckav_basic_allowed_html() {

		$allowed_tags = array(
			'a' => array(
				'class' => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
			),
			'abbr' => array(
				'title' => array(),
			),
			'b' => array(
				'class' => array(),
				'style' => array(),
			),
			'i' => array(
				'class' => array(),
				'style' => array(),
			),
			'blockquote' => array(
				'cite'  => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'code' => array(),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(
				'class' => array(),
				'style' => array(),
			),
			'h2' =>  array(
				'class' => array(),
				'style' => array(),
			),
			'h3' =>  array(
				'class' => array(),
				'style' => array(),
			),
			'h4' =>  array(
				'class' => array(),
				'style' => array(),
			),
			'h5' =>  array(
				'class' => array(),
				'style' => array(),
			),
			'h6' =>  array(
				'class' => array(),
				'style' => array(),
			),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
				'style' => array(),
			),
			'br' => array(
				'class' => array(),
				'style' => array(),
			),
			'hr' => array(
				'class' => array(),
				'style' => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
				'style' => array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'div' => array(
				'class' => array(),
				'style' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'strike' => array(),
			'strong' => array(
				'class' => array(),
				'style' => array(),
			),
			'ul' => array(
				'class' => array(),
				'style' => array(),
			),
		);
		
		return $allowed_tags;
	}
}

/* Image resize
/******************************/
if ( !function_exists( 'ckav_imgresize' ) ) {

	function ckav_imgresize( $url, $width = false, $height = false, $crop = false ) {
		if ( function_exists( 'fw_resize' ) ) {
			$fw_resize	 = FW_Resize::getInstance();
			$response	 = $fw_resize->process( $url, $width, $height, $crop );
			return (!is_wp_error( $response ) && !empty( $response[ 'src' ] ) ) ? $response[ 'src' ] : $url;
		} else {
			if ( !empty( $url ) ) {
				return $url;
			}
		}
	}

}

/* Body classes
/******************************/
function ckav_body_classes( $classes ) {
	
	if (ckav_theme_option( 'customizer', 'theme-layout' ) == 'layout-1') {
		$classes[] = 'layout-1';
	} elseif (ckav_theme_option( 'customizer', 'theme-layout' ) == 'layout-2') {
		$classes[] = 'layout-2';
	} elseif (ckav_theme_option( 'customizer', 'theme-layout' ) == 'layout-3') {
		$classes[] = 'layout-2 sub-layout-1';
	} else {
		$classes[] = 'layout-1'	;
	} 
    return $classes;
}
add_filter( 'body_class','ckav_body_classes' );


/* Image resize
/******************************/
if ( !function_exists( 'ckav_resetoptions' ) ) {
	function ckav_resetoptions() {
		remove_theme_mod('fw_options');
	}
}