<?php
/**
 * The Content Sidebar
 */

if ( ! is_active_sidebar( 'sticky-sidebar' ) ) {
	return;
}
dynamic_sidebar( 'sticky-sidebar' );