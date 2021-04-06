<?php 

echo '
/* Main header
/******************************/
.main-header {
  background-color: '.$theme_dark.';
  color: '.$theme_white.';
}
.main-header > .iconbox.active {
  background-color: '.$theme_primary.';
}
/*
 * Common popup screen for header info and menu
 ********************************/
.ckav-header-popup {
  background-color: '.$theme_dark.';
  border-right-color: rgba(255, 255, 255, 0.1);
}
.ckav-widget-wrp {
  background-color: rgba(0, 0, 0, 0.75);
}

/*
 * Header Search
 ********************************/
.header-search {
  color: '.$theme_white.';
}
.header-search input.form-control {
  border-color: rgba(255, 255, 255, 0.1);
}
.header-search input.form-control:hover {
  border-color: '.$theme_white.';
}
.header-search button.ckav-btn {
  color: '.$theme_white.';
}

/*
 * Author info
 ********************************/
.ckav-info-wrp {
  background-color: rgba(0, 0, 0, 0.75);
}
.ckav-info-wrp > .ckav-authorinfo-wrp {
  background-color: '.$theme_white.';
}
.main-container > .ckav-author-btn {
  background-color: '.$theme_white.';
  border-color: '.$theme_white.';
}
.main-container > .ckav-author-btn > span {
  background-color: '.$theme_white.';
}

';