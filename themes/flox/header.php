<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!-- PAGE-LOADER -->
	<div class="ckav-page-loader flex-cc">
		<div class="ckav-loader"></div>
	</div>
	
	<?php 
	$bodybg_data = ckav_bgholder_data(ckav_theme_option( 'customizer', 'body-bg'));
	if ( $bodybg_data ) {
		echo ckav_bgholder( $bodybg_data );	
	} ?>
	
	<div class="main-wrp">
		<div class="main-container">

			<?php if ( !empty(ckav_themelogo()) ) { ?>
			<button data-ckavpopupid="info" class="ckav-author-btn bg-cc bg-cover" style="background-image: url(<?php echo esc_url( ckav_themelogo() ); ?>);">
				<span class="iconbox"><i class="icon-close"></i></span>
			</button>
			<?php } ?>
			
			<!-- Main header
			******************************-->
			<header class="main-header">
				<?php if ( !empty(ckav_themelogo()) ) { ?>
				<button data-ckavpopupid="info" class="iconbox bg-cc bg-cover ckav-author-btn" style="background-image: url(<?php echo esc_url( ckav_themelogo() ); ?>);">
					<i class="icon-close"></i>
				</button>
				<?php } ?>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="iconbox"><i class="icon-home"></i></a>
				<button data-ckavpopupid="menu" class="iconbox"><i data-popicon="icon-menu" class="icon-menu"></i></button>
				<button data-ckavpopupid="search" class="iconbox"><i data-popicon="icon-magnifier" class="icon-magnifier"></i></button>
				<?php if ( is_active_sidebar( 'sticky-sidebar' ) ) { ?>
				<button data-ckavpopupid="widgets" class="iconbox"><i data-popicon="icon-info" class="icon-info"></i></button>
				<?php } ?>
			</header>

			
			<div class="main-contentarea">

				<?php
				/*
				 * Menu
				 ********************************/ ?>
				<div data-popupholder="menu" class="ckav-menu-wrp ckav-header-popup">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						$defaults = array(
							'theme_location'  => 'primary',
							'menu_class'      => 'ckav-menu',
							'depth' 		  => 4,
							'container'       => 'nav',
							'container_class' => 'main-menu',
							'walker'          => new ckav_nav_menu(),
						);
						
						wp_nav_menu( $defaults ); 
					} else { ?>
						<nav class="main-menu flex-cc"><?php ckav_set_menu(); ?></nav>
					<?php } ?>
				</div>
				
				<?php
				/*
				 * Search
				 ********************************/ ?>
				<div data-popupholder="search" class="ckav-search-wrp ckav-header-popup flex-cc">
					<div class="header-search">
						<?php get_search_form(); ?>
					</div>
				</div>
				

				<?php
				/*
				 * Widget sidebar
				 ********************************/ 
				if ( is_active_sidebar( 'sticky-sidebar' ) ) { ?>
				<div data-popupholder="widgets" class="ckav-widget-wrp ckav-header-popup flex-tr">
					<aside><?php get_sidebar( 'content' ); ?></aside>
				</div>
				<?php } ?>

				<?php
				/*
				 * Info section
				 ********************************/ 
				if ( !empty(ckav_themelogo()) ) {
				if ( !empty(ckav_theme_option( 'customizer', 'info-section' )) ||
					 !empty(ckav_theme_option( 'customizer', 'info-title' )) ||
					 !empty(ckav_theme_option( 'customizer', 'info-subtitle' )) ) { ?>
				<div data-popupholder="info" class="ckav-info-wrp ckav-header-popup">
					<?php 
					$info_img = ckav_theme_option( 'customizer', 'info-img' );
					$info_btn = ckav_theme_option( 'customizer', 'info-button' );
					?>
					<div class="ckav-authorinfo-wrp">
						<?php if (!empty($info_img)) { ?>
						<div class="author-img bg-ct bg-cover" style="background-image: url(<?php echo esc_url( ckav_getkey('url', $info_img) ); ?>);"></div>	
						<?php } ?>
						
						<div class="content">
							<div class="info">
								<?php ckav_infodata(); ?>

								<?php if ( !empty(ckav_getkey('btn-text', $info_btn)) && !empty(ckav_getkey('url', $info_btn)) ) { 
									$info_btn_icon = !empty(ckav_getkey('icon', $info_btn)) ? '<i class="'. esc_attr(ckav_getkey('icon', $info_btn)) .'"></i> ' : '';
								?>
								<a href="<?php echo esc_url( ckav_getkey('url', $info_btn) ); ?>" class="ckav-btn primary-btn block"><?php echo ckav_esc( $info_btn_icon ) . esc_html( ckav_getkey('btn-text', $info_btn) ); ?></a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php } } ?>
	
	