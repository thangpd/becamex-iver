<?php

if ( ! function_exists( 'iver_select_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function iver_select_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'iver' );
		
		return $type;
	}
	
	add_filter( 'iver_select_title_type_global_option', 'iver_select_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'iver_select_title_type_meta_boxes', 'iver_select_set_title_standard_with_breadcrumbs_type_for_options' );
}