<section class="qodef-side-menu">
	<a <?php iver_select_class_attribute( $side_area_close_icon_class ); ?> href="#">
        <span class="edgtf-icon-font-awesome fa fa-times"></span>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>