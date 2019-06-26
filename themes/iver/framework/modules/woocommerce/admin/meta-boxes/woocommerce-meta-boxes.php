<?php

if ( ! function_exists( 'iver_select_map_woocommerce_meta' ) ) {
	function iver_select_map_woocommerce_meta() {
		
		$woocommerce_meta_box = iver_select_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'iver' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'        => 'qodef_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'iver' ),
				'description' => esc_html__( 'Choose image layout when it appears in Select Product List - Masonry layout shortcode', 'iver' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'iver' ),
					'small'              => esc_html__( 'Small', 'iver' ),
					'large-width'        => esc_html__( 'Large Width', 'iver' ),
					'large-height'       => esc_html__( 'Large Height', 'iver' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'iver' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'iver' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'iver' ),
				'options'       => iver_select_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		iver_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'iver' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'iver' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'iver_select_meta_boxes_map', 'iver_select_map_woocommerce_meta', 99 );
}