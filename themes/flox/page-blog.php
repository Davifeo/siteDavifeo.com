<?php
/**
 * Template Name: Page Blog
 */
get_header();
$bloggrid_col = !empty(ckav_theme_option( "customizer", "bloggrid-col", '3')) ? 'eq'.ckav_theme_option( "customizer", "bloggrid-col", '3') : 'eq3'; ?>

<section class="ckav-content-wrp">
	<div class="scroll-container">
		<?php get_template_part('template-parts/pageheader'); ?>
		<?php 
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
		$args = array( 'post_type' => 'post', 'paged' => $paged );
		$the_query = new WP_Query( $args );

		if ($the_query->have_posts()) : ?>
		<div class="masonry-wrp">
			<div class="<?php echo esc_attr($bloggrid_col); ?> rw gt40 mb40 blogpost-grid masonry-grid" data-masonry-grid="y">
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="masonry-item cl">
					<?php get_template_part( 'template-parts/blog/content' ); ?>
				</div>
			<?php endwhile; // End of the loop. ?>
			</div>
		</div>
		<?php wp_reset_postdata();
		else :
			get_template_part( 'template-parts/blog/content', 'none' );
		endif;

		// Previous/next page navigation.
		function_exists( 'fw_theme_paging_nav' ) ? fw_theme_paging_nav($the_query) : null;
		?>
	</div>
</section>
<?php get_footer(); ?>