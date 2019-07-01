<?php

if ( ! function_exists( 'iver_select_map_general_meta' ) ) {
	function iver_select_map_general_meta() {
		
		$general_meta_box = iver_select_create_meta_box(
			array(
				'scope' => apply_filters( 'iver_select_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'iver' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'iver' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'iver' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'iver' ),
				'parent'        => $general_meta_box
			)
		);
		
		$qodef_content_padding_group = iver_select_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'iver' ),
				'description' => esc_html__( 'Define styles for Content area', 'iver' ),
				'parent'      => $general_meta_box
			)
		);
		
			$qodef_content_padding_row = iver_select_add_admin_row(
				array(
					'name'   => 'qodef_content_padding_row',
					'next'   => true,
					'parent' => $qodef_content_padding_group
				)
			);
		
				iver_select_create_meta_box_field(
					array(
						'name'   => 'qodef_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'iver' ),
						'parent' => $qodef_content_padding_row,
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'    => 'qodef_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'iver' ),
						'parent'  => $qodef_content_padding_row,
					)
				);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'iver' ),
				'description' => esc_html__( 'Choose background color for page content', 'iver' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'    => 'qodef_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'iver' ),
				'parent'  => $general_meta_box,
				'options' => iver_select_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = iver_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'iver' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'iver' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'iver' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'iver' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'iver' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'iver' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'          => 'qodef_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'iver' ),
						'description'   => esc_html__( 'Choose background image attachment', 'iver' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'iver' ),
							'fixed'  => esc_html__( 'Fixed', 'iver' ),
							'scroll' => esc_html__( 'Scroll', 'iver' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/

        /***************** Inner Boxed Layout - begin **********************/

        iver_select_create_meta_box_field(
            array(
                'name'    => 'qodef_inner_boxed_meta',
                'type'    => 'select',
                'label'   => esc_html__( 'Boxed Inner Layout', 'iver' ),
                'parent'  => $general_meta_box,
                'options' => iver_select_get_yes_no_select_array(),
                'args'    => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '#qodef_inner_boxed_container_meta',
                        'no'  => '#qodef_inner_boxed_container_meta',
                        'yes' => ''
                    ),
                    'show'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#qodef_inner_boxed_container_meta'
                    )
                )
            )
        );

        $inner_boxed_container_meta = iver_select_add_admin_container(
            array(
                'parent'          => $general_meta_box,
                'name'            => 'inner_boxed_container_meta',
                'hidden_property' => 'qodef_inner_boxed_meta',
                'hidden_values'   => array(
                    '',
                    'no'
                )
            )
        );

        iver_select_create_meta_box_field(
            array(
                'name'        => 'qodef_page_inner_background_color_meta',
                'type'        => 'color',
                'label'       => esc_html__( 'Page Inner Background Color', 'iver' ),
                'description' => esc_html__( 'Choose the page inner background color outside box', 'iver' ),
                'parent'      => $inner_boxed_container_meta
            )
        );

        $qodef_inner_boxed_padding_group = iver_select_add_admin_group(
            array(
                'name'        => 'inner_boxed_padding_group',
                'title'       => esc_html__( 'Page Inner Style', 'iver' ),
                'description' => esc_html__( 'Define style for inner boxed area', 'iver' ),
                'parent'      => $inner_boxed_container_meta
            )
        );

        $qodef_content_padding_row = iver_select_add_admin_row(
            array(
                'name'   => 'qodef_content_padding_row',
                'next'   => true,
                'parent' => $qodef_inner_boxed_padding_group
            )
        );

        iver_select_create_meta_box_field(
            array(
                'name'        => 'qodef_page_inner_margin_top_meta',
                'type'        => 'textsimple',
                'label'       => esc_html__( 'Margin Top', 'iver' ),
                'parent'      => $qodef_content_padding_row,
                'args'        => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                )
            )
        );

        iver_select_create_meta_box_field(
            array(
                'name'   => 'qodef_page_inner_padding_meta',
                'type'   => 'textsimple',
                'label'  => esc_html__( 'Left/Right Padding', 'iver' ),
                'parent' => $qodef_content_padding_row,
                'args'   => array(
                    'suffix' => 'px'
                )
            )
        );

        /***************** Inner Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'iver' ),
				'parent'        => $general_meta_box,
				'options'       => iver_select_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = iver_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'qodef_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'iver' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'iver' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'iver' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'iver' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'iver' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'iver' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				iver_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'iver' ),
						'options'       => iver_select_get_yes_no_select_array(),
					)
				);
		
				iver_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'iver' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'iver' ),
						'options'       => iver_select_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'iver' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'iver' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'iver' ),
					'qodef-grid-1100' => esc_html__( '1100px', 'iver' ),
					'qodef-grid-1300' => esc_html__( '1300px', 'iver' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'iver' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'iver' ),
					'qodef-grid-800'  => esc_html__( '800px', 'iver' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'iver' ),
				'parent'        => $general_meta_box,
				'options'       => iver_select_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = iver_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				iver_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'iver' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'iver' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => iver_select_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = iver_select_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'qodef_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					iver_select_create_meta_box_field(
						array(
							'name'   => 'qodef_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'iver' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = iver_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'iver' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'iver' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = iver_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					iver_select_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'qodef_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'iver' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'iver' ),
								'line'       			=> esc_html__( 'Line', 'iver' ),
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
					
					iver_select_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'qodef_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'iver' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					iver_select_create_meta_box_field(
						array(
							'name'        => 'qodef_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'iver' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'iver' ),
							'options'     => iver_select_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'iver' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'iver' ),
				'parent'      => $general_meta_box,
				'options'     => iver_select_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_general_meta', 10 );
}