<?php

/*** Post Settings ***/

if ( ! function_exists( 'iver_select_map_post_meta' ) ) {
	function iver_select_map_post_meta() {
		
		$post_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'iver' ),
				'name'  => 'post-meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'iver' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'iver' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => iver_select_get_custom_sidebars_options( true )
			)
		);
		
		$iver_custom_sidebars = iver_select_get_custom_sidebars();
		if ( count( $iver_custom_sidebars ) > 0 ) {
			iver_select_create_meta_box_field( array(
				'name'        => 'qodef_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'iver' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'iver' ),
				'parent'      => $post_meta_box,
				'options'     => iver_select_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'iver' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'iver' ),
				'parent'      => $post_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'iver' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'iver' ),
				'default_value' => 'small',
				'parent'        => $post_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'iver' ),
					'large-width'        => esc_html__( 'Large Width', 'iver' ),
					'large-height'       => esc_html__( 'Large Height', 'iver' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'iver' )
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'iver' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'iver' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'iver' ),
					'large-width' => esc_html__( 'Large Width', 'iver' )
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'iver' ),
				'parent'        => $post_meta_box,
				'options'       => iver_select_get_yes_no_select_array()
			)
		);

		do_action('iver_select_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_post_meta', 20 );
}
