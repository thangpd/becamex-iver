<?php

if ( ! function_exists( 'iver_select_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function iver_select_general_options_map() {
		
		iver_select_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'iver' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = iver_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'iver' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'iver' ),
				'parent'        => $panel_design_style
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'iver' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = iver_select_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'iver' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'iver' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'iver' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'iver' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'iver' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'iver' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'iver' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'iver' ),
					'100i' => esc_html__( '100 Thin Italic', 'iver' ),
					'200'  => esc_html__( '200 Extra-Light', 'iver' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'iver' ),
					'300'  => esc_html__( '300 Light', 'iver' ),
					'300i' => esc_html__( '300 Light Italic', 'iver' ),
					'400'  => esc_html__( '400 Regular', 'iver' ),
					'400i' => esc_html__( '400 Regular Italic', 'iver' ),
					'500'  => esc_html__( '500 Medium', 'iver' ),
					'500i' => esc_html__( '500 Medium Italic', 'iver' ),
					'600'  => esc_html__( '600 Semi-Bold', 'iver' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'iver' ),
					'700'  => esc_html__( '700 Bold', 'iver' ),
					'700i' => esc_html__( '700 Bold Italic', 'iver' ),
					'800'  => esc_html__( '800 Extra-Bold', 'iver' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'iver' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'iver' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'iver' )
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'iver' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'iver' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'iver' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'iver' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'iver' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'iver' ),
					'greek'        => esc_html__( 'Greek', 'iver' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'iver' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'iver' )
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'iver' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'iver' ),
				'parent'      => $panel_design_style
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'iver' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'iver' ),
				'parent'      => $panel_design_style
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'iver' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'iver' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		iver_select_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'iver' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = iver_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				iver_select_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'iver' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'iver' ),
						'parent'      => $boxed_container
					)
				);
				
				iver_select_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'iver' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'iver' ),
						'parent'      => $boxed_container
					)
				);
				
				iver_select_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'iver' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'iver' ),
						'parent'      => $boxed_container
					)
				);
				
				iver_select_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'iver' ),
						'description'   => esc_html__( 'Choose background image attachment', 'iver' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'iver' ),
							'fixed'  => esc_html__( 'Fixed', 'iver' ),
							'scroll' => esc_html__( 'Scroll', 'iver' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		iver_select_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'iver' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = iver_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				iver_select_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'iver' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'iver' ),
						'parent'      => $paspartu_container
					)
				);
				
				iver_select_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'iver' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'iver' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				iver_select_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'iver' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'iver' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				iver_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'iver' )
					)
				);
		
				iver_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'iver' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'iver' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		iver_select_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => 'qodef-grid-1300',
				'label'         => esc_html__( 'Initial Width of Content', 'iver' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'iver' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'qodef-grid-1100' => esc_html__( '1100px', 'iver' ),
					'qodef-grid-1300' => esc_html__( '1300px - default', 'iver' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'iver' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'iver' ),
					'qodef-grid-800'  => esc_html__( '800px', 'iver' )
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'iver' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'iver' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = iver_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'iver' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		iver_select_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'iver' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		iver_select_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'iver' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = iver_select_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				iver_select_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'iver' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'iver' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = iver_select_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
		
		
					iver_select_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'iver' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = iver_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'iver' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'iver' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = iver_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					iver_select_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'iver' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'line'        			=> esc_html__( 'Line', 'iver' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'iver' ),
								'pulse'                 => esc_html__( 'Pulse', 'iver' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'iver' ),
								'cube'                  => esc_html__( 'Cube', 'iver' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'iver' ),
								'stripes'               => esc_html__( 'Stripes', 'iver' ),
								'wave'                  => esc_html__( 'Wave', 'iver' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'iver' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'iver' ),
								'atom'                  => esc_html__( 'Atom', 'iver' ),
								'clock'                 => esc_html__( 'Clock', 'iver' ),
								'mitosis'               => esc_html__( 'Mitosis', 'iver' ),
								'lines'                 => esc_html__( 'Lines', 'iver' ),
								'fussion'               => esc_html__( 'Fussion', 'iver' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'iver' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'iver' )
							)
						)
					);
					
					iver_select_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'iver' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					iver_select_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'iver' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'iver' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		iver_select_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'iver' ),
				'parent'        => $panel_settings
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'iver' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = iver_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'iver' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'iver' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = iver_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'iver' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'iver' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'iver_select_options_map', 'iver_select_general_options_map', 1 );
}

