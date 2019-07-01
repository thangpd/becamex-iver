<?php

if ( ! function_exists( 'iver_select_get_title_types_meta_boxes' ) ) {
	function iver_select_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'iver_select_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'iver' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'iver_select_map_title_meta' ) ) {
	function iver_select_map_title_meta() {
		$title_type_meta_boxes = iver_select_get_title_types_meta_boxes();
		
		$title_meta_box = iver_select_create_meta_box(
			array(
				'scope' => apply_filters( 'iver_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'iver' ),
				'name'  => 'title_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'iver' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'iver' ),
				'parent'        => $title_meta_box,
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = iver_select_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'qodef_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'qodef_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'iver' ),
						'description'   => esc_html__( 'Choose title type', 'iver' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'iver' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'iver' ),
						'options'       => iver_select_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'iver' ),
						'description' => esc_html__( 'Set a height for Title Area', 'iver' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'iver' ),
						'description' => esc_html__( 'Choose a background color for title area', 'iver' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'iver' ),
						'description' => esc_html__( 'Choose an Image for title area', 'iver' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'iver' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'iver' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'iver' ),
							'hide'                => esc_html__( 'Hide Image', 'iver' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'iver' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'iver' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'iver' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'iver' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'iver' )
						)
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'iver' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'iver' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'iver' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'iver' ),
							'window-top'    => esc_html__( 'From Window Top', 'iver' ),
                            'bottom'        => esc_html__( 'Bottom', 'iver' )
						)
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'iver' ),
						'options'       => iver_select_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'iver' ),
						'description' => esc_html__( 'Choose a color for title text', 'iver' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'iver' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'iver' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'iver' ),
						'options'       => iver_select_get_title_tag( true, array( 'p' => 'p', 'span' => 'span' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'iver' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'iver' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'iver_select_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_title_meta', 60 );
}