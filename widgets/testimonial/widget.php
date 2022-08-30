<?php

namespace Easy_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\Widget_Base;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Testimonial Widget
 */
class Testimonial extends Widget_Base
{

    /**
     * Get widget name.
     */
    public function get_name()
    {
        return 'testimonial';
    }

    /**
     * Get widget title.
     */
    public function get_title()
    {
        return esc_html__('Testimonial', 'easy-addons');
    }

    /**
     * Get widget icon.
     */
    public function get_icon()
    {
        return 'eicon-testimonial-carousel';
    }

    /**
     * Get custom help URL.
     */
    public function get_custom_help_url()
    {
        return '';
    }

    /**
     * Get Custom CSS Files
     */
    public function get_style_depends()
    {
        return ['testimonial'];
    }

    /**
     * Get Custom Js Files
     */
    public function get_script_depends()
    {
        return ['testimonial'];
    }

    /**
     * Get widget categories.
     */
    public function get_categories()
    {
        return ['easy-addons'];
    }

    /**
     * Get widget keywords.
     */
    public function get_keywords()
    {
        return ['testimonial', 'slider', 'client', 'reviews'];
    }

    /**
     * Register Testimonial widget controls.
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'testimonial_style', [
                'label' => __('Testimonial Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'testimonial-style-1' => esc_html__('Testimonial Style 1', 'easy-addons'),
                    'testimonial-style-2' => esc_html__('Testimonial Style 2', 'easy-addons'),
                    'testimonial-style-3' => esc_html__('Testimonial Style 3', 'easy-addons'),
                    'testimonial-style-4' => esc_html__('Testimonial Style 4', 'easy-addons')
                ],
                'default' => 'testimonial-style-1',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'client_image',
            [
                'label' => esc_html__('Choose Image', 'easy-addons'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'client_name', [
                'label' => esc_html__('Client Name', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Steve Thomas', 'easy-addons')
            ]
        );

        $repeater->add_control(
            'client_designation', [
                'label' => esc_html__('Client Designation', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('CEO at XYZ Ltd.', 'easy-addons')
            ]
        );

        $repeater->add_control(
            'client_review', [
                'label' => esc_html__('Client Review', 'easy-addons'),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => esc_html__('Lorem ipsum dolor sit amet,', 'easy-addons')
            ]
        );

        $repeater->add_control(
            'client_icon', [
                'label' => esc_html__('Select Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-quote-left',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'testimonials', [
                'label' => esc_html__('Testimonials', 'easy-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'client_name' => esc_html__('Steve Thomas', 'easy-addons'),
                        'client_designation' => esc_html__('CEO at XYZ Ltd.', 'easy-addons'),
                        'client_review' => esc_html__('Lorem ipsum dolor sit amet, consectetur adip iscing elit. Lorem ipsum dolor sit amet, consectetur adip iscing elit.', 'easy-addons'),
                    ]
                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'options_section',
            [
                'label' => esc_html__('Slider Options', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'autoplay', [
                'label' => esc_html__('Autoplay?', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('True', 'easy-addons'),
                'label_off' => esc_html__('False', 'easy-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_speed', [
                'label' => esc_html__('Autoplay Speed', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'infinity_loop', [
                'label' => esc_html__('Infinite Loop?', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'easy-addons'),
                'label_off' => esc_html__('No', 'easy-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'animation_speed', [
                'label' => esc_html__('Animation Speed', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 500,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Slider Styles', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_style_arrow', [
                'label' => esc_html__('Arrow', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'show_arrow', [
                'label' => esc_html__('Show?', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'easy-addons'),
                'label_off' => esc_html__('Hide', 'easy-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'arrow_left_icon', [
                'label' => esc_html__('Left Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-left',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'arrow_right_icon', [
                'label' => esc_html__('Right Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-chevron-right',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'show_arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'arrow_size', [
                'label' => esc_html__('Size', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 15,
                'max' => 60,
                'setp' => 1,
                'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-button-next, {{WRAPPER}} .easy-testimonial-button-prev' => 'font-size: {{VALUE}}px'
                ],
                'condition' => [
                    'show_arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'arrow_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-button-next, {{WRAPPER}} .easy-testimonial-button-prev' => 'color: {{VALUE}}'
                ],
                'condition' => [
                    'show_arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color', [
                'label' => esc_html__('Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#372872',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-button-next, {{WRAPPER}} .easy-testimonial-button-prev' => 'background-color: {{VALUE}}'
                ],
                'condition' => [
                    'show_arrow' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'heading_style_pagination', [
                'label' => esc_html__('Pagination', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'show_pagination', [
                'label' => esc_html__('Show Pagination?', 'easy-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'easy-addons'),
                'label_off' => esc_html__('Hide', 'easy-addons'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'pagination_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'condition' => [
                    'show_pagination' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}}'
                ]
            ]
        );

        $this->end_controls_section();

        /**
         * Style
         */
        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__('Styles', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'quote_icon', [
                'label' => esc_html__('Quote Icon', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'quote_icon_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-icons' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'quote_icon_bg_color', [
                'label' => esc_html__('Background', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#372872',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-icons' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            's_client_name', [
                'label' => esc_html__('Client Name', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'client_name_typography',
                'label' => esc_html__('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-testimonial-item h2',
            ]
        );

        $this->add_control(
            'client_name_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-item h2' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            's_client_designation', [
                'label' => esc_html__('Client Designation', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'client_designation_typography',
                'label' => esc_html__('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-testimonial-item h4',
            ]
        );

        $this->add_control(
            'client_designation_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-item h4' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            's_client_review', [
                'label' => esc_html__('Client Review', 'easy-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_s3',
                'label' => esc_html__( 'Border', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-testimonial.testimonial-style-3 .easy-testimonial-item',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'testimonial_style',
                            'operator' => '==',
                            'value' => 'testimonial-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'margin_s3',
            [
                'label' => esc_html__( 'Margin', 'easy-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial.testimonial-style-3 .easy-testimonial-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'testimonial_style',
                            'operator' => '==',
                            'value' => 'testimonial-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'client_review_typography',
                'label' => esc_html__('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-testimonial-item p',
            ]
        );

        $this->add_control(
            'client_review_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'selectors' => [
                    '{{WRAPPER}} .easy-testimonial-item p' => 'color: {{VALUE}}'
                ],
            ]
        );


        $this->end_controls_section();
    }


    /**
     * Render Testimonial
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();


        switch ($settings['testimonial_style']) {
            case 'testimonial-style-1':
                include EASY_ADDONS_PATH . '/widgets/testimonial/testimonials/testimonial-1.php';
                break;
            case 'testimonial-style-2':
                include EASY_ADDONS_PATH . '/widgets/testimonial/testimonials/testimonial-2.php';
                break;
            case 'testimonial-style-3':
                include EASY_ADDONS_PATH . '/widgets/testimonial/testimonials/testimonial-3.php';
                break;
            case 'testimonial-style-4':
                include EASY_ADDONS_PATH . '/widgets/testimonial/testimonials/testimonial-4.php';
                break;
            default:
                include EASY_ADDONS_PATH . '/widgets/testimonial/testimonials/testimonial-1.php';
                break;
        }
    }
}