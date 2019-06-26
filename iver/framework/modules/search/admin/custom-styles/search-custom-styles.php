<?php

if ( ! function_exists( 'iver_select_search_opener_icon_size' ) ) {
	function iver_select_search_opener_icon_size() {
		$icon_size = iver_select_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo iver_select_dynamic_css( '.qodef-search-opener', array(
				'font-size' => iver_select_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'iver_select_style_dynamic', 'iver_select_search_opener_icon_size' );
}

if ( ! function_exists( 'iver_select_search_opener_icon_colors' ) ) {
	function iver_select_search_opener_icon_colors() {
		$icon_color       = iver_select_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = iver_select_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo iver_select_dynamic_css( '.qodef-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo iver_select_dynamic_css( '.qodef-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'iver_select_style_dynamic', 'iver_select_search_opener_icon_colors' );
}

if ( ! function_exists( 'iver_select_search_opener_text_styles' ) ) {
	function iver_select_search_opener_text_styles() {
		$item_styles = iver_select_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.qodef-search-icon-text'
		);
		
		echo iver_select_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = iver_select_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo iver_select_dynamic_css( '.qodef-search-opener:hover .qodef-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'iver_select_style_dynamic', 'iver_select_search_opener_text_styles' );
}