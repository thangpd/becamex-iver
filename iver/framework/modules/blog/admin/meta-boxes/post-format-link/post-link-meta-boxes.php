<?php

if ( ! function_exists( 'iver_select_map_post_link_meta' ) ) {
	function iver_select_map_post_link_meta() {
		$link_post_format_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'iver' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'iver' ),
				'description' => esc_html__( 'Enter link', 'iver' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_post_link_meta', 24 );
}