<?php

if ( iver_select_contact_form_7_installed() ) {
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_cf7_widget' );
}

if ( ! function_exists( 'iver_select_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function iver_select_register_cf7_widget( $widgets ) {
		$widgets[] = 'IverSelectContactForm7Widget';
		
		return $widgets;
	}
}