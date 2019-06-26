<?php

if ( class_exists('IverSelectWidget') ) {
	class IverSelectSideAreaOpener extends IverSelectWidget {
		public function __construct() {
			parent::__construct(
				'qodef_side_area_opener',
				esc_html__('Iver Side Area Opener', 'iver'),
				array('description' => esc_html__('Display a "hamburger" icon that opens the side area', 'iver'))
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_color',
					'title'       => esc_html__('Side Area Opener Color', 'iver'),
					'description' => esc_html__('Define color for side area opener', 'iver')
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_hover_color',
					'title'       => esc_html__('Side Area Opener Hover Color', 'iver'),
					'description' => esc_html__('Define hover color for side area opener', 'iver')
				),
				array(
					'type'        => 'textfield',
					'name'        => 'widget_margin',
					'title'       => esc_html__('Side Area Opener Margin', 'iver'),
					'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'iver')
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__('Side Area Opener Title', 'iver')
				)
			);
		}
		
		public function widget($args, $instance) {
			$holder_styles = array();
			
			if ( !empty($instance['icon_color']) ) {
				$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if ( !empty($instance['widget_margin']) ) {
				$holder_styles[] = 'margin: ' . $instance['widget_margin'];
			}
			?>

            <a class="qodef-side-menu-button-opener qodef-icon-has-hover" <?php echo iver_select_get_inline_attr($instance['icon_hover_color'], 'data-hover-color'); ?>
               href="javascript:void(0)" <?php iver_select_inline_style($holder_styles); ?>>
            <span class="qodef-sm-lines">
                <span class="qodef-sm-line qodef-line-1"></span>
                <span class="qodef-sm-line qodef-line-2"></span>
                <span class="qodef-sm-line qodef-line-3"></span>
                <span class="qodef-sm-line qodef-line-4"></span>
                <span class="qodef-sm-line qodef-line-5"></span>
                <span class="qodef-sm-line qodef-line-6"></span>
                <span class="qodef-sm-line qodef-line-7"></span>
                <span class="qodef-sm-line qodef-line-8"></span>
                <span class="qodef-sm-line qodef-line-9"></span>
            </span>
            </a>
		<?php }
	}
}