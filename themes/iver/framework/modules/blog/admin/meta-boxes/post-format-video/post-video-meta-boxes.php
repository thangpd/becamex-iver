<?php

if ( ! function_exists( 'iver_select_map_post_video_meta' ) ) {
	function iver_select_map_post_video_meta() {
		$video_post_format_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'iver' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'iver' ),
				'description'   => esc_html__( 'Choose video type', 'iver' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'iver' ),
					'self'            => esc_html__( 'Self Hosted', 'iver' )
				)
			)
		);
		
		$qodef_video_embedded_container = iver_select_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'qodef_video_embedded_container'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'iver' ),
				'description' => esc_html__( 'Enter Video URL', 'iver' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'iver' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'iver' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'iver' ),
				'description' => esc_html__( 'Enter video image', 'iver' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_post_video_meta', 22 );
}