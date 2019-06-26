<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if( iver_select_core_plugin_installed() && iver_select_options()->getOptionValue('enable_social_share') === 'yes' && iver_select_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="qodef-blog-share">
        <h5><?php esc_html_e( 'SHARE:', 'iver' ); ?></h5>
        <?php  echo iver_select_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>