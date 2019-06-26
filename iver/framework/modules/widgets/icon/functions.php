<?php

if ( ! function_exists( 'iver_select_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function iver_select_register_icon_widget( $widgets ) {
		$widgets[] = 'IverSelectIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_icon_widget' );
}