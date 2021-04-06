<?php
/**
 * The main template file
 */
get_header(); ?>
<section class="ckav-content-wrp">
	<div class="scroll-container">
		<?php get_template_part('template-parts/pageheader'); ?>
		<?php get_template_part('template-parts/blog/post-loop'); ?>
	</div>
</section>
<?php get_footer(); ?>