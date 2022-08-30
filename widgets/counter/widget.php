<?php

namespace Easy_Addons\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 *
 * Counter Up Widget.
 *
 * @since 1.0.0
 */
class Counter_Up extends Widget_Base
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
        return 'counter-up';
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
        return __('Counter Up', 'easy-addons');
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
        return 'eicon-counter';
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
        return ['counter-up', 'waypoints', 'counterUp'];
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
        return ['counter-up'];
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
                'label' => esc_html__('Counter', 'easy-addons'),
            ]
        );

        $this->add_control(
            'counter_style', [
                'label' => __('Counter Up Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'counter-style-1' => esc_html__('Counter Up Style 1', 'easy-addons'),
                    'counter-style-2' => esc_html__('Counter Up Style 2', 'easy-addons'),
                    'counter-style-3' => esc_html__('Counter Up Style 3', 'easy-addons'),
                ],
                'default' => 'counter-style-1',
            ]
        );
        $this->add_control(
            'counter-number',
            [
                'label' => esc_html__('Counter Number', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 100
            ]
        );
        $this->add_control(
            'counter-icon',
            [
                'label' => esc_html__('Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-coffee',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'counter-desc',
            [
                'label' => esc_html__('Counter Number', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Cups of coffee', 'easy-addons')
            ]
        );

        $this->add_control(
            'suffix',
            [
                'label' => esc_html__('Number Suffix', 'easy-addons'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => '',
                'placeholder' => esc_html__('Plus', 'easy-addons'),
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '!==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );

        $this->add_control(
            'counter-delay',
            [
                'label' => esc_html__('Counter Delay', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 10,
                'min' => 10,
                'max' => 20,
                'step' => 5,
            ]
        );

        $this->add_control(
            'counter-duration',
            [
                'label' => esc_html__('Animation Duration', 'easy-addons'),
                'type' => Controls_Manager::NUMBER,
                'default' => 2000,
                'min' => 100,
                'max' => 4000,
                'step' => 100,
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
                'label' => __( 'Alignment', 'easy-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'easy-addons' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'easy-addons' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'easy-addons' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'easy-addons' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .easy-counter' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
           'counter_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .easy-counter' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '!==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__( 'Box Shadow', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-counter',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '!==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ],
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__( 'Border', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-counter',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '!==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'border-radius',
            [
                'label' => esc_html__( 'Border Radius', 'easy-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '!==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__( 'Padding', 'easy-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '!==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'counter_bg_s3_color',
            [
                'label' => esc_html__( 'Background Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .easy-counter.counter-style-3:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .easy-counter.counter-style-3 .counter' => 'background: {{VALUE}}',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_s3',
                'label' => esc_html__( 'Border', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-counter.counter-style-3 .counter',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_responsive_control(
            'border_radius_s3',
            [
                'label' => esc_html__( 'Border Radius', 'easy-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-counter.counter-style-3 .counter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_s3',
                'label' => esc_html__( 'Box Shadow', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-counter.counter-style-3 .counter',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ],
        );

        $this->add_responsive_control(
            'padding_s3',
            [
                'label' => esc_html__( 'Padding', 'easy-addons' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-counter.counter-style-3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'counter_style',
                            'operator' => '==',
                            'value' => 'counter-style-3',
                        ],
                    ],
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'counter-number-typo',
                'label' => esc_html__( 'Counter Number Typography', 'easy-addons' ),
                'selector' => '{{WRAPPER}} .easy-counter-up p span',
            ]
        );
        $this->add_control(
            'counter_number_color',
            [
                'label' => esc_html__( 'Number Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .counter-number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'counter-desc-typo',
                'label' => esc_html__( 'Description Typography', 'easy-addons' ),
                'selector' => '{{WRAPPER}} p.counter-desc',
            ]
        );
        $this->add_control(
            'counter_desc_color',
            [
                'label' => esc_html__( 'Description Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} p.counter-desc' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'font_size',
            [
                'label' => esc_html__( 'Icon Size', 'easy-addons' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px'],
                'range' => [
                    'px' => [
                        'min' => 25,
                        'max' => 150,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 42,
                ],
                'selectors' => [
                    '{{WRAPPER}} .counter-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'counter_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'easy-addons' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .counter-icon' => 'color: {{VALUE}}',
                ],
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
        $settings = $this->get_settings_for_display();


        switch ($settings['counter_style']) {
            case 'counter-style-1':
                include EASY_ADDONS_PATH . '/widgets/counter/counters/counter-1.php';
                break;
            case 'counter-style-2':
                include EASY_ADDONS_PATH . '/widgets/counter/counters/counter-2.php';
                break;
            case 'counter-style-3':
                include EASY_ADDONS_PATH . '/widgets/counter/counters/counter-3.php';
                break;
            default:
                include EASY_ADDONS_PATH . '/widgets/counter/counters/counter-1.php';
                break;
        }
    }
}
