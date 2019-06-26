<?php

if ( ! function_exists( 'iver_select_map_post_gallery_meta' ) ) {
	
	function iver_select_map_post_gallery_meta() {
		$gallery_post_format_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'iver' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		iver_select_add_multiple_images_field(
			array(
				'name'        => 'qodef_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'iver' ),
				'description' => esc_html__( 'Choose your gallery images', 'iver' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_post_gallery_meta', 21 );
}
