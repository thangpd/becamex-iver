<?php

if ( ! function_exists( 'iver_select_get_hide_dep_for_full_screen_menu_options' ) ) {
	function iver_select_get_hide_dep_for_full_screen_menu_options() {
		$hide_dep_options = apply_filters( 'iver_select_full_screen_menu_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'iver_select_fullscreen_menu_options_map' ) ) {
	function iver_select_fullscreen_menu_options_map() {
		$hide_dep_options = iver_select_get_hide_dep_for_full_screen_menu_options();
		
		$fullscreen_panel = iver_select_add_admin_panel(
			array(
				'title'           => esc_html__( 'Full Screen Menu', 'iver' ),
				'name'            => 'panel_fullscreen_menu',
				'page'            => '_header_page',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'select',
				'name'          => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label'         => esc_html__( 'Full Screen Menu Overlay Animation', 'iver' ),
				'description'   => esc_html__( 'Choose animation type for full screen menu overlay', 'iver' ),
				'options'       => array(
					'fade-push-text-right' => esc_html__( 'Fade Push Text Right', 'iver' ),
					'fade-push-text-top'   => esc_html__( 'Fade Push Text Top', 'iver' ),
					'fade-text-scaledown'  => esc_html__( 'Fade Text Scaledown', 'iver' )
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'yesno',
				'name'          => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Full Screen Menu in Grid', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will put full screen menu content in grid', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $fullscreen_panel,
				'type'          => 'selectblank',
				'name'          => 'fullscreen_alignment',
				'default_value' => '',
				'label'         => esc_html__( 'Full Screen Menu Alignment', 'iver' ),
				'description'   => esc_html__( 'Choose alignment for full screen menu content', 'iver' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'iver' ),
					'left'   => esc_html__( 'Left', 'iver' ),
					'center' => esc_html__( 'Center', 'iver' ),
					'right'  => esc_html__( 'Right', 'iver' )
				)
			)
		);
		
		$background_group = iver_select_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'background_group',
				'title'       => esc_html__( 'Background', 'iver' ),
				'description' => esc_html__( 'Select a background color and transparency for full screen menu (0 = fully transparent, 1 = opaque)', 'iver' )
			)
		);
		
		$background_group_row = iver_select_add_admin_row(
			array(
				'parent' => $background_group,
				'name'   => 'background_group_row'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_background_color',
				'label'  => esc_html__( 'Background Color', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type'   => 'textsimple',
				'name'   => 'fullscreen_menu_background_transparency',
				'label'  => esc_html__( 'Background Transparency', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'      => $fullscreen_panel,
				'type'        => 'image',
				'name'        => 'fullscreen_menu_background_image',
				'label'       => esc_html__( 'Background Image', 'iver' ),
				'description' => esc_html__( 'Choose a background image for full screen menu background', 'iver' )
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'      => $fullscreen_panel,
				'type'        => 'image',
				'name'        => 'fullscreen_menu_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'iver' ),
				'description' => esc_html__( 'Choose a pattern image for full screen menu background', 'iver' )
			)
		);
		
		//1st level style group
		$first_level_style_group = iver_select_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'first_level_style_group',
				'title'       => esc_html__( '1st Level Style', 'iver' ),
				'description' => esc_html__( 'Define styles for 1st level in full screen menu', 'iver' )
			)
		);
		
		$first_level_style_row1 = iver_select_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row1'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Text Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label'         => esc_html__( 'Active Text Color', 'iver' ),
			)
		);
		
		$first_level_style_row3 = iver_select_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row3'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_style_row4 = iver_select_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name'   => 'first_level_style_row4'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'iver' ),
				'options'       => iver_select_get_font_style_array()
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'iver' ),
				'options'       => iver_select_get_font_weight_array()
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $first_level_style_row4,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'iver' ),
				'options'       => iver_select_get_text_transform_array()
			)
		);
		
		//2nd level style group
		$second_level_style_group = iver_select_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'second_level_style_group',
				'title'       => esc_html__( '2nd Level Style', 'iver' ),
				'description' => esc_html__( 'Define styles for 2nd level in full screen menu', 'iver' )
			)
		);
		
		$second_level_style_row1 = iver_select_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row1'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Text Color', 'iver' ),
			)
		);
		
		$second_level_style_row2 = iver_select_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row2'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_style_row3 = iver_select_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name'   => 'second_level_style_row3'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'iver' ),
				'options'       => iver_select_get_font_style_array()
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'iver' ),
				'options'       => iver_select_get_font_weight_array()
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $second_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform_2nd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'iver' ),
				'options'       => iver_select_get_text_transform_array()
			)
		);
		
		$third_level_style_group = iver_select_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'third_level_style_group',
				'title'       => esc_html__( '3rd Level Style', 'iver' ),
				'description' => esc_html__( 'Define styles for 3rd level in full screen menu', 'iver' )
			)
		);
		
		$third_level_style_row1 = iver_select_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'third_level_style_row1'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row1,
				'type'          => 'colorsimple',
				'name'          => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Text Color', 'iver' ),
			)
		);
		
		$third_level_style_row2 = iver_select_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'second_level_style_row2'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'fontsimple',
				'name'          => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_font_size_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row2,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_line_height_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_style_row3 = iver_select_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name'   => 'second_level_style_row3'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_style_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'iver' ),
				'options'       => iver_select_get_font_style_array()
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_font_weight_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'iver' ),
				'options'       => iver_select_get_font_weight_array()
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'textsimple',
				'name'          => 'fullscreen_menu_letter_spacing_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Lettert Spacing', 'iver' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent'        => $third_level_style_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'fullscreen_menu_text_transform_3rd',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'iver' ),
				'options'       => iver_select_get_text_transform_array()
			)
		);

        iver_select_add_admin_field(
            array(
                'parent'        => $fullscreen_panel,
                'type'          => 'select',
                'name'          => 'fullscreen_menu_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__( 'Select Full Screen Menu Icon Source', 'iver' ),
                'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'iver' ),
                'options'       => iver_select_get_icon_sources_array()
            )
        );

        $fullscreen_menu_icon_pack_container = iver_select_add_admin_container(
            array(
                'parent'          => $fullscreen_panel,
                'name'            => 'fullscreen_menu_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'fullscreen_menu_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'        => $fullscreen_menu_icon_pack_container,
                'type'          => 'select',
                'name'          => 'fullscreen_menu_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__( 'Full Screen Menu Icon Pack', 'iver' ),
                'description'   => esc_html__( 'Choose icon pack for full screen menu icon', 'iver' ),
                'options'       => iver_select_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'dripicons', 'simple_line_icons' ) )
            )
        );

        $fullscreen_menu_icon_svg_path_container = iver_select_add_admin_container(
            array(
                'parent'          => $fullscreen_panel,
                'name'            => 'fullscreen_menu_icon_svg_path_container',
                'dependency' => array(
                    'show' => array(
                        'fullscreen_menu_icon_source' => 'svg_path'
                    )
                )
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'      => $fullscreen_menu_icon_svg_path_container,
                'type'        => 'textarea',
                'name'        => 'fullscreen_menu_icon_svg_path',
                'label'       => esc_html__( 'Full Screen Menu Icon SVG Path', 'iver' ),
                'description' => esc_html__( 'Enter your full screen menu icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'iver' ),
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'      => $fullscreen_menu_icon_svg_path_container,
                'type'        => 'textarea',
                'name'        => 'fullscreen_menu_close_icon_svg_path',
                'label'       => esc_html__( 'Full Screen Menu Close Icon SVG Path', 'iver' ),
                'description' => esc_html__( 'Enter your full screen menu close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'iver' ),
            )
        );

		$icon_style_group = iver_select_add_admin_group(
			array(
				'parent'      => $fullscreen_panel,
				'name'        => 'fullscreen_menu_icon_style_group',
				'title'       => esc_html__( 'Full Screen Menu Icon Style', 'iver' ),
				'description' => esc_html__( 'Define styles for full screen menu icon', 'iver' )
			)
		);
		
		$icon_colors_row1 = iver_select_add_admin_row(
			array(
				'parent' => $icon_style_group,
				'name'   => 'icon_colors_row1'
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_color',
				'label'  => esc_html__( 'Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_mobile_color',
				'label'  => esc_html__( 'Mobile Color', 'iver' ),
			)
		);
		
		iver_select_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type'   => 'colorsimple',
				'name'   => 'fullscreen_menu_icon_mobile_hover_color',
				'label'  => esc_html__( 'Mobile Hover Color', 'iver' ),
			)
		);
	}
	
	add_action( 'iver_select_additional_header_menu_area_options_map', 'iver_select_fullscreen_menu_options_map' );
}