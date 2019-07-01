<?php

if ( ! function_exists( 'iver_select_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function iver_select_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'iver' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'iver' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="qodef-widget-title-holder"><h3 class="qodef-widget-title">',
				'after_title'   => '</h3></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'iver_select_register_sidebars', 1 );
}

if ( ! function_exists( 'iver_select_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates IverSelectSidebar object
	 */
	function iver_select_add_support_custom_sidebar() {
		add_theme_support( 'IverSelectSidebar' );
		
		if ( get_theme_support( 'IverSelectSidebar' ) ) {
			new IverSelectSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'iver_select_add_support_custom_sidebar' );
}