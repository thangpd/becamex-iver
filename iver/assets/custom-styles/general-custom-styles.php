<?php

if ( ! function_exists( 'iver_select_design_styles' ) ) {
	/**
	 * Generates general custom styles
	 */
	function iver_select_design_styles() {
		$font_family = iver_select_options()->getOptionValue( 'google_fonts' );
		if ( ! empty( $font_family ) && iver_select_is_font_option_valid( $font_family ) ) {
			$font_family_selector = array(
				'body'
			);
			echo iver_select_dynamic_css( $font_family_selector, array( 'font-family' => iver_select_get_font_option_val( $font_family ) ) );
		}

		$first_main_color = iver_select_options()->getOptionValue( 'first_color' );
		if ( ! empty( $first_main_color ) ) {
			$color_selector = array(
				'h1',
				'h2',
				'h3',
				'h5',
				'a',
				'p a',
				'blockquote',
				'blockquote:before',
				'#respond input[type=text]',
				'#respond textarea',
				'.post-password-form input[type=password]',
				'.qodef-style-form textarea',
				'.wpcf7-form-control.wpcf7-date',
				'.wpcf7-form-control.wpcf7-number',
				'.wpcf7-form-control.wpcf7-quiz',
				'.wpcf7-form-control.wpcf7-select',
				'.wpcf7-form-control.wpcf7-text',
				'.wpcf7-form-control.wpcf7-textarea',
				'input[type=text]',
				'input[type=email]',
				'input[type=password]',
				'#respond input[type=text]:focus',
				'#respond textarea:focus',
				'.qodef-style-form textarea:focus',
				'.wpcf7-form-control.wpcf7-date:focus',
				'.wpcf7-form-control.wpcf7-number:focus',
				'.wpcf7-form-control.wpcf7-quiz:focus',
				'.wpcf7-form-control.wpcf7-select:focus',
				'.wpcf7-form-control.wpcf7-text:focus',
				'.wpcf7-form-control.wpcf7-textarea:focus',
				'input[type=text]:focus',
				'input[type=email]:focus',
				'input[type=password]:focus',
				'.qodef-comment-holder .qodef-comment-text .comment-edit-link',
				'.qodef-comment-holder .qodef-comment-text .comment-reply-link',
				'.qodef-comment-holder .qodef-comment-text .replay',
				'.qodef-comment-holder .qodef-comment-text .comment-edit-link:hover',
				'.qodef-comment-holder .qodef-comment-text .comment-reply-link:hover',
				'.qodef-comment-holder .qodef-comment-text .replay:hover',
				'.qodef-comment-holder .qodef-comment-text #cancel-comment-reply-link',
				'.qodef-comment-holder .qodef-comment-text #cancel-comment-reply-link:hover',
				'#submit_comment:hover',
				'.post-password-form input[type=submit]:hover',
				'input.wpcf7-form-control.wpcf7-submit:hover',
				'#submit_comment',
				'div.qodef-main-home-form .qodef-submit-holder input.wpcf7-form-control.wpcf7-submit:hover',
				'div.qodef-main-home-default-form-light .wpcf7-form-control.wpcf7-submit',
				'.qodef-owl-slider .owl-nav',
				'.widget #wp-calendar caption',
				'.widget.widget_rss .qodef-widget-title .rsswidget:hover',
				'.widget.widget_search button',
				'.widget.widget_search input',
				'.widget.widget_search button',
				'.widget.widget_search button:hover',
				'.widget.widget_categories ul li a:hover',
				'.widget.widget_tag_cloud a',
				'.qodef-top-bar a:hover',
				'.qodef-instagram-feed li a .qodef-instagram-icon',
				'.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-standard li .qodef-twitter-icon',
				'.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-tweet-text a',
				'.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-tweet-text a:hover',
				'.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-tweet-text span',
				'.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-standard li .qodef-tweet-text a:hover',
				'.widget.widget_qodef_twitter_widget .qodef-twitter-widget.qodef-twitter-slider li .qodef-twitter-icon i',
				'body .pp_pic_holder #pp_full_res .pp_inline',
				'body .pp_pic_holder a.pp_arrow_next:hover',
				'body .pp_pic_holder a.pp_arrow_previous:hover',
				'body .pp_pic_holder a.pp_next',
				'body .pp_pic_holder a.pp_previous',
				'body .pp_pic_holder a.pp_close:hover',
				'body .select2-container--default.select2-container--open .select2-selection--single',
				'body .select2-container--default .select2-results__option[aria-disabled=true]',
				'body .select2-container--default .select2-results__option[aria-selected=true]',
				'body .select2-container--default .select2-results__option[data-selected=true]',
				'body .select2-container--default .select2-results__option--highlighted[aria-selected]',
				'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle',
				'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle',
				'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
				'.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
				'.qodef-blog-holder article.sticky .qodef-post-title a',
				'.qodef-blog-holder article .qodef-post-info-top>div a:hover',
				'.qodef-blog-holder article .qodef-post-info-top .qodef-post-info-category a',
				'.qodef-blog-holder article .qodef-post-text-main .qodef-tags-holder .qodef-tags a',
				'.qodef-blog-holder article .qodef-post-info-bottom .qodef-post-info-bottom-right .qodef-tags-holder .qodef-tags a',
				'.qodef-blog-holder article.format-quote a',
				'.qodef-blog-holder article.format-quote .qodef-post-mark',
				'.qodef-blog-holder article.format-quote .qodef-post-info-bottom-main .qodef-post-info-bottom-left',
				'.qodef-blog-holder article.format-quote .qodef-post-info-bottom-main .qodef-post-info-bottom-left .qodef-post-info-date:before',
				'.qodef-blog-holder article.format-quote .qodef-post-info-bottom-main .qodef-post-info-bottom-left .qodef-post-info-comments-holder:before',
				'.qodef-blog-holder .post-password-form input[type=submit]',
				'.qodef-blog-pagination ul li a',
				'.qodef-bl-standard-pagination ul li.qodef-bl-pag-active a',
				'.qodef-blog-pagination ul li a.qodef-pag-active',
				'.qodef-blog-pag-loading',
				'.qodef-blog-holder.qodef-blog-masonry article.format-quote .qodef-post-content a',
				'.qodef-author-description .qodef-author-description-text-holder .qodef-author-name a',
				'.qodef-author-description .qodef-author-description-text-holder .qodef-author-name a:hover',
				'.qodef-blog-holder.qodef-blog-standard article.format-quote .qodef-post-content a',
				'.qodef-author-description .qodef-author-description-text-holder .qodef-author-social-icons a',
				'.qodef-blog-single-navigation .qodef-blog-single-next:hover',
				'.qodef-blog-single-navigation .qodef-blog-single-prev:hover',
				'.qodef-single-links-pages .qodef-single-links-pages-inner>a',
				'.qodef-single-links-pages .qodef-single-links-pages-inner>span',
				'.qodef-blog-holder.qodef-blog-single article.format-quote .qodef-post-content a',
				'.qodef-blog-list-holder .qodef-bl-item.format-quote .qodef-bli-inner .qodef-post-mark',
				'.qodef-blog-list-holder .qodef-bli-info>div.qodef-post-info-comments-holder:before',
				'.qodef-blog-list-holder .qodef-bli-info>div.qodef-post-info-date:before',
				'.qodef-blog-list-holder .qodef-bli-info>div a:hover',
				'.qodef-blog-list-holder.qodef-bl-minimal .qodef-post-info-date a:hover',
				'.qodef-blog-list-holder.qodef-bl-simple .qodef-bli-content .qodef-post-info-date a:hover',
				'.qodef-main-menu ul li a:hover',
				'.qodef-main-menu>ul>li>a',
				'.qodef-main-menu>ul>li.qodef-active-item>a',
				'.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
				'.qodef-header-vertical .qodef-vertical-menu ul li a .qodef-menu-featured-icon',
				'.qodef-header-vertical .qodef-vertical-menu ul li.current-menu-ancestor>a',
				'.qodef-header-vertical .qodef-vertical-menu ul li.current-menu-item>a',
				'.qodef-header-vertical .qodef-vertical-menu ul li.current_page_item>a',
				'.qodef-header-vertical .qodef-vertical-menu ul li.qodef-active-item>a',
				'.qodef-header-vertical .qodef-vertical-menu>ul>li>a',
				'.qodef-header-vertical .qodef-vertical-menu>ul>li>a:hover',
				'.qodef-mobile-header .qodef-mobile-menu-opener.qodef-mobile-menu-opened a',
				'.qodef-mobile-header .qodef-mobile-nav .qodef-grid>ul>li.qodef-active-item>a',
				'.qodef-mobile-header .qodef-mobile-nav .qodef-grid>ul>li.qodef-active-item>h6',
				'.qodef-mobile-header .qodef-mobile-nav ul li a:hover',
				'.qodef-mobile-header .qodef-mobile-nav ul li h6:hover',
				'.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-ancestor>a',
				'.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-ancestor>h6',
				'.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-item>a',
				'.qodef-mobile-header .qodef-mobile-nav ul ul li.current-menu-item>h6',
				'.qodef-search-page-holder .qodef-search-page-form .qodef-form-holder .qodef-search-submit:hover',
				'.qodef-search-page-holder article.sticky .qodef-post-title a',
				'.qodef-search-cover .qodef-search-close:hover',
				'.qodef-fullscreen-with-sidebar-search-holder .qodef-search-field:focus',
				'.qodef-fullscreen-with-sidebar-search-holder .qodef-search-submit:hover',
				'.qodef-fullscreen-with-sidebar-search-holder .qodef-search-close:hover',
				'.qodef-slide-from-header-bottom-holder .qodef-form-holder .qodef-search-field:focus',
				'.qodef-slide-from-header-bottom-holder .qodef-form-holder .qodef-search-submit:hover',
				'.qodef-side-menu-button-opener.opened',
				'.qodef-title-holder span.qodef-page-subtitle',
				'.qodef-title-holder.qodef-breadcrumbs-type .qodef-breadcrumbs',
				'.qodef-title-holder.qodef-standard-with-breadcrumbs-type .qodef-breadcrumbs',
				'.widget.qodef-search-post-type-widget .qodef-search-icon',
				'.widget.qodef-search-post-type-widget .qodef-search-loading',
				'.qodef-social-icons-group-widget.qodef-square-icons .qodef-social-icon-widget-holder:hover',
				'.qodef-social-icons-group-widget.qodef-square-icons.qodef-light-skin .qodef-social-icon-widget-holder',
				'.qodef-social-icons-group-widget.qodef-square-icons.qodef-light-skin .qodef-social-icon-widget-holder:hover',
				'.qodef-portfolio-single-holder .qodef-ps-info-holder .qodef-ps-info-item.qodef-ps-social-share .qodef-social-title',
				'.qodef-portfolio-single-holder .qodef-ps-info-holder .qodef-ps-info-item.qodef-ps-social-share a',
				'.qodef-pl-loading',
				'.qodef-pl-standard-pagination ul li.qodef-pl-pag-active a',
				'.qodef-portfolio-list-holder.qodef-pl-gallery-overlay article.qodef-portfolio-masonry-layout-description .qodef-pli-text-holder .qodef-pli-text .qodef-pli-excerpt',
				'.qodef-portfolio-list-holder.qodef-pl-gallery-overlay article.qodef-portfolio-masonry-layout-description .qodef-pli-text-holder .qodef-pli-text .qodef-pli-title',
				'.qodef-pl-filter-holder ul li span',
				'.qodef-portfolio-list-holder.qodef-pl-gallery-overlay article.qodef-portfolio-masonry-layout-description .qodef-pli-text-holder .qodef-pli-text .qodef-pli-category-holder a',
				'.qodef-portfolio-list-holder.qodef-pl-gallery-overlay article.qodef-portfolio-masonry-layout-description .qodef-pli-text-holder .qodef-pli-text .qodef-btn',
				'.qodef-team.info-hover .qodef-icon-shortcode',
				'.qodef-team.info-hover .qodef-icon-shortcode>*',
				'.qodef-team.info-hover .qodef-team-name',
				'.qodef-team.info-hover .qodef-team-position',
				'.qodef-team.info-hover .qodef-team-text',
				'.qodef-testimonials-holder.qodef-testimonials-image-pagination .qodef-testimonials-image-pagination-inner .qodef-testimonials-author-job',
				'.qodef-testimonials-holder.qodef-testimonials-image-pagination.qodef-testimonials-light .owl-nav .owl-next:hover',
				'.qodef-testimonials-holder.qodef-testimonials-image-pagination.qodef-testimonials-light .owl-nav .owl-prev:hover',
				'.qodef-testimonials-holder.qodef-testimonials-standard .qodef-testimonial-text',
				'.qodef-comment-rating-box .qodef-star-rating',
				'.qodef-comment-rating-box .qodef-star-rating.active:after',
				'.qodef-comment-rating-box .qodef-star-rating:before',
				'.qodef-reviews-per-criteria .qodef-item-reviews-average-rating',
				'.qodef-comment-list .qodef-review-rating',
				'.qodef-banner-holder .qodef-banner-link-text .qodef-banner-link-hover span',
				'.qodef-btn.qodef-btn-simple',
				'.qodef-btn.qodef-btn-outline',
				'.qodef-countdown .countdown-row .countdown-section .countdown-amount',
				'.qodef-counter-holder .qodef-counter',
				'.qodef-icon-list-holder .qodef-il-icon-holder>*',
				'.qodef-pie-chart-holder .qodef-pc-percentage .qodef-pc-percent',
				'.qodef-price-table .qodef-pt-inner ul li.qodef-pt-title-holder',
				'.qodef-price-table .qodef-pt-inner ul li.qodef-pt-prices',
				'.qodef-price-table .qodef-pt-inner ul li.qodef-pt-content i',
				'.qodef-section-title-holder span.qodef-st-subtitle',
				'.qodef-social-share-holder.qodef-list .qodef-social-title',
				'.qodef-social-share-holder.qodef-list li a',
				'.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown-opener .social_share',
				'.qodef-social-share-holder.qodef-dropdown .qodef-social-share-dropdown-opener:hover',
				'.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li a',
				'.qodef-tabs.qodef-tabs-simple .qodef-tabs-nav li a:hover',
				'.qodef-tabs.qodef-tabs-vertical .qodef-tabs-nav li.ui-state-active a',
				'.qodef-tabs.qodef-tabs-vertical .qodef-tabs-nav li.ui-state-hover a',
				'.qodef-twitter-list-holder .qodef-twitter-icon',
				'.qodef-twitter-list-holder .qodef-tweet-text a:hover',
				'.qodef-twitter-list-holder .qodef-twitter-profile a:hover'
			);

			$woo_color_selector = array();
			if ( iver_select_is_woocommerce_installed() ) {
				$woo_color_selector = array(
					'.woocommerce-page .qodef-content input[type=text]',
					'.woocommerce-page .qodef-content input[type=email]',
					'.woocommerce-page .qodef-content input[type=tel]',
					'.woocommerce-page .qodef-content input[type=password]',
					'.woocommerce-page .qodef-content textarea',
					'div.woocommerce input[type=text]',
					'div.woocommerce input[type=email]',
					'div.woocommerce input[type=tel]',
					'div.woocommerce input[type=password]',
					'div.woocommerce textarea',
					'.woocommerce-page .qodef-content input[type=text]:focus',
					'.woocommerce-page .qodef-content input[type=email]:focus',
					'.woocommerce-page .qodef-content input[type=tel]:focus',
					'.woocommerce-page .qodef-content input[type=password]:focus',
					'.woocommerce-page .qodef-content textarea:focus',
					'div.woocommerce input[type=text]:focus',
					'div.woocommerce input[type=email]:focus',
					'div.woocommerce input[type=tel]:focus',
					'div.woocommerce input[type=password]:focus',
					'div.woocommerce textarea:focus',
					'.qodef-pl-holder .qodef-pli .qodef-pli-rating',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-rating',
					'.qodef-pls-holder .qodef-pls-text .qodef-pls-rating',
					'.qodef-product-info .qodef-pi-rating',
					'.qodef-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
					'.qodef-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before',
					'.woocommerce .star-rating',
					'.qodef-woocommerce-page table.cart thead tr th',
					'.qodef-woocommerce-page table.cart tr.cart_item td.product-remove a:hover',
					'.qodef-woocommerce-page .cart_totals tr th',
					'.qodef-woocommerce-page .cart-empty',
					'.qodef-woocommerce-page .woocommerce-checkout .col-1 label:not(.checkbox)',
					'.qodef-woocommerce-page .woocommerce-checkout .col-2 label:not(.checkbox)',
					'.qodef-woocommerce-page.woocommerce-order-received .woocommerce ul.order_details li strong',
					'.woocommerce-page .qodef-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .qodef-content a.added_to_cart',
					'.woocommerce-page .qodef-content a.button',
					'.woocommerce-page .qodef-content button[type=submit]:not(.qodef-woo-search-widget-button)',
					'.woocommerce-page .qodef-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]:not(.qodef-woo-search-widget-button)',
					'div.woocommerce input[type=submit]',
					'.woocommerce-page .qodef-content .single_add_to_cart_button.button.alt',
					'div.woocommerce .single_add_to_cart_button.button.alt',
					'.qodef-woocommerce-page .woocommerce-error>a:hover',
					'.qodef-woocommerce-page .woocommerce-info>a:hover',
					'.qodef-woocommerce-page .woocommerce-message>a:hover',
					'.qodef-woocommerce-page .woocommerce-info .showcoupon:hover',
					'.woocommerce-pagination .page-numbers li a',
					'.woocommerce-pagination .page-numbers li span',
					'.woocommerce-pagination .page-numbers li a.current',
					'.woocommerce-pagination .page-numbers li a:hover',
					'.woocommerce-pagination .page-numbers li span.current',
					'.woocommerce-pagination .page-numbers li span:hover',
					'.qodef-woo-view-all-pagination a',
					'.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-minus:hover',
					'.woocommerce-page .qodef-content .qodef-quantity-buttons .qodef-quantity-plus:hover',
					'div.woocommerce .qodef-quantity-buttons .qodef-quantity-minus:hover',
					'div.woocommerce .qodef-quantity-buttons .qodef-quantity-plus:hover',
					'.qodef-woocommerce-page .qodef-content .variations .reset_variations',
					'.qodef-woocommerce-page .qodef-content table.group_table a:hover',
					'.qodef-woocommerce-page.woocommerce-account .woocommerce form.login p label',
					'.qodef-woocommerce-page.woocommerce-account .woocommerce form.edit-account fieldset>legend',
					'.qodef-woocommerce-page.woocommerce-account .vc_row .woocommerce form.login p label:not(.inline)',
					'.qodef-woocommerce-page.qodef-woocommerce-order-tracking .woocommerce>.track_order .form-row-first label',
					'.qodef-woocommerce-page.qodef-woocommerce-order-tracking .woocommerce>.track_order .form-row-last label',
					'ul.products>.product .qodef-product-list-title',
					'ul.products>.product .price',
					'.qodef-content .woocommerce.add_to_cart_inline del',
					'.qodef-content .woocommerce.add_to_cart_inline ins',
					'div.woocommerce>.single-product .woocommerce-tabs table th',
					'.qodef-woo-single-page .qodef-single-product-summary .price',
					'.qodef-woo-single-page .qodef-single-product-summary .product_meta>span a:hover',
					'.qodef-woo-single-page .woocommerce-tabs ul.tabs>li a:hover',
					'.qodef-woo-single-page .qodef-single-product-summary p.stock.in-stock',
					'.qodef-woo-single-page .qodef-single-product-summary p.stock.out-of-stock',
					'.qodef-shopping-cart-dropdown .qodef-cart-bottom .qodef-view-cart:hover',
					'.qodef-shopping-cart-dropdown .qodef-cart-bottom .qodef-checkout',
					'.widget.woocommerce.widget_layered_nav ul li.chosen a',
					'.widget.woocommerce.widget_price_filter .price_slider_amount .button',
					'.widget.woocommerce.widget_price_filter .price_slider_amount .price_label',
					'.widget.woocommerce.widget_products ul li a span.product-title',
					'.widget.woocommerce.widget_recent_reviews ul li a span.product-title',
					'.widget.woocommerce.widget_recently_viewed_products ul li a span.product-title',
					'.widget.woocommerce.widget_top_rated_products ul li a span.product-title',
					'.widget.woocommerce.widget_products ul li .amount',
					'.widget.woocommerce.widget_recently_viewed_products ul li .amount',
					'.widget.woocommerce.widget_top_rated_products ul li .amount',
					'.widget.woocommerce.widget_product_search .woocommerce-product-search button:hover',
					'.qodef-product-info .qodef-pi-add-to-cart .qodef-btn.qodef-btn-solid.qodef-white-skin',
					'.qodef-product-info .qodef-pi-add-to-cart .qodef-btn.qodef-btn-solid.qodef-dark-skin:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-excerpt',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-price',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .added_to_cart:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .button:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .added_to_cart',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .button',
					'.qodef-pls-holder .qodef-pls-text .qodef-pls-price',
					'.qodef-pl-holder .qodef-pli .qodef-pli-excerpt',
					'.qodef-pl-holder .qodef-pli .qodef-pli-price',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-default-skin .added_to_cart:hover',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-default-skin .button:hover',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-light-skin .added_to_cart',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-light-skin .button',
					'.qodef-pl-holder.qodef-product-info-dark .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-category a',
					'.qodef-pl-holder.qodef-product-info-dark .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-excerpt',
					'.qodef-pl-holder.qodef-product-info-dark .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-price',
					'.qodef-pl-holder.qodef-product-info-dark .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-rating',
					'.qodef-pl-holder.qodef-product-info-dark .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-title'
				);
			}

			$color_selector = array_merge( $color_selector, $woo_color_selector );

			$color_important_selector = array(
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li a:hover',
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current-menu-ancestor>a',
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current-menu-item>a',
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu ul li ul li.current_page_item>a',
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu>ul>li.current-menu-ancestor>a',
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu>ul>li.qodef-active-item>a',
				'.qodef-dark-header.qodef-header-vertical .qodef-vertical-menu>ul>li>a',
				'.qodef-btn.qodef-btn-solid:not(.qodef-btn-custom-hover-color):hover',
				'.qodef-price-table.qodef-light-skin .qodef-pt-inner ul li.qodef-pt-button a'
			);

			$background_color_selector = array(
				'.qodef-line-spinner-holder .qodef-line-rect-dark',
				'.qodef-st-loader .pulse',
				'.qodef-st-loader .double_pulse .double-bounce1',
				'.qodef-st-loader .double_pulse .double-bounce2',
				'.qodef-st-loader .cube',
				'.qodef-st-loader .rotating_cubes .cube1',
				'.qodef-st-loader .rotating_cubes .cube2',
				'.qodef-st-loader .stripes>div',
				'.qodef-st-loader .wave>div',
				'.qodef-st-loader .two_rotating_circles .dot1',
				'.qodef-st-loader .two_rotating_circles .dot2',
				'.qodef-st-loader .five_rotating_circles .container1>div',
				'.qodef-st-loader .five_rotating_circles .container2>div',
				'.qodef-st-loader .five_rotating_circles .container3>div',
				'.qodef-st-loader .atom .ball-1:before',
				'.qodef-st-loader .atom .ball-2:before',
				'.qodef-st-loader .atom .ball-3:before',
				'.qodef-st-loader .atom .ball-4:before',
				'.qodef-st-loader .clock .ball:before',
				'.qodef-st-loader .mitosis .ball',
				'.qodef-st-loader .lines .line1',
				'.qodef-st-loader .lines .line2',
				'.qodef-st-loader .lines .line3',
				'.qodef-st-loader .lines .line4',
				'.qodef-st-loader .fussion .ball',
				'.qodef-st-loader .fussion .ball-1',
				'.qodef-st-loader .fussion .ball-2',
				'.qodef-st-loader .fussion .ball-3',
				'.qodef-st-loader .fussion .ball-4',
				'.qodef-st-loader .wave_circles .ball',
				'.qodef-st-loader .pulse_circles .ball',
				'#submit_comment:hover',
				'.qodef-cf7-btn-wrapper .qodef-cf7-btn-bgrnd-idle',
				'.qodef-owl-slider .owl-dots .owl-dot.active span',
				'.qodef-owl-slider .owl-dots .owl-dot:hover span',
				'.widget #wp-calendar td#today',
				'.widget.widget_categories ul li a:hover:after',
				'#ui-datepicker-div .ui-widget-header',
				'body .pp_overlay',
				'body .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice',
				'.qodef-blog-holder article.format-link .qodef-post-text',
				'.qodef-blog-holder article.format-audio .qodef-blog-audio-holder .mejs-container',
				'.qodef-blog-holder article.format-audio .qodef-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
				'.qodef-blog-holder .post-password-form input[type=submit]:hover',
				'.qodef-blog-pagination ul li a.qodef-pag-active:after',
				'.qodef-blog-pag-loading>div',
				'.qodef-single-links-pages .qodef-single-links-pages-inner>span:after',
				'.qodef-blog-list-holder .qodef-bl-item.format-link .qodef-bli-inner',
				'.qodef-bl-loading>div',
				'.qodef-page-footer .qodef-footer-top-holder',
				'.qodef-page-footer .qodef-footer-bottom-holder',
				'.qodef-drop-down .narrow .second .inner ul',
				'.qodef-drop-down .wide .second .inner',
				'.qodef-fullscreen-menu-holder',
				'.qodef-top-bar',
				'.qodef-search-cover',
				'.qodef-search-fade .qodef-fullscreen-with-sidebar-search-holder .qodef-fullscreen-search-table',
				'.qodef-search-fade .qodef-fullscreen-search-holder .qodef-fullscreen-search-table',
				'.qodef-search-slide-window-top',
				'.qodef-side-menu',
				'.qodef-social-icons-group-widget.qodef-square-icons .qodef-social-icon-widget-holder',
				'.qodef-social-icons-group-widget.qodef-square-icons .qodef-social-icon-widget-holder:hover',
				'.qodef-social-icons-group-widget.qodef-square-icons.qodef-light-skin .qodef-social-icon-widget-holder:hover',
				'.qodef-ps-navigation .qodef-ps-back-btn a .social_flickr',
				'.qodef-pl-loading>div',
				'.qodef-accordion-holder.qodef-ac-boxed .qodef-accordion-title.ui-state-active',
				'.qodef-accordion-holder.qodef-ac-boxed .qodef-accordion-title.ui-state-hover',
				'.qodef-btn.qodef-btn-solid .qodef-btn-bgrnd-idle',
				'.qodef-dropcaps.qodef-circle',
				'.qodef-dropcaps.qodef-square',
				'.qodef-icon-shortcode.qodef-circle',
				'.qodef-icon-shortcode.qodef-dropcaps.qodef-circle',
				'.qodef-icon-shortcode.qodef-square',
				'.qodef-price-table .qodef-pt-inner ul li.qodef-pt-description-holder .qodef-pt-description:after',
				'.qodef-price-table.qodef-light-skin .qodef-pt-inner',
				'.qodef-process-holder .qodef-process-circle',
				'.qodef-process-holder .qodef-process-line',
				'.qodef-progress-bar .qodef-pb-content-holder .qodef-pb-content',
				'.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li.ui-state-active a',
				'.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li.ui-state-hover a',
				'.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li.ui-state-active a',
				'.qodef-tabs.qodef-tabs-standard .qodef-tabs-nav li.ui-state-hover a',
				'.qodef-tabs.qodef-tabs-boxed .qodef-tabs-nav li a'
			);

			$background_color_important_selector = array(
				'.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg) .qodef-btn-bgrnd-hover',
				'.qodef-price-table.qodef-light-skin .qodef-pt-inner ul li.qodef-pt-button a:hover'
			);

			$woo_background_color_selector = array();
			if ( iver_select_is_woocommerce_installed() ) {
				$woo_background_color_selector = array(
					'.woocommerce-page .qodef-content .single_add_to_cart_button:after',
					'div.woocommerce .single_add_to_cart_button:after',
					'.woocommerce .qodef-onsale',
					'.woocommerce .qodef-new-product',
					'ul.products>.product .qodef-pl-inner .qodef-pl-text-inner a.button.product_type_simple.ajax_add_to_cart',
					'ul.products>.product .qodef-pl-inner .qodef-pl-text-inner .added_to_cart',
					'ul.products>.product .qodef-pl-inner .qodef-pl-text-inner a.button.product_type_variable.add_to_cart_button',
					'.qodef-shopping-cart-dropdown',
					'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content',
					'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
					'.qodef-product-info .qodef-pi-add-to-cart .qodef-btn.qodef-btn-solid.qodef-dark-skin',
					'.qodef-product-info .qodef-pi-add-to-cart .qodef-btn.qodef-btn-solid.qodef-white-skin:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-image-outer .qodef-plc-image .qodef-plc-onsale',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-image-outer .qodef-plc-image .qodef-plc-new-product',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .added_to_cart',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .added_to_cart:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .button',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-dark-skin .button:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .added_to_cart:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-light-skin .button:hover',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-image .qodef-pli-onsale',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-image .qodef-pli-new-product',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-dark-skin .added_to_cart',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-dark-skin .added_to_cart:hover',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-dark-skin .button',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-dark-skin .button:hover'
				);
			}

			$background_color_selector = array_merge( $background_color_selector, $woo_background_color_selector );

			$border_color_selector = array(
				'.qodef-st-loader .pulse_circles .ball',
				'#submit_comment',
				'.post-password-form input[type=submit]',
				'input.wpcf7-form-control.wpcf7-submit',
				'#submit_comment:hover',
				'.post-password-form input[type=submit]:hover',
				'input.wpcf7-form-control.wpcf7-submit:hover',
				'div.qodef-main-home-default-form .qodef-cf7-btn-wrapper',
				'.qodef-owl-slider .owl-dots .owl-dot.active span',
				'.qodef-owl-slider .owl-dots .owl-dot:hover span',
				'#ui-datepicker-div .ui-widget-header',
				'body .select2-container--default .select2-search--dropdown .select2-search__field:focus',
				'.qodef-blog-holder article.format-quote .qodef-post-text',
				'.qodef-blog-list-holder .qodef-bl-item.format-quote .qodef-bli-inner',
				'.qodef-fullscreen-with-sidebar-search-holder .qodef-search-field:focus',
				'.qodef-accordion-holder.qodef-ac-simple .qodef-accordion-content.ui-accordion-content-active',
				'.qodef-btn.qodef-btn-solid',
				'.qodef-btn.qodef-btn-outline'
			);

			$woo_border_color_selector = array();
			if ( iver_select_is_woocommerce_installed() ) {
				$woo_border_color_selector = array(
					'.woocommerce-page .qodef-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'.woocommerce-page .qodef-content a.added_to_cart',
					'.woocommerce-page .qodef-content a.button',
					'.woocommerce-page .qodef-content button[type=submit]:not(.qodef-woo-search-widget-button)',
					'.woocommerce-page .qodef-content input[type=submit]',
					'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
					'div.woocommerce a.added_to_cart',
					'div.woocommerce a.button',
					'div.woocommerce button[type=submit]:not(.qodef-woo-search-widget-button)',
					'div.woocommerce input[type=submit]',
					'.qodef-product-info .qodef-pi-add-to-cart .qodef-btn.qodef-btn-solid.qodef-dark-skin',
					'.qodef-product-info .qodef-pi-add-to-cart .qodef-btn.qodef-btn-solid.qodef-white-skin:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .added_to_cart',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .button',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .added_to_cart:hover',
					'.qodef-plc-holder .qodef-plc-item .qodef-plc-add-to-cart.qodef-default-skin .button:hover',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-default-skin .added_to_cart',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-default-skin .button',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-default-skin .added_to_cart:hover',
					'.qodef-pl-holder .qodef-pli-inner .qodef-pli-text-inner .qodef-pli-add-to-cart.qodef-default-skin .button:hover'
				);
			}

			$border_color_selector = array_merge( $border_color_selector, $woo_border_color_selector );

			$border_color_important_selector = array( '.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover' );

			echo iver_select_dynamic_css( $color_selector, array( 'color' => $first_main_color ) );
			echo iver_select_dynamic_css( $color_important_selector, array( 'color' => $first_main_color . '!important' ) );
			echo iver_select_dynamic_css( $background_color_selector, array( 'background-color' => $first_main_color ) );
			echo iver_select_dynamic_css( $background_color_important_selector, array( 'background-color' => $first_main_color . '!important' ) );
			echo iver_select_dynamic_css( $border_color_selector, array( 'border-color' => $first_main_color ) );
			echo iver_select_dynamic_css( $border_color_important_selector, array( 'border-color' => $first_main_color . '!important' ) );
		}

		$page_background_color = iver_select_options()->getOptionValue( 'page_background_color' );
		if ( ! empty( $page_background_color ) ) {
			$background_color_selector = array(
				'body',
				'.qodef-content'
			);
			echo iver_select_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
		}

		$selection_color = iver_select_options()->getOptionValue( 'selection_color' );
		if ( ! empty( $selection_color ) ) {
			echo iver_select_dynamic_css( '::selection', array( 'background' => $selection_color ) );
			echo iver_select_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
		}

		$preload_background_styles = array();

		if ( iver_select_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
			$preload_background_styles['background-image'] = 'url(' . iver_select_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
		}

		echo iver_select_dynamic_css( '.qodef-preload-background', $preload_background_styles );
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_design_styles' );
}

if ( ! function_exists( 'iver_select_content_styles' ) ) {
	function iver_select_content_styles() {
		$content_style = array();

		$padding = iver_select_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}

		$content_selector = array(
			'.qodef-content .qodef-content-inner > .qodef-full-width > .qodef-full-width-inner',
		);

		echo iver_select_dynamic_css( $content_selector, $content_style );

		$content_style_in_grid = array();

		$padding_in_grid = iver_select_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}

		$content_selector_in_grid = array(
			'.qodef-content .qodef-content-inner > .qodef-container > .qodef-container-inner',
		);

		echo iver_select_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_content_styles' );
}

