<?php

namespace Easy_Addons\Widgets;

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

        $this->end_controls_section();

        $this->start_controls_section(
            'team_section_style',
            [
                'label' => esc_html__('Team Style', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'team_img_box_height',
            [
                'label' => esc_html__('Image Box Height', 'easy-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 700,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 430,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-img' => 'height: {{SIZE}}{{UNIT}};',
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
        $this->add_control(
            'team_name_color',
            [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} h3.team-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_name_h_color',
            [
                'label' => esc_html__('Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team:hover .team-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_name_typography',
                'label' => __('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} h3.team-name',
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
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_designation_typography',
                'label' => __('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} h3.team-name small.team-position',
            ]
        );
        $this->add_control(
            'team_designation_color',
            [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} h3.team-name small.team-position' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'team_designation_h_color',
            [
                'label' => esc_html__('Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team:hover .team-name small.team-position' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'team_desc_style',
            [
                'label' => esc_html__('Description', 'easy-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'team_style' => ['team-style-5'],
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_desc_typography',
                'label' => __('Typography', 'easy-addons'),
                'selector' => '{{WRAPPER}} .team-wrapper .our-team p.team-member-desc',
            ]
        );
        $this->add_control(
            'team_desc_color',
            [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team p.team-member-desc' => 'color: {{VALUE}}',
                ],
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
                'label' => __('Normal', 'easy-addons'),
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

        $this->add_responsive_control(
            'socials_link_margin',
            [
                'label' => esc_html__('Margin', 'easy-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .easy-services a.easy-service-link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'socials_link_color',
            [
                'label' => esc_html__('Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team .social-links li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'socials_link_bg',
            [
                'label' => esc_html__('Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team .social-links li a' => 'background: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'socials_link_br',
            [
                'label' => esc_html__('Border Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team .social-links li a' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab('socials_link_hover', [
                'label' => __('Hover', 'easy-addons'),
            ]
        );

        $this->add_control(
            'socials_link_h_color',
            [
                'label' => esc_html__('Hover Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team .social-links li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'socials_link_h_bg',
            [
                'label' => esc_html__('Hover Background Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team .social-links li a:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'socials_link_h_br',
            [
                'label' => esc_html__('Hover Border Color', 'easy-addons'),
                'type' => Controls_Manager::COLOR,
                'alpha' => true,
                'selectors' => [
                    '{{WRAPPER}} .team-wrapper .our-team .social-links li a:hover' => 'border-color: {{VALUE}}',
                ],
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
            default:
                include EASY_ADDONS_PATH . '/widgets/team/teams/team-1.php';
                break;
        }
    }
}
