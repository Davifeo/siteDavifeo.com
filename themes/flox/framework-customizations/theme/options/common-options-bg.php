<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$options = array(
	/**
	 * Background overlay color
	 */
	'group_bgcolor' => array(
		'type' => 'group',
		'options' => array(
			'multi-bgcolor' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'overlay_status' => array(
						'type'  => 'switch',
						'value' => 'no',
						'label' => esc_html__('Show overlay background?', 'flox'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'flox'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'flox'),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'bgcolor' => array(
							'type'  => 'ckav-color-picker',
							'label' => esc_html__('Background color', 'flox'),
							'desc'  => esc_html__('Overlay background color', 'flox'),
						),
					),
				),

			),
		),
	),


	/**
	 * Gradient background overlay color
	 */
	'group_bggradient' => array(
		'type' => 'group',
		'options' => array(
			'multi-bggradient' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'gradient_status' => array(
						'type'  => 'switch',
						'value' => 'no',
						'label' => esc_html__('Show gradient background?', 'flox'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'flox'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'flox'),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'gr_angle'                => array(
							'label' => esc_html__( 'Short Text', 'flox' ),
							'type'  => 'short-text',
							'value' => '0',
							'desc'  => esc_html__( 'Gradient color angle', 'flox' ),
						),
						'gr_color1' => array(
							'type'  => 'ckav-color-picker',
							'label' => esc_html__('Gradient color 1', 'flox'),
						),
						'gr_color2' => array(
							'type'  => 'ckav-color-picker',
							'label' => esc_html__('Gradient color 2', 'flox'),
						),
						'gr_color3' => array(
							'type'  => 'ckav-color-picker',
							'label' => esc_html__('Gradient color 3', 'flox'),
						),
					),
				),

			),
		),
	),

	/**
	 * Background image option
	 */
	'group_bgimage' => array(
		'type' => 'group',
		'options' => array(
			'multi-bgimage' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'bgtype' => array(
						'label'   => esc_html__( 'Background type', 'flox' ),
						'type'    => 'select',
						'value'   => 'no',
						'choices' => array(
							'no' => 'Select background type',
							'bgimg' => 'Simple background image',
							'bgslider' => 'Background slide-show'
						),
					),
					
				),
				'choices' => array(
					'bgimg' => array(
						'image' => array(
							'type'  => 'upload',
							'label' => esc_html__( 'Upload image', 'flox' ),
							'desc'  => esc_html__( 'Upload image to display in background', 'flox' ),
							'images_only' => true,
						),
						'bg_fixed' => array(
							'type'  => 'switch',
							'value' => 'no',
							'label' => esc_html__('Background attachment fixed?', 'flox'),
							'left-choice' => array(
								'value' => 'no',
								'label' => esc_html__('No', 'flox'),
							),
							'right-choice' => array(
								'value' => 'yes',
								'label' => esc_html__('Yes', 'flox'),
							),
						),
						
						'bgalign' => array(
							'label'   => esc_html__( 'Background position', 'flox' ),
							'type'    => 'select',
							'value'   => 'bg-cc',
							'choices' => array(
								'bg-cc' => 'center center',
								'bg-ct' => 'center top',
								'bg-cb' => 'center bottom',
								'bg-lt' => 'left top',
								'bg-lc' => 'left center',
								'bg-lb' => 'left bottom',
								'bg-rt' => 'right top',
								'bg-rc' => 'right center',
								'bg-rb' => 'right bottom',
							),
						),

						'bgrepeat' => array(
							'label'   => esc_html__( 'Background repeat', 'flox' ),
							'type'    => 'short-select',
							'value'   => 'no-repeat',
							'choices' => array(
								'no-repeat' => 'No repeat',
								'bg-repeat' => 'Repeat-xy',
								'bg-repeat-x' => 'Repeat-x',
								'bg-repeat-y' => 'Repeat-y',
							),
						),

						'bgsize' => array(
							'label'   => esc_html__( 'Background size', 'flox' ),
							'type'    => 'short-select',
							'value'   => 'bg-cover',
							'choices' => array(
								'bg-cover' => 'Cover',
								'bg-contain' => 'Contain',
								'bg-normal' => 'Normal',
							),
						),

					),
					'bgslider' => array(
						'slide_images' => array(
							'type'  => 'multi-upload',
							'label' => esc_html__( 'Upload slider images', 'flox' ),
							'desc'  => esc_html__( 'Set slider images from media library', 'flox' ),
							'images_only' => true,
						),
					),
				),

			),
		),
	),


	/**
	 * YouTube background video
	 */
	'group_bgvideo' => array(
		'type' => 'group',
		'options' => array(
			'multi-bgvideo' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(

					'bgvideo' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Video type', 'flox' ),
						'desc'  => esc_html__( 'Select video background type', 'flox' ),
						'value'   => 'no',
						'choices' => array(
							'no' => 'Select video type',
							'youtube' => 'YouTube video',
							//'html' => 'HTML video',
						),
					),

				),
				'choices' => array(
					'youtube' => array(
						'yt_url' => array(
							'type'  => 'text',
							'label' => esc_html__( 'YouTube Video ID', 'flox' ),
							'desc'  => esc_html__( 'Enter your YouTube video ID', 'flox' ),
						),
					),

					'html' => array(
						'video_url' => array(
							'type'  => 'multi-upload',
							'label' => esc_html__( 'HTML Video', 'flox' ),
							'files_ext' => array( 'webm', 'ogv', 'mp4', 'jpg' ),
							'desc'  => sprintf( "Upload HTML video files as example given below:",
									esc_html__( 'All file name must be same name. <strong>Example: video.webm, video.ogv, video.mp4 and video.jpg</strong>', 'flox' ) ),
						),
					),
				),

			),
		),
	),


	/**
	 * Particle background video
	 */
	'group_particle' => array(
		'type' => 'group',
		'options' => array(
			'multi-particle' => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'particle_status' => array(
						'type'  => 'switch',
						'value' => 'no',
						'label' => esc_html__('Show particle effect?', 'flox'),
						'left-choice' => array(
							'value' => 'no',
							'label' => esc_html__('No', 'flox'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'flox'),
						),
					),
				),
				'choices' => array(),
			),
		),
	),


);