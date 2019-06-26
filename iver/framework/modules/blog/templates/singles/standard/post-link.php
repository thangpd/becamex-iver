<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-main">
                    <?php iver_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="qodef-post-info-bottom-main clearfix">
                    <div class="qodef-post-info-bottom-left">
                        <?php iver_select_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php iver_select_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    </div>
                    <div class="qodef-post-info-bottom-right">
                        <div class="qodef-post-mark">
                            <span class="fe font_elegant icon_link_alt"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="qodef-post-additional-content">
        <?php the_content(); ?>
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
</article>