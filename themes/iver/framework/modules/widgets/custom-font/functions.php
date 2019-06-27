<?php

if ( ! function_exists( 'iver_select_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function iver_select_register_custom_font_widget( $widgets ) {
		$widgets[] = 'IverSelectCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_custom_font_widget' );
}