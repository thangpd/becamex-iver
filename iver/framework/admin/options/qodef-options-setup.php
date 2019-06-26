<?php

if ( ! function_exists( 'iver_select_admin_map_init' ) ) {
	function iver_select_admin_map_init() {
		do_action( 'iver_select_before_options_map' );
		
		require_once SELECT_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once SELECT_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once SELECT_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once SELECT_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once SELECT_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'iver_select_options_map' );
		
		do_action( 'iver_select_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'iver_select_admin_map_init', 1 );
}