<?php

if ( ! function_exists( 'iver_select_disable_wpml_css' ) ) {
	function iver_select_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'iver_select_disable_wpml_css' );
}