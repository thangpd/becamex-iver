<?php

if ( ! function_exists( 'iver_select_map_post_quote_meta' ) ) {
	function iver_select_map_post_quote_meta() {
		$quote_post_format_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'iver' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'iver' ),
				'description' => esc_html__( 'Enter Quote text', 'iver' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'iver' ),
				'description' => esc_html__( 'Enter Quote author', 'iver' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_post_quote_meta', 25 );
}