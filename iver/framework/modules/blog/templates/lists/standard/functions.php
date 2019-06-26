<?php

if ( ! function_exists( 'iver_select_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function iver_select_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'iver' );
		
		return $templates;
	}
	
	add_filter( 'iver_select_register_blog_templates', 'iver_select_register_blog_standard_template_file' );
}

if ( ! function_exists( 'iver_select_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function iver_select_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'iver' );
		
		return $options;
	}
	
	add_filter( 'iver_select_blog_list_type_global_option', 'iver_select_set_blog_standard_type_global_option' );
}