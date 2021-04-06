<?php

get_header(); ?>
<section class="ckav-content-wrp">
	<div class="scroll-container">
		<?php
		get_template_part('template-parts/pageheader');
		
		if (have_posts()) :

		while (have_posts()) : the_post();
			the_content();
			ckav_pagelinks();
		endwhile; // End of the loop.
		
		else :
			// If no content, include the "No posts found" template.
			get_template_part('template-parts/blog/content', 'none');
		endif;

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :?>
		<hr class="mr-tb-mini">
		<?php comments_template(); ?>
		<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>