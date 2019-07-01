<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-heading">
            <?php iver_select_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
        </div>
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-info-top">
                    <?php iver_select_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                    <?php iver_select_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="qodef-post-text-main">
                    <?php iver_select_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php the_content(); ?>
                    <?php do_action('iver_select_single_link_pages'); ?>
                </div>
                <div class="qodef-post-info-bottom clearfix">
                    <div class="qodef-post-info-bottom-left">
                        <?php iver_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                    <?php if(iver_select_options()->getOptionValue('show_tags_area_blog') === 'yes') { ?>
                        <div class="qodef-post-info-bottom-right">
                            <?php iver_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</article>