<?php 

echo '
/* Blog post box
/******************************/
.ckav-postbox.tag-sticky-2 .ckav-meta-wrp > i,
.ckav-postbox.category-sticky .ckav-meta-wrp > i,
.ckav-postbox.sticky .ckav-meta-wrp > i {
  color: '.$theme_default.';
}

/* Blog list page post pagination
/******************************/
.paging-navigation .pagination .page-numbers:hover {
  background-color: '.$theme_primary.';
}
.paging-navigation .pagination .page-numbers.current {
  background-color: '.$theme_dark.';
}

/*== Post header with featured image ===============*/
.single-post-header.sticky-post-tag > .sticky-icon {
  color: '.$theme_default.';
}

/* Wordpress post links
/******************************/
.ckav-page-links .post-page-numbers.current {
  background-color: '.$theme_primary.';
}

/* Category and archive widgets
**********************************/
.widget_nav_menu ul > li,
.widget_categories ul > li,
.widget_archive ul > li,
.widget_meta ul > li,
.widget_pages ul > li,
.widget_recent_entries ul > li,
.widget_recent_comments ul > li,
.widget_rss ul > li {
  color: '.$theme_dark.';
}
.widget_nav_menu ul > li:before,
.widget_categories ul > li:before,
.widget_archive ul > li:before,
.widget_meta ul > li:before,
.widget_pages ul > li:before,
.widget_recent_entries ul > li:before,
.widget_recent_comments ul > li:before,
.widget_rss ul > li:before {
  border-bottom: 4px solid '.$theme_default.';
}

';