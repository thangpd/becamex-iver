<?php

if ( ! function_exists( 'iver_select_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function iver_select_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'iver' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'iver' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'iver_select_additional_title_area_meta_boxes', 'iver_select_breadcrumbs_title_type_options_meta_boxes' );
}