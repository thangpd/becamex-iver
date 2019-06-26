<?php
if (!function_exists('iver_select_register_side_area_sidebar')) {
    /**
     * Register side area sidebar
     */
    function iver_select_register_side_area_sidebar() {
        register_sidebar(
            array(
                'id'            => 'sidearea',
                'name'          => esc_html__('Side Area', 'iver'),
                'description'   => esc_html__('Side Area', 'iver'),
                'before_widget' => '<div id="%1$s" class="widget qodef-sidearea %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="qodef-widget-title-holder"><h3 class="qodef-widget-title">',
                'after_title'   => '</h3></div>'
            )
        );
    }

    add_action('widgets_init', 'iver_select_register_side_area_sidebar');
}

if (!function_exists('iver_select_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function iver_select_side_menu_body_class($classes) {

        if (is_active_widget(false, false, 'qodef_side_area_opener')) {

            if (iver_select_options()->getOptionValue('side_area_type')) {

                $classes[] = 'qodef-' . iver_select_options()->getOptionValue('side_area_type');

            }

        }

        return $classes;
    }

    add_filter('body_class', 'iver_select_side_menu_body_class');
}

if (!function_exists('iver_select_get_side_area')) {
    /**
     * Loads side area HTML
     */
    function iver_select_get_side_area() {

        if (is_active_widget(false, false, 'qodef_side_area_opener')) {

            $parameters = array(
                'side_area_close_icon_class' => iver_select_get_side_area_close_icon_class()
            );

            iver_select_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);
        }
    }

    add_action('iver_select_after_body_tag', 'iver_select_get_side_area', 10);
}

if (!function_exists('iver_select_get_side_area_close_class')) {
    /**
     * Loads side area close icon class
     */
    function iver_select_get_side_area_close_icon_class() {

        $side_area_icon_source = iver_select_options()->getOptionValue('side_area_icon_source');

        $side_area_close_icon_class_array = array(
            'qodef-close-side-menu'
        );

        $side_area_close_icon_class_array[] = $side_area_icon_source == 'icon_pack' ? 'qodef-close-side-menu-icon-pack' : 'qodef-close-side-menu-svg-path';

        return $side_area_close_icon_class_array;
    }
}

if (!function_exists('iver_select_get_side_area_close_icon_html')) {
    /**
     * Loads side area close icon HTML
     */
    function iver_select_get_side_area_close_icon_html() {

        $side_area_icon_source = iver_select_options()->getOptionValue('side_area_icon_source');
        $side_area_icon_pack = iver_select_options()->getOptionValue('side_area_icon_pack');
        $side_area_close_icon_svg_path = iver_select_options()->getOptionValue('side_area_close_icon_svg_path');

        $side_area_close_icon_html = '';

        if (($side_area_icon_source == 'icon_pack') && isset($side_area_icon_pack)) {
            $side_area_close_icon_html .= iver_select_icon_collections()->getMenuCloseIcon($side_area_icon_pack);
        } else if (isset($side_area_close_icon_svg_path)) {
            $side_area_close_icon_html .= $side_area_close_icon_svg_path;
        }

        return $side_area_close_icon_html;
    }
}