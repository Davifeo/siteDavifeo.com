<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Helper functions and classes with static methods for usage in theme
 */


if ( ! function_exists( 'fw_theme_the_attached_image' ) ) : /**
 * Print the attached image with a link to the next attached image.
 */ {
	function fw_theme_the_attached_image() {
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters( 'fw_theme_attachment_size', array( 810, 810 ) );
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts( array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => - 1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		) );

		// If there is more than 1 attachment in a gallery...
		if ( count( $attachment_ids ) > 1 ) {
			foreach ( $attachment_ids as $attachment_id ) {
				if ( $attachment_id == $post->ID ) {
					$next_id = current( $attachment_ids );
					break;
				}
			}

			// get the URL of the next image attachment...
			if ( $next_id ) {
				$next_attachment_url = get_attachment_link( $next_id );
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
			}
		}

		printf( '<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url( $next_attachment_url ),
			wp_get_attachment_image( $post->ID, $attachment_size )
		);
	}
}
endif;



/*
 * String check
 *************************/
function ckav_check_str($str, $needle = '') {
	if (strpos($str, $needle) !== false) {
		return true;
	} else {
		return false;
	}
}



/*
 * Display link if menu not assigned
 *************************/
if ( ! function_exists( 'ckav_set_menu' ) ) :
	function ckav_set_menu() {
		if( current_user_can( 'manage_options' ) ) : ?>
			<a href="<?php echo admin_url('nav-menus.php?action=edit'); ?>">
				<?php esc_html_e('Click here to setup menu','flox'); ?>
			</a>
		<?php endif;
	}
endif;


/*
 * Get template file name
 *************************/
function ckav_template_name() {
	global $template;
	return basename($template);
}


/*
 * Remove tags
 *************************/
if ( ! function_exists( 'ckav_remove_tag' ) ) :
	function ckav_remove_tag( $data, $tag_arr ) {
		$o = str_replace( $tag_arr, "", $data );
		return $o;
	}
endif;


/**
 * Unique ID
 * @param  integer $length [length of unique ID]
 * @return String          [Return unique ID string]
 */
function uid($length = 6) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return 'flox'.$randomString;
}


/*
 * Generate random unique md5
 *************************/
function ckav_rand_md5() {
	return md5( time() . '-' . uniqid( rand(), true ) . '-' . mt_rand( 1, 1000 ) );
}

