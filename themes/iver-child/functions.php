<?php

/*** Child Theme Function  ***/

if ( !function_exists( 'select_iver_child_theme_enqueue_scripts' ) ) {
	function select_iver_child_theme_enqueue_scripts() {
		$parent_style = 'select-iver-default-style';

		wp_enqueue_style( 'select-iver-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
		wp_enqueue_style( 'select-iver-child-style-newcity', get_stylesheet_directory_uri() . '/style-newcity.css', array( $parent_style ) );
	}
	
	add_action( 'wp_enqueue_scripts', 'select_iver_child_theme_enqueue_scripts' );
}