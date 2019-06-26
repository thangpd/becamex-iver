<?php

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'iver_select_map_blog_meta' ) ) {
	function iver_select_map_blog_meta() {
		$qodef_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$qodef_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'iver' ),
				'name'  => 'blog_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'iver' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'iver' ),
				'parent'      => $blog_meta_box,
				'options'     => $qodef_blog_categories
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'iver' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'iver' ),
				'parent'      => $blog_meta_box,
				'options'     => $qodef_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'iver' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'iver' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'iver' ),
					'in-grid'    => esc_html__( 'In Grid', 'iver' ),
					'full-width' => esc_html__( 'Full Width', 'iver' )
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'iver' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'iver' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'iver' ),
					'two'   => esc_html__( '2 Columns', 'iver' ),
					'three' => esc_html__( '3 Columns', 'iver' ),
					'four'  => esc_html__( '4 Columns', 'iver' ),
					'five'  => esc_html__( '5 Columns', 'iver' )
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'iver' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'iver' ),
				'options'     => iver_select_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'iver' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'iver' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'iver' ),
					'fixed'    => esc_html__( 'Fixed', 'iver' ),
					'original' => esc_html__( 'Original', 'iver' )
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'iver' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'iver' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'iver' ),
					'standard'        => esc_html__( 'Standard', 'iver' ),
					'load-more'       => esc_html__( 'Load More', 'iver' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'iver' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'iver' )
				)
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'qodef_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'iver' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'iver' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_blog_meta', 30 );
}