if ( ! function_exists( 'iver_select_h1_styles' ) ) {
	function iver_select_h1_styles() {
		$margin_top    = iver_select_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = iver_select_options()->getOptionValue( 'h1_margin_bottom' );

		$item_styles = iver_select_get_typography_styles( 'h1' );

		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = iver_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = iver_select_filter_px( $margin_bottom ) . 'px';
		}

		$item_selector = array(
			'h1'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_h1_styles' );
}

if ( ! function_exists( 'iver_select_h2_styles' ) ) {
	function iver_select_h2_styles() {
		$margin_top    = iver_select_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = iver_select_options()->getOptionValue( 'h2_margin_bottom' );

		$item_styles = iver_select_get_typography_styles( 'h2' );

		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = iver_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = iver_select_filter_px( $margin_bottom ) . 'px';
		}

		$item_selector = array(
			'h2'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_h2_styles' );
}

if ( ! function_exists( 'iver_select_h3_styles' ) ) {
	function iver_select_h3_styles() {
		$margin_top    = iver_select_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = iver_select_options()->getOptionValue( 'h3_margin_bottom' );

		$item_styles = iver_select_get_typography_styles( 'h3' );

		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = iver_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = iver_select_filter_px( $margin_bottom ) . 'px';
		}

		$item_selector = array(
			'h3'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_h3_styles' );
}

if ( ! function_exists( 'iver_select_h4_styles' ) ) {
	function iver_select_h4_styles() {
		$margin_top    = iver_select_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = iver_select_options()->getOptionValue( 'h4_margin_bottom' );

		$item_styles = iver_select_get_typography_styles( 'h4' );

		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = iver_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = iver_select_filter_px( $margin_bottom ) . 'px';
		}

		$item_selector = array(
			'h4'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_h4_styles' );
}

if ( ! function_exists( 'iver_select_h5_styles' ) ) {
	function iver_select_h5_styles() {
		$margin_top    = iver_select_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = iver_select_options()->getOptionValue( 'h5_margin_bottom' );

		$item_styles = iver_select_get_typography_styles( 'h5' );

		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = iver_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = iver_select_filter_px( $margin_bottom ) . 'px';
		}

		$item_selector = array(
			'h5'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_h5_styles' );
}

if ( ! function_exists( 'iver_select_h6_styles' ) ) {
	function iver_select_h6_styles() {
		$margin_top    = iver_select_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = iver_select_options()->getOptionValue( 'h6_margin_bottom' );

		$item_styles = iver_select_get_typography_styles( 'h6' );

		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = iver_select_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = iver_select_filter_px( $margin_bottom ) . 'px';
		}

		$item_selector = array(
			'h6'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_h6_styles' );
}

if ( ! function_exists( 'iver_select_text_styles' ) ) {
	function iver_select_text_styles() {
		$item_styles = iver_select_get_typography_styles( 'text' );

		$item_selector = array(
			'p'
		);

		if ( ! empty( $item_styles ) ) {
			echo iver_select_dynamic_css( $item_selector, $item_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_text_styles' );
}

if ( ! function_exists( 'iver_select_link_styles' ) ) {
	function iver_select_link_styles() {
		$link_styles      = array();
		$link_color       = iver_select_options()->getOptionValue( 'link_color' );
		$link_font_style  = iver_select_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = iver_select_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = iver_select_options()->getOptionValue( 'link_fontdecoration' );

		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}

		$link_selector = array(
			'a',
			'p a'
		);

		if ( ! empty( $link_styles ) ) {
			echo iver_select_dynamic_css( $link_selector, $link_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_link_styles' );
}

if ( ! function_exists( 'iver_select_link_hover_styles' ) ) {
	function iver_select_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = iver_select_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = iver_select_options()->getOptionValue( 'link_hover_fontdecoration' );

		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}

		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);

		if ( ! empty( $link_hover_styles ) ) {
			echo iver_select_dynamic_css( $link_hover_selector, $link_hover_styles );
		}

		$link_heading_hover_styles = array();

		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}

		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);

		if ( ! empty( $link_heading_hover_styles ) ) {
			echo iver_select_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}

	add_action( 'iver_select_style_dynamic', 'iver_select_link_hover_styles' );
}

if ( ! function_exists( 'iver_select_smooth_page_transition_styles' ) ) {
	function iver_select_smooth_page_transition_styles( $style ) {
		$id            = iver_select_get_page_id();
		$loader_style  = array();
		$current_style = '';

		$background_color = iver_select_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}

		$loader_selector = array(
			'.qodef-smooth-transition-loader',
			'.qodef-line-spinner-holder .qodef-line-rect-dark'
		);

		if ( ! empty( $loader_style ) ) {
			$current_style .= iver_select_dynamic_css( $loader_selector, $loader_style );
		}

		$spinner_style = array();
		$spinner_color = iver_select_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}

		$spinner_selectors = array(
			'.qodef-st-loader .qodef-rotate-circles > div',
			'.qodef-st-loader .pulse',
			'.qodef-st-loader .double_pulse .double-bounce1',
			'.qodef-st-loader .double_pulse .double-bounce2',
			'.qodef-st-loader .cube',
			'.qodef-st-loader .rotating_cubes .cube1',
			'.qodef-st-loader .rotating_cubes .cube2',
			'.qodef-st-loader .stripes > div',
			'.qodef-st-loader .wave > div',
			'.qodef-st-loader .two_rotating_circles .dot1',
			'.qodef-st-loader .two_rotating_circles .dot2',
			'.qodef-st-loader .five_rotating_circles .container1 > div',
			'.qodef-st-loader .five_rotating_circles .container2 > div',
			'.qodef-st-loader .five_rotating_circles .container3 > div',
			'.qodef-st-loader .atom .ball-1:before',
			'.qodef-st-loader .atom .ball-2:before',
			'.qodef-st-loader .atom .ball-3:before',
			'.qodef-st-loader .atom .ball-4:before',
			'.qodef-st-loader .clock .ball:before',
			'.qodef-st-loader .mitosis .ball',
			'.qodef-st-loader .lines .line1',
			'.qodef-st-loader .lines .line2',
			'.qodef-st-loader .lines .line3',
			'.qodef-st-loader .lines .line4',
			'.qodef-st-loader .fussion .ball',
			'.qodef-st-loader .fussion .ball-1',
			'.qodef-st-loader .fussion .ball-2',
			'.qodef-st-loader .fussion .ball-3',
			'.qodef-st-loader .fussion .ball-4',
			'.qodef-st-loader .wave_circles .ball',
			'.qodef-st-loader .pulse_circles .ball',
			'.qodef-line-spinner-holder .qodef-line-rect-light',
			'.qodef-line-spinner-holder .qodef-line-spinner-start',
			'.qodef-line-spinner-holder.qodef-fill .qodef-line-spinner-end'
		);

		if ( ! empty( $spinner_style ) ) {
			$current_style .= iver_select_dynamic_css( $spinner_selectors, $spinner_style );
		}

		$current_style = $current_style . $style;

		return $current_style;
	}

	add_filter( 'iver_select_add_page_custom_style', 'iver_select_smooth_page_transition_styles' );
}