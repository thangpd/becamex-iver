<?php

if ( ! function_exists('iver_select_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function iver_select_contact_form_map() {
		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'iver'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'iver') => 'default',
				esc_html__('Custom Style 1', 'iver') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'iver') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'iver') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Select Options > Contact Form 7', 'iver')
		));
	}
	
	add_action('vc_after_init', 'iver_select_contact_form_map');
}