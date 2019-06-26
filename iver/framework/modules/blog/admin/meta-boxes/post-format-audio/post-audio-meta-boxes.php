<?php

if ( ! function_exists( 'iver_select_map_post_audio_meta' ) ) {
	function iver_select_map_post_audio_meta() {
		$audio_post_format_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'iver' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'iver' ),
				'description'   => esc_html__( 'Choose audio type', 'iver' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'iver' ),
					'self'            => esc_html__( 'Self Hosted', 'iver' )
				)
			)
		);
		
		$qodef_audio_embedded_container = iver_select_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'qodef_audio_embedded_container'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'iver' ),
				'description' => esc_html__( 'Enter audio URL', 'iver' ),
				'parent'      => $qodef_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'iver' ),
				'description' => esc_html__( 'Enter audio link', 'iver' ),
				'parent'      => $qodef_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_post_audio_meta', 23 );
}