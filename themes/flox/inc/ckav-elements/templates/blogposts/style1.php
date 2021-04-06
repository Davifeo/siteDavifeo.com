<?php
if ( !defined( 'ABSPATH' ) )
exit;

$light_theme = $settings['light_theme'] == 'yes' ? ' light' : '';
$light_ctrl = $settings['light_theme'] == 'yes' ? 'ctrl-light' : '';

$carousel_item = !empty($settings['carousel-item']) ? $settings['carousel-item'] : '1';

$grid_item = !empty($settings['column']) ? 'eq'.$settings['column'] : 'eq2';
$grid_gt = !empty($settings['gutter']) ? $settings['gutter'] : 'gt40 mb40';

$args = array( 
	'post_type' => 'post', 
	'posts_per_page' => !empty($settings['post_items']) ? $settings['post_items'] : 6,
);
$query = new \WP_Query( $args );

if ($query->have_posts()) :

	if ( $settings['display-type'] === 'carousel' ) { ?>

	<div class="carousel-widget ctrl-1 <?php echo esc_attr($light_ctrl); ?>" 
		data-items="<?php echo esc_attr($carousel_item); ?>"
		data-nav="false"
		data-loop="false"
		data-itemrange="0,1|420,1|980,<?php echo esc_attr($carousel_item); ?>"
		data-pager="true">
		<div class="owl-carousel">

			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class="item">
			<?php require THEME_ELE . '/templates/blogposts/postbox.php'; ?>
			</div>
			<?php endwhile;
			wp_reset_postdata(); ?>

		</div>
	</div>

	<?php } else { ?>
	
	<div class="masonry-wrp">
		<div class="blogpost-grid masonry-grid rw <?php echo esc_attr($grid_item) . ' ' . esc_attr($grid_gt); ?>" data-masonry-grid="y">
			
			<?php while ($query->have_posts()) : $query->the_post(); ?>
			<div class="masonry-item cl">
			 	<?php require THEME_ELE . '/templates/blogposts/postbox.php'; ?>
			</div>
			<?php endwhile;
			wp_reset_postdata(); ?>
			
		</div>
	</div>
		
	<?php } ?>

<?php else : ?>

<p><?php esc_attr_e('No more posts.', 'flox' ); ?></p>

<?php endif; ?>

