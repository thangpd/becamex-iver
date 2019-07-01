<?php

if ( ! function_exists( 'iver_select_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function iver_select_register_blog_list_widget( $widgets ) {
		$widgets[] = 'IverSelectBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_blog_list_widget' );
}