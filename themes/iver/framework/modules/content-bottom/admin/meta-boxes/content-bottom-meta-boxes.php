<?php

if ( ! function_exists( 'iver_select_map_content_bottom_meta' ) ) {
	function iver_select_map_content_bottom_meta() {
		
		$content_bottom_meta_box = iver_select_create_meta_box(
			array(
				'scope' => apply_filters( 'iver_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'iver' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'iver' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'iver' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = iver_select_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'qodef_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'iver' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'iver' ),
				'options'       => iver_select_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'iver' ),
				'options'       => iver_select_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'qodef_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'iver' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_content_bottom_meta', 71 );
}