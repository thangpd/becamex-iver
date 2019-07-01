<?php do_action('iver_select_after_sticky_header'); ?>

<div class="qodef-sticky-header">
    <?php do_action('iver_select_after_sticky_menu_html_open'); ?>
    <div class="qodef-sticky-holder">
        <?php if ($sticky_header_in_grid && iver_select_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ) : ?>
        <div class="qodef-grid">
            <?php endif; ?>
            <div class=" qodef-vertical-align-containers">
                <div class="qodef-position-left"><!--
                 --><div class="qodef-position-left-inner">
                        <?php if (!$hide_logo) {
                            iver_select_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-right"><!--
                 --><div class="qodef-position-right-inner">
                        <a href="javascript:void(0)" <?php iver_select_class_attribute( $fullscreen_menu_icon_class ); ?>>
                            <span class="qodef-fullscreen-menu-close-icon">
                                <?php echo iver_select_get_fullscreen_menu_close_icon_html(); ?>
                            </span>
                            <span class="qodef-fullscreen-menu-opener-icon">
                                <?php echo iver_select_get_fullscreen_menu_icon_html(); ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('iver_select_after_sticky_header'); ?>
