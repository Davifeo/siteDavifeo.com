<?php 

/* Loader CSS
/******************************/
echo '
.ckav-page-loader {
  background: #fff;
}
.ckav-loader {
  color: #999;
}
';


/* Body bg
/******************************/
echo '
body {
  '.ckav_font_style( ckav_theme_option( "customizer", "body-fonts") ).'
  color: '.$theme_basefontcolor.';
  background-color: '.$theme_light.';
}';


/*
 * Layout
 ********************************/
echo'
.main-contentarea {';
  if ( ckav_theme_option( "customizer", "page-bg/bg") !== '' ) {
  echo 'background-color: '.ckav_theme_option( "customizer", "page-bg/bg").';';
  }
  echo 'box-shadow: 0 '.ckav_theme_option( 'customizer', 'page-bg/offset').'px '.ckav_theme_option( 'customizer', 'page-bg/size').'px 0 '.ckav_theme_option( 'customizer', 'page-bg/shadow-color').';
}

';


/* Background colors
/******************************/
echo '
.default-bg {
  background-color: '.$theme_default.';
}
.primary-bg {
  background-color: '.$theme_primary.';
}
.dark-bg {
  background-color: '.$theme_dark.';
}
.light-bg {
  background-color: '.$theme_light.';
}
.white-bg {
  background-color: '.$theme_white.';
}';


/* General titles
/******************************/
echo '
h1,
h2,
h3,
h4,
h5,
h6 {
  '.ckav_font_style( ckav_theme_option( "customizer", "general-title-fonts") ).'
}

h1 { font-size: '. ckav_theme_option( "customizer", "h1-size") .'px; }
h2 { font-size: '. ckav_theme_option( "customizer", "h2-size") .'px; }
h3 { font-size: '. ckav_theme_option( "customizer", "h3-size") .'px; }
h4 { font-size: '. ckav_theme_option( "customizer", "h4-size") .'px; }
h5 { font-size: '. ckav_theme_option( "customizer", "h5-size") .'px; }
h6 { font-size: '. ckav_theme_option( "customizer", "h6-size") .'px; }

.page-title {
	'.ckav_font_style( ckav_theme_option( "customizer", "page-title-fonts") ).'
}
.section-title {
	'.ckav_font_style( ckav_theme_option( "customizer", "section-title-fonts") ).'
}
.content-title {
	'.ckav_font_style( ckav_theme_option( "customizer", "content-title-fonts") ).'
}
.sub-title {
	'.ckav_font_style( ckav_theme_option( "customizer", "sub-title-fonts") ).'
}

.typo-light h1,
.typo-light h2,
.typo-light h3,
.typo-light h4,
.typo-light h5,
.typo-light h6,
.typo-light p {
  color: '.$theme_white.';
}
.list-1 li::before {
  border-color: '.$theme_default.';
}

/* Pop label
/******************************/
.pop-label {
  background-color: '.$theme_primary.';
  color: '.$theme_white.';
}
.pop-label::after {
  border-top: 6px solid '.$theme_primary.';
}


/* Buttons
/******************************/
filter-wrp .filter-btn,
.paging-navigation .pagination .page-numbers,
.ckav-btn {
	'.ckav_font_style( ckav_theme_option( "customizer", "btn-fonts") ).'
}
/*== Default button ===============*/
.default-btn {
  background-color: '.$theme_default.';
  border-color: '.$theme_default.';
  color: '.$theme_white.';
}
.default-btn:hover,
.default-btn:focus,
.default-btn:active,
.default-btn.active {
  background-color: '.$theme_dark.';
  border-color: '.$theme_dark.';
  color: '.$theme_white.';
}
/*== Primary button ===============*/
.primary-btn {
  background-color: '.$theme_primary.';
  border-color: '.$theme_primary.';
  color: '.$theme_white.';
}
.primary-btn:hover,
.primary-btn:focus,
.primary-btn:active,
.primary-btn.active {
  background-color: '.$theme_dark.';
  border-color: '.$theme_dark.';
  color: '.$theme_white.';
}
/*== Dark button ===============*/
.dark-btn {
  background-color: '.$theme_dark.';
  border-color: '.$theme_dark.';
  color: '.$theme_white.';
}
.dark-btn:hover,
.dark-btn:focus,
.dark-btn:active,
.dark-btn.active {
  background-color: '.$theme_primary.';
  border-color: '.$theme_primary.';
  color: '.$theme_white.';
}
/*== White button ===============*/
.white-btn {
  background-color: '.$theme_white.';
  border-color: '.$theme_white.';
  color: '.$theme_dark.';
}
.white-btn:hover,
.white-btn:focus,
.white-btn:active,
.white-btn.active {
  background-color: '.$theme_dark.';
  border-color: '.$theme_dark.';
  color: '.$theme_white.';
}
.glass.white-btn {
  background-color: transparent;
  border-color: transparent;
}

/*== Tag button ===============*/
.tag-btn {
  border-color: rgba(0, 0, 0, 0.1);
  background-color: rgba(0, 0, 0, 0.02);
}
.tag-btn:hover {
  background-color: '.$theme_dark.';
  color: '.$theme_white.';
}
.tag-btn.light {
  border-color: rgba(255, 255, 255, 0.1);
  background-color: rgba(255, 255, 255, 0.02);
  color: '.$theme_white.';
}
.tag-btn.light:hover {
  background-color: '.$theme_white.';
  color: '.$theme_dark.';
}

';