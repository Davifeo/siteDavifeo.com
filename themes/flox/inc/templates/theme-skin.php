<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$defaultcolors = array(
	'default' => '#26abff', //'#47A4AA'
	'primary' => '#FF5200',
	'dark' => '#222222',
	'light' => '#c9f3ff', //'#D1F1F3'
	'lighten' => 'rgba(0, 0, 0, 0.035)',
	'basefontcolor' => '#666',
	'white' => '#fff',
);
$darkcolors = array(
	'default' => '#4790ff',
	'primary' => '#FF5200',
	'dark' => '#222222',
	'light' => '#8782fc',
	'lighten' => 'rgba(0, 0, 0, 0.15)',
	'basefontcolor' => 'rgba(255, 255, 255, 0.7)',
	'white' => '#fff',
);

if (ckav_theme_option( 'customizer', 'darktheme-status') === 'yes') {
	$theme_colors = $darkcolors;
} else {
	$theme_colors = $defaultcolors;
}

$theme_default = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-default') !== '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-default') : $theme_colors['default'];
$theme_primary = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-primary') !== '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-primary') : $theme_colors['primary'];
$theme_dark = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-dark') !== '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-dark') : $theme_colors['dark'];
$theme_light = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-light') !== '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-light') : $theme_colors['light'];
$theme_lighten = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-lighten') != '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-lighten') : $theme_colors['lighten'];
$theme_basefontcolor = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-basefontcolor') !== '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-basefontcolor') : $theme_colors['basefontcolor'];
$theme_white = ckav_theme_option( 'customizer', 'popup-theme-colors/theme-white') != '' ? ckav_theme_option( 'customizer', 'popup-theme-colors/theme-white') : $theme_colors['white'];


include 'css-common.php';
include 'css-menu.php';
include 'css-form.php';
include 'css-other.php';
include 'css-elementor.php';
include 'css-blog.php';

if (ckav_theme_option( 'customizer', 'darktheme-status') === 'yes') {
include 'dark-theme.php';
}
