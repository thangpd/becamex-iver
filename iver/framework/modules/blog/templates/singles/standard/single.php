<?php

iver_select_get_single_post_format_html($blog_single_type);

do_action('iver_select_after_article_content');

iver_select_get_module_template_part('templates/parts/single/author-info', 'blog');

iver_select_get_module_template_part('templates/parts/single/single-navigation', 'blog');

iver_select_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

iver_select_get_module_template_part('templates/parts/single/comments', 'blog');