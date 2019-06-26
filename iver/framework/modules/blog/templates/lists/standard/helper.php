<?php

if ( ! function_exists( 'iver_select_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function iver_select_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'qodef-container';
		$params_list['inner']  = 'qodef-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'iver_select_blog_holder_params', 'iver_select_get_blog_holder_params' );
}

if ( ! function_exists( 'iver_select_get_blog_holder_classes' ) ) {
	/**
	 * Function that generates blog holder classes for blog page
	 */
	function iver_select_get_blog_holder_classes( $classes ) {
		$sidebar_classes   = array();
		$sidebar_classes[] = 'qodef-grid-large-gutter';
		
		return implode( ' ', $sidebar_classes );
	}
	
	add_filter( 'iver_select_blog_holder_classes', 'iver_select_get_blog_holder_classes' );
}

if ( ! function_exists( 'iver_select_blog_part_params' ) ) {
	function iver_select_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h2';
		$part_params['link_tag']  = 'h3';
		$part_params['quote_tag'] = 'h3';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'iver_select_blog_part_params', 'iver_select_blog_part_params' );
}