<?php

if ( ! function_exists( 'iver_select_logo_options_map' ) ) {
	function iver_select_logo_options_map() {
		
		iver_select_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'iver' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = iver_select_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'iver' )
			)
		);
		
		$hide_logo_container = iver_select_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'iver' ),
				'parent'        => $hide_logo_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'iver' ),
				'parent'        => $hide_logo_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'iver' ),
				'parent'        => $hide_logo_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'iver' ),
				'parent'        => $hide_logo_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'iver' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'iver_select_options_map', 'iver_select_logo_options_map', 2 );
}