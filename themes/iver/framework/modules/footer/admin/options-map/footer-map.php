<?php

if ( ! function_exists( 'iver_select_footer_options_map' ) ) {
	function iver_select_footer_options_map() {

		iver_select_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'iver' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = iver_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'iver' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		iver_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'iver' ),
				'parent'        => $footer_panel
			)
		);

        iver_select_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'iver' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'iver' ),
                'parent'        => $footer_panel,
            )
        );

		iver_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'iver' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = iver_select_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		iver_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'iver' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'iver' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		iver_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'iver' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'iver' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'iver' ),
					'left'   => esc_html__( 'Left', 'iver' ),
					'center' => esc_html__( 'Center', 'iver' ),
					'right'  => esc_html__( 'Right', 'iver' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		iver_select_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'Set background color for top footer area', 'iver' ),
				'parent'      => $show_footer_top_container
			)
		);

		iver_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'named'          => 'show_footer_bottom',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Footer Bottom', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'iver' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = iver_select_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		iver_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'iver' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'iver' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		iver_select_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'iver' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'iver_select_options_map', 'iver_select_footer_options_map', 11 );
}