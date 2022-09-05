<?php

namespace Easy_Addons\Widgets;

use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Elementor Dual Heading
 *
 * Elementor widget for Dual Heading show.
 *
 * @since 1.0.0
 */
class Service_Widget extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_name()
    {
        return 'easy-service';
    }

    /**
     * Retrieve the widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_title()
    {
        return __('Service', 'easy-addons');
    }

    /**
     * Retrieve the widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     *
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-info-box';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @return array Widget categories.
     * @since 1.0.0
     *
     * @access public
     *
     */
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
    public function get_script_depends()
    {
        return [''];
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
        return ['service'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Dual Header', 'easy-addons'),
            ]
        );

        $this->add_control(
            'service_style', [
                'label' => __('Service Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'service-style-1' => esc_html__('Service Style 1', 'easy-addons'),
                    'service-style-2' => esc_html__('Service Style 2', 'easy-addons'),
                    'service-style-3' => esc_html__('Service Style 3', 'easy-addons'),
                    'service-style-4' => esc_html__('Service Style 4', 'easy-addons'),
                ],
                'default' => 'service-style-1',
            ]
        );
        $this->add_control(
            'service_icon',
            [
                'label' => esc_html__('Service Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'service_title',
            [
                'label' => esc_html__('Service Title', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Service Title Here', 'easy-addons'),
                'default' => esc_html__('Service Title Here', 'easy-addons'),
            ]
        );
        $this->add_control(
            'service_desc',
            [
                'label' => esc_html__('Service Description', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Service Description Here', 'easy-addons'),
                'default' => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s,', 'easy-addons'),
            ]
        );

        $this->add_control(
            'service_link',
            [
                'label' => esc_html__('Link', 'easy-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'easy-addons'),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service_link_text',
            [
                'label' => esc_html__('Link Text', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('CTA Link Text', 'easy-addons'),
                'default' => esc_html__('Read More', 'easy-addons'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'elementor'),
                'type' => Controls_Manager::CHOOSE,
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_bg_color',
            [
                'label' => esc_html__('Service Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item' => 'background-color: {{VALUE}}',
                ],
//                'conditions' => [
//                    'terms' => [
//                        [
//                            'name' => 'service_style',
//                            'operator' => '==',
//                            'value' => 'service-style-1',
//                        ],
//                    ],
//                ],
            ]
        );

        $this->add_control(
            'service_bg_color_h',
            [
                'label' => esc_html__('Service Background Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#172E5A',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'service_icon_color',
            [
                'label' => esc_html__('Service Icon Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#172E5A',
                'selectors' => [
                    '{{WRAPPER}} .service-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_icon_color_h',
            [
                'label' => esc_html__('Service Icon Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item:hover .service-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_icon_font_size',
            [
                'label' => esc_html__('Service Icon Size', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 45,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'service_icon_margin',
            [
                'label' => esc_html__('Service Icon Margin Bottom', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 15,
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'service_title_color',
            [
                'label' => esc_html__('Service Title Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#172E5A',
                'selectors' => [
                    '{{WRAPPER}} .easy-service-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_title_color_h',
            [
                'label' => esc_html__('Service Title Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-service:hover .easy-service-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'service_title_typography',
                'selector' => '{{WRAPPER}} .easy-service-title',
            ]
        );
        $this->add_control(
            'service_desc_color',
            [
                'label' => esc_html__('Service Description Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#172E5A',
                'selectors' => [
                    '{{WRAPPER}} .easy-service-description' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_desc_color_h',
            [
                'label' => esc_html__('Service Description Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item:hover .easy-service-description' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'service_btn_typography',
                'selector' => '{{WRAPPER}} .easy-service-description',
            ]
        );
        $this->add_control(
            'service_btn_color',
            [
                'label' => esc_html__('Service Link Text Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#e74c3c',
                'selectors' => [
                    '{{WRAPPER}} .easy-service-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'service_btn_color_h',
            [
                'label' => esc_html__('Service Link Text Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#33B5BF',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item:hover .easy-service-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'service_desc_typography',
                'selector' => '{{WRAPPER}} .easy-service-link',
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        {
            $settings = $this->get_settings_for_display();


            switch ($settings['service_style']) {
                case 'service-style-1':
                    include EASY_ADDONS_PATH . '/widgets/service/services/service-1.php';
                    break;
                case 'service-style-2':
                    include EASY_ADDONS_PATH . '/widgets/service/services/service-2.php';
                    break;
                case 'service-style-3':
                    include EASY_ADDONS_PATH . '/widgets/service/services/service-3.php';
                    break;
                case 'service-style-4':
                    include EASY_ADDONS_PATH . '/widgets/service/services/service-4.php';
                    break;
                default:
                    include EASY_ADDONS_PATH . '/widgets/service/services/service-1.php';
                    break;
            }
        }
    }
}
