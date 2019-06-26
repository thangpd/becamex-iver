<?php

if ( ! function_exists( 'iver_select_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function iver_select_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'IverSelectSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_sidearea_opener_widget' );
}