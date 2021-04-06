<?php
if ( !defined( 'ABSPATH' ) )
exit;
$skill_data = !empty($settings['skill_list']) ? $settings['skill_list'] : false;
$light_theme = $settings['light_theme'] == 'yes' ? 'light' : '';

if ( $skill_data ) {
foreach ($skill_data as $key => $value) { ?>

<div class="progress-wrp <?php echo esc_attr($light_theme); ?>">
	<p class="progress-title"><?php echo ckav_esc( $value['title'] ); ?></p>
	<div class="progress">
		<div class="progress-bar" role="progressbar" style="width: <?php echo ckav_getkey('percent/size', $value, 10);	?>%; transition: all 0.5s ease;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
		<b class="percentage"><?php echo ckav_getkey('percent/size', $value, 10);?>% <i class="fas fa-caret-down"></i></b>
		</div>
	</div>
</div>

<?php } } ?>

