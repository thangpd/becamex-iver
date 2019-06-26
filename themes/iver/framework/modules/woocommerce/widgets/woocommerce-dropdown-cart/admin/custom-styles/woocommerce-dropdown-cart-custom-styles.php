<?php

if ( ! function_exists( 'iver_select_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function iver_select_dropdown_cart_icon_styles() {
		$icon_color       = iver_select_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = iver_select_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo iver_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo iver_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'iver_select_style_dynamic', 'iver_select_dropdown_cart_icon_styles' );
}