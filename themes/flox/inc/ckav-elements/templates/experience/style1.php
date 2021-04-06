<?php
if ( !defined( 'ABSPATH' ) )
exit;

$exp_data = !empty($settings['exp_list']) ? $settings['exp_list'] : false;
$light_theme = $settings['light_theme'] == 'yes' ? 'light' : '';

if ( $exp_data ) { ?>
	<ul class="exp-list <?php echo esc_attr($light_theme); ?>">
		<?php foreach ($exp_data as $key => $value) { ?>
		<li class="info-item">
			<?php if ( !empty($value['title']) ) { ?>
			<h2 class="content-title">
				<?php echo ckav_esc( $value['title'] ); ?>
			</h2>
			<?php } ?>
			
			<?php if ( !empty($value['subtitle']) || !empty($value['year']) || !empty($value['label']) ) { ?>
			<p class="sep-list">
				<?php if ( !empty($value['year']) ) { ?>
				<?php echo ckav_esc( $value['year'] ); ?>
				<?php } ?>
				
				<?php if ( !empty($value['year']) ) { ?>
				<span class="sep">-</span>
				<?php echo ckav_esc( $value['subtitle'] ); ?>
				<?php } ?>

				<?php if ( !empty($value['label']) ) { ?>
				<span class="sep">-</span>
				<span class="present"><?php echo ckav_esc( $value['label'] ); ?></span>
				<?php } ?>
			</p>
			<?php } ?>

			<?php if ( !empty($value['desc']) ) { ?>
			<div class="description">
				<?php echo ckav_esc( $value['desc'] ); ?>
			</div>
			<?php } ?>

		</li>
		<?php } ?>
	</ul>
<?php } ?>
