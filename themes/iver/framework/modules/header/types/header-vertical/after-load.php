<?php

if ( ! function_exists( 'iver_select_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function iver_select_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( iver_select_check_is_header_type_enabled( 'header-vertical', iver_select_get_page_id() ) ) {
		add_filter( 'iver_select_allow_sticky_header_behavior', 'iver_select_disable_behaviors_for_header_vertical' );
		add_filter( 'iver_select_allow_content_boxed_layout', 'iver_select_disable_behaviors_for_header_vertical' );
	}
}