<?php
if ( !defined( 'ABSPATH' ) )
exit;

$edu_data = !empty($settings['edu_list']) ? $settings['edu_list'] : false;
$light_theme = $settings['light_theme'] == 'yes' ? 'light' : '';

if ( $edu_data ) { ?>
	<ul class="edu-list <?php echo esc_attr($light_theme); ?>">
		<?php foreach ($edu_data as $key => $value) { ?>
		<li class="info-item">
			<?php if ( !empty($value['title']) ) { ?>
			<h2 class="content-title"><?php echo ckav_esc( $value['title'] ); ?></h2>
			<?php } ?>

			<?php if ( !empty($value['label']) ) { ?>
			<p><?php echo ckav_esc( $value['label'] ); ?></p>
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