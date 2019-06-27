<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_top_header_options' ) ) {
	function iver_select_get_hide_dep_for_top_header_options() {
		$hide_dep_options = apply_filters( 'iver_select_top_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_header_top_options_map' ) ) {
	function iver_select_header_top_options_map( $panel_header ) {
		$hide_dep_options = iver_select_get_hide_dep_for_top_header_options();
		
		$top_header_container = iver_select_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'iver' ),
				'parent'        => $top_header_container,
			)
		);
		
		$top_bar_container = iver_select_add_admin_container(
			array(
				'name'            => 'top_bar_container',
				'parent'          => $top_header_container,
				'dependency' => array(
					'hide' => array(
						'top_bar'  => 'no'
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in Grid', 'iver' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'iver' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_in_grid_container = iver_select_add_admin_container(
			array(
				'name'            => 'top_bar_in_grid_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_in_grid'  => 'no'
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'iver' ),
				'description' => esc_html__( 'Set grid background color for top bar', 'iver' ),
				'parent'      => $top_bar_in_grid_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'iver' ),
				'description' => esc_html__( 'Set grid background transparency for top bar', 'iver' ),
				'parent'      => $top_bar_in_grid_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'top_bar_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'Set background color for top bar', 'iver' ),
				'parent'      => $top_bar_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'top_bar_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'iver' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'iver' ),
				'parent'      => $top_bar_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar Border', 'iver' ),
				'description'   => esc_html__( 'Set top bar border', 'iver' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_border_container = iver_select_add_admin_container(
			array(
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_border'  => 'no'
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'top_bar_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Top Bar Border Color', 'iver' ),
				'description' => esc_html__( 'Set border color for top bar', 'iver' ),
				'parent'      => $top_bar_border_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'top_bar_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Height', 'iver' ),
				'description' => esc_html__( 'Enter top bar height (Default is 46px)', 'iver' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'   => 'top_bar_side_padding',
				'type'   => 'text',
				'label'  => esc_html__( 'Top Bar Side Padding', 'iver' ),
				'parent' => $top_bar_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'iver' )
				)
			)
		);
	}
	
	add_action( 'iver_select_header_top_options_map', 'iver_select_header_top_options_map', 10, 1 );
}