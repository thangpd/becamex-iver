<?php

if ( ! function_exists( 'iver_select_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function iver_select_register_author_info_widget( $widgets ) {
		$widgets[] = 'IverSelectAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_author_info_widget' );
}