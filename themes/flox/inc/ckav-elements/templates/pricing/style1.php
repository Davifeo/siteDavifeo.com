<?php
if ( !defined( 'ABSPATH' ) )
exit;

$price_packs = !empty($settings['price_packs']) ? $settings['price_packs'] : false;
$columns = !empty($settings['columns']) ? 'eq'.$settings['columns'] : 'eq3';
$light_theme = $settings['light_theme'] == 'yes' ? ' light' : '';


if ( $price_packs ) { ?>
<div class="rw gt40 mb40 <?php echo esc_attr($columns); ?>">

	<?php 
	foreach ($price_packs as $key => $value) { 
	$popular = $value['featured'] === 'yes' ? 'popular' : '';  ?>
	<div class="cl">
		<div class="price-pack <?php echo esc_attr($popular) . esc_attr($light_theme); ?>">

			<?php if ($value['featured'] == 'yes' && !empty($value['label_text']) ) { ?>
			<span class="pop-label"><?php echo esc_html($value['label_text']); ?></span>
			<?php }?>

			<div class="price-title">
				<?php 
				if ( $value['icon_status'] === 'yes' ) { 
					$ico_class = is_array($value['icon']) ? ckav_getkey('value', $value['icon'], 'pe-7s-rocket') : $value['icon'];
				?>
					<span class="iconbox sq60"><i class="<?php echo esc_attr($ico_class); ?>"></i></span>
				<?php } else {
					if ( !empty($value['icon_image']['url']) ) {
					$alt = get_post_meta($price_tbl['icon_image']['id'], '_wp_attachment_image_alt', true); ?>
					<span class="iconbox sq60"><img src="<?php echo esc_url($value['icon_image']['url']); ?>" alt="<?php echo esc_attr($alt); ?>"></span>
					<?php } ?>
				<?php } ?>

				<h2 class="content-title"><?php echo ckav_esc( $value['title'] ); ?></h2>
			</div>
			
			<div class="price-wrp">
				<h3 class="content-title xxlarge"><?php echo ckav_esc( $value['price_val'] ); ?></h3>
				<p class="duration"><?php echo ckav_esc( $value['plan_duration'] ); ?></p>
			</div>
			
			<?php
			$features = preg_split('/\r\n|[\r\n]/', $value['price_content']);
			if (is_array($features) && !empty($features)) {
			?>
			<ul class="features">
				<?php 
				foreach ($features as $features_text) :
					echo ' <li>';
					echo esc_html($features_text);
					echo '</li>';
				endforeach;
				?>
			</ul>
			<?php } ?>

			<?php if( !empty($value['btn_text']) ) { ?>
			<?php 
			$btn_target = ( $value['btn_url']['is_external']) ? '_blank' : '_self';
			$btn_color = !empty($value['btn_color']) ? $value['btn_color'] : 'primary-btn';
			?>
			<a href="<?php echo esc_url($value['btn_url']['url']); ?>" target="<?php echo esc_attr( $btn_target ); ?>" class="ckav-btn <?php echo esc_attr($btn_color); ?>"><?php echo esc_html($value['btn_text']); ?></a>
			<?php } ?>

		</div>
	</div>
	<?php } ?>

</div>
<?php } ?>