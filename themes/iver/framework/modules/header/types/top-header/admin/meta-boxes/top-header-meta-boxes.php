<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function iver_select_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'iver_select_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_header_top_area_meta_options_map' ) ) {
	function iver_select_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = iver_select_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = iver_select_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		iver_select_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'iver' )
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'iver' ),
				'parent'        => $top_header_container,
				'options'       => iver_select_get_yes_no_select_array(),
			)
		);
		
		$top_bar_container = iver_select_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'dependency' => array(
					'show' => array(
						'qodef_top_bar_meta' => 'yes'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'iver' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'iver' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'   => 'qodef_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'iver' ),
				'parent' => $top_bar_container
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'iver' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'iver' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'iver' ),
				'description'   => esc_html__( 'Set border on top bar', 'iver' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
		$top_bar_border_container = iver_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'show' => array(
						'qodef_top_bar_border_meta' => 'yes'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'iver' ),
				'description' => esc_html__( 'Choose color for top bar border', 'iver' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'iver_select_additional_header_area_meta_boxes_map', 'iver_select_header_top_area_meta_options_map', 10, 1 );
}