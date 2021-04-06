<?php 

/* Loader CSS
/******************************/
echo '

/* Loader CSS
/******************************/
.ckav-page-loader {
    background: #222;
}

.ckav-loader {
    color: '.$theme_default.';
}

body {
    color: '.$theme_basefontcolor.';
    background-color: '.$theme_light.';
}

/*
* Layout
********************************/
.main-contentarea {';
    if ( ckav_theme_option( "customizer", "page-bg/bg") !== '' ) {
    echo 'background-color: '.ckav_theme_option( "customizer", "page-bg/bg").';';
    }
    echo 'box-shadow: 0 '.ckav_theme_option( 'customizer', 'page-bg/offset').'px '.ckav_theme_option( 'customizer', 'page-bg/size').'px 0 '.ckav_theme_option( 'customizer', 'page-bg/shadow-color').';
}

/* Scroll bar
/******************************/
.mCSB_scrollTools.mCS-rounded-dark .mCSB_dragger .mCSB_dragger_bar {
    background-color: '.$theme_primary.'  !important;
    box-shadow: 0 2px 15px 0 rgba(0, 0, 0, 0.3);
}

.mCSB_scrollTools.mCS-rounded-dark .mCSB_dragger .mCSB_dragger_bar:after {
    border-left: 4px dotted '.$theme_white.';
}

/* Background colors used 
/******************************/
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
}

/*
 * Typography
 ********************************/
h1,
h2,
h3,
h4,
h5,
h6,
.page-title,
.section-title,
.content-title,
.sub-title {
    color: #fff;
}

