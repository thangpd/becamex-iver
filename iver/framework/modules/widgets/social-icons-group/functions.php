<?php

if ( ! function_exists( 'iver_select_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function iver_select_register_social_icons_widget( $widgets ) {
		$widgets[] = 'IverSelectClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_social_icons_widget' );
}