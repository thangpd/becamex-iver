<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_header_standard_options' ) ) {
	function iver_select_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'iver_select_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_header_standard_map' ) ) {
	function iver_select_header_standard_map( $parent ) {
		$hide_dep_options = iver_select_get_hide_dep_for_header_standard_options();
		
		iver_select_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'iver' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'iver' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'iver' ),
					'left'   => esc_html__( 'Left', 'iver' ),
					'center' => esc_html__( 'Center', 'iver' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'iver_select_additional_header_menu_area_options_map', 'iver_select_header_standard_map' );
}