<?php
if ( !defined( 'ABSPATH' ) )
exit;

$testimonials = !empty($settings['testimonial_list']) ? $settings['testimonial_list'] : false;
$item_count = sizeof($testimonials);
$light_theme = $settings['light_theme'] == 'yes' ? 'light' : '';
$light_ctrl = $settings['light_theme'] == 'yes' ? 'ctrl-light' : '';
$carousel_item = !empty($settings['carousel-item']) ? $settings['carousel-item'] : '1';

$grid_item = !empty($settings['column']) ? 'eq'.$settings['column'] : 'eq2';
$grid_gt = !empty($settings['gutter']) ? $settings['gutter'] : 'gt40 mb40';


if ( $testimonials ) {

	if ( $item_count > 1 && $settings['display-type'] === 'carousel' ) { ?>

	<div class="carousel-widget ctrl-1 <?php echo esc_attr($light_ctrl); ?>" 
		data-items="<?php echo esc_attr($carousel_item); ?>"
		data-nav="false"
		data-itemrange="0,1|420,1|980,<?php echo esc_attr($carousel_item); ?>"
		data-loop="false"
		data-pager="true">
		<div class="owl-carousel">

			<?php foreach ($testimonials as $key => $testimonial) { 
				$p_img = !empty($testimonial['person_image']['url']) ? $testimonial['person_image']['url'] : NOIMG;
			?>
			<div class="item">
				
				<div class="testimonial-wrp style-1 <?php echo esc_attr($light_theme); ?>">
					<span class="sq100 iconbox img bg-cc bg-cover" style="background-image: url(<?php echo esc_url($p_img); ?>);"></span>
					<h3 class="content-title"><?php echo esc_html($testimonial['title']); ?></h3>
					<p class="italic"><?php echo esc_html($testimonial['subtitle']); ?></p>
					<div class="desc sub-title">
						<?php echo ckav_esc( $testimonial['desc'] ); ?>
					</div>
				</div>

			</div>
			<?php } ?>

		</div>
	</div>

	<?php } else { ?>

	<div class="rw <?php echo esc_attr($grid_item) . ' ' . esc_attr($grid_gt); ?>">
		<?php foreach ($testimonials as $key => $testimonial) { 
			$p_img = !empty($testimonial['person_image']['url']) ? $testimonial['person_image']['url'] : NOIMG;
		?>
		<div class="cl">
			
			<div class="testimonial-wrp style-1 <?php echo esc_attr($light_theme); ?>">
				<span class="sq100 iconbox img bg-cc bg-cover" style="background-image: url(<?php echo esc_url($p_img); ?>);"></span>
				<h3 class="content-title"><?php echo esc_html($testimonial['title']); ?></h3>
				<p class="italic"><?php echo esc_html($testimonial['subtitle']); ?></p>
				<div class="desc sub-title">
					<?php echo ckav_esc( $testimonial['desc'] ); ?>
				</div>
			</div>

		</div>
		<?php } ?>
	</div>
		
	<?php } ?>
<?php } ?>
