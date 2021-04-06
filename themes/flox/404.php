<?php get_header(); ?>
<section class="ckav-content-wrp">
	<div class="scroll-container">
		<?php get_template_part('template-parts/pageheader'); ?>

		<h2 class="fs80"><?php esc_html_e( '404 Not Found', 'flox' ); ?></h2>
		<p class="sub-title"><?php esc_html_e('Oops, the page you are looking for does not exist. ', 'flox'); ?></p>
		<a href="<?php echo esc_url(home_url('/')); ?>" class="ckav-btn primary-btn large"><?php esc_html_e( 'Return Home', 'flox' ); ?></a>
		<hr class="mr-tb-small">
		<p class="sub-title"><?php esc_html_e('Or, Maybe try a search?', 'flox'); ?></p>
		<?php get_search_form(); ?>

	</div>
</section>
<?php get_footer(); ?>