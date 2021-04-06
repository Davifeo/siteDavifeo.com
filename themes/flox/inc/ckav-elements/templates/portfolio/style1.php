<?php
if ( !defined( 'ABSPATH' ) )
exit;

$grid_classes_arr = array(
	$settings['column'] != '' ? 'eq'.$settings['column'] : 'eq3',
	$settings['image_ratio'] != '' ? $settings['image_ratio'] : 'ratio-3x4',
	$settings['gutter'] != '' ? $settings['gutter'] : 'gt30 mb30'
);
$grid_classes = implode(' ', $grid_classes_arr);
$uppercase = $settings['upper'] == 'yes' ? ' txt-upper' : '';
$filter_upper = $settings['filter-upper'] == 'yes' ? ' txt-upper' : '';
$light_theme = $settings['light_theme'] == 'yes' ? 'light' : '';


$args = array( 'post_type' => 'portfolio', 'posts_per_page' => $settings['portfolio_items'] );
$query = new \WP_Query( $args );

$args = array(
	'taxonomy' => 'portfolio_cat',
	'orderby' => 'name',
	'order'   => 'ASC'
);

$post_cats = get_categories($args);



if ($query->have_posts()) : ?>
	
<div class="masonry-wrp ckav-filterable <?php echo esc_attr($light_theme); ?>">

	<?php if ($settings['filter_status'] === 'yes') { ?>
	<!--== Filters ===============-->
	<div class="filter-wrp">
		<ul class="inline-grid filters">
			<li><a class="filter-btn active <?php echo esc_attr($filter_upper); ?>" data-filter="all"><?php echo esc_html__('All', 'flox'); ?></a></li>
			<?php foreach ($post_cats as $cat) { ?>
			<li><a class="filter-btn <?php echo esc_attr($filter_upper); ?>" data-filter=".<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></a></li>	
			<?php } ?>
		</ul>
	</div>
	<?php } ?>
	
	<!--== Portfolio Gird ===============-->
	<div class="masonry-grid rw popup-gallery <?php echo esc_attr($grid_classes); ?>">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
		<div class="masonry-item cl <?php echo esc_attr(ckav_portitem_cat()); ?>">
			<figure class="portfolio-box">
				<div class="portfolio-img bg-cc bg-cover" style="background-image: url(<?php echo ckav_imgresize( ckav_post_thumb('url'), 600 ); ?>);">
					<div class="portfolio-icons">
						<a href="<?php echo ckav_post_thumb('url'); ?>" class="iconbox sq50 portfolio-popup-img"><i class="icon-magnifier"></i></a>
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="iconbox sq50"><i class="icon-arrow-right-circle"></i></a>
					</div>
					
					<?php echo ckav_post_thumb('img'); ?>
				</div>
				<?php if ($settings['title_status'] === 'yes') { ?>
				<figcaption>
					<?php the_title( '<h2 class="content-title'.esc_attr($uppercase).'"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					<p class="portfolio-cat sep-list"><?php echo ckav_esc(ckav_portitem_cat('name')); ?></p>
				</figcaption>
				<?php } ?>
			</figure>
		</div>
		<?php endwhile;
		wp_reset_postdata(); ?>
	</div>
</div>

<?php else : ?>

<p><?php esc_attr_e('No more posts.', 'flox' ); ?></p>

<?php endif; ?>



