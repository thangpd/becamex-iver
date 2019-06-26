<li class="qodef-bl-item qodef-item-space clearfix <?php echo 'format-' . esc_html($params['type']) ?>">
    <div class="qodef-bli-inner">
        <div class="qodef-bli-content">
            <?php $params['link_tag'] = $title_tag; ?>
            <?php iver_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $params); ?>
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
        </div>
        <div class="qodef-post-mark">
            <span class="icon_link_alt qodef-link-mark"></span>
        </div>
    </div>
</li>