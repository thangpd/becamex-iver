<?php

if ( ! function_exists( 'iver_select_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function iver_select_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'iver' );
		
		return $templates;
	}
	
	add_filter( 'iver_select_register_blog_templates', 'iver_select_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'iver_select_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function iver_select_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'iver' );
		
		return $options;
	}
	
	add_filter( 'iver_select_blog_list_type_global_option', 'iver_select_set_blog_masonry_type_global_option' );
}