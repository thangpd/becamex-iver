<div class="qodef-grid-row <?php echo esc_attr($holder_classes); ?>">
	<div <?php echo iver_select_get_content_sidebar_class(); ?>>
		<div class="qodef-blog-holder qodef-blog-single <?php echo esc_attr($blog_single_classes); ?>">
			<?php iver_select_get_blog_single_type($blog_single_type); ?>
		</div>
	</div>
	<?php if($sidebar_layout !== 'no-sidebar') { ?>
		<div <?php echo iver_select_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>