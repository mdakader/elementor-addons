<?php

namespace Easy_Addons\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Elementor Dual Heading
 *
 * Team Widget.
 *
 * @since 1.0.0
 */
class Widget_Team extends Widget_Base
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
        return 'ea-team';
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
        return __('Team', 'easy-addons');
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
        return ['team'];
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
                'label' => esc_html__('Team', 'easy-addons'),
            ]
        );

        $this->add_control(
            'team_style', [
                'label' => __('Teams Style', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'team-style-1' => esc_html__('Team Style 1', 'easy-addons'),
                    'team-style-2' => esc_html__('Team Style 2', 'easy-addons'),
                    'team-style-3' => esc_html__('Team Style 3', 'easy-addons'),
                    'team-style-4' => esc_html__('Team Style 4', 'easy-addons'),
                    'team-style-5' => esc_html__('Team Style 5', 'easy-addons'),
                    'team-style-6' => esc_html__('Team Style 6', 'easy-addons')
                ],
                'default' => 'team-style-1',
            ]
        );

        $this->add_control(
            'team_image',
            [
                'label' => esc_html__('Image', 'easy-addons'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'team_name',
            [
                'label' => esc_html__('Name', 'easy-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('John Doe', 'easy-addons'),
                'default' => esc_html__('John Doe', 'easy-addons'),
            ]
        );
        $this->add_control(
            'team_designation',
            [
                'label' => esc_html__('Designation', 'easy-addons'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Designation', 'easy-addons'),
                'default' => esc_html__('Web Developer', 'easy-addons'),
            ]
        );

        $this->add_control(
            'team_info',
            [
                'label' => esc_html__('Information', 'easy-addons'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Information', 'easy-addons'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'easy-addons'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_social_icon',
            [
                'label' => esc_html__('Social Icons', 'easy-addons'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__('Icon', 'easy-addons'),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'social',
                'default' => [
                    'value' => 'fab fa-wordpress',
                    'library' => 'fa-brands',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'android',
                        'apple',
                        'behance',
                        'bitbucket',
                        'codepen',
                        'delicious',
                        'deviantart',
                        'digg',
                        'dribbble',
                        'easy-addons',
                        'facebook',
                        'flickr',
                        'foursquare',
                        'free-code-camp',
                        'github',
                        'gitlab',
                        'globe',
                        'houzz',
                        'instagram',
                        'jsfiddle',
                        'linkedin',
                        'medium',
                        'meetup',
                        'mix',
                        'mixcloud',
                        'odnoklassniki',
                        'pinterest',
                        'product-hunt',
                        'reddit',
                        'shopping-cart',
                        'skype',
                        'slideshare',
                        'snapchat',
                        'soundcloud',
                        'spotify',
                        'stack-overflow',
                        'steam',
                        'telegram',
                        'thumb-tack',
                        'tripadvisor',
                        'tumblr',
                        'twitch',
                        'twitter',
                        'viber',
                        'vimeo',
                        'vk',
                        'weibo',
                        'weixin',
                        'whatsapp',
                        'wordpress',
                        'xing',
                        'yelp',
                        'youtube',
                        '500px',
                    ],
                    'fa-solid' => [
                        'envelope',
                        'link',
                        'rss',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'easy-addons'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'is_external' => 'true',
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__('https://your-link.com', 'easy-addons'),
            ]
        );

        $repeater->add_control(
            'item_icon_color',
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

        $repeater->add_control(
            'item_icon_primary_color',
            [
                'label' => esc_html__('Primary Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'item_icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.elementor-social-icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'item_icon_secondary_color',
            [
                'label' => esc_html__('Secondary Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'item_icon_color' => 'custom',
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.elementor-social-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}}.elementor-social-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_icon_list',
            [
                'label' => esc_html__('Social Icons', 'easy-addons'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'fab fa-youtube',
                            'library' => 'fa-brands',
                        ],
                    ],
                ],
                'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
            ]
        );

        $this->add_control(
            'shape',
            [
                'label' => esc_html__('Shape', 'easy-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'rounded',
                'options' => [
                    'rounded' => esc_html__('Rounded', 'easy-addons'),
                    'square' => esc_html__('Square', 'easy-addons'),
                    'circle' => esc_html__('Circle', 'easy-addons'),
                ],
                'prefix_class' => 'elementor-shape-',
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => esc_html__('View', 'easy-addons'),
                'type' => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'team_section_style',
            [
                'label' => esc_html__('Team Style', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'service_bg_color',
            [
                'label' => esc_html__('Service Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#4B6587',
                'selectors' => [
                    '{{WRAPPER}} .easy-service' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'service_bg_color_h',
            [
                'label' => esc_html__('Service Background Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#4B6587',
                'selectors' => [
                    '{{WRAPPER}} .easy-service:hover' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .easy-service' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'service_icon_color',
            [
                'label' => esc_html__('Service Icon Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#ffffff',
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
                'default' => '#33B5BF',
                'selectors' => [
                    '{{WRAPPER}} .easy-service:hover .service-icon i' => 'color: {{VALUE}}',
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
                'default' => '#ffffff',
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
                'default' => '#ffffff',
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
                    '{{WRAPPER}} .easy-service:hover .easy-service-description' => 'color: {{VALUE}}',
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
                'default' => '#ffffff',
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
                    '{{WRAPPER}} .easy-service:hover .easy-service-link' => 'color: {{VALUE}}',
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

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'easy-addons'),
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
                    '{{WRAPPER}} .easy-service' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_name_style',
            [
                'label' => esc_html__('Name', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_designation_style',
            [
                'label' => esc_html__('Designation', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_desc_style',
            [
                'label' => esc_html__('Information', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_btn_style',
            [
                'label' => esc_html__('Socials Links', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'socials_link_btn_tabs', [
                'label' => __('Socials Links', 'easy-addons'),
            ]
        );

        $this->start_controls_tab('socials_link_normal', [
                'label' => __('Normal','easy-addons'),
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
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'socials_link_typography',
                'selector' => '{{WRAPPER}} .easy-services a.easy-service-link',
            ]
        );
        $this->add_control(
            'socials_link_color',
            [
                'label' => esc_html__('Button Text Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#e74c3c',
                'selectors' => [
                    '{{WRAPPER}} .easy-services a.easy-service-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'socials_link_bg',
                'label' => esc_html__( 'Button Background Color', 'easy-addons'),
                'types' => ['gradient'],
                'selector' =>'{{WRAPPER}} .easy-services a.easy-service-link',
            ]
        );

        $this->add_responsive_control(
            'socials_link_padding',
            [
                'label' => esc_html__('Padding', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .easy-services a.easy-service-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'socials_link_top_margin',
            [
                'label' => esc_html__('Button Margin Top', 'easy-addons'),
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
                    '{{WRAPPER}} .easy-services a.easy-service-link' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab('socials_link_hover', [
                'label' => __('Hover','easy-addons'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'socials_link_h_background_bg',
                'label' => esc_html__( 'Button Hover Background Color', 'easy-addons'),
                'types' => [ 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-services a.easy-service-link',
                'condition' => [
                    'service_style' => ['service-style-1', 'service-style-2', 'service-style-3'],
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'socials_link_background_bg',
                'label' => esc_html__( 'Button Hover Background Color', 'easy-addons'),
                'types' => [ 'gradient'],
                'selector' =>'{{WRAPPER}} .easy-services.service-style-4 .easy-services-item:hover a.easy-service-link:after',
                'condition' => [
                    'service_style' => ['service-style-4'],
                ]
            ]
        );

        $this->add_control(
            'socials_link_color_h',
            [
                'label' => esc_html__('Button Text Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '#33B5BF',
                'selectors' => [
                    '{{WRAPPER}} .easy-services-item:hover .easy-service-link' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'service_style' => ['service-style-4'],
                ]
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

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


        switch ($settings['team_style']) {
            case 'team-style-1':
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-1.php';
                break;
            case 'team-style-2':
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-2.php';
                break;
            case 'team-style-3':
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-3.php';
                break;
            case 'team-style-4':
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-4.php';
                break;
            case 'team-style-5':
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-5.php';
                break;
            case 'team-style-6':
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-6.php';
                break;
            default:
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-1.php';
                break;
        }
    }
}
