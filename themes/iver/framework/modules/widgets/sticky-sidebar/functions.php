<?php

if(!function_exists('iver_select_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function iver_select_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'IverSelectStickySidebar';
		
		return $widgets;
	}
	
	add_filter('iver_select_register_widgets', 'iver_select_register_sticky_sidebar_widget');
}