<div class="qodef-fullscreen-search-holder">
	<a <?php iver_select_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo iver_select_get_search_close_icon_html(); ?>
	</a>
	<div class="qodef-fullscreen-search-table">
		<div class="qodef-fullscreen-search-cell">
			<div class="qodef-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-fullscreen-search-form" method="get">
					<div class="qodef-form-holder">
						<div class="qodef-form-holder-inner">
                            <button type="submit" <?php iver_select_class_attribute( $search_submit_icon_class ); ?>>
                                <?php echo iver_select_get_search_icon_html(); ?>
                            </button>
							<div class="qodef-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Search...', 'iver' ); ?>" name="s" class="qodef-search-field" autocomplete="off"/>
							</div>
							<div class="qodef-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>