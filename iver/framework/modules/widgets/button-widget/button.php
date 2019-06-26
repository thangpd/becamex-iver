<?php

class IverSelectButtonWidget extends IverSelectWidget {
	public function __construct() {
		parent::__construct(
			'qodef_button_widget',
			esc_html__( 'Iver Button Widget', 'iver' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'iver' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'iver' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'iver' ),
					'outline' => esc_html__( 'Outline', 'iver' ),
					'simple'  => esc_html__( 'Simple', 'iver' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'iver' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'iver' ),
					'medium' => esc_html__( 'Medium', 'iver' ),
					'large'  => esc_html__( 'Large', 'iver' ),
					'huge'   => esc_html__( 'Huge', 'iver' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'iver' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'iver' ),
				'default' => esc_html__( 'Button Text', 'iver' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'iver' ),
				'options' => iver_select_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'iver' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'iver' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'iver' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'iver' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'iver' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'iver' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'iver' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'iver' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'iver' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'iver' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'iver' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'iver' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget qodef-button-widget">';
			echo do_shortcode( "[qodef_button $params]" ); // XSS OK
		echo '</div>';
	}
}