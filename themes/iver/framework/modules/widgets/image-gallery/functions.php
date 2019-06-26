<?php

if ( ! function_exists( 'iver_select_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function iver_select_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'IverSelectImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'iver_select_register_widgets', 'iver_select_register_image_gallery_widget' );
}