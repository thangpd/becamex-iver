<?php

if ( ! function_exists( 'iver_select_register_header_vertical_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function iver_select_register_header_vertical_type( $header_types ) {
		$header_type = array(
			'header-vertical' => 'Iver\Modules\Header\Types\HeaderVertical'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'iver_select_init_register_header_vertical_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function iver_select_init_register_header_vertical_type() {
		add_filter( 'iver_select_register_header_type_class', 'iver_select_register_header_vertical_type' );
	}
	
	add_action( 'iver_select_before_header_function_init', 'iver_select_init_register_header_vertical_type' );
}

if ( ! function_exists( 'iver_select_include_header_vertical_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function iver_select_include_header_vertical_menu( $menus ) {
		$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'iver' );
		
		return $menus;
	}
	
	if ( iver_select_check_is_header_type_enabled( 'header-vertical' ) ) {
		add_filter( 'iver_select_register_headers_menu', 'iver_select_include_header_vertical_menu' );
	}
}

if ( ! function_exists( 'iver_select_register_header_vertical_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function iver_select_register_header_vertical_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-vertical-area',
				'name'          => esc_html__( 'Header Vertical Widget Area', 'iver' ),
				'description'   => esc_html__( 'Widgets added here will appear on the bottom of header vertical menu', 'iver' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-vertical-area-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="qodef-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( iver_select_check_is_header_type_enabled( 'header-vertical' ) ) {
		add_action( 'widgets_init', 'iver_select_register_header_vertical_widget_areas' );
	}
}

if ( ! function_exists( 'iver_select_get_header_vertical_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function iver_select_get_header_vertical_widget_areas() {
		$page_id                            = iver_select_get_page_id();
		$custom_vertical_header_widget_area = get_post_meta( $page_id, 'qodef_custom_vertical_area_sidebar_meta', true );
		
		if ( is_active_sidebar( 'qodef-vertical-area' ) && empty( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( 'qodef-vertical-area' );
		} else if ( ! empty( $custom_vertical_header_widget_area ) && is_active_sidebar( $custom_vertical_header_widget_area ) ) {
			dynamic_sidebar( $custom_vertical_header_widget_area );
		}
	}
}

if ( ! function_exists( 'iver_select_get_header_vertical_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function iver_select_get_header_vertical_main_menu() {
		$opening_class = '';
		$menu_opening = iver_select_options()->getOptionValue('vertical_menu_dropdown_opening');

		if ($menu_opening !== '') {
			$opening_class .= 'qodef-vertical-dropdown-'.$menu_opening;
		}

		$params = array(
			'opening_class' => $opening_class
		);

		iver_select_get_module_template_part( 'templates/vertical-navigation', 'header/types/header-vertical', '', $params );
	}
}

if ( ! function_exists( 'iver_select_vertical_header_holder_class' ) ) {
	/**
	 * Return holder class
	 */
	function iver_select_vertical_header_holder_class() {
		$center_content = iver_select_get_meta_field_intersect( 'vertical_header_center_content', iver_select_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'qodef-vertical-alignment-center' : 'qodef-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'iver_select_header_vertical_per_page_custom_styles' ) ) {
	/**
	 * Return header per page styles
	 */
	function iver_select_header_vertical_per_page_custom_styles( $style, $class_prefix, $page_id ) {
		$header_area_style    = array();
		$header_area_selector = array( $class_prefix . '.qodef-header-vertical .qodef-vertical-area-background' );
		
		$vertical_header_background_color  = get_post_meta( $page_id, 'qodef_vertical_header_background_color_meta', true );
		$disable_vertical_background_image = get_post_meta( $page_id, 'qodef_disable_vertical_header_background_image_meta', true );
		$vertical_background_image         = get_post_meta( $page_id, 'qodef_vertical_header_background_image_meta', true );
		$vertical_shadow                   = get_post_meta( $page_id, 'qodef_vertical_header_shadow_meta', true );
		$vertical_border                   = get_post_meta( $page_id, 'qodef_vertical_header_border_meta', true );
		
		if ( ! empty( $vertical_header_background_color ) ) {
			$header_area_style['background-color'] = $vertical_header_background_color;
		}
		
		if ( $disable_vertical_background_image == 'yes' ) {
			$header_area_style['background-image'] = 'none';
		} elseif ( $vertical_background_image !== '' ) {
			$header_area_style['background-image'] = 'url(' . $vertical_background_image . ')';
		}
		
		if ( $vertical_shadow == 'yes' ) {
			$header_area_style['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
		}
		
		if ( $vertical_border == 'yes' ) {
			$header_border_color = get_post_meta( $page_id, 'qodef_vertical_header_border_color_meta', true );
			
			if ( $header_border_color !== '' ) {
				$header_area_style['border-right'] = '1px solid ' . $header_border_color;
			}
		}
		
		$current_style = '';
		
		if ( ! empty( $header_area_style ) ) {
			$current_style .= iver_select_dynamic_css( $header_area_selector, $header_area_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'iver_select_add_header_page_custom_style', 'iver_select_header_vertical_per_page_custom_styles', 10, 3 );
}