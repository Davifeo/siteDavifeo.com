<?php 

echo '

/* Main menu
/******************************/
.ckav-menu-wrp.no-sub .main-menu {
  background-color: '.$theme_dark.';
}
.ckav-menu {
  color: '.$theme_white.';
}
.ckav-menu .menu-item > a,
.ckav-menu .menu-item > span {
  '.ckav_font_style( ckav_theme_option( "customizer", "menu-fonts") ).'
}
.ckav-menu .menu-item.active:hover > a,
.ckav-menu .menu-item > a:hover,
.ckav-menu .menu-item.active:hover > span,
.ckav-menu .menu-item > span:hover {
  border-right-color: '.$theme_primary.';
}

';