<li class="qodef-bl-item qodef-item-space clearfix">
    <div class="qodef-bli-inner">
        <?php if ( $post_info_image == 'yes' ) {
            iver_select_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
        } ?>
        <div class="qodef-bli-content">
            <?php iver_select_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>

            <?php if ($post_info_section == 'yes') { ?>
                <div class="qodef-bli-info">
                    <?php
                    if ( $post_info_date == 'yes' ) {
                        iver_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
                    }
                    if ( $post_info_category == 'yes' ) {
                        iver_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
                    }
                    if ( $post_info_author == 'yes' ) {
                        iver_select_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
                    }
                    if ( $post_info_comments == 'yes' ) {
                        iver_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
                    }
                    if ( $post_info_like == 'yes' ) {
                        iver_select_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
                    }
                    if ( $post_info_share == 'yes' ) {
                        iver_select_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
                    }
                    ?>
                </div>
            <?php } ?>

            <?php if ( $post_info_excerpt == 'yes' || $post_info_button == 'yes') { ?>
                <div class="qodef-bli-excerpt">
                    <?php if ( $post_info_excerpt == 'yes' ) { ?>
                        <?php iver_select_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
                    <?php } ?>
                    <?php if ( $post_info_button == 'yes' ) { ?>
                        <?php iver_select_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</li>