if ( ! function_exists( 'iver_select_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function iver_select_page_general_style( $style ) {
		$current_style = '';
		$page_id       = iver_select_get_page_id();
		$class_prefix  = iver_select_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = iver_select_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = iver_select_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = iver_select_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = iver_select_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.qodef-boxed .qodef-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= iver_select_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.qodef-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled .qodef-sticky-header',
			'.qodef-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-sticky-header.header-appear',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = iver_select_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = iver_select_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( iver_select_string_ends_with( $paspartu_width, '%' ) || iver_select_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = iver_select_string_ends_with( $paspartu_width, '%' ) ? iver_select_filter_suffix( $paspartu_width, '%' ) : iver_select_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = iver_select_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.qodef-paspartu-enabled .qodef-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= iver_select_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= iver_select_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= iver_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = iver_select_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( iver_select_string_ends_with( $paspartu_responsive_width, '%' ) || iver_select_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = iver_select_string_ends_with( $paspartu_responsive_width, '%' ) ? iver_select_filter_suffix( $paspartu_responsive_width, '%' ) : iver_select_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = iver_select_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . iver_select_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . iver_select_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . iver_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}

        // inner boxed

        $class_prefix_with_single  = iver_select_get_unique_page_class( $page_id, true );

        $inner_boxed_background_style = array();

        $inner_boxed_page_background_color = iver_select_get_meta_field_intersect( 'page_inner_background_color', $page_id );
        if ( ! empty( $inner_boxed_page_background_color ) ) {
            $inner_boxed_background_style['background-color'] = $inner_boxed_page_background_color;
        }

        $inner_boxed_page_margin = iver_select_get_meta_field_intersect( 'page_inner_margin_top', $page_id );
        if ( ! empty( $inner_boxed_page_margin ) ) {
            $inner_boxed_background_style['margin-top'] = iver_select_filter_px($inner_boxed_page_margin).'px';
        }

        $inner_boxed_page_padding = iver_select_get_meta_field_intersect( 'page_inner_padding', $page_id );
        if ( ! empty( $inner_boxed_page_padding ) ) {
            $inner_boxed_background_style['padding-left'] = iver_select_filter_px($inner_boxed_page_padding).'px';
            $inner_boxed_background_style['padding-right'] = iver_select_filter_px($inner_boxed_page_padding).'px';
        }

        $inner_boxed_background_selector = array(
            $class_prefix_with_single . '.qodef-inner-boxed .qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
            $class_prefix_with_single . '.qodef-inner-boxed .qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner');

        if ( ! empty( $inner_boxed_background_style ) ) {
            $current_style .= iver_select_dynamic_css( $inner_boxed_background_selector, $inner_boxed_background_style );
        }

        $current_style = $current_style . $style;

        // inner boxed responsive
        $inner_boxed_background_style_media = array();
        $inner_boxed_media_res_start = '@media only screen and (max-width: 768px) {';
        $inner_boxed_media_res_end   = '}';

        if ( ! empty( $inner_boxed_page_margin ) &&  iver_select_filter_px($inner_boxed_page_margin) < '-20') {
            $inner_boxed_background_style_media['margin-top'] = '-20px';
        }

        if ( ! empty( $inner_boxed_background_style_media ) ) {
            $current_style .= $inner_boxed_media_res_start . iver_select_dynamic_css( $inner_boxed_background_selector, $inner_boxed_background_style_media ) . $inner_boxed_media_res_end;
        }
		
		return $current_style;
	}
	
	add_filter( 'iver_select_add_page_custom_style', 'iver_select_page_general_style' );
}