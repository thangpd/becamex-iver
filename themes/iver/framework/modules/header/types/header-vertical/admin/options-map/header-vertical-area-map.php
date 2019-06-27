<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_header_vertical_area_options' ) ) {
	function iver_select_get_hide_dep_for_header_vertical_area_options() {
		$hide_dep_options = apply_filters( 'iver_select_header_vertical_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_header_vertical_options_map' ) ) {
	function iver_select_header_vertical_options_map( $panel_header ) {
		$hide_dep_options = iver_select_get_hide_dep_for_header_vertical_area_options();
		
		$vertical_area_container = iver_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		iver_select_add_admin_section_title(
			array(
				'parent' => $vertical_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'vertical_header_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'iver' ),
				'parent'      => $vertical_area_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'vertical_header_background_image',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'iver' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'iver' ),
				'parent'        => $vertical_area_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $vertical_area_container,
				'type'          => 'yesno',
				'name'          => 'vertical_header_shadow',
				'default_value' => 'no',
				'label'         => esc_html__( 'Shadow', 'iver' ),
				'description'   => esc_html__( 'Set shadow on vertical header', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $vertical_area_container,
				'type'          => 'yesno',
				'name'          => 'vertical_header_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Vertical Area Border', 'iver' ),
				'description'   => esc_html__( 'Set border on vertical area', 'iver' )
			)
		);
		
		$vertical_header_shadow_border_container = iver_select_add_admin_container(
			array(
				'parent'          => $vertical_area_container,
				'name'            => 'vertical_header_shadow_border_container',
				'dependency' => array(
					'hide' => array(
						'vertical_header_border'  => 'no'
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $vertical_header_shadow_border_container,
				'type'          => 'color',
				'name'          => 'vertical_header_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'iver' ),
				'description'   => esc_html__( 'Set border color for vertical area', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $vertical_area_container,
				'type'          => 'yesno',
				'name'          => 'vertical_header_center_content',
				'default_value' => 'no',
				'label'         => esc_html__( 'Center Content', 'iver' ),
				'description'   => esc_html__( 'Set content in vertical center', 'iver' ),
			)
		);
		
		do_action( 'iver_select_header_vertical_area_additional_options', $panel_header );
	}
	
	add_action( 'iver_select_additional_header_menu_area_options_map', 'iver_select_header_vertical_options_map' );
}