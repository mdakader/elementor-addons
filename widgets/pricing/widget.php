<?php

namespace Easy_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
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
                    'pricing-card-style-4' => esc_html__('Pricing Card Style 4', 'easy-addons'),
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
            'price_table_amount',
            [
                'label' => esc_html__( 'Price', 'easy-addons' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '$25', 'easy-addons' ),
                'placeholder' => esc_html__( 'Type Price Amount $25', 'easy-addons' ),
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
                'default' => esc_html__( 'Recommended', 'easy-addons' ),
                'placeholder' => esc_html__( 'Type your title here', 'easy-addons' ),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_social_style',
            [
                'label' => esc_html__('Icon', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Official Color', 'easy-addons'),
                    'custom' => esc_html__('Custom', 'easy-addons'),
                ],
            ]
        );

        $this->add_control(
            'icon_primary_color',
            [
                'label' => esc_html__('Primary Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_secondary_color',
            [
                'label' => esc_html__('Secondary Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-social-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Size', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--icon-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => esc_html__('Padding', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon' => '--icon-padding: {{SIZE}}{{UNIT}}',
                ],
                'default' => [
                    'unit' => 'em',
                ],
                'tablet_default' => [
                    'unit' => 'em',
                ],
                'mobile_default' => [
                    'unit' => 'em',
                ],
                'range' => [
                    'em' => [
                        'min' => 0,
                        'max' => 5,
                    ],
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => esc_html__('Spacing', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--grid-column-gap: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'row_gap',
            [
                'label' => esc_html__('Rows Gap', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}}' => '--grid-row-gap: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .elementor-social-icon',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .elementor-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hover_primary_color',
            [
                'label' => esc_html__('Primary Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_secondary_color',
            [
                'label' => esc_html__('Secondary Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => [
                    'icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .elementor-social-icon:hover svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'hover_border_color',
            [
                'label' => esc_html__('Border Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'condition' => [
                    'image_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-social-icon:hover' => 'border-color: {{VALUE}};',
                ],
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
            case 'pricing-card-style-4':
                include EASY_ADDONS_PATH . '/widgets/pricing/pricing/pricing-style-4.php';
                break;
            default:
                include EASY_ADDONS_PATH . '/widgets/pricing/pricing/pricing-style-1.php';
                break;
        }
        ?>
        <?php

    }
}