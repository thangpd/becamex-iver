<?php

if ( ! function_exists( 'iver_select_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function iver_select_register_separator_widget( $widgets ) {
		$widgets[] = 'IverSelectSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_separator_widget' );
}