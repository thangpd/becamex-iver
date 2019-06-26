<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function iver_select_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'iver_select_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_header_vertical_area_meta_options_map' ) ) {
	function iver_select_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = iver_select_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = iver_select_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		iver_select_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'iver' )
			)
		);
		
		$iver_custom_sidebars = iver_select_get_custom_sidebars();
		if ( count( $iver_custom_sidebars ) > 0 ) {
			iver_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'iver' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'iver' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $iver_custom_sidebars
				)
			);
		}
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'iver' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'iver' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'iver' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'iver' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'iver' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'iver' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'iver' ),
				'description'   => esc_html__( 'Set border on vertical area', 'iver' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = iver_select_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'qodef_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'iver' ),
				'description' => esc_html__( 'Choose color of border', 'iver' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'iver' ),
				'description'   => esc_html__( 'Set content in vertical center', 'iver' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'iver_select_additional_header_area_meta_boxes_map', 'iver_select_header_vertical_area_meta_options_map', 10, 1 );
}