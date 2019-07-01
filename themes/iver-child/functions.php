<?php

/*** Child Theme Function  ***/



if ( ! function_exists( 'select_iver_child_theme_enqueue_scripts' ) ) {
	function select_iver_child_theme_enqueue_scripts() {
		$parent_style = 'select-iver-default-style';

		wp_enqueue_style( 'select-iver-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
		wp_enqueue_style( 'select-iver-child-style-newcity', get_stylesheet_directory_uri() . '/style-newcity.css', array( $parent_style ) );
		wp_enqueue_style( 'select-iver-child-style-tdm', get_stylesheet_directory_uri() . '/style-tdm.css', array( $parent_style ) );
	}

	add_action( 'wp_enqueue_scripts', 'select_iver_child_theme_enqueue_scripts' );
}


if ( ! function_exists( 'template_redirect_demo' ) ) {

	function template_redirect_demo( $template ) {


		$blog_detail = get_blog_details( get_current_blog_id() );

		if ( is_page( array('rooms','deals-packages','dining','experience','events','photos','news-blog') ) && preg_match( '#tdm/$#', $blog_detail->path ) ) {
			$new_template = locate_template( array( 'template_tdm/page-tdm-template.php' ) );
			if ( ! empty( $new_template ) ) {
				return $new_template;
			}
		}
		if ( is_page( array('rooms','deals-packages','dining','experience','events','photos','news-blog') ) && preg_match( '#newcity/$#', $blog_detail->path ) ) {
			$new_template = locate_template( array( 'template_tdm/page-tdm-template.php' ) );
			if ( ! empty( $new_template ) ) {
				return $new_template;
			}
		}


		return $template;

	}

	add_filter( 'template_include', 'template_redirect_demo', 99 );

}







