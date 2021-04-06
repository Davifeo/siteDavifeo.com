<?php $pagetitle_upper = ckav_theme_option( "customizer", "pagetitle-upper" ) === 'yes' ? 'txt-upper' : ''; ?>
<!-- PAGE-HEADING -->
<header class="page-header">
	<?php if(is_author()) : ?>
	<p class="italic mr-0"><?php echo esc_html__( 'All posts by', 'flox' ); ?></p>
	<?php endif; ?>
	
	<?php if( is_singular( 'post' ) ) : ?>
	<ul class="row ckav-post-meta gt0">
		<li class="col-auto"><?php ckav_post_meta('author'); ?></li>
		<li class="col-auto"><?php ckav_post_meta('category'); ?></li>
	</ul>
	<?php endif; ?>

	<h1 class="page-title <?php echo esc_attr($pagetitle_upper); ?>">
		<?php 
			if( is_home() ) :
				echo esc_html__( 'Blog home', 'flox' );
			elseif( is_404() ) :
				_e( 'Not Found', 'flox' );
			elseif (is_search()) :
				printf(esc_html__('Search Results for "%s"', 'flox'), get_search_query());
			elseif ( is_archive() ) :
				echo get_the_archive_title();
			elseif ( is_tag() ) :
				printf( esc_html__( 'Tag Archives: %s', 'flox' ), single_tag_title( '', false ) );
			elseif (is_page()) :
				echo get_the_title();
			elseif (is_author()) :
				echo get_the_author();
			elseif( is_singular( 'post' ) ) :
				the_title();
			else :
				echo get_the_title();
			endif;
			?>
	</h1>

	<?php if(is_author()) : ?>
	<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<div class="desc"><p><?php the_author_meta( 'description' ); ?></p></div>
	<?php endif; ?>
	<?php endif; ?>

	<?php 
	if(is_archive()) : 
	$term_description = term_description(); ?>
	<?php if ( ! empty( $term_description ) ) : ?>
	<div class="desc"><?php echo ckav_esc($term_description); ?></div>
	<?php endif; ?>
	<?php endif; ?>

</header>
<!-- / PAGE-HEADING -->
