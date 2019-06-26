<?php
use Iver\Modules\Header\Lib;

if(!function_exists('iver_select_get_header_type_options')) {
	/**
	 * This function collect all header types values and forward them to header factory file for further processing
	 */
	function iver_select_get_header_type_options() {
		do_action('iver_select_before_header_function_init');
		
		$header_types_option = apply_filters('iver_select_register_header_type_class', $header_types_option = array());
		
		return $header_types_option;
	}
}

if(!function_exists('iver_select_set_default_logo_height_for_header_types')) {
	/**
	 * This function set default logo area height for header types
	 */
	function iver_select_set_default_logo_height_for_header_types() {
		$logo_height_meta = iver_select_filter_px( iver_select_options()->getOptionValue( 'logo_area_height' ) );
		$logo_height      = !empty($logo_height_meta) ? intval( $logo_height_meta ) : 74;
		
		return apply_filters('iver_select_set_default_logo_height_value_for_header_types', $logo_height);
	}
}

if(!function_exists('iver_select_set_default_menu_height_for_header_types')) {
	/**
	 * This function set default menu area height for header types
	 */
	function iver_select_set_default_menu_height_for_header_types() {
		$menu_height_meta = iver_select_filter_px( iver_select_options()->getOptionValue( 'menu_area_height' ) );
		$menu_height      = !empty($menu_height_meta) ? intval( $menu_height_meta ) : 74;
		
		return apply_filters('iver_select_set_default_menu_height_value_for_header_types', $menu_height);
	}
}

if(!function_exists('iver_select_set_default_mobile_menu_height_for_header_types')) {
	/**
	 * This function set default mobile menu area height for header types
	 */
	function iver_select_set_default_mobile_menu_height_for_header_types() {
		$mobile_menu_height_meta = iver_select_filter_px( iver_select_options()->getOptionValue( 'mobile_header_height' ) );
		$mobile_menu_height      = !empty($mobile_menu_height_meta) ? intval( $mobile_menu_height_meta ) : 70;
		
		return apply_filters('iver_select_set_default_mobile_menu_height_value_for_header_types', $mobile_menu_height);
	}
}

if(!function_exists('iver_select_set_header_object')) {
	/**
	 * This function is used to instance header type object
	 */
    function iver_select_set_header_object() {
    	$header_type = iver_select_get_meta_field_intersect('header_type', iver_select_get_page_id());
	    $header_types_option = iver_select_get_header_type_options();
	    
        $object = Lib\HeaderFactory::getInstance()->build($header_type, $header_types_option);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\IverSelectHeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'iver_select_set_header_object', 1);
}