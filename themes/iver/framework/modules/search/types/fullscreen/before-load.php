<?php

if ( ! function_exists( 'iver_select_set_search_fullscreen_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function iver_select_set_search_fullscreen_global_option( $search_type_options ) {
        $search_type_options['fullscreen'] = esc_html__( 'Fullscreen', 'iver' );

        return $search_type_options;
    }

    add_filter( 'iver_select_search_type_global_option', 'iver_select_set_search_fullscreen_global_option' );
}