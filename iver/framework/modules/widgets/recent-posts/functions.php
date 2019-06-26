<?php

if ( ! function_exists( 'iver_select_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function iver_select_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'IverSelectRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_recent_posts_widget' );
}