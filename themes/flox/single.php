<?php
/**
 * The main template file
 */
get_header(); ?>
<?php if ( have_posts() ) : while(have_posts()) : the_post(); 
	$col_class = has_post_thumbnail(get_the_ID()) ? 'col-md-7' : 'col-md';
?>
<div class="row gt0 ckav-single-post">
	<?php  if ( has_post_thumbnail(get_the_ID()) ) { ?>
	<div class="col-md-5 post-featured-img flex-bl">
		<?php get_template_part('template-parts/single-pageheader'); ?>
		
		<div class="full-wh bg-cc bg-cover" data-bg="<?php echo get_the_post_thumbnail_url(); ?>">
			<b class="full-wh z1" style="background: linear-gradient(to bottom, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.8) 100%);"></b>
		</div>
	</div>
	<?php } ?>

	<div class="post-content-info <?php echo esc_attr($col_class); ?>">
		<section class="ckav-content-wrp">
			<div class="scroll-container">

				<?php if ( !has_post_thumbnail(get_the_ID()) ) {
					get_template_part('template-parts/single-pageheader');
				} ?>
				
				<?php 
				/* Post content
				/******************************/ ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post-article' ); ?>>
					<?php 
					the_content(); 
					ckav_pagelinks();
					if( count( wp_get_post_tags( get_the_ID() ) ) > 0 ) : ?>
					<div class="ckav-post-tags">
						<?php foreach( get_the_tags( get_the_ID() ) as $tag ) :
						$term_link = get_tag_link( $tag->term_id ); ?>
						<a href="<?php echo esc_url( $term_link ); ?>" class="ckav-btn tag-btn">
							<?php echo esc_attr( $tag->name ); ?>
						</a>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</article>

				<?php 
				/* Author
				/******************************/
				if( get_the_author_meta( 'description' ) ) : ?>
				<div class="info-obj ico-medium img-l g20 post-author-info">
					<div class="img"><?php echo get_avatar( get_the_author_meta( 'ID' ), '185' ); ?></div>
					<div class="info">
						<h4 class="content-title small"><?php the_author(); ?></h4>
						<p><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div><!-- info box -->
				<?php endif; ?>

				<?php 
				/* Post navigation
				/******************************/
				$prev_post = get_previous_post();
				$next_post = get_next_post();
				if (isset($prev_post->ID) || isset($next_post->ID)) {
				?>
				<div class="post-pagination">
					<div class="container-fluid">
						<div class="row">
							<div class="col-6 prev">
								<?php if( isset($prev_post->ID) && get_permalink($prev_post->ID) ) { ?>
								<a href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>" class="italic"><i class="fas fa-long-arrow-alt-left"></i> <?php echo esc_html__('Previous' , 'flox') ?></a>
								<?php } ?>
							</div>

							<?php if( isset($next_post->ID) && get_permalink($next_post->ID) ) { ?>
							<div class="next col-6">
								<a href="<?php echo esc_url( get_permalink($next_post->ID) ); ?>" class="italic"><?php echo esc_html__('Next' , 'flox') ?> <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>
							<?php } ?>

						</div>
					</div>
				</div>
				<?php } else { ?>
				<hr class="mr-b-mini">
				<?php } ?>

				<?php 
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :?>
				<?php comments_template(); ?>
				<?php endif; ?>
			</div>
		</section>
	</div>
</div>
<?php 
endwhile;  endif;
get_footer(); ?>