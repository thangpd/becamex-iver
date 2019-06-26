<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function iver_select_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'iver_select_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_header_standard_meta_map' ) ) {
	function iver_select_header_standard_meta_map( $parent ) {
		$hide_dep_options = iver_select_get_hide_dep_for_header_standard_meta_boxes();
		
		iver_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'qodef_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'iver' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'iver' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'iver' ),
					'left'   => esc_html__( 'Left', 'iver' ),
					'right'  => esc_html__( 'Right', 'iver' ),
					'center' => esc_html__( 'Center', 'iver' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'iver_select_additional_header_area_meta_boxes_map', 'iver_select_header_standard_meta_map' );
}