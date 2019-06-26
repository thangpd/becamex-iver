<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = SELECT_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'iver_select_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function iver_select_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'iver_select_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'iver_select_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function iver_select_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'iver' ),
				'value'      => array(
					esc_html__( 'Full Width', 'iver' ) => 'full-width',
					esc_html__( 'In Grid', 'iver' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Select Anchor ID', 'iver' ),
				'description' => esc_html__( 'For example "home"', 'iver' ),
				'group'       => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'iver' ),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'iver' ),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'iver' ),
				'value'       => array(
					esc_html__( 'Never', 'iver' )        => '',
					esc_html__( 'Below 1280px', 'iver' ) => '1280',
					esc_html__( 'Below 1024px', 'iver' ) => '1024',
					esc_html__( 'Below 768px', 'iver' )  => '768',
					esc_html__( 'Below 680px', 'iver' )  => '680',
					esc_html__( 'Below 480px', 'iver' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'iver' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Select Parallax Background Image', 'iver' ),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Select Parallax Speed', 'iver' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'iver' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Select Parallax Section Height (px)', 'iver' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'iver' ),
				'value'      => array(
					esc_html__( 'Default', 'iver' ) => '',
					esc_html__( 'Left', 'iver' )    => 'left',
					esc_html__( 'Center', 'iver' )  => 'center',
					esc_html__( 'Right', 'iver' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'iver' ),
				'value'      => array(
					esc_html__( 'Full Width', 'iver' ) => 'full-width',
					esc_html__( 'In Grid', 'iver' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'iver' ),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'iver' ),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'iver' ),
				'value'       => array(
					esc_html__( 'Never', 'iver' )        => '',
					esc_html__( 'Below 1280px', 'iver' ) => '1280',
					esc_html__( 'Below 1024px', 'iver' ) => '1024',
					esc_html__( 'Below 768px', 'iver' )  => '768',
					esc_html__( 'Below 680px', 'iver' )  => '680',
					esc_html__( 'Below 480px', 'iver' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'iver' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'iver' ),
				'value'      => array(
					esc_html__( 'Default', 'iver' ) => '',
					esc_html__( 'Left', 'iver' )    => 'left',
					esc_html__( 'Center', 'iver' )  => 'center',
					esc_html__( 'Right', 'iver' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'iver' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( iver_select_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Select Enable Passepartout', 'iver' ),
					'value'       => array_flip( iver_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Select Settings', 'iver' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Select Passepartout Size', 'iver' ),
					'value'       => array(
						esc_html__( 'Tiny', 'iver' )   => 'tiny',
						esc_html__( 'Small', 'iver' )  => 'small',
						esc_html__( 'Normal', 'iver' ) => 'normal',
						esc_html__( 'Large', 'iver' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'iver' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Select Disable Side Passepartout', 'iver' ),
					'value'       => array_flip( iver_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'iver' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Select Disable Top Passepartout', 'iver' ),
					'value'       => array_flip( iver_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'iver' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'iver_select_vc_row_map' );
}