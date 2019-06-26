<?php

class IverSelectBlogListWidget extends IverSelectWidget {
	public function __construct() {
		parent::__construct(
			'qodef_blog_list_widget',
			esc_html__( 'Iver Blog List Widget', 'iver' ),
			array( 'description' => esc_html__( 'Display a list of your blog posts', 'iver' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'iver' ),
				'options' => array(
					'simple'  => esc_html__( 'Simple', 'iver' ),
					'minimal' => esc_html__( 'Minimal', 'iver' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'number_of_posts',
				'title' => esc_html__( 'Number of Posts', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'space_between_items',
				'title'   => esc_html__( 'Space Between Items', 'iver' ),
				'options' => iver_select_get_space_between_items_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'orderby',
				'title'   => esc_html__( 'Order By', 'iver' ),
				'options' => iver_select_get_query_order_by_array()
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'order',
				'title'   => esc_html__( 'Order', 'iver' ),
				'options' => iver_select_get_query_order_array()
			),
			array(
				'type'        => 'textfield',
				'name'        => 'category',
				'title'       => esc_html__( 'Category Slug', 'iver' ),
				'description' => esc_html__( 'Leave empty for all or use comma for list', 'iver' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_tag',
				'title'   => esc_html__( 'Title Tag', 'iver' ),
				'options' => iver_select_get_title_tag( true )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'title_transform',
				'title'   => esc_html__( 'Title Text Transform', 'iver' ),
				'options' => iver_select_get_text_transform_array( true )
			),
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		$instance['image_size']        = 'thumbnail';
		$instance['post_info_section'] = 'yes';
		$instance['number_of_columns'] = '1';
		
		// Filter out all empty params
		$instance         = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		$instance['type'] = ! empty( $instance['type'] ) ? $instance['type'] : 'simple';
		
		$params = '';
		//generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget qodef-blog-list-widget">';
			if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			}
			
			echo do_shortcode( "[qodef_blog_list $params]" ); // XSS OK
		echo '</div>';
	}
}