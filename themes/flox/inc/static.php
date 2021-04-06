<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

if ( is_admin() ) {
	return;
}

/*
 * Default scripts
 *************************/
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

/*
 * Theme CSS files
 *************************/
wp_enqueue_style('ckav-gfonts', "//fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap", array(), '1.0');

if (ckav_theme_fonts()) {
	wp_enqueue_style('ckav-gfonts-custom', ckav_theme_fonts(), array(), '1.0');
}

// FONT-ICONS
wp_enqueue_style('pixeden-icon', THEME_ICONS . "pe-icon-7-stroke.css", array(), '1.0');
wp_enqueue_style('simplelineicons-icon', THEME_ICONS . "simple-line-icons.css", array(), '1.0');
wp_enqueue_style('fontawesome-icon', THEME_ICONS . "fontawesome-all.css", array(), '1.0');

// Vendor css
wp_enqueue_style('bootstrap', THEME_ASSETS . "css/bootstrap.min.css", array(), '1.0');
wp_enqueue_style('animate', THEME_ASSETS . "css/animate.css", array(), '1.0');
wp_enqueue_style('owlcarousel', THEME_ASSETS . "css/owl.carousel.css", array(), '1.0');
wp_enqueue_style('magnific-popup', THEME_ASSETS . "css/magnific-popup.css", array(), '1.0');
wp_enqueue_style('simplebar', THEME_ASSETS . "css/simplebar.css", array(), '1.0');
wp_enqueue_style('vegas', THEME_ASSETS . "js/vegas/vegas.min.css", array(), '1.0');
wp_enqueue_style('swiper', THEME_ASSETS . "js/Swiper/css/swiper.min.css", array(), '1.0');

// TEMPLATE
wp_enqueue_style('ckav-wp-core', THEME_ASSETS . "css/wp-core.css", array(), '1.0');
wp_enqueue_style('ckav-ckav-grids', THEME_ASSETS . "css/ckav-grids.css", array(), '1.0');
wp_enqueue_style('ckav-main', THEME_ASSETS . "css/main.css", array(), '1.0');
wp_enqueue_style('ckav-helper', THEME_ASSETS . "css/helper.css", array(), '1.0');

// Dark theme
if (ckav_theme_option( 'customizer', 'darktheme-status') === 'yes') {
	wp_enqueue_style('ckav-darkmain', THEME_ASSETS . "css/dark-main.css", array(), '1.0');	
}

// CUSTOM
wp_enqueue_style('ckav-custom', THEME_ASSETS . "css/custom.css", array(), '1.0');

// Responsive
wp_enqueue_style('ckav-responsive', THEME_ASSETS . "css/responsive.css", array(), '1.0');

/*
 * Theme JS files
 *************************/
// CORE
wp_enqueue_script( 'enquire', THEME_ASSETS . "js/enquire.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'popper', THEME_ASSETS . "js/popper.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'bootstrap', THEME_ASSETS . "js/bootstrap.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'smooth-scroll', THEME_ASSETS . "js/jquery.smooth-scroll.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'owl-carousel', THEME_ASSETS . "js/owl.carousel.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'magnific-popup', THEME_ASSETS . "js/jquery.magnific-popup.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'simplebar', THEME_ASSETS . "js/simplebar.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'imagesloaded', true);
wp_enqueue_script( 'isotope-pkgd', THEME_ASSETS . "js/isotope.pkgd.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'packery-mode', THEME_ASSETS . "js/packery-mode.pkgd.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'vegas', THEME_ASSETS . "js/vegas/vegas.min.js", array('jquery'), "1.0", true);
wp_enqueue_script( 'swiper', THEME_ASSETS . "js/Swiper/js/swiper.min.js", array('jquery'), "1.0", true);

// TEMPLATE
wp_enqueue_script( 'ckav-main', THEME_ASSETS . "js/ckav-main.js", array('jquery'), "1.0", true);
