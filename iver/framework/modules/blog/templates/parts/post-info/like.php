<?php if(iver_select_core_plugin_installed()) { ?>
    <div class="qodef-blog-like">
        <?php if( function_exists('iver_select_get_like') ) iver_select_get_like(); ?>
    </div>
<?php } ?>