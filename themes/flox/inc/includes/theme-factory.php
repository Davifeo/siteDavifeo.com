<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


/**
 * Get social icons
 ******************************/
if ( ! function_exists( 'ckav_social_profile_data' ) ) :
	function ckav_social_profile_data()
	{
		$social_data = array();
		$social_arr = ckav_theme_option( 'customizer', 'socials' );
		$target = ckav_theme_option( 'customizer', 'sociallink-target' );
		
		if (!empty($social_arr)) {
			foreach ($social_arr as $social) {
				
				$social_type = $social['social_type']['social-type'];
				$social_name = $social['social_name'];

				if ($social_type === 'icon-social') {
					$social_data[] = array(
						'name' => $social_name,
						'type' => ckav_getkey('social_type/social-type', $social),
						'icon' => ckav_getkey('social_type/icon-social/icon_class', $social),
						'url' => $social['social-url'],
						'target' => $target
					);
				}

				if ($social_type === 'upload-icon') {
					$social_data[] = array(
						'name' => $social_name,
						'type' => ckav_getkey('social_type/social-type', $social),
						'icon' => ckav_getkey('social_type/upload-icon/upload-social-icon/url', $social),
						'url' => $social['social-url'],
						'target' => $target
					);
				}
				
			}
		}
		
		return $social_data;
	}
endif;


/**
 * Get css classes from auto-complete form in theme-options
 ******************************/
if ( ! function_exists( 'ckav_css_classes' ) ) :
	function ckav_css_classes($str) {
		if ( !empty($str) ) {
			$cls_data = explode(',', $str);
			$cls_arr = array();
			foreach ($cls_data as $v) {
				if (strpos($v, ':') !== false) {
					$cls_key = explode(':', $v);
					$cls_arr[] = $cls_key[0];
				} else {
					$cls_arr[] = $v;
				}
			}
			$cls_str = implode(' ', $cls_arr);
			return $cls_str;
		} else {
			return null;
		}
	}
endif;


/**
 * Process font CSS using font-data from theme-options
 */
function ckav_font_style($fdata, $weight=true, $style=true)
{

	$font_str = '';
	if (!empty($fdata)) {

		if (!empty($fdata['variation'])) {
			if (ckav_check_str($fdata['variation'], '00') && ckav_check_str($fdata['variation'], 'italic')) {
				$fvari = str_replace('italic', '', $fdata['variation']);
			}
			if (ckav_check_str($fdata['variation'], '00') && ckav_check_str($fdata['variation'], 'italic') == false ) {
				$fvari = $fdata['variation'];
			}
			if (ckav_check_str($fdata['variation'], 'regular') ) {
				$fvari = 'normal';
			}
		} else {
			$fvari = 'normal';
		}

		if (!empty($fdata['variation']) && ckav_check_str($fdata['variation'], 'italic')) {
			$fstyle = 'italic';
		} elseif ( !empty($fdata['style']) ) {
			$fstyle = $fdata['style'];
		} else {
			$fstyle = 'normal';
		}
		
		if ( !empty($fdata['variation']) ) {
			$fweight = $fvari;
		} elseif( !empty($fdata['weight']) ) {
			$fweight = $fdata['weight'];
		} else {
			$fweight = 'normal';
		}
		

		$font_str .= !empty($fdata['family']) ? 'font-family: '.$fdata['family'].';' : '';
		$font_str .= !empty($fdata['size']) ? 'font-size: '.$fdata['size'].'px;' : '';
		$font_str .= $weight ? 'font-weight: '.$fweight.';' : '';
		$font_str .= $style ? 'font-style: '.$fstyle.';' : '';
		$font_str .= !empty($fdata['line-height']) ? 'line-height: '.$fdata['line-height'].';' : '';
		$font_str .= !empty($fdata['color']) ? 'color: '.$fdata['color'].';' : '';
		$font_str .= !empty($fdata['letter-spacing']) ? 'letter-spacing: '.$fdata['letter-spacing'].'px;' : '';
	}
	return $font_str;
}

/**
 * Render CSS
 ******************************/
if ( defined( 'FW' ) ) :

	if ( ! function_exists( 'ckav_render_theme_skin' ) ) :
		function ckav_render_theme_skin() {
			ob_start();
			get_template_part( 'inc/templates/theme-skin' );
			$css = ob_get_clean();
			return $css;
		}
	endif;
endif;

/**
 * Custom code in header and footer area
 ****************************************/
