<?php

if ( ! function_exists( 'iver_select_sidebar_options_map' ) ) {
	function iver_select_sidebar_options_map() {
		
		iver_select_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'iver' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = iver_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'iver' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		iver_select_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'iver' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'iver' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => iver_select_get_custom_sidebars_options()
		) );
		
		$iver_custom_sidebars = iver_select_get_custom_sidebars();
		if ( count( $iver_custom_sidebars ) > 0 ) {
			iver_select_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'iver' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'iver' ),
				'parent'      => $sidebar_panel,
				'options'     => $iver_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'iver_select_options_map', 'iver_select_sidebar_options_map', 9 );
}