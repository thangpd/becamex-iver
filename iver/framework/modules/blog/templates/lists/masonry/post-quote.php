<?php
$post_classes[] = 'qodef-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-text-main">
                    <?php iver_select_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
                <div class="qodef-post-info-bottom-main clearfix">
                    <div class="qodef-post-info-bottom-left">
                        <?php iver_select_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                        <?php iver_select_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    </div>
                    <div class="qodef-post-info-bottom-right">
                        <div class="qodef-post-mark">
                            <span class="fe font_elegant icon_quotations"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>