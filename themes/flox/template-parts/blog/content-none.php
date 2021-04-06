<?php
/**
 * The template for displaying a "No posts found" message
 */
?>
<h2 class="section-title"><?php esc_html_e( 'Nothing Found', 'flox' ); ?></h2>
<div class="mr-b-small">
	<?php if ( is_search() ) : ?>

	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'flox' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'flox' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->

