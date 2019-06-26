<?php

if ( ! function_exists( 'iver_select_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function iver_select_search_body_class( $classes ) {
		$classes[] = 'qodef-fullscreen-search';
		$classes[] = 'qodef-search-fade';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'iver_select_search_body_class' );
}

if ( ! function_exists( 'iver_select_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function iver_select_get_search() {
		iver_select_load_search_template();
	}
	
	add_action( 'iver_select_before_page_header', 'iver_select_get_search' );
}

if ( ! function_exists( 'iver_select_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function iver_select_load_search_template() {
		$parameters = array(
			'search_close_icon_class' 	=> iver_select_get_search_close_icon_class(),
			'search_submit_icon_class' 	=> iver_select_get_search_submit_icon_class()
		);

        iver_select_get_module_template_part( 'types/fullscreen/templates/fullscreen', 'search', '', $parameters );
	}
}