<?php

if ( ! function_exists( 'iver_select_map_footer_meta' ) ) {
	function iver_select_map_footer_meta() {
		
		$footer_meta_box = iver_select_create_meta_box(
			array(
				'scope' => apply_filters( 'iver_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'iver' ),
				'name'  => 'footer_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'iver' ),
				'options'       => iver_select_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = iver_select_add_admin_container(
			array(
				'name'       => 'qodef_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			iver_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'iver' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'iver' ),
					'options'       => iver_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			iver_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'iver' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'iver' ),
					'options'       => iver_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

        iver_select_create_meta_box_field(
            array(
                'name'          => 'qodef_footer_in_grid_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Footer in Grid', 'iver' ),
                'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'iver' ),
                'options'       => iver_select_get_yes_no_select_array(),
                'dependency' => array(
                    'hide' => array(
                        'qodef_show_footer_top_meta' => array('', 'no'),
                        'qodef_show_footer_bottom_meta' => array('', 'no')
                    )
                ),
                'parent'        => $show_footer_meta_container
            )
        );

        iver_select_create_meta_box_field(
            array(
                'name'          => 'qodef_uncovering_footer_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Uncovering Footer', 'iver' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'iver' ),
                'options'       => iver_select_get_yes_no_select_array(),
                'parent'        => $show_footer_meta_container,
            )
        );
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_footer_meta', 70 );
}