a,
a:hover,
a:focus {
    color: inherit;
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

/*== List 1 ===============*/
.list-1 li::before {
    border-bottom: 2px solid '.$theme_default.';
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


/* Main header
/******************************/
.main-header {
    background-color: '.$theme_dark.';
    color: '.$theme_white.';
}

.main-header>.iconbox.active {
    background-color: '.$theme_primary.';
}

/*
 * Common popup screen for header info and menu
 ********************************/
.ckav-header-popup {
    background-color: '.$theme_dark.';
    border-right: 1px solid rgba(255, 255, 255, 0.1);
}

/*
 * Widget bar
 ********************************/
.ckav-widget-wrp {
    background-color: rgba(0, 0, 0, 0.75);
}

.ckav-widget-wrp>aside {
    background-color: '.$theme_dark.';
}

/*
 * Header Search
 ********************************/
.header-search {
    color: '.$theme_white.';
}

.header-search input.form-control {
    border: 2px solid rgba(255, 255, 255, 0.1);
}

.header-search input.form-control:hover {
    border-color: '.$theme_white.';
}

.header-search button.ckav-btn {
    color: '.$theme_white.';
}

/*
  * Menu wrp
  ********************************/
.ckav-menu-wrp.no-sub {
    border-right-color: transparent;
    background-color: rgba(0, 0, 0, 0.75);
}

/*
 * Author info
 ********************************/
.ckav-info-wrp {
    background-color: rgba(0, 0, 0, 0.75);
}

.ckav-info-wrp>.ckav-authorinfo-wrp {
    background-color: '.$theme_dark.';
}

.main-container>.ckav-author-btn {
    background-color: '.$theme_white.';
    border: 4px solid '.$theme_white.';
    box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
    color: #fff;
}

.main-container>.ckav-author-btn>span {
    background-color: '.$theme_primary.';
}

.main-container>.ckav-author-btn.active {
    background-image: none !important;
}

/* Main menu
/******************************/
.main-menu {
    border-right: 1px solid rgba(255, 255, 255, 0.1);
}

.ckav-menu-wrp.no-sub .main-menu {
    background-color: '.$theme_dark.';
}

.ckav-menu {
    color: '.$theme_white.';
}

.ckav-menu .menu-item.active:hover>a,
.ckav-menu .menu-item>a:hover,
.ckav-menu .menu-item.active:hover>span,
.ckav-menu .menu-item>span:hover {
    border-right-color: '.$theme_primary.';
}

.ckav-menu .has-dropdown>ul {
    border-right: 1px solid rgba(255, 255, 255, 0.1);
}

/* Buttons
/******************************/
.default-btn {
    background-color: '.$theme_default.';
    border-color: '.$theme_default.';
    color: '.$theme_white.';
}

.default-btn:hover,
.default-btn:focus,
.default-btn:active,
.default-btn.active {
    background-color: '.$theme_white.';
    border-color: '.$theme_white.';
    color: '.$theme_dark.';
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
    background-color: '.$theme_white.';
    border-color: '.$theme_white.';
    color: '.$theme_dark.';
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

/*== Dark button ===============*/
.white-btn {
    background-color: '.$theme_white.';
    border-color: '.$theme_white.';
    color: '.$theme_dark.';
}

.white-btn:hover,
.white-btn:focus,
.white-btn:active,
.white-btn.active {
    background-color: '.$theme_primary.';
    border-color: '.$theme_primary.';
    color: '.$theme_white.';
}

.glass.ckav-btn {
    background-color: transparent;
    border-color: transparent;
}

/*== Tag button ===============*/
.tag-btn {
    border-color: rgba(255, 255, 255, 0.1);
    background-color: rgba(255, 255, 255, 0.02);
}

.tag-btn:hover {
    background-color: '.$theme_white.';
    color: '.$theme_dark.';
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

/* Form controls
=========================*/
.widget_archive select,
.postform,
.form-control,
.wpcf7-form-control:not([type="submit"]),
.post-password-form input {
    border-color: rgba(255, 255, 255, 0.15);
    color: '.$theme_white.';
}

.wpcf7-form-control:hover,
.wpcf7-form-control:focus,
.form-control:hover,
.form-control:focus {
    border-color: rgba(255, 255, 255, 0.5);
    background-color: transparent;
}

/* Light form control */
.footer-dark .postform,
.footer-dark .form-control,
.form-control-light,
.form-control-light.wpcf7-form-control {
    border-color: rgba(255, 255, 255, 0.15);
    color: '.$theme_white.';
}
.widget_archive option,
.postform option,
.wpcf7-form-control option,
.form-control option,
.form-control-light option {
    color: #333;
}

.footer-dark .postform:hover,
.footer-dark .form-control:hover,
.form-control-light:hover,
.form-control-light:focus,
.form-control-light.wpcf7-form-control:focus,
.form-control-light.wpcf7-form-control:hover {
    border-color: rgba(255, 255, 255, 0.5);
    color: '.$theme_white.';
}

.form-control-light::-webkit-input-placeholder {
    color: rgba(255, 255, 255, 0.4);
}

.form-control-light::-moz-placeholder {
    color: rgba(255, 255, 255, 0.4);
}

.form-control-light:-ms-input-placeholder {
    color: rgba(255, 255, 255, 0.4);
}

.form-control-light:-moz-placeholder {
    color: rgba(255, 255, 255, 0.4);
}

/**
 * Contact form 7 messages
 */
div.wpcf7-mail-sent-ok,
div.wpcf7-validation-errors,
div.wpcf7-acceptance-missing {
    border: 1px solid rgba(255, 0, 0, 0.7);
    background-color: rgba(255, 0, 0, 0.1);
}

div.wpcf7-mail-sent-ok {
    border: 1px solid #398f14;
    background-color: rgba(156, 220, 35, 0.17);
}

/*
***************************************************************
Subscribe blocks
***************************************************************
*/
.subscribe-block.dark .btn {
    background-color: '.$theme_white.';
    color: '.$theme_dark.';
}

.typo-light .widget_archive select:not([class*="bdr-op-"]),
.light .widget_archive select:not([class*="bdr-op-"]),
.typo-light .postform:not([class*="bdr-op-"]),
.light .postform:not([class*="bdr-op-"]),
.typo-light .form-control:not([class*="bdr-op-"]),
.light .form-control:not([class*="bdr-op-"]),
.typo-light .wpcf7-form-control:not([type="submit"]):not([class*="bdr-op-"]),
.light .wpcf7-form-control:not([type="submit"]):not([class*="bdr-op-"]),
.typo-light .post-password-form input,
.light .post-password-form input {
    border-color: rgba(255, 255, 255, 0.3);
    color: '.$theme_white.';
}

.typo-light .form-control:hover,
.light .form-control:hover,
.typo-light .form-control:focus,
.light .form-control:focus,
.typo-light .widget_archive select:not([class*="bdr-op-"]):hover,
.light .widget_archive select:not([class*="bdr-op-"]):hover,
.typo-light .postform:not([class*="bdr-op-"]):hover,
.light .postform:not([class*="bdr-op-"]):hover,
.typo-light .form-control:not([class*="bdr-op-"]):hover,
.light .form-control:not([class*="bdr-op-"]):hover,
.typo-light .wpcf7-form-control:not([type="submit"]):not([class*="bdr-op-"]):hover,
.light .wpcf7-form-control:not([type="submit"]):not([class*="bdr-op-"]):hover,
.typo-light .post-password-form input:hover,
.light .post-password-form input:hover {
    border-color: rgba(255, 255, 255, 0.8);
}

.typo-light div.wpcf7-mail-sent-ok,
.light div.wpcf7-mail-sent-ok,
.typo-light div.wpcf7-validation-errors,
.light div.wpcf7-validation-errors,
.typo-light div.wpcf7-acceptance-missing,
.light div.wpcf7-acceptance-missing {
    color: '.$theme_white.';
}

/*== Carousel controls ===============*/
.ctrl-1 .owl-nav>div,
.ctrl-1 .owl-nav>button,
.swiper-button-prev,
.swiper-button-next {
    background-color: rgba(0, 0, 0, 0.5);
    color: '.$theme_white.';
}

.owl-dots>.owl-dot {
    border: 2px solid rgba(0, 0, 0, 0.4);
}

.owl-dots .active {
    background-color: rgba(0, 0, 0, 0.4);
}

.ctrl-light .owl-dots>.owl-dot {
    border-color: rgba(255, 255, 255, 0.4);
}

.ctrl-light .owl-dots .active {
    background-color: rgba(255, 255, 255, 0.4);
}

.ctrl-light .owl-nav>div {
    color: '.$theme_white.';
}

.ctrl-light .owl-nav>div:hover {
    background-color: '.$theme_white.';
    color: #333;
}

.swiper-pagination-bullet-active {
    background: #000;
}

.swiper-pagination-bullet {
    border: 1px solid '.$theme_white.';
}

.zoom-carousel .swiper-slide-active>img,
.zoom-carousel .swiper-slide-active>.content,
.zoom-carousel .center .content {
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.3);
}

.swiper-gallery .gallery-thumbs .swiper-slide:hover,
.swiper-gallery .gallery-thumbs .swiper-slide-active {
    border-color: '.$theme_white.';
    box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.4);
}

.swiper-gallery .gallery-thumbs:not([class*="bg-"]) {
    background-color: rgba(0, 0, 0, 0.4);
}

.light.gallery-thumbs {
    background-color: rgba(255, 255, 255, 0.3);
}

.swiper-gallery.layout-1 .gallery-thumbs:not([class*="bg-"]) {
    background-color: rgba(0, 0, 0, 0.05);
}

/* Blog post box
/******************************/
.ckav-postbox {
    background-color: '.$theme_lighten.';
}

.ckav-postbox.light {
    color: '.$theme_white.';
}

.ckav-postbox.tag-sticky-2 .ckav-meta-wrp>i,
.ckav-postbox.category-sticky .ckav-meta-wrp>i,
.ckav-postbox.sticky .ckav-meta-wrp>i {
    color: '.$theme_default.';
}

/* Blog list page post pagination
/******************************/
.paging-navigation .pagination {
    border: 1px solid rgba(255, 255, 255, 0.1);
    background-color: '.$theme_lighten.';
}

.paging-navigation .pagination .page-numbers:hover {
    background-color: '.$theme_primary.';
    color: '.$theme_white.';
}

.paging-navigation .pagination .page-numbers.current {
    background-color: '.$theme_dark.';
    color: '.$theme_white.';
}

.single-post .post-author-info,
.single .post-author-info {
    background-color: '.$theme_lighten.';
}

.ckav-post-tags {
    background-color: '.$theme_lighten.';
}

/*== Post header with featured image ===============*/
.single-post-header.sticky-post-tag>.sticky-icon {
    color: '.$theme_default.';
}

.single-post-header.typo-light>.sticky-icon {
    color: '.$theme_white.';
}

.post-featured-img {
    color: '.$theme_white.';
}

.post-featured-img .ckav-post-meta [class*="col-"]:after {
    border-color: '.$theme_white.';
}

/* Post navitation
/******************************/
.post-pagination {
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}

/*  Comment form box
/******************************/
.comment-respond {
    background-color: '.$theme_lighten.';
}

.comment-respond .icon-check {
    color: red;
}

/* Comment list
/******************************/
.comment-list .comment-box .info {
    background-color: '.$theme_lighten.';
}

.comment-list .comment-box .img {
    border: 4px solid '.$theme_white.';
    box-shadow: 0 1px 5px 0 rgba(0, 0, 0, 0.1);
}

/* Wordpress post links
/******************************/
.ckav-page-links {
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.ckav-page-links .post-page-numbers.current {
    background-color: '.$theme_primary.';
    color: '.$theme_white.';
}

/* General widget area
**********************************/
.widget {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    color: #fff;
}

/* Category and archive widgets
**********************************/
.widget_nav_menu ul>li,
.widget_categories ul>li,
.widget_archive ul>li,
.widget_meta ul>li,
.widget_pages ul>li,
.widget_recent_entries ul>li,
.widget_recent_comments ul>li,
.widget_rss ul>li {
    color: #fff;
}

.widget_nav_menu ul>li:before,
.widget_categories ul>li:before,
.widget_archive ul>li:before,
.widget_meta ul>li:before,
.widget_pages ul>li:before,
.widget_recent_entries ul>li:before,
.widget_recent_comments ul>li:before,
.widget_rss ul>li:before {
    border-bottom: 4px solid '.$theme_default.';
}

.widget_nav_menu .sub-menu,
.widget_categories .sub-menu,
.widget_archive .sub-menu,
.widget_meta .sub-menu,
.widget_pages .sub-menu,
.widget_recent_entries .sub-menu,
.widget_recent_comments .sub-menu,
.widget_rss .sub-menu,
.widget_nav_menu .children,
.widget_categories .children,
.widget_archive .children,
.widget_meta .children,
.widget_pages .children,
.widget_recent_entries .children,
.widget_recent_comments .children,
.widget_rss .children {
    border-left: 1px dotted rgba(255, 255, 255, 0.2);
}

.widget_nav_menu .sub-menu>li:before,
.widget_categories .sub-menu>li:before,
.widget_archive .sub-menu>li:before,
.widget_meta .sub-menu>li:before,
.widget_pages .sub-menu>li:before,
.widget_recent_entries .sub-menu>li:before,
.widget_recent_comments .sub-menu>li:before,
.widget_rss .sub-menu>li:before,
.widget_nav_menu .children>li:before,
.widget_categories .children>li:before,
.widget_archive .children>li:before,
.widget_meta .children>li:before,
.widget_pages .children>li:before,
.widget_recent_entries .children>li:before,
.widget_recent_comments .children>li:before,
.widget_rss .children>li:before {
    border-bottom: 1px dotted rgba(255, 255, 255, 0.3);
}

/* Calender
**********************************/
.calendar_wrap table thead {
    background-color: rgba(255, 255, 255, 0.05);
}

.calendar_wrap table td,
.calendar_wrap table th {
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.calendar_wrap caption {
    color: '.$theme_white.';
}

/* Tag cloud
**********************************/
.widget_tag_cloud .tag-cloud-link {
    border: 1px solid rgba(255, 255, 255, 0.05);
    background-color: rgba(255, 255, 255, 0.05);
}

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
    color: '.$theme_white.';
}

.filter-wrp .filter-btn.active:hover {
    color: '.$theme_white.';
}

/* Portfolio box
/******************************/
.portfolio-box .portfolio-img {
    background-color: '.$theme_dark.';
    box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
}

.portfolio-box .portfolio-img:before {
    background-color: rgba(0, 0, 0, 0.8);
}

.portfolio-box .portfolio-img .portfolio-icons {
    color: '.$theme_white.';
}

.light.masonry-wrp {
    color: '.$theme_white.';
}


/* Progress bars
/******************************/
.progress-wrp .progress {
    background-color: rgba(0, 0, 0, 0.2);
}

.progress-wrp .progress-bar {
    color: '.$theme_white.';
    background-color: '.$theme_default.';
}

.progress-wrp .percentage {
    background-color: '.$theme_dark.';
    color: '.$theme_white.';
}

.progress-wrp .percentage i {
    color: '.$theme_dark.';
}

.progress-wrp.light {
    color: '.$theme_white.';
    border-color: rgba(255, 255, 255, 0.1);
}

.progress-wrp.light .progress {
    background-color: rgba(255, 255, 255, 0.15);
}

.progress-wrp.light .percentage {
    background-color: rgba(255, 255, 255, 0.15);
}

.progress-wrp.light .percentage i {
    color: rgba(255, 255, 255, 0.15);
}

/* Education list
/******************************/
.edu-list,
.exp-list {
    border-left: 2px dotted rgba(255, 255, 255, 0.1);
}

.edu-list .content-title+p .present,
.exp-list .content-title+p .present {
    color: '.$theme_primary.';
}

.edu-list .content-title:after,
.exp-list .content-title:after {
    background-color: '.$theme_primary.';
    box-shadow: 0 0 0 6px rgba(255, 255, 255, 0.1);
}

.edu-list .content-title:before,
.exp-list .content-title:before {
    border-bottom: 1px solid rgba(255, 255, 255, 0.15);
}

.edu-list.light,
.exp-list.light {
    color: '.$theme_white.';
    border-color: rgba(255, 255, 255, 0.2);
}

.edu-list.light .content-title,
.exp-list.light .content-title {
    color: inherit;
}

.edu-list.light .label,
.exp-list.light .label {
    background-color: rgba(255, 255, 255, 0.2);
}

.edu-list.light .label::before,
.exp-list.light .label::before {
    border-right-color: rgba(255, 255, 255, 0.2);
}

/* Price packages
/******************************/
.price-pack {
    background-color: '.$theme_lighten.';
}

.price-pack .iconbox {
    color: '.$theme_primary.';
}

.price-pack .price-wrp {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

.price-pack.popular {
    background-color: '.$theme_dark.';
    box-shadow: 0 10px 50px 0 rgba(0, 0, 0, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.price-pack.light {
    color: '.$theme_white.';
    border-color: rgba(255, 255, 255, 0.2);
}

.price-pack.light .content-title {
    color: inherit;
}

.price-pack.light .price-wrp {
    border-color: rgba(255, 255, 255, 0.2);
}

/* Testimonials
/******************************/
.testimonial-wrp.style-1 .img {
    border: none;
    box-shadow: 0 6px 15px 0 rgba(0, 0, 0, 0.5), 0 0 0 6px rgba(255, 255, 255, 0.25);
}

.testimonial-wrp.style-2 .info {
    background-color: '.$theme_lighten.';
}

.testimonial-wrp.style-2 .img {
    border: none;
    box-shadow: 0 6px 15px 0 rgba(0, 0, 0, 0.5), 0 0 0 6px rgba(255, 255, 255, 0.25);
}

.testimonial-wrp.style-2 .desc {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}

/**************************************************************/
.wp-caption {
    background: rgba(255, 255, 255, 0.1);
}
.screen-reader-text:focus {
	background-color: #eee;
}
.wp-caption figcaption,
.wp-block-image figcaption {
    background-color: rgba(255, 255, 255, 0.05);
    color: rgba(255, 255, 255, 0.75);
}

blockquote {
	color: rgba(255, 255, 255, 0.8);
	background-color: rgba(255, 255, 255, 0.05);
	border-left: 4px solid rgba(255, 255, 255, 0.2);
}
table, th, td {
    border: 1px solid rgba(255, 255, 255, 0.1);
}

';
