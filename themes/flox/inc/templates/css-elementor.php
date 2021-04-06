<?php 

echo '
/* Grid filters
/******************************/
.filter-wrp .filter-btn {
  color: '.$theme_dark.';
}
.filter-wrp .filter-btn:hover {
  color: '.$theme_dark.';
}
.filter-wrp .filter-btn.active {
  background-color: '.$theme_dark.';
  color: #fff;
}
.filter-wrp .filter-btn.active:hover {
  color: #fff;
}

/* Progress bars
/******************************/
.progress-wrp .progress {
  background-color: rgba(0, 0, 0, 0.08);
}
.progress-wrp .progress-bar {
  background-color: '.$theme_default.';
}
.progress-wrp .percentage {
  background-color: '.$theme_dark.';
  color: #fff;
}
.progress-wrp .percentage i {
  color: '.$theme_dark.';
}

/* Education list
/******************************/
.edu-list .content-title + p .present,
.exp-list .content-title + p .present {
  color: '.$theme_primary.';
}
.edu-list .content-title:after,
.exp-list .content-title:after {
  background-color: '.$theme_primary.';
}

/* Price packages
/******************************/
.price-pack .iconbox {
  color: '.$theme_primary.';
}
';