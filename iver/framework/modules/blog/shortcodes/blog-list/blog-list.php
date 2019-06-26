<?php
namespace IverCore\CPT\Shortcodes\BlogList;

use IverCore\Lib;

class BlogList implements Lib\ShortcodeInterface
{
    private $base;

    function __construct() {
        $this->base = 'qodef_blog_list';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Category filter
        add_filter('vc_autocomplete_qodef_blog_list_category_callback', array(&$this, 'blogCategoryAutocompleteSuggester',), 10, 1); // Get suggestion(find). Must return an array

        //Category render
        add_filter('vc_autocomplete_qodef_blog_list_category_render', array(&$this, 'blogCategoryAutocompleteRender',), 10, 1); // Get suggestion(find). Must return an array
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(
            array(
                'name'                      => esc_html__('Blog List', 'iver'),
                'base'                      => $this->base,
                'icon'                      => 'icon-wpb-blog-list extended-custom-icon',
                'category'                  => esc_html__('by IVER', 'iver'),
                'allowed_container_element' => 'vc_row',
                'params'                    => array(
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'type',
                        'heading'     => esc_html__('Type', 'iver'),
                        'value'       => array(
                            esc_html__('Standard', 'iver') => 'standard',
                            esc_html__('Boxed', 'iver')    => 'boxed',
                            esc_html__('Masonry', 'iver')  => 'masonry',
                            esc_html__('Simple', 'iver')   => 'simple',
                            esc_html__('Minimal', 'iver')  => 'minimal'
                        ),
                        'save_always' => true
                    ),
                    array(
                        'type'       => 'textfield',
                        'param_name' => 'number_of_posts',
                        'heading'    => esc_html__('Number of Posts', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'number_of_columns',
                        'heading'    => esc_html__('Number of Columns', 'iver'),
                        'value'      => array(
                            esc_html__('One', 'iver')   => '1',
                            esc_html__('Two', 'iver')   => '2',
                            esc_html__('Three', 'iver') => '3',
                            esc_html__('Four', 'iver')  => '4',
                            esc_html__('Five', 'iver')  => '5'
                        ),
                        'dependency' => array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'space_between_items',
                        'heading'     => esc_html__('Space Between Items', 'iver'),
                        'value'       => array_flip(iver_select_get_space_between_items_array()),
                        'save_always' => true,
                        'dependency'  => array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'orderby',
                        'heading'     => esc_html__('Order By', 'iver'),
                        'value'       => array_flip(iver_select_get_query_order_by_array()),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'order',
                        'heading'     => esc_html__('Order', 'iver'),
                        'value'       => array_flip(iver_select_get_query_order_array()),
                        'save_always' => true
                    ),
                    array(
                        'type'        => 'autocomplete',
                        'param_name'  => 'category',
                        'heading'     => esc_html__('Category', 'iver'),
                        'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'iver')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'param_name'  => 'image_size',
                        'heading'     => esc_html__('Image Size', 'iver'),
                        'value'       => array(
                            esc_html__('Original', 'iver')  => 'full',
                            esc_html__('Square', 'iver')    => 'iver_select_square',
                            esc_html__('Landscape', 'iver') => 'iver_select_landscape',
                            esc_html__('Portrait', 'iver')  => 'iver_select_portrait',
                            esc_html__('Thumbnail', 'iver') => 'thumbnail',
                            esc_html__('Medium', 'iver')    => 'medium',
                            esc_html__('Large', 'iver')     => 'large'
                        ),
                        'save_always' => true,
                        'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry'))
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'title_tag',
                        'heading'    => esc_html__('Title Tag', 'iver'),
                        'value'      => array_flip(iver_select_get_title_tag(true)),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'title_transform',
                        'heading'    => esc_html__('Title Text Transform', 'iver'),
                        'value'      => array_flip(iver_select_get_text_transform_array(true)),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'excerpt_length',
                        'heading'     => esc_html__('Text Length', 'iver'),
                        'description' => esc_html__('Number of characters', 'iver'),
                        'dependency'  => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry', 'simple')),
                        'group'       => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_image',
                        'heading'    => esc_html__('Enable Post Info Image', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_section',
                        'heading'    => esc_html__('Enable Post Info Section', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'type', 'value' => array('standard', 'boxed', 'masonry')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_author',
                        'heading'    => esc_html__('Enable Post Info Author', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_date',
                        'heading'    => esc_html__('Enable Post Info Date', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_category',
                        'heading'    => esc_html__('Enable Post Info Category', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false, true)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_comments',
                        'heading'    => esc_html__('Enable Post Info Comments', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_button',
                        'heading'    => esc_html__('Enable Post Info Button', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_excerpt',
                        'heading'    => esc_html__('Enable Post Info Excerpt', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_like',
                        'heading'    => esc_html__('Enable Post Info Like', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'post_info_share',
                        'heading'    => esc_html__('Enable Post Info Share', 'iver'),
                        'value'      => array_flip(iver_select_get_yes_no_select_array(false)),
                        'dependency' => Array('element' => 'post_info_section', 'value' => array('yes')),
                        'group'      => esc_html__('Post Info', 'iver')
                    ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'pagination_type',
                        'heading'    => esc_html__('Pagination Type', 'iver'),
                        'value'      => array(
                            esc_html__('None', 'iver')            => 'no-pagination',
                            esc_html__('Standard', 'iver')        => 'standard-shortcodes',
                            esc_html__('Load More', 'iver')       => 'load-more',
                            esc_html__('Infinite Scroll', 'iver') => 'infinite-scroll'
                        ),
                        'group'      => esc_html__('Additional Features', 'iver')
                    )
                )
            )
        );
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'type'                => 'standard',
            'number_of_posts'     => '-1',
            'number_of_columns'   => '3',
            'space_between_items' => 'normal',
            'category'            => '',
            'orderby'             => 'title',
            'order'               => 'ASC',
            'image_size'          => 'full',
            'title_tag'           => 'h3',
            'title_transform'     => '',
            'excerpt_length'      => '40',
            'post_info_section'   => 'yes',
            'post_info_image'     => 'yes',
            'post_info_author'    => 'no',
            'post_info_date'      => 'yes',
            'post_info_category'  => 'no',
            'post_info_comments'  => 'yes',
            'post_info_excerpt'   => 'no',
            'post_info_button'    => 'no',
            'post_info_like'      => 'no',
            'post_info_share'     => 'no',
            'pagination_type'     => 'no-pagination'
        );
        $params = shortcode_atts($default_atts, $atts);

        $queryArray = $this->generateQueryArray($params);
        $query_result = new \WP_Query($queryArray);
        $params['query_result'] = $query_result;

        $params['holder_data'] = $this->getHolderData($params);
        $params['holder_classes'] = $this->getHolderClasses($params, $default_atts);
        $params['module'] = 'list';

        $params['max_num_pages'] = $query_result->max_num_pages;
        $params['paged'] = isset($query_result->query['paged']) ? $query_result->query['paged'] : 1;

        $params['this_object'] = $this;

        ob_start();

        iver_select_get_module_template_part('shortcodes/blog-list/holder', 'blog', $params['type'], $params);

        $html = ob_get_contents();

        ob_end_clean();

        return $html;
    }

    public function getHolderClasses($params, $default_atts) {
        $holderClasses = array();

        $holderClasses[] = !empty($params['type']) ? 'qodef-bl-' . $params['type'] : 'qodef-bl-' . $default_atts['type'];
        $holderClasses[] = $this->getColumnNumberClass($params['number_of_columns']);
        $holderClasses[] = !empty($params['space_between_items']) ? 'qodef-' . $params['space_between_items'] . '-space' : 'qodef-' . $default_atts['space_between_items'] . '-space';
        $holderClasses[] = !empty($params['pagination_type']) ? 'qodef-bl-pag-' . $params['pagination_type'] : 'qodef-bl-pag-' . $default_atts['pagination_type'];

        return implode(' ', $holderClasses);
    }

    public function getColumnNumberClass($params) {
        switch ($params) {
            case 1:
                $classes = 'qodef-bl-one-column';
                break;
            case 2:
                $classes = 'qodef-bl-two-columns';
                break;
            case 3:
                $classes = 'qodef-bl-three-columns';
                break;
            case 4:
                $classes = 'qodef-bl-four-columns';
                break;
            case 5:
                $classes = 'qodef-bl-five-columns';
                break;
            default:
                $classes = 'qodef-bl-three-columns';
                break;
        }

        return $classes;
    }

    public function getHolderData($params) {
        $dataString = '';

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $query_result = $params['query_result'];

        $params['max_num_pages'] = $query_result->max_num_pages;

        if (!empty($paged)) {
            $params['next-page'] = $paged + 1;
        }

        foreach ($params as $key => $value) {
            if ($key !== 'query_result' && $value !== '') {
                $new_key = str_replace('_', '-', $key);

                $dataString .= ' data-' . $new_key . '=' . esc_attr(str_replace(' ', '', $value));
            }
        }

        return $dataString;
    }

    public function generateQueryArray($params) {
        $queryArray = array(
            'post_status'    => 'publish',
            'post_type'      => 'post',
            'orderby'        => $params['orderby'],
            'order'          => $params['order'],
            'posts_per_page' => $params['number_of_posts'],
            'post__not_in'   => get_option('sticky_posts')
        );

        if (!empty($params['category'])) {
            $queryArray['category_name'] = $params['category'];
        }

        if (!empty($params['next_page'])) {
            $queryArray['paged'] = $params['next_page'];
        } else {
            $query_array['paged'] = 1;
        }

        return $queryArray;
    }

    public function getTitleStyles($params) {
        $styles = array();

        if (!empty($params['title_transform'])) {
            $styles[] = 'text-transform: ' . $params['title_transform'];
        }

        return implode(';', $styles);
    }

    /**
     * Filter blog categories
     *
     * @param $query
     *
     * @return array
     */
    public function blogCategoryAutocompleteSuggester($query) {
        global $wpdb;
        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['category_title']) > 0) ? esc_html__('Category', 'iver') . ': ' . $value['category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;
    }

    /**
     * Find blog category by slug
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function blogCategoryAutocompleteRender($query) {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {
            // get portfolio category
            $category = get_term_by('slug', $query, 'category');
            if (is_object($category)) {

                $category_slug = $category->slug;
                $category_title = $category->name;

                $category_title_display = '';
                if (!empty($category_title)) {
                    $category_title_display = esc_html__('Category', 'iver') . ': ' . $category_title;
                }

                $data = array();
                $data['value'] = $category_slug;
                $data['label'] = $category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}