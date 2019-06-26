<?php

if ( ! function_exists( 'iver_select_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function iver_select_register_search_opener_widget( $widgets ) {
		$widgets[] = 'IverSelectSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_search_opener_widget' );
}