if( !function_exists('_action_ckav_theme_add_custom_code') ) {
	function _action_ckav_theme_add_custom_code()
	{
		$ckav_custom_code_str  = '';
		$ckav_custom_code_str .= function_exists('ckav_render_theme_skin') ? ckav_render_theme_skin() : '';
		$ckav_custom_code_str .= ckav_theme_option( 'setting', 'custom-css' );
		
		if(!empty($ckav_custom_code_str)){
            wp_add_inline_style( 'ckav-custom', $ckav_custom_code_str );
		}
	}
	add_action( 'wp_enqueue_scripts', '_action_ckav_theme_add_custom_code', 90 );
}

if(!function_exists('_action_ckav_theme_add_custom_js')) {
	function _action_ckav_theme_add_custom_js()
	{
		$ckav_custom_code_str  = '';
		$ckav_custom_code_str .= ckav_theme_option( 'customizer', 'custom-js');
		
		if(!empty($ckav_custom_code_str)){
            wp_add_inline_script( 'ckav-main', $ckav_custom_code_str, 'after' );
		}
	}
	add_action( 'wp_enqueue_scripts', '_action_ckav_theme_add_custom_js', 90 );
}

add_action('wp_head', function () {
	if( !empty( ckav_theme_option( 'setting', 'google-analytics' ) ) ){
		echo ckav_theme_option( 'setting', 'google-analytics' );
	}
}, 100);



/**
 * Apply Remote fonts
 ******************************/
if( !function_exists('ckav_theme_fonts') ) {
	function ckav_theme_fonts()
	{
		$include_from_google = array();
		$google_fonts = function_exists('fw_get_google_fonts') ? fw_get_google_fonts() : array();
		$ckav_theme_font_arr = array();

		/*== List of font variables using theme  ===============*/
		$ckav_theme_font_list = array(
			"body-fonts",
			"menu-fonts",
			"general-title-fonts",
			"btn-fonts",
			"page-title-fonts",
			"section-title-fonts",
			"content-title-fonts",
			"sub-title-fonts"
		);
		
		foreach ($ckav_theme_font_list as $key => $value) {
			if ( !empty(ckav_theme_option( 'customizer', $value )) ) {
				$ckav_theme_font_arr[] = ckav_theme_option( 'customizer', $value );
			}
		}
		
		if (!empty($ckav_theme_font_arr)) {
			$google_fonts_links = ckav_remote_font_url($ckav_theme_font_arr);
			return $google_fonts_links;
		} else {
			return false;
		}

	}
}

if (!function_exists('ckav_remote_font_url')) :
	function ckav_remote_font_url($include_from_google)
	{
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		// URL format
		// https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,600|Roboto:400,400i,500&amp;subset=latin-ext

		$fonts = array();
		$subsets = array();
		$default_fonts = array(
			"Arial",
			"Verdana",
			"Trebuchet",
			"Georgia",
			"Times New Roman",
			"Tahoma",
			"Palatino",
			"Helvetica",
			"Calibri",
			"Myriad Pro",
			"Lucida",
			"Arial Black",
			"Gill Sans",
			"Geneva",
			"Impact",
			"Serif"
		);
		$url_full = '';
		$url_start = 'https://fonts.googleapis.com/css?family=';
		$url_end = '';
		$family_str = '';
		$subsets_str = '';

		if (!empty($include_from_google)) {
			foreach ($include_from_google as $font) {
				
				if (ckav_getkey('family', $font)) {
					if (!in_array($font['family'], $default_fonts)) {
						$font_key = str_replace( ' ', '+', $font['family'] );

						if (!isset($fonts[$font_key])) {
							$fonts[$font_key] = array();
						}
						
						if (isset($font['bold'])) {
							if (!in_array( $font['bold'], $font) ) {
								if (!in_array( $font['variation'], $fonts[$font_key] )  && !empty($font['variation']) ) {
									$fonts[$font_key][] = $font['variation'];
								}
							}
						}
						

						if (!in_array( $font['variation'], $fonts[$font_key] ) && !empty($font['variation']) ) {
							$fonts[$font_key][] = $font['variation'];
						}
						
						if (isset($font['bold'])) {
							if (!in_array( $font['bold'], $fonts[$font_key]) && !empty($font['bold']) ) {
								$fonts[$font_key][] = rtrim($font['bold'],",");
							}
						}

						if (!in_array( $font['subset'], $subsets )) {
							$subsets[] = $font['subset'];
						}
					}
				}
			}
		}
		
		
		if (!empty($fonts)) {
			$i = 1;

			foreach ($fonts as $f_key => $f_val) {
				$family_str .= $f_key;
				$family_str .= is_array($f_val) ? ':'.implode(',', $f_val) : '';
				if ($i != sizeof($fonts)) {
					$family_str .= '|';
				}
				$i++;
			}
			$subsets_str = '&amp;subset=' . implode(',', $subsets);
		}

		$url_full = $url_start . $family_str . $subsets_str . $url_end;

		return $url_full;
	}
endif;