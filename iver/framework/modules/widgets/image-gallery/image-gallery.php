<?php

class IverSelectImageGalleryWidget extends IverSelectWidget {
	public function __construct() {
		parent::__construct(
			'qodef_image_gallery_widget',
			esc_html__( 'Iver Image Gallery Widget', 'iver' ),
			array( 'description' => esc_html__( 'Add image gallery element to widget areas', 'iver' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Custom CSS Class', 'iver' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Gallery Type', 'iver' ),
				'options' => array(
					'grid'   => esc_html__( 'Image Grid', 'iver' ),
					'slider' => esc_html__( 'Slider', 'iver' )
				)
			),
			array(
				'type'        => 'textfield',
				'name'        => 'images',
				'title'       => esc_html__( 'Image ID\'s', 'iver' ),
				'description' => esc_html__( 'Add images id for your image gallery widget, separate id\'s with comma', 'iver' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'image_size',
				'title'       => esc_html__( 'Image Size', 'iver' ),
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'enable_image_shadow',
				'title'   => esc_html__( 'Enable Image Shadow', 'iver' ),
				'options' => iver_select_get_yes_no_select_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'image_behavior',
				'title'   => esc_html__( 'Image Behavior', 'iver' ),
				'options' => array(
					''            => esc_html__( 'None', 'iver' ),
					'lightbox'    => esc_html__( 'Open Lightbox', 'iver' ),
					'custom-link' => esc_html__( 'Open Custom Link', 'iver' ),
					'zoom'        => esc_html__( 'Zoom', 'iver' ),
					'grayscale'   => esc_html__( 'Grayscale', 'iver' )
				)
			),
			array(
				'type'        => 'textarea',
				'name'        => 'custom_links',
				'title'       => esc_html__( 'Custom Links', 'iver' ),
				'description' => esc_html__( 'Delimit links by comma', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'custom_link_target',
				'title'   => esc_html__( 'Custom Link Target', 'iver' ),
				'options' => iver_select_get_link_target_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'number_of_columns',
				'title'   => esc_html__( 'Number of Columns', 'iver' ),
				'options' => array(
					'two'   => esc_html__( 'Two', 'iver' ),
					'three' => esc_html__( 'Three', 'iver' ),
					'four'  => esc_html__( 'Four', 'iver' ),
					'five'  => esc_html__( 'Five', 'iver' ),
					'six'   => esc_html__( 'Six', 'iver' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'space_between_columns',
				'title'   => esc_html__( 'Space Between Items', 'iver' ),
				'options' => iver_select_get_space_between_items_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'slider_navigation',
				'title'   => esc_html__( 'Enable Slider Navigation Arrows', 'iver' ),
				'options' => iver_select_get_yes_no_select_array( false )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'slider_pagination',
				'title'   => esc_html__( 'Enable Slider Pagination', 'iver' ),
				'options' => iver_select_get_yes_no_select_array( false )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		$extra_class      = ! empty( $instance['extra_class'] ) ? $instance['extra_class'] : '';
		$instance['type'] = ! empty( $instance['type'] ) ? $instance['type'] : 'grid';
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		?>
		
		<div class="widget qodef-image-gallery-widget <?php echo esc_html( $extra_class ); ?>">
			<?php
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			echo do_shortcode( "[qodef_image_gallery $params]" ); // XSS OK
			?>
		</div>
		<?php
	}
}