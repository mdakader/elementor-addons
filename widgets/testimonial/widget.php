<?php

namespace Easy_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;
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


        $repeater = new Repeater();

        $repeater->add_control(
            'client_name', [
                'label' => esc_html__('Client Name', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Dianne Russell', 'easy-addons')
            ]
        );

        $repeater->add_control(
            'client_designation', [
                'label' => esc_html__('Client Designation', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('CTO at XYZ Ltd.', 'easy-addons')
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
                        'client_name' => esc_html__('Dianne Russell', 'easy-addons'),
                        'client_designation' => esc_html__('CTO at XYZ Ltd.', 'easy-addons'),
                        'client_review' => esc_html__('Lorem ipsum dolor sit amet, consectetur adip iscing elit. Sed sit libero', 'easy-addons'),
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
                    '{{WRAPPER}} .monadic-testimonial-button-next, {{WRAPPER}} .monadic-testimonial-button-prev' => 'font-size: {{VALUE}}px'
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
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .monadic-testimonial-button-next, {{WRAPPER}} .monadic-testimonial-button-prev' => 'color: {{VALUE}}'
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
                'default' => '#7958FC',
                'selectors' => [
                    '{{WRAPPER}} .monadic-testimonial-button-next, {{WRAPPER}} .monadic-testimonial-button-prev' => 'background-color: {{VALUE}}'
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
                    '{{WRAPPER}} .monadic-testimonial-icons' => 'color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'quote_icon_bg_color', [
                'label' => esc_html__('Background', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#7958FC',
                'selectors' => [
                    '{{WRAPPER}} .monadic-testimonial-icons' => 'background-color: {{VALUE}}'
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
                'selector' => '{{WRAPPER}} .monadic-testimonial-item h2',
            ]
        );

        $this->add_control(
            'client_name_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'selectors' => [
                    '{{WRAPPER}} .monadic-testimonial-item h2' => 'color: {{VALUE}}'
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
                'selector' => '{{WRAPPER}} .monadic-testimonial-item h4',
            ]
        );

        $this->add_control(
            'client_designation_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'selectors' => [
                    '{{WRAPPER}} .monadic-testimonial-item h4' => 'color: {{VALUE}}'
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
            Group_Control_Typography::get_type(), [
                'name' => 'client_review_typography',
                'label' => esc_html__('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .monadic-testimonial-item p',
            ]
        );

        $this->add_control(
            'client_review_color', [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#3C2C7D',
                'selectors' => [
                    '{{WRAPPER}} .monadic-testimonial-item p' => 'color: {{VALUE}}'
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
        $id = 'monadic-testimonial-' . $this->get_id();
        $testmonials = $settings['testimonials'];
        $allow_html = [
            'a' => [
                'href' => [],
                'title' => [],
            ],
            'br' => [],
            'strong' => [],
            'em' => []
        ];

        $this->add_render_attribute('monadic-testimonial', 'id', $id);
        $this->add_render_attribute('monadic-testimonial', 'class', 'monadic-testimonial-wrapper');
        $this->add_render_attribute('monadic-testimonial-slider', 'class', ['monadic-testimonial-slider', 'swiper-container']);

        $this->add_render_attribute([
            'monadic-testimonial' => [
                'data-settings' => [
                    wp_json_encode(array_filter([
                        "loop" => ("yes" == $settings['infinity_loop']) ? true : false,
                        "autoplay" => ("yes" == $settings["autoplay"]) ? ["delay" => $settings["autoplay_speed"]] : false,
                        "speed" => $settings["animation_speed"],
                        "navigation" => [
                            "nextEl" => ".monadic-testimonial-button-next",
                            "prevEl" => ".monadic-testimonial-button-prev",
                        ],
                        "pagination" => [
                            "el" => "#" . $id . " .swiper-pagination",
                            "clickable" => true,
                        ],
                    ]))
                ],
            ]
        ]);

        ?>
    <div <?php $this->print_render_attribute_string('monadic-testimonial'); ?>>
        <div <?php $this->print_render_attribute_string('monadic-testimonial-slider'); ?>>
            <div class="swiper-wrapper">
                <?php
                $this->add_render_attribute('testimonial-item', 'class', 'monadic-testimonial-item swiper-slide', true);
                foreach ($testmonials as $testmonial) {
                    ?>
                    <div <?php $this->print_render_attribute_string('testimonial-item'); ?>>
                        <div class="monadic-testimonial-icons">
                            <?php Icons_Manager::render_icon($testmonial['client_icon'], ['aria-hidden' => 'true']); ?>
                        </div>
                        <p><?php echo wp_kses($testmonial['client_review'], $allow_html); ?></p>
                        <h2><?php echo esc_html($testmonial['client_name']); ?></h2>
                        <h4><?php echo esc_html($testmonial['client_designation']); ?></h4>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            if ('yes' === $settings['show_arrow']) { ?>
                <div class="monadic-testimonial-button-next">
                    <?php Icons_Manager::render_icon($settings['arrow_left_icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <div class="monadic-testimonial-button-prev">
                    <?php Icons_Manager::render_icon($settings['arrow_right_icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <?php
            }
            if ('yes' === $settings['show_pagination']) { ?>

                <div class="swiper-pagination"></div>
            <?php }
            ?>
        </div>
        <?php
    }
}