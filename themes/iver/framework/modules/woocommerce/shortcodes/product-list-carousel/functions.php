<?php

if ( ! function_exists( 'iver_select_add_product_list_carousel_shortcode' ) ) {
	function iver_select_add_product_list_carousel_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'IverCore\CPT\Shortcodes\ProductListCarousel\ProductListCarousel',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( iver_select_core_plugin_installed() ) {
		add_filter( 'iver_core_filter_add_vc_shortcode', 'iver_select_add_product_list_carousel_shortcode' );
	}
}

if ( ! function_exists( 'iver_select_add_product_list_carousel_into_shortcodes_list' ) ) {
	function iver_select_add_product_list_carousel_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'qodef_product_list_carousel';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'iver_select_woocommerce_shortcodes_list', 'iver_select_add_product_list_carousel_into_shortcodes_list' );
}