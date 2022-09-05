<?php

namespace Easy_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Widget_Base;


if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


class Widget_Price extends Widget_Base
{

    /**
     * Get widget name.
     * Retrieve Price widget name.
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'easy_price_table';
    }

    /**
     * Get widget title.
     * Retrieve Price widget title.
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Price Table', 'easy-addons');
    }

    /**
     * Get widget icon.
     * Retrieve Price widget icon.
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-price-table';
    }

    /**
     * Get widget categories.
     * Retrieve the list of categories the Price widget belongs to.
     * @access public
     * @return array Widget categories.
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
//    public function get_script_depends() {
//        return [ 'price' ];
//    }

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
        return ['price'];
    }

    /**
     * Register Price widget controls.
     * Adds different input fields to allow the user to change and customize the widget settings.
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'price_header_section',
            [
                'label' => __('Header', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'pricing_card_style', [
                'label' => __('Price Table Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'pricing-card-style-1' => esc_html__('Pricing Card Style 1', 'easy-addons'),
                    'pricing-card-style-2' => esc_html__('Pricing Card Style 2', 'easy-addons'),
                    'pricing-card-style-3' => esc_html__('Pricing Card Style 3', 'easy-addons'),
                ],
                'default' => 'pricing-card-style-1',
            ]
        );
        $this->add_control(
            'price_table_title',
            [
                'label' => esc_html__( 'Price Table Title', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Standard', 'easy-addons' ),
                'placeholder' => esc_html__( 'Type your title here', 'easy-addons' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pricing_section',
            [
                'label' => __('Price', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'price_currency',
            [
                'label' => esc_html__( 'Currency', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '$', 'easy-addons' ),
                'placeholder' => esc_html__( 'Type Price Currency $', 'easy-addons' ),
            ]
        );

        $this->add_control(
            'price_table_amount',
            [
                'label' => esc_html__( 'Price', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '25', 'easy-addons' ),
                'placeholder' => esc_html__( 'Type Price Amount 25', 'easy-addons' ),
            ]
        );

        $this->add_control(
            'price_duration',
            [
                'label' => esc_html__( 'Duration', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'per month', 'easy-addons' ),
                'placeholder' => esc_html__( 'Per month', 'easy-addons' ),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'price_features_section',
            [
                'label' => __('Features', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'featured_title', [
                'label' => esc_html__( 'Price Table', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Price Table' , 'easy-addons' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'selected_icon',
            [
                'label' => esc_html__( 'Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $this->add_control(
            'featured_list',
            [
                'label' => esc_html__( 'Features List', 'easy-addons' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'featured_title' => esc_html__( '100 Email Accounts', 'easy-addons' ),
                        'selected_icon' => 'fas fa-check',
                    ],
                    [
                        'featured_title' => esc_html__( '10 Subdomains', 'easy-addons' ),
                        'selected_icon' => 'fas fa-check',
                    ],
                ],
                'title_field' => '{{{ featured_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'price_subscribe_section',
            [
                'label' => __('Subscribe', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'price_signup_link',
            [
                'label' => esc_html__( 'Link', 'easy-addons'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'easy-addons'),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'price_signup_text',
            [
                'label' => esc_html__( 'Sign Up', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Sign Up', 'easy-addons' ),
                'placeholder' => esc_html__( 'Type your title here', 'easy-addons' ),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'price_badge_section',
            [
                'label' => __('Badge', 'easy-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'price_badge_title',
            [
                'label' => esc_html__( 'Badge Title', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Type Recommended', 'easy-addons' ),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'price_card_style',
            [
                'label' => esc_html__('Price Card Style', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'price_card_tabs', [
                'label' => __('Price Card Style', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('price_card_normal', [
                'label' => __('Normal','easy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'price_card_background_bg',
                'label' => esc_html__( 'Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'price_card_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a:hover',
            ]
        );

        $this->add_control(
            'price_card_padding',
            [
                'label' => esc_html__( 'Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-table' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'price_card_border',
            [
                'label' => esc_html__( 'Border Radius', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pricing-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('price_card_hover', [
                'label' => __('Hover','easy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'price_card_h_background_bg',
                'label' => esc_html__( 'Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'price_card_h_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'header_style',
            [
                'label' => esc_html__('Header', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'header_title_clr_text',
            [
                'label' => esc_html__('Header Title Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2c3e50',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_title_typography',
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'price_style',
            [
                'label' => esc_html__('Price', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'price_text_clr',
            [
                'label' => esc_html__('Price Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-value .amount' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-value .currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'price_mb',
            [
                'label' => esc_html__('Margin Bottom', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item.pricing-card-style-1 .pricing-table .price-value' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
                'default' => [
                    'unit' => 'px',
                ],
            ]
        );

        $this->add_control(
            'price_padding',
            [
                'label' => esc_html__( 'Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item.pricing-card-style-1 .pricing-table .price-value' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'pricing_card_style',
                            'operator' => '==',
                            'value' => 'pricing-card-style-1',
                        ],
                    ],
                ],
            ]
        );

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'price_background_bg',
                'label' => esc_html__( 'Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-pricing-table-item.pricing-card-style-1 .pricing-table .price-value',
                'conditions' => [
                    'terms' => [
                        [
                            'name' => 'pricing_card_style',
                            'operator' => '==',
                            'value' => 'pricing-card-style-1',
                        ],
                    ],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_text_typography',
                'label' => esc_html__('Price Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-value .amount',
            ]
        );

        $this->add_control(
            'duration_text_clr',
            [
                'label' => esc_html__('Duration Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .duration' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_duration_typography',
                'label' => esc_html__('Duration Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .duration',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'features_style',
            [
                'label' => esc_html__('Features', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'features_clr_text',
            [
                'label' => esc_html__('Features Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2c3e50',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .pricing-content li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_typography',
                'label' => esc_html__('Features Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .pricing-content li',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'subscribes_style',
            [
                'label' => esc_html__('Subscribe', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'subscribe_btn_tabs', [
                'label' => __('Subscribe Button', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('normal', [
                'label' => __('Normal','easy-addons'),
            ]
        );
        $this->add_control(
            'subscribe_clr_text',
            [
                'label' => esc_html__('Subscribe Button Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2c3e50',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'subscribe_background_bg',
                'label' => esc_html__( 'Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subscribe_typography',
                'label' => esc_html__('Subscribe Button Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('hover', [
                'label' => __('Hover','easy-addons'),
            ]
        );
        $this->add_control(
            'subscribe_h_btn_text_clr',
            [
                'label' => esc_html__('Subscribe Button Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2c3e50',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'subscribe_h_background_bg',
                'label' => esc_html__( 'Background', 'easy-addons'),
                'types' => [ 'classic', 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'subscribe_h_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'easy-addons'),
                'selector' => '{{WRAPPER}} .easy-pricing-table-item .pricing-table .price-table-signup a:hover',
                'condition' => [
                    'pricing_card_style' => ['pricing-card-style-2','pricing-card-style-3'],
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'badge_style',
            [
                'label' => esc_html__('Badge', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_bg',
            [
                'label' => esc_html__('Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#2c3e50',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item span.recommended-badge' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .easy-pricing-table-item span.recommended-badge' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'selector' => '{{WRAPPER}} .easy-pricing-table-item span.recommended-badge',
            ]
        );
        $this->end_controls_section();

    }

    /**
     * Render Price widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        switch ($settings['pricing_card_style']) {
            case 'pricing-card-style-1':
                include EASY_ADDONS_PATH . '/widgets/pricing/pricing/pricing-style-1.php';
                break;
            case 'pricing-card-style-2':
                include EASY_ADDONS_PATH . '/widgets/pricing/pricing/pricing-style-2.php';
                break;
            case 'pricing-card-style-3':
                include EASY_ADDONS_PATH . '/widgets/pricing/pricing/pricing-style-3.php';
                break;
            default:
                include EASY_ADDONS_PATH . '/widgets/pricing/pricing/pricing-style-1.php';
                break;
        }
        ?>
        <?php

    }
}