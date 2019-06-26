<?php

if ( ! function_exists( 'iver_select_logo_meta_box_map' ) ) {
	function iver_select_logo_meta_box_map() {
		
		$logo_meta_box = iver_select_create_meta_box(
			array(
				'scope' => apply_filters( 'iver_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'iver' ),
				'name'  => 'logo_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'iver' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'iver' ),
				'parent'      => $logo_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'iver' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'iver' ),
				'parent'      => $logo_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'iver' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'iver' ),
				'parent'      => $logo_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'iver' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'iver' ),
				'parent'      => $logo_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'iver' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'iver' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_logo_meta_box_map', 47 );
}