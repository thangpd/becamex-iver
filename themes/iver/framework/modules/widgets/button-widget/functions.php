<?php

if ( ! function_exists( 'iver_select_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function iver_select_register_button_widget( $widgets ) {
		$widgets[] = 'IverSelectButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_button_widget' );
}