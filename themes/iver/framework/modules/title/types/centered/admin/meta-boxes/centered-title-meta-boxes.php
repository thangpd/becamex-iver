<?php

if ( ! function_exists( 'iver_select_centered_title_type_options_meta_boxes' ) ) {
	function iver_select_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'iver' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'iver' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'iver_select_additional_title_area_meta_boxes', 'iver_select_centered_title_type_options_meta_boxes', 5 );
}