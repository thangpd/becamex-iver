<?php

if (!function_exists('iver_select_sidearea_options_map')) {
    function iver_select_sidearea_options_map() {

        iver_select_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'iver'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = iver_select_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'iver'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'iver'),
                'description'   => esc_html__('Choose a type of Side Area', 'iver'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'iver'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'iver'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'iver'),
                ),
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'iver'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 552px.', 'iver'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = iver_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'iver'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'iver'),
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'iver'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'iver'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        $side_area_icon_style_group = iver_select_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'iver'),
                'description' => esc_html__('Define styles for Side Area icon', 'iver')
            )
        );

        $side_area_icon_style_row1 = iver_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        iver_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'iver')
            )
        );

        iver_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'iver')
            )
        );

        $side_area_icon_style_row2 = iver_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        iver_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'iver')
            )
        );

        iver_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'iver')
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'iver'),
                'description' => esc_html__('Choose a background color for Side Area', 'iver')
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'iver'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'iver'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        iver_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'iver'),
                'description'   => esc_html__('Choose text alignment for side area', 'iver'),
                'options'       => array(
                    ''       => esc_html__('Default', 'iver'),
                    'left'   => esc_html__('Left', 'iver'),
                    'center' => esc_html__('Center', 'iver'),
                    'right'  => esc_html__('Right', 'iver')
                )
            )
        );
    }

    add_action('iver_select_options_map', 'iver_select_sidearea_options_map', 15);
}