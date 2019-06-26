<?php ?>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-search-slide-window-top" method="get">
	<?php if ( $search_in_grid ) { ?>
	<div class="qodef-grid">
	<?php } ?>
		<div class="qodef-search-form-inner">
			<span <?php iver_select_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo iver_select_get_search_icon_html(); ?>
			</span>
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'iver' ); ?>" name="s" class="qodef-swt-search-field" autocomplete="off"/>
			<a <?php iver_select_class_attribute( $search_close_icon_class ); ?> href="#">
				<?php echo iver_select_get_search_close_icon_html(); ?>
			</a>
		</div>
	<?php if ( $search_in_grid ) { ?>
	</div>
	<?php } ?>
</form>