<aside class="qodef-sidebar">
	<?php
		$qodef_sidebar = iver_select_get_sidebar();
		
		if ( is_active_sidebar( $qodef_sidebar ) ) {
			dynamic_sidebar( $qodef_sidebar );
		}
	?>
</aside>