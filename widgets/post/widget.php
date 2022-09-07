<?php

namespace Easy_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

if (!defined('ABSPATH'))
    exit;      // Exit if accessed directly

class Post_Card_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'easy_post_card';
    }


    public function get_title()
    {
        return __('Post Card', 'easy-addons');
    }


    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }


    public function get_categories()
    {
        return ['easy-addons'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @return array Widget scripts dependencies.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_style_depends()
    {
        return ['posts'];
    }

    /*
     * Adding the controls fields for the Card Elements
     */

    protected function register_controls()
    {

        /*
         * Start post card controls fields
         */
        $this->start_controls_section(
            'post_card_content', array(
                'label' => esc_html__('Post Content', 'easy-addons'),
            )
        );

        $this->add_control(
            'post_card_style', [
                'label' => __('Post Card Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'post-card-style-1' => esc_html__('Post Card Style 1', 'easy-addons'),
                    'post-card-style-2' => esc_html__('Post Card Style 2', 'easy-addons'),
                    'post-card-style-3' => esc_html__('Post Card Style 3', 'easy-addons'),
                    'post-card-style-4' => esc_html__('Post Card Style 4', 'easy-addons'),
                ],
                'default' => 'post-card-style-1',
            ]
        );

        $this->add_responsive_control(
            'post_card_columns', [
                'label' => __('Columns', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                ],
                'prefix_class' => 'elementor-grid%s-',
                'frontend_available' => true,
                'selectors' => [
                    '.elementor-msie {{WRAPPER}} .elementor-post-item' => 'width: calc( 100% / {{SIZE}} )',
                ],
            ]
        );

        $this->add_control(
            'number_of_posts', [
                'label' => __('Display No. of Posts', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(), [
                'name' => 'post_image_size',
                'exclude' => ['custom'],
                'default' => 'medium_large',
            ]
        );

        $this->add_control(
            'show_title', [
                'label' => __('Show Title', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'label_off' => __('Off', 'easy-addons'),
                'label_on' => __('On', 'easy-addons'),
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title_tag', [
                'label' => __('Title HTML Tag', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h2',
                'condition' => [
                    'show_title' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_excerpt', [
                'label' => __('Excerpt', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'easy-addons'),
                'label_off' => __('Hide', 'easy-addons'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'excerpt_length', [
                'label' => __('Excerpt Length', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => apply_filters('excerpt_length', 20),
                'condition' => ['show_excerpt' => 'yes'],
            ]
        );
        $this->add_control(
            'excerpt_from', [
                'label' => __('Excerpt From', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'content' => 'Content',
                    'excerpt' => 'Excerpt',
                ],
                'default' => 'content',
                'condition' => [
                    'show_excerpt' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_read_more', [
                'label' => __('Read More', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'easy-addons'),
                'label_off' => __('Hide', 'easy-addons'),
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'read_more_text', [
                'label' => __('Read More Text', 'easy-addons'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Read More »', 'easy-addons'),
                'condition' => ['show_read_more' => 'yes'],
            ]
        );

        $this->add_control(
            'show_meta_data', [
                'label' => __('Show Meta Data', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'easy-addons'),
                'label_off' => __('Hide', 'easy-addons'),
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'meta_data', [
                'label' => __('Meta Data', 'easy-addons'),
                'label_block' => true,
                'type' => Controls_Manager::SELECT2,
                'default' => ['author', 'date', 'comments', 'tags', 'category'],
                'multiple' => true,
                'condition' => ['show_meta_data' => 'yes'],
                'options' => [
                    'author' => __('Author', 'easy-addons'),
                    'date' => __('Date', 'easy-addons'),
                    'comments' => __('Comments', 'easy-addons'),
                    'tags' => __('Tags', 'easy-addons'),
                    'category' => __('Category', 'easy-addons'),
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_post_query', array(
                'label' => esc_html__('Query', 'easy-addons'),
            )
        );

        $this->add_control(
            'blog_categories', [
                'label' => __('Categories', 'easy-addons'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'description' => __('Select the categories you want to show', 'easy-addons'),
                'options' => easy_addons_post_categories(),
            ]
        );

        $this->add_control(
            'advanced', [
                'label' => __('Advanced', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'post_card_orderby', [
                'label' => __('Order By', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'post_date',
                'options' => [
                    'post_date' => __('Date', 'easy-addons'),
                    'post_title' => __('Title', 'easy-addons'),
                    'menu_order' => __('Menu Order', 'easy-addons'),
                    'rand' => __('Random', 'easy-addons'),
                ],
            ]
        );

        $this->add_control(
            'post_sort_order', [
                'label' => __('Sort By', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => [
                    'asc' => __('ASC', 'easy-addons'),
                    'desc' => __('DESC', 'easy-addons'),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_card_layout', [
                'label' => __('Post Card Layout', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_card_grid_gap', [
                'label' => __('Grid Gap', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'frontend_available' => true,
                'selectors' => [
                    '{{WRAPPER}} .post-card-grid-gap' => 'grid-column-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'post_card_row_gap', [
                'label' => __('Rows Gap', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 30,
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'frontend_available' => true,
                'selectors' => [
                    '{{WRAPPER}} .post-card-container,
				 {{WRAPPER}} .post-card-style-6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'post_card_border_radius', [
                'label' => __('Border Radius', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .post-card-box-radius' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'post_card_style' => ['post-card-style-2', 'post-card-style-6']
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'post_card_box_shadow',
                'label' => esc_html__('Box Shadow', 'easy-addons'),
                'selector' => '{{WRAPPER}} .post-card-module',
            ]
        );

        $this->add_control(
            'content_box_bg_color', [
                'label' => __('Content Box Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card-content-box, 
                    {{WRAPPER}} .post-card-module, 
				{{WRAPPER}} .post-card-content-bg-box' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'post_card_alignment', [
                'label' => __('Alignment', 'easy-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'easy-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'easy-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'easy-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'easy-addons'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'prefix_class' => 'elementor-posts--align-',
                'selectors' => [
                    '{{WRAPPER}} .post-card-alignment,
				 {{WRAPPER}} .card_align,
				 {{WRAPPER}} .card-category,
				 {{WRAPPER}} .category.post-card_category.post-card_category_background,
                 {{WRAPPER}} .card_title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section_design_content', [
                'label' => __('Content', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'heading_title_style', [
                'label' => __('Title', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'condition' => ['show_title' => 'yes'],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'selector' =>
                    '{{WRAPPER}} .post-card_title,
            {{WRAPPER}} .post-card_title a,
            {{WRAPPER}} .post-card-style-6 .card-title a'
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => __('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_title,
                {{WRAPPER}} .post-card_title a,
                {{WRAPPER}} .card-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_h_color', [
                'label' => __('Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_title:hover,
                {{WRAPPER}} .post-card_title a:hover,
                {{WRAPPER}} .card-title a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_spacing', [
                'label' => __('Spacing', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-card_title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_title' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'heading_excerpt_style', [
                'label' => __('Excerpt', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'show_excerpt' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'excerpt_color', [
                'label' => __('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_excerpt' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'show_excerpt' => 'yes'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'excerpt_typography',
                'selector' => '{{WRAPPER}} .post-card_excerpt',
                'condition' => [
                    'show_excerpt' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'excerpt_spacing', [
                'label' => __('Spacing', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-card_excerpt' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_excerpt' => 'yes'
                ],
            ]
        );

        $this->add_control(
            'heading_read_more_style', [
                'label' => __('Read More', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => ['show_read_more' => 'yes'],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'read_more_typography',
                'selector' => '{{WRAPPER}} .post-card_read-more',
                'condition' => ['show_read_more' => 'yes'],
            ]
        );

        $this->add_control(
            'read_more_color', [
                'label' => __('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_read-more' => 'color: {{VALUE}};',
                ],
                'condition' => ['show_read_more' => 'yes'],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_card_category', [
                'label' => __('Category', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'img_border_radius', [
                'label' => __('Border Radius', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .post-card-item_img, {{WRAPPER}} .elementor-post-item__overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'post_card_cat_tabs', [
                'label' => __('Category', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('post_cat_normal', [
                'label' => __('Normal', 'easy-addons'),
            ]
        );

        $this->add_control(
            'category_style', [
                'label' => __('Category', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'category_typography',
                'selector' => '{{WRAPPER}} .post-card_category,
                {{WRAPPER}} .post-card_category a',
            ]
        );

        $this->add_control(
            'category_color', [
                'label' => __('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_category a,
                {{WRAPPER}} .post-card-style-3 .card-category' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_links_bg_color', [
                'label' => __('Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_category span.cat-links a' => 'background: {{VALUE}};  border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_spacing', [
                'label' => __('Spacing', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-card_category' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('post_cat_hover', [
                'label' => __('Hover', 'easy-addons'),
            ]
        );

        $this->add_control(
            'category_hover_color', [
                'label' => __('Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .post-card_category span.cat-links a:hover,
                {{WRAPPER}} .post-content .post-card_category a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'category_hover_bg', [
                'label' => __('Hover Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_category span.cat-links a:hover,
                {{WRAPPER}} .post-content .post-card_category a:hover' => 'background: {{VALUE}};  border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'post_card_meta_info', [
                'label' => __('Post Meta', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'post_card_meta_padding',
            [
                'label' => esc_html__('Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .post-meta.post-card_meta-data.post-card-alignment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'post_card_meta_info_tabs', [
                'label' => __('Category', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('post_card_meta_info_normal', [
                'label' => __('Normal', 'easy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'meta_typography',
                'selector' =>
                    '{{WRAPPER}} .post-card_meta-data .easy-post-meta-info li,
            {{WRAPPER}} .post-card_meta-data i .fa,
            {{WRAPPER}} .post-card_meta-data span a,
            {{WRAPPER}} .post-card-style-6 .card-by a',
                'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->add_control(
            'meta_color', [
                'label' => __('Icon Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-meta.post-card_meta-data.post-card-alignment ul li i' => 'color: {{VALUE}};',
                ],
                'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->add_control(
            'meta_separator_color', [
                'label' => __('Text Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post-card_meta-data span,
                    {{WRAPPER}} .post-meta.post-card_meta-data.post-card-alignment ul li,
                {{WRAPPER}} .post-card_meta-data a,
                {{WRAPPER}} .post-card-style-6 .card-by a' => 'color: {{VALUE}};',
                ],
                'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->add_control(
            'meta_spacing', [
                'label' => __('Spacing', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .post-card_meta-data,
		{{WRAPPER}} .post-card-style-6 .card-by' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => ['show_meta_data' => 'yes'],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('post_card_meta_info_hover', [
                'label' => __('Hover', 'easy-addons'),
            ]
        );

        $this->add_control(
            'post_card_meta_info_hover_color', [
                'label' => __('Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    ' {{WRAPPER}} .post-card_category span.cat-links a:hover,
                    {{WRAPPER}} .post-meta.post-card_meta-data.post-card-alignment ul li a:hover,
                {{WRAPPER}} .post-content .post-card_category a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }

    /**
     * Render Card Elements widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $card_style = $settings['post_card_style'];

        if ($settings['post_card_columns'] == "1") {
            $column = "elementor-grid-1";
        } elseif ($settings['post_card_columns'] == "2") {
            $column = "elementor-grid-2";
        } elseif ($settings['post_card_columns'] == "3") {
            $column = "elementor-grid-3";
        } elseif ($settings['post_card_columns'] == "4") {
            $column = "elementor-grid-4";
        }

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $settings['number_of_posts'],
            'post_status' => 'publish',
            'orderby' => $settings['post_card_orderby'],
            'order' => $settings['post_sort_order']
        );

        if (isset($settings['blog_categories']) && !empty($settings['blog_categories'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'category',
                'field' => 'ID',
                'terms' => $settings['blog_categories'],
            );
        }

        $blog_posts = new \WP_Query($args);

        if ($blog_posts->have_posts()) :
            ?>
            <div class="post_card grid-container post-card-grid-gap elementor-grid <?php echo $card_style . ' ' . $column; ?>">
                <?php
                while ($blog_posts->have_posts()) : $blog_posts->the_post();

                    switch ($settings['post_card_style']) {
                        case 'post-card-style-1':
                            include EASY_ADDONS_PATH . '/widgets/post/posts/post-1.php';
                            break;
                        case 'post-card-style-2':
                            include EASY_ADDONS_PATH . '/widgets/post/posts/post-2.php';
                            break;
                        case 'post-card-style-3':
                            include EASY_ADDONS_PATH . '/widgets/post/posts/post-3.php';
                            break;
                        case 'post-card-style-4':
                            include EASY_ADDONS_PATH . '/widgets/post/posts/post-4.php';
                            break;
                        default:
                            include EASY_ADDONS_PATH . '/widgets/post/posts/post-1.php';
                            break;
                    }

                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php
        endif;
    }

}
