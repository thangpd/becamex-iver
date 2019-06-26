<?php

if ( ! function_exists( 'iver_select_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function iver_select_reset_options_map() {
		
		iver_select_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'iver' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = iver_select_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'iver' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'iver' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'iver_select_options_map', 'iver_select_reset_options_map', 100 );
}