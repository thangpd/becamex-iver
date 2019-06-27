<?php

if ( ! function_exists( 'iver_select_map_sidebar_meta' ) ) {
	function iver_select_map_sidebar_meta() {
		$qodef_sidebar_meta_box = iver_select_create_meta_box(
			array(
				'scope' => apply_filters( 'iver_select_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'iver' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'iver' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'iver' ),
				'parent'      => $qodef_sidebar_meta_box,
                'options'       => iver_select_get_custom_sidebars_options( true )
			)
		);
		
		$qodef_custom_sidebars = iver_select_get_custom_sidebars();
		if ( count( $qodef_custom_sidebars ) > 0 ) {
			iver_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'iver' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'iver' ),
					'parent'      => $qodef_sidebar_meta_box,
					'options'     => $qodef_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_sidebar_meta', 31 );
}