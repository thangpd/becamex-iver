<div class="qodef-slide-from-header-bottom-holder">
	<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
		<div class="qodef-form-holder">
			<input type="text" placeholder="<?php esc_attr_e( 'Search', 'iver' ); ?>" name="s" class="qodef-search-field" autocomplete="off" />
			<button type="submit" <?php iver_select_class_attribute( $search_submit_icon_class ); ?>>
				<?php echo iver_select_get_search_icon_html(); ?>
			</button>
		</div>
	</form>
</div>